<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('username')
            ->requirePresence('username', 'Digite um nome de usuário para o aluno')

            ->notEmpty('password')
            ->requirePresence('password', 'Digite uma senha para o usuário do aluno');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username'], 'Alguém já possui este nome de usuário'));

        return $rules;
    }
}
