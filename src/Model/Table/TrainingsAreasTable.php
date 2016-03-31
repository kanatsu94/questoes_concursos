<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class TrainingsAreasTable extends Table{
        public function initialize(array $config){
            $this->table('training_area');
            $this->hasMany('Tests', ['foreignKey' => 'training_area_id']);
        }
    }