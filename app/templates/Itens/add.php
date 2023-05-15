<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
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
    var quantidade = $('#quantidade').val();
    quantidade = quantidade.replace(/(lt|cm|kg|un|g)$/i, '');
    $('#quantidade').val(quantidade);
  });

    $('#perecivel').change(function(){
        if ($(this).is(':checked')) {
            $('#data-validade').prop('required', true);
        } else {
            $('#data-validade').prop('required', false);
        }
    });
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
    var val = e.target.value.replace(/[^\d,]|(?!^),/g, ''); 
    val = val.replace(/,(\d{2})$/g, '.$1'); 
    var formattedValue = 'R$ ' + val.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ',00'; 
    $(this).val(val);
    $('#preco-display').text(formattedValue);
});


});

</script>