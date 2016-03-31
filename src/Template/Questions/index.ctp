<?php
    echo $this->Html->script('jquery-2.2.2',array('inline'=>false));
    echo $this->Html->script('ajax',array('inline'=>false));
?>

<script>    
    function hideMsg($id){
        $id.hide(300);
    }
</script>

<?php
    foreach($questions as $question) :
        $prova = $question->_getTests();

        echo '<section>';
        echo '<section>';
        echo '<div class="titulo_questao"><h4>Questão '.$question->id.'</h4></div>';
        echo '<div class="detalhes_questao">';
        echo "<div class='detalhe'><strong class='detalhe_questao'>Prova: </strong>".$prova->_getTrainingArea()->name."</div>";
        echo '<div class="detalhe"><strong class="detalhe_questao">Ano: </strong>'.$prova->date_test->format("Y").'</div>';
        echo '<div class="detalhe"><strong class="detalhe_questao">Instituição: </strong>'.$prova->_getInstitution()->name.'</div>';
        echo '<div class="detalhe"><strong class="detalhe_questao">Disciplina: </strong>'.$question->_getDisciplines()->name.'</div>';
        echo '</div></section>';

        echo '<section>';
        echo "<div id="."'msg_".$question['id']."' style='display:none' ".'onclick=hideMsg($(msg_'.$question['id'].'))'."></div>";
        echo '<pre>'.$question['description'].'</pre>';
        echo $this->Form->create();
        echo $this->Form->radio(
            'answer'.$question['id'], $question->_getQuestionsAlternatives()
        );
        echo "<p id="."'load_".$question['id']."' style='display:none' class='load'><img class='loadimg' src='/img/icon-load.gif' alt='Loading' height='32' width='32'>Aguarde...</p>";
        echo $this->Form->button('Responder', ['class' => 'button-ajax', 'value' => $question['id']]);
        echo $this->Form->end();
        echo '</section>';
        echo '</section>';
    endforeach;
?>

<div class="paginator">
    <ul class="pagination">
        <?php
            echo $this->Paginator->prev('Anterior');
            echo $this->Paginator->numbers();
            echo $this->Paginator->next('Próximo');
        ?>
    </ul>
</div>