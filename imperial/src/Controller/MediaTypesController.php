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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mediaTypes = $this->paginate($this->MediaTypes);

        $this->set(compact('mediaTypes'));
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
        $mediaType = $this->MediaTypes->get($id, [
            'contain' => ['MovieMediaTypes']
        ]);

        $this->set('mediaType', $mediaType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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

    /**
     * Edit method
     *
     * @param string|null $id Media Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
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

    /**
     * Delete method
     *
     * @param string|null $id Media Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mediaType = $this->MediaTypes->get($id);
        if ($this->MediaTypes->delete($mediaType)) {
            $this->Flash->success(__('The media type has been deleted.'));
        } else {
            $this->Flash->error(__('The media type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
