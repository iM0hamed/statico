<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a
                href="{{ url('/') }}">{{ $title ?? config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">Lv</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li
                class="{{ request()->routeIs('admin.dashboard') == true ? 'active' : 'nav-item' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}" data-toggle="tooltip"
                    data-placement="right" data-original-title="{{ __('Dashboard') }}">
                    <i class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="menu-header">{{ __('Main Menu') }}</li>
            <li
                class="{{ request()->routeIs('teams') == true ? 'active' : 'nav-item' }}">
                <a class="nav-link" href="{{ route('teams') }}" data-toggle="tooltip"
                    data-placement="right" data-original-title="{{ __('Teams') }}">
                    <i class="fab fa-ethereum"></i><span>{{ __('Teams') }}</span>
                </a>
            </li>
            <li
                class="{{ request()->routeIs('players') == true ? 'active' : 'nav-item' }}">
                <a class="nav-link" href="{{ route('players') }}" data-toggle="tooltip"
                    data-placement="right" data-original-title="{{ __('Players') }}">
                    <i class="fas fa-users"></i><span>{{ __('Players') }}</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" target="_blank"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
