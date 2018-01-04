@extends('admin.layouts.master')
@section('header')
    <!-- DataTables -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@stop
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{$fitness->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('form.all_workers')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($members as $member)
            <div class="col-lg-4 col-md-6">
                <div class="text-center card-box">
                    <div class="member-card">
                        <div class="thumb-xl member-thumb m-b-10 center-block">
                            <img style="border-radius: 100%; width: 150px; height: 150px;" src="
                            @if($member->user->photos->first())
                            {{asset('assets/images') . '/' . $member->user->photos->first()->path}}
                            @else
                            {{asset('assets/images') . '/' .'gym.png'}}
                            @endif" class="rounded-circle img-thumbnail" >
                        </div>

                        <div class="">
                            <h5 class="m-b-5 mt-2">{{$member->user->name}}</h5>
                            <p class="text-muted">@
                                @if($member->role_id == 1)
                                    {{trans('form.admin')}}
                                @elseif($member->role_id == 2)
                                    {{trans('form.reception')}}
                                @elseif($member->role_id == 3)
                                    {{trans('form.trainer')}}
                                @endif
                            </p>
                        </div>




                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $member->id]]) !!}
                        {{csrf_field()}}
                        <a href="{{route('admin.users.edit', $member->id)}}">
                            <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">{{trans('form.edit')}}</button>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">{{trans('form.delete')}}</button>
                        {!! Form::close() !!}

                        <div class="text-left m-t-40">
                            <p class="text-muted font-13"><strong>{{trans('form.name')}} :</strong> <span class="m-l-15">{{$member->user->name}}</span></p>

                            <p class="text-muted font-13"><strong>{{trans('form.phone')}} :</strong><span class="m-l-15">{{$member->user->phone}}</span></p>

                            <p class="text-muted font-13"><strong>{{trans('form.email')}} :</strong> <span class="m-l-15">{{$member->user->email}}</span></p>

                            <p class="text-muted font-13"><strong>{{trans('form.created_at')}} :</strong> <span class="m-l-15">{{$member->created_at}}</span></p>
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
            </div> <!-- end col -->
        @endforeach

    </div><!-- End of the row-->
@stop
@section('footer')

    <!-- Required datatable js -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>
@stop