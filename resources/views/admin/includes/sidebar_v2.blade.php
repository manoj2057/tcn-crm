<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('adminDashboard') }}"><i class="la la-home"></i> <span>Back to Home</span></a>
                </li>
                <li class="menu-title">Settings</li>
                @if(Session::get('admin_page') == 'general')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{ $active }}">
                    <a href="{{ route('generalSettings') }}"><i class="la la-photo"></i> <span>General Settings</span></a>
                </li>
                @if(Session::get('admin_page') == 'department')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{ $active }}">
                    <a href="{{ route('department.index') }}"><i class="la la-table"></i> <span>Departments</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
