<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $iten
 */
?>
<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Item'), ['action' => 'edit', $iten->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Item'), ['action' => 'delete', $iten->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $iten->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listagem Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Iten'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens view content">
            <h3><?= h($iten->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($iten->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unidade Medida') ?></th>
                    <td><?= h($iten->unidade_medida) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= h($iten->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Preco') ?></th>
                    <td><?= h($iten->preco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($iten->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Validade') ?></th>
                    <td><?= h($iten->data_validade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Fabricacao') ?></th>
                    <td><?= h($iten->data_fabricacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Perecivel') ?></th>
                    <td><?= $iten->perecivel == 1 ? __('Sim') : __('Nao'); ?></td>                
                </tr>
            </table>
        </div>
    </div>
</div>
