<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Cadastrar usuário') ?></legend>
    <?php
        echo $this->Form->input('name', ['label' => 'Nome']);
        echo $this->Form->input('email', ['label' => 'E-mail']);
        echo $this->Form->input('username', ['label' => 'Usuário']);
        echo $this->Form->input('password', ['label' => 'Senha']);
    ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>