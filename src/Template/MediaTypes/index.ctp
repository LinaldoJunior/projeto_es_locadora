<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediaType[]|\Cake\Collection\CollectionInterface $mediaTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Novo tipo de mídia'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mediaTypes index large-9 medium-8 columns content">
    <h3><?= __('Tipos de mídia') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => '#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('price', ['label' => 'Preço']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Ações' ) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mediaTypes as $mediaType): ?>
            <tr>
                <td><?= $this->Number->format($mediaType->id) ?></td>
                <td><?= h($mediaType->name) ?></td>
                <td><?php
                    $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                    echo  $formatter->formatCurrency($this->Number->format($mediaType->price), 'BRL'), PHP_EOL;
                    ?></td>
                <td><?= ($mediaType->active == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= h($mediaType->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $mediaType->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $mediaType->id]) ?>
                    <?php
                    if ($mediaType->active == 0){
                        echo $this->Form->postLink(__('Reativar'), ['action' => 'active', $mediaType->id], ['confirm' => __('Você tem certeza que deseja reativar # {0}?', $mediaType->id)]);
                    }
                    else{
                        echo $this->Form->postLink(__('Desativar'), ['action' => 'delete', $mediaType->id], ['confirm' => __('Você tem certeza que deseja desativar # {0}?', $mediaType->id)]);
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
