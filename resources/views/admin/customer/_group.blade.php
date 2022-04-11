@php $client_groups = $model->departments->sortBy('department_name')->pluck('id'); @endphp
@foreach($client_groups as $group)
    <span class="badge badge-secondary">
        {{ \App\Models\Department::find($group)->department_name }}
    </span>
@endforeach
