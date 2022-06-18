<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['filtercities', 'checkpostalcode']);
    }

  public function filtercities()
    {
        $province = $this->request->getQuery('province');
    
            $cities = $this->Cities->find('all', [
                'conditions' => [
                    'province' => $province
                ]
            ])->toArray();
            
        $this->autoRender = false;
        return $this->response->withType('application/json')->withStringBody(json_encode($cities));
    }

      public function checkpostalcode(){
        $city = $this->request->getQuery('city');
        $postalcode = $this->request->getQuery('postalcode');
        $citydata = $this->Cities->find('all',[
            'conditions' => [
                'name' => $city
            ]
        ])->first();

        $result = array();
        if($citydata->postcodes != $postalcode){
            $result = array(
                'RESULT' => "ERROR",
                'MESSAGE' => "Invalid Code",
                'CHECKTASK' => null
            );
        }else{
            $result = array(
                'RESULT' => "SUCCESS",
                'MESSAGE' => "",
                'CHECKTASK' =>  $citydata
            );
        }
        $this->autoRender = false;
        return $this->response->withType('application/json')->withStringBody(json_encode($result));
    }


}
