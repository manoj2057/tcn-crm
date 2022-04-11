@extends('admin.includes.admin_design')

@section('title') All Sources @endsection

@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Sources</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sources</li>
                    </ul>
                </div>
                
                <div class="col-auto float-right ml-auto">
                    <a href="sources.html#" class="btn add-btn" data-toggle="modal" data-target="#add_source"><i class="fa fa-plus"></i> Add Source</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @include('admin.includes._message')


    <!-- Leave Statistics -->
        

        </div>
        <!-- /Leave Statistics -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0" id="source_datatable">
                                <thead>
                                <tr>
                                    
                                    <th>SN</th>
                                    <th>Source Name</th>
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
<div id="add_source" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sources</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('source.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="source_name">Source Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" id="source_name" required>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






@endsection

@section('js')

    <script>
        $('#source_datatable').DataTable({
            processing: true,
            serverSide: true,
            sorting: true,
            searchable : true,
            scrollX: false,
            ajax: "{{ route('table.source') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
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
