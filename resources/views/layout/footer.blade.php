<!--Profile footer-->
@if(url()->current() == route('profile') || url()->current() == route('send_question') || url()->current() == route('my_questions') || url()->current() == route('favourites'))
</div>
</div>
</div>
</div>
</section>
@endif

<!--Footer-->
<footer class="footer">
    <div class="container">

        <!--Newsletter-->
        <div class="newsletter">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>{{__('all.mail_register')}}</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="newsletter_form_container mx-auto">
                        <form action="#" method="post">
                            @csrf
                            <div
                                class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                                <input id="newsletter_email" class="newsletter_email" type="email"
                                       placeholder="{{__('all.email')}}" required="required">
                                <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                        value="Submit">{{__('all.mail_register_btn')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!--Footer content-->
        <div class="col-lg-12 footer_content">
            <div class="row">

                <!--Footer Column - About-->
                <div class="col-lg-4 footer_col">
                    <div class="footer_column_title">{{__('all.who')}}</div>
                    <div class="footer_column_content">
                        <ul>
                            @if(url()->current() == route('about'))
                                <li class="footer_list_item"><a href="#">{{__('all.about_site')}}</a></li>
                            @else
                                <li class="footer_list_item"><a href="{{route('about')}}">{{__('all.about_site')}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!--Footer Column - Menu-->
                <div class="col-lg-4 footer_col">
                    <div class="footer_column_title">{{__(('all.fast_links'))}}</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_list_item"><a href="#">{{__('all.home')}}</a></li>
                            @foreach($specializes as $specialize)
                                @if(url()->current() == route('specialize_questions', $specialize->id))
                                    @if(app()->getlocale() == 'ar')
                                        <li class="footer_list_item"><a href="#">{{$specialize->name_ar}}</a></li>
                                    @else
                                        <li class="footer_list_item"><a href="#">{{$specialize->name_en}}</a></li>
                                    @endif
                                @else
                                    @if(app()->getlocale() == 'ar')
                                        <li class="footer_list_item"><a
                                                href="{{route('specialize_questions', $specialize->id)}}">{{$specialize->name_ar}}</a>
                                        </li>
                                    @else
                                        <li class="footer_list_item"><a
                                                href="{{route('specialize_questions', $specialize->id)}}">{{$specialize->name_en}}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                            <li class="footer_list_item"><a
                                    href="{{route('index')}}#contact-us">{{__('all.contact')}}</a></li>
                        </ul>
                    </div>
                </div>

                <!--Footer Column - Contact-->
                <div class="col-lg-4 footer_col">
                    <div class="footer_column_title">{{__('all.for_contact')}}</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/location.svg')}}" alt="footer_location_icon">
                                </div>
                                <a href="#" style="font-size: .8rem">{{__('all.address')}}</a>
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/phone.svg')}}" alt="footer_contact_icon">
                                </div>
                                <a href="https://wa.me/+201011836243" target="_blank">01011836243</a>
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('images/email.svg')}}" alt="footer_contact_icon">
                                </div>
                                <a href="#" target="_blank">fatawa@support.com</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!--Footer copyright-->
        <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
            <div class="footer_copyright col-lg-6">
                    <span>&copy; {{__('all.copyright')}} <i class="fa fa-heart" aria-hidden="true"> </i><a
                            href="https://www.facebook.com/YousufAymooni" target="_blank">{{__('all.yousif')}}</a> <script>document.write(new Date().getFullYear())</script></span>
            </div>
            <div class="footer_social mx-sm-auto mx-md-auto col-lg-6 col-md-4">
                <ul class="menu_social text-lg-left">
                    <li class="menu_social_item"><a href="https://www.linkedin.com/in/yewess97/"
                                                    style="color: #4a4afa">
                            <i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="menu_social_item"><a href="https://www.instagram.com/yewess97/"
                                                    style="color: #ec0000">
                            <i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="menu_social_item"><a href="https://twitter.com/yewess97" style="color: #01b4de">
                            <i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="menu_social_item"><a href="https://www.facebook.com/YousufAymooni"
                                                    style="color: #0024ee">
                            <i class="fab fa-facebook-f"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</footer>

</div>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!--Scripts-->
<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/greensock/TweenMax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/greensock/TimelineMax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scrollmagic/ScrollMagic.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/greensock/animation.gsap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/easing/easing.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/aos/aos.js')}}"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
<script>
    AOS.init();
</script>
@yield('js')
<!--End Scripts-->
</body>
</html>
