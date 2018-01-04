<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="#" class="logo"><img  height="30px" style="    padding-bottom: 5px;" src="{{asset('assets/images/gym.png')}}" alt=""> <span>Bodygram</span></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">





           @include('trainer.includes.notifications')

            <li class="list-inline-item notification-list">
                <a class="nav-link right-bar-toggle waves-light waves-effect" href="#">
                    <i class="mdi mdi-dots-horizontal noti-icon"></i>
                </a>
            </li>



        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">
                {!! Form::open(['method'=>'GET', 'action'=>'TrainerDashboardController@search', 'role'=>'search']) !!}
                {{csrf_field()}}
                <input type="text" name="key" placeholder="{{trans('form.search')}}" class="form-control">
                <a href=""><i class="fa fa-search"></i></a>
                {!! Form::close() !!}
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->