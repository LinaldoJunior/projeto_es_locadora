<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MediaTypes Controller
 *
 * @property \App\Model\Table\MediaTypesTable $MediaTypes
 *
 * @method \App\Model\Entity\MediaType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MediaTypesController extends AppController
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

                $mediaTypes = $this->paginate($this->MediaTypes);

                $this->set(compact('mediaTypes'));

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
     * @param string|null $id Media Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $mediaType = $this->MediaTypes->get($id, [
                    'contain' => ['MovieMediaTypes']
                ]);

                $this->set('mediaType', $mediaType);

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

                $mediaType = $this->MediaTypes->newEntity();
                if ($this->request->is('post')) {
                    $mediaType = $this->MediaTypes->patchEntity($mediaType, $this->request->getData());
                    if ($this->MediaTypes->save($mediaType)) {
                        $this->Flash->success(__('The media type has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The media type could not be saved. Please, try again.'));
                }
                $this->set(compact('mediaType'));

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
     * @param string|null $id Media Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $mediaType = $this->MediaTypes->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $mediaType = $this->MediaTypes->patchEntity($mediaType, $this->request->getData());
                    if ($this->MediaTypes->save($mediaType)) {
                        $this->Flash->success(__('The media type has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The media type could not be saved. Please, try again.'));
                }
                $this->set(compact('mediaType'));

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
     * @param string|null $id Media Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $this->request->allowMethod(['post', 'delete']);
                $mediaType = $this->MediaTypes->get($id);

                $mediaType['active'] = 0;
                if ($this->MediaTypes->save($mediaType)) {
                    $this->Flash->success(__('The media type has been disabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The media type could not be disabled. Please, try again.'));

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
     * @param string|null $id Media Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $this->request->allowMethod(['post', 'delete']);
                $mediaType = $this->MediaTypes->get($id);

                $mediaType['active'] = 1;
                if ($this->MediaTypes->save($mediaType)) {
                    $this->Flash->success(__('The media type has been enabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The media type could not be enabled. Please, try again.'));

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
