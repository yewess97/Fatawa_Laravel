@extends('layout.all_main')

@section('content')

    <audio autoplay hidden>
       <source src="{{asset('audio/audio-background.mp3')}}" type="audio/mp3">
    </audio>

    <!--Home-->
    <div class="home">

        <!--Hero Slider-->
        <div class="hero_slider_container">
            <div class="hero_slider owl-carousel">

            @if(app()->getlocale() == 'ar')
                <!--Hero Slide 1-->
                    <div class="hero_slide">
                        <img src="{{asset('images/ar_carousel1.jpg')}}"
                             class="hero_slide_background carousel1 img-fluid" alt="carousel_image">
                        <div class="overlay" style="opacity: .1;"></div>
                    </div>
                    <!--Hero Slide 2-->
                    <div class="hero_slide">
                        <img src="{{asset('images/carousel2.jpg')}}"
                             class="hero_slide_background carousel2 img-fluid" alt="carousel_image">
                        <div class="overlay"></div>
                        <div
                            class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                            <div class="hero_slide_content text-center">
                                <h1 style="line-height: 2em">احصل على <span>إجابات</span>
                                    لأسئلتك الآن!</h1>
                            </div>
                        </div>
                    </div>
            @else
                <!--Hero Slide 1-->
                    <div class="hero_slide">
                        <img src="{{asset('images/en_carousel1.jpg')}}"
                             class="hero_slide_background carousel1 img-fluid" alt="carousel_image">
                        <div class="overlay" style="opacity: .1;"></div>
                    </div>

                    <!--Hero Slide 2-->
                    <div class="hero_slide">
                        <img src="{{asset('images/carousel2.jpg')}}"
                             class="hero_slide_background carousel2 img-fluid" alt="carousel_image">
                        <div class="overlay"></div>
                        <div
                            class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                            <div class="hero_slide_content text-center">
                                <h1 style="line-height: 2em">Get <span>Answers</span>
                                    On Your Questions NOW!</h1>
                            </div>
                        </div>
                    </div>
            @endif

            <!--Hero Slide 3-->
                <div class="hero_slide">
                    <img src="{{asset('images/carousel3.jpg')}}"
                         class="hero_slide_background carousel3 img-fluid" alt="carousel_image">
                    <div class="overlay"></div>
                    <div
                        class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
                            <h1 style="width: 70%; line-height: 2em">{{__('all.reliable_fatwa')}}</h1>
                        </div>
                    </div>
                </div>

            </div>

            <div class="hero_slider_right hero_slider_nav trans_200 rounded-circle"><span class="trans_200"><i
                        class="fas fa-chevron-right"></i></span></div>
            <div class="hero_slider_left hero_slider_nav trans_200 rounded-circle"><span class="trans_200"><i
                        class="fas fa-chevron-left"></i></span></div>
        </div>

    </div>

    <!--Hero boxes-->
    <div class="hero_boxes">
        <div class="hero_boxes_inner">
            <div class="container">
                <div class="row">

                    <!--Hero box1-->
                    <div class="col-lg-4 hero_box_col" data-aos="fade-down" data-aos-duration="1500">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="{{asset('images/open-book.svg')}}" class="svg" alt="open_book_image">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title text-center">{{__('all.be_known')}}</h2>
                            </div>
                        </div>
                    </div>

                    <!--Hero box2-->
                    <div class="col-lg-4 hero_box_col" data-aos="fade-down" data-aos-duration="2200">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="{{asset('images/chat.svg')}}" class="svg" alt="chat_image">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">{{__('all.suspicions')}}</h2>
                            </div>
                        </div>
                    </div>

                    <!--Hero box3-->
                    <div class="col-lg-4 hero_box_col" data-aos="fade-down" data-aos-duration="3000">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="{{asset('images/life.svg')}}" class="svg" alt="life_image">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">{{__('all.be_aware')}}</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Fatawa cards-->
    <div class="popular page_section">
        <div class="container">
            <div class="row fatwa_boxes">

                <!--Fatwa card-->
                <?php $i = 0 ?> @foreach($specializes as $specialize)
                    <div class="col-lg-4 fatwa_box" data-aos="<?php $i++; if ($i % 3 == 1) {
                        echo "fade-left";
                    } elseif ($i % 3 == 2) {
                        echo "zoom-in";
                    } elseif ($i % 3 == 0) {
                        echo "fade-right";
                    } ?>" data-aos-duration="1300">
                        <div class="card p-0 hover-shadow">
                            <a href="{{route('specialize_questions', $specialize->id)}}">
                                <img class="card-img-top" src="{{asset($specialize->card_image)}}"
                                     alt="{{$specialize->alt_image}}">
                            </a>
                            <div class="card-body">
                                <a href="{{route('specialize_questions', $specialize->id)}}">
                                    @if(app()->getlocale() == 'ar')
                                        <h4 class="card-info card-title">{{$specialize->name_ar}}</h4>
                                    @else
                                        <h4 class="card-info card-title">{{$specialize->name_en}}</h4>
                                    @endif
                                </a>
                                @if(app()->getlocale() == 'ar')
                                    <p class="card-text">{{$specialize->description_ar}}</p>
                                @else
                                    <p class="card-text text-right">{{$specialize->description_en}}</p>
                                @endif
                                <a href="{{route('specialize_questions', $specialize->id)}}"
                                   class="btn btn-primary btn-sm">{{__('all.view_section')}}</a>
                            </div>
                            <div class="books_box d-flex flex-row align-items-center">
                                <div class="fatwa_books_icon">
                                    <img src="{{asset('images/books-stack-of-three.svg')}}" alt="book_icon"
                                         class="img-fluid">
                                </div>
                                <a href="{{$specialize->books_link}}" target="_blank">
                                    @if(app()->getlocale() == 'ar')
                                        <div class="fatwa_books_name">{{$specialize->books_name_ar}}</div>
                                    @else
                                        <div class="fatwa_books_name">{{$specialize->books_name_en}}</div>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--Register, Zad & Contact forms-->
    <div class="index-forms">
        <div class="container-fluid">
            <div class="row row-eq-height">

            @if(!Auth::check())
                <!--Register-->
                    <div class="col-lg-6 p-0">
                        <div class="register_section d-flex flex-column align-items-center justify-content-center">
                            <div class="register_content text-center">
                                <h1 class="register_title">{{__('all.form_register')}}</h1>
                                <p class="register_text">{{__('all.form_search')}}</p>
                                <div class="button_1 register_button mx-auto trans_200" data-toggle="modal"
                                     data-target="#signupModal">{{__('all.register')}}</div>
                            </div>
                        </div>
                    </div>
            @else
                <!--Hadith-->
                    <div class="col-lg-6 p-0">
                        <div class="hadith_section d-flex flex-column">
                            <div class="hadith_content">
                                <div class="hadith_overlay"></div>
                                @if(app()->getlocale() == 'ar')
                                    <img src="{{asset('images/hadith-background_ar.jpg')}}"
                                         class="img-fluid hadith_background_img w-100">
                                @else
                                    <img src="{{asset('images/hadith-background_en.jpg')}}"
                                         class="img-fluid hadith_background_img w-100">
                                @endif
                            </div>
                        </div>
                    </div>
            @endif
                
            <!--Contact-->
                <div class="col-lg-6 p-0" id="contact-us">
                    <div class="contact_section d-flex flex-column align-items-center justify-content-center">
                        <div class="contact_background"
                             style="background-image:url({{asset('images/search_background.jpg')}})"></div>
                        <div class="overlay" style="opacity: 0.15"></div>
                        <div class="contact_content text-center">
                            <h1 class="contact_title">{{__('all.contact_us')}}</h1>
                            <form action="#" method="post" class="contact_form">
                                @csrf
                                <input class="contact_form_title input_field" type="text"
                                       placeholder="{{__('all.third_name')}}" name="question_name"
                                       required="required" style="font-family: DroidArabicNaskh">
                                <select class="contact_form_category input_field"
                                        required="required" name="question_specialize">
                                    <option value="contact-fatwa" disabled selected
                                            hidden>{{__('all.gender')}}</option>
                                    <option value="male">{{__('all.male')}}</option>
                                    <option value="female">{{__('all.female')}}</option>
                                </select>
                                <textarea class="contact_form_question" type="text"
                                          placeholder="{{__('all.write_contact')}}" required="required"
                                          name="contact_text" style="font-family: DroidArabicNaskh"></textarea>
                                <button type="submit" class="contact_submit_button trans_200"
                                        value="Submit">{{__('all.send')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
