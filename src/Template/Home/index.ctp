<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>
<div class="movies index large-9 medium-8 columns content">
    <h3><?= __('Filmes') ?></h3>
    <table class="table table-striped table-dark">

        <thead>
        <tr>
            <th></th>
            <th></th>
            <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('year',  ['label' => 'Ano']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('director',  ['label' => 'Diretor']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('cast',  ['label' => 'Ator']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('movie_gender_id',  ['label' => 'Gênero']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('movie_gender_id',  ['label' => 'Mídia']) ?></th>




            <th scope="col" class="actions"><?= __('Ações') ?></th>
        </tr>
        <tr>
            <th>
                <?= $this->Form->create(null, ['valueSources' => 'query']); ?>
                </th>
            <th></th>
            <th>

                <?= $this->Form->input('movie_name', ['label' => '']); ?>
            </th>
            <th>
                <?= $this->Form->input('movie_year', ['label' => '', 'style' => array('' => 'width: 50px')]);?>
            </th>
            <th>
                <?= $this->Form->input('movie_director', ['label' => '']);?>
            </th>
            <th>
                <?= $this->Form->input('movie_cast', ['label' => '']);?>
            </th>
            <th>
                <?= $this->Form->input('movie_movie_gender_id', ['label' => '', 'empty' => __("Selecione"), 'options' => $movieGenres]);?>
            </th>
            <th>
                <?= $this->Form->input('movie_type_id', ['label' => '', 'empty' => __("Selecione"), 'options' => $mediaTypes]);?>
            </th>
            <th>
                <?= $this->Form->button('Filtrar', ['type' => 'submit', 'class' => 'btn  btn-sm btn-outline-primary']); ?>
                <?= $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-sm btn-outline-warning']);?>
                <?= $this->Form->end();?>
            </th>
        </tr>

        </thead>
        <tbody>
        <?php foreach ($movies as $movie): ?>
            <tr>
                <td></td>
                <td><?php
                    echo $this->Html->image($movie->movie->poster, array('style' =>array('height: 150px;'),'url' => array(
                        'controller' => 'Home',
                        'action' => 'view',
                        $movie->movie->id

                    )));
//                    echo $this->Html->image($movie->movie->poster, ['style' =>array('height: 150px;')]);

                    ?></td>
                <td><?= h($movie->movie->name) ?></td>
                <td>
                    <?php
                    echo date_format($movie->movie->year,"Y");
                    ?>
                </td>
                <td><?= $movie->movie->director ?></td>
                <td><?= $movie->movie->cast ?></td>
                <td><?= $movie->movie->movie_genre->name ?></td>
                <td><?= $movie->media_type->name ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualização'), ['controller' => 'Home', 'action' => 'view', $movie->movie->id]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __(' primeira ')) ?>
            <?= $this->Paginator->prev('< ' . __(' anterior ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__(' próxima ') . ' >') ?>
            <?= $this->Paginator->last(__(' última ') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total')]) ?></p>
    </div>
</div>
<style>

    a {
        color: white;
    }
    p{
        color: ghostwhite;
    }
</style>
