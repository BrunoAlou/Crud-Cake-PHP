<nav class="navbar navbar-expand-lg navbar-light bg-light p-5">
    <?php
        echo $this->Html->link(
            $this->Html->image('Marca-Loginfo.png', ['alt' => 'Logo LogInfo', 'class' => 'img-responsive', 'style' => 'width: 200px; height: auto;']),
            '/',
            ['escape' => false]
        );
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav text-end">
            <li class="nav-item dropdown <?= $this->request->getParam('controller') === 'Pessoas' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pessoas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/Pessoas">Ver Todos</a></li>
                    <li><a class="dropdown-item" href="/Pessoas/add">Adicionar Novo</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $this->request->getParam('controller') === 'Pessoas' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Itens
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/Itens">Ver Todos</a></li>
                    <li><a class="dropdown-item" href="/Itens/add">Adicionar Novo</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $this->request->getParam('controller') === 'Pessoas' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Vendas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/Vendas">Ver Todos</a></li>
                    <li><a class="dropdown-item" href="/Vendas/add">Adicionar Novo</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $this->request->getParam('controller') === 'Pessoas' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Itens da Venda
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/itens-venda">Ver Todos</a></li>
                    <li><a class="dropdown-item" href="/itens-venda/add">Adicionar Novo</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
