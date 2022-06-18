<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','checkmailid']);
    }

    //Login
    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'dashboard',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('E-mail o password errati.'));
        }
    }

    //Logout
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    // Admin AddIns
    public function adminAdd()
    {
        $user = $this->Users->newEmptyEntity();
        $user->email = "alessandro.lopa@sociallibreria.com";
        $user->firstname = "Alessandro";
        $user->lastname = "Lopa";
        $user->password = "slale1234";
        $user->role = "ADMINISTRATOR";
        $user->secret_code = null;
        $user->secret_code_expiration = null;
        $user->created_at = FrozenTime::now();

        if ($this->Users->save($user)) {
            $this->Flash->success(__('Utente creato con successo.'));
        } else {

        }
    }

    public function dashboard()
    {
        
    }

   //Admin View of all Users
    public function adminAllUsersList(){
        $allusers = $this->Users->find('all')->toArray();
        $this->set(compact('allusers'));
    }

    //Admin View of Only Associated Users to Company
    public function adminAllEmployeesList(){
          

        $this->loadModel('CompaniesUsers');
        $company_members = $this->CompaniesUsers->find('all')->contain(['Users', 'Companies'])->toArray();
        $this->set(compact('company_members'));

    }

    //Edit and Update User Data
    public function updateuser(){
      
    }

    //Delete User
    public function deleteuser(){
        $user_id = $this->request->getQuery('user_id');

          $deleteuser = $this->Users->find('all',[
            'conditions' => [
            'id in' => $user_id
            ]
            ])->first();
        $this->Users->delete($deleteuser);
        $this->Flash->success(__('User is Deleted.'));
        return $this->redirect(['action' =>'admin-all-users-list']);
    }


    public function editUserData(){

         if ($this->request->is('post')) {
             $this->loadModel('Companies');
            $companies = $this->Companies->find('all')->toArray();
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
                $user_id = $this->request->getData('user_id');


            
            
                $firstname = $this->request->getData('first_name');
                $lastname = $this->request->getData('last_name');
                $telephone = $this->request->getData('telephone');

                $companyId = $this->request->getData('company_id');


                $this->loadModel('Companies');

                $update_usercompany = $this->Companies->find('all',[
                    'conditions' => [
                        'id in' => $companyId
                    ]
                ])->first();


               
                $address = $this->request->getData('address');
                $province = $this->request->getData('province');
                $city = $this->request->getData('city');
                $postalcode = $this->request->getData('postalcode');

                if($update_usercompany->address != $address){
                     $update_usercompany->address = $address;
                }
               
                $updateuser = $this->Users->find('all',[
                    'conditions' => [
                    'id in' => $user_id
                ]
                ])->first();
                $errors = array();
                if(!empty($telephone)){
                $reg ="/^(\+\d{1,3}[- ]?)?\d{10}$/";
                    if (!preg_match($reg, $telephone)) {
                        $telephonevalidation = array('telephone' => 'Wronge Telephone Format');
                        $errors = $errors + $telephonevalidation;
                    }
                }
               

                if(!empty($province)){
                     $update_usercompany->province = $province;
                       $update_usercompany->city = $city;
                    $citydata = $this->Cities->find('all',[
                        'conditions' => [
                        'province is' => $province,
                        'name is' => $city
                        ]
                    ])->first();
                  

                    if ($citydata->postcodes == $postalcode) {
                         $update_usercompany->postal_code = $postalcode;
                       
                    } else {
                        $postalcode_validation = array('postalcode' => 'Postal Code is Invalid !');
                        $errors = $errors +  $postalcode_validation;
                         $update_usercompany->postal_code = $postalcode;
                    }

                }

        
              
                               
               
                $updateuser->firstname = $firstname;
                $updateuser->lastname = $lastname;
                $updateuser->telephone = $telephone;
           
                if(!empty(count($errors))){
                    $this->set(compact('updateuser','update_usercompany' ,'errors', 'cities', 'defalutcities', 'companies'));
                 return;
                }

                  //update in CompaniesUsers Table
                $this->loadModel('CompaniesUsers');
                $companiesuser = $this->CompaniesUsers->find('all',[
                    'conditions' => [
                        'user_id' => $user_id
                    ]
                ])->first();
                $companiesuser->user_id = $user_id;
                $companiesuser->company_id = $companyId;
                $this->CompaniesUsers->save($companiesuser);

               
                 $this->Companies->save($update_usercompany);
                $this->Users->save($updateuser);
                $this->Flash->success(__('User Data is Updated.'));
                return $this->redirect($this->referer());
         }else{
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
       
            $this->loadModel('CompaniesUsers');
            $user_id = $this->request->getQuery('user_id');
            $company_member = $this->CompaniesUsers->find('all',[
                'conditions' => [
                'user_id in' => $user_id
                ]
            ])->contain(['Users', 'Companies'])->first();
            $this->loadModel('Companies');
            $companies = $this->Companies->find('all')->toArray();

           if(empty($company_member)){
             $this->Flash->error(__('Nessun record trovato.'));
           }

            $this->set(compact('company_member', 'cities', 'defalutcities', 'companies'));

         }  
    }

}
