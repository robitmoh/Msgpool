<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $msgpoolSubscribes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Msgpool Subscribe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Msgpool Actions'), ['controller' => 'MsgpoolActions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Msgpool Action'), ['controller' => 'MsgpoolActions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="msgpoolSubscribes index large-9 medium-8 columns content">
    <h3><?= __('Msgpool Subscribes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sender_point') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grouping') ?></th>
                <th scope="col"><?= $this->Paginator->sort('msgpool_action_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($msgpoolSubscribes as $msgpoolSubscribe): ?>
            <tr>
                <td><?= $this->Number->format($msgpoolSubscribe->id) ?></td>
                <td><?= $msgpoolSubscribe->has('user') ? $this->Html->link($msgpoolSubscribe->user->name, ['controller' => 'Users', 'action' => 'view', $msgpoolSubscribe->user->id]) : '' ?></td>
                <td><?= h($msgpoolSubscribe->date) ?></td>
                <td><?= h($msgpoolSubscribe->sender_point) ?></td>
                <td><?= h($msgpoolSubscribe->source) ?></td>
                <td><?= h($msgpoolSubscribe->type) ?></td>
                <td><?= h($msgpoolSubscribe->level) ?></td>
                <td><?= h($msgpoolSubscribe->grouping) ?></td>
                <td><?= $msgpoolSubscribe->has('msgpool_action') ? $this->Html->link($msgpoolSubscribe->msgpool_action->name, ['controller' => 'MsgpoolActions', 'action' => 'view', $msgpoolSubscribe->msgpool_action->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $msgpoolSubscribe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $msgpoolSubscribe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $msgpoolSubscribe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolSubscribe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
