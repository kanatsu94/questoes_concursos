<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions Users'), ['controller' => 'QuestionsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questions User'), ['controller' => 'QuestionsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions Users') ?></h4>
        <?php if (!empty($user->questions_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Question Id') ?></th>
                <th><?= __('Answer') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->questions_users as $questionsUsers): ?>
            <tr>
                <td><?= h($questionsUsers->id) ?></td>
                <td><?= h($questionsUsers->user_id) ?></td>
                <td><?= h($questionsUsers->question_id) ?></td>
                <td><?= h($questionsUsers->answer) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'QuestionsUsers', 'action' => 'view', $questionsUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'QuestionsUsers', 'action' => 'edit', $questionsUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionsUsers', 'action' => 'delete', $questionsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
