<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rental->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals form large-9 medium-8 columns content">
    <?= $this->Form->create($rental) ?>
    <fieldset>
        <legend><?= __('Edit Rental') ?></legend>
        <?php
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date', ['empty' => true]);
            echo $this->Form->control('return_date', ['empty' => true]);
            echo $this->Form->control('price');
            echo $this->Form->control('pre_paid');
            echo $this->Form->control('payment_method_id', ['options' => $paymentMethods]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('finished');
            echo $this->Form->control('movie_media_type_id', ['options' => $movieMediaTypes]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
