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
            $questoesTable = TableRegistry::get('Questions');
            
            $questoes = $questoesTable->find('all');
            
            $this->set('user_id', 1);
            $this->set('questions', $this->paginate($questoes));
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
    }