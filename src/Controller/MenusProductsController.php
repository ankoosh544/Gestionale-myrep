<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MenusProducts Controller
 *
 * @property \App\Model\Table\MenusProductsTable $MenusProducts
 * @method \App\Model\Entity\MenusProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenusProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus', 'Products'],
        ];
        $menusProducts = $this->paginate($this->MenusProducts);

        $this->set(compact('menusProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Menus Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menusProduct = $this->MenusProducts->get($id, [
            'contain' => ['Menus', 'Products'],
        ]);

        $this->set(compact('menusProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menusProduct = $this->MenusProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $menusProduct = $this->MenusProducts->patchEntity($menusProduct, $this->request->getData());
            if ($this->MenusProducts->save($menusProduct)) {
                $this->Flash->success(__('The menus product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menus product could not be saved. Please, try again.'));
        }
        $menus = $this->MenusProducts->Menus->find('list', ['limit' => 200])->all();
        $products = $this->MenusProducts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('menusProduct', 'menus', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menus Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menusProduct = $this->MenusProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menusProduct = $this->MenusProducts->patchEntity($menusProduct, $this->request->getData());
            if ($this->MenusProducts->save($menusProduct)) {
                $this->Flash->success(__('The menus product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menus product could not be saved. Please, try again.'));
        }
        $menus = $this->MenusProducts->Menus->find('list', ['limit' => 200])->all();
        $products = $this->MenusProducts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('menusProduct', 'menus', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menus Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menusProduct = $this->MenusProducts->get($id);
        if ($this->MenusProducts->delete($menusProduct)) {
            $this->Flash->success(__('The menus product has been deleted.'));
        } else {
            $this->Flash->error(__('The menus product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
