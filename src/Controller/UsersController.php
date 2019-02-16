<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Auth');
        $this->loadModel('Rentals');
    }



    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Permitir aos usuários se registrarem e efetuar logout.
        // Você não deve adicionar a ação de "login" a lista de permissões.
        // Isto pode causar problemas com o funcionamento normal do AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $users = $this->paginate($this->Users);
                $this->set(compact('users'));


            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }


    }
    /**
     * Attendats Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function attendants()
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){
                $attendants = $this->Users->find('all')
                    ->where(['Users.access_attendant' => 1]);
                $users = $this->paginate($attendants);
                $this->set(compact('users'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }

    /**
     * Clients Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function clients()
    {



        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $clients = $this->Users->find('all')
                    ->where(['Users.access_attendant' => 0,
                        'Users.access_admin' => 0]);
                $users = $this->paginate($clients);

                $this->set(compact('users'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }
        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $user = $this->Users->get($id);


                $childs = $this->Users->find('all')

                    ->where(['Users.parent_id' => $id])->toArray();

                $users1 = TableRegistry::get('Users');
                $users1->recover();

                $rentals = $this->Rentals->find('all')->where([
                    'Rentals.client_id' => $id
                ]);

                $this->set(compact('dependents', 'childs', 'user', 'rentals'));


            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $user = $this->Users->newEntity();
                if ($this->request->is('post')) {
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
                $this->set(compact('user'));


            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }
    /**
     * Add attendant method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addAttendant()
    {



        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $user = $this->Users->newEntity();
                if ($this->request->is('post')) {
                    $client = $this->request->getData();
                    $client['access_admin'] = 0;
                    $user = $this->Users->patchEntity($user, $client);
                    debug($user);
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
                $this->set(compact('user'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }
    /**
     * Add client method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addClient()
    {
        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $user = $this->Users->newEntity();
                if ($this->request->is('post')) {
                    $client = $this->request->getData();
                    $client['access_admin'] = 0;
                    $client['access_attendant'] = 0;
                    $client['active'] = 1;
                    $user = $this->Users->patchEntity($user, $client);
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
                $this->set(compact('user'));
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }
    /**
     * Add dependent method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addDependent($client_id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $user = $this->Users->newEntity();
                if ($this->request->is('post')) {
                    $client = $this->request->getData();
                    $client['access_admin'] = 0;
                    $client['access_attendant'] = 0;
                    $client['active'] = 1;

                    $parent = $this->Users->find('all')
                        ->where([
                            'Users.id' => $client_id,
                            'Users.parent_id is' => null
                        ])->first();
                    $childs = $this->Users->find('all')
                        ->where(['Users.parent_id' => $client_id])->toArray();

                    if ($parent){

                        $client['parent_id'] = $client_id;
                        $user = $this->Users->patchEntity($user, $client);



                        if (count($childs) < 3){
                            if ($this->Users->save($user)) {
                                $this->Flash->success(__('The user has been saved.'));

                                return $this->redirect(['action' => 'index']);
                            }
                            $this->Flash->error(__('The user could not be saved. Please, try again.'));
                        }
                        else{
                            $this->Flash->error(__('The user could not be saved because you reached the limit of dependents.'));
                        }



                    }
                    else{
                        $this->Flash->error(__('The parent could not be find or you are a dependent. Please, try again.'));
                    }


                }
                $this->set(compact('user'));
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $user = $this->Users->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been saved.'));

                        if ($user['access_attendant']){
                            return $this->redirect(['action' => 'attendants']);
                        }
                        else {
                            return $this->redirect(['action' => 'clients']);
                        }

                    }
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
                $this->set(compact('user'));
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $this->request->allowMethod(['post', 'delete']);
                $user = $this->Users->get($id);

                $user['active'] = 0;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been disabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be disabled. Please, try again.'));

                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }
    /**
     * Active method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {



        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $this->request->allowMethod(['post', 'delete']);
                $user = $this->Users->get($id);

                $user['active'] = 1;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been enabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be enabled. Please, try again.'));

                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'User' ,'action' => 'login']);
        }
    }
    /**
     * login method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {
        $this->viewBuilder()->setLayout('home');
        if ($this->Auth->user()){
            return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
        }
        else{
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'));
            }
        }

    }
    /**
     * logout method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function logout()
    {
        $this->Auth->logout();
        if ($this->Auth->user()){

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }


    }

}
