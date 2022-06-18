<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitiesFixture
 */
class CitiesFixture extends TestFixture
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
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'region' => 'Lorem ipsum dolor sit amet',
                'province' => 'Lorem ipsum dolor sit amet',
                'province_code' => '',
                'cadastral_code' => '',
                'postcodes' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
