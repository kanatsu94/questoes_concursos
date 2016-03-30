<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class QuestionsTable extends Table{
        public function initialize(array $config){
            $this->table('question');
            $this->hasOne('Tests');
            $this->belongsTo('Disciplines');
            $this->hasMany('QuestionsAlternatives');
        }
    }