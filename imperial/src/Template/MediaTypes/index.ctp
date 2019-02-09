<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType[]|\Cake\Collection\CollectionInterface $mediaTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Media Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mediaTypes index large-9 medium-8 columns content">
    <h3><?= __('Media Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mediaTypes as $mediaType): ?>
            <tr>
                <td><?= $this->Number->format($mediaType->id) ?></td>
                <td><?= h($mediaType->name) ?></td>
                <td><?= $this->Number->format($mediaType->price) ?></td>
                <td><?= $this->Number->format($mediaType->active) ?></td>
                <td><?= h($mediaType->created) ?></td>
                <td><?= h($mediaType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mediaType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mediaType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediaType->id)]) ?>
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
