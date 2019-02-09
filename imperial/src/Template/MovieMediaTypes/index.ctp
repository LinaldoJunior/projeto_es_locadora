<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieMediaType[]|\Cake\Collection\CollectionInterface $movieMediaTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Media Types'), ['controller' => 'MediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Media Type'), ['controller' => 'MediaTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieMediaTypes index large-9 medium-8 columns content">
    <h3><?= __('Movie Media Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('media_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quatity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movieMediaTypes as $movieMediaType): ?>
            <tr>
                <td><?= $this->Number->format($movieMediaType->id) ?></td>
                <td><?= $movieMediaType->has('movie') ? $this->Html->link($movieMediaType->movie->name, ['controller' => 'Movies', 'action' => 'view', $movieMediaType->movie->id]) : '' ?></td>
                <td><?= $movieMediaType->has('media_type') ? $this->Html->link($movieMediaType->media_type->name, ['controller' => 'MediaTypes', 'action' => 'view', $movieMediaType->media_type->id]) : '' ?></td>
                <td><?= $this->Number->format($movieMediaType->quatity) ?></td>
                <td><?= $this->Number->format($movieMediaType->active) ?></td>
                <td><?= h($movieMediaType->created) ?></td>
                <td><?= h($movieMediaType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movieMediaType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movieMediaType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movieMediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieMediaType->id)]) ?>
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
