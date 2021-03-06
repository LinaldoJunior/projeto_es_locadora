<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentMethods Controller
 *
 * @property \App\Model\Table\PaymentMethodsTable $PaymentMethods
 *
 * @method \App\Model\Entity\PaymentMethod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentMethodsController extends AppController
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

                $paymentMethods = $this->paginate($this->PaymentMethods);

                $this->set(compact('paymentMethods'));

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
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $paymentMethod = $this->PaymentMethods->get($id, [
                    'contain' => ['Rentals']
                ]);

                $this->set('paymentMethod', $paymentMethod);

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

                $paymentMethod = $this->PaymentMethods->newEntity();
                if ($this->request->is('post')) {
                    $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->getData());
                    if ($this->PaymentMethods->save($paymentMethod)) {
                        $this->Flash->success(__('The payment method has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
                }
                $this->set(compact('paymentMethod'));

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
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $paymentMethod = $this->PaymentMethods->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->getData());
                    if ($this->PaymentMethods->save($paymentMethod)) {
                        $this->Flash->success(__('The payment method has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
                }
                $this->set(compact('paymentMethod'));

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
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $this->request->allowMethod(['post', 'delete']);
                $paymentMethod = $this->PaymentMethods->get($id);

                $paymentMethod['active'] = 0;
                if ($this->PaymentMethods->save($paymentMethod)) {
                    $this->Flash->success(__('The payment method has been disabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The payment method could not be disabled. Please, try again.'));

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
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function active($id = null)
    {


        if ($this->Auth->user()){
            $loggedUser = $this->Auth->user();
            if ($loggedUser['access_admin']){

                $this->request->allowMethod(['post', 'delete']);
                $paymentMethod = $this->PaymentMethods->get($id);

                $paymentMethod['active'] = 1;
                if ($this->PaymentMethods->save($paymentMethod)) {
                    $this->Flash->success(__('The payment method has been enabled.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The payment method could not be enabled. Please, try again.'));

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
