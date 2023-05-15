<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class ItensVenda extends Entity
{
    protected $_accessible = [
        'venda_id' => true,
        'item_id' => true,
        'venda' => true,
    ];
}
