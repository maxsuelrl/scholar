<?php

namespace App\Controller;

class SubjectsController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Subjects.name' => 'asc']
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

            $subjects = $this->Subjects->find('all')
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $subjects = $this->Subjects->find('all');
        }
        $subjects = $this->paginate($subjects);
        $this->set(compact('subjects'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('A nova disciplina foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar a disciplina.'));
        }
        $this->set('subject', $subject);

        $this->set('title', 'Nova Disciplina');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id);
        if ($this->request->is('put')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('A disciplina foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar a disciplina.'));
        }
        $this->set('subject', $subject);

        $this->set('title', 'Editando Disciplina');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $subject = $this->Subjects->get($id);
        $name = $subject->name;
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('A disciplina "{0}" foi apagada.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
