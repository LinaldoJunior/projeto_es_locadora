<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieMediaType[]|\Cake\Collection\CollectionInterface $movieMediaTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Media Types'), ['controller' => 'MediaTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Media Type'), ['controller' => 'MediaTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieMediaTypes index large-9 medium-8 columns content">
    <h3><?= __('Tipos de mídia por filme') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => '#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_id', ['label' => 'Filme']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('media_type_id', ['label' => 'Tipo de mídia']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity', ['label' => 'Quantidade']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Cadastrado em']) ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movieMediaTypes as $movieMediaType): ?>
            <tr>
                <td><?= $this->Number->format($movieMediaType->id) ?></td>
                <td><?= $movieMediaType->has('movie') ? $this->Html->link($movieMediaType->movie->name, ['controller' => 'Movies', 'action' => 'view', $movieMediaType->movie->id]) : '' ?></td>
                <td><?= $movieMediaType->has('media_type') ? $this->Html->link($movieMediaType->media_type->name, ['controller' => 'MediaTypes', 'action' => 'view', $movieMediaType->media_type->id]) : '' ?></td>
                <td><?= $this->Number->format($movieMediaType->quantity) ?></td>
                <td><?= ($movieMediaType->active == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= h($movieMediaType->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $movieMediaType->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $movieMediaType->id]) ?>
                    <?php
                    if ($movieMediaType->active == 0){
                        echo $this->Form->postLink(__('Reativar'), ['action' => 'active', $movieMediaType->id], ['confirm' => __('Você tem certeza que deseja reativar # {0}?', $movieMediaType->id)]);
                    }
                    else{
                        echo $this->Form->postLink(__('Desativar'), ['action' => 'delete', $movieMediaType->id], ['confirm' => __('Você tem certeza que deseja desativar # {0}?', $movieMediaType->id)]);
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
