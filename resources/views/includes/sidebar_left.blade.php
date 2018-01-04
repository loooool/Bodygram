<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">{{trans('leftsidebar.main')}}</li>

                <li>
                    <a href="{{url('/home')}}" class="waves-effect waves-primary"><i
                                class="ti-home"></i><span>{{trans('leftsidebar.dashboard')}} </span></a>
                </li>

                <li>
                    <a href="{{route('member.classes.index')}}" class="waves-effect waves-primary"><i
                                class=" mdi mdi-calendar"></i><span>  {{trans('form.class')}} </span></a>
                </li>
                <li>
                    <a href="{{route('member.health.index')}}" class="waves-effect waves-primary"><i
                                class=" ti-support"></i><span>  {{trans('leftsidebar.health')}} </span></a>
                </li>
                <li class="menu-title">{{trans('leftsidebar.actions')}}</li>
                <li>
                    <a href="{{url('/logout')}}" class="waves-effect waves-primary"><i
                                class="  mdi mdi-logout"></i><span>  {{trans('leftsidebar.logout')}} </span></a>
                </li>



            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->