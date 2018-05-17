<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake \Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $user
 * @property string $password
 * @property string $user_type
 * @property bool $active
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
        'user' => true,
        'password' => true,
        'user_type' => true,
        'active' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}
