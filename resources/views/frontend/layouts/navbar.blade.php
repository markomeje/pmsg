<div class="fixed-top">
    <div class="frontend-navbar-wrapper position-relative">
        <div class="container">
            <div class="py-4 px-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo-wrapper">
                    {{-- <img src="/images/assets/logo.png" class="img-fluid object-cover" alt="{{ config('app.name') }}"> --}}
                    PMSG Logo
                </a>
                <div class="d-flex">
                    <a href="" class="text-white">Login</a>
                </div>
            </div>
            <div class="bg-white d-flex justify-content-between align-items-center w-100" style="height: 80px; line-height: 80px;">
                <div class="d-flex w-50 px-4">
                    <a href="{{ route('home') }}" class="text-theme-color mr-3">Home</a>
                    <a href="{{ route('news') }}" class="text-theme-color mr-3">News</a>
                </div>
                <div class="d-flex align-items-center w-50 position-relative bg-light-green px-4 h-100">
                    <div class="text-danger w-100 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <a href="" class="text-white"></a>
                        </div>
                        <div class="text-white">
                            <i class="icofont-navigation-menu"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   	</div>
</div>