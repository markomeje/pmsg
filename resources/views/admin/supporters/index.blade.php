@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex mb-4 align-items-center justify-content-between mb-4">
                        <div class="text-theme-color">
                            +{{ \App\Models\Supporter::count() }} supporters
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex mb-4 align-items-center justify-content-between mb-4">
                        <a href="javascript:;" class="text-decoration-none">
                            <i class="icofont-filter"></i>
                        </a>
                    </div>
                </div>
            </div>  
            <div class="d-block">
                @if(empty($supporters->count()))
                    <div class="alert-info alert">No supporters yet</div>
                @else
                    <div class="row">
                        @foreach($supporters as $supporter)
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                @include('admin.supporters.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $supporters->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    