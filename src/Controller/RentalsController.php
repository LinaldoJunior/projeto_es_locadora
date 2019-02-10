<?php
namespace App\Controller;

use App\Controller\AppController;
use DateTime;

/**
 * Rentals Controller
 *
 * @property \App\Model\Table\RentalsTable $Rentals
 *
 * @method \App\Model\Entity\Rental[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RentalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PaymentMethods', 'Users']
        ];
        $rentals = $this->paginate($this->Rentals);

        $this->set(compact('rentals'));
    }

    /**
     * View method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rental = $this->Rentals->get($id, [
            'contain' => ['PaymentMethods', 'Users', 'RentalItems', 'RentalItems.MovieMediaTypes', 'RentalItems.MovieMediaTypes.Movies', 'RentalItems.MovieMediaTypes.MediaTypes']
        ]);

        $saldo = 0;

        foreach ($rental->rental_items as $rental_items):

            $value = $rental_items->movie_media_type->movie->released == 0 ? ($rental_items->quantity * $rental_items->movie_media_type->media_type->price) : $rental_items->quantity * $rental_items->movie_media_type->media_type->price  * 1.5;
            $saldo = $saldo + $value;

        endforeach;


        $interval = $rental->end_date->diff(new DateTime());
        $dias = $interval->d;

        debug($dias);

        $multa = $dias != 0 ? ($saldo * $dias) : 0;

        $total = $saldo + $multa - $rental->pre_paid;

        $this->set(compact('rental', 'saldo', 'dias', 'multa', 'total'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rental = $this->Rentals->newEntity();
        if ($this->request->is('post')) {
            $rental = $this->Rentals->patchEntity($rental, $this->request->getData());
            if ($this->Rentals->save($rental)) {
                $this->Flash->success(__('The rental has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rental could not be saved. Please, try again.'));
        }
        $paymentMethods = $this->Rentals->PaymentMethods->find('list', ['limit' => 200]);
        $users = $this->Rentals->Users->find('list', ['limit' => 200]);
        $this->set(compact('rental', 'paymentMethods', 'users', 'movieMediaTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rental = $this->Rentals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rental = $this->Rentals->patchEntity($rental, $this->request->getData());
            if ($this->Rentals->save($rental)) {
                $this->Flash->success(__('The rental has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rental could not be saved. Please, try again.'));
        }
        $paymentMethods = $this->Rentals->PaymentMethods->find('list', ['limit' => 200]);
        $users = $this->Rentals->Users->find('list', ['limit' => 200]);
        $this->set(compact('rental', 'paymentMethods', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rental = $this->Rentals->get($id);

        $rental['active'] = 0;
        if ($this->Rentals->save($rental)) {
            $this->Flash->success(__('The rental has been disabled.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The rental could not be disabled. Please, try again.'));

        return $this->redirect(['action' => 'index']);
    }
    /**
     * Active method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rental = $this->Rentals->get($id);

        $rental['active'] = 1;
        if ($this->Rentals->save($rental)) {
            $this->Flash->success(__('The rental has been enabled.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The rental could not be enabled. Please, try again.'));

        return $this->redirect(['action' => 'index']);
    }
}
