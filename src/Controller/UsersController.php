<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');

        $this->Auth->allow(['login']);
    }

    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Usuário ou senha incorretos.');
        }
    }

    public function logout()
    {
        $this->Flash->success('Você saiu do sistema.');
        return $this->redirect($this->Auth->logout());
    }
}
