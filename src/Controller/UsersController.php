<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */

class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $id = $this->Auth->user('id');
        $this->redirect(['action' => 'view', $id]);
        /*$this->set(compact('users'));
        $this->set('_serialize', ['users']);*/
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('id') == $id){
            $user = $this->Users->get($id, [
                'contain' => ['Todos']
            ]);
        } else {
            $user = $this->Users->get($id);
        }
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Welcome to HoneyDo!'));
                $this->logout();
                $this->login();
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changes could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    /*public function list()
    {

    }*/
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been removed.'));
        } else {
            $this->Flash->error(__('The user could not be removed. Please, try again.'));
        }

        return $this->redirect($this->Auth->logout());
    }
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'view', 'userSearch']);
    }
    public function login($newLogin = false)
    {
        if ($this->request->is('post')) {
            $user = $this->request->data;
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, please try again'));
        }
    }
    public function userSearch()
    {

    }
    public function logout()
    {

        $id = $this->Auth->user('id');
        $user = $this->Users->get($id);
        $this->Flash->success(__($user['firstname'].' was logged out'));
        return $this->redirect($this->Auth->logout());
    }
    public function isAuthorized($user) 
    {
        if(empty($this->request->params['pass'][0]) && !$user == false){
            return true;
        }
        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $viewUser = $this->Users->get($id);
        if ($viewUser->id === $user['id']) {
            return true;
        }
        // If not, return false (or other AppController funcionality to be added)
        return parent::isAuthorized($user);
    }
}
