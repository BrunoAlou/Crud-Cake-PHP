<?php

declare(strict_types=1);

namespace App\Controller;

class ItensVendaController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Breadcrumb');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendas', 'Vendas.Pessoas', 'Vendas.Vendedores', 'Itens'],
        ];
        $itensVenda = $this->paginate($this->ItensVenda);

        $itensVendaGrouped = [];
        foreach ($itensVenda as $item) {
            $itensVendaGrouped[$item->venda_id][] = $item;
        }
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('itensVendaGrouped', 'breadcrumbs'));
    }

    public function view($id = null)
    {
        $itensVenda = $this->ItensVenda->get($id, [
            'contain' => ['Vendas'],
        ]);
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('itensVenda', 'breadcrumbs'));
    }

    public function add()
    {
        $itensVenda = $this->ItensVenda->newEmptyEntity();
        if ($this->request->is('post')) {
            $itensVenda = $this->ItensVenda->patchEntity($itensVenda, $this->request->getData());
            if ($this->ItensVenda->save($itensVenda)) {
                $this->Flash->success(__('Os itens da venda foram adicionados.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel salvar o item na venda. Por favor, tente novamente.'));
        }
        $vendas = $this->ItensVenda->Vendas->find('list', ['limit' => 200])->all();
        $itens = $this->ItensVenda->Itens->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('itensVenda', 'vendas', 'itens', 'breadcrumbs'));
    }

    public function edit($id = null)
    {
        $itensVenda = $this->ItensVenda->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itensVenda = $this->ItensVenda->patchEntity($itensVenda, $this->request->getData());
            if ($this->ItensVenda->save($itensVenda)) {
                $this->Flash->success(__('O item da venda foi editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel editar os items da venda. Por favor, tente novamente.'));
        }
        $vendas = $this->ItensVenda->Vendas->find('list', ['limit' => 200])->all();
        $breadcrumbs = $this->Breadcrumb->generateBreadcrumb();

        $this->set(compact('itensVenda', 'vendas', 'breadcrumbs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itensVenda = $this->ItensVenda->get($id);
        $response = $this->response->withType('application/json');

        if ($this->ItensVenda->delete($itensVenda)) {
            $this->Flash->success(__('O iten da venda foi removido.'));

            $response = $response->withStringBody(json_encode(['success' => true]));
        } else {
            $this->Flash->error(__('Não foi possível remover o item da venda. Por favor, tente novamente.'));

            $response = $response->withStringBody(json_encode(['success' => false]));
        }

        return $response;
    }
}
