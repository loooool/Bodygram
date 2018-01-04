<!DOCTYPE html>
<html>
<head>
    @include('includes.header_start')
    @include('includes.header_end')

</head>
<body>

<div class="wrapper-page">
    <div class=" card-box">
        <div class="text-center">
            <a href="#" class="logo-lg"><i class=""><img width="30px" style="padding-bottom: 5px" src="{{asset('assets/images/gym.png')}}"></i> <span>Bodygram</span> </a>
        </div>

        <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-12">
                    <div class="form-group">
                        <input id="email" class="form-control {{ $errors->has('email') ? ' form-control-warning' : '' }}"
                               name="email" value="{{ old('email') }}" type="text"  placeholder="{{ trans('form.email') }}">

                    </div>
                    @if ($errors->has('email'))
                        <div class="form-control-feedback text-warning">{{ $errors->first('email') }}</div>
                    @endif

                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <div class="form-group">
                        <input id="password" class="form-control {{ $errors->has('email') ? ' form-control-warning' : '' }}"
                               type="password" name="password" placeholder="{{ trans('form.password') }}">
                    </div>
                    @if ($errors->has('password'))
                        <div class="form-control-feedback text-warning">{{ $errors->first('password') }}</div>
                    @endif

                </div>
            </div>
            <br>



            <div class="form-group text-right m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-block w-md waves-effect waves-light" type="submit">{{ trans('form.login') }}
                    </button>
                </div>
            </div>

            <div class="form-group row m-t-30">
                <div class="col-sm-7">
                    <a href="#" class="text-muted"><i class="fa fa-lock m-r-5"></i> {{ trans('form.forgot') }}</a>
                </div>
                <div class="col-sm-5 text-right">
                    <a href="#" class="text-muted">{{ trans('form.create') }}</a>
                </div>
            </div>
        </form>
    </div>


</div>


@include('includes.footer_start')
@include('includes.footer_end')
</body>
</html>