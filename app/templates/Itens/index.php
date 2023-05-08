<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $itens
 */
?>
<div class="itens index content">
    <?= $this->Html->link(__('Novo Iten'), ['action' => 'add'], ['class' => 'button float-right']) ?>
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
                    <th class="actions"><?= __('Actions') ?></th>
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
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $iten->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $iten->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $iten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id)]) ?>
                    </td>
                </tr>
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
