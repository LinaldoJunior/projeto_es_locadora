<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieGenre $movieGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Desativar'),
                ['action' => 'delete', $movieGenre->id],
                ['confirm' => __('Tem certeza que deseja desabilitar o # {0}?', $movieGenre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar gêneros'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movieGenres form large-9 medium-8 columns content">
    <?= $this->Form->create($movieGenre) ?>
    <fieldset>
        <legend><?= __('Editar gênero') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nome']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
