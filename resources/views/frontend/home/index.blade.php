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
                        <a href="{{ route('support') }}" class="btn btn-lg bg-light-green px-5 py-3 text-white">Support Now</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="" style="padding: 10rem 0 8rem;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="p-4 position-relative" style="border: 1px solid var(--light-green)">
                            <div class="position-absolute" style="bottom: 0; left: 0;">
                                <div class="bg-light-green text-white p-4">
                                    Barr. Peter Mbah
                                </div>
                            </div>
                            <img src="/images/pmsg.webp" class="img-fluid w-100 h-100" style="border: 1px solid var(--light-green)">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <div>
                            <h1 class="text-light-green mb-4">Who is Peter Mbah?</h1>
                            <div class="text-theme-color mb-4">Peter Mbah hails from owo in Nkanu East Local Government of Enugu state. He is a very successful businessman who has built so many successful companies. He obtained his law degree from East London and also an accomplished financial analyst. As a lawyer he will take more than a cursory look at everything he does and compliment it with financial prudence.</div>
                            <a href="{{ route('profile') }}" class="btn btn-lg bg-light-green px-5 py-3 text-white mb-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-light" style="padding: 10rem 0 8rem;">
            <div class="container">
                <h1 class="text-theme-color mb-4">Recent News</h1>
                @if(empty($news->count()))
                    <div class="alert alert-info m-0">No available news</div>
                @else
                    <div class="row" style="margin-top: 4rem;">
                        @foreach($news as $info)
                            <div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 5rem;">
                                @include('frontend.news.partials.card')
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        @include('frontend.layouts.bottom')
    </div>
@include('layouts.footer')