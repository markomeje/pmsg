@include('layouts.header')
    <section class="login-wrapper position-relative" style="padding: 3rem 0 1rem">
        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-12 col-md-5 col-lg-4 mb-4">
                    <a href="{{ route('home') }}" class="logo-wrapper d-block mb-3">
                        <img src="/images/logo.png" class="img-fluid" alt="{{ config('app.name') }}">
                    </a>
                    <h3 class="text-theme-color mb-4">Login to continue.</h3>
                    <div class="text-white mb-4"></div>
                    <div class="mb-4 p-4 rounded" style="border: 1px solid var(--theme-color);">
                        <form action="javascript:;" method="post" class="login-form" data-action="{{ route('auth.login') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label class="text-main-dark">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control email" placeholder="Enter email or phone">
                                    </div>
                                    <small class="error email-error text-danger"></small>
                                </div>
                                <div class="form-group col-12">
                                    <label class="text-main-dark">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                    </div>
                                    <small class="error password-error text-danger"></small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg bg-light-green icon-raduis btn-block text-white login-button mb-4 mt-2">
                                <img src="/images/spinner.svg" class="mr-2 d-none login-spinner mb-1">
                                Login
                            </button>
                            <div class="alert px-3 login-message d-none mb-3"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('layouts.footer')