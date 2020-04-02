<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $msgpoolAction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Msgpool Actions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Msgpool Subscribe'), ['controller' => 'MsgpoolSubscribe', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Msgpool Subscribe'), ['controller' => 'MsgpoolSubscribe', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="msgpoolActions form large-9 medium-8 columns content">
    <?= $this->Form->create($msgpoolAction) ?>
    <fieldset>
        <legend><?= __('Add Msgpool Action') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
