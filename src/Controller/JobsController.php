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

    public function indexdriver()
    {

        $this->paginate = [
            'contain' => ['Allocation', 'Allocation.Staffs'],
        ];

        $start_date = $this->request->getQuery('start_date');
        $end_date = $this->request->getQuery('end_date');

        if($start_date != null && $end_date != null) {
            $this->paginate = [
                'conditions' => [
                    'DATE(jobs.date) >=' => $start_date,
                    'DATE(jobs.date) <=' => $end_date,
                ],
            ];

            $jobs = $this->paginate($this->Jobs);

            $this->set(compact('jobs'));
        }else{
            $jobs = $this->paginate($this->Jobs);

            $this->set(compact('jobs'));
        }
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
           $staffs =  $this->getTableLocator()->get('Staffs');
           $vehicles = $this->getTableLocator()->get('Vehicles');
        if ($job->allocation != null) {
            $staff_name_obj1 = $staffs->find()->where(['id' => $job->allocation->staff_member1_id])->select(['first_name','last_name'])->first();
            $staff_name1 = $staff_name_obj1->first_name . ' ' . $staff_name_obj1->last_name;
            $staff_name_obj2 = $staffs->find()->where(['id' => $job->allocation->staff_member2_id])->select(['first_name','last_name'])->first();
            $staff_name2 = $staff_name_obj2->first_name . ' ' . $staff_name_obj2->last_name;
            $vehicleObj = $vehicles->find()->where(['id' => $job->allocation->vehicle_id])->select(['rego_number'])->first();
            $vehicle_rego = $vehicleObj->rego_number;
            $this->set(compact('job', 'staff_name1', 'staff_name2', 'vehicle_rego'));
        } else {
            $this->set(compact('job'));
        }
//        $staff_name_obj1 = $staffs->find()->where(['id'=>$job->allocation->staff_member1_id])->select(['first_name','last_name'])->first();
//        $staff_name1 = $staff_name_obj1->first_name .' '.$staff_name_obj1->last_name;
//        $staff_name_obj2 = $staffs->find()->where(['id'=>$job->allocation->staff_member2_id])->select(['first_name','last_name'])->first();
//        $staff_name2 = $staff_name_obj2->first_name .' '.$staff_name_obj2->last_name;
//        $vehicleObj = $vehicles->find()->where(['id'=>$job->allocation->vehicle_id])->select(['rego_number'])->first();
//        $vehicle_rego = $vehicleObj->rego_number;
//        $this->set(compact('job','staff_name1','staff_name2','vehicle_rego'));
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

                return $this->redirect(['controller' => 'Jobs','action' => 'success']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $allocation = $this->Jobs->Allocation->find('list', ['limit' => 200]);
        $this->set(compact('job', 'allocation'));
    }

    /*
     * Success method
     *
     * for successful form submission
     */

    public function success()
    {
    }

    /*
     * Review success method
     *
     * for successful review form submission
     */

    public function reviewSuccess()
    {
    }

    public function calendar()
    {
        $sizeText = $this->request->getQuery('size');
        $size = 0;
        if($sizeText === "2T"){
            $this->set($size=1);
        }else if ($sizeText == "4T"){
            $this->set($size=2);
        }else if ($sizeText === "8T"){
            $this->set($size=3);
        }else if ($sizeText === "10T"){
            $this->set($size=4);
        }else if ($sizeText === "12T"){
            $this->set($size=5);
        }
        $this->loadModel('Allocation');
        $this->paginate = [
            'contain' => ['Staffs', 'Vehicles'],
        ];
        $allocation = $this->paginate($this->Allocation);
        $this->set(compact('allocation', 'size'));
    }

    /**
     * Review method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function review()
    {
        $id = $this->request->getQuery('id');
        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userData = $this->request->getData();
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $job->feedback_stars = $userData['feedback_stars'];
            $job->feedback_comment = $userData['feedback_comment'];
//            debug($job);
//            exit;
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['controller' => 'Jobs','action' => 'review_success']);
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
        $allocation = $this->Jobs->Allocation->find('list', ['keyField' => 'id', 'valueField' => function ($e) {
            return $this->get_name($e->staff_member1_id) . ' / ' . $this->get_name($e->staff_member2_id) . ' / ' . $this->get_rego($e->vehicle_id);
        }]);
        $this->set(compact('job', 'allocation'));
    }

    public function get_name($id){
        $staffs =  $this->getTableLocator()->get('Staffs');
        $staff_name_obj1 = $staffs->find()->where(['id' => $id])->select(['first_name','last_name'])->first();
        $staff_name1 = $staff_name_obj1->first_name . ' ' . $staff_name_obj1->last_name;
        return $staff_name1;
    }

    public function get_rego($id){
        $vehicles = $this->getTableLocator()->get('Vehicles');
        $vehicleObj = $vehicles->find()->where(['id' => $id])->select(['rego_number'])->first();
        $vehicle_rego = $vehicleObj->rego_number;
        return $vehicle_rego;
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
        //$this->request->allowMethod(['post', 'delete']);
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
            $req = $this->request->getData();
            $allocationObj =  $this->getTableLocator()->get('Allocation');
            $count = $allocationObj->find()
                ->where(['or' => [
                    [
                        'staff_member1_id' => $req['staff_member1_id'],
                        'date' => $req['date'],
                    ],[
                        'staff_member2_id' => $req['staff_member2_id'],
                        'date' => $req['date'],
                    ],[
                        'vehicle_id' => $req['vehicle_id'],
                        'date' => $req['date'],
                    ],[
                        'staff_member1_id' => $req['staff_member1_id'],
                        'staff_member2_id' => $req['staff_member2_id'],
                    ],
                ],
                    ])
                ->count();
            if ($count == 0 && $this->Jobs->Allocation->save($allocation)) {
                $job->allocation = $allocation;
                if ($this->Jobs->save($job)) {
                    $this->Flash->success(__('The allocation has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The allocation could not be saved. Please, try again.'));
            }
            $this->Flash->error(__('The allocation could not be saved. Please, try again.'));
        }
        $staffs = $this->Jobs->Allocation->Staffs->find('list', ['keyField' => 'id', 'valueField' => function ($e) {
            return $e->first_name . ' ' . $e->last_name . ' ' . $e->more;
        }]);
        $vehicles = $this->Jobs->Allocation->Vehicles->find('list', ['keyField' => 'id', 'valueField' => function ($e) {
            return $e->rego_number . ' / ' . $this->type($e->vehicle_type) . ' ' . $e->more;
        }]);
        $this->set(compact('job', 'allocation', 'staffs', 'vehicles'));
    }

    public function type($type)
    {
        if ($type == 1) {
                           return '2T';
        }
        if ($type == 2) {
                          return '4T';
        }
        if ($type == 3) {
                         return '8T';
        }
        if ($type == 4) {
                        return '10T';
        }
        if ($type == 5) {
                       return '12T';
        }

        return 'null';
    }
}
