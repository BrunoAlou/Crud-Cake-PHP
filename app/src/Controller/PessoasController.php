<?php

declare(strict_types=1);

namespace App\Controller;

class PessoasController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Breadcrumb');
    }

    public function index()
    {
        $pessoas = $this->paginate($this->Pessoas);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('pessoas', 'breadcrumbs'));
    }

    public function view($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Vendas', 'Vendas.Pessoas', 'Vendas.Vendedores'],
        ]);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('pessoa', 'breadcrumbs'));
    }

    public function add()
    {
        $pessoa = $this->Pessoas->newEmptyEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('A pessoa foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A pessoa não foi salva corretamente. Por favor, tente novamente.'));
        }
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('pessoa', 'breadcrumbs'));
    }

    public function edit($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('A pessoa foi editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A pessoa não foi editada corretamente. Por favor, tente novamente.'));
        }
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('pessoa', 'breadcrumbs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);

        $response = $this->response->withType('application/json');

        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('A pessoa selecionada foi removida.'));

            $response = $response->withStringBody(json_encode(['success' => true]));
        } else {
            $this->Flash->error(__('A pessoa selecionada não pode ser removida. Por favor, tente novamente.'));

            $response = $response->withStringBody(json_encode(['success' => false]));
        }

        return $response;
    }
}
