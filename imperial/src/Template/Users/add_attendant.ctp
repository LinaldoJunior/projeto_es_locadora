<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Atendentes'), ['action' => 'attendants']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Novo atendente') ?></legend>
        <?php
            echo $this->Form->control('fullname', ['label' => __('Nome Completo')]);
            echo $this->Form->control('cpf', ['label' => __('CPF')]);
            echo $this->Form->control('username', ['label' => __('E-Mail')]);
            echo $this->Form->control('password', ['label' => __('Senha'), 'required' => true]);
            echo $this->Form->control('gender', ['empty' => __("Selecione"), 'label' => __('Gênero'), 'options' => array(
                'FEMALE' => __('Feminino'),
                'MALE' => __('Masculino'),
                'OTHER' => __('Outro')
            ),'required' => true]);
//            echo $this->Form->control('address', ['label' => __('Endereço completo')]);
//            echo $this->Form->control('phone_res', ['label' => __('Telefone residencial')]);
//            echo $this->Form->control('cellphone', ['label' => __('Celular')]);
//
//            echo $this->Form->control('birthdate', ['label' => __('Data de nascimento' )]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
