<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Vendas seed.
 */
class VendasSeed extends AbstractSeed
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
            'pessoa_id' => 1,
            'vendedor_id' => 1,
        ],
        [
            'pessoa_id' => 2,
            'vendedor_id' => 1,
        ],
        [
            'pessoa_id' => 3,
            'vendedor_id' => 2,
        ],];

        $table = $this->table('vendas');
        $table->insert($data)->save();
    }
}
