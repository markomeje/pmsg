@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex mb-4 align-items-center justify-content-between mb-4">
                        <div class="text-theme-color">
                            +{{ \App\Models\News::count() }} News
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex mb-4 align-items-center justify-content-between mb-4">
                        <a href="{{ route('admin.news.add') }}" class="text-decoration-none">
                            <i class="icofont-plus"></i>
                        </a>
                    </div>
                </div>
            </div>  
            <div class="d-block">
                @if(empty($news->count()))
                    <div class="alert-info alert">No news yet</div>
                @else
                    <div class="row">
                        @foreach($news as $info)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                @include('admin.news.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $news->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    