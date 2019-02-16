<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre $movieGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Edit Movie Genre'), ['action' => 'edit', $movieGenre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie Genre'), ['action' => 'delete', $movieGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieGenre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movie Genres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Genre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movieGenres view large-9 medium-8 columns content">
    <h3><?= h($movieGenre->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($movieGenre->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movieGenre->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($movieGenre->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($movieGenre->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($movieGenre->modified) ?></td>
        </tr>
    </table>
</div>
