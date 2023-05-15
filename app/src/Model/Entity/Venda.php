<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Venda extends Entity
{
    protected $_accessible = [
        'pessoa_id' => true,
        'vendedor_id' => true,
        'pessoa' => true,
        'itens_venda' => true,
    ];
}
