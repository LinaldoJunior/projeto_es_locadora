<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rental'), ['action' => 'edit', $rental->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rental'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rentals view large-9 medium-8 columns content">
    <h3><?= h($rental->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment Method') ?></th>
            <td><?= $rental->has('payment_method') ? $this->Html->link($rental->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $rental->payment_method->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $rental->has('user') ? $this->Html->link($rental->user->id, ['controller' => 'Users', 'action' => 'view', $rental->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movie Media Type') ?></th>
            <td><?= $rental->has('movie_media_type') ? $this->Html->link($rental->movie_media_type->id, ['controller' => 'MovieMediaTypes', 'action' => 'view', $rental->movie_media_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rental->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($rental->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pre Paid') ?></th>
            <td><?= $this->Number->format($rental->pre_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finished') ?></th>
            <td><?= $this->Number->format($rental->finished) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($rental->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($rental->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($rental->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Return Date') ?></th>
            <td><?= h($rental->return_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rental->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rental->modified) ?></td>
        </tr>
    </table>
</div>
