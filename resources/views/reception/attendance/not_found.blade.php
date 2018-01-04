@extends('reception.layouts.master')
@section('header')
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}} - {{trans('form.not_found')}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram </a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.attendance')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@stop
@section('footer')
@stop