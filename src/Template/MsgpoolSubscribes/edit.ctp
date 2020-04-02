<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $msgpoolSubscribe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $msgpoolSubscribe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolSubscribe->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Msgpool Subscribes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Msgpool Actions'), ['controller' => 'MsgpoolActions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Msgpool Action'), ['controller' => 'MsgpoolActions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="msgpoolSubscribes form large-9 medium-8 columns content">
    <?= $this->Form->create($msgpoolSubscribe) ?>
    <fieldset>
        <legend><?= __('Edit Msgpool Subscribe') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('date');
            echo $this->Form->control('sender_point');
            echo $this->Form->control('source');
            echo $this->Form->control('type');
            echo $this->Form->control('level');
            echo $this->Form->control('grouping');
            echo $this->Form->control('msgpool_action_id', ['options' => $msgpoolActions, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
