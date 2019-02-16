<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movie Genres'), ['controller' => 'MovieGenres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Genre'), ['controller' => 'MovieGenres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movies form large-9 medium-8 columns content">
    <?= $this->Form->create($movie) ?>
    <fieldset>
        <legend><?= __('Edit Movie') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('director');
            echo $this->Form->control('year', ['empty' => true]);
            echo $this->Form->control('movie_gender_id', ['options' => $movieGenres]);
            echo $this->Form->control('grade');
            echo $this->Form->control('duration');
            echo $this->Form->control('cast');
            echo $this->Form->control('sinopse');
            echo $this->Form->control('released');
            echo $this->Form->control('poster');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
