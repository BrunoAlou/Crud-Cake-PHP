<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class PessoasSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html#the-run-method
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'nome' => 'Fulano de Tal',
                'cpf' => '123.456.789-00',
                'endereco' => 'Rua A, 123',
                'telefone' => '(11) 98765-4321',
            ],
            [
                'nome' => 'Ciclano da Silva',
                'cpf' => '987.654.321-00',
                'endereco' => 'Av. B, 456',
                'telefone' => '(11) 91234-5678',
            ],
            [
                'nome' => 'Beltrano Pereira',
                'cpf' => '111.222.333-00',
                'endereco' => 'Praça C, 789',
                'telefone' => '(11) 92345-6789',
            ]
        ];

        $table = $this->table('pessoas');
        $table->insert($data)->save();
    }
}
