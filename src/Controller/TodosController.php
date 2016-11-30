<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Todos Controller
 *
 * @property \App\Model\Table\TodosTable $Todos
 */
class TodosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => [
                'Todos.user_id' => $this->Auth->user('id'),
                'Todos.isCompleted' => false,
            ]
        ];
        $todos = $this->paginate($this->Todos);

        $this->set(compact('todos'));
        $this->set('_serialize', ['todos']);
    }
    public function viewComplete()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => [
                'Todos.user_id' => $this->Auth->user('id'),
                'Todos.isCompleted' => true,
            ]
        ];
        $todos = $this->paginate($this->Todos);

        $this->set(compact('todos'));
        $this->set('_serialize', ['todos']);
    }

    /**
     * View method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $todo = $this->Todos->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('todo', $todo);
        $this->set('_serialize', ['todo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $todo = $this->Todos->newEntity();
        if ($this->request->is('post')) {
            $todo = $this->Todos->patchEntity($todo, $this->request->data);
            $todo->user_id = $this->Auth->user('id');
            $todo->isCompleted = false;
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $users = $this->Todos->Users->find('list', ['limit' => 200]);
        $this->set(compact('todo', 'users'));
        $this->set('_serialize', ['todo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $todo = $this->Todos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todo = $this->Todos->patchEntity($todo, $this->request->data);

            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $users = $this->Todos->Users->find('list', ['limit' => 200]);
        $this->set(compact('todo', 'users'));
        $this->set('_serialize', ['todo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $todo = $this->Todos->get($id);
        if ($this->Todos->delete($todo)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function complete($id = null)
    {
        $this->request->allowMethod(['post']);
        $todo = $this->Todos->get($id);
        $todo->isCompleted = true;
        $todo->completedAt = Time::now();
        if ($this->Todos->save($todo)) {
            $this->Flash->success(__('You completed a task!'));
        } else {
            $this->Flash->error(__('Task couldn\'t be completed :( Sorry Honey'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {  
        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'viewComplete'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $todo = $this->Todos->get($id);
        
        if ($todo->user_id === $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
