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
            <?= $this->Form->create($iten, ['id' => 'iten-form']) ?>
            <fieldset>
                <legend><?= __('Add Iten') ?></legend>
                <?php
                    echo $this->Form->control('nome', ['required' => true]);

                    echo $this->Form->label('unidade_medida', 'Unidade de Medida');
                    echo $this->Form->select('unidade_medida', [
                        'Litro' => 'Litro',
                        'Quilograma' => 'Quilograma',
                        'Unidade' => 'Unidade',
                    ], ['empty' => true, 'id' => 'unidade-medida']);
                    echo $this->Form->control('quantidade', ['id' => 'quantidade']);
                    echo $this->Form->control('preco', ['type' => 'number', 'step' => '0.01', 'label' => 'Preço', 'id' => 'preco']);
                    echo $this->Form->control('perecivel', ['id' => 'perecivel']);
                    echo $this->Form->control('data_validade', ['type' => 'date', 'id' => 'data-validade']);
                    echo $this->Form->control('data_fabricacao', ['type' => 'date', 'id' => 'data-fabricacao']);
                ?>
            </fieldset>
            </fieldset>
            <?= $this->Form->button(__('Adicionar'), ['id' => 'submit-button']) ?>
            <?= $this->Html->link('Voltar', '/', ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/path/to/jquery.mask.min.js"></script>

<script>
  $(document).ready(function(){
    $('#iten-form').on('submit', function(e) {
    // Obtém o valor atual do campo quantidade
    var quantidade = $('#quantidade').val();
  
    // Remove os sufixos indesejados
    quantidade = quantidade.replace(/(lt|cm|kg|un|g)$/i, '');
  
    // Atualiza o valor corrigido no campo quantidade
    $('#quantidade').val(quantidade);
  });

    $('#perecivel').change(function(){
        if ($(this).is(':checked')) {
            $('#data-validade').prop('required', true);
        } else {
            $('#data-validade').prop('required', false);
        }
    });
// Regra da unidade de medida
    $('#unidade-medida').change(function() {
        var medida = $(this).val();
        switch (medida) {
          case 'Litro':
              $('#quantidade').val('').on('input', function(e) {
                  var val = e.target.value.replace(/[^\d,]/g, '').replace(/,/g, '.');
                  $(this).val(val + 'lt');
              });
              break;
          case 'Quilograma':
              $('#quantidade').val('').on('input', function(e) {
                  var val = e.target.value.replace(/[^\d,]/g, '').replace(/,/g, '.');
                  $(this).val(val + 'kg');
              });
              break;
          case 'Unidade':
              $('#quantidade').val('').on('input', function(e) {
                  var val = e.target.value.replace(/[^\d]/g, '');
                  $(this).val(val + 'un');
              });
              break;
      }
    });

    $('#preco').on('input', function(e) {
    var val = e.target.value.replace(/[^\d,]|(?!^),/g, ''); // Remove caracteres inválidos e vírgulas adicionais
    val = val.replace(/,(\d{2})$/g, '.$1'); // Substitui a última vírgula por ponto e formata os centavos
    var formattedValue = 'R$ ' + val.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ',00'; // Valor formatado com o símbolo "R$"
    
    // Define apenas o valor numérico no campo "preco"
    $(this).val(val);
    
    // Exibe o valor formatado em outro elemento, se necessário
    $('#preco-display').text(formattedValue);
});


});

</script>