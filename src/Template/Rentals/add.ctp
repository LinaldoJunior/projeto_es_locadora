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
        <legend><?= __('Nova locação') ?></legend>
        <?php
        $options = [];
        foreach ($movieMediaTypes as $mv):

            $options[$mv->id] = $mv->movie->name . ' - ' . $mv->media_type->name;

        endforeach;
        echo $this->Form->control('movie_media_type_id', ['options' => $options, 'label' => 'Filme']);
            echo $this->Form->control('start_date', ['label' => 'Data inicial']);
            echo $this->Form->control('pre_paid', ['label' => 'Valor antecipado']);
            echo $this->Form->control('payment_method_id', ['options' => $paymentMethods, 'label' => 'Método de pagamento']);
            echo $this->Form->control('client_id', ['options' => $users, 'label' => 'Cliente']);


        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar'), array('class' => 'btn btn-success')) ?>
    <?= $this->Form->end() ?>
</div>

