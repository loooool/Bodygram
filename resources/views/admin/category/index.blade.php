@extends('admin.layouts.master')
@section('header')
    <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
    <link href="{{asset('plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{$fitness->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.category')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">{{trans('form.add_category')}}</h4>
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoryController@store']) !!}
                        {{csrf_field()}}
                        <div class="form-group">
                            <input name="name" type="text" class="form-control"  placeholder="{{trans('form.name')}}">
                        </div>
                        <button type="submit" class="btn btn-info btn-custom waves-effect w-xs waves-light m-b-5">{{trans('form.add')}}</button>
                        {!! Form::close() !!}
                    </div><!-- end cardbox--></div>

            </div><!-- end row-->
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.all_categories')}}</h4>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('form.name')}}</th>
                        <th>{{trans('form.count')}}</th>
                        <th>{{trans('form.created_at_category')}}</th>
                        <th>{{trans('form.updated_at_category')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $id = 0;?>
                    @foreach($categories as $category)
                        <?php $id++;?>
                        <tr>
                            <td>{{$id}}</td>
                            <td>{{$category->name}} <a href="{{route('admin.category.edit', $category->id)}}"><i class=" mdi mdi-pencil"></i></a>  </td>
                            <td>{{$category->fitnessUsers->where('role_id', 4)->count()}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
        <div class="col-md-3">
            <div class="col-lg-6 col-xl-12">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-success pull-left">
                        <i class=" ti-tag text-success"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark m-t-10"><b class="counter">{{$categories->count()}}</b></h3>
                        <p class="text-muted mb-0">{{trans('form.count_categories')}}</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                    <div class="bg-icon bg-icon-primary pull-left">
                        <i class=" mdi mdi-account-settings"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark m-t-10"><b class="counter">{{$fitness_members->count()}}</b></h3>
                        <p class="text-muted mb-0">{{trans('dashboard.all_members')}}</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php
            $i = 0;
            foreach ($categories as $item) {
                $d = $item->fitnessUsers->where('role_id', 4)->count();
                $i = $i + $d;
            }
            if ($fitness_members->count()){
                $uncategorized =  $fitness_members->count() - $i;
                $uncategorized_percentage =  $uncategorized / $fitness_members->count() * 100;
            } else {
                $uncategorized = 0;
                $uncategorized_percentage = 0;
            }
            ?>
            <div class="col-lg-12 col-md-6">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="{{number_format($uncategorized_percentage)}}%" data-width="5" data-fontsize="14"
                         data-percent="{{$uncategorized_percentage}}" data-fgcolor="#7266ba" data-bgcolor="#ebeff2"></div>
                    <h3 class="text-purple counter m-t-10">{{$uncategorized}}
                        </h3>
                    <p class="text-muted mb-0">{{trans('form.users_not_in_category')}}</p>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row-->
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