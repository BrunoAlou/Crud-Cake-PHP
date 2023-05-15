<?php

declare(strict_types=1);

namespace App\Controller;

class ItensController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Breadcrumb');
    }
    public function index()
    {
        $itens = $this->paginate($this->Itens);

        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('itens', 'breadcrumbs'));
    }

    public function view($id = null)
    {
        $iten = $this->Itens->get($id, [
            'contain' => [],
        ]);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();


        $this->set(compact('iten', 'breadcrumbs'));
    }

    public function add()
    {
        $iten = $this->Itens->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (empty($data['data_validade'])) {
                $data['data_validade'] = null;
            }

            $iten = $this->Itens->patchEntity($iten, $data);
            if ($this->Itens->save($iten)) {
                $this->Flash->success(__('O Item foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Item não foi salvo. Por favor, tente novamente.'));
        }
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('iten', 'breadcrumbs'));
    }

    public function edit($id = null)
    {
        $iten = $this->Itens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $iten = $this->Itens->patchEntity($iten, $this->request->getData());
            if ($this->Itens->save($iten)) {
                $this->Flash->success(__('O item foi editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Item não foi salvo. Por favor, tente novamente.'));
        }
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('iten', 'breadcrumbs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Itens->get($id);

        $response = $this->response->withType('application/json');

        if ($this->Itens->delete($item)) {
            $this->Flash->success(__('O Item foi removido.'));

            $response = $response->withStringBody(json_encode(['success' => true]));
        } else {
            $this->Flash->error(__('Não foi possível remover o item selecionada. Por favor, tente novamente.'));

            $response = $response->withStringBody(json_encode(['success' => false]));
        }

        return $response;
    }
}
