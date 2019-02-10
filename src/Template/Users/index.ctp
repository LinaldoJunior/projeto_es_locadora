<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Clientes'), ['action' => 'clients']) ?></li>
        <li><?= $this->Html->link(__('Atendentes'), ['action' => 'attendants']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Usuários') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => '#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fullname', ['label' => 'Nome completo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('username', ['label' => 'E-mail']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id', ['label' => 'Titular']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_res', ['label' => 'Telefone Residencial']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cellphone', ['label' => 'Celular']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Ativo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Data de criação']) ?></th>

                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->fullname) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= ($user->parent_id == 0 ? 'Sim' : 'Não') ?></td>
                <td><?= h($user->phone_res) ?></td>
                <td><?= h($user->cellphone) ?></td>
                <td><?= ($user->active == 0 ? 'Não' : 'Sim') ?></td>
                <td><?= h($user->created) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                    <?php
                    if ($user->active == 0){
                        echo $this->Form->postLink(__('Reativar'), ['action' => 'active', $user->id], ['confirm' => __('Você tem certeza que deseja reativar # {0}?', $user->id)]);
                    }
                    else{
                        echo $this->Form->postLink(__('Desativar'), ['action' => 'delete', $user->id], ['confirm' => __('Você tem certeza que deseja desativar # {0}?', $user->id)]);
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registros(s) de {{count}} no total')]) ?></p>
    </div>
</div>
