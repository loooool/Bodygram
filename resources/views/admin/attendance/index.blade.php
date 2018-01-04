@extends('admin.layouts.master')

@section('header')
    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.steps/css/jquery.steps.css')}}" />
    <link href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@stop
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.attendance')}}</li>
                    @if(isset($date)) <li class="breadcrumb-item active">{{$date}}</li>@endif
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.choose_date')}}</h4>
                {!! Form::open(['method'=>'GET', 'action'=>'AdminAttendanceController@date']) !!}
                {{csrf_field()}}


                <div class="col-12">
                    <div class="input-group">
                        <input name="date" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" value="@if($date_for_graph) {{date('m/d/Y', $date_for_graph)}}@endif">
                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                    </div><!-- input-group -->
                </div>
                <br>
                <button class="btn btn-info btn-block">{{trans('form.choose')}}</button>
                {!! Form::close() !!}
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class=" ti-agenda text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$attendances->count() }}</b></h3>
                            <p class="text-muted mb-0">{{trans('leftsidebar.attendance')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col-->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">{{trans('form.active_hours')}}</h4>
                        <div class="ct-chart ct-golden-section" id="chart1"></div>
                    </div>
                    <?php $hours = [6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];?>
                    <script>
                        // Initialize a Line chart in the container with the ID chart1
                        new Chartist.Line('#chart1', {
                            labels: [6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22],
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
            </div><!-- end row-->

            <div class="card-box">


                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('form.photo')}}</th>
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
                            @if($attendance->fitnessUser->user->photos->first())
                                <td class=""><img height="40px" width="40px" src="{{asset('assets/images') . '/'. $attendance->fitnessUser->user->photos->first()->path}}" class="rounded-circle"></td>
                            @else
                                <td class=""><img height="40px" width="40px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle"></td>
                            @endif
                            <td>{{$attendance->fitnessUser->user->name}}</td>
                            <td>{{$attendance->fitnessUser->user->phone}}</td>
                            <td>{{$attendance->created_at}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div><!-- end col-->
    </div><!-- end row-->




@stop
@section('footer')
    <script src="{{asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('plugins/select2/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript')}}"></script>

    <script src="{{asset('plugins/moment/moment.js')}}"></script>
    <script src="{{asset('plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.form-advanced.init.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.chartjs.init.js')}}"></script>
@stop