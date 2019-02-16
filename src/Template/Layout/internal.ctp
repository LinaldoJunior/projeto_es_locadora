<html lang="en"><head>
    <meta charset="utf-8">
    <?= $this->Html->meta('icon') ?>

    <title>       <?= $this->fetch('title') ?></title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('card-carousel.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <?= $this->fetch('script') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('navbar-top-fixed.css') ?>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <?php
    echo $this->Html->image('imperial.png', array('class' => 'img-logo','url' => array(
        'controller' => 'Home',
        'action' => 'admin'
    )));
    ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline mt-2 mt-md-0">


            <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fas fa-sign-out-alt')).$this->Html->tag('span', ' Sair'),
                '/users/logout',
                array('escape'=> false,
                    'class' => 'btn btn-outline-light my-2 my-sm-0',
                    ))?>
        </form>
    </div>
</nav>

<!--<main role="main" class="container-fluid h-100">-->
<!---->
<!--</main>-->
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <?= $this->fetch('content') ?>
    </div>
</div>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<?= $this->Html->script('popper.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('card-carousel.js') ?>


<script>
    (function ($) {
        "use strict";
        // Auto-scroll
        $('#myCarousel').carousel({
            interval: 5000
        });

        // Control buttons
        $('.next').click(function () {
            $('.carousel').carousel('next');
            return false;
        });
        $('.prev').click(function () {
            $('.carousel').carousel('prev');
            return false;
        });

        // On carousel scroll
        $("#myCarousel").on("slide.bs.carousel", function (e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 3;
            var totalItems = $(".carousel-item").length;
            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide -
                    (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $(
                            ".carousel-item").eq(i).appendTo(".carousel-inner");
                    } else {
                        $(".carousel-item").eq(0).appendTo(".carousel-inner");
                    }
                }
            }
        });
    })
    (window.jQuery);
</script>



</body></html>
