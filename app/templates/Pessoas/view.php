<div class="row">
    <aside class="col">
        <div class="side-nav d-grid d-md-block">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Pessoa'), ['action' => 'edit', $pessoa->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Pessoa'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $pessoa->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Pessoas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nova Pessoa'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pessoas view content">
            <h3><?= h($pessoa->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($pessoa->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($pessoa->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($pessoa->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($pessoa->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pessoa->id) ?></td>
                </tr>
            </table>
            <div class="related">
            <h4><?= __('Vendas Relacionada') ?></h4>
            <?php if (!empty($pessoa->vendas)) : ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('Pessoa Id') ?></th>
                        <th><?= __('Vendedor Id') ?></th>
                        <th class="actions d-flex"><?= __('Ações') ?></th>
                    </tr>
                    <?php foreach ($pessoa->vendas as $venda) : ?>
                    <tr>
                        <td><?= h($venda->id) ?></td>
                        <td><?= h($venda->pessoa->nome) ?></td>
                        <td><?= h($venda->vendedore->nome) ?></td>
                        <td class="actions d-flex">
                            <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'view', $venda->id]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                            <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'edit', $venda->id]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                            <button type="button" class="button-link action-button delete-button" onclick="deleteVenda('<?= $this->Url->build(['controller' => 'Vendas', 'action' => 'delete', $venda->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>
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