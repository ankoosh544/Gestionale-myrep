<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClockingsFixture
 */
class ClockingsFixture extends TestFixture
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
                'id' => '288c258e-0974-4e06-97cd-b2996cdc8b32',
                'user_id' => 1,
                'clocking' => '2022-02-15 10:32:01',
                'locale' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
