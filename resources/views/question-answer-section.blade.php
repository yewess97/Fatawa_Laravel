@extends('layout.all_main')

@section('content')

    <!--page title-->
    <section class="page-title-section page-overlay"
             data-background="{{asset('images/fatwa-section-background.jpg')}}">
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
                                {{$questions->specialize->name_ar}}
                            @else
                                {{$questions->specialize->name_en}}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="question-answer-section" id="section-table">
        <div class="container single-fatwa" id="content-table">

            <section class="text-center">
                <h1 class="question-section-title">
                    {{$questions->name}}
                </h1>
            </section>

            <div class="question-layout">
                <div class="question-layout-items">
                    <div class="question-layout-left">
                        <div class="question-level question-id">
                            <p class="question-id-txt" data-toggle="tooltip" title="{{__('all.question_num')}}">
                                <span class="question-id-icon">
                                    <i class="far fa-edit"></i>
                                </span>
                                {{$questions->id}}
                            </p>
                        </div>
                        <div class="question-level question-layout-date">
                            <p class="question-date-txt">{{__('all.post_date')}}: {{$questions->created_at}}</p>
                        </div>
                    </div>
                    <div class="question-layout-right mb-0 ml-4 mr-0">
                        <div class="question-level">
                            <a href="{{route('add_favourite', $questions->id)}}" class="fav-icon-tooltip d-flex addFav"
                               data-toggle="tooltip" title="{{__('all.add_favourite')}}" style="cursor:pointer">
                                <span class="add-fav-icon">
                                    <i class="fas fa-bookmark icon-favourite"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="question-text text-justify">
                <h2 class="the-question">{{__('all.question')}}</h2>
                <div>
                    <p>{{$questions->question_text}}</p>
                </div>
            </section>

            <div>
                <section>
                    <div class="answer-text">
                        <div class="the-answer mb-0">
                            <div class="the-answer-txt">
                                <div class="answer-item">
                                    <h2 class="answer">{{__('all.answer')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="answer-body text-justify p-0">
                        @if($questions->answer != false)
                                <div class="answer-content">
                                    <p style="color: #379401">{{__('all.praise')}}</p>
                                    <p class="content-answer">{{$questions->answer->name}}</p>
                                    <p style="color: #379401">{{__('all.best_known')}}</p>
                                </div>
                        @else
                            <p>{{__('all.no_answer')}}</p>
                        @endif
                    </section>
                </section>
            </div>
        </div>
    </section>

@endsection
