<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\I18n\Time;
/**
* Registrations Controller
*
* @property \App\Model\Table\RegistrationsTable $Registrations
* @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class RegistrationsController extends AppController
{

public function beforeFilter(\Cake\Event\EventInterface $event)
{
parent::beforeFilter($event);
// Configure the login action to not require authentication, preventing
// the infinite redirect loop issue
$this->Authentication->addUnauthenticatedActions(['register', 'saveRegistration', 'checkpassword', 'validate', 'validateEmailLink', 'verifymail']);
}

//User Registration
public function register(){

    $this->viewBuilder()->setLayout('login');
    $this->loadModel('Users');
    $this->loadModel('Cities');
    $fromDbCities = $this->Cities->find('all')->select(['name', 'province'])->order(['province' => 'ASC', 'name' => 'ASC'])->toArray();
    $cities = array();
    foreach ($fromDbCities as $city) {
        if (!array_key_exists($city->province, $cities)) {
            $cities[$city->province] = $city;
        }
    }
    $defalutcities = $this->Cities->find('all',[
            'conditions' => [
            'province' => 'Agrigento'
            ]
        ])->toArray();

    $errors = array();
    $registration = $this->Registrations->newEmptyEntity();

    if ($this->request->is('post')) {
        $random = rand(100000, 999999);
        $first_name = $this->request->getData('first_name');
        $last_name = $this->request->getData('last_name');
        $company_name = $this->request->getData('company_name');
        $company_address = $this->request->getData('company_address');
        $province = $this->request->getData('province');
        $city = $this->request->getData('city');
        $postalcode = $this->request->getData('postalcode');
        $email = $this->request->getData('email');
        $password = $this->request->getData('password');
        $telephone = $this->request->getData('telephone');
        $repeatpassword = $this->request->getData('repeatpassword');
        $vat = $this->request->getData('vat');
        $pec = $this->request->getData('pec');

        //validations

            if(!empty($telephone)){
                $reg ="/^(\+\d{1,3}[- ]?)?\d{10}$/";
                  if (!preg_match($reg, $telephone)) {
                    $telephonevalidation = array('telephone' => 'Wronge Telephone Format');
                       $errors = $errors + $telephonevalidation;
                   
                }
                $registration->telephone = $telephone;
            }
               
            $allusers =  $this->Users->find('all')->toArray();
                if(!empty($allusers)){
                    $allemailds = array();
                    foreach ($allusers as $singleuser) {
                        array_push($allemailds, $singleuser->email);
                    }
                 }
                if ($email != null) {
                    $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
                        //comapare using preg_match_all() method
                    if (preg_match($test_patt, $email)) {
                        if (!empty($allemailds) && in_array($email, $allemailds)) {

                           $emailvalidation = array('email' => 'Email Already Exit');
                          $errors = $errors + $emailvalidation;
                        }     
                        
                    } else {
                         $email_validation = array('email' =>'Invalid Email !');

                        $errors = $errors +  $email_validation;
                    }
                    $registration->email =  $email;
                }

                $regex = "/^(?=.*[a-z])(?=.*\d).*$/";

                if (preg_match($regex, $password, $matches)) {
                    if (strlen($password) < 6) {
                   $password_validation = array('password' => 'Password non corrispondente e password ripetuta !');
                   $errors = $errors +  $password_validation;
                    } else {
                        if ($password === $repeatpassword) {
                            $registration->password = $password;
                        } else {
                            $password_validation = array('password' => 'Password non corrispondente e password ripetuta !');
                            $errors = $errors +  $password_validation;
                            
 
                        }
                    }
                } else {
                   $password_validation = array('password' => 'Password Requirements not followed !');
                   $errors = $errors +  $password_validation;
                   
                }
                   $registration->password = $password;

                if(!empty($province)){
                    $citydata = $this->Cities->find('all',[
                    'conditions' => [
                    'province' => $province,
                    'name' => $city
                    ]
                    ])->first();

                    if ($citydata->postcodes == $postalcode) {
                        $registration->company_cap = $postalcode;
                    } else {
                        $postalcode_validation = array('postalcode' => 'Postal Code is Invalid !');
                        $errors = $errors +  $postalcode_validation;
                        $registration->company_cap = $postalcode;
                    }
                }

                $registration->first_name = $first_name;
                $registration->last_name = $last_name;
                $registration->company_name = $company_name;
                $registration->company_address = $company_address;
                $registration->company_province = $province;
                $registration->company_city = $city;
                $registration->company_cap = $postalcode;
                $registration->company_vat_number = $vat;
                $registration->company_pec_address = $pec;
                if(!empty(count($errors))){

                    $this->set(compact('registration', 'errors', 'cities'));

                    return;
                }
                $this->Registrations->save($registration);

                //email for Registration verification   
                $protocol = Configure::read('Protocol');
                $domain = Configure::read('Domain');
                $port = Configure::read('Port');
                if($port == 80){
                    $port = "";
                } else {
                    $port = ":" . $port;
                }
                $email = new Email();
                $emailSent =   $email->setFrom(['welcome@epebook.it' => 'Gestione'])
                ->setTo($registration->email)
                ->setemailFormat('html')
                ->setSubject('Registration Verification mail')
                ->send('Dear ' . $registration->firstname . $registration->lastname . '<h3> Please click the below link to complete the registration proces</h3> ' . '<a href="' . $protocol . '://' . $domain .  $port . '/registrations/validate?email=' . $registration->email . '&key=' . $random . ' "> Click here </a>  Thank You');

                if ($emailSent) {
                    $registration->validation_code =  $random;
                    $registration->validation_expirydate = (Time::now())->modify("+2 days");
                    $this->Registrations->save($registration);
                    $this->Flash->success(__('E-mail sent.'));
                } else {
                    $this->Flash->error(__('Failed to Send Email'));
                }
            $this->Flash->success(__('Registration is completed.'));
            return $this->redirect([
                'controller' => 'users',
                'action' => 'login',
            ]);
        }
       
    $this->set(compact('cities', 'defalutcities', 'errors', 'registration'));
    
}

public function checkpassword(){
    $password = $this->request->getQuery('password');
    $msg = '*Your password must contain at least one letter*Your password must contain at least one digit.*Your password length must be at least 6.';
    if(!empty($password)){
        if(preg_match('/^[a-zA-Z0-9]+$/', $password)) {
            if(strlen($password) > 6){
                $msg = "";
            }else{
                $msg = '*Your password length must be at least 6.';
            }
        }else{
            $msg ="noo";
        }
    }

    $this->autoRender = false;
    return $this->response->withType('application/json')->withStringBody(json_encode($msg));
}



public function validate()
{
    $code =  $this->request->getQuery('key');
    $email =  $this->request->getQuery('email');
    $this->loadModel('Registrations');
    $verifyuser = $this->Registrations->find('all', [
        'conditions' => [
        'email' => $email
        ]
    ])->first();
    if ($verifyuser != null) {
        if (($verifyuser->validation_expirydate->i18nFormat('yyyy-MM-dd')) < (Time::now()->i18nFormat('yyyy-MM-dd'))) {
            $this->Flash->success(__('Validation code is expired !'));
            return $this->redirect([
                'controller' => 'registrations',
                'action' => 'verifymail',
                $email,
                $msg ='Validation Code is Expired! Please Enter Email for Aactivation Link'
            ]
            );
        } else {
            $this->loadModel('Users');
            $user = $this->Users->find('all', [
                    'conditions' => [
                    'email' => $email
                    ]
                ])->first();
            if(empty($user)){
                $registrationuser = $this->Users->newEmptyEntity();
                $registrationuser->firstname =  $verifyuser->first_name;
                $registrationuser->lastname =  $verifyuser->last_name;
                $registrationuser->email =  $verifyuser->email;
                $registrationuser->password = $verifyuser->password;
                $registrationuser->created_at = Time::now();
                $registrationuser = $this->Users->save($registrationuser);
                $this->Registrations->delete($verifyuser);

                //create company
                if($verifyuser->company_name != null){
                    $this->loadModel('Companies');
                    $company = $this->Companies->newEmptyEntity();
                    $company->name =  $verifyuser->company_name;
                    $company->address = $verifyuser->company_address;
                    $company->province = $verifyuser->company_province;
                    $company->city = $verifyuser->company_city;
                    $company->postal_code = $verifyuser->company_cap;
                    $company->vat = $verifyuser->company_vat_number;
                    $company->pec = $verifyuser->company_pec_address;
                    $this->Companies->save($company);

                    //Add User to Company
                    $this->loadModel('CompaniesUsers');
                    $company_user = $this->CompaniesUsers->newEmptyEntity();
                    $company_user->company_id = $company->id;
                    $company_user->user_id = $registrationuser->id;
                    $this->CompaniesUsers->save($company_user);
                }    
            }
            $this->Flash->success(__('Il tuo account è stato verificato correttamente. Ora puoi effettuare il login!'));
            return $this->redirect([
                'controller' => 'users',
                'action' => 'login'
                ]);
        }
    }
}


public function verifymail(){
    $this->viewBuilder()->setLayout('login');
    
}
public function validateEmailLink(){

    $random = rand(100000, 999999);
        $email = $this->request->getQuery('email');
        $msg = $this->request->getQuery('msg');
        $userregistration = $this->Registrations->find('all',[
                'conditions' => [
                'email is' => $email
            ]
        ])->first();
        if(!empty($userregistration)){
            //email for Registration verification
            $protocol = Configure::read('Protocol');
            $domain = Configure::read('Domain');
            $port = Configure::read('Port');
            if($port == 80){
                $port = "";
            } else {
                $port = ":" . $port;
            }
            $email = new Email();
            $emailSent =   $email->setFrom(['welcome@epebook.it' => 'Gestione'])
            ->setTo($userregistration->email)
            ->setemailFormat('html')
            ->setSubject('Registration Verification mail')
            ->send('Dear ' . $userregistration->firstname . $userregistration->lastname . '<h3> Please click the below link to complete the registration proces</h3> ' . '<a href="' . $protocol . '://' . $domain .  $port . '/registrations/validate?email=' . $userregistration->email . '&key=' . $random . ' "> Click here </a>  Thank You');
            if ($emailSent) {
                $userregistration->validation_code =  $random;
                $userregistration->validation_expirydate = (Time::now())->modify("+2 days");
                $this->Registrations->save($userregistration);
                $this->Flash->success(__('E-mail sent. Click the Link to Complete your Registration!'));
            } else {
                $this->Flash->error(__('Failed to Send Email'));
            }
            
            return $this->redirect([
                'controller' => 'users',
                'action' => 'login',
            ]);
        }else{
            $this->Flash->success(__('Registrations Already Verified.'));
            return $this->redirect([
                'controller' => 'users',
                'action' => 'login',
            ]);
        }

}


}