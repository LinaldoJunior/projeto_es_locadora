<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Filme'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Desativar Filme'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?> </li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="movies view large-9 medium-8 columns content">
    <h3><?= h($movie->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($movie->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diretor') ?></th>
            <td><?= h($movie->director) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gênero') ?></th>
            <td><?= $movie->has('movie_genre') ? $this->Html->link($movie->movie_genre->name, ['controller' => 'MovieGenres', 'action' => 'view', $movie->movie_genre->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sinopse') ?></th>
            <td><?= h($movie->sinopse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cartaz') ?></th>
            <td><?= h($movie->poster) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Avaliação') ?></th>
            <td><?= $this->Number->format($movie->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duração') ?></th>
            <td><?= $this->Number->format($movie->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lançamento') ?></th>
            <td><?= ($movie->released == 0 ? 'Não' : 'Sim') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ano') ?></th>
            <td><?= h($movie->year->format('Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Elenco') ?></th>
            <td><?= h($movie->cast) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Tipos de mídia') ?></h4>
        <?php if (!empty($movie->movie_media_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('#') ?></th>
                <th scope="col"><?= __('Tipo de mídia') ?></th>
                <th scope="col"><?= __('Quantidade') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($movie->movie_media_types as $movieMediaTypes): ?>
            <tr>
                <td><?= h($movieMediaTypes->id) ?></td>
                <td><?= h($movieMediaTypes->media_type->name) ?></td>
                <td><?= h($movieMediaTypes->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MovieMediaTypes', 'action' => 'view', $movieMediaTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MovieMediaTypes', 'action' => 'edit', $movieMediaTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MovieMediaTypes', 'action' => 'delete', $movieMediaTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieMediaTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
