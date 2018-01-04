<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">{{trans('leftsidebar.main')}}</li>

                <li>
                    <a href="{{route('reception')}}" class="waves-effect waves-primary"><i class="ti-home"></i><span>{{trans('leftsidebar.dashboard')}}</span></a>
                </li>
                {{--<li class="has_sub">--}}
                    {{--<a href="javascript:void(0);" class="waves-effect waves-primary"><i--}}
                                {{--class="ti-id-badge"></i><span>{{trans('leftsidebar.members')}}</span> <span class="menu-arrow"></span> </a>--}}
                    {{--<ul class="list-unstyled">--}}
                        {{--<li><a href="components-grid.html">Grid</a></li>--}}
                        {{--<li><a href="components-carousel.html">Carousel</a></li>--}}

                    {{--</ul>--}}
                {{--</li>--}}
                <li>
                    <a href="{{route('reception.members.index')}}" class="waves-effect waves-primary"><i class="ti-id-badge"></i><span>{{trans('leftsidebar.members')}}</span></a>
                </li>
                <li>
                    <a href="{{route('reception.transition.index')}}" class="waves-effect waves-primary"><i class="ti-credit-card"></i><span>{{trans('leftsidebar.debt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('reception.attendance.index')}}" class="waves-effect waves-primary"><i class="ti-time"></i><span>{{trans('leftsidebar.attendance')}}</span></a>
                </li>

                <li class="menu-title">{{trans('leftsidebar.actions')}}</li>
                <li>
                    <a href="{{url('logout')}}" class="waves-effect waves-primary"><i class="mdi mdi-logout"></i><span>{{trans('leftsidebar.logout')}}</span></a>
                </li>


            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->