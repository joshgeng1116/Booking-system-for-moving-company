<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 * @property \App\Model\Table\AllocationTable $Allocation
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Allocation'],
        ];
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Allocation'],
        ]);

        $this->set(compact('job'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEmptyEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['controller' => 'pages','action' => 'display']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $allocation = $this->Jobs->Allocation->find('list', ['limit' => 200]);
        $this->set(compact('job', 'allocation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $allocation = $this->Jobs->Allocation->find('list', ['limit' => 200]);
        $this->set(compact('job', 'allocation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * AddAllocation method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function addAllocation($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Allocation'],
        ]);
        $allocation = $this->Jobs->Allocation->newEmptyEntity();
        if ($this->request->is('post')) {
            $allocation = $this->Jobs->Allocation->patchEntity($allocation, $this->request->getData());
            if ($this->Jobs->Allocation->save($allocation)) {
                $this->Flash->success(__('The allocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allocation could not be saved. Please, try again.'));
        }
        $staffs = $this->Jobs->Allocation->Staffs->find('list', ['keyField' => 'id', 'valueField' => function ($e) {
            return $e->first_name . ' ' . $e->last_name . ' ' . $e->more;
        }]);
        $vehicles = $this->Jobs->Allocation->Vehicles->find('list', ['keyField' => 'id', 'valueField' => function ($e) {
            return $e->rego_number . ' / ' . $e->vehicle_type . ' ' . $e->more;
        }]);
        $this->set(compact('job', 'allocation', 'staffs', 'vehicles'));
    }
}
