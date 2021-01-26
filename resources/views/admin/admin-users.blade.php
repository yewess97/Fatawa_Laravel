@extends('layout.all_admin')

@section('content')
    <div class="super_container">

        <!--Add user modal-->
        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0 p-4">
                    <div class="modal-header border-0">
                        <h3 style="font-family: Cairo">{{__('all.register_user')}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr class="w-25 mt-0">
                    <div class="modal-body">
                        <div class="login">
                            <form action="{{route('add_user')}}" class="row form-register" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @if(app()->getlocale() == 'en')
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12 required">{{__('all.name_ar')}}
                                            &nbsp;</label>
                                        <input type="text" class="form-control"
                                               name="name_ar"
                                               value="{{old('name_ar')}}" required dir="rtl">
                                    </div>
                                @else
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12 required">{{__('all.name_ar')}}
                                            &nbsp;</label>
                                        <input type="text" class="form-control"
                                               name="name_ar"
                                               value="{{old('name_ar')}}" required>
                                    </div>
                                @endif
                                @if(app()->getlocale() == 'ar')
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12 required">{{__('all.name_en')}}
                                            &nbsp;</label>
                                        <input type="text" class="form-control"
                                               name="name_en"
                                               value="{{old('name_en')}}" required dir="ltr">
                                    </div>
                                @else
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12 required">{{__('all.name_en')}}
                                            &nbsp;</label>
                                        <input type="text" class="form-control"
                                               name="name_en"
                                               value="{{old('name_en')}}" required>
                                    </div>
                                @endif
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.birth')}}
                                        &nbsp;</label>
                                    <input type="date" class="form-control"
                                           name="birth_date"
                                           value="{{old('birth_date')}}" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.gender')}}
                                        &nbsp;</label>
                                    <select class="input form-control"
                                            style="cursor: pointer" name="gender" required>
                                        <option value="" disabled selected
                                                hidden></option>
                                        <option
                                            value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                            {{__('all.male')}}
                                        </option>
                                        <option
                                            value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                            {{__('all.female')}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.email')}}
                                        &nbsp;</label>
                                    <input type="email" class="form-control"
                                           name="email" value="{{old('email')}}" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.mobile')}}
                                        &nbsp;</label>
                                    <input type="text" class="form-control"
                                           name="mobile_number"
                                           value="{{old('mobile_number')}}" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.password')}}
                                        &nbsp;</label>
                                    <input type="password" class="form-control"
                                           name="password" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.confirm_password')}}
                                        &nbsp;</label>
                                    <input type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label
                                        class="col-12 required">{{__('all.status')}}
                                        &nbsp;</label>
                                    <select class="input form-control"
                                            aria-required="true"
                                            style="cursor: pointer" name="social_status" required>
                                        <option value="" disabled selected
                                                hidden></option>
                                        <option
                                            value="single" {{ old('social_status') == 'single' ? 'selected' : '' }}>
                                            {{__('all.single')}}
                                        </option>
                                        <option
                                            value="engaged" {{ old('social_status') == 'engaged' ? 'selected' : '' }}>
                                            {{__('all.engaged')}}
                                        </option>
                                        <option
                                            value="married" {{ old('social_status') == 'married' ? 'selected' : '' }}>
                                            {{__('all.married')}}
                                        </option>
                                        <option
                                            value="widower" {{ old('social_status') == 'widower' ? 'selected' : '' }}>
                                            {{__('all.widower')}}
                                        </option>
                                        <option
                                            value="divorced" {{ old('social_status') == 'divorced' ? 'selected' : '' }}>
                                            {{__('all.divorced')}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label
                                        class="col-12">{{__('all.image')}} &nbsp; ({{__('all.optional')}})</label>
                                    <input type="file" name="image"
                                           class="btn btn-success"
                                           style="cursor: pointer; overflow: hidden; width: 100%" dir="ltr" value="{{old('image')}}">
                                </div>
                                <div class="col-12">
                                    <label class="col-12 required">{{__('all.role')}} &nbsp;</label>
                                    <select class="input form-control mb-3" aria-required="true"
                                            style="cursor: pointer" name="role" required>
                                        <option value="" disabled selected hidden></option>
                                        <option
                                            value="0" {{ old('role') == '0' ? 'selected' : '' }}>{{__('all.user')}}</option>
                                        <option
                                            value="2" {{ old('role') == '2' ? 'selected' : '' }}>{{__('all.admin')}}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">{{__('all.register')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit users data modal-->
        @foreach($users as $user)
            <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0 p-4">
                        <div class="modal-header border-0">
                            <h3 style="font-family: Cairo">{{__('all.edit_user')}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="w-50 mt-0">
                        <div class="modal-body">
                            <div class="login">
                                <form action="{{route('update_user', $user->id)}}" class="row form-register"
                                      method="post" enctype="multipart/form-data" id="editForm">
                                    @csrf
                                    @if(app()->getlocale() == 'en')
                                        <div class="col-6 mb-4">
                                            <label
                                                class="col-12">{{__('all.name_ar')}}
                                                &nbsp;</label>
                                            <input type="text" class="form-control"
                                                   name="name_ar"
                                                   value="{{$user->name_ar}}" dir="rtl">
                                        </div>
                                    @else
                                        <div class="col-6 mb-4">
                                            <label
                                                class="col-12">{{__('all.name_ar')}}
                                                &nbsp;</label>
                                            <input type="text" class="form-control"
                                                   name="name_ar"
                                                   value="{{$user->name_ar}}">
                                        </div>
                                    @endif
                                    @if(app()->getlocale() == 'ar')
                                        <div class="col-6 mb-4">
                                            <label
                                                class="col-12">{{__('all.name_en')}}
                                                &nbsp;</label>
                                            <input type="text" class="form-control"
                                                   name="name_en"
                                                   value="{{$user->name_en}}" dir="ltr">
                                        </div>
                                    @else
                                        <div class="col-6 mb-4">
                                            <label
                                                class="col-12">{{__('all.name_en')}}
                                                &nbsp;</label>
                                            <input type="text" class="form-control"
                                                   name="name_en"
                                                   value="{{$user->name_en}}">
                                        </div>
                                    @endif
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.birth')}}
                                            &nbsp;</label>
                                        <input type="date" class="form-control"
                                               name="birth_date"
                                               value="{{$user->birth_date}}">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.gender')}}
                                            &nbsp;</label>
                                        <select class="input form-control"
                                                style="cursor: pointer"
                                                name="gender">
                                            <option value="male"
                                                    @if($user->gender == 'male') selected @endif>{{__('all.male')}}</option>
                                            <option value="female"
                                                    @if($user->gender == 'female') selected @endif>{{__('all.female')}}</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.email')}}
                                            &nbsp;</label>
                                        <input type="email" class="form-control"
                                               name="email"
                                               value="{{$user->email}}">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.mobile')}}
                                            &nbsp;</label>
                                        <input type="text" class="form-control"
                                               name="mobile_number"
                                               value="{{$user->phone}}">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.password')}}
                                            &nbsp;</label>
                                        <input type="password" class="form-control"
                                               name="password">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.confirm_password')}}
                                            &nbsp;</label>
                                        <input type="password" class="form-control"
                                               name="password_confirmation">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label
                                            class="col-12">{{__('all.status')}}
                                            &nbsp;</label>
                                        <select class="input form-control"
                                                aria-required="true"
                                                style="cursor: pointer"
                                                name="social_status">
                                            @if($user->gender == 'male')
                                                <option value="single"
                                                        @if($user->social_status == 'single') selected @endif>{{__('all.single_male')}}</option>
                                                <option value="engaged"
                                                        @if($user->social_status == 'engaged') selected @endif>{{__('all.engaged_male')}}</option>
                                                <option value="married"
                                                        @if($user->social_status == 'married') selected @endif>{{__('all.married_male')}}</option>
                                                <option value="widower"
                                                        @if($user->social_status == 'widower') selected @endif>{{__('all.widower_male')}}</option>
                                                <option value="divorced"
                                                        @if($user->social_status == 'divorced') selected @endif>{{__('all.divorced_male')}}</option>
                                            @else
                                                <option value="single"
                                                        @if($user->social_status == 'single') selected @endif>{{__('all.single_female')}}</option>
                                                <option value="engaged"
                                                        @if($user->social_status == 'engaged') selected @endif>{{__('all.engaged_female')}}</option>
                                                <option value="married"
                                                        @if($user->social_status == 'married') selected @endif>{{__('all.married_female')}}</option>
                                                <option value="widower"
                                                        @if($user->social_status == 'widower') selected @endif>{{__('all.widower_female')}}</option>
                                                <option value="divorced"
                                                        @if($user->social_status == 'divorced') selected @endif>{{__('all.divorced_female')}}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="col-12">{{__('all.image')}}</label>
                                        <input type="file" name="image" class="img-fluid btn btn-success"
                                               style="cursor: pointer; overflow: hidden; width: 100%" dir="ltr">
                                        <div class="text-center mt-2">
                                            <img src="{{asset($user->users_image)}}"
                                                 class="rounded-circle img-fluid img-users">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-12">{{__('all.role')}} &nbsp;</label>
                                        <select class="input form-control mb-3"
                                                style="cursor: pointer" name="role">
                                            <option value="" disabled selected hidden></option>
                                            <option value="0"
                                                    @if($user->role == '0') selected @endif>{{__('all.user')}}</option>
                                            <option value="2"
                                                    @if($user->role == '2') selected @endif>{{__('all.admin')}}</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{__('all.edit')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!--Users-->
    <div id="main">
        <section id="users" class="admin-section">
            <div class="container">

                <div class="section-title">
                    <h2>{{__('all.users_admin')}}</h2>
                </div>

                <div class="row" id="section-table">
                    <div class="table-responsive" id="content-table">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                            <tr class="text-center"
                                style="color: #303030; font-family: NotoKufiArabic; font-weight: 700; font-size: 13px;">
                                <th class="bg-light" scope="col">#</th>
                                <th class="bg-light" scope="col">{{__('all.name')}}</th>
                                <th class="bg-light" scope="col">{{__('all.age')}}</th>
                                <th class="bg-light" scope="col">{{__('all.gender')}}</th>
                                <th class="bg-light" scope="col">{{__('all.status')}}</th>
                                <th class="bg-light" scope="col">{{__('all.email')}}</th>
                                <th class="bg-light" scope="col">{{__('all.mobile')}}</th>
                                <th class="bg-light" scope="col">{{__('all.image_admin')}}</th>
                                <th class="bg-light" scope="col">{{__('all.role')}}</th>
                                <th class="bg-light" scope="col">{{__('all.panel')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr style="font-family: DroidArabicNaskh; line-height: 1.8rem">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        @if(app()->getlocale() == 'ar')
                                            {{$user->name_ar}}
                                        @else
                                            {{$user->name_ar}}
                                        @endif
                                    </td>
                                    <td>{{$user->age}} {{__('all.year')}}</td>
                                    <td>
                                        @if($user->gender == 'male')
                                            {{__('all.male')}}
                                        @else
                                            {{__('all.female')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->gender == 'male')
                                            @if($user->social_status == 'single')
                                                {{__('all.single_male')}}
                                            @elseif($user->social_status == 'engaged')
                                                {{__('all.engaged_male')}}
                                            @elseif($user->social_status == 'married')
                                                {{__('all.married_male')}}
                                            @elseif($user->social_status == 'widower')
                                                {{__('all.widower_male')}}
                                            @elseif($user->social_status == 'divorced')
                                                {{__('all.divorced_male')}}
                                            @endif
                                        @else
                                            @if($user->social_status == 'single')
                                                {{__('all.single_female')}}
                                            @elseif($user->social_status == 'engaged')
                                                {{__('all.engaged_female')}}
                                            @elseif($user->social_status == 'married')
                                                {{__('all.married_female')}}
                                            @elseif($user->social_status == 'widower')
                                                {{__('all.widower_female')}}
                                            @elseif($user->social_status == 'divorced')
                                                {{__('all.divorced_female')}}
                                            @endif
                                        @endif
                                    </td>
                                    <td dir="ltr">{{$user->email}}</td>
                                    <td dir="ltr">{{$user->phone}}</td>
                                    <td class="text-center">
                                        <img src="{{asset($user->users_image)}}"
                                             class="rounded-circle text-center img-users-table"
                                             style="box-shadow: 0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19); width: 70px; height: 70px">
                                    </td>
                                    @if($user->role == 0)
                                        <td>{{__('all.user')}}</td>
                                    @elseif($user->role == 2)
                                        <td>{{__('all.admin')}}</td>
                                    @endif
                                    <td>
                                        <div class="col-12 d-flex text-center border-bottom-0" style="padding-left: 0">
                                            <div class="col-6">
                                                <button type="button" class="button btn btn-info" data-toggle="modal"
                                                        data-target="#editUser{{$user->id}}">{{__('all.edit')}}
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{route('delete_user', $user->id)}}" type="button"
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
                        data-target="#addUser">{{__('all.add_user')}}
                </button>
            </div>
        </section>
    </div>
@endsection
