<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pessoa> $pessoas
 */
?>
<div class="pessoas index content">
    <?= $this->Html->link(__('Nova Pessoa'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->css(['template']) ?>
    <h3><?= __('Pessoas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cpf') ?></th>
                    <th><?= $this->Paginator->sort('endereco') ?></th>
                    <th><?= $this->Paginator->sort('telefone') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                <tr>
                    <td><?= $this->Number->format($pessoa->id) ?></td>
                    <td><?= h($pessoa->nome) ?></td>
                    <td><?= h($pessoa->cpf) ?></td>
                    <td><?= h($pessoa->endereco) ?></td>
                    <td><?= h($pessoa->telefone) ?></td>
                    <td class="actions">
                        <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'view', $pessoa->id]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                        <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'edit', $pessoa->id]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                        <button type="button" class="button-link action-button delete-button" onclick="deleteItem('<?= $this->Url->build(['action' => 'delete', $pessoa->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proximo') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de{{pages}}, mostrando {{current}} registros(s) em um total de  {{count}}')) ?></p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function deleteItem(url) {
        if (confirm('Tem certeza que gostaria de deletar?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message or perform any necessary actions
                        alert('O iten foi removido com sucesso.');

                        // Redirect to the index page
                        window.location.href = '/Pessoas/index'; // Replace '/itens' with the appropriate URL of your index page
                    } else {
                        // Show error message or handle the deletion failure
                        alert('The iten could not be deleted. Please, try again.');
                    }
                },
                error: function() {
                    // Show error message or handle any other errors
                    alert('An error occurred during the deletion. Please, try again.');
                }
            });
        }
    }
</script>