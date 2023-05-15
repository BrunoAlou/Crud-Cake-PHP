<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ItensVendaTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('itens_venda');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Itens', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vendas', [
            'foreignKey' => 'venda_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('venda_id')
            ->notEmptyString('venda_id');

        $validator
            ->integer('item_id')
            ->requirePresence('item_id', 'create')
            ->notEmptyString('item_id');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('venda_id', 'Vendas'), ['errorField' => 'venda_id']);

        return $rules;
    }
}
