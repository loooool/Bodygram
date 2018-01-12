<!DOCTYPE html>
<html>
<head>
    @include('includes.header_start')
    <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.steps/css/jquery.steps.css')}}" />
        <link href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    @include('includes.header_end')

</head>
<body>
<div class="row align-items-center">

    <div class="col"></div>
    <div class="col-md-5 ">
        <div class=" card-box ">
            <div class="text-center">
                <a href="#" class="logo-lg"><i class=""><img width="30px" style="padding-bottom: 5px" src="{{asset('assets/images/gym.png')}}"></i> <span>Bodygram</span> </a>
            </div>

            <form action="{{url('/register')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <br>

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
                        <input name="birth_date" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                    </div><!-- input-group -->
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
            <div class="form-group row">
                <label for="inputPassword3" class="col-3 col-form-label">{{trans('form.password')}}:</label>
                <div class="col-9">
                    <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="{{trans('form.password')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword4" class="col-3 col-form-label">{{trans('form.repassword')}}:</label>
                <div class="col-9">
                    <input name="password_confirmation" type="password" class="form-control" id="inputPassword4" placeholder="{{trans('form.repassword')}}">
                </div>
            </div>
            <div class="form-group m-b-0 row">
                <div class="offset-3 col-12">
                    <button type="submit" class="btn btn-block btn-info waves-effect waves-light">{{trans('form.register')}}</button>
                </div>
            </div>
            </form>



        </div>
    </div>
    <div class="col"></div>
</div>






@include('includes.footer_start')
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
@include('includes.footer_end')
</body>
</html>