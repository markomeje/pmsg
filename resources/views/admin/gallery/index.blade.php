@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="alert alert-info d-flex m-0 align-items-center justify-content-between">
                        <div class="text-theme-color">
                            +{{ $images->total() }} Pictures
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="alert alert-info d-flex align-items-center justify-content-between m-0">
                        <a target="_blank" href="{{ route('gallery') }}" class="text-theme-color">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="mb-4">
                    <?php $max = 10; ?>
                    <div class="alert alert-warning mb-0">
                        <i class="icofont-info-circle"></i>
                        <span>You can only upload maximum of ({{ $max }}) image(s) at a time.</span>
                    </div>
                    <input type="file" class="filepond" name="images[]" accept="image/png, image/jpeg, image/gif" multiple max="{{ $max }}" data-url="{{ route('admin.multiple.images.upload', ['model_id' => null, 'type' => 'gallery']) }}">
                </div>
                @if(empty($images->count()))
                    <div class="alert-info alert mb-4">No images yet</div>
                @else
                    <div class="row">
                        @foreach($images as $gallery)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                @include('admin.gallery.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $images->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    