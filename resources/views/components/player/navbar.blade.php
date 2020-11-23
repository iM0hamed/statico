<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="javascript:;" onclick="toggleSidebar()" class="nav-link nav-link-lg"><i class="fas fa-bars">
                    </i>
                </a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">
                    {{ auth()->guard('player')->user()->in_game_nickname }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in
                    {{ auth()->guard('player')->user()->created_at->diffForHumans() }}</div>
                <a href="/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a> -->
                <a href="/settings" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
