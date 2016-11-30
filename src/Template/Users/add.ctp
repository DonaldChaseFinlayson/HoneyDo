<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('New User') ?></legend>
        <?php
            echo $this->Form->input('username', 
                [
                'type' => 'email',
                'placeholder' => 'username@example.com'
                ]);
            echo $this->Form->input('firstname', ['placeholder' => 'John']);
            echo $this->Form->input('lastname', ['placeholder' => 'Smith']);
            echo $this->Form->input('password', [
                'placeholder' =>'Something tricky! We don\'t hash!'
                ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
