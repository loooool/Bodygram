@extends('admin.layouts.master')
@section('header')
    <!-- Plugins css-->
    <link href="{{asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/select2/select2.css" rel="stylesheet')}}" type="text/css" />
    <link href="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <link href="{{asset('plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('form.class')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.add_class')}}</h4>
                {!! Form::open(['method'=>'POST', 'action'=>'AdminClassController@store']) !!}
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">{{trans('form.name')}}:</label>
                        <div class="col-md-4">
                            <input type="text"  name="name" class="form-control" placeholder="{{trans('form.name')}}">
                        </div>
                        <label class="col-2 col-form-label" for="example-email">{{trans('form.price')}}:</label>
                        <div class="col-md-4">
                            <input type="number"  name="price" class="form-control" placeholder="6000">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">{{trans('form.teacher')}}:</label>
                        <div class="col-md-5">
                            <select class="form-control" name="trainer_id">
                                @foreach($trainers->get() as $trainer)
                                    <option value="{{$trainer->user->id}}">{{$trainer->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-2 col-form-label" for="example-email">{{trans('form.seat')}}:</label>
                        <div class="col-md-3">
                            <input type="number"  name="seats" class="form-control" placeholder="000">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col text-center"><b>Mon</b><br>
                            <input type="checkbox" name="mon" value="1"  data-plugin="switchery" data-color="#00b19d" data-size="small"/>
                        </div>
                        <div class="col text-center"><b>Tue</b><br>
                            <input type="checkbox" name="tue"  value="1" data-plugin="switchery" data-color="#ffaa00" data-size="small"/>
                        </div>
                        <div class="col text-center"><b>Wed</b><br>
                            <input type="checkbox" name="wed" value="1" data-plugin="switchery" data-color="#3bafda" data-size="small"/>
                        </div>
                        <div class="col text-center"><b>Thu</b><br>
                            <input type="checkbox" name="thu" value="1" data-plugin="switchery" data-color="#3DDCF7" data-size="small"/>
                        </div>
                        <div class="col text-center"><b>Fri</b><br>
                            <input type="checkbox" name="fri" value="1" data-plugin="switchery" data-color="#7266ba" data-size="small"/>
                        </div>
                        <div class="col text-center"><b>Sat</b><br>
                            <input type="checkbox"  name="sat" value="1" data-plugin="switchery" data-color="#f76397" data-size="small"/>
                        </div>
                        <div class="col text-center"><b>Sun</b><br>
                            <input type="checkbox" name="sun" value="1" data-plugin="switchery" data-color="#4c5667" data-size="small"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="start_date" />
                                <span class="input-group-addon bg-primary b-0 text-white">to</span>
                                <input type="text" class="form-control" name="end_date" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="time" value="07:00" type="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-info btn-block">{{trans('form.add')}}</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
        <div class="col-md-7">
            <div class="card-box">
                <table class="table">
                    <thead>
                      <tr>
                        <th>{{trans('form.name')}}</th>
                        <th>{{trans('form.teacher')}}</th>
                        <th>{{trans('form.seat')}}</th>
                        <th>{{trans('form.date')}}</th>
                        <th>{{trans('form.time')}}</th>
                        <th>{{trans('form.price')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($classes->get() as $class)
                      <tr>
                          <td><a href="{{route('admin.classes.show', $class->id)}}">{{$class->name}}</a></td>
                          <td>{{$class->trainer->name}}</td>
                          <td>{{$class->seats - $class->current_seats}}</td>
                          <td>{{$class->start_date}} / {{$class->end_date}}</td>
                          <td>{{$class->time}}</td>
                          <td>{{$class->price}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
@endsection
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
    @endsection