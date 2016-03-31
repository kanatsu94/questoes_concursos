<?php
    namespace App\Model\Entity;

    use Cake\ORM\Entity;
    use Cake\ORM\TableRegistry;

    class Question extends Entity{
        public function _getQuestionsAlternatives(){
            $alternatives = TableRegistry::get('QuestionsAlternatives');
            return $alternatives->find('list')->where(['question_id' => $this->id])->toArray();
        }
        public function _getTests(){
            $tests = TableRegistry::get('Tests');
            return $tests->get($this->test_id);
        }
        public function _getDisciplines(){
            $discipline = TableRegistry::get('Disciplines');
            return $discipline->get($this->discipline_id);
        }
        
        public function _getQuestionUser($user_id){
            $questionUserTable = TableRegistry::get('QuestionsUsers');
            $result = $questionUserTable->find('all')->where(['user_id' => $user_id, 'question_id' => $this->id])->toArray();
            
            if(count($result) == 0){
                $questionUser = $questionUserTable->newEntity();
                $questionUser->set('userId', $user_id);
            } else{
                $questionUser = $result[0];
            }
            
            return $questionUser;
        }
    }