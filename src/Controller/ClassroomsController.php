<?php

namespace App\Controller;

class ClassroomsController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Classrooms.name' => 'asc']
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

            $classrooms = $this->Classrooms->find('all', ['contain' => ['Courses']])
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $classrooms = $this->Classrooms->find('all', ['contain' => ['Courses']]);
        }
        $classrooms = $this->paginate($classrooms);
        $this->set(compact('classrooms'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $classroom = $this->Classrooms->newEntity();
        if ($this->request->is('post')) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData(), ['associated' => ['Courses']]);
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('A turma foi cadastrada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível cadastrar a turma.'));
        }
        $this->set('classroom', $classroom);

        $this->set('title', 'Nova Turma');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $classroom = $this->Classrooms->get($id, ['contain' => ['Courses']]);
        if ($this->request->is('put')) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('A turma foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar a turma.'));
        }
        $this->set('classroom', $classroom);

        $this->set('title', 'Editando Turma');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $classroom = $this->Employees->get($id);
        $name = $classroom->name;
        if ($this->Classrooms->delete($classroom)) {
            $this->Flash->success(__('A turma "{0}" foi excluído da base de dados.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
