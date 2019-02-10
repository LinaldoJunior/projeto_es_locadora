<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Novo filme'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movies index large-9 medium-8 columns content">
    <h3><?= __('Filmes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id',  ['label' => '#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('year',  ['label' => 'Ano']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_gender_id',  ['label' => 'Gênero']) ?></th>

                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Cadastrado em']) ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= $this->Number->format($movie->id) ?></td>
                <td><?= h($movie->name) ?></td>
                <td>
                    <?php
                    echo date_format($movie->year,"Y");
                    ?>
                </td>

                <td><?= $movie->has('movie_genre') ? $this->Html->link($movie->movie_genre->name, ['controller' => 'MovieGenres', 'action' => 'view', $movie->movie_genre->id]) : '' ?></td>

                <td><?= ($movie->active == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= h($movie->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualização'), ['action' => 'view', $movie->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $movie->id]) ?>
                    <?php
                    if ($movie->active == 0){
                        echo $this->Form->postLink(__('Reativar'), ['action' => 'active', $movie->id], ['confirm' => __('Você tem certeza que deseja reativar # {0}?', $movie->id)]);
                    }
                    else{
                        echo $this->Form->postLink(__('Desativar'), ['action' => 'delete', $movie->id], ['confirm' => __('Você tem certeza que deseja desativar # {0}?', $movie->id)]);
                    }

                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total')]) ?></p>
    </div>
</div>
