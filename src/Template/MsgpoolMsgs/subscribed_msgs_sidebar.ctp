<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $msgpoolMsgs
 */
?>

<div class="msgpoolMsgs">
    <h3 class="control-sidebar-heading">
         <?=$this->Html->link('Aktivitás', ['plugin'=>'Msgpool','prefix'=>Null,'controller' => 'msgpool-msgs', 'action' => 'subscribedMsgs'])?>
    </h3>
    <div>
        <ul class="control-sidebar-menu">
            <?php foreach ($msgpoolMsgs as $msgpoolMsg): ?>
                <li>
                    <div class="row h8">
                        <div class="col-sm-2">
                            <?= 
                            $this->Html->link($this->Number->format($msgpoolMsg->entity_id), ['plugin'=>null,'prefix'=>'admin','controller' => 'tickets', 'action' => 'edit',$msgpoolMsg->entity_id])?>
                                
                            </div>
                        <div class="col-sm-2"><?= h($msgpoolMsg->source) ?></div>
                        <div class="col-sm-6"><?= h($msgpoolMsg->sender_point) ?></div>
                        <div class="col-sm-1">
                            <span class="label-sm label-info pull-right"><?= h($msgpoolMsg->type) ?></span>
                            
                        </div>

                        
                    </div>
                </li>
                <li>
                    <?php 
                       $msg=json_decode($msgpoolMsg->msg);
                    ?>
                    <div class="h7 menu-info text-white">
                        <p><?= h(@$msg->name) ?></p>
                        <p><?= h($msg->story) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


</div>

