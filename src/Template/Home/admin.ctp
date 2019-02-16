<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-deck">
            <div class="card" style="width: 18rem;">
<!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Locações</h5>
                    <p class="card-text">Módulo para gerenciamento das locações realizadas.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/rentals/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
<!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Módulos para gerenciamento dos clientes.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/users/clients/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Filmes</h5>
                    <p class="card-text">Módulo para o gerenciamento dos filmes cadastrados.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/movies/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>

        </div>
    </div>

</div>
<div class=<?= $user['access_admin']? "row" : "d-none"?>>
    <div class="col-lg-12">
        <div class="card-deck">
            <div class="card" style="width: 18rem;">
                <!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Gêneros de filmes</h5>
                    <p class="card-text">Módulo para o gerenciamento dos gêneros de filmes disponíveis para cadastro na locadora.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/movie-genres/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Estoque</h5>
                    <p class="card-text">Módulo para o gerenciamento do estoque, tipos de mídia.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/movie-media-types/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Tipos de mídia e precificação</h5>
                    <p class="card-text">Módulo para gerenciamento da precificação por tipo de mídia.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/media-types/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>

        </div>
    </div>

</div>
<div class=<?= $user['access_admin']? "row" : "d-none"?>>
    <div class="col-lg-12">
        <div class="card-deck">

            <div class="card" style="width: 18rem;">
                <!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Métodos de pagamento</h5>
                    <p class="card-text">Módulo para gerenciamento dos métodos de pagamento aceitos pela locadora.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/payment-methods',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <!--                <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title">Funcionários</h5>
                    <p class="card-text">Módulo para gerenciamento dos funcionários da locadora.</p>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fas fa-sign-in-alt')).$this->Html->tag('span', ' Acessar'),
                        '/users/attendants/',
                        array('escape'=> false,
                            'class' => 'btn btn-danger my-2 my-sm-0',
                        ))?>
                </div>
            </div>

        </div>
    </div>

</div>
