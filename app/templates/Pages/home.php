<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?= $this->Html->css(['bootstrap.min', 'dashboard']) ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <section>
                    <?php
                    $messages = $this->getRequest()->getSession()->read('Flash.flash');
                    if (!empty($messages) && isset($messages['danger'])) {
                        echo $this->Flash->renderMessages($messages['danger']);
                    }
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Pessoas</h2>
                                        <p class="card-text">Total de registros: <?= $numeroPessoas ?></p>
                                        <a href="/pessoas" class="btn btn-primary">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Itens</h2>
                                        <p class="card-text">Total de registros: <?= $numeroItens ?></p>
                                        <a href="/itens" class="btn btn-primary">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Vendas</h2>
                                        <p class="card-text">Total de registros: <?= $numeroVendas ?></p>
                                        <a href="/vendas" class="btn btn-primary">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h2 class="card-title">Última Pessoa</h2>
                                        <p class="card-text">Nome: <?= h($ultimoPessoa->nome) ?></p>
                                        <p class="card-text">CPF: <?= h($ultimoPessoa->cpf) ?></p>
                                        <p class="card-text">Endereço: <?= h($ultimoPessoa->endereco) ?></p>
                                        <p class="card-text">Telefone: <?= h($ultimoPessoa->telefone) ?></p>
                                        <a href="/pessoas/<?= h($ultimoPessoa->id) ?>" class="btn btn-primary">Visualizar</a>
                                        <a href="/pessoas/edit/<?= h($ultimoPessoa->id) ?>" class="btn btn-success">Editar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h2 class="card-title">Último Item</h2>
                                        <p class="card-text">Nome: <?= h($ultimoItem->nome) ?></p>
                                        <p>Quantidade: <?= h($ultimoItem->quantidade) ?></p>
                                        <p>Preço: <?= h($ultimoItem->preco) ?></p>
                                        <p>Perecível: <?= h($ultimoItem->perecivel ? 'Sim' : 'Não') ?></p>
                                        <a href="/pessoas/<?= h($ultimoItem->id) ?>" class="btn btn-primary">Visualizar</a>
                                        <a href="/pessoas/edit/<?= h($ultimoItem->id) ?>" class="btn btn-success">Editar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h2>Última Venda</h2>
                                        <p>ID da Pessoa: <?= h($ultimaVenda->pessoa_id) ?></p>
                                        <p>ID do Vendedor: <?= h($ultimaVenda->vendedor_id) ?></p>
                                        <div class="flex-grow-1"></div>
                                        <div>
                                            <a href="/pessoas/<?= h($ultimaVenda->id) ?>" class="btn btn-primary">Visualizar</a>
                                            <a href="/pessoas/edit/<?= h($ultimaVenda->id) ?>" class="btn btn-success">Editar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                </section>
            </main>
        </div>
    </div>
    <?= $this->Html->script(['jquery.min', 'bootstrap.bundle.min']) ?>
</body>

</html>