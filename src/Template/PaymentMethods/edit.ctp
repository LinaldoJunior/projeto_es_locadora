<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentMethod $paymentMethod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Desativar'),
                ['action' => 'delete', $paymentMethod->id],
                ['confirm' => __('Certeza que deseja desativar # {0}?', $paymentMethod->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar métodos de pagamentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paymentMethods form large-9 medium-8 columns content">
    <?= $this->Form->create($paymentMethod) ?>
    <fieldset>
        <legend><?= __('Editar método de pagamento') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nome']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
