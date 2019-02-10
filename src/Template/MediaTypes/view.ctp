<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType $mediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Media Type'), ['action' => 'edit', $mediaType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Media Type'), ['action' => 'delete', $mediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediaType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Media Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mediaTypes view large-9 medium-8 columns content">
    <h3><?= h($mediaType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mediaType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mediaType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($mediaType->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($mediaType->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($mediaType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($mediaType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Movie Media Types') ?></h4>
        <?php if (!empty($mediaType->movie_media_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Media Type Id') ?></th>
                <th scope="col"><?= __('Quatity') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mediaType->movie_media_types as $movieMediaTypes): ?>
            <tr>
                <td><?= h($movieMediaTypes->id) ?></td>
                <td><?= h($movieMediaTypes->movie_id) ?></td>
                <td><?= h($movieMediaTypes->media_type_id) ?></td>
                <td><?= h($movieMediaTypes->quatity) ?></td>
                <td><?= h($movieMediaTypes->active) ?></td>
                <td><?= h($movieMediaTypes->created) ?></td>
                <td><?= h($movieMediaTypes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MovieMediaTypes', 'action' => 'view', $movieMediaTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MovieMediaTypes', 'action' => 'edit', $movieMediaTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MovieMediaTypes', 'action' => 'delete', $movieMediaTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieMediaTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
