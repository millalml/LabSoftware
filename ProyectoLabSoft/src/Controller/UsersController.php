<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
	
	public function isAuthorized($user)
	{
		if(isset($user['user_type']) and $user['user_type'] === 'user_puli')
		{
			if(in_array($this->request->action, ['home', 'view', 'logout']))
			{
				return true;
			}
		}

		if(isset($user['user_type']) and $user['user_type'] === 'user_produc')
		{
			if(in_array($this->request->action, ['home', 'view', 'logout']))
			{
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

	public function login()
	{
		if($this->request->is('post'))
		{
			$user = $this->Auth->identify();
			if($user)
			{
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Flash->error('Datos invalidos, intente nuevamente', ['key' => 'auth']);
			}
		}

		if ($this->Auth->user()) 
		{
			return $this->redirect(['controller' => 'Users', 'action' => 'home']);
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function home()
	{
		$this->render();
	}

	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set('users', $users);
	}

	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user', $user);
	}

	public function add()
	{
		$user = $this->Users->newEntity();

		if ($this->request->is('post')) 
		{
			$user = $this->Users->patchEntity($user, $this->request->data);

				if($this->Users->save($user))
				{
					$this->Flash->success('El usuario ha sido creado correctamente.');
					return $this->redirect(['controller' => 'Users', 'action' => 'index']);
				}
				else
				{
					$this->Flash->error('El usuario no pudo ser creado. Intentelo nuevamente.');
				}
		}

		$this->set(compact('user'));
	}

	public function edit($id = null)
	{
		$user = $this->Users->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) 
		{
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) 
			{
				$this->Flash->success('El usuario ha sido modificado');
				return $this->redirect(['action' => 'index']);
			}
			else
			{
				$this->Flash->error('El usuario no pudo ser modificado. Intente nuevamente.');
			}
		}

		$this->set(compact('user'));
	}

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);

		if ($this->Users->delete($user)) 
		{
			$this->Flash->success('El usuario ha sido eliminado exitosamente.');
		}
		else
		{
			$this->Flash->error('El usuario no pudo ser eliminado. Intentelo nuevamente.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
