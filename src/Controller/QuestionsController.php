<?php
    namespace App\Controller;

    use Cake\ORM\TableRegistry;

    class QuestionsController extends AppController{
        public $paginate = [
            'limit' => 5
        ];
        
        public function initialize(){
            parent::initialize();
            
            $this->loadComponent('Paginator');
            $this->loadComponent('RequestHandler');
        }
        
        public function index(){
            $discipline = $this->request->data('discipline');
            $keyword = $this->request->data('keyword');
            $testFilter = $this->request->data('test-filter');
                        
            $questoes = $this->filter($discipline, $keyword, $testFilter);

            $this->set('questions', $this->paginate($questoes));
            $this->set('disciplines', $this->_getDisciplines());
            $this->set('testFilter', $this->_getTests());
        }
        
        private function _getTrainingsAreas(){
            $trainingAreaTable = TableRegistry::get('TrainingsAreas');
            $array = $trainingAreaTable->find('list')->toArray();
            
            array_unshift($array, null);
            
            return $array;
        }
        
        private function _getDisciplines(){
            $disciplineTable = TableRegistry::get('Disciplines');
            $array = $disciplineTable->find('list')->toArray();
            
            array_unshift($array, null);
            
            return $array;
        }
        
        private function _getInstitutions(){
            $institutionTable = TableRegistry::get('Institutions');
            $array = $institutionTable->find('list')->toArray();
            
            array_unshift($array, null);
            
            return $array;
        }
                
        private function _getTests(){
            $testTable = TableRegistry::get('Tests');
            $array = $testTable->find('list')->toArray();
            
            array_unshift($array, null);
            
            return $array;
        }
        
        public function back(){
            $this->request->referer();
        }
        
        public function answer(){
            //sleep(3);
            if ($this->request->is('ajax')) { 
                $req_data = $this->request->data();
                                
                if(array_key_exists("a_id",$req_data)){
                    $questoesTable = TableRegistry::get('Questions');
                    $question = $questoesTable->findById($req_data["q_id"])->first();

                    if($req_data["a_id"] == $question->answer){
                        $msg = "<p class='success'>Você acertou!</p>";
                    } else{
                        $msg = "<p class='error'>Você errou!</p>";
                    }
                }
                else {
                    $msg = "<p class='error'>Selecione sua resposta!</p>";
                }
                $this->set("msg", $msg);
            }
        }
        
        public function filter($discipline, $keyword, $testFilter){
            $questoesTable = TableRegistry::get('Questions');
            
            $query = $questoesTable->find('all');
            
            if($discipline != 0){
                $query = $query->where(['discipline_id =' => $discipline]);
            }
            if($testFilter != 0){
                $query = $query->where(['test_id =' => $testFilter]);
            }
            if(strlen(trim($keyword)) > 0){
                $keyword = '%'.$keyword.'%';
                $query = $query->where(['description LIKE' => $keyword]);
            }
                        
            return $query;
        }
    }