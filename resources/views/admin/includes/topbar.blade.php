<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="/admin" class="logo"><img  height="30px" style="    padding-bottom: 5px;" src="{{asset('assets/images/gym.png')}}" alt=""> <span>Bodygram</span>
                </a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item notification-list">
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                            aria-expanded="false">{{App\Fitness::find(session()->get('fitness_id'))->name}}<!-- Session Fitness name--> <i class="mdi  mdi mdi-arrow-down"></i></button>
                    <div class="dropdown-menu">
                        <?php $fitness_relations = \Illuminate\Support\Facades\Auth::user()->fitnessUser->where('role_id', 1); ?>
                        @foreach($fitness_relations as $fitness_relation)
                            <a class="dropdown-item" href="{{route('fitness', ['id'=>$fitness_relation->fitness->id])}}">{{$fitness_relation->fitness->name}}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="list-inline-item notification-list hide-phone">
                <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-crop-free noti-icon"></i>
                </a>
            </li>
            @include('admin.includes.nofications')
            <li class="list-inline-item notification-list dropdown">
                <a class="nav-link waves-light waves-effect" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal noti-icon"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <h6 class="dropdown-header">{{trans('leftsidebar.menu')}}</h6>
                    {{--<h6 class="dropdown-header">Dropdown header</h6>--}}
                    <a class="dropdown-item" href="{{route('admin.users.index')}}">{{trans('form.all_workers')}}</a>
                    <a class="dropdown-item" href="{{route('admin.users.create')}}">{{trans('form.add_worker')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.category.index')}}">{{trans('leftsidebar.category')}}</a>
                    <a class="dropdown-item" href="{{route('admin.members.index')}}">{{trans('form.all_members')}}</a>
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
                <form role="search" class="">
                    <input type="text" placeholder="{{trans('form.search')}}" class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
                {{--{!! Form::open(['method'=>'GET', 'action'=>'']) !!}--}}
                {{--{{csrf_field()}}--}}
                    {{--{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Search...']) !!}--}}

                {{--{!! Form::close() !!}--}}
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->