<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Vendas Controller
 *
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $vendas = $this->paginate($this->Vendas->find()->contain(['Pessoas']));

        $this->set(compact('vendas'));
    }

    public function view($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Pessoas', 'ItensVenda', 'ItensVenda.Itens'],
        ]);
        
        $this->set(compact('venda'));
    }    

    public function add()
    {
        $venda = $this->Vendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venda could not be saved. Please, try again.'));
        }
        $pessoas = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $vendedores = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'pessoas', 'vendedores'));
    }

    public function edit($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venda could not be saved. Please, try again.'));
        }
        $pessoas = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $vendedores = $this->Vendas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'pessoas', 'vendedores'));
    }



    /**
     * Delete method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('The venda has been deleted.'));
        } else {
            $this->Flash->error(__('The venda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
