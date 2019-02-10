<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RentalItem $rentalItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rental Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentalItems form large-9 medium-8 columns content">
    <?= $this->Form->create($rentalItem) ?>
    <fieldset>
        <legend><?= __('Add Rental Item') ?></legend>
        <?php
            echo $this->Form->control('rental_id', ['options' => $rentals]);
            echo $this->Form->control('movie_media_type_id', ['options' => $movieMediaTypes]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
