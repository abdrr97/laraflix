<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main pr-0 navbar-light bg-white border-bottom mdk-header--fixed"
            id="navbar" data-primary>
            <div class="container-fluid p-0">

                <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button"
                    data-toggle="sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="{{ route('admin.index') }}" class="navbar-brand "><span>FILMSTORE</span></a>
                <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                    <li class="nav-item dropdown">
                        <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown"
                            data-caret="false">
                            <span class="mr-1 d-flex-inline">
                                <span class="text-light text-uppercase">{{ Auth::user()->username}}</span>
                                <span
                                    class="badge badge-warning ml-auto">{{ Auth::user()->roles->first()->display_name }}</span>
                            </span>
                            @if(isset(Auth::user()->profile_image) && Auth::user()->profile_image != 'avatar.png')
                            <img src="{{ asset('storage/users/'.Auth::user()->id.'/images/'.Auth::user()->profile_image) }}"
                                class="rounded-circle" width="32">
                            @else
                            <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" class="rounded-circle"
                                width="32">
                            @endif
                        </a>
                        <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div class="text-muted text-capitalize">
                                    {{ Auth::user()->firstname.' '.Auth::user()->lastname }}
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/browse">
                                <i class="material-icons">dvr</i> Visite the Website
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="material-icons">account_circle</i> My profile
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.edit'  ) }}">
                                <i class="material-icons">edit</i>
                                Edit account
                            </a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="material-icons">exit_to_app</i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>