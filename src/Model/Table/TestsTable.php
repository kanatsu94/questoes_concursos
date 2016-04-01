<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class TestsTable extends Table{
        public function initialize(array $config){
            $this->table('test');
            $this->hasMany('Questions', ['foreignKey' => 'test_id']);
            $this->belongsTo('TrainingsAreas', [
                'foreignKey' => 'training_area_id'
            ]);
            $this->displayField('date_test');
        }
    }