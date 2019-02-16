<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType $mediaType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar'), ['action' => 'edit', $mediaType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Desativar'), ['action' => 'delete', $mediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediaType->id)]) ?> </li>
        <li><?= $this->Html->link(__('Voltar'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="mediaTypes view large-9 medium-8 columns content">
    <h3><?= h($mediaType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mediaType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mediaType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($mediaType->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($mediaType->active) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Filmes nesse formato') ?></h4>
        <?php if (!empty($mediaType->movie_media_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Filme') ?></th>
                <th scope="col"><?= __('Quantidade') ?></th>
                <th scope="col"><?= __('Ativo') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($mediaType->movie_media_types as $movieMediaTypes): ?>
            <tr>
                <td><?= h($movieMediaTypes->id) ?></td>
                <td><?= h($movieMediaTypes->movie->name) ?></td>
                <td><?= h($movieMediaTypes->quantity) ?></td>
                <td><?= ($movieMediaTypes->active == 0 ? 'Não' : 'Sim') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'MovieMediaTypes', 'action' => 'view', $movieMediaTypes->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'MovieMediaTypes', 'action' => 'edit', $movieMediaTypes->id]) ?>
                    <?= $this->Form->postLink(__('Desativar'), ['controller' => 'MovieMediaTypes', 'action' => 'delete', $movieMediaTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieMediaTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
