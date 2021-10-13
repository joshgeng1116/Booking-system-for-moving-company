<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Staffs Controller
 *
 * @property \App\Model\Table\StaffsTable $Staffs
 * @property \App\Model\Table\AllocationTable $Allocation
 * @property \App\Model\Table\JobsTable $Jobs
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use Cake\Mailer\Mailer;

class StaffsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $staffs = $this->paginate($this->Staffs);

        $this->set(compact('staffs'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('staff'));
    }

    public function get_name($id = null)
    {
        $staffs = $this->Staffs->find('list', ['condition' => ['id' => $id],]);

        return $staffs;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staffs->newEmptyEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $this->set(compact('staff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            $staff->staff_type = $this->request->getData('staff_type');
            $staff->password = $this->request->getData('password');
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $this->set(compact('staff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staffs->get($id);
        if ($this->Staffs->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $staffs = $this->getTableLocator()->get('Staffs');
        $email = $password = '';
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData('password');
            $staff = $staffs->find()->where(['email_address' => $email, 'password' => $password])->select(['id'])->first();
            if ($staff != null) {
                $staff_type = $staffs->find()->where(['id' => $staff->get('id')])->select(['staff_type'])->first();
                if ($staff_type->get('staff_type') == 0) {
                    return $this->redirect(['controller' => 'Jobs', 'action' => 'index']);
                } else {
                    return $this->redirect(['controller' => 'Jobs', 'action' => 'indexdriver', $staff->get('id')]);
                }
            } else {
                return $this->redirect(['action' => 'login_failed']);
            }
        }
        $this->set(compact('staffs', 'email', 'password'));
    }

    public function loginFailed()
    {
        $staffs = $this->getTableLocator()->get('Staffs');
        $email = $password = '';
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData('password');
            $staff = $staffs->find()->where(['email_address' => $email, 'password' => $password])->select(['id'])->first();
            if ($staff != null) {
                $staff_type = $staffs->find()->where(['id' => $staff->get('id')])->select(['staff_type'])->first();
                if ($staff_type->get('staff_type') == 0) {
                    return $this->redirect(['controller' => 'Jobs', 'action' => 'index']);
                } else {
                    return $this->redirect(['controller' => 'Jobs', 'action' => 'indexdriver', $staff->get('id')]);
                }
            } else {
                return $this->redirect(['action' => 'login_failed']);
            }
        }
        $this->set(compact('staffs', 'email', 'password'));
    }

    public function sendResetEmail()
    {
        $staffs = $this->getTableLocator()->get('Staffs');
        $email = '';
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $staff = $staffs->find()->where(['email_address' => $email])->select(['id'])->first();
            if ($staff != null) {
                $mailer = new Mailer('default');
                $mailer->setFrom(['joshgeng1116@gmail.com' => 'Easy Peasy Removal Admin'])
                    ->setTo($email)
                    ->setSubject('Password reset link')
                    ->deliver('' . $staff->id);

                return $this->redirect(['action' => 'sendEmailSuccessed']);
            } else {
                return $this->redirect(['action' => 'sendEmailFailed']);
            }
        }
        $this->set(compact('staffs', 'email'));
    }

    public function sendEmailFailed()
    {
        $staffs = $this->getTableLocator()->get('Staffs');
        $email = '';
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $staff = $staffs->find()->where(['email_address' => $email])->select(['id'])->first();
            if ($staff != null) {
                $mailer = new Mailer('default');
                $mailer->setFrom(['joshgeng1116@gmail.com' => 'Easy Peasy Removal Admin'])
                    ->setTo($email)
                    ->setSubject('Password reset link')
                    ->deliver('' . $staff->id);

                return $this->redirect(['action' => 'sendEmailSuccessed']);
            } else {
                return $this->redirect(['action' => 'sendEmailFailed']);
            }
        }
        $this->set(compact('staffs', 'email'));
    }

    public function sendEmailSuccessed()
    {
        $staffs = $this->getTableLocator()->get('Staffs');
        $email = '';
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $staff = $staffs->find()->where(['email_address' => $email])->select(['id'])->first();
            if ($staff != null) {
                $mailer = new Mailer('default');
                $mailer->setFrom(['joshgeng1116@gmail.com' => 'Easy Peasy Removal Admin'])
                    ->setTo($email)
                    ->setSubject('Password reset link')
                    ->deliver('' . $staff->id);

                return $this->redirect(['action' => 'sendEmailSuccessed']);
            } else {
                return $this->redirect(['action' => 'sendEmailFailed']);
            }
        }
        $this->set(compact('staffs', 'email'));
    }

    public function resetPassword($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            $staff->staff_type = $this->request->getData('staff_type');
            $staff->password = $this->request->getData('password');
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $this->set(compact('staff'));
    }
}
