<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class ClassroomsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Courses');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('course_id')
            ->requirePresence('course_id')

            ->notEmpty('name')
            ->requirePresence('name', 'Digite o nome da turma')

            ->notEmpty('day_shifty')
            ->requirePresence('day_shifty', 'Digite o turno da turma');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name'], 'Já existe uma turma com este nome'));

        return $rules;
    }
}
