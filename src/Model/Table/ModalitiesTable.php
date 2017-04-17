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
            ->requirePresence('name');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name'], 'Esta modalidade já existe'));

        $rules->add(
            function ($modality) {
                if ($modality->is_by_days == 0) {
                    return $modality->min_modality_hour != null;
                }
                return true;
            },
            [
                'errorField' => 'min_modality_hour',
                'message' => 'Você precisa especificar a carga horária mínima'
            ]
        );

        $rules->add(
            function ($modality) {
                if ($modality->is_by_days == 1) {
                    return $modality->min_modality_days != null;
                }
                return true;
            },
            [
                'errorField' => 'min_modality_days',
                'message' => 'Você precisa especificar o número mínimo de dias letivos'
            ]
        );

        return $rules;
    }
}
