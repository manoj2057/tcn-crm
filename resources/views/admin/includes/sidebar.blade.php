<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @if(Session::get('admin_page') == 'dashboard')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{ $active }}">
                    <a href="{{ route('adminDashboard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                </li>
                    @if(Session::get('admin_page') == 'customer')
                        @php $active = "active" @endphp
                    @else
                        @php $active = "" @endphp
                    @endif
                <li class="{{ $active }}">
                    <a href="{{ route('client.index') }}"><i class="la la-users"></i> <span>Clients</span></a>
                </li>


                <li>
                    <a href="{{ route('generalSettings') }}"><i class="la la-cog"></i> <span>Settings</span></a>
                </li>

                <li>
                    <a href="{{ route('source.index') }}"><i class="la la-srver"></i> <span>Sources</span></a>
                </li>

                <li>
                    <a href="{{ route('lead.index') }}"><i class="la la-srver"></i> <span>Leads</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
