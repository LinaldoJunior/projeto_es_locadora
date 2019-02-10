<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals index large-9 medium-8 columns content">
    <h3><?= __('Rentals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('return_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pre_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_method_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('finished') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_media_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?= $this->Number->format($rental->id) ?></td>
                <td><?= h($rental->start_date) ?></td>
                <td><?= h($rental->end_date) ?></td>
                <td><?= h($rental->return_date) ?></td>
                <td><?= $this->Number->format($rental->price) ?></td>
                <td><?= $this->Number->format($rental->pre_paid) ?></td>
                <td><?= $rental->has('payment_method') ? $this->Html->link($rental->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $rental->payment_method->id]) : '' ?></td>
                <td><?= $rental->has('user') ? $this->Html->link($rental->user->id, ['controller' => 'Users', 'action' => 'view', $rental->user->id]) : '' ?></td>
                <td><?= $this->Number->format($rental->finished) ?></td>
                <td><?= $rental->has('movie_media_type') ? $this->Html->link($rental->movie_media_type->id, ['controller' => 'MovieMediaTypes', 'action' => 'view', $rental->movie_media_type->id]) : '' ?></td>
                <td><?= $this->Number->format($rental->active) ?></td>
                <td><?= h($rental->created) ?></td>
                <td><?= h($rental->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rental->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rental->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
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
