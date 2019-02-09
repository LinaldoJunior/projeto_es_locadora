<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre $movieGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Movie Genres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movieGenres form large-9 medium-8 columns content">
    <?= $this->Form->create($movieGenre) ?>
    <fieldset>
        <legend><?= __('Add Movie Genre') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
