<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $iten
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $iten->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens form content">
            <?= $this->Form->create($iten) ?>
            <fieldset>
                <legend><?= __('Edit Iten') ?></legend>
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
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
