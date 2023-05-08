<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItensVenda Entity
 *
 * @property int $id
 * @property int $venda_id
 * @property int $item_id
 *
 * @property \App\Model\Entity\Venda $venda
 */
class ItensVenda extends Entity
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
        'venda_id' => true,
        'item_id' => true,
        'venda' => true,
    ];
}
