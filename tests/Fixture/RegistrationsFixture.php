<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegistrationsFixture
 */
class RegistrationsFixture extends TestFixture
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
                'email' => '7d670692-7505-4b60-9a38-2a331add5db3',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ',
                'company_name' => 'Lorem ipsum dolor sit amet',
                'company_address' => 'Lorem ipsum dolor sit amet',
                'company_province' => 'Lorem ipsum dolor sit amet',
                'company_city' => 'Lorem ipsum dolor sit amet',
                'company_cap' => 1,
                'company_vat_number' => 'Lorem ipsum dolor sit amet',
                'company_pec_address' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
