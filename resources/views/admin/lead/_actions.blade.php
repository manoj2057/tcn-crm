<td>
    <div class="dropdown dropdown-action">
        <a href="employees-list.html#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ $url_edit }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
            <a class="dropdown-item btn-delete" href="javascript:" rel="{{ $model->id }}" rel1="delete-lead"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            <a class="dropdown-item" href="" data-toggle="modal" data-target="#add_comment"><i class="fa fa-trash-o m-r-5"></i> Add Comment</a>

        </div>
    </div>
</td>

<div id="add_comment" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('comment.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Comment <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="comment" id="comment" required>
                    </div>

                    
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

