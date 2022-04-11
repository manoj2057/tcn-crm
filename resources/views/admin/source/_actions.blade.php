<td>
    <div class="dropdown dropdown-action">
        <a href="employees-list.html#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="employees-list.html#" data-toggle="modal" data-target="#edit_source{{$model->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
            <a class="dropdown-item btn-delete" href="javascript:" rel="{{ $model->id }}" rel1="delete-source"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
        </div>
    </div>
</td>

@php $sources = \App\Models\Source::orderBy('name', 'ASC')->get(); @endphp

@foreach($sources as $data)
<!-- Edit Department Modal -->
<div id="edit_source{{$data->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sourcet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form method="post" action="{{ route('source.update', $data->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="source_name">source Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" id="source_name" value="{{ $data->name }}" required>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach