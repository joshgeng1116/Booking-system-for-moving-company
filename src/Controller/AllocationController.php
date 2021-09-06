<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Allocation Controller
 *
 * @property \App\Model\Table\AllocationTable $Allocation
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AllocationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Staffs', 'Vehicles'],
        ];
        $allocation = $this->paginate($this->Allocation);

        $this->set(compact('allocation'));
    }

    /**
     * View method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $allocation = $this->Allocation->get($id, [
            'contain' => ['Staffs', 'Vehicles', 'Jobs'],
        ]);

        $this->set(compact('allocation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $allocation = $this->Allocation->newEmptyEntity();
        if ($this->request->is('post')) {
            $allocation = $this->Allocation->patchEntity($allocation, $this->request->getData());
            if ($this->Allocation->save($allocation)) {
                $this->Flash->success(__('The allocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allocation could not be saved. Please, try again.'));
        }
        $staffs = $this->Allocation->Staffs->find('list', ['limit' => 200]);
        $vehicles = $this->Allocation->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('allocation', 'staffs', 'vehicles'));
    }
    /**
     * Calender view
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function calendar()
    {   
        $this->paginate = [
            'contain' => ['Staffs', 'Vehicles'],
        ];
        $allocation = $this->paginate($this->Allocation);
        $this->set(compact('allocation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $allocation = $this->Allocation->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $allocation = $this->Allocation->patchEntity($allocation, $this->request->getData());
            if ($this->Allocation->save($allocation)) {
                $this->Flash->success(__('The allocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allocation could not be saved. Please, try again.'));
        }
        $staffs = $this->Allocation->Staffs->find('list', ['limit' => 200]);
        $vehicles = $this->Allocation->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('allocation', 'staffs', 'vehicles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $allocation = $this->Allocation->get($id);
        if ($this->Allocation->delete($allocation)) {
            $this->Flash->success(__('The allocation has been deleted.'));
        } else {
            $this->Flash->error(__('The allocation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
