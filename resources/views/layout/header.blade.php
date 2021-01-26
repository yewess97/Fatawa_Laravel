<!DOCTYPE html>
<html @if(app()->getlocale() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>
<head>
    @foreach($specializes as $specialize)
        @if(url()->current() == route('specialize_questions', $specialize->id))
            <title>{{__('all.specialize_questions')}} | {{__('all.fatwa')}}</title>
        @elseif(url()->current() == route('search'))
            <title>{{__('all.search_results')}} | {{__('all.fatwa')}}</title>
        @elseif(url()->current() == route('about'))
            <title>{{__('all.about_site')}} | {{__('all.fatwa')}}</title>
        @elseif(url()->current() == route('profile'))
            <title>{{__('all.account_details')}} | {{__('all.fatwa')}}</title>
        @elseif(url()->current() == route('send_question'))
            <title>{{__('all.send_question')}} | {{__('all.fatwa')}}</title>
        @elseif(url()->current() == route('my_questions'))
            <title>{{__('all.my_questions')}} | {{__('all.fatwa')}}</title>
        @elseif(url()->current() == route('favourites'))
            <title>{{__('all.my_favourites')}} | {{__('all.fatwa')}}</title>
        @endif
        <title>{{__('all.fatwa')}}</title>
    @endforeach
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(app()->getlocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/rtl/bootstrap.min.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icofont/icofont.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/aos/aos.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('css/images/favicon.ico')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('css/images/favicon.ico')}}">
    @yield('css')
</head>
<body>

<div class="super_container">

    <div class="top-header py-2">
        <div class="container">
            <div class="row no-gutters">
                <div
                    class="col-lg-4 col-md-3 col-sm-7 mt-lg-0 mt-md-2 mt-sm-2 text-lg-right text-md-right text-sm-right top-data">
                    <a class="text-color call" href="https://wa.me/+201011836243"
                       target="_blank"><strong>{{__('all.call')}}</strong> 01011836243</a>
                    &nbsp; &nbsp; <span class="line">|</span>
                    <ul class="list-inline d-inline top-social">
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color instagram icon"
                                                             href="https://www.instagram.com/yewess97/" target="_blank">
                                <i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color linkedin icon"
                                                             href="https://www.linkedin.com/in/yewess97/"
                                                             target="_blank">
                                <i class="fab fa-linkedin"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color twitter icon"
                                                             href="https://twitter.com/yewess97" target="_blank">
                                <i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color facebook icon"
                                                             href="https://www.facebook.com/YousufAymooni"
                                                             target="_blank">
                                <i class="fab fa-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-5 text-center date">
                    <p>
                        <script>
                            var mydate = new Date()
                            var year = mydate.getFullYear()

                            var day = mydate.getDay()
                            var month = mydate.getMonth()
                            var daym = mydate.getDate()

                            if (daym < 10)
                                daym = "0" + daym

                            var dayarray = new Array("{{__('all.sunday')}}", "{{__('all.monday')}}", "{{__('all.tuesday')}}", "{{__('all.wednesday')}}", "{{__('all.thursday')}}",
                                "{{__('all.friday')}}", "{{__('all.saturday')}}")
                            var montharray = new Array("{{__('all.january')}}", "{{__('all.february')}}", "{{__('all.march')}}", "{{__('all.april')}}", "{{__('all.may')}}", "{{__('all.june')}}",
                                "{{__('all.july')}}", "{{__('all.august')}}", "{{__('all.september')}}", "{{__('all.october')}}", "{{__('all.november')}}", "{{__('all.december')}}")

                            document.write(dayarray[day] + " &nbsp - &nbsp" + daym + " &nbsp " + montharray[month] + " &nbsp " + year)
                        </script>
                    </p>
                </div>
                @if(!Auth::check())
                    <div class="col-lg-3 col-md-4 col-sm-5 text-lg-left text-md-left text-sm-left modals">
                        <ul class="list-inline">

                            <li class="list-inline-item"><a class="p-sm-2 py-2 px-0 d-inline-block top-login" href="#"
                                                            data-toggle="modal"
                                                            data-target="#loginModal">{{__('all.login')}}</a>
                            </li>
                            <span class="line2">|</span>
                            <li class="list-inline-item"><a class="p-sm-2 py-2 px-0 d-inline-block top-register"
                                                            href="#"
                                                            data-toggle="modal"
                                                            data-target="#signupModal">{{__('all.register')}}</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="col-lg-3 col-md-4 col-sm-5 text-lg-left text-md-left text-sm-left d-flex user-logged">

                        <span class="col-6 user-logged-icon" style="font-size: 1.5rem; color: #817e74"><i
                                class="fas fa-user-circle"></i></span>

                        <ul class="list-inline">

                            <li class="list-inline-item main_nav_item dropdown mx-0 mt-lg-1 mt-md-1"
                                style="position:relative!important;">

                                <a id="navbarDropdown" class="p-sm-1 py-0 px-0 d-inline-block dropdown-toggle" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(app()->getLocale() == 'ar')
                                        {{ Auth::user()->name_ar }}
                                    @else
                                        {{ Auth::user()->name_en }}
                                    @endif
                                </a>

                                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown"
                                     data-aos="fade-down" data-aos-duration=".2s"
                                     style="position:relative!important;">

                                    @if(url()->current() == route('profile'))
                                        <a class="dropdown-item" href="#">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-user-alt ml-1"></i>
                                            @else
                                                <i class="fas fa-user-alt mr-1"></i>
                                            @endif
                                            {{__('all.profile')}}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-user-alt ml-1"></i>
                                            @else
                                                <i class="fas fa-user-alt mr-1"></i>
                                            @endif
                                            {{__('all.profile')}}
                                        </a>
                                    @endif

                                    @if(url()->current() == route('my_questions'))
                                        <a class="dropdown-item" href="#">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-question ml-1"></i>
                                            @else
                                                <i class="fas fa-question mr-1"></i>
                                            @endif
                                            {{__('all.my_questions')}}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('my_questions') }}">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-question ml-1"></i>
                                            @else
                                                <i class="fas fa-question mr-1"></i>
                                            @endif
                                            {{__('all.my_questions')}}
                                        </a>
                                    @endif

                                    @if(url()->current() == route('favourites'))
                                        <a class="dropdown-item" href="#">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-bookmark ml-1"></i>
                                            @else
                                                <i class="fas fa-bookmark mr-1"></i>
                                            @endif
                                            {{__('all.my_favourites')}}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('favourites') }}">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-bookmark ml-1"></i>
                                            @else
                                                <i class="fas fa-bookmark mr-1"></i>
                                            @endif
                                            {{__('all.my_favourites')}}
                                        </a>
                                    @endif

                                    @if(url()->current() == route('send_question'))
                                        <a class="dropdown-item" href="#">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-paper-plane ml-1"></i>
                                            @else
                                                <i class="fas fa-paper-plane mr-1"></i>
                                            @endif
                                            {{__('all.send_question')}}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('send_question') }}">
                                            @if(app()->getlocale() == 'ar')
                                                <i class="fas fa-paper-plane ml-1"></i>
                                            @else
                                                <i class="fas fa-paper-plane mr-1"></i>
                                            @endif
                                            {{__('all.send_question')}}
                                        </a>
                                    @endif

                                    <hr class="m-0">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
		                                document.getElementById('logout-form').submit();">
                                        @if(app()->getlocale() == 'ar')
                                            <i class="fas fa-sign-out-alt ml-1"></i>
                                        @else
                                            <i class="fas fa-sign-out-alt mr-1"></i>
                                        @endif
                                        {{ __('all.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="post"
                                          class="d-none">
                                        @csrf
                                    </form>

                                </div>

                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <!--Header-->
    <header class="header d-flex flex-row">
        <div class="header_content d-flex flex-row col-12">

            <!--Logo-->
            @if(url()->current() == route('index'))
                <div class="logo_container">
                    <a href="#">
                        <div class="logo">
                            @if(app()->getlocale() == 'ar')
                                <img src="{{asset('images/logo_ar.png')}}" alt="fatawa_logo_ar">
                            @else
                                <img src="{{asset('images/logo_en.png')}}" alt="fatawa_logo_en">
                            @endif
                        </div>
                    </a>
                </div>
            @else
                <div class="logo_container">
                    <a href="{{route('index')}}">
                        <div class="logo">
                            @if(app()->getlocale() == 'ar')
                                <img src="{{asset('images/logo_ar.png')}}" alt="fatawa_logo_ar">
                            @else
                                <img src="{{asset('images/logo_en.png')}}" alt="fatawa_logo_en">
                            @endif
                        </div>
                    </a>
                </div>
        @endif
        <!--Main navigation-->
            <nav class="main_nav_container col-10">
                <div class="main_nav">
                    <ul class="main_nav_list text-right">
                        <li class="main_nav_item">
                            @if(url()->current() == route('index'))
                                <a href="#">{{__('all.home')}}</a>
                            @else
                                <a href="{{route('index')}}">{{__('all.home')}}</a>
                            @endif
                        </li>
                        <li class="main_nav_item dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('all.specializes')}}
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdownMenuLink"
                                 data-aos="fade-down" data-aos-duration=".2s">
                                @foreach($specializes as $specialize)
                                    @if(url()->current() == route('specialize_questions', $specialize->id))
                                        @if(app()->getlocale() == 'ar')
                                            <a class="dropdown-item"
                                               href="#">{{$specialize->name_ar}}</a>
                                        @else
                                            <a class="dropdown-item"
                                               href="#">{{$specialize->name_en}}</a>
                                        @endif
                                    @else
                                        @if(app()->getlocale() == 'ar')
                                            <a class="dropdown-item"
                                               href="{{route('specialize_questions', $specialize->id)}}">{{$specialize->name_ar}}</a>
                                        @else
                                            <a class="dropdown-item"
                                               href="{{route('specialize_questions', $specialize->id)}}">{{$specialize->name_en}}</a>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="main_nav_item">
                            @if(url()->current() == route('about'))
                                <a href="#">{{__('all.about')}}</a>
                            @else
                                <a href="{{route('about')}}">{{__('all.about')}}</a>
                            @endif
                        </li>
                        <li class="main_nav_item">
                            <a href="{{route('index')}}#contact-us">{{__('all.contact')}}</a>
                        </li>
                        @if(Auth::check() && Auth::user()->role >= 1)
                            <li class="main_nav_item">
                                <a href="{{route('admin')}}" target="_blank">{{__('all.admin_panel')}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="main_nav_item dropdown language">

                    <span class="ml-1" style="font-size: 1.2rem; color: #4a7c12"><i
                            class="fas fa-globe-africa"></i></span>

                    @if(app()->getlocale() == 'ar')
                        <a class="dropdown-toggle" href="{{route('language', 'ar')}}" id="navbarDropdownMenu"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            العربيـــة
                        </a>
                        <div class="dropdown-menu text-right" aria-labelledby="navbarDropdownMenu"
                             data-aos="fade-down" data-aos-duration=".2s">
                            <a class="dropdown-item" href="{{route('language', 'en')}}">English</a>
                        </div>
                    @else
                        <a class="dropdown-toggle" href="{{route('language', 'en')}}" id="navbarDropdownMenu"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            English
                        </a>
                        <div class="dropdown-menu text-left" aria-labelledby="navbarDropdownMenu"
                             data-aos="fade-down" data-aos-duration=".2s">
                            <a class="dropdown-item" href="{{route('language', 'ar')}}">العربية</a>
                        </div>
                    @endif
                </div>
                <div class="search-form search_nav">
                    <form action="{{route('search')}}" method="post" class="form-inline" style="margin-right: 2rem">
                        @csrf
                        <input class="form-control ml-3 nav-search-item" type="search" name="search"
                               placeholder="{{__('all.search')}}"
                               style="width: 57%; height: 8vh; padding-right: 0.8rem">
                        <button class="btn btn-primary btn-circle btn-md my-2 my-sm-0" type="submit">
                            <i class="fas fa-search fa-flip-horizontal"></i>
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!--Hamburger-->
        <div class="hamburger_container">
            <i class="fas fa-bars trans_200"></i>
        </div>

    </header>

    <!--Menu-->
    <div class="menu_container menu_mm">

        <!--Menu close button-->
        <div class="menu_close_container">
            <div class="menu_close"></div>
        </div>

        <!--Menu items-->
        <div class="menu_inner menu_mm">
            <div class="menu menu_mm">

                <ul class="menu_list menu_mm">
                    <li class="menu_item menu_mm">
                        @if(url()->current() == route('index'))
                            <a href="#">{{__('all.home')}}</a>
                        @else
                            <a href="{{route('index')}}">{{__('all.home')}}</a>
                        @endif
                    </li>
                    <li class="menu_item menu_mm">
                        <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('all.specializes')}}
                        </a>
                        <div class="dropdown-menu text-right" aria-labelledby="navbarDropdownMenuLink"
                             data-aos="fade-down" data-aos-duration=".2s">
                            @foreach($specializes as $specialize)
                                @if(url()->current() == route('specialize_questions', $specialize->id))
                                    @if(app()->getlocale() == 'ar')
                                        <a class="dropdown-item"
                                           href="#">{{$specialize->name_ar}}</a>
                                    @else
                                        <a class="dropdown-item"
                                           href="#">{{$specialize->name_en}}</a>
                                    @endif
                                @else
                                    @if(app()->getlocale() == 'ar')
                                        <a class="dropdown-item"
                                           href="{{route('specialize_questions', $specialize->id)}}">{{$specialize->name_ar}}</a>
                                    @else
                                        <a class="dropdown-item"
                                           href="{{route('specialize_questions', $specialize->id)}}">{{$specialize->name_en}}</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="menu_item menu_mm">
                        @if(url()->current() == route('about'))
                            <a href="#">{{__('all.about')}}</a>
                        @else
                            <a href="{{route('about')}}">{{__('all.about')}}</a>
                        @endif
                    </li>
                    <li class="menu_item menu_mm"><a href="{{route('index')}}#contact-us">{{__('all.contact')}}</a></li>
                    @if(Auth::check() && Auth::user()->role >= 1)
                        <li class="menu_item menu_mm">
                            <a href="{{route('admin')}}" target="_blank">{{__('all.admin_panel')}}</a>
                        </li>
                    @endif
                    <li class="menu_item menu_mm">
                        @if(app()->getlocale() == 'ar')
                            <a class="dropdown-toggle" href="{{route('language', 'ar')}}" id="navbarDropdownMenu"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                العربيـــة
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdownMenu"
                                 data-aos="fade-down" data-aos-duration=".2s">
                                <a class="dropdown-item" href="{{route('language', 'en')}}">English</a>
                            </div>
                        @else
                            <a class="dropdown-toggle" href="{{route('language', 'en')}}" id="navbarDropdownMenu"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                English
                            </a>
                            <div class="dropdown-menu text-left" aria-labelledby="navbarDropdownMenu"
                                 data-aos="fade-down" data-aos-duration=".2s">
                                <a class="dropdown-item" href="{{route('language', 'ar')}}">العربية</a>
                            </div>
                        @endif
                    </li>
                    <li>
                        <!--Menu search form-->
                        <div class="col-12 mt-lg-4 text-center search-form">
                            <form action="{{route('search')}}" method="post"
                                  class="form-inline mr-lg-0 menu_search_form">
                                @csrf
                                <input class="form-control ml-3 nav-search-item menu_search" type="search" name="search"
                                       placeholder="{{__('all.search')}}">
                                <button class="btn btn-primary btn-circle btn-md my-2 my-sm-0" type="submit">
                                    <i class="fas fa-search fa-flip-horizontal"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>

                <!--Menu social-->
                <div class="col-12 text-center menu_social_container menu_mm">
                    <ul class="menu_social menu_mm">
                        <li class="menu_social_item menu_mm">
                            <a href="https://www.linkedin.com/in/yewess97/" target="_blank">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/linkedin.svg')}}" alt="menu_contact_icon">
                                </div>
                            </a>
                        </li>
                        <li class="menu_social_item menu_mm">
                            <a href="https://www.instagram.com/yewess97/" target="_blank">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/instagram.svg')}}" alt="menu_contact_icon">
                                </div>
                            </a>
                        </li>
                        <li class="menu_social_item menu_mm">
                            <a href="https://twitter.com/yewess97" target="_blank">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/twitter.svg')}}" alt="menu_contact_icon">
                                </div>
                            </a>
                        </li>
                        <li class="menu_social_item menu_mm">
                            <a href="https://www.facebook.com/YousufAymooni" target="_blank">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/facebook.svg')}}" alt="menu_contact_icon">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade register-form" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 p-4">
                <div class="modal-header border-0">
                    <h3 style="font-family: Cairo">{{__('all.register')}}</h3>
                    <button type="button" class="close close-form-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr class="w-25 mt-0">
                <div class="modal-body">
                    <div class="login">
                        <form action="{{route('register')}}" class="row form-register" id="registerForm"
                              enctype="multipart/form-data" method="post">
                            @csrf
                            @if(app()->getlocale() == 'en')
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.name_ar')}}
                                        &nbsp;</label>
                                    <input type="text" class="form-control"
                                           name="name_ar"
                                           value="{{old('name_ar')}}" dir="rtl">
                                </div>
                            @else
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.name_ar')}}
                                        &nbsp;</label>
                                    <input type="text" class="form-control"
                                           name="name_ar"
                                           value="{{old('name_ar')}}">
                                </div>
                            @endif
                            @if(app()->getlocale() == 'ar')
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.name_en')}}
                                        &nbsp;</label>
                                    <input type="text" class="form-control"
                                           name="name_en"
                                           value="{{old('name_en')}}" dir="ltr">
                                </div>
                            @else
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.name_en')}}
                                        &nbsp;</label>
                                    <input type="text" class="form-control"
                                           name="name_en"
                                           value="{{old('name_en')}}">
                                </div>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.birth')}}
                                    &nbsp;</label>
                                <input type="date" class="form-control"
                                       name="birth_date"
                                       value="{{old('birth_date')}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.gender')}}
                                    &nbsp;</label>
                                <select class="input form-control"
                                        style="cursor: pointer"
                                        name="gender">
                                    <option value="" disabled selected
                                            hidden></option>
                                    <option
                                        value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                        {{__('all.male')}}
                                    </option>
                                    <option
                                        value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                        {{__('all.female')}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.email')}}
                                    &nbsp;</label>
                                <input type="email" class="form-control"
                                       name="email"
                                       value="{{old('email')}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.mobile')}}
                                    &nbsp;</label>
                                <input type="text" class="form-control"
                                       name="mobile_number"
                                       value="{{old('mobile_number')}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.password')}}
                                    &nbsp;</label>
                                <input type="password" class="form-control"
                                       name="password">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.confirm_password')}}
                                    &nbsp;</label>
                                <input type="password" class="form-control"
                                       name="password_confirmation">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12 required">{{__('all.status')}}
                                    &nbsp;</label>
                                <select class="input form-control"
                                        aria-required="true"
                                        style="cursor: pointer"
                                        name="social_status">
                                    <option value="" disabled selected
                                            hidden></option>
                                    <option
                                        value="single" {{ old('social_status') == 'single' ? 'selected' : '' }}>
                                        {{__('all.single')}}
                                    </option>
                                    <option
                                        value="engaged" {{ old('social_status') == 'engaged' ? 'selected' : '' }}>
                                        {{__('all.engaged')}}
                                    </option>
                                    <option
                                        value="married" {{ old('social_status') == 'married' ? 'selected' : '' }}>
                                        {{__('all.married')}}
                                    </option>
                                    <option
                                        value="widower" {{ old('social_status') == 'widower' ? 'selected' : '' }}>
                                        {{__('all.widower')}}
                                    </option>
                                    <option
                                        value="divorced" {{ old('social_status') == 'divorced' ? 'selected' : '' }}>
                                        {{__('all.divorced')}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <label
                                    class="col-12">{{__('all.image')}} &nbsp; ({{__('all.optional')}})</label>
                                <input type="file" name="image"
                                       class="img-fluid btn btn-success"
                                       style="cursor: pointer; overflow: hidden; width: 100%"
                                       dir="ltr"
                                       value="{{old('image')}}">
                            </div>
                            <div class="col-12 mb-4">
                                <label class="col-12 checkbox" style="cursor: pointer">
                                    <div class="required">{{__('all.agreement')}}&nbsp;</div>
                                    <input type="checkbox" name="agreement" {{old('agreement') ? 'checked' : ''}}>
                                    <div></div>
                                    <div class="checkmark"></div>
                                </label>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{__('all.register')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Login Modal-->
    <div class="modal fade register-form" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 p-4">
                <div class="modal-header border-0">
                    <h3 style="font-family: Cairo">{{__('all.login')}}</h3>
                    <button type="button" class="close close-form-btn" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr class="w-25 mt-0">
                <div class="modal-body">
                    <form action="{{route('login')}}" class="row form-register" method="post" id="loginForm">
                        @csrf
                        <div class="col-12 mb-4">
                            <label class="col-12 required">{{__('all.email')}}
                                &nbsp;</label>
                            <input type="email" class="form-control"
                                   name="email" value="{{old('email')}}">
                        </div>
                        <div class="col-12 mb-4">
                            <label class="col-12 required">{{__('all.password')}}
                                &nbsp;</label>
                            <input type="password" class="form-control"
                                   name="password">
                        </div>
                        <div class="col-12 mb-4">
                            <label class="col-12 checkbox"
                                   style="cursor: pointer">
                                <div>{{__('all.remember')}}</div>
                                <input type="checkbox" name="remember" {{old('remember') ? 'checked' : ''}}>
                                <div class="checkmark"></div>
                            </label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">{{__('all.login')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Profile header-->
@if(url()->current() == route('profile') || url()->current() == route('send_question') || url()->current() == route('my_questions') || url()->current() == route('favourites'))

    <!--Page title-->
        <section class="page-title-section" data-background="{{asset('images/profile_background.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline custom-breadcrumb text-right">
                            @if(url()->current() == route('profile'))
                                <li class="list-inline-item profile-header-icon">
                                    <i class="fas fa-user-circle"></i>
                                </li>
                                <li class="list-inline-item profile">{{__('all.account_details')}}</li>
                            @elseif(url()->current() == route('send_question'))
                                <li class="list-inline-item profile-header-icon">
                                    <i class="fa fa-paper-plane"></i>
                                </li>
                                <li class="list-inline-item profile">{{__('all.send_question')}}</li>
                            @elseif(url()->current() == route('my_questions'))
                                <li class="list-inline-item profile-header-icon">
                                    <i class="fa fa-question"></i>
                                </li>
                                <li class="list-inline-item profile">{{__('all.my_questions')}}</li>
                            @elseif(url()->current() == route('favourites'))
                                <li class="list-inline-item profile-header-icon">
                                    <i class="fa fa-bookmark"></i>
                                </li>
                                <li class="list-inline-item profile">{{__('all.my_favourites')}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!--Profile-->
        <section class="profile-section">
            <div class="profile-content">
                <div class="container">
                    <div class="section">

                        <!--Profile menu-->
                        <div class="column menu-half menu_profile">
                            <aside class="panel">

                                @if(url()->current() == route('profile'))
                                    <a href="#" class="panel-block panel-block-active">
                                        <span class="profile-icon mrl"><i class="fa fa-user-alt"></i></span>
                                        <span class="profile-data text-right">{{__('all.account_details')}}</span>
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @else
                                    <a href="{{route('profile')}}" class="panel-block">
                                        <span class="profile-icon mrl"><i class="fa fa-user-alt"></i></span>
                                        <span class="profile-data text-right">{{__('all.account_details')}}</span>
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @endif

                                @if(url()->current() == route('send_question'))
                                    <a href="#" class="panel-block panel-block-active">
                                            <span class="profile-icon mrl"><i class="icofont-send-mail"
                                                                              style="font-size: 1.75rem"></i></span>
                                        <span class="profile-data text-right">{{__('all.send_question')}}</span>
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @else
                                    <a href="{{route('send_question')}}" class="panel-block">
                                            <span class="profile-icon mrl"><i class="icofont-send-mail"
                                                                              style="font-size: 1.75rem"></i></span>
                                        <span class="profile-data text-right">{{__('all.send_question')}}</span>
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @endif

                                @if(url()->current() == route('my_questions'))
                                    <a href="#" class="panel-block panel-block-active">
                                        <span class="profile-icon mrl"><i class="fa fa-question"></i></span>
                                        <span class="profile-data text-right">{{__('all.my_questions')}}</span>
                                        @if($questions->isEmpty())
                                            <div class="data-counter">0</div>
                                        @else
                                            <div class="data-counter">{{count($questions)}}</div>
                                        @endif
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @else
                                    <a href="{{route('my_questions')}}" class="panel-block">
                                        <span class="profile-icon mrl"><i class="fa fa-question"></i></span>
                                        <span class="profile-data text-right">{{__('all.my_questions')}}</span>
                                        @if($questions->isEmpty())
                                            <div class="data-counter">0</div>
                                        @else
                                            <div class="data-counter">{{count($questions)}}</div>
                                        @endif
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @endif

                                @if(url()->current() == route('favourites'))
                                    <a href="#" class="panel-block panel-block-active">
                                        <span class="profile-icon mrl"><i class="fa fa-bookmark"></i></span>
                                        <span class="profile-data text-right">{{__('all.my_favourites')}}</span>
                                        @if($favourites->isEmpty())
                                            <div class="data-counter">0</div>
                                        @else
                                            <div class="data-counter">{{count($favourites)}}</div>
                                        @endif
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @else
                                    <a href="{{route('favourites')}}" class="panel-block">
                                        <span class="profile-icon mrl"><i class="fa fa-bookmark"></i></span>
                                        <span class="profile-data text-right">{{__('all.my_favourites')}}</span>
                                        @if($favourites->isEmpty())
                                            <div class="data-counter">0</div>
                                        @else
                                            <div class="data-counter">{{count($favourites)}}</div>
                                        @endif
                                        @if(app()->getlocale() == 'ar')
                                            <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                        @else
                                            <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                        @endif
                                    </a>
                                @endif

                            </aside>
                        </div>

                        <div class="d-flex">
                            <div class="column first-half">
                                <aside class="panel">

                                    @if(url()->current() == route('profile'))
                                        <a href="#" class="panel-block panel-block-active">
                                            <span class="profile-icon mrl"><i class="fa fa-user-alt"></i></span>
                                            <span class="profile-data text-right">{{__('all.account_details')}}</span>
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @else
                                        <a href="{{route('profile')}}" class="panel-block">
                                            <span class="profile-icon mrl"><i class="fa fa-user-alt"></i></span>
                                            <span class="profile-data text-right">{{__('all.account_details')}}</span>
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @endif

                                    @if(url()->current() == route('send_question'))
                                        <a href="#" class="panel-block panel-block-active">
                                            <span class="profile-icon mrl"><i class="icofont-send-mail"
                                                                              style="font-size: 1.75rem"></i></span>
                                            <span class="profile-data text-right">{{__('all.send_question')}}</span>
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @else
                                        <a href="{{route('send_question')}}" class="panel-block">
                                            <span class="profile-icon mrl"><i class="icofont-send-mail"
                                                                              style="font-size: 1.75rem"></i></span>
                                            <span class="profile-data text-right">{{__('all.send_question')}}</span>
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @endif

                                    @if(url()->current() == route('my_questions'))
                                        <a href="#" class="panel-block panel-block-active">
                                            <span class="profile-icon mrl"><i class="fa fa-question"></i></span>
                                            <span class="profile-data text-right">{{__('all.my_questions')}}</span>
                                            @if($questions->isEmpty())
                                                <div class="data-counter">0</div>
                                            @else
                                                <div class="data-counter">{{count($questions)}}</div>
                                            @endif
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @else
                                        <a href="{{route('my_questions')}}" class="panel-block">
                                            <span class="profile-icon mrl"><i class="fa fa-question"></i></span>
                                            <span class="profile-data text-right">{{__('all.my_questions')}}</span>
                                            @if($questions->isEmpty())
                                                <div class="data-counter">0</div>
                                            @else
                                                <div class="data-counter">{{count($questions)}}</div>
                                            @endif
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @endif

                                    @if(url()->current() == route('favourites'))
                                        <a href="#" class="panel-block panel-block-active">
                                            <span class="profile-icon mrl"><i class="fa fa-bookmark"></i></span>
                                            <span class="profile-data text-right">{{__('all.my_favourites')}}</span>
                                            @if($favourites->isEmpty())
                                                <div class="data-counter">0</div>
                                            @else
                                                <div class="data-counter">{{count($favourites)}}</div>
                                            @endif
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @else
                                        <a href="{{route('favourites')}}" class="panel-block">
                                            <span class="profile-icon mrl"><i class="fa fa-bookmark"></i></span>
                                            <span class="profile-data text-right">{{__('all.my_favourites')}}</span>
                                            @if($favourites->isEmpty())
                                                <div class="data-counter">0</div>
                                            @else
                                                <div class="data-counter">{{count($favourites)}}</div>
                                            @endif
                                            @if(app()->getlocale() == 'ar')
                                                <span class="panel-icon"><i class="fas fa-angle-left"></i></span>
                                            @else
                                                <span class="panel-icon"><i class="fas fa-angle-right"></i></span>
                                            @endif
                                        </a>
                                    @endif

                                </aside>

                            </div>

@endif
