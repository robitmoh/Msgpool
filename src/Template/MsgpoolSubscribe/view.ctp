<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $msgpoolSubscribe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Msgpool Subscribe'), ['action' => 'edit', $msgpoolSubscribe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Msgpool Subscribe'), ['action' => 'delete', $msgpoolSubscribe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolSubscribe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Msgpool Subscribe'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Msgpool Subscribe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Msgpool Actions'), ['controller' => 'MsgpoolActions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Msgpool Action'), ['controller' => 'MsgpoolActions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="msgpoolSubscribe view large-9 medium-8 columns content">
    <h3><?= h($msgpoolSubscribe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $msgpoolSubscribe->has('user') ? $this->Html->link($msgpoolSubscribe->user->name, ['controller' => 'Users', 'action' => 'view', $msgpoolSubscribe->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($msgpoolSubscribe->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Point') ?></th>
            <td><?= h($msgpoolSubscribe->sender_point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($msgpoolSubscribe->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($msgpoolSubscribe->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($msgpoolSubscribe->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grouping') ?></th>
            <td><?= h($msgpoolSubscribe->grouping) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Msgpool Action') ?></th>
            <td><?= $msgpoolSubscribe->has('msgpool_action') ? $this->Html->link($msgpoolSubscribe->msgpool_action->name, ['controller' => 'MsgpoolActions', 'action' => 'view', $msgpoolSubscribe->msgpool_action->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($msgpoolSubscribe->id) ?></td>
        </tr>
    </table>
</div>
