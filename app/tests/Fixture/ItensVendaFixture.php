<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItensVendaFixture
 */
class ItensVendaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'itens_venda';
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
                'venda_id' => 1,
                'item_id' => 1,
            ],
        ];
        parent::init();
    }
}
