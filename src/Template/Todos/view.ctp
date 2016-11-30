<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Todo'), ['action' => 'edit', $todo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Todo'), ['action' => 'delete', $todo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Todos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Todo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="todos view large-9 medium-8 columns content">
    <h3><?= h($todo->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($todo->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $todo->has('user') ? $this->Html->link($todo->user->id, ['controller' => 'Users', 'action' => 'view', $todo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($todo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsCompleted') ?></th>
            <td><?= $this->Number->format($todo->isCompleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($todo->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($todo->description)); ?>
    </div>
</div>
