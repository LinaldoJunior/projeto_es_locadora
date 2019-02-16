<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieMediaType $movieMediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movieMediaTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($movieMediaType) ?>
    <fieldset>
        <legend><?= __('Novo item do estoque') ?></legend>
        <?php
            echo $this->Form->control('movie_id', ['options' => $movies], ['label' => 'Filme']);
            echo $this->Form->control('media_type_id', ['options' => $mediaTypes, 'label' => 'Tipo de mídia']);
            echo $this->Form->control('quantity', ['label' => 'Quantidade']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
