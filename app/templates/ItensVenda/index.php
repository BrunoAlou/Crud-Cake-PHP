<div class="itensVenda index">
    <?= $this->Html->link(__('Adicionar novo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Itens na Venda') ?></h3>
    <div class="d-block d-md-none">
        <?php foreach ($itensVendaGrouped as $vendaId => $itens) : ?>
            <div class="card mb-3">
                <div class="card-header">
                Comprador: <?= h($itens[0]->venda->pessoa->nome) ?> Vendedor: <?= h($itens[0]->venda->vendedore->nome) ?><br>
                                <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'view', $vendaId]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                                <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'edit', $vendaId]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                </div>
                <?php foreach ($itens as $item) : ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= h($item->iten->nome) ?></h5>
                        <p class="card-text">
                            Item Id: <?= $this->Number->format($item->id) ?><br>
                        </p>
                        <td class="actions d-flex">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $item->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $item->id ?>">
                                    <li><a class="dropdown-item" href="#" onclick="deleteItemVenda('<?= $this->Url->build(['action' => 'delete', $item->id]) ?>')">Deletar</a></li>
                                </ul>
                            </div>
                        </td>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="table-responsive d-none d-md-block">
    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('venda_id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= __('Qtd') ?></th>
                <th class="actions d-flex"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itensVendaGrouped as $vendaId => $itens) : ?>
                <?php foreach ($itens as $item) : ?>
                    <tr>
                        <?php if ($item === $itens[0]) : ?>
                            <td rowspan="<?= count($itens) ?>"><?= $this->Number->format($item->id) ?></td>
                            <td rowspan="<?= count($itens) ?>">
                                Comprador: <?= h($item->venda->pessoa->nome) ?> Vendedor: <?= h($item->venda->vendedore->nome) ?><br>
                                <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'view', $item->venda->id]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                                <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'edit', $item->venda->id]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                            </td>
                        <?php endif; ?>

                        <td><?= h($item->iten->nome) ?></td>
                        <td><?= h($item->iten->quantidade) ?></td>
                        <td class="actions d-flex">
                            <div class="d-flex">
                                <button type="button" class="button-link action-button delete-button d-none d-md-inline-block" onclick="deleteItemVenda('<?= $this->Url->build(['action' => 'delete', $item->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('proximo') . ' >') ?>
        <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Pagina {{page}} de{{pages}}, mostrando {{current}} registros(s) em umtotal de  {{count}}')) ?></p>
</div>
</div>
<script>
    function deleteItemVenda(url) {
        console.log(url)
        if (confirm('Tem certeza que gostaria de deletar o item da venda?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = '/itens-venda';
                    } else {
                        alert('O item da venda não pode ser removido. Por Favor, tente novamente.');
                    }
                },
                error: function() {
                    alert('Um erro ocorreu na tentativa de remover o Iten da Venda. Por Favor, tente novamente.');
                }
            });
        }
    }
</script>