<?php $authUser = $this->request->session()->read('Auth.User'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Todos'), ['controller' => 'Todos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Todo'), ['controller' => 'Todos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->firstname ." ". $user->lastname) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __($user->firstname . '\'s To dos') ?></h4>
        <?php if (!empty($user->todos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->todos as $todos): ?>
            <tr>
                <td><?= h($todos->id) ?></td>
                <td><?= h($todos->title) ?></td>
                <td><?= h($todos->description) ?></td>
                <td><?= h($todos->user_id) ?></td>
                <td><?= h($todos->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Todos', 'action' => 'view', $todos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Todos', 'action' => 'edit', $todos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Todos', 'action' => 'delete', $todos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <h3>You do not have permission to access <?= $user->firstname ?>'s To Do list.</h3>
            <p><?php if(!isset($authUser)): ?> Please login, and <?php endif; ?>Send <?= $user->firstname ?> a request to be your Honey.</p>
        <?php endif; ?>
    </div>
</div>
