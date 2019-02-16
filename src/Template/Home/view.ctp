<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-deck">
            <div class="card" style="width: 20rem;">
                <?= $this->Html->image($movie->poster, ['class' => 'card-img-top']) ?>
                <div class="card-body">
                    <h5 class="card-title"><?= h($movie->name) ?></h5>
                    <p class="card-text"><?= h($movie->sinopse) ?></p>
                    <p class="card-text">Diretor: <?= h($movie->director)?></p>
                    <p class="card-text">Elenco: <?= h($movie->cast) ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Duração: <?= $this->Number->format($movie->duration) ?></li>
                    <li class="list-group-item">Ano: <?= h($movie->year->format('Y')) ?></li>
                    <li class="list-group-item">Nota: <?= $this->Number->format($movie->grade) ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

