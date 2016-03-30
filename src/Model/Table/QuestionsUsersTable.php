<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class QuestionsUsersTable extends Table{
        public function initialize(array $config){
            $this->table('questions_users');
            $this->belongsTo('Users');
            $this->belongsTo('Questions');
        }
    }