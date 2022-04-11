@extends('admin.includes.admin_design_v2')

@section('title') All Departments @endsection

@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row ">
                <div class="col">
                    <h3 class="page-title">Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Departments</li>
                    </ul>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="departments.html#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
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
                            <table class="table table-striped custom-table mb-0" id="department_datatable">
                                <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Department Name</th>
                                    <th>Department Email</th>
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


    <!-- Add Department Modal -->
    <div id="add_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('department.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="department_name">Department Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="department_name" id="department_name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Department Email </label>
                            <input class="form-control" type="text" name="email" id="email">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->




@endsection

@section('js')

    <script>
        $('#department_datatable').DataTable({
            processing: true,
            serverSide: true,
            sorting: true,
            searchable : true,
            scrollX: false,
            ajax: "{{ route('table.department') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'department_name', name: 'department_name'},
                {data: 'email', name: 'email'},
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
    </script>
@endsection
