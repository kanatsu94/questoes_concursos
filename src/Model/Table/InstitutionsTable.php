<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class InstitutionsTable extends Table{
        public function initialize(array $config){
            $this->table('institution');
            $this->hasMany('Tests', ['foreignKey' => 'institution_id']);
        }
    }