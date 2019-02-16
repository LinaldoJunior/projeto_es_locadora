<?php
namespace App\Controller;
use App\Controller\AppController;


/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 *
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesController extends AppController
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
        $user =$this->Auth->user();

        if ($user){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $this->paginate = [
                    'contain' => ['MovieGenres']
                ];
                $movies = $this->paginate($this->Movies);

                $this->set(compact('movies'));

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }

    }



    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] || $loggedUser['access_attendant']){

                $movie = $this->Movies->get($id, [
                    'contain' => ['MovieGenres', 'MovieMediaTypes', 'MovieMediaTypes.MediaTypes', 'MovieMediaTypes.Movies']
                ]);

                $this->set('movie', $movie);

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user =$this->Auth->user();
        if ($user){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] ){

                $movie = $this->Movies->newEntity();
                if ($this->request->is('post')) {
                    $movie = $this->Movies->patchEntity($movie, $this->request->getData());
                    if ($this->Movies->save($movie)) {
                        $this->Flash->success(__('The movie has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The movie could not be saved. Please, try again.'));
                }
                $movieGenres = $this->Movies->MovieGenres->find('list', ['limit' => 200]);
                $this->set(compact('movie', 'movieGenres'));
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] ){

                $movie = $this->Movies->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $movie = $this->Movies->patchEntity($movie, $this->request->getData());
                    if ($this->Movies->save($movie)) {
                        $this->Flash->success(__('The movie has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The movie could not be saved. Please, try again.'));
                }
                $movieGenres = $this->Movies->MovieGenres->find('list', ['limit' => 200]);
                $this->set(compact('movie', 'movieGenres'));
            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){


                $this->request->allowMethod(['post', 'delete']);
                $movie = $this->Movies->get($id);

                $movie['active'] = 0;
                if ($this->Movies->save($movie)) {
                    $this->Flash->success(__('The movie has been disabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The movie could not be disabled. Please, try again.'));

                return $this->redirect(['action' => 'index']);

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {

        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin'] ){


                $this->request->allowMethod(['post', 'delete']);
                $movie = $this->Movies->get($id);

                $movie['active'] = 1;
                if ($this->Movies->save($movie)) {
                    $this->Flash->success(__('The movie has been enabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The movie could not be enabled. Please, try again.'));

                return $this->redirect(['action' => 'index']);

            }
            else{
                $this->Flash->error(__("You can't do that."));
                return $this->redirect(['controller' => 'Home' ,'action' => 'admin']);
            }

        }
        else{
            return $this->redirect(['controller' => 'Home' ,'action' => 'index']);
        }

    }
}
