<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/pages/*', 'Pages::display');
        $builder->fallbacks();

        $builder->get('/itens', ['controller' => 'Itens', 'action' => 'index']);
        $builder->get('/itens/add', ['controller' => 'Itens', 'action' => 'add']);
        $builder->post('/itens/add', ['controller' => 'Itens', 'action' => 'add']);
        $builder->get('/itens/edit/:id', ['controller' => 'Itens', 'action' => 'edit'])->setPass(['id']);
        $builder->post('/itens/edit/:id', ['controller' => 'Itens', 'action' => 'edit'])->setPass(['id']);
        $builder->get('/itens/view/:id', ['controller' => 'Itens', 'action' => 'view'])->setPass(['id']);

        $builder->get('/pessoas', ['controller' => 'Pessoas', 'action' => 'index']);
        $builder->get('/pessoas/add', ['controller' => 'Pessoas', 'action' => 'add']);
        $builder->get('/pessoas/edit/:id', ['controller' => 'Pessoas', 'action' => 'edit'])
            ->setPatterns(['id' => '\d+'])
            ->setPass(['id']);
        $builder->get('/pessoas/view/:id', ['controller' => 'Pessoas', 'action' => 'view'])
            ->setPatterns(['id' => '\d+'])
            ->setPass(['id']);

        $builder->get('/vendas', ['controller' => 'Vendas', 'action' => 'index']);
        $builder->get('/vendas/add', ['controller' => 'Vendas', 'action' => 'add']);
        $builder->get('/vendas/edit/:id', ['controller' => 'Vendas', 'action' => 'edit'])
            ->setPatterns(['id' => '\d+'])
            ->setPass(['id']);
        $builder->get('/vendas/view/:id', ['controller' => 'Vendas', 'action' => 'view'])
            ->setPatterns(['id' => '\d+'])
            ->setPass(['id']);

        $builder->get('/itens-venda', ['controller' => 'ItensVenda', 'action' => 'index']);
        $builder->get('/itens-venda/add', ['controller' => 'ItensVenda', 'action' => 'add']);
        $builder->get('/itens-venda/edit/:id', ['controller' => 'ItensVenda', 'action' => 'edit'])
            ->setPatterns(['id' => '\d+'])
            ->setPass(['id']);
        $builder->get('/itens-venda/view/:id', ['controller' => 'ItensVenda', 'action' => 'view'])
            ->setPatterns(['id' => '\d+'])
            ->setPass(['id']);
        });

    
    $routes->connect('/*', ['controller' => 'Pages', 'action' => 'display', 'home']);
};
