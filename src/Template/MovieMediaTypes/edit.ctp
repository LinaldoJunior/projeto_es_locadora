<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieMediaType $movieMediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Apagar'),
                ['action' => 'delete', $movieMediaType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movieMediaType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>

    </ul>
</nav>
<div class="movieMediaTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($movieMediaType) ?>
    <fieldset>
        <legend><?= __('Editar item de estoque') ?></legend>
        <?php
        echo $this->Form->control('movie_id', ['options' => $movies], ['label' => 'Filme']);
        echo $this->Form->control('media_type_id', ['options' => $mediaTypes, 'label' => 'Tipo de mídia']);
        echo $this->Form->control('quantity', ['label' => 'Quantidade']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
