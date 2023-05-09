<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $itens
 */
?>
<div class="itens index content">
    <?= $this->Html->link(__('Novo Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Itens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('unidade_medida') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('preco') ?></th>
                    <th><?= $this->Paginator->sort('perecivel') ?></th>
                    <th><?= $this->Paginator->sort('data_validade') ?></th>
                    <th><?= $this->Paginator->sort('data_fabricacao') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $iten): ?>
                <tr>
                    <td><?= $this->Number->format($iten->id) ?></td>
                    <td><?= h($iten->nome) ?></td>
                    <td><?= h($iten->unidade_medida) ?></td>
                    <td><?= h($iten->quantidade) ?></td>
                    <td><?= h($iten->preco) ?></td>
                    <td><?= $iten->perecivel == 1 ? __('Sim') : __('Nao'); ?></td>                
                    <td><?= h($iten->data_validade) ?></td>
                    <td><?= h($iten->data_fabricacao) ?></td>
                    <td class="actions">
                        <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'view', $iten->id]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                        <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'edit', $iten->id]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                        <button type="button" class="button-link action-button delete-button" onclick="deleteItem('<?= $this->Url->build(['action' => 'delete', $iten->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>

                    </td>


                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proxima') . ' >') ?>
            <?= $this->Paginator->last(__('ultima') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostando {{current}} registro(s) de {{count}}')) ?></p>
    </div>
</div>
<style>
    .action-button {
        height: 40px;
        padding: 0 20px;
    }
    .button.action-button {
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    /* Botão View */
    .button-link.view-button {
        background-color: #007bff;
        border: 0.1rem solid #007bff;
        color: #fff;
    }

    /* Botão Edit */
    .button-link.edit-button {
        background-color: #28a745;
        border: 0.1rem solid #28a745;
        color: #fff;
    }

    /* Botão Delete */
    .button-link.delete-button {
        background-color: #d33c43;
        border: 0.1rem solid #d33c43;
        color: #fff;
    }

</style>
<script>
    function deleteItem(url) {
        if (confirm('Tem certeza que gostaria de deletar?')) {
            var form = document.createElement('form');
            form.setAttribute('method', 'post');
            form.setAttribute('action', url);

            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', '_method');
            hiddenField.setAttribute('value', 'DELETE');
            form.appendChild(hiddenField);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>