<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Venda'), ['action' => 'edit', $venda->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Venda'), ['action' => 'delete', $venda->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $venda->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listagem de Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendas view content">
        <h3><?= h($venda->id) ?></h3>
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($venda->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Pessoa') ?></th>
                <td><?= h($venda->pessoa->nome) ?></td>
            </tr>
            <tr>
                <th><?= __('Vendedor Id') ?></th>
                <td><?= h($venda->vendedore->nome) ?></td>
            </tr>
        </table>

        <div class="related">
            <h4><?= __('Itens relacionados a venda') ?></h4>
            <?php if (!empty($venda->itens_venda)) : ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('Item') ?></th>
                        <th><?= __('Quantidade') ?></th>
                        <th><?= __('Preco') ?></th>
                        <th><?= __('Perecivel') ?></th>
                        <th><?= __('Data validade') ?></th>
                        <th class="actions d-flex"><?= __('Ações') ?></th>
                    </tr>
                    <?php foreach ($venda->itens_venda as $itensVenda) : ?>
                    <tr>
                        <td><?= h($itensVenda->id) ?></td>
                        <td><?= h($itensVenda->iten->nome) ?></td>
                        <td><?= h($itensVenda->iten->quantidade) ?></td>
                        <td><?= h($itensVenda->iten->preco) ?></td>
                        <td><?= h($itensVenda->iten->perecivel) ?></td>
                        <td><?= h($itensVenda->iten->data_validade) ?></td>
                        <td class="actions d-flex">
                            <button type="button" class="button-link action-button delete-button" onclick="deleteVenda('<?= $this->Url->build(['action' => 'delete', $itensVenda->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>
<script>
    function deleteVenda(url) {
        if (confirm('Tem certeza que gostaria de deletar?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'Venda removida com sucesso.');
                        setTimeout(function() {
                            window.location.href = '/Vendas';
                        }, 3000);
                    } else {
                        showToast('danger', 'A venda não pode ser removida. Por favor, tente novamente.');
                    }
                },
                error: function() {
                    showToast('danger', 'Um erro ocorreu na tentativa de remover a venda. Por favor, tente novamente.');
                }
            });
        }
    }
</script>