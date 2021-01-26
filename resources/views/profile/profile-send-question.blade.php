@extends('layout.all_main')

@section('content')

    <div class="column">

        <!--Hamburger-->
        <div class="profile_hamburger_container send-questions">
            <i class="fas fa-bars trans_200"></i>
        </div>

        <div class="panel">
            <div class="col-lg-6 col-md-6 container">
                <div class="column">
                    <form action="{{route('add_question')}}" method="post" style="margin-top: 3rem" id="addForm">
                        @csrf
                        <div class="field">
                            <label class="label required">{{__('all.question_title')}}: &nbsp;</label>
                            <div class="control">
                                <input value="" type="text" class="form-control"
                                       name="question_name">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label required">{{__('all.choose_section')}}: &nbsp;</label>
                            <div class="control">
                                <select class="form-control" type="text"
                                        name="question_specialize">
                                    @foreach($specializes as $specialize)
                                        @if(app()->getlocale() == 'ar')
                                            <option
                                                value="{{$specialize->id}}">{{$specialize->name_ar}}</option>
                                        @else
                                            <option
                                                value="{{$specialize->id}}">{{$specialize->name_en}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <textarea class="form-control pb-5" type="text" name="question_text"
                                          placeholder="{{__('all.write_question')}}"
                                          style="font-family: DroidArabicNaskh"></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <button type="submit" class="btn btn-primary">{{__('all.send')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
