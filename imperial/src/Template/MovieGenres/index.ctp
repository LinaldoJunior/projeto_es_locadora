<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre[]|\Cake\Collection\CollectionInterface $movieGenres
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Novo Gênero'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieGenres index large-9 medium-8 columns content">
    <h3><?= __('Gêneros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => '#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Cadastrado em']) ?></th>

                <th scope="col" class="actions"><?= __('Actions', ['label' => 'Ações']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movieGenres as $movieGenre): ?>
            <tr>
                <td><?= $this->Number->format($movieGenre->id) ?></td>
                <td><?= h($movieGenre->name) ?></td>
                <td><?= ($movieGenre->active == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= h($movieGenre->created) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $movieGenre->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $movieGenre->id]) ?>
                    <?= $this->Form->postLink(__('Desativar'), ['action' => 'delete', $movieGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieGenre->id)]) ?>
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
