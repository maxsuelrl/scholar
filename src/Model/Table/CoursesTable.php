<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class CoursesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Modalities');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('modality_id')
            ->requirePresence('modality_id')

            ->notEmpty('name')
            ->requirePresence('name', 'Digite o nome do curso')

            ->notEmpty('course_hour_duration')
            ->requirePresence('name', 'Digite a duração do curso em horas')

            ->notEmpty('lesson_hour_duration')
            ->requirePresence('name', 'Digite a duração de uma aula em minutos');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name'], 'Já existe um curso com este nome'));

        return $rules;
    }
}
