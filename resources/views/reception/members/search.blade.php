@extends('reception.layouts.master')
@section('header')

@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}} - {{$input}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('form.all_members')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($results->get() as $result)

        <div class="col-lg-3 col-md-6">
            <div class="text-center card-box">
                <div class="member-card">
                    <div class="thumb-lg member-thumb m-b-10 center-page">
                        <img style="border-radius: 50%; width: 100px; height: 100px;" width="100px" src="
                        @if($result->photos->first())
                        {{asset('assets/images') . '/' . $result->photos->first()->path}}
                        @else
                        {{asset('assets/images') . '/' .'gym.png'}}
                        @endif" class="rounded-circle img-thumbnail img-circle" >
                    </div>

                    <div class=""
                    style="margin-top: 15px">
                        <h5 class="m-b-5 mt-2">{{$result->name}}</h5>
                        <p class="text-muted">#{{ App\Category::find($result->pivot->category_id)->name }}</p>
                    </div>

                    <a href="{{route('reception.members.show', $result->id)}}">
                        <button type="button" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light">{{trans('form.redirect')}}</button>
                    </a>
                    {{--<button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Message</button>--}}

                    <div class="text-left m-t-40">
                        <p class="text-muted font-13"><strong>{{trans('form.code')}} :</strong> <span class="m-l-15">{{$result->pivot->code}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.email')}} :</strong><span class="m-l-15">{{$result->email}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.phone')}} :</strong> <span class="m-l-15">{{$result->phone}}</span></p>

                        <p class="text-muted font-13"><strong>{{trans('form.end_date')}} :</strong> <span class="m-l-15">{{$result->pivot->end_date}}</span></p>
                    </div>

                    <ul class="social-links list-inline m-t-30 mb-0">
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
        </div>
        @endforeach
    </div><!-- end row-->


@stop
@section('footer')

@stop