<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RentalItem[]|\Cake\Collection\CollectionInterface $rentalItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('New Rental Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentalItems index large-9 medium-8 columns content">
    <h3><?= __('Rental Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rental_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_media_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentalItems as $rentalItem): ?>
            <tr>
                <td><?= $this->Number->format($rentalItem->id) ?></td>
                <td><?= $rentalItem->has('rental') ? $this->Html->link($rentalItem->rental->id, ['controller' => 'Rentals', 'action' => 'view', $rentalItem->rental->id]) : '' ?></td>
                <td><?= $rentalItem->has('movie_media_type') ? $this->Html->link($rentalItem->movie_media_type->id, ['controller' => 'MovieMediaTypes', 'action' => 'view', $rentalItem->movie_media_type->id]) : '' ?></td>
                <td><?= $this->Number->format($rentalItem->quantity) ?></td>
                <td><?= $this->Number->format($rentalItem->active) ?></td>
                <td><?= h($rentalItem->created) ?></td>
                <td><?= h($rentalItem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rentalItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rentalItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rentalItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentalItem->id)]) ?>
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
