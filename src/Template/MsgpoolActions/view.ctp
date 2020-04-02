<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $msgpoolAction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Msgpool Action'), ['action' => 'edit', $msgpoolAction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Msgpool Action'), ['action' => 'delete', $msgpoolAction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolAction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Msgpool Actions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Msgpool Action'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Msgpool Subscribe'), ['controller' => 'MsgpoolSubscribe', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Msgpool Subscribe'), ['controller' => 'MsgpoolSubscribe', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="msgpoolActions view large-9 medium-8 columns content">
    <h3><?= h($msgpoolAction->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($msgpoolAction->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($msgpoolAction->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Msgpool Subscribe') ?></h4>
        <?php if (!empty($msgpoolAction->msgpool_subscribe)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Sender Point') ?></th>
                <th scope="col"><?= __('Source') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col"><?= __('Grouping') ?></th>
                <th scope="col"><?= __('Msgpool Action Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($msgpoolAction->msgpool_subscribe as $msgpoolSubscribe): ?>
            <tr>
                <td><?= h($msgpoolSubscribe->id) ?></td>
                <td><?= h($msgpoolSubscribe->user_id) ?></td>
                <td><?= h($msgpoolSubscribe->date) ?></td>
                <td><?= h($msgpoolSubscribe->sender_point) ?></td>
                <td><?= h($msgpoolSubscribe->source) ?></td>
                <td><?= h($msgpoolSubscribe->type) ?></td>
                <td><?= h($msgpoolSubscribe->level) ?></td>
                <td><?= h($msgpoolSubscribe->grouping) ?></td>
                <td><?= h($msgpoolSubscribe->msgpool_action_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MsgpoolSubscribe', 'action' => 'view', $msgpoolSubscribe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MsgpoolSubscribe', 'action' => 'edit', $msgpoolSubscribe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MsgpoolSubscribe', 'action' => 'delete', $msgpoolSubscribe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolSubscribe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
