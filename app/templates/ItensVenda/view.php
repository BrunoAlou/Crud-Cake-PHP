<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensVenda $itensVenda
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Itens Venda'), ['action' => 'edit', $itensVenda->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Itens Venda'), ['action' => 'delete', $itensVenda->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $itensVenda->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listagem de Itens Venda'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Itens Venda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itensVenda view content">
            <h3><?= h($itensVenda->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Venda') ?></th>
                    <td><?= $itensVenda->has('venda') ? $this->Html->link($itensVenda->venda->id, ['controller' => 'Vendas', 'action' => 'view', $itensVenda->venda->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($itensVenda->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Id') ?></th>
                    <td><?= $this->Number->format($itensVenda->item_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
