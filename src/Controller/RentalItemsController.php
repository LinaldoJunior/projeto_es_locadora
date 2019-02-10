<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RentalItems Controller
 *
 * @property \App\Model\Table\RentalItemsTable $RentalItems
 *
 * @method \App\Model\Entity\RentalItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RentalItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rentals', 'MovieMediaTypes']
        ];
        $rentalItems = $this->paginate($this->RentalItems);

        $this->set(compact('rentalItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Rental Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rentalItem = $this->RentalItems->get($id, [
            'contain' => ['Rentals', 'MovieMediaTypes']
        ]);

        $this->set('rentalItem', $rentalItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rentalItem = $this->RentalItems->newEntity();
        if ($this->request->is('post')) {
            $rentalItem = $this->RentalItems->patchEntity($rentalItem, $this->request->getData());
            if ($this->RentalItems->save($rentalItem)) {
                $this->Flash->success(__('The rental item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rental item could not be saved. Please, try again.'));
        }
        $rentals = $this->RentalItems->Rentals->find('list', ['limit' => 200]);
        $movieMediaTypes = $this->RentalItems->MovieMediaTypes->find('list', ['limit' => 200]);
        $this->set(compact('rentalItem', 'rentals', 'movieMediaTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rental Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rentalItem = $this->RentalItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rentalItem = $this->RentalItems->patchEntity($rentalItem, $this->request->getData());
            if ($this->RentalItems->save($rentalItem)) {
                $this->Flash->success(__('The rental item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rental item could not be saved. Please, try again.'));
        }
        $rentals = $this->RentalItems->Rentals->find('list', ['limit' => 200]);
        $movieMediaTypes = $this->RentalItems->MovieMediaTypes->find('list', ['limit' => 200]);
        $this->set(compact('rentalItem', 'rentals', 'movieMediaTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rental Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rentalItem = $this->RentalItems->get($id);
        if ($this->RentalItems->delete($rentalItem)) {
            $this->Flash->success(__('The rental item has been deleted.'));
        } else {
            $this->Flash->error(__('The rental item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
