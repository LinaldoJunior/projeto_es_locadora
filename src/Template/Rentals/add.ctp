<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals form large-9 medium-8 columns content">
    <?= $this->Form->create($rental) ?>
    <fieldset>
        <legend><?= __('Nova locação') ?></legend>
        <?php
            echo $this->Form->control('start_date', ['label' => 'Data inicial']);
            echo $this->Form->control('pre_paid', ['label' => 'Valor antecipado']);
            echo $this->Form->control('payment_method_id', ['options' => $paymentMethods, 'label' => 'Método de pagamento']);
            echo $this->Form->control('client_id', ['options' => $users, 'label' => 'Cliente']);

        $options = [];
        foreach ($movieMediaTypes as $mv):

            $options[$mv->id] = $mv->movie->name . ' - ' . $mv->media_type->name;

        endforeach;
        echo $this->Form->control('movie_media_type_id', ['options' => $options, 'label' => 'Filme']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-success')) ?>
    <?= $this->Form->end() ?>
</div>

