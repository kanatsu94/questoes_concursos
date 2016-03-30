<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<br>
<?= $this->Html->link(__('Criar uma conta'), ['action' => 'add']) ?>
<?= $this->Form->end() ?>