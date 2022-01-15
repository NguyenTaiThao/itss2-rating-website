<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <!-- <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
            href="{{ route('brand.dashboard') }}">{{ __('ダッシュボード') }}</a> -->
        <!-- User -->
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/icon_name_white.png" class="navbar-brand-img w-75" alt="...">
        </a>
        <!-- Navbar items -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ route('brand.post') }}">
                    <span class="nav-link-inner--text"><i class="fas fa-list"></i>{{ __('ポストの一覧') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ route('brand.post.create') }}">
                    <span class="nav-link-inner--text"><i class="fas fa-pencil-alt"></i>{{ __('ポストの作成') }}</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth('brand')->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('ハローキトトへようこそ!') }}</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('brand.logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('ログアウト') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
