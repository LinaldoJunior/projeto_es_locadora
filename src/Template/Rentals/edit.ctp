<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>
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
            echo $this->Form->control('client_id', ['options' => $users]);
            echo $this->Form->control('finished');
            echo $this->Form->control('movie_media_type_id', ['options' => $movieMediaTypes])
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
