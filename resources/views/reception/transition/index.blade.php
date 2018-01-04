@extends('reception.layouts.master')
@section('header')

@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('leftsidebar.debt')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-lg-12 card-box">
                    <h4 class="m-t-0 m-b-30 header-title">{{trans('form.income')}}</h4>

                    {!! Form::open(['method'=>'POST', 'action'=>'ReceptionTransitionController@store']) !!}

                    {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="value" id="exampleInputEmail1" placeholder="{{trans('form.value')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="about" id="exampleInputPassword1" placeholder="{{trans('form.about')}}">
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info waves-effect waves-light">{{trans('form.add')}}</button>
                    </div>

                    {!! Form::close() !!}
                </div><!-- end card-box-->
            </div><!-- end row-->
            <div class="row">
                <div class="col-lg-12 card-box">
                    <h4 class="m-t-0 m-b-30 header-title">{{trans('form.expense')}}</h4>

                    {!! Form::open(['method'=>'POST', 'action'=>'ReceptionTransitionController@expense']) !!}

                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="value" id="exampleInputEmail1" placeholder="{{trans('form.value')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="about" id="exampleInputPassword1" placeholder="{{trans('form.about')}}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info waves-effect waves-light">{{trans('form.add')}}</button>
                    </div>

                    {!! Form::close() !!}
                </div><!-- end card-box-->
            </div><!-- end row-->
        </div><!-- end col-->
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">{{trans('form.expense')}} & {{trans('form.income')}}</h4>
                <div class="table-responsive" style="overflow-y:scroll;
               height:450px;
               display:block; ">
                    <table class="table table-sm m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('form.money_value')}}</th>
                            <th>{{trans('form.about')}}</th>
                            <th>{{trans('form.date')}}</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php $i = $transitions->count() + 1;?>
                        @foreach($transitions as $transition)
                            <tr>
                                <td>{{$i = $i - 1}}</td>
                                <td>{{$transition->value}}</td>
                                <td>{{$transition->about}}</td>
                                <td>{{$transition->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col-->
        <div class="col-md-3">
            

            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="mdi mdi-account text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$debts->count()}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.members_with_debt')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="mdi mdi-wallet text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$debts->sum('debt')}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.debt_value')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div><!-- end col-->
    </div><!-- end row-->

@stop
@section('footer')

@stop