<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * VendasItens Controller
 *
 * @method \App\Model\Entity\VendasIten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendasItensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $vendasItens = $this->paginate($this->VendasItens);

        $this->set(compact('vendasItens'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendas Iten id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendasIten = $this->VendasItens->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('vendasIten'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendasIten = $this->VendasItens->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendasIten = $this->VendasItens->patchEntity($vendasIten, $this->request->getData());
            if ($this->VendasItens->save($vendasIten)) {
                $this->Flash->success(__('The vendas iten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendas iten could not be saved. Please, try again.'));
        }
        $this->set(compact('vendasIten'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendas Iten id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendasIten = $this->VendasItens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendasIten = $this->VendasItens->patchEntity($vendasIten, $this->request->getData());
            if ($this->VendasItens->save($vendasIten)) {
                $this->Flash->success(__('The vendas iten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendas iten could not be saved. Please, try again.'));
        }
        $this->set(compact('vendasIten'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendas Iten id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendasIten = $this->VendasItens->get($id);
        if ($this->VendasItens->delete($vendasIten)) {
            $this->Flash->success(__('The vendas iten has been deleted.'));
        } else {
            $this->Flash->error(__('The vendas iten could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
