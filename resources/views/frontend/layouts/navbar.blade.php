<div class="fixed-top bg-white border-bottom">
    <div class="">
        <div class="container">
            <div class="navbar-items py-2 px-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo-wrapper">
                    <img src="/images/logo.png" class="img-fluid object-cover" alt="{{ config('app.name') }}">
                </a>
                <div class="d-flex align-items-center">
                    <ul class="navbar-links d-flex align-items-center">
                        <li class="">
                            <a href="{{ route('home') }}" class="text-decoration-none text-theme-color">Home</a>
                        </li>
                        <li class="ml-3">
                            <a href="{{ '' }}" class="text-decoration-none text-theme-color">News</a>
                        </li>
                    </ul>
                    <div class="navbar-auth">
                        @if(auth()->check())
                            <div class="dropdown cursor-pointer ml-3">
                                <div class="text-center rounded-circle" id="website-user-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 24" style="width: 28px; height: 28px; line-height: 28px;">
                                    @if(empty(auth()->user()->profile->image))
                                        <div class="text-white tiny-font rounded-circle bg-theme-color w-100 h-100">
                                            @if(empty(auth()->user()->name))
                                                <i class="icofont-ui-user"></i>
                                            @else
                                                {{ ucfirst(substr(auth()->user()->name, 0, 1)) }}
                                            @endif
                                        </div>
                                    @else
                                        <div class="position-relative border w-100 h-100 d-block rounded-circle">
                                            <img src="{{ auth()->user()->profile->image->link }}" class="img-fluid w-100 h-100 object-cover rounded-circle">
                                        </div>
                                    @endif
                                </div>
                                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="website-user-icon">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <small class="text-theme-color mr-1">
                                          <i class="icofont-login"></i>
                                        </small>
                                        <small class="text-theme-color">Admin</small>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <small class="text-theme-color mr-1">
                                          <i class="icofont-ui-play"></i>
                                        </small>
                                        <small class="text-theme-color">Logout</small>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="d-flex desktop-signlog align-items-center">
                                <a href="{{ route('login') }}" class="btn btn-md bg-light-green px-4 ml-3 text-white">Login</a>
                            </div>
                        @endif
                    </div>
                    <div class="hanburger-icon ml-3 position-relative justify-content-center m-0 p-0 align-items-center cursor-pointer">
                        <div class="icon-lines"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
{{-- <div class="navbar-menu no-gutters bg-white position-fixed vh-100">
    <div class="menu-content vh-100 pb-4">
        <div class="px-3 py-4">
            <a href="{{ route('home') }}" class="d-block bg-main-ash text-decoration-none text-theme-color px-3 py-3 icon-raduis mb-3">Home</a>
            <a href="{{ route('news') }}" class="d-block bg-main-ash text-decoration-none text-theme-color px-3 py-3 icon-raduis mb-3">News</a>
            @if(!auth()->check())
                <a href="{{ route('login') }}" class="d-block bg-theme-color text-decoration-none px-3 py-3 icon-raduis mb-3">
                    <small class="text-white">Login</small>
                </a>
            @endif 
        </div> 
    </div>
</div> --}}