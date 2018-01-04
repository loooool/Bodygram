@extends('reception.layouts.master')
@section('header')
    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.steps/css/jquery.steps.css')}}" />
    <link href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.attendance')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.choose_date')}}</h4>
                {!! Form::open(['method'=>'GET', 'action'=>'ReceptionAttendanceController@date']) !!}
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
        </div><!-- end col-->
        <div class="col-md-9">
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
                            <td><a href="{{route('reception.members.show', $attendance->fitnessUser->user->id)}}">{{$attendance->fitnessUser->user->name}}</a></td>
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