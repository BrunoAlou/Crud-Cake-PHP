<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ItensVenda Controller
 *
 * @property \App\Model\Table\ItensVendaTable $ItensVenda
 * @method \App\Model\Entity\ItensVenda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensVendaController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendas'],
        ];
        $itensVenda = $this->paginate($this->ItensVenda);
    
        $itensVendaGrouped = [];
        foreach ($itensVenda as $item) {
            $itensVendaGrouped[$item->venda_id][] = $item;
        }
    
        $this->set(compact('itensVendaGrouped'));
    }    

    /**
     * View method
     *
     * @param string|null $id Itens Venda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itensVenda = $this->ItensVenda->get($id, [
            'contain' => ['Vendas'],
        ]);

        $this->set(compact('itensVenda'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itensVenda = $this->ItensVenda->newEmptyEntity();
        if ($this->request->is('post')) {
            $itensVenda = $this->ItensVenda->patchEntity($itensVenda, $this->request->getData());
            if ($this->ItensVenda->save($itensVenda)) {
                $this->Flash->success(__('The itens venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens venda could not be saved. Please, try again.'));
        }
        $vendas = $this->ItensVenda->Vendas->find('list', ['limit' => 200])->all();
        $itens = $this->ItensVenda->Itens->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();
        
        $this->set(compact('itensVenda', 'vendas', 'itens'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itens Venda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itensVenda = $this->ItensVenda->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itensVenda = $this->ItensVenda->patchEntity($itensVenda, $this->request->getData());
            if ($this->ItensVenda->save($itensVenda)) {
                $this->Flash->success(__('The itens venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens venda could not be saved. Please, try again.'));
        }
        $vendas = $this->ItensVenda->Vendas->find('list', ['limit' => 200])->all();
        $this->set(compact('itensVenda', 'vendas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itens Venda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itensVenda = $this->ItensVenda->get($id);
        if ($this->ItensVenda->delete($itensVenda)) {
            $this->Flash->success(__('The itens venda has been deleted.'));
        } else {
            $this->Flash->error(__('The itens venda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
