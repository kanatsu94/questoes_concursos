<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class DisciplinesTable extends Table{
        public function initialize(array $config){
            $this->table('discipline');
            $this->hasMany('Questions', ['foreignKey' => 'discipline_id']);
        }
    }