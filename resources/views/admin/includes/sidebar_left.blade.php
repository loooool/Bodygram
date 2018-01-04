<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">{{trans('leftsidebar.main')}}</li>

                <li>
                    <a href="{{route('admin')}}" class="waves-effect waves-primary"><i
                                class="ti-home"></i><span> {{trans('leftsidebar.dashboard')}} </span></a>
                </li>



                <li>
                    <a href="{{route('admin.classes.index')}}" class="waves-effect waves-primary"><i
                                class=" mdi mdi-calendar"></i><span> {{trans('form.class')}} </span></a>
                </li>

                <li>
                    <a href="{{route('admin.pack.index')}}" class="waves-effect waves-primary"><i
                                class=" ti-shopping-cart"></i><span> {{trans('leftsidebar.pack')}} </span></a>
                </li>

                <li>
                    <a href="{{route('admin.attendance.index')}}" class="waves-effect waves-primary"><i
                                class=" ti-agenda"></i><span> {{trans('leftsidebar.attendance')}} </span></a>
                </li>





                <li class="menu-title">{{trans('leftsidebar.actions')}}</li>

                <li>
                    <a href="{{url('/logout')}}" class="waves-effect waves-primary"><i
                                class="  mdi mdi-logout"></i><span> {{trans('leftsidebar.logout')}} </span></a>
                </li>





            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>


</div>
<!-- Left Sidebar End -->