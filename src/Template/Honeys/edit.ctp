<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $honey->userfrom_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $honey->userfrom_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Honeys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="honeys form large-9 medium-8 columns content">
    <?= $this->Form->create($honey) ?>
    <fieldset>
        <legend><?= __('Edit Honey') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
