<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pessoa> $pessoas
 */
?>
<div class="pessoas index content">
    <?= $this->Html->link(__('Nova Pessoa'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pessoas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cpf') ?></th>
                    <th><?= $this->Paginator->sort('endereco') ?></th>
                    <th><?= $this->Paginator->sort('telefone') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                <tr>
                    <td><?= $this->Number->format($pessoa->id) ?></td>
                    <td><?= h($pessoa->nome) ?></td>
                    <td><?= h($pessoa->cpf) ?></td>
                    <td><?= h($pessoa->endereco) ?></td>
                    <td><?= h($pessoa->telefone) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $pessoa->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pessoa->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $pessoa->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de{{pages}}, mostrando {{current}} registros(s) em um total de  {{count}}')) ?></p>
    </div>
</div>
