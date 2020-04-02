<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $msgpoolMsg
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Msgpool Msg'), ['action' => 'edit', $msgpoolMsg->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Msgpool Msg'), ['action' => 'delete', $msgpoolMsg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolMsg->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Msgpool Msgs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Msgpool Msg'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="msgpoolMsgs view large-9 medium-8 columns content">
    <h3><?= h($msgpoolMsg->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sender Point') ?></th>
            <td><?= h($msgpoolMsg->sender_point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($msgpoolMsg->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($msgpoolMsg->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $msgpoolMsg->has('user') ? $this->Html->link($msgpoolMsg->user->name, ['controller' => 'Users', 'action' => 'view', $msgpoolMsg->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Msg Type') ?></th>
            <td><?= h($msgpoolMsg->msg_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($msgpoolMsg->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Owner Id') ?></th>
            <td><?= $this->Number->format($msgpoolMsg->owner_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity Id') ?></th>
            <td><?= $this->Number->format($msgpoolMsg->entity_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $this->Number->format($msgpoolMsg->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($msgpoolMsg->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Msg') ?></h4>
        <?= $this->Text->autoParagraph(h($msgpoolMsg->msg)); ?>
    </div>
</div>
