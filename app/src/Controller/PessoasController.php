<?php
declare(strict_types=1);

namespace App\Controller;

class PessoasController extends AppController
{
    public function index()
    {
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
    }

    public function view($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pessoa'));
    }

    public function add()
    {
        $pessoa = $this->Pessoas->newEmptyEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('pessoa'));
    }

    public function edit($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('pessoa'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('The pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        $response = $this->getResponse();
        $response = $response->withStatus(200);
        $response = $response->withType('application/json');
        $response = $response->withStringBody(json_encode(['success' => true]));
    
        return $response;
    }
}
