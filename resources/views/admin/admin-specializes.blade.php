@extends('layout.all_admin')

@section('content')
    <div class="super_container">

        <!--Add specialize modal-->
        <div class="modal fade" id="addSpecialize" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0 p-4">
                    <div class="modal-header border-0">
                        <h3 style="font-family: Cairo">{{__('all.add_specialize')}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr class="w-25 mt-0">
                    <div class="modal-body">
                        <div class="login">
                            <form action="{{route('add_specialize')}}" method="post" enctype="multipart/form-data"
                                  class="row form-register">
                                @csrf
                                @if(app()->getlocale() == 'en')
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.specialize_name_ar')}}
                                            <input type="text" class="form-control mb-3"
                                                   name="name_ar" required="required"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem" dir="rtl">
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.specialize_name_en')}}
                                            <input type="text" class="form-control mb-3" name="name_en"
                                                   required="required"
                                                   style="font-family: 'Times New Roman'; height: 2.5rem">
                                        </label>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.specialize_name_ar')}}
                                            <input type="text" class="form-control mb-3"
                                                   name="name_ar" required="required"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem">
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.specialize_name_en')}}
                                            <input type="text" class="form-control mb-3" name="name_en"
                                                   required="required"
                                                   style="font-family: 'Times New Roman'; height: 2.5rem" dir="ltr">
                                        </label>
                                    </div>
                                @endif
                                @if(app()->getlocale() == 'en')
                                    <div class="col-12">
                                <textarea class="form-control pb-5 col-12 mb-4" type="text"
                                          name="description_ar" placeholder="{{__('all.specialize_description_ar')}}"
                                          required="required" style="font-family: DroidArabicNaskh"
                                          dir="rtl"></textarea>
                                    </div>
                                    <div class="col-12">
                                <textarea class="form-control pb-5 col-12 mb-4" type="text"
                                          name="description_en" placeholder="{{__('all.specialize_description_en')}}"
                                          required="required"
                                          style="font-family: 'Times New Roman'"></textarea>
                                    </div>
                                @else
                                    <div class="col-12">
                                <textarea class="form-control pb-5 col-12 mb-4" type="text"
                                          name="description_ar" placeholder="{{__('all.specialize_description_ar')}}"
                                          required="required" style="font-family: DroidArabicNaskh"></textarea>
                                    </div>
                                    <div class="col-12">
                                <textarea class="form-control pb-5 col-12 mb-4" type="text"
                                          name="description_en" placeholder="{{__('all.specialize_description_en')}}"
                                          required="required"
                                          style="font-family: 'Times New Roman'" dir="ltr"></textarea>
                                    </div>
                                @endif
                                <div class="col-5 btn btn-success mb-4"
                                     style="position: relative; overflow: hidden; right: 15px; font-size: 15px; padding: 14px 0 14px 0; z-index: 3">
                                    {{__('all.image')}}
                                    <input type="file" name="card_image" class="img-fluid"
                                           style="cursor: pointer; position: relative; width: 71%; margin-top: 15px"
                                           dir="ltr">
                                </div>
                                <div class="col-12">
                                    <label class="col-12">{{__('all.specialize_alt_img')}}
                                        <input type="text" class="form-control mb-3" name="alt_image"
                                               required="required"
                                               style="font-family: DroidArabicNaskh; height: 2.5rem" dir="ltr">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="col-12">{{__('all.specialize_books_ar')}}
                                        <input type="text" class="form-control mb-3" name="books_name_ar"
                                               required="required"
                                               style="font-family: DroidArabicNaskh; height: 2.5rem">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="col-12">{{__('all.specialize_books_en')}}
                                        <input type="text" class="form-control mb-3" name="books_name_en"
                                               required="required"
                                               style="font-family: 'Times New Roman'; height: 2.5rem" dir="ltr">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="col-12">{{__('all.specialize_books_link')}}
                                        <input type="text" class="form-control mb-3" name="books_link"
                                               required="required"
                                               style="font-family: Arial; height: 2.5rem" dir="ltr">
                                    </label>
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


        <!--Edit specialize modal-->
        @foreach($specializes as $specialize)
            <div class="modal fade" id="editSpecialize{{$specialize->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0 p-4">
                        <div class="modal-header border-0">
                            <h3 style="font-family: Cairo">{{__('all.edit_specialize')}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="w-25 mt-0">
                        <div class="modal-body">
                            <div class="login">
                                <form action="{{route('update_specialize', $specialize->id)}}" method="post"
                                      enctype="multipart/form-data" class="row form-register" id="editForm">
                                    @csrf
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.specialize_name_ar')}}
                                            <input type="text" class="form-control mb-3" name="name_ar"
                                                   value="{{$specialize->name_ar}}"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem">
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.specialize_name_en')}}
                                            <input type="text" class="form-control mb-3" name="name_en"
                                                   value="{{$specialize->name_en}}"
                                                   style="font-family: 'Times New Roman'; height: 2.5rem" dir="ltr">
                                        </label>
                                    </div>
                                    <div class="col-12">
                                <textarea class="form-control pb-5 col-12 mb-4" type="text" name="description_ar"
                                          placeholder="{{__('all.specialize_description_ar')}}"
                                          style="font-family: DroidArabicNaskh">{{$specialize->description_ar}}</textarea>
                                    </div>
                                    <div class="col-12">
                                <textarea class="form-control pb-5 col-12 mb-4" type="text" name="description_en"
                                          placeholder="{{__('all.specialize_description_en')}}"
                                          style="font-family: 'Times New Roman'"
                                          dir="ltr">{{$specialize->description_en}}</textarea>
                                    </div>
                                    <div class="col-5 btn btn-success mb-4"
                                         style="position: relative; overflow: hidden; right: 15px; font-size: 15px; padding: 14px 0 14px 0; z-index: 3">
                                        {{__('all.image')}}
                                        <input type="file" name="card_image" value="{{$specialize->card_image}}"
                                               class="img-fluid"
                                               style="cursor: pointer; position: relative; width: 71%; margin-top: 15px"
                                               dir="ltr">
                                        <img class="img-fluid " src="{{asset($specialize->card_image)}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.specialize_alt_img')}}
                                            <input type="text" class="form-control mb-3" name="alt_image"
                                                   value="{{$specialize->alt_image}}"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem" dir="ltr">
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.specialize_books_ar')}}
                                            <input type="text" class="form-control mb-3" name="books_name_ar"
                                                   value="{{$specialize->books_name_ar}}"
                                                   style="font-family: DroidArabicNaskh; height: 2.5rem">
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.specialize_books_en')}}
                                            <input type="text" class="form-control mb-3" name="books_name_en"
                                                   value="{{$specialize->books_name_en}}"
                                                   style="font-family: 'Times New Roman'; height: 2.5rem" dir="ltr">
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.specialize_books_link')}}
                                            <input type="text" class="form-control mb-3" name="books_link"
                                                   value="{{$specialize->books_link}}"
                                                   style="font-family: Arial; height: 2.5rem" dir="ltr">
                                        </label>
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


    <!--Specializes-->
    <div id="main">
        <section id="specializes" class="admin-section">
            <div class="container">

                <div class="section-title">
                    <h2>{{__('all.specializes_admin1')}}</h2>
                </div>

                <div class="row" id="section-table">
                    <div class="table-responsive" id="content-table">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                            <tr class="text-center"
                                style="color: #303030; font-family: NotoKufiArabic; font-weight: 700; font-size: 13px;">
                                <th class="bg-light" scope="col">#</th>
                                <th class="bg-light" scope="col">{{__('all.specialize')}}</th>
                                <th class="bg-light" scope="col">{{__('all.specialize_description')}}</th>
                                <th class="bg-light" scope="col" style="width: 16%">{{__('all.image_admin')}}</th>
                                <th class="bg-light" scope="col">{{__('all.specialize_books')}}</th>
                                <th class="bg-light" scope="col">{{__('all.panel')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($specializes as $specialize)
                                <tr style="font-family: DroidArabicNaskh; line-height: 1.8rem">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$specialize->name_ar}}</td>
                                    <td>{{$specialize->description_ar}}</td>
                                    <td><img src="{{asset($specialize->card_image)}}" alt="{{$specialize->alt_image}}"
                                             class="img-fluid rounded"></td>
                                    <td>
                                        <a href="{{$specialize->books_link}}" target="_blank"
                                           class="books_link">
                                            {{$specialize->books_name_ar}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="col-12 d-flex text-center border-bottom-0" style="padding-left: 0">
                                            <div class="col-6">
                                                <button type="button" class="button btn btn-info" data-toggle="modal"
                                                        data-target="#editSpecialize{{$specialize->id}}">{{__('all.edit')}}
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{route('delete_specialize', $specialize->id)}}"
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
                <button type="button" class="btn btn-primary float-left pl-5 pr-5 mt-3 ml-4" data-toggle="modal"
                        data-target="#addSpecialize">{{__('all.add_specialize')}}
                </button>
            </div>
        </section>
    </div>
@endsection
