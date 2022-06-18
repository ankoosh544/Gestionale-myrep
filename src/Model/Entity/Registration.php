<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registration Entity
 *
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string|null $telephone
 * @property string $company_name
 * @property string|null $company_address
 * @property string|null $company_province
 * @property string|null $company_city
 * @property int|null $company_cap
 * @property string|null $company_vat_number
 * @property string|null $company_pec_address
 * @property int|null $validation_code
 * @property \Cake\I18n\FrozenTime $validation_expirydate
 */
class Registration extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'password' => true,
        'telephone' => true,
        'company_name' => true,
        'company_address' => true,
        'company_province' => true,
        'company_city' => true,
        'company_cap' => true,
        'company_vat_number' => true,
        'company_pec_address' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
