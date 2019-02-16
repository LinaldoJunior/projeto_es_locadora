<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RentalItem $rentalItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Edit Rental Item'), ['action' => 'edit', $rentalItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rental Item'), ['action' => 'delete', $rentalItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentalItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rental Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rentalItems view large-9 medium-8 columns content">
    <h3><?= h($rentalItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rental') ?></th>
            <td><?= $rentalItem->has('rental') ? $this->Html->link($rentalItem->rental->id, ['controller' => 'Rentals', 'action' => 'view', $rentalItem->rental->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movie Media Type') ?></th>
            <td><?= $rentalItem->has('movie_media_type') ? $this->Html->link($rentalItem->movie_media_type->id, ['controller' => 'MovieMediaTypes', 'action' => 'view', $rentalItem->movie_media_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rentalItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($rentalItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($rentalItem->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rentalItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rentalItem->modified) ?></td>
        </tr>
    </table>
</div>
