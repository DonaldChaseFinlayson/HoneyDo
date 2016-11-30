<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Honey'), ['action' => 'edit', $honey->userfrom_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Honey'), ['action' => 'delete', $honey->userfrom_id], ['confirm' => __('Are you sure you want to delete # {0}?', $honey->userfrom_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Honeys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Honey'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="honeys view large-9 medium-8 columns content">
    <h3><?= h($honey->userfrom_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $honey->has('user') ? $this->Html->link($honey->user->id, ['controller' => 'Users', 'action' => 'view', $honey->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userfrom Id') ?></th>
            <td><?= $this->Number->format($honey->userfrom_id) ?></td>
        </tr>
    </table>
</div>
