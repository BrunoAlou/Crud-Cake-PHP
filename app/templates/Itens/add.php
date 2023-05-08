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
            <?= $this->Html->link(__('Listagem de Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens form content">
            <?= $this->Form->create($iten) ?>
            <fieldset>
                <legend><?= __('Add Iten') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->label('unidade_medida', 'Unidade de Medida');
                    echo $this->Form->select('unidade_medida', [
                        'litro' => 'Litro',
                        'quilograma' => 'Quilograma',
                        'unidade' => 'Unidade',
                        'gramas' => 'Gramas',
                    ], ['empty' => true]);
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('preco', ['type' => 'number', 'step' => '0.01', 'label' => 'Preço']);
                    echo $this->Form->control('perecivel');
                    echo $this->Form->control('data_validade', ['type' => 'date']);
                    echo $this->Form->control('data_fabricacao', ['type' => 'date']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  $('form').submit(function(){
    var nome = $('#nome').val();
    var unidade_medida = $('#unidade-medida').val();
    var perecivel = $('#perecivel').val();
    var data_fabricacao = $('#data-fabricacao').val();
    var errors = '';

    if (!nome) {
      errors += '<p>O campo Nome é obrigatório.</p>';
    }

    if (!unidade_medida) {
      errors += '<p>O campo Unidade de Medida é obrigatório.</p>';
    } else if (!['Litro', 'Quilograma', 'Unidade', 'Gramas'].includes(unidade_medida)) {
      errors += '<p>O campo Unidade de Medida deve ser um dos seguintes valores: Litro, Quilograma, Unidade ou Gramas.</p>';
    }

    if (perecivel && !$('#data-validade').val()) {
      errors += '<p>O campo Data de Validade é obrigatório para produtos perecíveis.</p>';
    }

    if (!data_fabricacao) {
      errors += '<p>O campo Data de Fabricação é obrigatório.</p>';
    }

    if (errors) {
      $('#errors').html(errors);
      return false;
    } else {
      return true;
    }
  });
});
</script>
