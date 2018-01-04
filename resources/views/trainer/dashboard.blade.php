@extends('trainer.layouts.master')
@section('header')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@stop
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('trainer_fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item">{{trans('leftsidebar.dashboard')}}</li>
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
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <h3>{{trans('form.today_classes')}}:</h3>
            <div class="row">
                @if($sessions->count())
                    @foreach($sessions->get() as $session)
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="row">
                                    <h3 class="text-purple  col-md-5">{{$session->name}}</h3>
                                    <h3 class="text-right text-purple col-md-7">{{$session->time}}</h3>
                                </div>
                                <div class="row">
                                    <span class="col-md-4"><b>{{$session->trainer->name}}</b> <b>{{$session->current_seats}}/{{$session->seats}}</b></span>
                                    <span class="text-right col-md-8"> {{$session->start_date}} / {{$session->end_date}} </span>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col text-center">
                                        @if($session->mon == 1)
                                            <span class="badge badge-danger"><b>Mon</b></span>
                                        @else
                                            <b>Mon</b>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if($session->tue == 1)
                                            <span class="badge badge-danger"><b>Tue</b></span>
                                        @else
                                            <b>Tue</b>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if($session->wed == 1)
                                            <span class="badge badge-danger"><b>Wed</b></span>
                                        @else
                                            <b>Wed</b>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if($session->thu == 1)
                                            <span class="badge badge-danger"><b>Thu</b></span>
                                        @else
                                            <b>Thu</b>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if($session->fri == 1)
                                            <span class="badge badge-danger"><b>Fri</b></span>
                                        @else
                                            <b>Fri</b>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if($session->sat == 1)
                                            <span class="badge badge-danger"><b>Sat</b></span>
                                        @else
                                            <b>Sat</b>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if($session->sun == 1)
                                            <span class="badge badge-danger"><b>Sun</b></span>
                                        @else
                                            <b>Sun</b>
                                        @endif
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
@stop
@section('footer')

@stop