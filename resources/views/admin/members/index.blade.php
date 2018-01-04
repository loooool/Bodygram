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
                    <li class="breadcrumb-item active">{{trans('leftsidebar.show_members')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{trans('leftsidebar.members')}}</b></h4>
                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>{{trans('form.photo')}}</th>
                        <th>{{trans('form.name')}}</th>
                        <th>{{trans('form.age')}}</th>
                        <th>{{trans('form.sex')}}</th>
                        <th>{{trans('form.email')}}</th>
                        <th>{{trans('form.phone')}}</th>
                        <th>{{trans('form.registered_date')}}</th>
                        <th>{{trans('form.end_date')}}</th>

                    </tr>
                    </thead>


                    <tbody>

                    @foreach($members as $member)

                        <tr>
                            @if($member->user->photos->first())
                                <td class="text-center"><img height="40px" width="40px" src="{{asset('assets/images') . '/'. $member->user->photos->first()->path}}" class="rounded-circle"></td>
                            @else
                                <td class="text-center"><img height="40px" width="40px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle"></td>
                            @endif
                            <td>{{$member->user->name}}</td>
                            <td>{{$member->user->age}}</td>
                            @if($member->user->sex == 0)
                                <td>{{trans('form.male')}}</td>
                            @elseif($member->user->sex == 1)
                                <td>{{trans('form.female')}}</td>
                            @endif
                            <td>{{$member->user->email}}</td>
                            <td>{{$member->user->phone}}</td>
                            <td>{{$member->created_at}}</td>
                            <td>{{$member->end_date}}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div><!-- End of the col-->

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