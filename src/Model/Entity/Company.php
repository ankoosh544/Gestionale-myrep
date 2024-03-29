<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $province
 * @property string|null $city
 * @property int|null $postal_code
 * @property string|null $vat
 * @property string|null $pec
 */
class Company extends Entity
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
        'name' => true,
        'address' => true,
        'province' => true,
        'city' => true,
        'postal_code' => true,
        'vat' => true,
        'pec' => true,
    ];
}
