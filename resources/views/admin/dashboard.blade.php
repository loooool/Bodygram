@extends('admin.layouts.master')

@section('header')

@stop
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.dashboard')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- Dashboard's mini data widgets-->
    {{--Clonning --}}
    <?php
    $attendances_today = clone $attendances;
    $attendances_active = clone $attendances;
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

    </div><!-- end row-->
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.expense')}} & {{trans('form.income')}}</h4>
                <div class="table-responsive">
                    <table class="table table-sm m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('form.money_value')}}</th>
                            <th>{{trans('form.about')}}</th>
                            <th>{{trans('form.added')}}</th>
                            <th>{{trans('form.date')}}</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php $transitions_table = clone $transitions;?>
                        <?php $transitions_month = clone $transitions;?>
                        <?php $i = $transitions_table->limit(10)->count() + 1;?>
                        @foreach($transitions_table->get() as $transition)
                            <tr>
                                <td>{{$i = $i - 1}}</td>
                                <td>{{$transition->value}}</td>
                                <td>{{$transition->about}}</td>
                                <td>{{$transition->user->name}}</td>
                                <td>{{$transition->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- next content-->
        </div><!-- end col-->
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-warning pull-left">
                            <i class="mdi mdi-cash-100 text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$transitions->sum('value')}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.income')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-info pull-left">
                            <i class="mdi mdi-cash-100 text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$transitions_month->month()->sum('value')}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.month_income')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-inverse pull-left">
                            <i class="mdi mdi-cash-100 text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$relations->sum('debt')}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.debt')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-inverse pull-left">
                            <i class="mdi mdi-cash-100 text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$relations->where('debt', '>', 0)->count()}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.members_with_debt')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="card-box">--}}
                        {{----}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>


    </div><!-- end row-->


@stop
@section('footer')
    <!-- Chart JS -->
@stop