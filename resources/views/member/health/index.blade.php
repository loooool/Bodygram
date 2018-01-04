@extends('layouts.master')
@section('header')
    <link href="{{asset('plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

@endsection
@section('content')
    @if($measurement = $user->healths->first())
        @php
            if ($user->sex == 0) {
                $daily_calorie = sprintf("%0.0f", 10*$measurement->weight + 6.25*$measurement->height - 5*$user->age + 5);
                $fat_mass = sprintf("%0.1f", 495/(1.0324-(0.19077*(log10($measurement->waist - $measurement->neck)))+0.15456*(log10($measurement->height)))-450);
            } else {
                $daily_calorie = sprintf("%0.0f",10*$measurement->weight + 6.25*$measurement->height - 5*$user->age - 161);
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
    <div class="row">
        <div class="col-md-3">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.body_measurements')}}</h4>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-altimeter"></i><b>{{trans('form.height')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->height}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-weight"></i><b>{{trans('form.weight')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->weight}}@endif{{trans('form.kg')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.neck')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->neck}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.chest')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->chest}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.bicep')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->bicep}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.forearm')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->forearm}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.waist')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->waist}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.hip')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->hip}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.thigh')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->thigh}}@endif{{trans('form.cm')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-9"><i class=" mdi mdi-android-studio"></i><b>{{trans('form.shin')}}:</b> </div><div class="col-md-3 text-right">@if($measurement){{$measurement->shin}}@endif{{trans('form.cm')}}</div>
                </div>
            </div>
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
        </div> <!-- end col -->

        {{--HEALTH INFORMATIONS--}}


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
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">{{trans('form.weight')}}</h4>
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
                                    <b>{{trans('form.your_weight')}}</b>
                                </div>
                            </div>
                        </div>
                        <div class="ct-chart" id="chart1"></div>
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
                                       @if($user->sex ==0)
                                        {{48 + 1.06299212598*($measurement->height - 152)}}
                                           @else
                                        {{45.5 + 0.86614173228*($measurement->height - 152)}}
                                       @endif,
                                       @endforeach],
                                ]

                            }, {
                                height: 200,
                                fullWidth: true,
                                chartPadding: {
                                    right: 20

                                }

                            });

                        </script>

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