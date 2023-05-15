<script src="<?= $this->Url->webroot('js/jquery.mask.min.js') ?>"></script>

<div class="row">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Pessoas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pessoas form content">
            <?= $this->Form->create($pessoa) ?>
            <fieldset>
                <legend><?= __('Add Pessoa') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cpf', ['class' => 'cpf-mask']);
                    echo $this->Form->control('endereco');
                    echo $this->Form->control('telefone', ['class' => 'phone-mask']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.cpf-mask').mask('000.000.000-00', {reverse: true});
        $('.phone-mask').mask('(00) 00000-0000');
    });
</script>
