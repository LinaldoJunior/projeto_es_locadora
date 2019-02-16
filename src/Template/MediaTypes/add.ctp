<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType $mediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mediaTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($mediaType) ?>
    <fieldset>
        <legend><?= __('Novo tipo de mídia') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nome']);
            echo $this->Form->control('price', ['label' => 'Preço']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
