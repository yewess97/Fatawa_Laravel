<!DOCTYPE html>
<html @if(app()->getlocale() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>
<head>
    <title>{{__('all.admin_panel')}} | {{__('all.fatwa')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @if(app()->getlocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/rtl/bootstrap.min.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icofont/icofont.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/boxicons/css/boxicons.min.css')}}">
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
                <div class="col-lg-4 col-md-3 col-sm-7 text-lg-right text-md-right text-sm-right top-data">
                    <ul class="list-inline d-inline top-social">
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color instagram icon"
                                                             href="https://www.instagram.com/yewess97/"
                                                             target="_blank">
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
                    &nbsp; &nbsp; <span class="line">|</span> &nbsp; &nbsp;
                    <div class="language_header_item dropdown">
                        <span class="ml-1" style="font-size: 1.1rem; color: #979c97"><i class="fas fa-globe-africa"></i></span>
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
                <div class="col-lg-3 col-md-4 col-sm-5 text-lg-left text-md-left text-sm-left d-flex user-logged">

                    <span class="col-lg-6" style="font-size: 1.5rem; color: #817e74"><i
                            class="fas fa-user-circle"></i></span>

                    <ul class="list-inline">
                        <li class="list-inline-item user_logged dropdown" style="position:relative!important;">

                            <a id="navbarDropdown"
                               class="p-sm-2 py-2 px-0 d-inline-block top-register dropdown-toggle" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(app()->getLocale() == 'ar')
                                    {{ Auth::user()->name_ar }}
                                @else
                                    {{ Auth::user()->name_en }}
                                @endif
                            </a>

                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown"
                                 data-aos="fade-down" data-aos-duration=".2s" style="position:relative!important; z-index: 9999">

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

                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded navbar-toggleable-md col-12 first-nav">
        <a class="navbar-brand col-lg-3 col-md-3 col-sm-3" href="{{route('index')}}">
            @if(app()->getlocale() == 'ar')
                <img src="{{asset('images/logo_ar.png')}}" alt="fatawa_logo_ar" class="logo">
            @else
                <img src="{{asset('images/logo_en.png')}}" alt="fatawa_logo_en" class="logo">
            @endif
        </a>
        <div class="col-lg-6 col-md-6 col-sm-8 nav-search">
            <form action="#" class="form-inline my-2 my-lg-0">
                @csrf
                <input class="form-control ml-3 mr-sm-2 nav-search-item" type="search"
                       placeholder="{{__('all.search_admin')}}">
                <button class="btn btn-primary btn-circle btn-md my-2 my-sm-0" type="submit">
                    <i class="fas fa-search fa-flip-horizontal"></i>
                </button>
            </form>
        </div>

        <!--Mobile nav toggle button-->
        <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
    </nav>

</div>

<!--Header-->
<header id="header">
    <div class="d-flex flex-column align-items-stretch">

        <div class="profile mt-5">
            <h1 class="text-light">
                @foreach($user_profiles as $user_profile)
                    <a href="{{ route('profile', $user_profile->id) }}" target="_blank">
                        @if(app()->getLocale() == 'ar')
                            {{ Auth::user()->name_ar }}
                        @else
                            {{ Auth::user()->name_en }}
                        @endif
                    </a>
                @endforeach
            </h1>
        </div>

        <nav class="nav-menu">
            <ul class="nav-menu-ul">
                @if(url()->current() == route('index'))
                    <li class="nav-active">
                        <a href="#" target="_blank" style="color: #f3fa7c"><i class="bx bx-home"
                                                                              style="color: #daff00"></i><span>{{__('all.home_admin')}}</span></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('index')}}" target="_blank" style="color: #f3fa7c"><i class="bx bx-home"
                                                                                               style="color: #daff00"></i><span>{{__('all.home_admin')}}</span></a>
                    </li>
                @endif
                @if(url()->current() == route('admin'))
                    <li class="nav-active">
                        <a href="#"><i class="bx bx-book-content" style="color: #12f200"></i> <span>{{__('all.statistics_admin')}}</span></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('admin')}}"><i class="bx bx-book-content"></i> <span>{{__('all.statistics_admin')}}</span></a>
                    </li>
                @endif
                @if(url()->current() == route('specializes'))
                    <li class="nav-active">
                        <a href="#"><i class="bx bx-spreadsheet" style="color: #12f200"></i> <span>{{__('all.specializes_admin')}}</span></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('specializes')}}"><i class="bx bx-spreadsheet"></i> <span>{{__('all.specializes_admin')}}</span></a>
                    </li>
                @endif
                @if(url()->current() == route('questions'))
                    <li class="nav-active">
                        <a href="#"><i class="bx bx-question-mark" style="color: #12f200"></i><span>{{__('all.questions_admin')}}</span></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('questions')}}"><i class="bx bx-question-mark"></i><span>{{__('all.questions_admin')}}</span></a>
                    </li>
                @endif
                @if(url()->current() == route('answers'))
                    <li class="nav-active">
                        <a href="#"><i class="bx bxs-book-reader" style="color: #12f200"></i> <span>{{__('all.answers_admin')}}</span></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('answers')}}"><i class="bx bxs-book-reader"></i> <span>{{__('all.answers_admin')}}</span></a>
                    </li>
                @endif
                @if(url()->current() == route('sheikhs'))
                    <li class="nav-active">
                        <a href="#"><i class="bx bx-user" style="color: #12f200"></i> <span>{{__('all.sheikhs_admin')}}</span></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('sheikhs')}}"><i class="bx bx-user"></i> <span>{{__('all.sheikhs_admin')}}</span></a>
                    </li>
                @endif
                @if(Auth::check() && Auth::user()->role >= 2)
                    @if(url()->current() == route('users'))
                        <li class="nav-active">
                            <a href="#"><i class="bx bx-user" style="color: #12f200"></i> <span>{{__('all.users_admin')}}</span></a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('users')}}"><i class="bx bx-user"></i> <span>{{__('all.users_admin')}}</span></a>
                        </li>
                    @endif
                @endif
                <li class="language_menu_nav">
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
                <li class="col-12 menu-nav-search">
                    <form action="#" class="form-inline my-2" method="post">
                        @csrf
                        <input class="form-control ml-3 mr-sm-2 nav-search-item" type="search"
                               placeholder="{{__('all.search_admin')}}">
                        <button class="btn btn-primary btn-circle btn-md my-2 my-sm-0" type="submit">
                            <i class="fas fa-search fa-flip-horizontal"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>
