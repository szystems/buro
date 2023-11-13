<!DOCTYPE html>
<html lang="es">

    <link rel="stylesheet" href="{{ asset('elearning/css/style.css') }}">

<head>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <title>Buro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('elearning/img/logos/favico.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('elearning/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('elearning/css/style.css" rel="stylesheet') }}">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    {{-- <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1> --}}
                    <img src="{{ asset('elearning/img/logos/logohorizontal.png') }}" height="75px" alt="">
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">{{ __('Our Office') }}</h6>
                        <small>7ª. Calle 3A-43 zona 11, Quetzaltenango.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">{{ __('Email Us') }}</h6>
                        <small>eventos.buro@hotmail.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">{{ __('Call Us') }}</h6>
                        <small>+502 5989 3119</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
                    <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>{{ __('Categories') }}</h5>
                    <i class="fa fa-angle-down text-primary"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                    <div class="navbar-nav w-100">
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Web Design <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">HTML</a>
                                <a href="" class="dropdown-item">CSS</a>
                                <a href="" class="dropdown-item">jQuery</a>
                            </div>
                        </div> --}}
                        <a href="" class="nav-item nav-link">SAT</a>
                        <a href="" class="nav-item nav-link">Bancos</a>
                        <a href="" class="nav-item nav-link">Defensa Fiscal</a>
                        <a href="" class="nav-item nav-link">Comportamiento Tributario</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ url('/') }}" class="text-decoration-none d-block d-lg-none">
                        {{-- <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1> --}}
                        <img src="{{ asset('elearning/img/logos/logohorizontal.png') }}" height="75px" alt="">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            {{-- @php
                                $categories=DB::table('categories')
                                ->where('status','=','1')
                                ->orderBy('name','asc')
                                ->get();

                                $config=DB::table('configs')->first();
                            @endphp --}}
                            <a href="{{ url('/') }}" class="nav-item nav-link active">{{ __('Home') }}</a>
                            <a href="about.html" class="nav-item nav-link">{{ __('About') }}</a>
                            <a href="course.html" class="nav-item nav-link">{{ __('Courses') }}</a>
                            <a href="teacher.html" class="nav-item nav-link">{{ __('Instructors') }}</a>
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="blog.html" class="dropdown-item">Blog</a>
                                    <a href="single.html" class="dropdown-item">Noticias</a>
                                </div>
                            </div> --}}
                            <a href="contact.html" class="nav-item nav-link">{{ __('Contact') }}</a>

                        </div>


                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="">{{ __('Subscribe') }}</a>



                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-2x fa-user text-info mr-3"></i></a>
                            <div class="dropdown-menu dropdown-menu-right rounded-0 m-0">
                                @if (Auth::guest())
                                    <a href="{{ route('login') }}" class="dropdown-item">{{ __('Login') }}</a>
                                    <a href="{{ route('register') }}" class="dropdown-item">{{ __('Register') }}</a>
                                    <a href="{{ route('password.request') }}" class="dropdown-item">{{ __('Forgot your password?') }}</a>
                                @else
                                    <a href="{{ url('my-account') }}" class="dropdown-item">{{ __('Account') }}</a>
                                    <a href="{{ url('wishlist') }}" class="dropdown-item">{{ __('Whishlist') }}</a>
                                    <a href="{{ url('cart') }}" class="dropdown-item">{{ __('Cart') }}</a>
                                    <a href="{{ url('my-orders') }}" class="dropdown-item">{{ __('Orders') }}</a>
                                    @if (Auth::user()->role_as == "1")
                                        <a href="{{ url('dashboard') }}" class="dropdown-item">{{ __('Dashboard') }}</a>
                                    @endif
                                    <a href="javascript:; {{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item bg-secondary"><font color="red">{{ __('Logout') }}</font>  </a>
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">{{ __('Contact') }}</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>7ª. Calle 3A-43 zona 11, Quetzaltenango.</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+502 5989 3119</p>
                        <p><i class="fa fa-envelope mr-2"></i>eventos.buro@hotmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="https://www.facebook.com/BurodeAuditores"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ __('Home') }}</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ __('About') }}</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ __('Courses') }}</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ __('Instructors') }}</a>
                            {{-- <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a> --}}
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ __('Contact') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">{{ __('Subscribe') }}</h5>
                <p>Rebum labore lorem dolores kasd est, et ipsum amet et at kasd, ipsum sea tempor magna tempor. Accu kasd sed ea duo ipsum. Dolor duo eirmod sea justo no lorem est diam</p>
                <div class="w-100">
                    <div class="input-group">
                        {{-- <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Sign Up</button>
                        </div> --}}
                        <button class="btn btn-primary px-4">{{ __('Subscribe') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">Diseñado por &copy; <a href="https://szystems.com" target="_blank"> Szystems </a>
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    {{ __('All rights reserved') }}

                </p>
            </div>
            {{-- <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('elearning/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('elearning/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('elearning/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('elearning/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('elearning/js/main.js') }}"></script>

    {{-- Custom --}}
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('frontend/css/custom.css') }}"></script> --}}
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>

    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/63dae358474251287910fb32/1go7gg4im';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script> --}}
    <!--End of Tawk.to Script-->
    <script>

        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function (response) {
                //console.log(response);
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags)
        {
            $( "#search_product" ).autocomplete({
                source: availableTags
            });
        }


    </script>

    {{-- modal --}}
    {{-- @if ($config->advertisement == 1 and Request::is('/'))
    <script>
        $(document).ready(function(){
            $('#promoModal').modal('show')
        })
    </script>
    @endif

    @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif
    @yield('scripts') --}}

</body>

</html>
