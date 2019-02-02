<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{Route::currentRouteName()}}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/Admin/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('Vendor/adminVendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor/adminVendor CSS-->
    <link href="{{ asset('Vendor/adminVendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Vendor/adminVendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/Admin/adminTheme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
            @include('layouts.adminLayout.header')
        <!-- END HEADER DESKTOP -->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="alert-wrap p-t-30 p-b-30">
                <div class="container">
                    <!-- ALERT-->
                        @if ($flash = session('message'))
                            <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                                <i class="zmdi zmdi-check-circle"></i>
                                <span class="content">{{ $flash }}</span>
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="zmdi zmdi-close-circle"></i>
                                    </span>
                                </button>
                            </div>
                       @endif
                    <!-- END ALERT-->
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <!-- PAGE CONTENT-->
                        @yield('content')
                        <!-- END PAGE CONTENT-->
                    </div>
                </div>
            </section>
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">                        
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                <strong>Developed by <a href="https://twitter.com/Mahmoud_Hozz_99">Mahmoud Hozayen</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </section>            
        </div>
        <!-- END PAGE CONTENT  -->

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('Vendor/adminVendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('Vendor/adminVendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor/adminVendor JS       -->
    <script src="{{ asset('Vendor/adminVendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('Vendor/adminVendor/select2/select2.min.js') }}"></script>

    <!-- Main <script src="/js/adminMain.js"></script>JS--><script src="{{ asset('js/Admin/adminMain.js') }}"></script>
    

</body>

</html>
<!-- end document-->