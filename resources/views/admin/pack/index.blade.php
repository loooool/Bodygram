@extends('admin.layouts.master')

@section('header')

@stop
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{$fitness->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.pack')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
                <div class="card-box">


                    <h4 class="m-t-0 m-b-30 header-title">{{trans('form.add_pack')}}</h4>
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminPackController@store']) !!}
                    {{csrf_field()}}
                    <div class="form-group">
                        <input name="name" type="text" class="form-control"  placeholder="{{trans('form.name')}}">
                    </div>
                    <div class="form-group">
                        <input name="days" type="text" class="form-control"  placeholder="{{trans('form.days')}}">
                    </div>
                    <div class="form-group">
                        <input name="price" type="text" class="form-control"  placeholder="{{trans('form.price')}}">
                    </div>

                    <button type="submit" class="btn btn-info btn-custom waves-effect w-xs waves-light m-b-5">{{trans('form.add')}}</button>
                    {!! Form::close() !!}


                </div><!-- end card-box-->
        </div><!-- end col-->
        <div class="col-md-9">
            <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">{{trans('form.all_packs')}}</h4>
            <table class="table table-sm ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('form.name')}}</th>
                    <th>{{trans('form.price')}}</th>
                    <th>{{trans('form.days')}}</th>
                    <th>{{trans('form.created_at_category')}}</th>
                    <th>{{trans('form.updated_at_category')}}</th>
                    <th>{{trans('form.pack_user')}}</th>
                    <th>{{trans('form.month')}}</th>
                </tr>
                </thead>
                <tbody>
                <?php $id = 0;?>
                @foreach($packs as $pack)
                    <?php $id++;?>
                    <tr>
                        <td>{{$id}}</td>
                        <td>{{$pack->name}}</td>
                        <td>{{$pack->price}}</td>
                        <td>{{$pack->days}}</td>
                        <td>{{$pack->created_at}}</td>
                        <td>{{$pack->updated_at}}</td>
                        <td>0</td>
                        <td>0</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            </div>
        </div><!-- end col-->

    </div><!-- END ROW-->





@stop
@section('footer')

@stop