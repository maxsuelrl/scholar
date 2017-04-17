<?php

namespace App\Controller;

class StudentsController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Students.name' => 'asc']
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $search_field = 'Nome';
        $search_value = '';
        if ($this->request->is('post')) {
            $search_field = $this->request->getData('search_field');
            $search_value = $this->request->getData('search_value');

            $students = $this->Students->find('all', ['contain' => ['Users']])
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $students = $this->Students->find('all', ['contain' => ['Users']]);
        }
        $students = $this->paginate($students);
        $this->set(compact('students'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData(), ['associated' => ['Users']]);
            if ($this->Students->save($student)) {
                $this->Flash->success(__('O aluno foi cadastrado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível cadastrar o aluno.'));
        }
        $this->set('student', $student);

        $this->set('title', 'Novo Aluno');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $student = $this->Students->get($id);
        if ($this->request->is('put')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('O aluno foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o aluno.'));
        }
        $this->set('student', $student);

        $this->set('title', 'Editando Aluno');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $student = $this->Students->get($id);
        $name = $student->name;
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('O aluno "{0}" foi excluído da base de dados.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
