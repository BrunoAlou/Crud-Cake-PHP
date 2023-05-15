<div class="vendas index">
    <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                    <th><?= $this->Paginator->sort('vendedor_id') ?></th>
                    <th class="actions d-flex"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $this->Number->format($venda->id) ?></td>
                    <td><?= h($venda->pessoa->nome) ?></td>
                    <td><?= h($venda->vendedore->nome) ?></td>
                    <td class="actions d-flex">
                    <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'view', $venda->id]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                        <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'edit',$venda->id]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                        <button type="button" class="button-link action-button delete-button" onclick="deleteVenda('<?= $this->Url->build(['action' => 'delete', $venda->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>
                    </td>
                </tr>
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
    function deleteVenda(url) {
        if (confirm('Tem certeza que gostaria de deletar?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = '/Vendas'; 
                    } else {
                        alert('A venda não pode ser removida.Por favor, tente novamente.');
                    }
                },
                error: function() {
                    alert('Um erro ocorreu na tentativa de remover a venda. Por favor, tente novamente.');
                }
            });
        }
    }
</script>