<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre[]|\Cake\Collection\CollectionInterface $movieGenres
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movie Genre'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieGenres index large-9 medium-8 columns content">
    <h3><?= __('Movie Genres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movieGenres as $movieGenre): ?>
            <tr>
                <td><?= $this->Number->format($movieGenre->id) ?></td>
                <td><?= h($movieGenre->name) ?></td>
                <td><?= $this->Number->format($movieGenre->active) ?></td>
                <td><?= h($movieGenre->created) ?></td>
                <td><?= h($movieGenre->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movieGenre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movieGenre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movieGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieGenre->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
