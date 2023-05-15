<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Pessoas');
        $this->loadModel('Itens');
        $this->loadModel('Vendas');
    }

    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        $numeroPessoas = $this->Pessoas->find()->count();
        $numeroItens = $this->Itens->find()->count();
        $numeroVendas = $this->Vendas->find()->count();

        $this->set(compact('numeroPessoas', 'numeroItens', 'numeroVendas'));

        $ultimoPessoa = $this->Pessoas->find()->order(['id' => 'DESC'])->first();
        $ultimoItem = $this->Itens->find()->order(['id' => 'DESC'])->first();
        $ultimaVenda = $this->Vendas->find()->order(['id' => 'DESC'])->first();

        $this->set(compact('ultimoPessoa', 'ultimoItem', 'ultimaVenda'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
