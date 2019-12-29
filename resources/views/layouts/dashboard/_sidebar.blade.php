<aside class="main-sidebar sidebar-dark-primary">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('logo.png')}}"
            alt="{{ ($settings->where('key', 'sitename')->pluck('value')->first() ?? 'Enlight') }}"
            class="brand-image img-circle">
        <span class="brand-text font-weight-light">
            {{ ($settings->where('key', 'sitename')->pluck('value')->first() ?? 'Enlight') }}
        </span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}">
            </div>
            <div class="info text-light">
                {{ auth()->user()->name }}
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ setActive(['home']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ setActive(['user-settings', 'app-settings', 'logo-settings'])}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user-settings') }}" class="nav-link {{ setActive(['user-settings'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        @if ( auth()->user()->hasAnyRole(['admin']))
                        <li class="nav-item">
                            <a href="{{ route('admin.app-settings') }}"
                                class="nav-link {{ setActive(['app-settings'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Application
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.logo-settings') }}"
                                class="nav-link {{ setActive(['logo-settings'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Logo
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>