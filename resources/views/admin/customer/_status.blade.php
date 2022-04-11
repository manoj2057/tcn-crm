<input data-id="{{ $model->id }}" type="checkbox" id="contact_status{{$model->id}}" class="check toggle-class" {{ $model->status == 'active' ? 'checked' : '' }}>
<label for="contact_status{{$model->id}}" class="checktoggle">checkbox</label>
