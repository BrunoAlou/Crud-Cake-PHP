<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Venda'), ['action' => 'edit', $venda->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Venda'), ['action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Venda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendas view content">
            <h3><?= h($venda->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pessoa') ?></th>
                    <td><?= $this->Number->format($venda->pessoa_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($venda->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendedor Id') ?></th>
                    <td><?= $this->Number->format($venda->vendedor_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Itens Venda') ?></h4>
                <?php if (!empty($venda->itens_venda)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Venda Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($venda->itens_venda as $itensVenda) : ?>
                        <tr>
                            <td><?= h($itensVenda->id) ?></td>
                            <td><?= h($itensVenda->venda_id) ?></td>
                            <td><?= h($itensVenda->item_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ItensVenda', 'action' => 'view', $itensVenda->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ItensVenda', 'action' => 'edit', $itensVenda->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItensVenda', 'action' => 'delete', $itensVenda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensVenda->id)]) ?>
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
