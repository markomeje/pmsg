<div class="fixed-top bg-white" style="border-bottom: 20px solid var(--theme-color);">
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
                            <a href="{{ route('news') }}" class="text-decoration-none text-theme-color">News</a>
                        </li>
                        <li class="ml-3">
                            <a href="{{ route('support') }}" class="btn btn-md bg-light-green px-4 text-white">Support</a>
                        </li>
                    </ul>
                    <div class="hanburger-icon ml-3 position-relative justify-content-center m-0 p-0 align-items-center cursor-pointer">
                        <div class="icon-lines"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="navbar-menu no-gutters bg-white position-fixed vh-100">
    <div class="menu-content vh-100 pb-4">
        <div class="px-3 py-4">
            <a href="{{ route('home') }}" class="d-block text-white text-decoration-none text-theme-color px-3 py-3 border bg-theme-color mb-3">Home</a>
            <a href="{{ route('news') }}" class="d-block text-white text-decoration-none text-theme-color px-3 py-3 border bg-theme-color mb-3">News</a>
            <a href="{{ route('support') }}" class="d-block text-white text-decoration-none text-theme-color px-3 py-3 border bg-theme-color mb-3">Support</a>
        </div> 
    </div>
</div>