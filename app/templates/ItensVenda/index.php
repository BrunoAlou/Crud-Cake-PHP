<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ItensVenda> $itensVenda
 */
?>
<div class="itensVenda index content">
<?= $this->Html->link(__('New Itens Venda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Itens Venda') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('venda_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itensVendaGrouped as $vendaId => $itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <tr>
                            <?php if ($item === $itens[0]): ?>
                                <td rowspan="<?= count($itens) ?>"><?= $this->Number->format($item->id) ?></td>
                                <td rowspan="<?= count($itens) ?>">
                                    <?= $item->has('venda') ? $this->Html->link($item->venda->id, ['controller' => 'Vendas', 'action' => 'view', $item->venda->id]) : '' ?>
                                </td>
                            <?php endif; ?>
                            <td><?= $this->Number->format($item->item_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $item->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $item->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $item->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $item->id)]) ?>
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
