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
 index large-9 medium-8 columns content
<div class="msgpoolMsgs panel">
    <h3><?= __('Msgpool Msgs') ?></h3>
    
    <div class="panel-body">
            <?php foreach ($msgpoolMsgs as $msgpoolMsg): ?>
            
                <div class="row borders bg-info">
                    <!--
                    <div class="col-md-1"><?= $this->Number->format($msgpoolMsg->id) ?></div>
                    <div class="col-md-1"><?= h($msgpoolMsg->date) ?></div>
                    <div class="col-md-1"><?= h($msgpoolMsg->sender_point) ?></div>
                    <div class="col-md-1"><?= h($msgpoolMsg->source) ?></div>
                    <div class="col-md-1"><?= h($msgpoolMsg->type) ?></div>
                    <div class="col-md-1"><?= $msgpoolMsg->has('user') ? $this->Html->link($msgpoolMsg->user->name, ['controller' => 'Users', 'action' => 'view', $msgpoolMsg->user->id]) : '' ?></div>
                    <div class="col-md-1"><?= $this->Number->format($msgpoolMsg->owner_id) ?></div>
                    <div class="col-md-1"><?= h($msgpoolMsg->msg_type) ?></div>
                    <div class="col-md-1"><?= $this->Number->format($msgpoolMsg->entity_id) ?></div>
                    
                    <div class="col-md-1"><?= $this->Number->format($msgpoolMsg->state) ?></div>
                -->
                    <div class="col-sm-2"><?= $this->Html->link($this->Number->format($msgpoolMsg->entity_id), ['plugin'=>null,'prefix'=>'admin','controller' => 'tickets', 'action' => 'edit',$msgpoolMsg->entity_id])?></div>
                    <div class="col-sm-2"><?= h($msgpoolMsg->source) ?></div>
                    <div class="col-sm-4"><?= h($msgpoolMsg->sender_point) ?></div>
                    <div class="col-sm-1"><?= h($msgpoolMsg->type) ?></div>
                    <div class="col-md-2"><?= (implode(',', $msgpoolMsg->level)) ?></div>
                    <div class="col-md-1"><?= $this->Html->link($this->Number->format($msgpoolMsg->msgpool_subscribe->id), ['plugin'=>'Msgpool','prefix'=>null,'controller' => 'msgpoolSubscribes', 'action' => 'edit',$msgpoolMsg->msgpool_subscribe->id]) ?></div>
                </div>
                <div class="row borders">
                    <?php 
                        $msg=json_decode($msgpoolMsg->msg);
                        //debug($msg);
                    ?>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5"><p><?= h(@$msg->name) ?></p></div>
                    <div class="col-sm-5"><p><?php
                                                    $doc = new DOMDocument();
                                                    libxml_use_internal_errors(true);

                                                    $doc->loadHTML('<?xml encoding="utf-8" ?>'. $msg->story);
                                                    libxml_clear_errors();
                                                    echo $doc->saveHTML();
                            ?>  
                            </p>
                    </div>
                </div>

            <tr>
        
            </tr>
            <?php endforeach; ?>
        
    </div>
<!--
if ($this->elementExists('Trip/'.$current_step)) {
   echo $this->element('Trip/'.$current_step);
 } else {
   echo $this->element('Trip/default.ctp');  
 } 
-->
</div>

