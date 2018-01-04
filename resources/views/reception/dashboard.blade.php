@extends('reception.layouts.master')
@section('header')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.dashboard')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <?php
    $attendances_today = clone $attendances;
    $attendances_active = clone $attendances;
    $attendances_most_active = clone $attendances;
    $relations_new = clone $relations;
    $relations_all = clone $relations;
    ?>
    <div class="row">
        <div class="col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-success pull-left">
                    <i class=" ti-agenda text-success"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b class="counter">{{$attendances_today->today()->count() }}</b></h3>
                    <p class="text-muted mb-0">{{trans('dashboard.attendance')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-primary pull-left">
                    <i class=" ti-plus text-info"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b class="counter">{{$relations_new->new()->count()}}</b></h3>
                    <p class="text-muted mb-0">{{trans('dashboard.new_members')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-danger pull-left">
                    <i class="ti-bar-chart text-pink"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10">
                        <b class="counter">{{$attendances_active->active()->distinct('user_id')->count('user_id')}}</b></h3>
                    <p class="text-muted mb-0">{{trans('dashboard.active_members')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-purple pull-left">
                    <i class="ti-user text-purple"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b class="counter">{{$relations_all->count()}}</b></h3>
                    <p class="text-muted mb-0">{{trans('dashboard.all_members')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.active_hours')}}</h4>
                <div class="ct-chart ct-golden-section" id="chart1"></div>
            </div>
            <?php $hours = [6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];?>
            <script>
                // Initialize a Line chart in the container with the ID chart1
                new Chartist.Line('#chart1', {
                    labels: [6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23],
                    series: [[
                        <?php
                        foreach ($hours as $hour){
                            $attendances_clone = clone $attendances;
                            echo $attendances_clone->where('created_at', '>=', date('Y-m-d H', mktime($hour, 0, 0, date("m", $date_for_graph)  , date("d", $date_for_graph), date("Y", $date_for_graph))))
                                    ->where('created_at', '<', date('Y-m-d H', mktime($hour+1, 0, 0, date("m", $date_for_graph)  , date("d", $date_for_graph), date("Y", $date_for_graph))))->count() . ',';
                        }
                        ?>
                    ]]
                });
            </script>
        </div><!-- end col-->
        <div class="col-md-3">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.top_active')}}</h4>
                <div class="inbox-widget">
                    @foreach($attendances_most_active->where('fitness_id', session()->get('reception_fitness_id'))->active()->groupBy('user_id')->orderBy(DB::raw('count(user_id)'), 'DESC')->limit(5)->get() as $attendance)
                    <a href="#">
                        <div class="inbox-item">
                            @if($attendance->fitnessUser->user->photos->first())
                                <div class="inbox-item-img"><img height="40px" width="40px" src="{{asset('assets/images') . '/'. $attendance->fitnessUser->user->photos->first()->path}}" class="rounded-circle" alt=""></div>
                            @else
                                <div class="inbox-item-img"><img height="40px" width="40px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle" alt=""></div>
                            @endif
                            <p class="inbox-item-author"><a href="{{route('reception.members.show', $attendance->fitnessUser->user->id)}}">{{$attendance->fitnessUser->user->name}}</a></p>
                            <p class="inbox-item-text">{{$attendance->fitnessUser->end_date}}</p>
                            <p class="inbox-item-date">{{$attendance->fitnessUser->attendances->where('fitness_id', session()->get('reception_fitness_id'))->count()}}</p>
                        </div>
                    </a>
                    @endforeach


                </div>
            </div>
        </div><!-- end col-->
    </div><!-- end row -->

@stop
@section('footer')

@stop