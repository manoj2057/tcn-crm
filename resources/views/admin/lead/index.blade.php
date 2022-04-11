@extends('admin.includes.admin_design')

@section('title') All Clients @endsection

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


    

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0" id="lead_datatable">
                                <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Source ID</th>
                                    <th>Admin Id</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
        $('#lead_datatable').DataTable({
            processing: true,
            serverSide: true,
            sorting: true,
            searchable : true,
            scrollX: false,
            ajax: "{{ route('table.client') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'source_id', name: 'source_id'},
                {data: 'admin_id', name: 'admin_id'},
                {data: 'name', name: 'name'}
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