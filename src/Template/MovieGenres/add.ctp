<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre $movieGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movieGenres form large-9 medium-8 columns content">
    <?= $this->Form->create($movieGenre) ?>
    <fieldset>
        <legend><?= __('Novo Gênero') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nome']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
