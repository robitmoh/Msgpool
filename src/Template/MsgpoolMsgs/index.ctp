<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $msgpoolMsgs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Msgpool Msg'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="msgpoolMsgs index large-9 medium-8 columns content">
    <h3><?= __('Msgpool Msgs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sender_point') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('owner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('msg_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($msgpoolMsgs as $msgpoolMsg): ?>
            <tr>
                <td><?= $this->Number->format($msgpoolMsg->id) ?></td>
                <td><?= h($msgpoolMsg->date) ?></td>
                <td><?= h($msgpoolMsg->sender_point) ?></td>
                <td><?= h($msgpoolMsg->source) ?></td>
                <td><?= h($msgpoolMsg->type) ?></td>
                <td><?= $msgpoolMsg->has('user') ? $this->Html->link($msgpoolMsg->user->name, ['controller' => 'Users', 'action' => 'view', $msgpoolMsg->user->id]) : '' ?></td>
                <td><?= $this->Number->format($msgpoolMsg->owner_id) ?></td>
                <td><?= h($msgpoolMsg->msg_type) ?></td>
                <td><?= $this->Number->format($msgpoolMsg->entity_id) ?></td>
                <td><?= h($msgpoolMsg->level) ?></td>
                <td><?= $this->Number->format($msgpoolMsg->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $msgpoolMsg->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $msgpoolMsg->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $msgpoolMsg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $msgpoolMsg->id)]) ?>
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

