<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItensVendaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItensVendaTable Test Case
 */
class ItensVendaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItensVendaTable
     */
    protected $ItensVenda;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ItensVenda',
        'app.Vendas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ItensVenda') ? [] : ['className' => ItensVendaTable::class];
        $this->ItensVenda = $this->getTableLocator()->get('ItensVenda', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ItensVenda);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ItensVendaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ItensVendaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
