<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rental'), ['action' => 'edit', $rental->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rental'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Media Types'), ['controller' => 'MovieMediaTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Media Type'), ['controller' => 'MovieMediaTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rentals view large-9 medium-8 columns content">
    <h3><?= h($rental->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rental->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $rental->has('user') ? $this->Html->link($rental->user->fullname, ['controller' => 'Users', 'action' => 'view', $rental->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Método de pagamento') ?></th>
            <td><?= $rental->has('payment_method') ? $this->Html->link($rental->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $rental->payment_method->id]) : '' ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Valor dos filmes') ?></th>
            <td><?php
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                $value =$saldo;
                echo  $formatter->formatCurrency($this->Number->format($value), 'BRL'), PHP_EOL;
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor já pago') ?></th>
            <td><?php
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                $value =$rental->pre_paid;
                echo  $formatter->formatCurrency($this->Number->format($value), 'BRL'), PHP_EOL;
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multa') ?></th>
            <td><?php
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                $value =$multa;
                echo  $formatter->formatCurrency($this->Number->format($value), 'BRL'), PHP_EOL;
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saldo devedor') ?></th>
            <td><?php
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                $value =$total;
                echo  $formatter->formatCurrency($this->Number->format($value), 'BRL'), PHP_EOL;
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concluído') ?></th>
            <td><?= ($rental->finished == 0 ? 'Não' : 'Sim') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data de coleta') ?></th>
            <td><?= h($rental->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data prevista de devolução') ?></th>
            <td><?= h($rental->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data de entrega') ?></th>
            <td><?= h($rental->return_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Itens de locação') ?></h4>
        <?php if (!empty($rental->rental_items)): ?>
            <table cellpadding="0" cellspacing="0">
                <th scope="col"><?= __( '#') ?></th>
                <th scope="col"><?= __( 'Quantidade') ?></th>
                <th scope="col"><?= __( 'Nome do filme') ?></th>
                <th scope="col"><?= __( 'Formato') ?></th>
                <th scope="col"><?= __( 'Valor total') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
                </tr>
                <?php foreach ($rental->rental_items as $rental_items): ?>
                    <tr>
                        <td><?= h($rental_items->id) ?></td>
                        <td><?= h($rental_items->quantity) ?></td>
                        <td><?= h($rental_items->movie_media_type->movie->name) ?></td>
                        <td><?= h($rental_items->movie_media_type->media_type->name) ?></td>

                        <td><?php
                            $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                            $value =$rental_items->movie_media_type->movie->released == 0 ? ($rental_items->quantity * $rental_items->movie_media_type->media_type->price) : $rental_items->quantity * $rental_items->movie_media_type->media_type->price  * 1.5;
                            echo  $formatter->formatCurrency($this->Number->format($value), 'BRL'), PHP_EOL;
                            ?>
                        </td>


                        <td class="actions">
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action' => 'view', $rental_items->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $rental_items->id]) ?>
                            <?= $this->Form->postLink(__('Remover'), ['controller' => 'Users', 'action' => 'delete', $rental_items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental_items->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>

