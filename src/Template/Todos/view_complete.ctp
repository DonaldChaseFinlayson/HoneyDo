<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="todos index large-9 medium-8 columns content">
    <h3><?= __('Completed Tasks:') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <?php foreach ($todos as $todo): ?>
            <tr>
                <td><h2><?= $this->Html->link(__(h($todo->title)), ['action' => 'view', $todo->id]) ?></h2></td>
                <td><strong>Created:</strong> <?= h($todo->created) ?></td>
                <td><strong>Completed:</strong><?= h($todo->completedAt) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__("<h2><strong>&times;</strong></h2>"), ['action' => 'delete', $todo->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete "{0}"?', $todo->title)]) ?>
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
