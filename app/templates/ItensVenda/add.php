<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listagem de Itens Venda'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itensVenda form content">
            <?= $this->Form->create($itensVenda) ?>
            <fieldset>
                <legend><?= __('Adicionar Itens na Venda') ?></legend>
                <?php
                    echo $this->Form->control('venda_id', ['options' => $vendas]);
                    $itemNames = [];
                    foreach ($itens as $key => $item) {
                        $itemNames[$key] = $key . ' - ' . $item;
                    }                    
                    echo $this->Form->control('item_id', ['options' => $itemNames]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
