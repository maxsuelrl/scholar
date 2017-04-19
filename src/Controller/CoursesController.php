<?php

namespace App\Controller;

class CoursesController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Courses.name' => 'asc']
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

            $courses = $this->Courses->find('all', ['contain' => ['Modalities']])
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $courses = $this->Courses->find('all', ['contain' => ['Modalities']]);
        }
        $courses = $this->paginate($courses);
        $this->set(compact('courses'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->getData(), ['associated' => ['Modalities']]);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('O curso foi cadastrado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível cadastrar o curso.'));
        }
        $this->set('course', $course);

        $modalities = $this->Courses->Modalities->find('list', ['limit' => 200]);
        $this->set('modalities', $modalities);

        $this->set('title', 'Novo Curso');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $course = $this->Courses->get($id, ['contain' => ['Modalities']]);
        if ($this->request->is('put')) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('O curso foi atualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o curso.'));
        }
        $this->set('course', $course);

        $modalities = $this->Courses->Modalities->find('list', ['limit' => 200]);
        $this->set('modalities', $modalities);

        $this->set('title', 'Editando Curso');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $course = $this->Professors->get($id);
        $name = $course ->name;
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('O curso "{0}" foi excluído da base de dados.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
