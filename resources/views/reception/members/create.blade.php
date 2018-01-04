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
                    <li class="breadcrumb-item active">{{trans('form.add_new_member_header')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="m-t-0 m-b-30 header-title">{{trans('form.register_new')}}</h4>

                        {!! Form::open(['method'=>'POST', 'action'=>'ReceptionMemberController@store', 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true, 'onkeypress'=>'return event.keyCode != 13;']) !!}
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="inputName" class="col-3 col-form-label">{{trans('form.photo')}}:</label>
                            <div class="col-9">
                                <div class="fileupload btn btn-secondary waves-effect">
                                    <span><i class="ion-upload m-r-5"></i>Upload</span>
                                    <input type="file" name="photo" accept="image/*" class="upload">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-3 col-form-label">{{trans('form.name')}}:</label>
                            <div class="col-9">
                                <input name="name" type="text" class="form-control" id="inputName" placeholder="{{trans('form.name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  for="inputName" class="col-3 col-form-label">{{trans('form.sex')}}:</label>
                            <div class="col-9">
                                <select name="sex" class="form-control">
                                    <option value="0">{{trans('form.male')}}</option>
                                    <option value="1">{{trans('form.female')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-3 col-form-label">{{trans('form.birthdate')}}:</label>
                            <div class="col-9">
                                <div class="input-group">
                                    <input name="birth_date" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">{{trans('form.card_number')}}:</label>
                            <div class="col-9">
                                <input name="code" type="text" class="form-control" id="inputEmail3" placeholder="00000000">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName"  class="col-3 col-form-label">{{trans('form.category')}}:</label>
                            <div class="col-9">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">{{trans('form.email')}}:</label>
                            <div class="col-9">
                                <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="{{trans('form.email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-3 col-form-label">{{trans('form.phone')}}:</label>
                            <div class="col-9">
                                <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="{{trans('form.phone')}}">
                            </div>
                        </div>

                        <br>
                        <div class="form-group m-b-0 row">
                            <div class="offset-3 col-9">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{trans('form.register')}}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div> <!-- End of the col-md-6-->
                </div>
            </div>
        </div><!-- End of the Col-->
        <div class="col-md-6">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="m-t-0 m-b-30 header-title">{{trans('form.register_old')}}</h4>
                        {!! Form::open(['method'=>'POST', 'action'=>'ReceptionMemberController@storeRegistered', 'class'=>'form-horizontal', 'role'=>'form', 'onkeypress'=>'return event.keyCode != 13;']) !!}
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="inputName" class="col-3 col-form-label">{{trans('form.email')}}:</label>
                            <div class="col-9">
                                {!! Form::text('email_registered', null, ['class'=>'form-control', 'placeholder'=> trans('form.email')]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">{{trans('form.card_number')}}:</label>
                            <div class="col-9">
                                {!! Form::text('code', null, ['class'=>'form-control', 'placeholder'=> '00000000']) !!}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputName"  class="col-3 col-form-label">{{trans('form.category')}}:</label>
                            <div class="col-9">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-3 col-form-label">{{trans('form.end_date')}}:</label>
                            <div class="col-9">
                                <div class="input-group">
                                    <input name="end_date" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                        <br>

                        <div class="form-group m-b-0 row">
                            <div class="offset-3 col-9">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{trans('form.register')}}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div> <!-- End of the col-md-6-->
                </div>
            </div>
        </div>
    </div><!-- End of the row-->
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
@stop