@extends('trainer.layouts.master')
@section('header')
    <link href="{{asset('plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('trainer_fitness_id'))->name}} - {{$class->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item">{{trans('form.class')}}</li>
                    <li class="breadcrumb-item active">{{$class->name}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-box">
                        <div class="row" style="margin-bottom: 8px">
                            <h3 class="text-purple  col-md-8">{{$class->start_date}} / {{$class->end_date}}</h3>
                            <h3 class="text-right text-purple col-md-4">{{$class->time}}</h3>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                @if($class->mon == 1)
                                    <span class="badge badge-danger"><b>Mon</b></span>
                                @else
                                    <b>Mon</b>
                                @endif
                            </div>
                            <div class="col text-center">
                                @if($class->tue == 1)
                                    <span class="badge badge-danger"><b>Tue</b></span>
                                @else
                                    <b>Tue</b>
                                @endif
                            </div>
                            <div class="col text-center">
                                @if($class->wed == 1)
                                    <span class="badge badge-danger"><b>Wed</b></span>
                                @else
                                    <b>Wed</b>
                                @endif
                            </div>
                            <div class="col text-center">
                                @if($class->thu == 1)
                                    <span class="badge badge-danger"><b>Thu</b></span>
                                @else
                                    <b>Thu</b>
                                @endif
                            </div>
                            <div class="col text-center">
                                @if($class->fri == 1)
                                    <span class="badge badge-danger"><b>Fri</b></span>
                                @else
                                    <b>Fri</b>
                                @endif
                            </div>
                            <div class="col text-center">
                                @if($class->sat == 1)
                                    <span class="badge badge-danger"><b>Sat</b></span>
                                @else
                                    <b>Sat</b>
                                @endif
                            </div>
                            <div class="col text-center">
                                @if($class->sun == 1)
                                    <span class="badge badge-danger"><b>Sun</b></span>
                                @else
                                    <b>Sun</b>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <?php $left_seats = $class->seats - $class->current_seats?>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-simple-chart text-right card-box">
                        <div class="circliful-chart" data-dimension="90" data-text="{{$percent = sprintf("%0.1f", $class->current_seats / $class->seats * 100)}}%" data-width="5" data-fontsize="14" data-percent="{{$percent}}" data-fgcolor="#7266ba" data-bgcolor="#ebeff2"></div>
                        <h3 class="text-purple counter m-t-10">{{$left_seats}}</h3>
                        <p class="text-muted mb-0">{{trans('form.left_seats')}}</p>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="widget-simple text-center card-box">
                        <h3 class="text-pink font-bold mt-0"><i class=" mdi mdi-trophy"></i> Weight loss challenge</h3>
                        <p class="text-muted mb-0">Total earning blsafk sjflsd jfod skjf d fs<br> jfskdflsj klf ssd jf s</p>
                    </div>



                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('form.photo')}}</th>
                                <th>{{trans('form.name')}}</th>
                                <th>{{trans('form.date')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $attendances->count() +1;?>
                            @foreach($attendances->get() as $attendance)
                                <tr>
                                    <td>{{$i = $i - 1}}</td>
                                    <td> @if($attendance->user->photos->first())
                                            <img height="35px" width="40px" src="{{asset('assets/images') . '/'. $attendance->user->photos->first()->path}}" class="rounded-circle">
                                        @else
                                            <img height="35px" width="40px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle">
                                        @endif</td>
                                    <td><a href="{{route('trainer.members.show', $attendance->user->id)}}">{{$attendance->user->name}}</a></td>
                                    <td>{{$attendance->created_at}}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div><!--end col-->

        <div class="col-md-3">
            <div class="row"><!-- Trainer-->
                <div class="col-lg-12 col-md-6">
                    <div class="card-box widget-user">
                        <div>
                            @if($trainer->photos->first())
                                <img height="80px" width="80px" src="{{asset('assets/images') . '/'. $trainer->photos->first()->path}}" class="rounded-circle">
                            @else
                                <img height="80px" width="80px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle">
                            @endif
                            <div class="wid-u-info">
                                <h5 class="mt-0 m-b-5 font-16">{{$trainer->name}}</h5>
                                <p class="text-muted m-b-5 font-13">{{$trainer->phone}}</p>
                                <small class="text-warning"><b>{{trans('form.trainer')}}</b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title"><b>{{trans('form.enrolled')}}</b></h4>

                        <div class="inbox-widget nicescroll mx-box" tabindex="5000" style="overflow: hidden; outline: none;">
                            @foreach($class->members as $member)
                                <a href="{{route('trainer.members.show', $member->id)}}">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img">
                                            @if($member->photos->first())
                                                <img height="40px" width="40px" src="{{asset('assets/images') . '/'. $member->photos->first()->path}}" class="rounded-circle">
                                            @else
                                                <img height="40px" width="40px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle">
                                            @endif
                                        </div>
                                        <p class="inbox-item-author">{{$member->name}}</p>
                                        <p class="inbox-item-text">{{$member->phone}}</p>

                                        <p class="inbox-item-date">@if($measurement = $member->healths->first()){{$member->healths->where('created_at', '>=', $class->start_date)->sortBy('id')->first()->weight - $member->healths->where('created_at', '>=', $class->start_date)->first()->weight}} @else 0 @endif{{trans('form.kg')}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div><!-- end row-->
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