<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieMediaType $movieMediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Media Types'), ['controller' => 'MediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Media Type'), ['controller' => 'MediaTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieMediaTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($movieMediaType) ?>
    <fieldset>
        <legend><?= __('Add Movie Media Type') ?></legend>
        <?php
            echo $this->Form->control('movie_id', ['options' => $movies]);
            echo $this->Form->control('media_type_id', ['options' => $mediaTypes]);
            echo $this->Form->control('quatity');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
