<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateItens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('itens');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('unidade_medida', 'enum', [
            'default' => null,
            'null' => false,
            'values' => ['Litro', 'Quilograma', 'Unidade', 'Gramas'],
        ]);
        $table->addColumn('quantidade', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('preco', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('perecivel', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('data_validade', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('data_fabricacao', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
