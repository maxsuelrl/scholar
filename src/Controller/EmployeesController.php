<?php

namespace App\Controller;

class EmployeesController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Employees.name' => 'asc']
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');

        if ($this->Employees->find()->count() == 0) {
            $this->Auth->allow(['add']);
        }
    }

    public function index()
    {
        $search_field = 'Nome';
        $search_value = '';
        if ($this->request->is('post')) {
            $search_field = $this->request->getData('search_field');
            $search_value = $this->request->getData('search_value');

            $employees = $this->Employees->find('all', ['contain' => ['Users']])
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $employees = $this->Employees->find('all', ['contain' => ['Users']]);
        }
        $employees = $this->paginate($employees);
        $this->set(compact('employees'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData(), ['associated' => ['Users']]);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('O funcionário foi cadastrado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível cadastrar o funcionário.'));
        }
        $this->set('employee', $employee);

        $this->set('title', 'Novo Funcionário');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, ['contain' => ['Users']]);
        if ($this->request->is('put')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('O funcionário foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o funcionário.'));
        }
        $this->set('employee', $employee);

        $this->set('title', 'Editando Funcionário');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $employee = $this->Employees->get($id);
        $name = $employee->name;
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('O funcionário "{0}" foi excluído da base de dados.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
