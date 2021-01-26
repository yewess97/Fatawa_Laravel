@extends('layout.all_main')

@section('content')

    <div class="column" id="section-table">

        <!--Favourites empty-->
    @if($favourites->isEmpty())

        <!--Hamburger-->
            <div class="profile_hamburger_container my-favourites-empty">
                <i class="fas fa-bars trans_200"></i>
            </div>

            <div class="mb-4">
                <div class="empty-border text-center bg-white">
                    <figure class="figure-img position-relative d-flex justify-content-center">
                        <img src="{{asset('images/myfavourites-empty.png')}}">
                    </figure>
                    <p style="font-size: 1.2rem!important; line-height: 2.5; font-family: NotoKufiArabic, 'El Messiri', serif">
                        {{__('all.myfavourites-empty1')}}
                        <br>
                        {{__('all.myfavourites-empty2')}}
                    </p>
                </div>
            </div>
    @else

        <!--Hamburger-->
            <div class="profile_hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>

            <div class="favourites mb-4" id="content-table">

                @foreach($favourites as $favourite)
                    <div class="favourite-item">
                        <div class="favourite-data">
                            <div class="column delete-favourite-item">
                                <a class="delete-item delete" href="{{route('delete_favourite', $favourite->id)}}"
                                   data-toggle="tooltip" title="{{__('all.delete_favourite')}}">
                                    <i class="fas fa-trash del-fav-ico"></i>
                                </a>
                            </div>
                            <a class="name-item" href="{{route('question_answer', $favourite->question->id)}}">
                                <p>{{$favourite->question->name}}</p>
                            </a>
                            <div class="date-item">
                                <p>
                                    <span class="date-ico"><i class="far fa-calendar-alt"></i></span>
                                    {{$favourite->question->created_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        @endif

    </div>
@endsection
