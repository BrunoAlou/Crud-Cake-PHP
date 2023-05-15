<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ItensTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('itens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome', 'Por favor, preencha o campo Nome.');

        $validator
            ->scalar('unidade_medida')
            ->requirePresence('unidade_medida', 'create')
            ->notEmptyString('unidade_medida', 'Por favor, selecione uma unidade de medida válida.')
            ->add('unidade_medida', 'inList', [
                'rule' => ['inList', ['Litro', 'Quilograma', 'Unidade', 'Gramas']],
                'message' => 'Por favor, selecione uma unidade de medida válida.'
            ]);

        $validator
            ->scalar('quantidade')
            ->maxLength('quantidade', 255)
            ->requirePresence('quantidade', 'create');

        $validator
            ->decimal('preco', null, 'Por favor, preencha o campo Preco com um valor válido.')
            ->notEmptyString('preco', 'Por favor, preencha o campo preco.')
            ->greaterThan('preco', 0, 'O preço deve ser maior que zero.');

        $validator
            ->boolean('perecivel')
            ->requirePresence('perecivel', 'create');

        $validator
            ->date('data_fabricacao')
            ->requirePresence('data_fabricacao', 'create');

        $validator
            ->date('data_fabricacao')
            ->requirePresence('data_fabricacao', 'create')
            ->notEmptyDate('data_fabricacao', 'Defina uma data de fabricaçao.');

        return $validator;
    }
}
