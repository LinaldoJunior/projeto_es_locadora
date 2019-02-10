<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        $this->loadModel('Rentals');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
//        $this->viewBuilder()->setLayout('home');
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }
    /**
     * Attendats Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function attendants()
    {
        $attendants = $this->Users->find('all')
            ->where(['Users.access_attendant' => 1]);
        $users = $this->paginate($attendants);

        $this->set(compact('users'));
    }

    /**
     * Clients Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function clients()
    {
        $clients = $this->Users->find('all')
            ->where(['Users.access_attendant' => 0,
                'Users.access_admin' => 0]);
        $users = $this->paginate($clients);

        $this->set(compact('users'));
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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
    /**
     * Add attendant method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addAttendant()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $client = $this->request->getData();
            $client['access_admin'] = 0;
            $client['access_attendant'] = 1;
            $user = $this->Users->patchEntity($user, $client);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    /**
     * Add client method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addClient()
    {
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
    /**
     * Add dependent method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addDependent($client_id = null)
    {
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


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
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
    /**
     * Active method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {
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

}
