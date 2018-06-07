<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ControlManObra Controller
 *
 * @property \App\Model\Table\ControlManObraTable $ControlManObra
 *
 * @method \App\Model\Entity\ControlManObra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ControlManObraController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['user_type']) and $user['user_type'] === 'user_puli')
        {
            if(in_array($this->request->action, ['add', 'index', 'edit', 'delete']))
            {
                return true;
            }
        }

        if(isset($user['user_type']) and $user['user_type'] === 'user_produc')
        {
            if(in_array($this->request->action, ['add', 'index', 'edit', 'delete']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user('id')]
        ];
        $this->set('controlManObra', $this->paginate($this->ControlManObra));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controlManObra = $this->ControlManObra->newEntity();
        if ($this->request->is('post')) 
        {
            $controlManObra = $this->ControlManObra->patchEntity($controlManObra, $this->request->data);
            $controlManObra->user_id = $this->Auth->user('id');
            if ($this->ControlManObra->save($controlManObra)) 
            {
                $this->Flash->success('El registro ha sido creado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser creado. Intentelo nuevamente.');
            }
        }
        $this->set(compact('controlManObra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Control Man Obra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controlManObra = $this->ControlManObra->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controlManObra = $this->ControlManObra->patchEntity($controlManObra, $this->request->getData());
            if ($this->ControlManObra->save($controlManObra)) {
                $this->Flash->success(__('The control man obra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The control man obra could not be saved. Please, try again.'));
        }
        $users = $this->ControlManObra->Users->find('list', ['limit' => 200]);
        $this->set(compact('controlManObra', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Control Man Obra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $controlManObra = $this->ControlManObra->get($id);
        if ($this->ControlManObra->delete($controlManObra)) {
            $this->Flash->success(__('The control man obra has been deleted.'));
        } else {
            $this->Flash->error(__('The control man obra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
