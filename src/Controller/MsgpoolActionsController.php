<?php
namespace Msgpool\Controller;

use Msgpool\Controller\AppController;

/**
 * MsgpoolActions Controller
 *
 * @property \Msgpool\Model\Table\MsgpoolActionsTable $MsgpoolActions
 *
 * @method \Msgpool\Model\Entity\MsgpoolAction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsgpoolActionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $msgpoolActions = $this->paginate($this->MsgpoolActions);

        $this->set(compact('msgpoolActions'));
    }

    /**
     * View method
     *
     * @param string|null $id Msgpool Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $msgpoolAction = $this->MsgpoolActions->get($id, [
            'contain' => ['MsgpoolSubscribe']
        ]);

        $this->set('msgpoolAction', $msgpoolAction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $msgpoolAction = $this->MsgpoolActions->newEntity();
        if ($this->request->is('post')) {
            $msgpoolAction = $this->MsgpoolActions->patchEntity($msgpoolAction, $this->request->getData());
            if ($this->MsgpoolActions->save($msgpoolAction)) {
                $this->Flash->success(__('The msgpool action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgpool action could not be saved. Please, try again.'));
        }
        $this->set(compact('msgpoolAction'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Msgpool Action id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $msgpoolAction = $this->MsgpoolActions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $msgpoolAction = $this->MsgpoolActions->patchEntity($msgpoolAction, $this->request->getData());
            if ($this->MsgpoolActions->save($msgpoolAction)) {
                $this->Flash->success(__('The msgpool action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgpool action could not be saved. Please, try again.'));
        }
        $this->set(compact('msgpoolAction'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Msgpool Action id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $msgpoolAction = $this->MsgpoolActions->get($id);
        if ($this->MsgpoolActions->delete($msgpoolAction)) {
            $this->Flash->success(__('The msgpool action has been deleted.'));
        } else {
            $this->Flash->error(__('The msgpool action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
