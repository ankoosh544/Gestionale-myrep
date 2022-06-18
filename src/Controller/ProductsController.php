<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function adminAllProductsList()
    {
        $products = $this->Products->find('all', [

        ])->contain([
            'Taxes'
        ])->toArray();

        $this->set(compact('products'));
    }
}
