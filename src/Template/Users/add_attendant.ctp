<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'attendants']) ?></li>
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
            echo $this->Form->control('birthdate', ['label' => __('Data de nascimento' ), 'default' => '1960-09-10 06:40:00', 'selected' => array(
                'day' => '',
                'month' => '',
                'year' => ''
            )]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
