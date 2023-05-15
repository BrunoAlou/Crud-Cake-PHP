<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Iten extends Entity
{
    protected $_accessible = [
        'nome' => true,
        'unidade_medida' => true,
        'quantidade' => true,
        'preco' => true,
        'perecivel' => true,
        'data_validade' => true,
        'data_fabricacao' => true,
    ];
}
