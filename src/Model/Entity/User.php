<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher as DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $password
 *  @property string|null $telephone
 * @property string $role
 * @property string|null $secret_code
 * @property \Cake\I18n\FrozenTime|null $secret_code_expiration
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\Clocking[] $clockings
 */
class User extends Entity
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
        'email' => true,
        'firstname' => true,
        'lastname' => true,
        'password' => true,
        'telephone' => true,
        'role' => true,
        'secret_code' => true,
        'secret_code_expiration' => true,
        'created_at' => true,
        'clockings' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
