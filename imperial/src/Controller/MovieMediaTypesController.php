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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'MediaTypes']
        ];
        $movieMediaTypes = $this->paginate($this->MovieMediaTypes);

        $this->set(compact('movieMediaTypes'));
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
        $movieMediaType = $this->MovieMediaTypes->get($id, [
            'contain' => ['Movies', 'MediaTypes', 'Rentals']
        ]);

        $this->set('movieMediaType', $movieMediaType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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

    /**
     * Edit method
     *
     * @param string|null $id Movie Media Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
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

    /**
     * Delete method
     *
     * @param string|null $id Movie Media Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movieMediaType = $this->MovieMediaTypes->get($id);
        if ($this->MovieMediaTypes->delete($movieMediaType)) {
            $this->Flash->success(__('The movie media type has been deleted.'));
        } else {
            $this->Flash->error(__('The movie media type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
