@extends('admin.includes.admin_design')

@section('title') All Clients @endsection

@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Clients</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('client.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Client</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @include('admin.includes._message')


    <!-- Leave Statistics -->
        <div class="row">
            <div class="col-md-2">
                <div class="stats-info">
                    <h4>{{ \App\Models\Customer::count() }}</h4>
                    <span>Total Clients</span>
                </div>
            </div>

            <div class="col-md-2">
                <div class="stats-info">
                    <h4>{{ \App\Models\Customer::where('status', 'active')->count() }}</h4>
                    <span class="text-success">Active Clients</span>
                </div>
            </div>

            <div class="col-md-2">
                <div class="stats-info">
                    <h4>{{ \App\Models\Customer::where('status', 'inactive')->count() }}</h4>
                    <span class="text-danger">Inactive Clients</span>
                </div>
            </div>

        </div>
        <!-- /Leave Statistics -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0" id="department_datatable">
                                <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Client ID</th>
                                    <th>Company Name</th>
                                    <th>Contact Person</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Groups</th>
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
        $('#department_datatable').DataTable({
            processing: true,
            serverSide: true,
            sorting: true,
            searchable : true,
            scrollX: false,
            ajax: "{{ route('table.client') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'customer_code', name: 'customer_code'},
                {data: 'company_name', name: 'company_name'},
                {data: 'contact_person', name: 'contact_person'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'group', name: 'group'},
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
