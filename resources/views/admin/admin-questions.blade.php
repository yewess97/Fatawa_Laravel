@extends('layout.all_admin')

@section('content')
    <div class="super_container">

        <!--Add questions modal-->
        <div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0 p-4">
                    <div class="modal-header border-0">
                        <h3 style="font-family: Cairo">{{__('all.add_question')}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr class="w-25 mt-0">
                    <div class="modal-body">
                        <div class="login">
                            <form action="{{route('add_question')}}" class="row form-register" method="post">
                                @csrf
                                <div class="col-12">
                                    <label class="col-12">{{__('all.question_title')}}
                                        <input type="text" class="form-control mb-3" name="question_name"
                                               style="font-family: DroidArabicNaskh; height: 2.5rem">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="col-12">{{__('all.choose_section')}}
                                        <select class="input form-control mb-3" aria-required="true"
                                                style="cursor: pointer; height: 2.5rem" name="question_specialize">
                                            <option value="" disabled selected hidden></option>
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
                                    </label>
                                </div>
                                <div class="col-12">
                            <textarea class="form-control pb-5 col-12" type="text" name="question_text"
                                      placeholder="{{__('all.write_question')}}"
                                      style="font-family: DroidArabicNaskh"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary">{{__('all.add')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @foreach($questions as $question)
        <!--Answer questions modal-->
            <div class="modal fade" id="answerQuestions{{$question->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0 p-4">
                        <div class="modal-header border-0">
                            <h3 style="font-family: Cairo">{{__('all.answer_question')}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="w-25 mt-0">
                        <div class="modal-body">
                            <div class="login">
                                <form action="{{route('add_answer', $question->id)}}"
                                      class="row form-register"
                                      method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.question_title')}}:
                                            <input type="text" class="form-control mb-3" name="question_name"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem"
                                                   value="{{$question->name}}" data-value=""
                                                   onfocus="this.setAttribute('data-value', this.value);"
                                                   onchange="this.value = this.getAttribute('data-value');">
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.choose_section')}}:
                                            <select class="input form-control mb-3"
                                                    style="cursor: pointer; height: 2.5rem" name="question_specialize"
                                                    data-value="" onfocus="this.setAttribute('data-value', this.value);"
                                                    onchange="this.value = this.getAttribute('data-value');">
                                                @if(app()->getlocale() == 'ar')
                                                    <option
                                                        value="{{$question->specialize->id}}"
                                                        @if($question->specialize->id == $question->specialize_id) selected @endif>{{$question->specialize->name_ar}}</option>
                                                @else
                                                    <option
                                                        value="{{$question->specialize->id}}"
                                                        @if($question->specialize->id == $question->specialize_id) selected @endif>{{$question->specialize->name_en}}</option>
                                                @endif
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control pb-5 col-12" type="text" name="answer_name"
                                                  placeholder="{{__('all.answer')}}"
                                                  style="font-family: DroidArabicNaskh; color: #000000"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit"
                                                class="btn btn-primary mt-3">{{__('all.answer_q')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

    <!--Edit questions modal-->
        @foreach($questions as $question)
            <div class="modal fade" id="editQuestion{{$question->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0 p-4">
                        <div class="modal-header border-0">
                            <h3 style="font-family: Cairo">{{__('all.edit_question')}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="w-25 mt-0">
                        <div class="modal-body">
                            <div class="login">
                                <form action="{{route('update_question', $question->id)}}" class="row form-register"
                                      method="post" id="editForm">
                                    @csrf
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.question_title')}}
                                            <input type="text" class="form-control mb-3" name="question_name"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem"
                                                   value="{{$question->name}}">
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.choose_section')}}
                                            <select class="input form-control mb-3"
                                                    style="cursor: pointer; height: 2.5rem" name="question_specialize">
                                                <option value="" disabled selected hidden></option>
                                                @foreach($specializes as $specialize)
                                                    @if(app()->getlocale() == 'ar')
                                                        <option
                                                            value="{{$specialize->id}}"
                                                            @if($specialize->id == $question->specialize_id) selected @endif>{{$specialize->name_ar}}</option>
                                                    @else
                                                        <option
                                                            value="{{$specialize->id}}"
                                                            @if($specialize->id == $question->specialize_id) selected @endif>{{$specialize->name_en}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control pb-5 col-12" type="text"
                                                  placeholder="{{__('all.write_question_edit')}}"
                                                  style="font-family: DroidArabicNaskh"
                                                  name="question_text">{{$question->question_text}}</textarea>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-primary">{{__('all.edit1')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!--Questions-->
    <div id="main">
        <section id="questions" class="admin-section">
            <div class="container">

                <div class="section-title">
                    <h2>{{__('all.questions_admin1')}}</h2>
                </div>

                <div class="row" id="section-table">
                    <div class="table-responsive" id="content-table">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                            <tr class="text-center"
                                style="color: #303030; font-family: NotoKufiArabic; font-weight: 700; font-size: 13px;">
                                <th class="bg-light" scope="col">#</th>
                                <th class="bg-light" scope="col">{{__('all.question')}}</th>
                                <th class="bg-light" scope="col">{{__('all.user_name')}}</th>
                                <th class="bg-light" scope="col">{{__('all.choose_section')}}</th>
                                <th class="bg-light" scope="col">{{__('all.panel')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($questions as $question)
                                <tr style="font-family: DroidArabicNaskh; line-height: 1.8rem">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    @if(app()->getlocale() == 'ar')
                                        <td class="truncate_ar">{{$question->question_text}}</td>
                                    @else
                                        <td class="truncate_en">{{$question->question_text}}</td>
                                    @endif
                                    <td>
                                        @if(app()->getlocale() == 'ar')
                                            {{$question->user->name_ar}}
                                        @else
                                            {{$question->user->name_en}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(app()->getlocale() == 'ar')
                                            {{$question->specialize->name_ar}}
                                        @else
                                            {{$question->specialize->name_en}}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-12 d-flex text-center border-bottom-0"
                                             style="padding-left: 0">
                                            <div class="col-4">
                                                <button type="button" class="button btn btn-success"
                                                        data-toggle="modal"
                                                        data-target="#answerQuestions{{$question->id}}">{{__('all.answer')}}
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <button type="button" class="button btn btn-info"
                                                        data-toggle="modal"
                                                        data-target="#editQuestion{{$question->id}}">{{__('all.edit')}}
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{route('delete_question', $question->id)}}"
                                                   type="button"
                                                   class="button btn btn-danger delete">{{__('all.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-primary float-left pl-5 pr-5 mt-3 ml-5" data-toggle="modal"
                        data-target="#addQuestion">{{__('all.add_question')}}
                </button>
            </div>
        </section>
    </div>
@endsection
