<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kitaphana | Login</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/css/mdb.min.css') }}" rel="stylesheet">
    <!-- My Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center ">
                <!-- Grid column -->
                <div class="col-md-6 my-5">

                    <div class="card card-signup z-depth-1">

                        <div class="card-body text-center">

                            <strong> <img src="{{ asset('assets/img/logo.png') }}" alt="logo"> </strong>
                            <h3 class="card-title my-2">Login an account</h3>                            

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                               {{ session('error') }}
                            </div>                                
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="md-form md-outline">
                                    <input type="email" id="email" class="form-control" name="email">
                                    <label for="email">E-mail</label>
                                </div>

                                <div class="md-form md-outline">
                                    <input type="password" id="password" class="form-control" name="password">
                                    <label for="password">Password</label>
                                </div>

                                <div class="card-foter text-center mb-2">
                                    <button type="submit"
                                        class="btn btn-outline-primary btn-sm waves-effect waves-light"
                                        style="width: 140px;">Login</button>
                                </div>

                                <span>Have not account?</span>
                                <a href=" {{route('register.create')}} ">Sign up</a>

                            </form>

                        </div>

                    </div>

                </div>
                <!-- Grid column -->

            </div>
        </div>


    </main>

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
                            <video class="cover" src="{{ asset('assets/img/YYLYN EMBLEMASY 2021.mp4') }}"
                                type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' controls="controls"></video>
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
                            <i class="fas fa-home pr-1"></i> şaýoly Bitarap Türkmenistan 91/1
                        </p>
                        <p>
                            <i class="fas fa-envelope pr-1"></i> kitaphanasy@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-phone pr-1"></i> + 993 422 6 20 22
                        </p>
                        <p><i class="fas fa-phone pr-1"></i> +993 422 6 20 28/29</p>
                        <p>
                            <i class="fas fa-print pr-1"></i> + 993 422 6 20 33
                        </p>
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
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })

        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });
        $('.carousel').carousel();

        $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function() {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < 4; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>

</body>

</html>
