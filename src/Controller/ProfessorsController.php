<?php

namespace App\Controller;

class ProfessorsController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Professors.name' => 'asc']
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

            $professors = $this->Professors->find('all', ['contain' => ['Users']])
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $professors = $this->Professors->find('all', ['contain' => ['Users']]);
        }
        $professors = $this->paginate($professors);
        $this->set(compact('professors'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $professor = $this->Professors->newEntity();
        if ($this->request->is('post')) {
            $professor = $this->Professors->patchEntity($professor, $this->request->getData(), ['associated' => ['Users']]);
            if ($this->Professors->save($professor)) {
                $this->Flash->success(__('O professor foi cadastrado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível cadastrar o professor.'));
        }
        $this->set('professor', $professor);

        $this->set('title', 'Novo Professor');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $professor = $this->Professors->get($id, ['contain' => ['Users']]);
        if ($this->request->is('put')) {
            $professor = $this->Professors->patchEntity($professor, $this->request->getData());
            if ($this->Professors->save($professor)) {
                $this->Flash->success(__('O professor foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o professor.'));
        }
        $this->set('professor', $professor);

        $this->set('title', 'Editando Professor');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $professor = $this->Professors->get($id);
        $name = $professor  ->name;
        if ($this->Professors->delete($professor)) {
            $this->Flash->success(__('O professor "{0}" foi excluído da base de dados.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
