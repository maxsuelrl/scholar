<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class ModalitiesTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name', 'Digite o nome da disciplina')

            ->notEmpty('subject_hour_duration')
            ->requirePresence('subject_hour_duration', 'Digite a carga horária da disciplina');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name'], 'Esta disciplina já existe'));

        return $rules;
    }
}
