@include('layouts.header')
    <div class="">
        @include('frontend.layouts.navbar')
        <section class="bg-light" style="padding: 10rem 0 8rem;">
            <div class="container">
                <h1 class="text-theme-color mb-4">Our Gallery</h1>
                @if(empty($gallery->count()))
                    <div class="alert alert-info m-0">No available images</div>
                @else
                    <div class="row">
                        @foreach($gallery as $image)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                <a href="{{ $image->url }}" class="d-block" style="height: 280px;">
                                    <img src="{{ $image->url }}" class="img-fluid shadow w-100 h-100 object-cover rounded">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        @include('frontend.layouts.bottom')
    </div>
@include('layouts.footer')