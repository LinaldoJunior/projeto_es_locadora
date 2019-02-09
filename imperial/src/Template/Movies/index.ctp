<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Genres'), ['controller' => 'MovieGenres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Genre'), ['controller' => 'MovieGenres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movies index large-9 medium-8 columns content">
    <h3><?= __('Movies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('director') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_gender_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sinopse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('released') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poster') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= $this->Number->format($movie->id) ?></td>
                <td><?= h($movie->name) ?></td>
                <td><?= h($movie->director) ?></td>
                <td><?= h($movie->year) ?></td>
                <td><?= $movie->has('movie_genre') ? $this->Html->link($movie->movie_genre->name, ['controller' => 'MovieGenres', 'action' => 'view', $movie->movie_genre->id]) : '' ?></td>
                <td><?= $this->Number->format($movie->grade) ?></td>
                <td><?= $this->Number->format($movie->duration) ?></td>
                <td><?= h($movie->sinopse) ?></td>
                <td><?= $this->Number->format($movie->released) ?></td>
                <td><?= h($movie->poster) ?></td>
                <td><?= $this->Number->format($movie->active) ?></td>
                <td><?= h($movie->created) ?></td>
                <td><?= h($movie->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movie->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movie->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?>
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
