@extends('trainer.layouts.master')
@section('header')
    <link href="{{asset('plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('trainer_fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item">{{trans('form.all_members')}}</li>
                    <li class="breadcrumb-item active">{{$relation->user->name}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="text-center card-box">
                <div class="member-card">
                    <div class="thumb-xl member-thumb m-b-10 center-block">
                        <img style="border-radius: 100%; width: 150px; height: 150px;" src="
                        @if($relation->user->photos->first())
                        {{asset('assets/images') . '/' . $relation->user->photos->first()->path}}
                        @else
                        {{asset('assets/images') . '/' .'gym.png'}}
                        @endif" class="rounded-circle img-thumbnail" >
                    </div>

                    <div class="">
                        <h5 class="m-b-5">{{$relation->user->name}}</h5>
                        <p class="text-muted">#{{$relation->category->name}}</p>
                    </div>

                    {{--<button type="button" class="btn btn-info  btn-sm w-sm waves-effect m-t-10 waves-light">{{trans('form.redirect')}}</button>--}}
                    {{--<button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Message</button>--}}


                    <div class="text-left m-t-40">
                        <p class="text-muted font-13"><strong>{{trans('form.code')}} :</strong> <span class="m-l-15">{{$relation->code}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.phone')}} :</strong><span class="m-l-15">{{$relation->user->phone}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.email')}} :</strong> <span class="m-l-15">{{$relation->user->email}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.created_at')}} :</strong> <span class="m-l-15">{{$relation->created_at}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.end_date')}} :</strong> <span class="m-l-15">{{$relation->end_date}}</span></p>
                    </div>

                    <ul class="social-links list-inline m-t-30">
                        <li class="list-inline-item">
                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                        </li>
                    </ul>

                </div>

            </div> <!-- end card-box -->

        </div> <!-- end col -->
        {{--HEALTH INFORMATIONS--}}
        @if($measurement = $relation->user->healths->first())
            @php
            if ($relation->user->sex == 0) {
                $daily_calorie = sprintf("%0.0f", 10*$measurement->weight + 6.25*$measurement->height - 5*$relation->user->age + 5);
                $fat_mass = sprintf("%0.1f", 495/(1.0324-(0.19077*(log10($measurement->waist - $measurement->neck)))+0.15456*(log10($measurement->height)))-450);
            } else {
                $daily_calorie = sprintf("%0.0f",10*$measurement->weight + 6.25*$measurement->height - 5*$relation->user->age - 161);
                $fat_mass = sprintf("%0.1f", 495/(1.29579-(0.35004*(log10($measurement->waist + $measurement->hip - $measurement->neck)))+0.22100*(log10($measurement->height)))-450);
            }
            $protein = $measurement->weight*0.8;
            $bmi = sprintf("%0.1f",$measurement->weight/(($measurement->height*$measurement->height)/10000));
            $fat_percent = sprintf("%0.1f",$fat_mass/$measurement->weight*100);
            $lean_percent = 100 - $fat_percent;
            $lean_mass = $measurement->weight - $fat_mass;
                    @endphp
        @else
            @php
            $daily_calorie = 0;
            $protein = 0;
            $bmi = 0;
            $fat_mass = 0;
            $fat_percent = 0;
            $lean_mass = 0;
            $lean_percent = 0;
                    @endphp
        @endif

        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="mdi mdi-food-apple text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b>{{$daily_calorie}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.daily_calorie')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class=" mdi mdi-bowl text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b>
                                    {{$protein}}
                                </b>{{trans('form.gram')}}</h3>
                            <p class="text-muted mb-0">{{trans('form.daily_protein')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row">
                <div class="col-md-12 card-box">

                    <ul class="nav nav-tabs tabs-bordered nav-justified">
                        <li class="nav-item">
                            <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                {{trans('form.class')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                {{trans('leftsidebar.health')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                {{trans('leftsidebar.attendance')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                {{trans('form.input')}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="home-b2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('form.name')}}</th>
                                    <th>{{trans('form.start')}}</th>
                                    <th>{{trans('form.end_date')}}</th>
                                    <th>{{trans('form.time')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = $relation->user->sessions->count() + 1; ?>
                                @foreach($relation->user->sessions as $session)
                                    <tr>
                                        <th scope="row">{{$i = $i - 1}}</th>
                                        <td>{{$session->name}}</td>
                                        <td>{{$session->start_date}}</td>
                                        <td>{{$session->end_date}}</td>
                                        <td>{{$session->time}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane active" id="profile-b2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bg-icon bg-icon-danger pull-left" style="margin-left: 40px">
                                        <i class="mdi mdi-food-apple text-pink"></i>
                                        <b>{{trans('form.ideal_weight')}}</b>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="mdi mdi-food-apple text-primary"></i>
                                        <b>{{trans('form.weight')}}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="ct-chart ct-golden-section" id="chart1"></div>
                            @php
                                    @endphp

                            <script>
                                new Chartist.Line('.ct-chart', {
                                    labels: [@foreach($measurements as $measurement)
                                        {{Carbon\Carbon::parse($measurement->created_at)->diffInDays()}},
                                        @endforeach],
                                    series: [
                                        {{$measurements->pluck('weight')}},
                                        [@foreach($measurements as $measurement)
                                            @if($relation->user->sex ==0)
                                            {{48 + 1.06299212598*($measurement->height - 152)}}
                                            @else
                                            {{45.5 + 0.86614173228*($measurement->height - 152)}}
                                            @endif,
                                            @endforeach],

                                    ]
                                }, {
                                    fullWidth: true,
                                    chartPadding: {
                                        right: 40
                                    }
                                });
                            </script>
                            
                        </div>
                        <div class="tab-pane" id="messages-b2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('form.name')}}</th>
                                    <th>{{trans('form.phone')}}</th>
                                    <th>{{trans('form.date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = $attendances->count() + 1; ?>
                                @foreach($attendances->get() as $attendance)
                                    <tr>
                                        <th scope="row">{{$i = $i - 1}}</th>

                                        <td>{{$attendance->fitnessUser->user->name}}</td>
                                        <td>{{$attendance->fitnessUser->user->phone}}</td>
                                        <td>{{$attendance->created_at}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="settings-b2">
                            {!! Form::open(['method'=>'POST', 'action'=>'TrainerMemberController@store']) !!}
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{trans('form.height')}}:</label>
                                        <div>
                                            <input name="height" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->height}}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('form.neck')}}:</label>
                                        <div>
                                            <input name="neck" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->neck}}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{trans('form.bicep')}}:</label>
                                        <div>
                                            <input name="bicep" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->bicep}}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('form.waist')}}:</label>
                                        <div>
                                            <input name="waist" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->waist}}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{trans('form.thigh')}}:</label>
                                        <div>
                                            <input name="thigh" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->thigh}}@endif">
                                        </div>
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{trans('form.weight')}}:</label>
                                        <div>
                                            <input name="weight" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->weight}}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{trans('form.chest')}}:</label>
                                        <div>
                                            <input name="chest" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->chest}}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('form.forearm')}}:</label>
                                        <div>
                                            <input name="forearm" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->forearm}}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('form.hip')}}:</label>
                                        <div>
                                            <input name="hip" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->hip}}@endif">
                                        </div>
                                    </div> <div class="form-group">
                                        <label>{{trans('form.shin')}}:</label>
                                        <div>
                                            <input name="shin" type="number" class="form-control" min="0" value="@if($measurement){{$measurement->shin}}@endif">
                                            <input type="hidden" name="user_id" value="{{$relation->user->id}}">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row-->
                            <div class="row">
                                <div class="form-group col-md-6">

                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <button class="btn btn-info" type="submit">{{trans('form.add')}}</button>
                                </div>
                            </div>




                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="widget-simple text-center card-box">
                        <h3 class="text-pink font-bold mt-0">
                            {{$bmi}}
                        </h3>

                        <p class="text-muted mb-0">BMI</p>
                        @if($bmi < 18)
                            <b class="text-danger">{{trans('form.underweight')}}</b>
                        @elseif($bmi >=18 && $bmi <=25)
                            <b class="text-success">{{trans('form.normal_weight')}}</b>
                        @else
                            <b class="text-danger">{{trans('form.obese_weight')}}</b>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                {{--<div class="col-lg-4 col-md-6">--}}
                    {{--<div class="widget-simple-chart text-right card-box">--}}
                        {{--<div class="circliful-chart" data-dimension="90" data-text="{{$percent = sprintf("%0.1f", $class->current_seats / $class->seats * 100)}}%" data-width="5" data-fontsize="14" data-percent="{{$percent}}" data-fgcolor="#7266ba" data-bgcolor="#ebeff2"></div>--}}
                        {{--<h3 class="text-purple counter m-t-10">{{$left_seats}}</h3>--}}
                        {{--<p class="text-muted mb-0">{{trans('form.left_seats')}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-lg-12 col-md-6">
                    <div class="widget-simple-chart text-right card-box">
                        <div class="circliful-chart" data-dimension="90" data-text="{{$fat_percent}}%" data-width="5" data-fontsize="14" data-percent="{{$fat_percent}}" data-fgcolor="#7266ba" data-bgcolor="#ebeff2"></div>
                        <h3 class="text-purple m-t-10">{{$fat_mass}}{{trans('form.kg')}}</h3>
                        <p class="text-muted mb-0">{{trans('form.fat_mass')}}</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="widget-simple-chart text-right card-box">
                        <div class="circliful-chart" data-dimension="90" data-text="{{$lean_percent}}%" data-width="5" data-fontsize="14" data-percent="{{$lean_percent}}" data-fgcolor="#7266ba" data-bgcolor="#ebeff2"></div>
                        <h3 class="text-purple m-t-10">{{$lean_mass}}{{trans('form.kg')}}</h3>
                        <p class="text-muted mb-0">{{trans('form.lean_mass')}}</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">{{trans('form.daily_calorie')}}</h4>
                        <div class="row">
                            <div class="col-md-9"><i class=" mdi mdi-minus-circle"></i><b>{{trans('form.lose_extra')}}:</b> </div><div class="col-md-3 text-right">{{$daily_calorie - 1000}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"><i class=" mdi mdi-minus-circle"></i><b>{{trans('form.lose')}}:</b> </div><div class="col-md-3 text-right">{{$daily_calorie - 500}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"><i class=" mdi mdi-stop-circle"></i><b>{{trans('form.maintain')}}:</b> </div><div class="col-md-3 text-right">{{$daily_calorie}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"><i class=" mdi mdi-plus-circle"></i><b>{{trans('form.lose')}}:</b> </div><div class="col-md-3 text-right">{{$daily_calorie + 500}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"><i class=" mdi mdi-plus-circle"></i><b>{{trans('form.lose_extra')}}:</b> </div><div class="col-md-3 text-right">{{$daily_calorie + 1000}}</div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('footer')
    <!-- Counter Up  -->
    <script src="{{asset('plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>
    <!-- Circliful -->
    <script src="{{asset('plugins/jquery-circliful/js/jquery.circliful.min.js')}}"></script>

    <script src="{{asset('assets/pages/jquery.widgets.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
            $('.circliful-chart').circliful();
        });

        /* BEGIN SVG WEATHER ICON */
        if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
                {"color": "#fff"},
                {"resizeClear": true}
                ),
                list  = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for(i = list.length; i--; )
                icons.set(list[i], list[i]);
            icons.play();
        };

    </script>
@endsection