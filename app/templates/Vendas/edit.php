<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $venda->id],
                ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $venda->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listagem de Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendas form content">
            <?= $this->Form->create($venda) ?>
            <fieldset>
                <legend><?= __('Editar Venda') ?></legend>
                <?php
                    echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
                    echo $this->Form->control('vendedor_id',['options' => $vendedores]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
