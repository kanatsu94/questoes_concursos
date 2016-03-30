<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class QuestionsAlternativesTable extends Table{
        public function initialize(array $config){
            $this->table('question_alternative');
            $this->belongsTo('Questions');
            $this->displayField('alternative');
        }
    }