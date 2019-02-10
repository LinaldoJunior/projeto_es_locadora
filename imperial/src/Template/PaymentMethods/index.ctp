<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentMethod[]|\Cake\Collection\CollectionInterface $paymentMethods
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Nova forma de pagamento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentMethods index large-9 medium-8 columns content">
    <h3><?= __('Métodos de pagamento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Cadastrado em']) ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentMethods as $paymentMethod): ?>
            <tr>
                <td><?= $this->Number->format($paymentMethod->id) ?></td>
                <td><?= h($paymentMethod->name) ?></td>
                <td><?= ($paymentMethod->active == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= h($paymentMethod->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $paymentMethod->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $paymentMethod->id]) ?>
                    <?= $this->Form->postLink(__('Desativar'), ['action' => 'delete', $paymentMethod->id], ['confirm' => __('Você tem certeza que deseja desativar  # {0}?', $paymentMethod->id)]) ?>
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
