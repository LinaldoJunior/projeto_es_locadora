<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MovieGenres Controller
 *
 * @property \App\Model\Table\MovieGenresTable $MovieGenres
 *
 * @method \App\Model\Entity\MovieGenre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovieGenresController extends AppController
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

                $movieGenres = $this->paginate($this->MovieGenres);

                $this->set(compact('movieGenres'));

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
     * @param string|null $id Movie Genre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $movieGenre = $this->MovieGenres->get($id, [
                    'contain' => []
                ]);

                $this->set('movieGenre', $movieGenre);

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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {



        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $movieGenre = $this->MovieGenres->newEntity();
                if ($this->request->is('post')) {
                    $movieGenre = $this->MovieGenres->patchEntity($movieGenre, $this->request->getData());
                    debug($movieGenre);
                    if ($this->MovieGenres->save($movieGenre)) {
                        $this->Flash->success(__('The movie genre has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The movie genre could not be saved. Please, try again.'));
                }
                $this->set(compact('movieGenre'));

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
     * Edit method
     *
     * @param string|null $id Movie Genre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $movieGenre = $this->MovieGenres->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $movieGenre = $this->MovieGenres->patchEntity($movieGenre, $this->request->getData());
                    if ($this->MovieGenres->save($movieGenre)) {
                        $this->Flash->success(__('The movie genre has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The movie genre could not be saved. Please, try again.'));
                }
                $this->set(compact('movieGenre'));

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
     * @param string|null $id Movie Genre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $this->request->allowMethod(['post', 'delete']);
                $movieGenre = $this->MovieGenres->get($id);

                $movieGenre['active'] = 0;
                if ($this->MovieGenres->save($movieGenre)) {
                    $this->Flash->success(__('The movie genre has been disabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The movie genre could not be disabled. Please, try again.'));

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
     * Active method
     *
     * @param string|null $id Movie Genre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $this->request->allowMethod(['post', 'delete']);
                $movieGenre = $this->MovieGenres->get($id);

                $movieGenre['active'] = 1;
                if ($this->MovieGenres->save($movieGenre)) {
                    $this->Flash->success(__('The movie genre has been enabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The movie genre could not be enabled. Please, try again.'));

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
