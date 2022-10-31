<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kitaphana</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/css/mdb.min.css') }}" rel="stylesheet">
    <!-- My Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* Necessary for full page carousel*/
        html,
        body,
        .view {
            height: 100%;
        }
        @media (min-width: 451px) and (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 500px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 550px;
            }
        }


        /* Carousel*/
        .carousel,
        .carousel-item,
        .carousel-item.active {
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .carousel-inner {
            height: 100%;
        }


    </style>

</head>

<body class="university-lp">

<!--Navigation & Intro-->
<header id="home">

    @include('layouts.nav')

    @include('layouts.newscarousel')

</header>
<!--Navigation & Intro-->

<!--Main content-->
<main>
<div class="container">
@yield('content')    
</div>


</main>
<!--Main content-->

<!--Footer-->
<footer class="page-footer text-center text-md-left mdb-color darken-3" id="contact">

    <!--Footer Links-->
    <div class="container-fluid">

        <!--First row-->
        <div class="row " data-wow-delay="0.2s">
            <hr class="w-100 mt-4 mb-5">

        </div>
        <!--First row-->

        <div class="container mb-1">

            <!--Second row-->
            <div class="row">

                <!--First column-->
                <div class="col-xl-4 col-lg-4 pt-1 pb-1">
                    <!--About-->
                    <h5 class="text-uppercase mb-3 font-weight-bold">Lebap welaýat kitaphanasy</h5>

                    <p>
                        <video class="cover" src="{{ asset('assets/img/YYLYN EMBLEMASY 2021.mp4') }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' controls="controls"></video>
                    </p>

                    <p></p>
                    <!--About-->

                </div>
                <!--First column-->

                <hr class="w-100 clearfix d-lg-none">

                <!--Second column-->
                <div class="col-xl-3 ml-lg-auto col-lg-4 col-md-6 mt-1 mb-1">
                    <!--Search-->
                    <h5 class="text-uppercase mb-3 font-weight-bold">GÖZLEMEK</h5>

                    <ul class="footer-search list-unstyled">
                        <li>
                            <form class="search-form" role="search">
                                <div class="md-form">
                                    <input type="text" class="form-control" placeholder="Gözle">
                                </div>
                            </form>
                        </li>
                    </ul>

                    <!--Info-->
                    <p>
                        <i class="fas fa-home pr-1"></i> şaýoly Bitarap Türkmenistan 91/1</p>
                    <p>
                        <i class="fas fa-envelope pr-1"></i> kitaphanasy@gmail.com</p>
                    <p>
                        <i class="fas fa-phone pr-1"></i> + 993 422 6 20 22</p>
                    <p><i class="fas fa-phone pr-1"></i> +993 422 6 20 28/29</p>
                    <p>
                        <i class="fas fa-print pr-1"></i> + 993 422 6 20 33</p>
                </div>
                <!--Second column-->
                <hr class="w-100 clearfix d-md-none">
                <!--Third column-->
            </div>
            <!--Second row-->
        </div>
    </div>
    <!--Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2022 Copyright: <a href="#" target="_blank"> LEBAP WELAÝAT KITAPHANASY </a>
        </div>
    </div>
    <!--Copyright-->

</footer>
<!--Footer-->

<!--SCRIPTS-->

<!--JQuery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>

<!--Bootstrap tooltips-->
<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>

<!--Bootstrap core JavaScript-->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!--MDB core JavaScript-->
<script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>

<script>
    //Animation init
    new WOW().init();

    //Modal
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });
    $('.carousel').carousel();

    $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<4;i++) {
            next=next.next();
            if (!next.length) {
                next=$(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });

</script>

</body>

</html>

