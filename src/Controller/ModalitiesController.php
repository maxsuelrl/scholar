<?php

namespace App\Controller;

class ModalitiesController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => ['Modalities.name' => 'asc']
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

            $modalities = $this->Modalities->find('all')
                ->where([($search_field === 'Nome' ? 'Name' : $search_field) . ' like' => $search_value . '%']);
        } else {
            $modalities = $this->Modalities->find('all');
        }
        $modalities = $this->paginate($modalities);
        $this->set(compact('modalities'));

        $this->set('search_field', $search_field);
        $this->set('search_value', $search_value);
    }

    public function add()
    {
        $modality = $this->Modalities->newEntity();
        if ($this->request->is('post')) {
            $modality = $this->Modalities->patchEntity($modality, $this->request->getData());
            if ($this->Modalities->save($modality)) {
                $this->Flash->success(__('A nova modalidade foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar a modalidade.'));
        }
        $this->set('modality', $modality);

        $this->set('title', 'Nova Modalidade');
        $this->render('modify');
    }

    public function edit($id = null)
    {
        $modality = $this->Modalities->get($id);
        if ($this->request->is('put')) {
            $modality = $this->Modalities->patchEntity($modality, $this->request->getData());
            if ($this->Modalities->save($modality)) {
                $this->Flash->success(__('A modalidade foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar a modalidade.'));
        }
        $this->set('modality', $modality);

        $this->set('title', 'Editando Modalidade');
        $this->render('modify');
    }

    public function delete($id = null)
    {
        $modality = $this->Modalities->get($id);
        $name = $modality->name;
        if ($this->Modalities->delete($modality)) {
            $this->Flash->success(__('A modalidade "{0}" foi apagada.', h($name)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
