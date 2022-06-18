<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClockingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClockingsTable Test Case
 */
class ClockingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClockingsTable
     */
    protected $Clockings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Clockings',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Clockings') ? [] : ['className' => ClockingsTable::class];
        $this->Clockings = $this->getTableLocator()->get('Clockings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Clockings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClockingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClockingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
