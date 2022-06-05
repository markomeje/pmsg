@include('layouts.header')
    <div class="">
        @include('frontend.layouts.navbar')
        <div class="home-banner position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="d-flex justify-content-between mb-4" style="width: 140px">
                            <div class="bg-white text-theme-color w-50 px-3 py-2" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                                <span class="ml-1">PDP</span>
                            </div>
                            <div class="bg-light-green text-white w-50 px-3 py-2" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
                                <span class="">2023</span>
                            </div>
                        </div>
                        <h1 class="text-light-green mb-4 font-weight-bolder">Support Dr. Peter Mbah For <span class="text-white">Governor</span> Enugu State.</h1>
                        <div class="text-white mb-4">The fortune of a society changes when its best heads are put forward in leadership. Tommorrow is here. Togetther we can. Let's give all our support for good.</div>
                        <a class="btn btn-lg bg-light-green px-5 py-3 text-white">Support Now</a>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="">
                            {{-- <img src="/images/pmg.jpg" class="img-fluid w-100"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="" style="padding: 10rem 0;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="">
                            <img src="/images/pvc.jpeg" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div>
                            <h1 class="text-light-green mb-4">Peter Mbah and The Stones.</h1>
                            <div class="text-theme-color mb-4">. . . Peter Mbah is open and willing to extend a hand of fellowship to everyone, I mean everyone including those that think themselves enemies. Let us rise, Let us drop our stones Let us come together Let us build a bigger, and better Enugu Let us support Barr. Peter Mbah.</div>
                            <a class="btn btn-lg bg-light-green px-5 py-3 text-white mb-4">Read More</a>
                            <div class="text-muted">
                                <div><em>By</em> Dr. Chukwuemeka Aroh (MNIPR)</div>
                                <div class="">Politician,Political and Public Relations Analyst </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('frontend.layouts.navbar')
    </div>
@include('layouts.footer')