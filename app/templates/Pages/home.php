<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        LogInfo: Sistema de Vendas
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">

            <h1>
            <?php
                echo $this->Html->link(
                    $this->Html->image('Marca-Loginfo.png', ['alt' => 'Logo LogInfo', 'class' => 'img-responsive','style' => 'width: 200px; height: auto;']),
                    '/',
                    ['escape' => false]
                );
            ?>
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div id="url-rewriting-warning" style="padding: 1rem; background: #fcebea; color: #cc1f1a; border-color: #ef5753;">
                            <ul>
                                <li class="bullet problem">
                                    URL rewriting is not properly configured on your server.<br />
                                    1) <a rel="noopener" href="https://book.cakephp.org/4/en/installation.html#url-rewriting">Help me configure it</a><br />
                                    2) <a rel="noopener" href="https://book.cakephp.org/4/en/development/configuration.html#general-configuration">I don't / can't use URL rewriting</a>
                                </li>
                            </ul>
                        </div>
                        <?php Debugger::checkSecurityKeys(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h4>Itens</h4>
                        <ul>
                            <li><a rel="noopener" href="/itens/">Listagem de Itens</a></li>
                            <li><a rel="noopener" href="/itens/add">Cadastro de Itens</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h4>Pessoas</h4>
                        <ul>
                            <li><a rel="noopener" href="/pessoas/">Listagem de Pessoas</a></li>
                            <li><a rel="noopener" href="/pessoas/add">Cadastro de Pessoas</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h4>Vendas</h4>
                        <ul>
                            <li><a rel="noopener" href="/vendas/">Listagem de Vendas</a></li>
                            <li><a rel="noopener" href="/vendas/add">Cadastro de Vendas</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h4>Itens da Vendas</h4>
                        <ul>
                            <li><a rel="noopener" href="/itens-venda/">Listagem de Itens da Vendas</a></li>
                            <li><a rel="noopener" href="/itens-venda/add">Cadastro de Vendas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="column links">
                        <h3>Links</h3>
                        <a rel="noopener" href="https://cakefoundation.org/">Cake Software Foundation</a>
                        <a rel="noopener" href="https://training.cakephp.org/">CakePHP Training</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
