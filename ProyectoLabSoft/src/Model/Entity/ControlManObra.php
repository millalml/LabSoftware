<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ControlManObra Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $fecha
 * @property string $producto
 * @property string $color
 * @property string $material
 * @property string $talla
 * @property int $cantidad
 * @property string $ref
 * @property string $cliente
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class ControlManObra extends Entity
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
        'fecha' => true,
        'producto' => true,
        'color' => true,
        'material' => true,
        'talla' => true,
        'cantidad' => true,
        'ref' => true,
        'cliente' => true,
        'user_id' => true,
        'user' => true
    ];
}
