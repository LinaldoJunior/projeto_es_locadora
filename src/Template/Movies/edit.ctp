<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Desativar'),
                ['action' => 'delete', $movie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movies form large-9 medium-8 columns content">
    <?= $this->Form->create($movie) ?>
    <fieldset>
        <legend><?= __('Edit Movie') ?></legend>
        <?php
        echo $this->Form->control('name',  ['label' => 'Nome']);
        echo $this->Form->control('director',  ['label' => 'Diretor']);
        echo $this->Form->control('year', ['empty' => true, 'label' => 'Ano', 'default' => '1985-12-28 00:00:00']);

        echo $this->Form->control('movie_gender_id', ['options' => $movieGenres, 'label' => 'Gênero']);
        echo $this->Form->control('grade',  ['label' => 'Avaliação']);
        echo $this->Form->control('duration',  ['label' => 'Duração']);
        echo $this->Form->control('cast',  ['label' => 'Elenco']);
        echo $this->Form->control('sinopse',  ['label' => 'Sinopse']);
        echo $this->Form->control('released',  ['label' => 'Lançamento', 'options' => array(
            1 => __('Sim'),
            0 => __('Não')
        )]);
        echo $this->Form->control('poster',  ['label' => 'Cartaz']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
