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
    <a class="navbar-brand" href="#"><img src=<?=$this->Url->image('imperial.png') ?> alt="" class="img-logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline mt-2 mt-md-0">

            <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><span><i class="fas fa-lock"></i></span> Acesso restrito</button>
        </form>
    </div>
</nav>

<main role="main" class="container-fluid">
    <?= $this->fetch('content') ?>
</main>





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