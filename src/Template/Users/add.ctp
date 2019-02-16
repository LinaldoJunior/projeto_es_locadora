<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Todos os usuários'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Novo usuário') ?></legend>
        <?php
            echo $this->Form->control('fullname', ['label' => 'Nome completo']);
        echo $this->Form->control('access_admin',  ['label' => 'Acesso admin', 'options' => array(
            1 => __('Sim'),
            0 => __('Não')
        )]);
        echo $this->Form->control('access_attendant',  ['label' => 'Acesso atendente', 'options' => array(
            1 => __('Sim'),
            0 => __('Não')
        )]);
        echo $this->Form->control('birthdate', ['label' => __('Data de nascimento' )]);
        echo $this->Form->control('cpf', ['label' => __('CPF'), 'required' => true]);
        echo $this->Form->control('username', ['label' => __('E-Mail')]);
        echo $this->Form->control('password', ['label' => __('Senha'), 'required' => true]);
        echo $this->Form->control('gender', ['empty' => __("Selecione"), 'label' => __('Gênero'), 'options' => array(
            'FEMALE' => __('Feminino'),
            'MALE' => __('Masculino'),
            'OTHER' => __('Outro')
        ),'required' => true]);
        echo $this->Form->control('address', ['label' => __('Endereço completo'),'required' => true]);
        echo $this->Form->control('phone_res', ['label' => __('Telefone residencial'), 'required' => true]);
        echo $this->Form->control('address_work', ['label' => __('Local de trabalho')]);
        echo $this->Form->control('phone_work', ['label' => __('Telefone comercial')]);
        echo $this->Form->control('cellphone', ['label' => __('Celular'), 'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
