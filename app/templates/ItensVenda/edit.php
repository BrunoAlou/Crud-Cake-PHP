<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensVenda $itensVenda
 * @var string[]|\Cake\Collection\CollectionInterface $vendas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'deletar', $itensVenda->id],
                ['confirm' => __('Tem certeza que gostaria de deletar # {0}?', $itensVenda->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listagem de Itens Venda'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itensVenda form content">
            <?= $this->Form->create($itensVenda) ?>
            <fieldset>
                <legend><?= __('Editar Itens Venda') ?></legend>
                <?php
                    echo $this->Form->control('venda_id', ['options' => $vendas]);
                    echo $this->Form->control('item_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
