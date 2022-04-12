@extends('admin.includes.admin_design')

@section('title') All Leads @endsection

@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('lead.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Lead</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @include('admin.includes._message')


    <!-- Leave Statistics -->
    <div class="row">
        <div class="col-md-2">
            <div class="stats-info">
                <h4>{{ \App\Models\Lead::count() }}</h4>
                <span>Total Leads</span>
            </div>
        </div>

        <div class="col-md-2">
            <div class="stats-info">
                <h4></h4>
                <span class="text-success">Converted Leads</span>
            </div>
        </div>

        <div class="col-md-2">
            <div class="stats-info">
                <h4></h4>
                <span class="text-danger">Non Converted List</span>
            </div>
        </div>

    </div>
    <!-- /Leave Statistics -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0" id="datatable">
                                <thead>
                                <tr>
                                    
                                    <th>#</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /Page Content -->

@endsection


@section('js')

    <script>
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            sorting: true,
            searchable : true,
            scrollX: false,
            ajax: "{{ route('table.lead') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false}
            ]
        });


        $('body').on('click', '.btn-delete', function (event) {
            event.preventDefault();

            var SITEURL = '{{ URL::to('') }}';

            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure? ",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!"
                },
                function () {
                    window.location.href =  SITEURL + "/admin/" + deleteFunction + "/" + id;
                });
        });


        $('body').on('click', '.toggle-class', function (event) {
            var status = $(this).prop('checked') == true ? 'active' : 'inactive';
            var member_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: '{{ route('changeStatus') }}',
                data:{'status' : status, 'member_id': member_id},
                success: function (data){
                    console.log("Success")
                }
            });
        });

    </script>
@endsection
