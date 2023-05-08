<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * ItensSeed seed.
 */
class ItensSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'nome' => 'Arroz',
                'quantidade' => '1kg',
                'perecivel' => 1,
                'data_validade' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_validade
                'data_fabricacao' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_fabricacao
                'preco' => 5.99,
                'unidade_medida' => 'Quilograma'
            ],
            [
                'nome' => 'Feijão',
                'quantidade' => '500g',
                'perecivel' => 1,
                'data_validade' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_validade
                'data_fabricacao' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_fabricacao
                'preco' => 3.49,
                'unidade_medida' => 'Gramas'
            ],
            [
                'nome' => 'Camiseta',
                'quantidade' => 0,
                'perecivel' => '0',
                'data_validade' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_validade
                'data_fabricacao' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_fabricacao
                'preco' => 29.99,
                'unidade_medida' => 'Unidade'
            ],
            [
                'nome' => 'Smartphone',
                'quantidade' => 0,
                'perecivel' => '0',
                'data_validade' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_validade
                'data_fabricacao' => date('Y-m-d', strtotime('+1 year')), // valor padrão para data_fabricacao
                'preco' => 1099.99,
                'unidade_medida' => 'Unidade'
            ],
            // adicione mais registros aqui
        ];

        $table = $this->table('itens');
        $table->insert($data)->save();
    }
}
