@extends('layout.all_admin')

@section('content')

    <div class="super_container">

        <!--Edit answer questions modal-->
        @foreach($answers as $answer)
            <div class="modal fade" id="editAnswer{{$answer->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0 p-4">
                        <div class="modal-header border-0">
                            <h3 style="font-family: Cairo">{{__('all.edit_answer')}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="w-25 mt-0">
                        <div class="modal-body">
                            <div class="login">
                                <form action="{{route('update_answer', $answer->id)}}"
                                      class="row form-register" method="post" id="editForm">
                                    @csrf
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.question_number')}}:
                                            <input type="text" class="form-control mb-3" name="question_name"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem"
                                                   value="{{$answer->question->id}}" data-value=""
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
                                                        value="{{$answer->question->specialize->id}}">{{$answer->question->specialize->name_ar}}</option>
                                                @else
                                                    <option
                                                        value="{{$answer->question->specialize->id}}">{{$answer->question->specialize->name_en}}</option>
                                                @endif
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control pb-5 col-12" type="text"
                                                  placeholder="{{__('all.write_answer_edit')}}"
                                                  style="font-family: DroidArabicNaskh"
                                                  name="answer_name">{{$answer->name}}</textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary mt-3">{{__('all.edit')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!--Answers-->
    <div id="main" style="margin-bottom: 11.3rem">
        <section id="answers" class="admin-section">
            <div class="container">

                <div class="section-title">
                    <h2>{{__('all.answers_admin1')}}</h2>
                </div>

                <div class="row" id="section-table">
                    <div class="table-responsive" id="content-table">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                            <tr class="text-center"
                                style="color: #303030; font-family: NotoKufiArabic; font-weight: 700; font-size: 13px;">
                                <th class="bg-light" scope="col">#</th>
                                <th class="bg-light" scope="col">{{__('all.answer')}}</th>
                                <th class="bg-light" scope="col">{{__('all.question_title')}}</th>
                                <th class="bg-light" scope="col">{{__('all.choose_section')}}</th>
                                <th class="bg-light" scope="col">{{__('all.sheikh_answered')}}</th>
                                <th class="bg-light" scope="col">{{__('all.panel')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($answers as $answer)
                                <tr style="font-family: DroidArabicNaskh; line-height: 1.8rem">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    @if(app()->getlocale() == 'ar')
                                        <td class="truncate_ar">{{$answer->name}}</td>
                                    @else
                                        <td class="truncate_en">{{$answer->name}}</td>
                                    @endif
                                    <td>{{$answer->question->name}}</td>
                                    <td>
                                        @if(app()->getlocale() == 'ar')
                                            {{$answer->question->specialize->name_ar}}
                                        @else
                                            {{$answer->question->specialize->name_en}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(app()->getlocale() == 'ar')
                                            {{$answer->user->name_ar}}
                                        @else
                                            {{$answer->user->name_en}}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-12 d-flex text-center border-bottom-0" style="padding-left: 0">
                                            <div class="col-6">
                                                <button type="button" class="button btn btn-info" data-toggle="modal"
                                                        data-target="#editAnswer{{$answer->id}}">{{__('all.edit')}}
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{route('delete_answer', $answer->id)}}"
                                                   type="button"
                                                   class="button btn btn-danger delete">{{__('all.delete')}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
