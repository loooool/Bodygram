@extends('reception.layouts.master')
@section('header')

@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}} @if(session()->get('status')) - {{session()->get('status')}} @endif</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('form.register_attendance_show')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-3 col-lg-4">
            <div class="text-center card-box">
                <div class="member-card">
                    <div class="thumb-xl member-thumb m-b-10 center-block">
                        <img style="border-radius: 100%; width: 150px; height: 150px;" src="
                            @if($relation->user->photos->first())
                        {{asset('assets/images') . '/' . $relation->user->photos->first()->path}}
                        @else
                        {{asset('assets/images') . '/' .'gym.png'}}
                        @endif" class="rounded-circle img-thumbnail" >
                    </div>

                    <div class="">
                        <h5 class="m-b-5">{{$relation->user->name}}</h5>
                        <p class="text-muted">#{{$relation->category->name}}</p>
                    </div>

                    <a href="{{route('reception.members.show', $relation->user->id)}}"><button type="button" class="btn btn-info  btn-sm w-sm waves-effect m-t-10 waves-light">{{trans('form.redirect')}}</button></a>
                    {{--<button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Message</button>--}}


                    <div class="text-left m-t-40">
                        <p class="text-muted font-13"><strong>{{trans('form.code')}} :</strong> <span class="m-l-15">{{$relation->code}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.phone')}} :</strong><span class="m-l-15">{{$relation->user->phone}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.email')}} :</strong> <span class="m-l-15">{{$relation->user->email}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.created_at')}} :</strong> <span class="m-l-15">{{$relation->created_at}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.end_date')}} :</strong> <span class="m-l-15">{{$relation->end_date}}</span></p>
                    </div>

                    <ul class="social-links list-inline m-t-30">
                        <li class="list-inline-item">
                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                        </li>
                    </ul>

                </div>

            </div> <!-- end card-box -->



        </div> <!-- end col -->

        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="widget-bg-color-icon card-box">
                                <div class="bg-icon bg-icon-info pull-left">
                                    <i class="mdi mdi-black-mesa text-success"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter">{{$relation->debt}}</b></h3>
                                    <p class="text-muted mb-0">{{trans('form.all_debt')}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="widget-bg-color-icon card-box">
                                <div class="bg-icon bg-icon-danger pull-left">
                                    <i class="mdi mdi-account-check text-pink"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter">{{$attendances_count}}</b></h3>
                                    <p class="text-muted mb-0">{{trans('form.attendance_count')}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div><!-- end row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">{{trans('leftsidebar.debt')}}</h4>


                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('form.value')}}</th>
                                        <th>{{trans('form.about')}}</th>
                                        <th>{{trans('form.date')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = $debts->count() + 1; ?>
                                    @foreach($debts as $debt)
                                        <tr>
                                            <th scope="row">{{$i = $i - 1}}</th>

                                            <td>{{$debt->value}}</td>
                                            <td>{{$debt->about}}</td>
                                            <td>{{$debt->created_at}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><!--end row-->
                </div><!-- end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="widget-simple text-center card-box">
                        <h3 class="text-primary  font-bold mt-0">
                            {{$relation->end_date}}
                            </h3>
                        <p class="text-muted mb-0">{{trans('form.end_date')}}</p>
                    </div>
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">{{trans('leftsidebar.attendance')}}</h4>


                        <table class="table">

                            <tbody>
                            @foreach($attendances as $attendance)
                            <tr>
                                <td>{{$attendance->created_at}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div><!-- end of the col-md-3-->

    </div>

@stop
@section('footer')
    <script src="{{asset('plugins/jquery-circliful/js/jquery.circliful.min.js')}}"></script>

    <!-- Moment  -->
    <script src="{{asset('plugins/moment/moment.js')}}"></script>

    <!-- Counter Up  -->
    <script src="{{asset('plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!-- Sweet Alert  -->

    <!-- Sparkline -->
    <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- skycons -->
    <script src="{{asset('plugins/skyicons/skycons.min.js')}}" type="text/javascript"></script>




    <script src="{{asset('assets/pages/jquery.widgets.js')}}"></script>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
            $('.circliful-chart').circliful();
        });


    </script>
@stop