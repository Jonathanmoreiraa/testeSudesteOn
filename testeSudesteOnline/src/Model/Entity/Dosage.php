<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dosage Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $pest_id
 * @property int $culture_id
 * @property string $permitted_dosage
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Pest $pest
 * @property \App\Model\Entity\Culture $culture
 */
class Dosage extends Entity
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
        'product_id' => true,
        'pest_id' => true,
        'culture_id' => true,
        'permitted_dosage' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'pest' => true,
        'culture' => true,
    ];
}
