<?php
namespace Msgpool\Controller;

use Msgpool\Controller\AppController;

/**
 * MsgpoolSubscribes Controller
 *
 * @property \Msgpool\Model\Table\MsgpoolSubscribesTable $MsgpoolSubscribes
 *
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsgpoolSubscribesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'MsgpoolActions']
        ];
        $msgpoolSubscribes = $this->paginate($this->MsgpoolSubscribes);

        $this->set(compact('msgpoolSubscribes'));
    }

    /**
     * View method
     *
     * @param string|null $id Msgpool Subscribe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $msgpoolSubscribe = $this->MsgpoolSubscribes->get($id, [
            'contain' => ['Users', 'MsgpoolActions']
        ]);

        $this->set('msgpoolSubscribe', $msgpoolSubscribe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $msgpoolSubscribe = $this->MsgpoolSubscribes->newEntity();
        if ($this->request->is('post')) {
            $msgpoolSubscribe = $this->MsgpoolSubscribes->patchEntity($msgpoolSubscribe, $this->request->getData());
            if ($this->MsgpoolSubscribes->save($msgpoolSubscribe)) {
                $this->Flash->success(__('The msgpool subscribe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgpool subscribe could not be saved. Please, try again.'));
        }
        $users = $this->MsgpoolSubscribes->Users->find('list', ['limit' => 200]);
        $msgpoolActions = $this->MsgpoolSubscribes->MsgpoolActions->find('list', ['limit' => 200]);
        $this->set(compact('msgpoolSubscribe', 'users', 'msgpoolActions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Msgpool Subscribe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $msgpoolSubscribe = $this->MsgpoolSubscribes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $msgpoolSubscribe = $this->MsgpoolSubscribes->patchEntity($msgpoolSubscribe, $this->request->getData());
            if ($this->MsgpoolSubscribes->save($msgpoolSubscribe)) {
                $this->Flash->success(__('The msgpool subscribe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgpool subscribe could not be saved. Please, try again.'));
        }
        $users = $this->MsgpoolSubscribes->Users->find('list', ['limit' => 200]);
        $msgpoolActions = $this->MsgpoolSubscribes->MsgpoolActions->find('list', ['limit' => 200]);
        $this->set(compact('msgpoolSubscribe', 'users', 'msgpoolActions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Msgpool Subscribe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $msgpoolSubscribe = $this->MsgpoolSubscribes->get($id);
        if ($this->MsgpoolSubscribes->delete($msgpoolSubscribe)) {
            $this->Flash->success(__('The msgpool subscribe has been deleted.'));
        } else {
            $this->Flash->error(__('The msgpool subscribe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
