<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MovieMediaTypes Controller
 *
 * @property \App\Model\Table\MovieMediaTypesTable $MovieMediaTypes
 *
 * @method \App\Model\Entity\MovieMediaType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovieMediaTypesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Auth');
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

                $this->paginate = [
                    'contain' => ['Movies', 'MediaTypes']
                ];
                $movieMediaTypes = $this->paginate($this->MovieMediaTypes);

                $this->set(compact('movieMediaTypes'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Movie Media Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $movieMediaType = $this->MovieMediaTypes->get($id, [
                    'contain' => ['Movies', 'MediaTypes', 'Rentals']
                ]);

                $this->set('movieMediaType', $movieMediaType);

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
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

                $movieMediaType = $this->MovieMediaTypes->newEntity();
                if ($this->request->is('post')) {
                    $movieMediaType = $this->MovieMediaTypes->patchEntity($movieMediaType, $this->request->getData());
                    if ($this->MovieMediaTypes->save($movieMediaType)) {
                        $this->Flash->success(__('The movie media type has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The movie media type could not be saved. Please, try again.'));
                }
                $movies = $this->MovieMediaTypes->Movies->find('list', ['limit' => 200]);
                $mediaTypes = $this->MovieMediaTypes->MediaTypes->find('list', ['limit' => 200]);
                $this->set(compact('movieMediaType', 'movies', 'mediaTypes'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie Media Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $movieMediaType = $this->MovieMediaTypes->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $movieMediaType = $this->MovieMediaTypes->patchEntity($movieMediaType, $this->request->getData());
                    if ($this->MovieMediaTypes->save($movieMediaType)) {
                        $this->Flash->success(__('The movie media type has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The movie media type could not be saved. Please, try again.'));
                }
                $movies = $this->MovieMediaTypes->Movies->find('list', ['limit' => 200]);
                $mediaTypes = $this->MovieMediaTypes->MediaTypes->find('list', ['limit' => 200]);
                $this->set(compact('movieMediaType', 'movies', 'mediaTypes'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie Media Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){


                $this->request->allowMethod(['post', 'delete']);
                $movieMediaType = $this->MovieMediaTypes->get($id);

                $movieMediaType['active'] = 0;
                if ($this->MovieMediaTypes->save($movieMediaType)) {
                    $this->Flash->success(__('The movie media type has been disabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The movie media type could not be disabled. Please, try again.'));

                return $this->redirect(['action' => 'index']);

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
    }
    /**
     * Active method
     *
     * @param string|null $id Movie Media Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {



        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){


                $this->request->allowMethod(['post', 'put']);
                $movieMediaType = $this->MovieMediaTypes->get($id);

                $movieMediaType['active'] = 1;
                if ($this->MovieMediaTypes->save($movieMediaType)) {
                    $this->Flash->success(__('The movie media type has been enabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The movie media type could not be enabled. Please, try again.'));

                return $this->redirect(['action' => 'index']);

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
    }

}
