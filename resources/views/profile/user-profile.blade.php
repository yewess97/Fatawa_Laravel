@extends('layout.all_main')

@section('content')

    <div class="column">

        <!--Hamburger-->
        <div class="profile_hamburger_container user-profile">
            <i class="fas fa-bars trans_200"></i>
        </div>

        <div class="panel">
            <div class="col-lg-6 col-md-6 container">
                <div class="column">
                    @foreach($user_profiles as $user_profile)
                        <form action="{{route('update_profile', $user_profile->id)}}" method="post"
                              style="margin-top: 3rem" enctype="multipart/form-data" id="profileForm">
                            @csrf
                            @if(app()->getlocale() == 'en')
                                <div class="field error_message">
                                    <label class="label">{{__('all.name_ar')}}:</label>
                                    <div class="control">
                                        <input value="{{$user_profile->name_ar}}" type="text" class="form-control"
                                               name="name_ar" dir="rtl">
                                    </div>
                                </div>
                            @else
                                <div class="field error_message">
                                    <label class="label">{{__('all.name_ar')}}:</label>
                                    <div class="control">
                                        <input value="{{$user_profile->name_ar}}" type="text" class="form-control"
                                               name="name_ar">
                                    </div>
                                </div>
                            @endif
                            @if(app()->getlocale() == 'ar')
                                <div class="field">
                                    <label class="label">{{__('all.name_en')}}:</label>
                                    <div class="control">
                                        <input value="{{$user_profile->name_en}}" type="text" class="form-control"
                                               name="name_en" dir="ltr">
                                    </div>
                                </div>
                            @else
                                <div class="field">
                                    <label class="label">{{__('all.name_en')}}:</label>
                                    <div class="control">
                                        <input value="{{$user_profile->name_en}}" type="text" class="form-control"
                                               name="name_en">
                                    </div>
                                </div>
                            @endif
                            <div class="field">
                                <label class="label">{{__('all.birth')}}:</label>
                                <div class="control">
                                    <input value="{{$user_profile->birth_date}}" type="date" class="form-control"
                                           name="birth_date" dir="ltr">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">{{__('all.status')}}:</label>
                                <select class="input form-control"
                                        aria-required="true"
                                        style="cursor: pointer"
                                        name="social_status">
                                    @if($user_profile->gender == 'male')
                                        <option value="single"
                                                @if($user_profile->social_status == 'single') selected @endif>{{__('all.single_male')}}</option>
                                        <option value="engaged"
                                                @if($user_profile->social_status == 'engaged') selected @endif>{{__('all.engaged_male')}}</option>
                                        <option value="married"
                                                @if($user_profile->social_status == 'married') selected @endif>{{__('all.married_male')}}</option>
                                        <option value="widower"
                                                @if($user_profile->social_status == 'widower') selected @endif>{{__('all.widower_male')}}</option>
                                        <option value="divorced"
                                                @if($user_profile->social_status == 'divorced') selected @endif>{{__('all.divorced_male')}}</option>
                                    @else
                                        <option value="single"
                                                @if($user_profile->social_status == 'single') selected @endif>{{__('all.single_female')}}</option>
                                        <option value="engaged"
                                                @if($user_profile->social_status == 'engaged') selected @endif>{{__('all.engaged_female')}}</option>
                                        <option value="married"
                                                @if($user_profile->social_status == 'married') selected @endif>{{__('all.married_female')}}</option>
                                        <option value="widower"
                                                @if($user_profile->social_status == 'widower') selected @endif>{{__('all.widower_female')}}</option>
                                        <option value="divorced"
                                                @if($user_profile->social_status == 'divorced') selected @endif>{{__('all.divorced_female')}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="field d-flex gender">
                                <label class="label d-flex">{{__('all.gender')}}:</label>
                                <label class="checkbox radio d-flex col-4 mr-4">{{__('all.male')}}
                                    <input type="radio" name="gender" value="male"
                                           @if($user_profile->gender == 'male') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox radio d-flex col-5">{{__('all.female')}}
                                    <input type="radio" name="gender" value="female"
                                           @if($user_profile->gender == 'female') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="field">
                                <label class="label">{{__('all.email')}}:</label>
                                <div class="control">
                                    <input value="{{$user_profile->email}}" type="text" class="form-control"
                                           name="email"
                                           dir="ltr">
                                </div>
                            </div>
                            <div class="field error_message">
                                <label class="label">{{__('all.password')}}:</label>
                                <div class="control">
                                    <input type="password" class="form-control" name="password"
                                           dir="ltr">
                                </div>
                            </div>
                            <div class="field error_message">
                                <label class="label">{{__('all.mobile')}}:</label>
                                <div class="control">
                                    <input value="{{$user_profile->phone}}" type="text" class="form-control"
                                           name="mobile_number"
                                           dir="ltr">
                                </div>
                            </div>
                            @if($user_profile->role == 1)
                                <div class="field">
                                    <label class="label">{{__('all.specialize')}}:</label>
                                    <select class="input form-control mb-3" aria-required="true"
                                            style="cursor: pointer"
                                            name="sheikh_specialize">
                                        <option value="" disabled selected hidden></option>
                                        @foreach($specializes as $specialize)
                                            @if(app()->getlocale() == 'ar')
                                                <option
                                                    value="{{$specialize->id}}"
                                                    @if($specialize->id == $user_profile->specialize_id) selected @endif>{{$specialize->name_ar}}</option>
                                            @else
                                                <option
                                                    value="{{$specialize->id}}"
                                                    @if($specialize->id == $user_profile->specialize_id) selected @endif>{{$specialize->name_en}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="field">
                                <label class="label">{{__('all.image')}}:</label>
                                <div class="text-center">
                                    <img src="{{asset($user_profile->users_image)}}"
                                         class="rounded-circle mt-3 mb-3 img-users">
                                </div>
                                <input type="file" name="image" class="btn btn-info"
                                       style="cursor: pointer; overflow: hidden; width: 100%" dir="ltr">
                            </div>
                            <hr>
                            <div class="field text-center">
                                <button type="submit" class="btn btn-primary">{{__('all.save_account')}}</button>
                                <a href="{{route('delete_profile', $user_profile->id)}}" type="button" class="btn btn-danger mt-3" style="color: #FFFFFF">{{__('all.delete_account')}}</a>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
