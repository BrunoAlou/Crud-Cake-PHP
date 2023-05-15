<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $iten->id],
                ['confirm' => __('Tem certeza que gostaria de deletar# {0}?', $iten->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listagem de Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens form content">
            <?= $this->Form->create($iten) ?>
            <fieldset>
                <legend><?= __('Editar Item') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('unidade_medida');
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('preco');
                    echo $this->Form->control('perecivel');
                    echo $this->Form->control('data_validade');
                    echo $this->Form->control('data_fabricacao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
