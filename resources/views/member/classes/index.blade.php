@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if($sessions->count())
                @foreach($sessions as $session)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="row">
                                    <h3 class="text-purple  col-md-5"><a class="text-purple" href="{{route('member.classes.show', $session->id)}}">{{$session->name}}</a></h3>
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
                    </div>

                @endforeach
            @endif
        </div>
        <div class="col-md-6">

        </div>

    </div>
@endsection
@section('footer')

@endsection