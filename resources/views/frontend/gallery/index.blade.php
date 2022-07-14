@include('layouts.header')
    <div class="">
        @include('frontend.layouts.navbar')
        <section class="bg-light" style="padding: 10rem 0 8rem;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h1 class="text-theme-color mb-4">Our Gallery</h1>
                        @if(empty($gallery->count()))
                            <div class="alert alert-info m-0">No available images</div>
                        @else
                            <div class="row">
                                @foreach($gallery as $image)
                                    <div class="col-12 col-md-6 col-lg-6 mb-4">
                                        @include('frontend.gallery.partials.card')
                                    </div>
                                @endforeach
                            </div>
                            {{ $gallery->links('vendor.pagination.default') }}
                        @endif
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="alert alert-info mb-4">Our Rally Videos</div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12 mb-4">
                                <div class="p-3 text-center bg-theme-color">
                                    {{-- <iframe src="/videos/long.mp4" allowFullScreen style="max-width: 320px; outline: none;"></iframe> --}}
                                    <video preload="metadata" autoplay loop controls class="w-100" style="max-width: 320px; outline: none;">
                                        <source src="/videos/long.mp4" type="video/mp4">
                                        <source src="/videos/long.ogg" type="video/ogg">
                                        Your browser does not support the video element. Kindly update it to latest version.
                                    </video>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 mb-4">
                                <div class="p-3 text-center bg-theme-color">
                                    <video preload="metadata" autoplay loop controls class="w-100" style="max-width: 320px; outline: none;">
                                        <source src="/videos/short.mp4" type="video/mp4">
                                        <source src="/videos/short.ogg" type="video/ogg">
                                        Your browser does not support the video element. Kindly update it to latest version.
                                    </video>
                                </div>
                            </div>
                        </div>      
                    </div>
                </div>      
            </div>
        </section>
        @include('frontend.layouts.bottom')
    </div>
@include('layouts.footer')