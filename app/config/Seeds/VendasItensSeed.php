<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * VendasItens seed.
 */
class VendasItensSeed extends AbstractSeed
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
        $data = [            [
            'venda_id' => 1,
            'item_id' => 1,
        ],
        [
            'venda_id' => 1,
            'item_id' => 2,
        ],
        [
            'venda_id' => 2,
            'item_id' => 3,
        ],
        [
            'venda_id' => 2,
            'item_id' => 4,
        ],];

        $table = $this->table('itens_venda');
        $table->insert($data)->save();
    }
}
