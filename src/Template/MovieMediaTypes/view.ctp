<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieMediaType $movieMediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Edit Movie Media Type'), ['action' => 'edit', $movieMediaType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie Media Type'), ['action' => 'delete', $movieMediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieMediaType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Media Types'), ['controller' => 'MediaTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media Type'), ['controller' => 'MediaTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movieMediaTypes view large-9 medium-8 columns content">
    <h3><?= h($movieMediaType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Movie') ?></th>
            <td><?= $movieMediaType->has('movie') ? $this->Html->link($movieMediaType->movie->name, ['controller' => 'Movies', 'action' => 'view', $movieMediaType->movie->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media Type') ?></th>
            <td><?= $movieMediaType->has('media_type') ? $this->Html->link($movieMediaType->media_type->name, ['controller' => 'MediaTypes', 'action' => 'view', $movieMediaType->media_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movieMediaType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quatity') ?></th>
            <td><?= $this->Number->format($movieMediaType->quatity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($movieMediaType->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($movieMediaType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($movieMediaType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rentals') ?></h4>
        <?php if (!empty($movieMediaType->rentals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Return Date') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Pre Paid') ?></th>
                <th scope="col"><?= __('Payment Method Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Finished') ?></th>
                <th scope="col"><?= __('Movie Media Type Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($movieMediaType->rentals as $rentals): ?>
            <tr>
                <td><?= h($rentals->id) ?></td>
                <td><?= h($rentals->start_date) ?></td>
                <td><?= h($rentals->end_date) ?></td>
                <td><?= h($rentals->return_date) ?></td>
                <td><?= h($rentals->price) ?></td>
                <td><?= h($rentals->pre_paid) ?></td>
                <td><?= h($rentals->payment_method_id) ?></td>
                <td><?= h($rentals->user_id) ?></td>
                <td><?= h($rentals->finished) ?></td>
                <td><?= h($rentals->movie_media_type_id) ?></td>
                <td><?= h($rentals->active) ?></td>
                <td><?= h($rentals->created) ?></td>
                <td><?= h($rentals->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rentals', 'action' => 'view', $rentals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rentals', 'action' => 'edit', $rentals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rentals', 'action' => 'delete', $rentals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
