<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenusProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenusProductsTable Test Case
 */
class MenusProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MenusProductsTable
     */
    protected $MenusProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MenusProducts',
        'app.Menus',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MenusProducts') ? [] : ['className' => MenusProductsTable::class];
        $this->MenusProducts = $this->getTableLocator()->get('MenusProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MenusProducts);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MenusProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
