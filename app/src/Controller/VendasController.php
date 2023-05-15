<?php

declare(strict_types=1);

namespace App\Controller;

class VendasController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Breadcrumb');
    }

    public function index()
    {
        $vendas = $this->paginate($this->Vendas->find()->contain(['Pessoas', 'Vendedores']));
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('vendas', 'breadcrumbs'));
    }

    public function view($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Pessoas', 'Vendedores', 'ItensVenda', 'ItensVenda.Itens'],
        ]);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('venda', 'breadcrumbs'));
    }

    public function add()
    {
        $venda = $this->Vendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('A venda foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel salvar a venda. Por favor, tente novamente.'));
        }
        $pessoas = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $vendedores = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('venda', 'pessoas', 'vendedores', 'breadcrumbs'));
    }

    public function edit($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('A venda não foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A venda não foi editada. Por favor, tente novamente.'));
        }
        $pessoas = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $vendedores = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('venda', 'pessoas', 'vendedores', 'breadcrumbs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);

        $response = $this->response->withType('application/json');

        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('A venda foi removida.'));

            $response = $response->withStringBody(json_encode(['success' => true]));
        } else {
            $this->Flash->error(__('Não foi possível remover a venda selecionada. Por favor, tente novamente.'));

            $response = $response->withStringBody(json_encode(['success' => false]));
        }

        return $response;
    }
}
