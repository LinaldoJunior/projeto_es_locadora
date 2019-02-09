<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType $mediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mediaType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mediaType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Media Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mediaTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($mediaType) ?>
    <fieldset>
        <legend><?= __('Edit Media Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
