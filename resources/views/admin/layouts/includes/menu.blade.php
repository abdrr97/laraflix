<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="bg-dark sidebar sidebar-dark sidebar-left sidebar-p-t" data-perfect-scrollbar>
            <div class="sidebar-heading
            @if(Request::is('admin/users*') || Request::is('admin/roles*') || Request::is('admin/permission*'))
                text-light
            @endif">Menu</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item active open">
                    <a class="sidebar-menu-button">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">User Management</span>
                    </a>
                    <ul class="sidebar-submenu collapse show" id="dashboards_menu">
                        <li class="sidebar-menu-item @if(Request::is('admin/users*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.users.index') }}">
                                <span class="sidebar-menu-text">
                                    Users
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item @if(Request::is('admin/roles*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.roles.index') }}">
                                <span class="sidebar-menu-text">
                                    Roles
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item @if(Request::is('admin/permission*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.permission.index') }}">
                                <span class="sidebar-menu-text">
                                    Permissions
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item @if(Request::is('admin/userslogs*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.users.userslogs') }}">
                                <span class="sidebar-menu-text">
                                    User Login History
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- NOTE: MOVIE SECTION  --}}
            <div class="sidebar-heading">FILM</div>
            <ul class="sidebar-menu ">
                <li class="sidebar-menu-item active open">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#movies_collapse">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                        <span class="sidebar-menu-text">Movies / Series</span>
                    </a>
                    <ul class="sidebar-submenu collapse show" id="movies_collapse">
                        <li class="sidebar-menu-item @if(Request::is('admin/movies*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.movies.index') }}">
                                <span class="sidebar-menu-text">
                                    Movies
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item @if(Request::is('admin/series*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.series.index') }}">
                                <span class="sidebar-menu-text">
                                    Series
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item @if(Request::is('admin/genres*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.genres.index') }}">
                                <span class="sidebar-menu-text">
                                    Genres
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item @if(Request::is('admin/casts*')) active @endif">
                            <a class="sidebar-menu-button" href="{{ route('admin.casts.index') }}">
                                <span class="sidebar-menu-text">
                                    Casts
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="sidebar-heading">PAGES</div>
            <ul class="sidebar-menu ">
                <li class="sidebar-menu-item @if(Request::is('admin/pages*')) active @endif">
                    <a class="sidebar-menu-button" href="{{ route('admin.pages.index') }}">
                        <span class="sidebar-menu-text">
                            PAGES
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
