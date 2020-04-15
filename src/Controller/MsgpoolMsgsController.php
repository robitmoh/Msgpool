<?php
namespace Msgpool\Controller;

use Msgpool\Controller\AppController;

/**
 * MsgpoolMsgs Controller
 *
 * @property \Msgpool\Model\Table\MsgpoolMsgsTable $MsgpoolMsgs
 *
 * @method \Msgpool\Model\Entity\MsgpoolMsg[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsgpoolMsgsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Owners', 'Entities']
        ];
        $msgpoolMsgs = $this->paginate($this->MsgpoolMsgs);

        $this->set(compact('msgpoolMsgs'));
    }


     public function subscribedMsgs() {

        $this->MsgpoolMsgs->belongsTo('MsgpoolSubscribes', array(
                                                    'foreignKey' => false,
                                                    'conditions' => array(
                                                                        'MsgpoolMsgs.source = MsgpoolSubscribes.source',
                                                                        'MsgpoolMsgs.type like MsgpoolSubscribes.type',
                                                                        'MsgpoolMsgs.sender_point like MsgpoolSubscribes.sender_point'
                                                                    )                                    
                                                                )
        );
        
        /*$this->paginate = [
            'contain' => ['Users', 'Owners', 'Entities','MsgpoolSubscribes'],
             'conditions' => ['MsgpoolSubscribes.user_id'=>7]
        ];
        

        $msgpoolMsgs = $this->paginate($this->MsgpoolMsgs);
        */
        $msgpoolMsgs=array();
        $msgpoolMsgsall = $this->MsgpoolMsgs->find('all',[
                'contain' => ['Users', 'Owners', 'Entities','MsgpoolSubscribes'],
                'conditions' => ['MsgpoolSubscribes.user_id'=>6]
         ])->toArray();

        //debug($msgpoolMsgsall);
        foreach ($msgpoolMsgsall as $key => $value) {
//            debug($value);
            $level=$this->MsgpoolMsgs->Entities->user_level($value['entity_id'],6);
            if ($value['msgpool_subscribe']->level=='viewer'){
                $msgpoolMsgs[$key]=$value;
                $msgpoolMsgs[$key]['subscriber_id']=$value['msgpool_subscribe']->id;
                $msgpoolMsgs[$key]['level']=$level;
            }
            

            
            # code...
        }

        $this->set(compact('msgpoolMsgs'));
     //   $this->render('index');


    }
    /**
     * View method
     *
     * @param string|null $id Msgpool Msg id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $msgpoolMsg = $this->MsgpoolMsgs->get($id, [
            'contain' => ['Users', 'Owners', 'Entities']
        ]);

        $this->set('msgpoolMsg', $msgpoolMsg);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $msgpoolMsg = $this->MsgpoolMsgs->newEntity();
        if ($this->request->is('post')) {
            $msgpoolMsg = $this->MsgpoolMsgs->patchEntity($msgpoolMsg, $this->request->getData());
            if ($this->MsgpoolMsgs->save($msgpoolMsg)) {
                $this->Flash->success(__('The msgpool msg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgpool msg could not be saved. Please, try again.'));
        }
        $users = $this->MsgpoolMsgs->Users->find('list', ['limit' => 200]);
        $owners = $this->MsgpoolMsgs->Owners->find('list', ['limit' => 200]);
        $entities = $this->MsgpoolMsgs->Entities->find('list', ['limit' => 200]);
        $this->set(compact('msgpoolMsg', 'users', 'owners', 'entities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Msgpool Msg id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $msgpoolMsg = $this->MsgpoolMsgs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $msgpoolMsg = $this->MsgpoolMsgs->patchEntity($msgpoolMsg, $this->request->getData());
            if ($this->MsgpoolMsgs->save($msgpoolMsg)) {
                $this->Flash->success(__('The msgpool msg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgpool msg could not be saved. Please, try again.'));
        }
        $users = $this->MsgpoolMsgs->Users->find('list', ['limit' => 200]);
        $owners = $this->MsgpoolMsgs->Owners->find('list', ['limit' => 200]);
        $entities = $this->MsgpoolMsgs->Entities->find('list', ['limit' => 200]);
        $this->set(compact('msgpoolMsg', 'users', 'owners', 'entities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Msgpool Msg id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $msgpoolMsg = $this->MsgpoolMsgs->get($id);
        if ($this->MsgpoolMsgs->delete($msgpoolMsg)) {
            $this->Flash->success(__('The msgpool msg has been deleted.'));
        } else {
            $this->Flash->error(__('The msgpool msg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
