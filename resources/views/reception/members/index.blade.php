@extends('reception.layouts.master')
@section('header')

    <!-- DataTables -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{App\Fitness::find(session()->get('reception_fitness_id'))->name}}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Bodygram</a></li>
                    <li class="breadcrumb-item active">{{trans('form.all_members')}}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{trans('leftsidebar.members')}}</b></h4>
                <table id="datatable" class="table table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>{{trans('form.photo')}}</th>
                        <th>{{trans('form.name')}}</th>
                        <th>{{trans('form.code')}}</th>
                        <th>{{trans('form.sex')}}</th>
                        <th>{{trans('form.category')}}</th>
                        <th>{{trans('form.email')}}</th>
                        <th>{{trans('form.phone')}}</th>
                        <th>{{trans('form.registered_date')}}</th>
                        <th>{{trans('form.end_date')}}</th>

                    </tr>
                    </thead>


                    <tbody>

                    @foreach($members->get() as $member)

                        <tr>
                            @if($member->user->photos->first())
                                <td class="text-center"><img height="40px" width="40px" src="{{asset('assets/images') . '/'. $member->user->photos->first()->path}}" class="rounded-circle"></td>
                            @else
                                <td class="text-center"><img height="40px" width="40px" src="{{asset('assets/images/gym.png')}}" class="rounded-circle"></td>
                            @endif
                            <td><a href="{{route('reception.members.show', $member->user->id)}}" >{{$member->user->name}}</a></td>
                            <td>{{$member->code}}</td>
                            @if($member->user->sex == 0)
                                <td>{{trans('form.male')}}</td>
                            @elseif($member->user->sex == 1)
                                <td>{{trans('form.female')}}</td>
                            @endif

                            @if($member->category)
                                    <td>{{$member->category->name}}</td>
                            @else
                                    <td>{{trans('form.user_not_in_category')}}</td>
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

    <!-- Responsive examples -->
    <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();


            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>
@stop