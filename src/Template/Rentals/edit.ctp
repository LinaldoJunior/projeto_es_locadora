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
        <legend><?= __('Editar Locação') ?></legend>
        <?php
        echo $this->Form->control('pre_paid', ['label' => 'Valor antecipado']);
        echo $this->Form->control('payment_method_id', ['options' => $paymentMethods, 'label' => 'Método de pagamento']);
        echo $this->Form->control('client_id', ['options' => $users, 'label' => 'Cliente']);


            echo $this->Form->control('payment_method_id', ['options' => $paymentMethods, 'label' => 'Método de pagamento']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
