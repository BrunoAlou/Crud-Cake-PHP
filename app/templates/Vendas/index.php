<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venda> $vendas
 */
?>
<div class="vendas index content">
    <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                    <th><?= $this->Paginator->sort('vendedor_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $this->Number->format($venda->id) ?></td>
                    <td><?= h($venda->pessoa->nome) ?></td>
                    <td><?= h($venda->vendedor_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $venda->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $venda->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $venda->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $venda->id)]) ?>
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
