@include('layouts.header')
    <div class="">
        @include('frontend.layouts.navbar')
        <div class="news-banner position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-4">
                        <h1 class="text-white">Latest News</h1>
                    </div>
                </div>
            </div>
        </div>
        <section style="padding: 8rem 0 6rem">
            <div class="container">
                @if(empty($news->count()))
                    <div class="alert alert-info m-0">No available news</div>
                @else
                    <div class="row">
                        @foreach($news as $info)
                            <div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 5rem;">
                                @include('frontend.news.partials.card')
                            </div>
                        @endforeach
                    </div>
                    <div class="position-relative" style="top: -3rem">
                        {{ $news->links('vendor.pagination.default') }}
                    </div>
                @endif
            </div>
        </section>
        @include('frontend.layouts.bottom')
    </div>
@include('layouts.footer')