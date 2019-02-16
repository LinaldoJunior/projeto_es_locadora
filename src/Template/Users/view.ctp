<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($user->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($user->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Res') ?></th>
            <td><?= h($user->phone_res) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Work') ?></th>
            <td><?= h($user->phone_work) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellphone') ?></th>
            <td><?= h($user->cellphone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($user->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Access Admin') ?></th>
            <td><?= $this->Number->format($user->access_admin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Access Attendant') ?></th>
            <td><?= $this->Number->format($user->access_attendant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($user->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($user->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthdate') ?></th>
            <td><?= h($user->birthdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address Work') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address_work)); ?>
    </div>
    <div class="related">
        <h4><?= __('Dependentes') ?></h4>
        <?php if (!empty($childs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Cpf') ?></th>
                <th scope="col"><?= __('Birthdate') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($childs as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->fullname) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->cpf) ?></td>
                <td><?= h($users->birthdate) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Histórico de locações') ?></h4>
        <?php if (!empty($rentals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Pre Paid') ?></th>
                <th scope="col"><?= __('Payment Method Id') ?></th>
                <th scope="col"><?= __('Finished') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?= h($rental->id) ?></td>
                <td><?= h($rental->start_date) ?></td>
                <td><?= h($rental->end_date) ?></td>
                <td><?= h($rental->pre_paid) ?></td>
                <td><?= h($rental->payment_method_id) ?></td>
                <td><?= h($rental->finished) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rentals', 'action' => 'view', $rental->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rentals', 'action' => 'edit', $rental->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rentals', 'action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
