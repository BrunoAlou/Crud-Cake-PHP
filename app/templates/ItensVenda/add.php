<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensVenda $itensVenda
 * @var \Cake\Collection\CollectionInterface|string[] $vendas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Listagem de Itens Venda'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itensVenda form content">
            <?= $this->Form->create($itensVenda) ?>
            <fieldset>
                <legend><?= __('Add Itens Venda') ?></legend>
                <?php
                    echo $this->Form->control('venda_id', ['options' => $vendas]);
                    $itemNames = [];
                    foreach ($itens as $key => $item) {
                        $itemNames[] = ['id' => $key, 'nome' => $item];
                    }
                    echo $this->Form->control('nome', ['options' => $itemNames]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
