@extends('layout.all_main')

@section('content')

    <div class="column" id="section-table">

        <!--Questions empty-->
    @if($questions->isEmpty())

        <!--Hamburger-->
            <div class="profile_hamburger_container my-questions-empty">
                <i class="fas fa-bars trans_200"></i>
            </div>

            <div class="mb-4">
                <div class="empty-border text-center bg-white">
                    <figure class="figure-img position-relative d-flex justify-content-center">
                        <img src="{{asset('images/myquestions-empty.png')}}">
                    </figure>
                    <p style="font-size: 1.2rem!important; line-height: 2.5; font-family: NotoKufiArabic, 'El Messiri', serif">
                        {{__('all.myquestions-empty1')}}
                        <br>
                        {{__('all.myquestions-empty2')}}
                    </p>
                </div>
            </div>
    @else

        <!--Hamburger-->
            <div class="profile_hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>

            <div class="favourites mb-4" id="content-table">

                @foreach($questions as $question)
                    <div class="favourite-item">
                        <div class="favourite-data">
                            <div class="column delete-favourite-item">
                                <a class="delete-item delete"
                                   href="{{route('delete_question', $question->id)}}"
                                   data-toggle="tooltip" title="{{__('all.delete_question')}}">
                                    <i class="fas fa-trash del-fav-ico"></i>
                                </a>
                            </div>
                            <a class="name-item" href="{{route('question_answer', $question->id)}}">
                                <p>{{$question->name}}</p>
                            </a>
                            <div class="date-item">
                                <p>
                                    <span class="date-ico"><i class="far fa-calendar-alt"></i></span>
                                    {{$question->created_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        @endif

    </div>

@endsection
