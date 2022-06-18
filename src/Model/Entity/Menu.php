<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $price_without_tax
 * @property int|null $tax_id
 * @property string|null $price_with_tax
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\Tax $tax
 * @property \App\Model\Entity\Product[] $products
 */
class Menu extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'price_without_tax' => true,
        'tax_id' => true,
        'price_with_tax' => true,
        'updated_at' => true,
        'created_at' => true,
        'tax' => true,
        'products' => true,
    ];
}
