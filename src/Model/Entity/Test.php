<?php
    namespace App\Model\Entity;

    use Cake\ORM\Entity;
    use Cake\ORM\TableRegistry;

    class Test extends Entity{
        public function _getQuestions(){
            $alternatives = TableRegistry::get('Questions');
            return $alternatives->find('all')->where(['test_id' => $this->id])->toArray();
        }
        
        public function _getTrainingArea(){
            $trainingArea = TableRegistry::get('TrainingsAreas');
            return $trainingArea->get($this->training_area_id);
        }
        
        public function _getInstitution(){
            $institution = TableRegistry::get('Institutions');
            return $institution->get($this->institution_id);
        }
    }