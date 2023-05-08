<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItensFixture
 */
class ItensFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'unidade_medida' => 'Lorem ipsum dolor sit amet',
                'quantidade' => 'Lorem ipsum dolor sit amet',
                'preco' => 'Lorem ipsum dolor sit amet',
                'perecivel' => 1,
                'data_validade' => '2023-05-08',
                'data_fabricacao' => '2023-05-08',
            ],
        ];
        parent::init();
    }
}
