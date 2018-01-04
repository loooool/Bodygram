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
                    <li class="breadcrumb-item active">{{trans('form.all_members')}}</li>
                    <li class="breadcrumb-item active">{{$relation->user->name}}</li>
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

                    {{--<button type="button" class="btn btn-info  btn-sm w-sm waves-effect m-t-10 waves-light">{{trans('form.redirect')}}</button>--}}
                <!-- Custom width modal -->
                    <button type="button" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light" data-toggle="modal" data-target="#custom-width-modal">{{trans('form.edit')}}</button>

                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="width:55%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="custom-width-modalLabel">{{$relation->user->name}}</h4>
                                </div>
                                {!! Form::open(['method'=>'PATCH',  'onkeypress'=>'return event.keyCode != 13;', 'action'=>['ReceptionMemberController@update', $relation->id]]) !!}
                                {{csrf_field()}}
                                <div class="modal-body">

                                        <div class="row form-group">
                                            <label for="inputEmail3" class="col-4 col-form-label">{{trans('form.code')}}<span class="text-danger">*</span></label>
                                            <div class="col-md-8"><input class="form-control" type="text" name="code" value="{{$relation->code}}"></div>
                                        </div>
                                        <div class="row form-group">
                                            <label for="inputEmail3" class="col-4 col-form-label">{{trans('form.category')}}<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="category_id" class="form-control">
                                                    <option value="{{$relation->category_id}}">{{$relation->category->name}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                        <div class="row form-group">
                                            <label for="inputEmail3" class="col-4 col-form-label">{{trans('form.date')}}<span class="text-danger">*</span></label>
                                            <div class="col-md-8"><input class="form-control" type="date" name="end_date" value="{{date('Y-m-d', strtotime($relation->end_date))}}"></div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">{{trans('form.edit')}}</button>
                                </div>
                                {!! Form::close() !!}

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="mdi mdi-wallet text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$relation->debt}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.debt_value')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="mdi  mdi mdi-calendar text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter">{{$relation->end_date}}</b></h3>
                            <p class="text-muted mb-0">{{trans('form.end_date')}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="card-box">

                <ul class="nav nav-tabs tabs-bordered nav-justified">
                    <li class="nav-item">
                        <a href="#profile-f3" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            {{trans('form.class')}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                            {{trans('form.debt')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                            {{trans('form.paid')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile-f2" data-toggle="tab" aria-expanded="false" class="nav-link">
                            {{trans('leftsidebar.attendance')}}
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="home-b2" aria-expanded="false">
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
                    <div class="tab-pane" id="profile-b2" aria-expanded="false">
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
                            <?php $i = $expenses->count() + 1; ?>
                            @foreach($expenses as $expense)
                                <tr>
                                    <th scope="row">{{$i = $i - 1}}</th>

                                    <td>{{$expense->value}}</td>
                                    <td>{{$expense->about}}</td>
                                    <td>{{$expense->created_at}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="profile-f2" aria-expanded="false">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('form.name')}}</th>
                                <th>{{trans('form.phone')}}</th>
                                <th>{{trans('form.date')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $attendances->count() + 1; ?>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <th scope="row">{{$i = $i - 1}}</th>

                                    <td>{{$attendance->fitnessUser->user->name}}</td>
                                    <td>{{$attendance->fitnessUser->user->phone}}</td>
                                    <td>{{$attendance->created_at}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane active" id="profile-f3" aria-expanded="true">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('form.name')}}</th>
                                <th>{{trans('form.start')}}</th>
                                <th>{{trans('form.end_date')}}</th>
                                <th>{{trans('form.time')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $relation->user->sessions->count() + 1; ?>
                            @foreach($relation->user->sessions as $session)
                                <tr>
                                    <th scope="row">{{$i = $i - 1}}</th>
                                    <td>{{$session->name}}</td>
                                    <td>{{$session->start_date}}</td>
                                    <td>{{$session->end_date}}</td>
                                    <td>{{$session->time}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- end row-->
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <ul class="nav nav-tabs tabs-bordered nav-justified">
                            <li class="nav-item">
                                <a href="#home-a2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    {{trans('form.lend')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-a2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    {{trans('form.pay')}}
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home-a2" aria-expanded="true">
                                {!! Form::open(['method'=>'POST', 'action'=>'ReceptionMemberController@debt']) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="value" class="form-control" placeholder="{{trans('form.value')}}">
                                </div>
                                <input type="hidden" name="user_id" value="{{$relation->user->id}}">
                                <div class="form-group">
                                    <input type="text" name="about" class="form-control" placeholder="{{trans('form.about')}}">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-block">{{trans('form.lend')}}</button>
                                        </div>

                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="profile-a2" aria-expanded="false">
                                {!! Form::open(['method'=>'POST', 'action'=>'ReceptionMemberController@pay']) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="value" class="form-control" placeholder="{{trans('form.value')}}">
                                </div>
                                <input type="hidden" name="user_id" value="{{$relation->user->id}}">
                                <div class="form-group">
                                    <input type="text" name="about" class="form-control" placeholder="{{trans('form.about')}}">
                                </div>
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <button class="btn btn-dark btn-block">{{trans('form.pay')}}</button>
                                        </div>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>

                        </div>

                    </div>
                </div>

            </div><!-- end row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <ul class="nav nav-tabs tabs-bordered nav-justified">
                            <li class="nav-item">
                                <a href="#home-s2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    {{trans('form.fitness')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-s2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    {{trans('form.class')}}
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home-s2" aria-expanded="true">
                                {{--<h4 class="m-t-0 m-b-30 header-title">{{trans('form.date_extend')}}</h4>--}}
                                {!! Form::open(['method'=>'POST', 'action'=>'ReceptionMemberController@date']) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <select name="pack_id" class="form-control">

                                        @foreach($packs as $pack)
                                            <option value="{{$pack->id}}">{{$pack->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="value" class="form-control" placeholder="{{trans('form.debt_value')}}">
                                </div>
                                <input type="hidden" name="user_id" value="{{$relation->user->id}}">
                                <div class="form-group">
                                    {!! Form::submit(trans('form.extend'), ['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="profile-s2" aria-expanded="false">
                                {!! Form::open(['method'=>'POST', 'action'=>'ReceptionSessionController@store']) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <select name="session_id" class="form-control">

                                        @foreach($classes->whereDate('end_date', '>', date('Y-m-d'))->get() as $class)
                                            <option value="{{$class->id}}">{{$class->name}}-{{$class->seats - $class->current_seats}}-{{$class->time}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="value" class="form-control" placeholder="{{trans('form.debt_value')}}">
                                </div>
                                <input type="hidden" name="user_id" value="{{$relation->user->id}}">
                                <div class="form-group">
                                    {!! Form::submit(trans('form.enroll'), ['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                        </div>

                    </div>
                </div>

            </div><!-- end row-->


        </div><!-- end row -->
    </div><!-- end row-->

@stop
@section('footer')

@stop