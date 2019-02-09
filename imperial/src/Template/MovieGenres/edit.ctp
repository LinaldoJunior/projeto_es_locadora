<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre $movieGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movieGenre->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movieGenre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movie Genres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movieGenres form large-9 medium-8 columns content">
    <?= $this->Form->create($movieGenre) ?>
    <fieldset>
        <legend><?= __('Edit Movie Genre') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
