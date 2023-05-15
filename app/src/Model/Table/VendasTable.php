<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VendasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vendas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vendedores', [
            'foreignKey' => 'vendedor_id',
            'joinType' => 'INNER',
            'className' => 'Pessoas',
        ]);
        $this->hasMany('ItensVenda', [
            'foreignKey' => 'venda_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('pessoa_id')
            ->notEmptyString('pessoa_id');

        $validator
            ->integer('vendedor_id')
            ->requirePresence('vendedor_id', 'create')
            ->notEmptyString('vendedor_id');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('pessoa_id', 'Pessoas'), ['errorField' => 'pessoa_id']);

        return $rules;
    }
}
