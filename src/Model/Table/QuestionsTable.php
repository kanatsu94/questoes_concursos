<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class QuestionsTable extends Table{
        public function initialize(array $config){
            $this->table('question');
            $this->belongsTo('Tests', ['foreignKey' => 'test_id']);
            $this->belongsTo('Disciplines', ['foreignKey' => 'discipline_id']);
            $this->hasMany('QuestionsAlternatives');
        }
    }