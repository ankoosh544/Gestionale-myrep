<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\I18n\Time;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{
    //Admin view of Allcompanies
    public function adminAllCompaniesList(){

         $this->loadModel('Cities');
        $fromDbCities = $this->Cities->find('all')->select(['name', 'province'])->order(['province' => 'ASC', 'name' => 'ASC'])->toArray();
        $cities = array();
        foreach ($fromDbCities as $city) {
            if (!array_key_exists($city->province, $cities)) {
                $cities[$city->province] = $city;
            }
        }

        $allcompanies = $this->Companies->find('all')->toArray();
        $this->set(compact('allcompanies', 'cities'));

    }

    //Each Company Employees
    public function companyEmployees(){

        $this->loadModel('Users');
        $this->loadModel('CompaniesUsers');

        $allcompany_members = $this->CompaniesUsers->find('all')->toArray();
        $companymemberIds = array();
        foreach($allcompany_members as $member){
            array_push($companymemberIds, $member->user_id);

        }
        $company_id = $this->request->getQuery('company_id');

        $company_members =$this->CompaniesUsers->find('all',[
            'conditions' => [
                'company_id is' => $company_id
            ]
        ])->contain(['Users'])->toArray();

        $allusers = $this->Users->find('all',[
            'conditions' => [
                'id NOT IN' => $companymemberIds
            ]
        ])->toArray();
        $this->set(compact('company_members', 'allusers', 'company_id'));
    }

   

    //Delete Employee from Company
    public function deleteEmployee(){
        $user_id = $this->request->getQuery('user_id');
        $company_id = $this->request->getQuery('company_id');

        $this->loadModel('CompaniesUsers');
        $deleteemployee = $this->CompaniesUsers->find('all',[
            'conditions' => [
                'user_id' => $user_id,
                'company_id' => $company_id
            ]
        ])->first();
        $this->CompaniesUsers->delete($deleteemployee);
        
        return $this->redirect($this->referer());

    }

    //Delete Company
    public function deleteCompany(){
        $company_id = $this->request->getQuery('company_id');
        $company = $this->Companies->find('all',[
            'conditions' => [
                'id' => $company_id
            ]
        ])->first();
        $this->Companies->delete($company);
        $this->Flash->success(__('Company is Deleted Successfully'));

        return $this->redirect([
            'controller' => 'companies',
            'action' =>'admin-all-companies-list',
        ]);
    }

    //Update Company Data
    public function updateCompanydata(){
        $company_id = $this->request->getData('company_id');
        $name = $this->request->getData('name');
        $address = $this->request->getData('address');
        $province = $this->request->getData('province');
        $city = $this->request->getData('city');
        $postalcode = $this->request->getData('postalcode');
        $vat = $this->request->getData('vat');
        $pec = $this->request->getData('pec');
       $company =  $this->Companies->find('all',[
            'conditions' => [
                'id in' => $company_id
            ]
        ])->first();

       debug($name);exit;
        $company->name = $name;
        $company->address = $address;
        $company->province = $province;
        $company->city = $city;
        $company->postalcode = $postalcode;
        $company->vat = $vat;
        $company->pec = $pec;

        if($this->Companies->save($company)){
            $this->Flash->success(__('Dati aziendali aggiornati!'));
        }else{
            $this->Flash->error(__('ERROR!'));
        }
        return $this->redirect([
            'controller' => 'companies',
            'action' =>'admin-all-companies-list',
        ]);
    }


    public function  addEmployee(){
        $this->loadModel('Registrations');
        $this->loadModel('Users');
         
            $errors = array();
            $registration = $this->Registrations->newEmptyEntity();
          if ($this->request->is('post')) {

            $random = rand(100000, 999999);
            $first_name = $this->request->getData('first_name');
            $last_name = $this->request->getData('last_name');
            $email = $this->request->getData('email');
            $password = $this->request->getData('password');
            $telephone = $this->request->getData('telephone');
            $repeatpassword = $this->request->getData('repeatpassword');
            $company_id = $this->request->getData('company_id');
            $companyData = $this->Companies->find('all',[
                'conditions' => [
                    'id in' => $company_id
                ]
            ])->first();

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

                $registration->first_name = $first_name;
                $registration->last_name = $last_name;
                $registration->company_name = $companyData->name;
                $registration->company_address = $companyData->address;
                $registration->company_province = $companyData->province;
                $registration->company_city = $companyData->city;
                $registration->company_cap = $companyData->postalcode;
                $registration->company_vat_number = $companyData->vat;
                $registration->company_pec_address = $companyData->pec;
                if(!empty(count($errors))){

                $this->set(compact('registration', 'errors'));
                  $this->set(compact('registration', 'company_id'));

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
                return $this->redirect($this->referer());
          }else{
           $company_id = $this->request->getQuery('company_id');

         
              $this->set(compact('company_id'));

          }

    }

    public function companyProfile(){
        $this->loadModel('Companies');
        $user_id = $this->request->getAttribute('identity')->getIdentifier();
        $company_id = $this->request->getQuery('company_id');
        $companyData = $this->Companies->find('all',[
            'conditions' => [
                'id is' => $company_id
            ]
        ])->first();
    
        $company_members = $this->CompaniesUsers->find('all',[
            'conditions' => [
                'CompaniesUsers.company_id is' => $company_id
            ]
        ])->contain(['Users'])->toArray();
      
        $this->set(compact('companyData', 'company_id','company_members'));
    }

    public function editCompanyData(){


        if ($this->request->is('post')) {

             $this->loadModel('Cities');
            $fromDbCities = $this->Cities->find('all')->select(['name', 'province'])->order(['province' => 'ASC', 'name' => 'ASC'])->toArray();
            $cities = array();
            foreach ($fromDbCities as $city) {
                if (!array_key_exists($city->province, $cities)) {
                    $cities[$city->province] = $city;
                }
            }
            $errors = array();
            $company_id = $this->request->getData('company_id');
            $name = $this->request->getData('name');
            $address = $this->request->getData('address');
            $province = $this->request->getData('province');
            $city = $this->request->getData('city');
            $postal_code = $this->request->getData('postalcode');
            $vat = $this->request->getData('vat');
            $pec = $this->request->getData('pec');
            $updatecompany = $this->Companies->find('all',[
                'conditions' => [
                    'id is' => $company_id
                ]
            ])->first();
           
          

            //validations

          if(!empty($province) && !empty($city)){

                $citydata = $this->Cities->find('all',[
                'conditions' => [
                'province' => $province,
                'name' => $city
                ]
                ])->first();

                if ($citydata->postcodes == $postal_code) {
                    $updatecompany->postal_code = $postal_code;
                } else {
                    $postalcode_validation = array('postalcode' => 'Postal Code is Invalid !');
                    $errors = $errors +  $postalcode_validation;
                    $updatecompany->postal_code = $postal_code;
                }
            }


            if(!empty($vat)){
                  $regExpression = '^[0-9]{10}|[0-9]{12}$^';
                  if (!preg_match($regExpression, $vat)) {
                    $vatvalidation = array('vat' => 'Wronge VAT Number');
                       $errors = $errors + $vatvalidation;
                }
               $updatecompany->vat = $vat;

            }

          

           if(!empty($pec))
           {
             $pec_reg = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
                
                if (!preg_match($pec_reg, $pec)) {
                     $pecvalidation = array('pec' => 'Wronge PEC Format');

                   $errors = $errors + $pecvalidation;
                }
                 $updatecompany->pec = $pec;
           }

            $updatecompany->name = $name;
            $updatecompany->address = $address;
            $updatecompany->province = $province;
            $updatecompany->city = $city;
            
            if(!empty(count($errors))){

                $this->set(compact('updatecompany', 'errors', 'cities', 'company_id'));

                return;
            }
        $this->Companies->save($updatecompany);
       $this->Flash->success(__('Company Data Updated Successfully.'));
         return $this->redirect([
                'controller' => 'companies',
                'action' => 'company-profile',
                'company_id' => $updatecompany->id
            ]);
        }  

            $this->loadModel('Cities');
            $fromDbCities = $this->Cities->find('all')->select(['name', 'province'])->order(['province' => 'ASC', 'name' => 'ASC'])->toArray();
            $cities = array();
            foreach ($fromDbCities as $city) {
                if (!array_key_exists($city->province, $cities)) {
                    $cities[$city->province] = $city;
                }
            }

            $company_id = $this->request->getQuery('company_id');
            $companyData = $this->Companies->find('all',[
                'conditions' => [
                    'id is' => intval($company_id)
                ]
            ])->first();
          $this->set(compact('companyData', 'company_id', 'cities'));

        
    }

    public function getcompanydata(){

        $company_id = $this->request->getQuery('companyId');
        
        $companydata = $this->Companies->find('all',[
            'conditions' => [
                'id is' => $company_id
            ]
        ])->first();

         $this->autoRender = false;
        return $this->response->withType('application/json')->withStringBody(json_encode($companydata));

    }
}
