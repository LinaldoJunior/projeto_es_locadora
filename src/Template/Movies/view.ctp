<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Genres'), ['controller' => 'MovieGenres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Genre'), ['controller' => 'MovieGenres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movies view large-9 medium-8 columns content">
    <h3><?= h($movie->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($movie->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Director') ?></th>
            <td><?= h($movie->director) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movie Genre') ?></th>
            <td><?= $movie->has('movie_genre') ? $this->Html->link($movie->movie_genre->name, ['controller' => 'MovieGenres', 'action' => 'view', $movie->movie_genre->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sinopse') ?></th>
            <td><?= h($movie->sinopse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poster') ?></th>
            <td><?= h($movie->poster) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($movie->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($movie->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Released') ?></th>
            <td><?= $this->Number->format($movie->released) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($movie->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($movie->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($movie->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($movie->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cast') ?></h4>
        <?= $this->Text->autoParagraph(h($movie->cast)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Movie Media Types') ?></h4>
        <?php if (!empty($movie->movie_media_types)): ?>
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
            <?php foreach ($movie->movie_media_types as $movieMediaTypes): ?>
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
