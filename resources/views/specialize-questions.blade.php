@extends('layout.all_main')

@section('content')

    <!--page title-->
    <section class="page-title-section page-overlay" data-background="{{asset('images/fatwa-section-background.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline custom-breadcrumb text-center">
                        <li class="list-inline-item fatwa-sections">{{__('all.specializes')}}</li>
                        @if(app()->getlocale() == 'ar')
                            <li class="list-inline-item specialize-name"><i
                                    class="fas fa-angle-left"></i></li>
                        @else
                            <li class="list-inline-item specialize-name"><i
                                    class="fas fa-angle-right"></i></li>
                        @endif
                        <li class="list-inline-item text-white fatwa-sections">
                            @if(app()->getlocale() == 'ar')
                                {{$specialize->name_ar}}
                            @else
                                {{$specialize->name_en}}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--Fatwa section-->
    <section class="site-main-section" id="section-fav">
        <div class="container" id="content-fav">
            <div class="container-lg">
                <div class="container-lg">
                    <section class="site-section">
                        <div class="site-section-header text-center text-capitalize">
                            <span class="site-icon pb-2"><img src="{{asset('images/questions-answers.svg')}}"></span>
                            <p class="site-title text-center">{{__('all.new')}}</p>
                        </div>
                        <hr class="w-50 m-auto">
                        <div class="site-content">

                            @foreach($questions as $question)
                                <div class="question-item d-flex site-content-item">
                                    <div class="fav-icon">
                                        <a href="{{route('add_favourite', $question->id)}}" class="addFav">
                                            @if(app()->getlocale() == 'ar')
                                                <div class="fav-icon-tooltip position-relative"
                                                     data-toggle="tooltip"
                                                     data-placement="right"
                                                     title="{{__('all.add_favourite')}}"
                                                     style="cursor:pointer">
                                                    <span class="add-fav-icon">
                                                        <i class="fas fa-bookmark icon-favourite"></i>
                                                    </span>
                                                </div>
                                            @else
                                                <div class="fav-icon-tooltip position-relative"
                                                     data-toggle="tooltip"
                                                     data-placement="left"
                                                     title="{{__('all.add_favourite')}}"
                                                     style="cursor:pointer">
                                                    <span class="add-fav-icon">
                                                        <i class="fas fa-bookmark icon-favourite"></i>
                                                    </span>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <a href="{{route('question_answer', $question->id)}}"
                                       class="col-11 d-flex question-detail">
                                        <p class="question-title">{{$question->name}}</p>
                                        <p class="question-date">{{$question->created_at}}</p>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
