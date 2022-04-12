<td>
    <div class="dropdown dropdown-action">
        <a href="employees-list.html#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="employees-list.html#" data-toggle="modal" data-target="#edit_source{{$model->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
            <a class="dropdown-item btn-delete" href="javascript:" rel="{{ $model->id }}" rel1="delete-source"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
        </div>
    </div>
</td>

