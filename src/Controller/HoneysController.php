<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Honeys Controller
 *
 * @property \App\Model\Table\HoneysTable $Honeys
 */
class HoneysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $honeys = $this->paginate($this->Honeys);

        $this->set(compact('honeys'));
        $this->set('_serialize', ['honeys']);
    }

    /**
     * View method
     *
     * @param string|null $id Honey id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $honey = $this->Honeys->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('honey', $honey);
        $this->set('_serialize', ['honey']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $honey = $this->Honeys->newEntity();
        if ($this->request->is('post')) {
            $honey = $this->Honeys->patchEntity($honey, $this->request->data);
            if ($this->Honeys->save($honey)) {
                $this->Flash->success(__('The honey has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The honey could not be saved. Please, try again.'));
            }
        }
        $users = $this->Honeys->Users->find('list', ['limit' => 200]);
        $this->set(compact('honey', 'users'));
        $this->set('_serialize', ['honey']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Honey id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $honey = $this->Honeys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $honey = $this->Honeys->patchEntity($honey, $this->request->data);
            if ($this->Honeys->save($honey)) {
                $this->Flash->success(__('The honey has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The honey could not be saved. Please, try again.'));
            }
        }
        $users = $this->Honeys->Users->find('list', ['limit' => 200]);
        $this->set(compact('honey', 'users'));
        $this->set('_serialize', ['honey']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Honey id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $honey = $this->Honeys->get($id);
        if ($this->Honeys->delete($honey)) {
            $this->Flash->success(__('The honey has been deleted.'));
        } else {
            $this->Flash->error(__('The honey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
