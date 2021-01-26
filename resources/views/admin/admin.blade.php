@extends('layout.all_admin')

@section('content')
<div id="main">

    <!--Milestones section-->
    <section id="milestones" class="milestones admin-section"
             style="background: linear-gradient(rgba(225,255,0,0.19), rgba(238,239,232,0)) center fixed">
        <div class="container">

            <div class="section-title">
                <h2>{{__('all.statistics_admin1')}}</h2>
            </div>

            <div class="row">

                <!--Milestone1-->
                <div class="col-lg-4 mb-5 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/medal.svg')}}" alt="users">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$specializes}}">0</div>
                        <div class="milestone_text">{{__('all.specializes_num')}}</div>
                    </div>
                </div>

                <!--Milestone2-->
                <div class="col-lg-4 mb-5 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/files.svg')}}" alt="questions">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$questions}}">0</div>
                        <div class="milestone_text">{{__('all.questions_num')}}</div>
                    </div>
                </div>

                <!--Milestone3-->
                <div class="col-lg-4 mb-5 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/notepad.svg')}}" alt="answers">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$answers}}">0</div>
                        <div class="milestone_text">{{__('all.answers_num')}}</div>
                    </div>
                </div>

                <!--Milestone4-->
                <div class="col-lg-6 mt-5 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/man.svg')}}" alt="admins">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$sheikhs}}">0</div>
                        <div class="milestone_text">{{__('all.sheikhs_num')}}</div>
                    </div>
                </div>

                <!--Milestone5-->
                <div class="col-lg-6 mt-5 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/user.svg')}}" alt="users">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$users}}">0</div>
                        <div class="milestone_text">{{__('all.users_num')}}</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
