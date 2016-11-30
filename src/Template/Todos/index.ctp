<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Todo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Completed To Dos'), ['controller' => 'Todos', 'action' => 'viewComplete']) ?></li>
    </ul>
</nav>
<div class="todos index large-9 medium-8 columns content">
    <h3><?= __('Todos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $todo): ?>
            <tr>
                <td><?= h($todo->title) ?></td>
                <td><?= $todo->has('user') ? $this->Html->link($todo->user->id, ['controller' => 'Users', 'action' => 'view', $todo->user->id]) : '' ?></td>
                <td><?= h($todo->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $todo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $todo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $todo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todo->id)]) ?>
                    <?= $this->Form->postLink(__('Complete'), ['action' => 'complete', $todo->id], ['confirm' => __('Are you sure you\'ve completed "{0}"', $todo->title)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
