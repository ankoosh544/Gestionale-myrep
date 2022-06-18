<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenusProductsFixture
 */
class MenusProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'menu_id' => 1,
                'product_id' => 1,
            ],
        ];
        parent::init();
    }
}
