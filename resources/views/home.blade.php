@extends('layouts.master')
@section('header')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    @endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-success pull-left">
                    <i class=" mdi mdi-calendar"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b class="counter">{{$user->sessions->count()}}</b></h3>
                    <p class="text-muted mb-0">{{trans('form.enrolled_classes')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-primary pull-left">
                    <i class="mdi mdi-weight"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b>@if ($user->healths->count()){{$user->healths->sortBy('id')->first()->weight - $user->healths->first()->weight}}@else 0 @endif{{trans('form.kg')}}</b></h3>
                    <p class="text-muted mb-0">{{trans('form.lost_weight')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-danger pull-left">
                    <i class="mdi mdi-human-handsup text-pink"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b>{{$user->attendances->count()}}</b></h3>
                    <p class="text-muted mb-0">{{trans('form.attendance_count')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-purple pull-left">
                    <i class=" mdi mdi-calendar-check text-purple"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark m-t-10"><b>{{$user->attendances->where('created_at', '>', Carbon\Carbon::now()->subDays(30))->count()}}</b></h3>
                    <p class="text-muted mb-0">{{trans('form.month')}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-6">
           <h3>{{trans('form.today_classes')}}:</h3>
           <div class="row">
               @if($sessions->count())
                   @foreach($sessions as $session)
                       <div class="col-md-12">
                           <div class="card-box">
                               <div class="row">
                                   <h3 class="text-purple  col-md-5">{{$session->name}}</h3>
                                   <h3 class="text-right text-purple col-md-7">{{$session->time}}</h3>
                               </div>
                               <div class="row">
                                   <span class="col-md-8"><b>{{$session->fitness->name}}: {{$session->trainer->name}}</b> <b>{{$session->current_seats}}/{{$session->seats}}</b></span>
                                   <span class="text-right col-md-4"> {{$session->start_date}} / {{$session->end_date}} </span>
                               </div>

                               <br>
                               <div class="row">
                                   <div class="col text-center">
                                       @if($session->mon == 1)
                                           <span class="badge badge-danger"><b>Mon</b></span>
                                       @else
                                           <b>Mon</b>
                                       @endif
                                   </div>
                                   <div class="col text-center">
                                       @if($session->tue == 1)
                                           <span class="badge badge-danger"><b>Tue</b></span>
                                       @else
                                           <b>Tue</b>
                                       @endif
                                   </div>
                                   <div class="col text-center">
                                       @if($session->wed == 1)
                                           <span class="badge badge-danger"><b>Wed</b></span>
                                       @else
                                           <b>Wed</b>
                                       @endif
                                   </div>
                                   <div class="col text-center">
                                       @if($session->thu == 1)
                                           <span class="badge badge-danger"><b>Thu</b></span>
                                       @else
                                           <b>Thu</b>
                                       @endif
                                   </div>
                                   <div class="col text-center">
                                       @if($session->fri == 1)
                                           <span class="badge badge-danger"><b>Fri</b></span>
                                       @else
                                           <b>Fri</b>
                                       @endif
                                   </div>
                                   <div class="col text-center">
                                       @if($session->sat == 1)
                                           <span class="badge badge-danger"><b>Sat</b></span>
                                       @else
                                           <b>Sat</b>
                                       @endif
                                   </div>
                                   <div class="col text-center">
                                       @if($session->sun == 1)
                                           <span class="badge badge-danger"><b>Sun</b></span>
                                       @else
                                           <b>Sun</b>
                                       @endif
                                   </div>
                               </div>
                               <br>

                           </div>
                       </div>
                   @endforeach
               @endif
           </div>

       </div>
       <div class="col-md-6"></div>
    </div><!-- end row-->

@endsection
@section('footer')

@endsection
