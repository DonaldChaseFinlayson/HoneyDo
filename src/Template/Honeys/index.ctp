<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Honey'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="honeys index large-9 medium-8 columns content">
    <h3><?= __('Honeys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('userfrom_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userto_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($honeys as $honey): ?>
            <tr>
                <td><?= $this->Number->format($honey->userfrom_id) ?></td>
                <td><?= $honey->has('user') ? $this->Html->link($honey->user->id, ['controller' => 'Users', 'action' => 'view', $honey->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $honey->userfrom_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $honey->userfrom_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $honey->userfrom_id], ['confirm' => __('Are you sure you want to delete # {0}?', $honey->userfrom_id)]) ?>
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
