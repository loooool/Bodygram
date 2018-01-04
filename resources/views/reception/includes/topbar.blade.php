<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.html" class="logo"><img  height="30px" style="    padding-bottom: 5px;" src="{{asset('assets/images/gym.png')}}" alt=""> <span>Bodygram</span></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">




            <li class="list-inline-item  app-search hide-phone ">
                {!! Form::open(['method'=>'POST', 'action'=>'ReceptionAttendanceController@store', 'class'=>'', 'role'=>'form']) !!}
                    <input type="text" id="example-email" name="code" class="form-control" autofocus placeholder="{{trans('form.register_attendance')}}">
                {!! Form::close() !!}
            </li>
            <li class="list-inline-item notification-list dropdown">
                <a class="nav-link waves-light waves-effect" href="{{route('reception.members.create')}}" data-toggle="tooltip" data-placement="bottom" title="{{trans('form.add_new_member')}}">
                    <i class="mdi mdi-plus-circle-outline noti-icon"></i>
                </a>
            </li>

           @include('reception.includes.notifications')

            <li class="list-inline-item notification-list dropdown">
                <a class="nav-link waves-light waves-effect" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal noti-icon"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <h6 class="dropdown-header">{{trans('leftsidebar.menu')}}</h6>
                    {{--<h6 class="dropdown-header">Dropdown header</h6>--}}
                    <a class="dropdown-item" href="{{route('reception.classes')}}">{{trans('form.all_classes')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">{{trans('leftsidebar.help')}}</a>
                    <a class="dropdown-item" href="#">{{trans('leftsidebar.settings')}}</a>
                    <a class="dropdown-item" href="{{url('logout')}}">{{trans('leftsidebar.logout')}}</a>
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                </div>
            </li>


        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

            <li class="hide-phone app-search">
                {!! Form::open(['method'=>'GET', 'action'=>'ReceptionDashboardController@search', 'role'=>'search']) !!}
                {{csrf_field()}}
                <input type="text" name="key" placeholder="{{trans('form.search')}}" class="form-control">
                <a href=""><i class="fa fa-search"></i></a>
                {!! Form::close() !!}

            </li>


        </ul>

    </nav>

</div>
<!-- Top Bar End -->