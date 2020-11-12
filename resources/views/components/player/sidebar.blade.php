<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a
                href="{{ route('home') }}">{{ $title ?? config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">Lv</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li
                class="{{ request()->routeIs('home') == true ? 'active' : 'nav-item' }}">
                <a class="nav-link" href="{{ route('home') }}" data-toggle="tooltip"
                    data-placement="right" data-original-title="{{ __('Home') }}">
                    <i class="fas fa-fire"></i><span>{{ __('Home') }}</span>
                </a>
            </li>
            <li class="menu-header">{{ __('Main Menu') }}</li>
            <li
                class="{{ request()->routeIs('my.team') == true ? 'active' : 'nav-item' }}">
                <a class="nav-link" href="{{ route('my.team') }}" data-toggle="tooltip"
                    data-placement="right" data-original-title="{{ __('My Team') }}">
                    <i class="fas fa-fire"></i><span>{{ __('My Team') }}</span>
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
