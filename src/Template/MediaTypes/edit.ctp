<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType $mediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Desativar'),
                ['action' => 'delete', $mediaType->id],
                ['confirm' => __('Você tem certeza que deseja desativar # {0}?', $mediaType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar tipos de mídia'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mediaTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($mediaType) ?>
    <fieldset>
        <legend><?= __('Editar tipo de mídia') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nome']);
            echo $this->Form->control('price', ['label' => 'Preço']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
