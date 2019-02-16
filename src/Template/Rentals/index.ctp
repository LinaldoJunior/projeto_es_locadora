<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Nova locação'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['controller' => 'Home','action' => 'admin']) ?></li>
    </ul>
</nav>
<div class="rentals index large-9 medium-8 columns content">
    <h3><?= __('Locações') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => '#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date', ['label' => 'Data de início']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date', ['label' => 'Entrega prevista']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_id', ['label' => 'Cliente']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('finished', ['label' => 'Concluída']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?= $this->Number->format($rental->id) ?></td>
                <td><?= h($rental->start_date) ?></td>
                <td><?= h($rental->end_date) ?></td>
                <td><?= $rental->has('user') ? $this->Html->link($rental->user->fullname, ['controller' => 'Users', 'action' => 'view', $rental->user->id]) : '' ?></td>
                <td><?= ($rental->finished == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= ($rental->active == 0 ? 'Não' : 'Sim') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $rental->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $rental->id]) ?>
                    <?= $this->Form->postLink(__('Desativar'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
                    <?= $this->Form->postLink(__('Finalizar'), ['action' => 'finish', $rental->id], ['confirm' => __('Are you sure you want to finish # {0}?', $rental->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total')]) ?></p>
    </div>
</div>
