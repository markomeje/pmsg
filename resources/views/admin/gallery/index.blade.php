@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="alert alert-info d-flex mb-4 align-items-center justify-content-between mb-4">
                        <div class="text-theme-color">
                            +{{ $images->total() }} Pictures
                        </div>
                    </div>
                    <div class="position-relative mb-4">
                        <div class="position-absolute bg-theme-color rounded-circle upload-image" data-id="gallery-upload" style="z-index: 2; top: 32px; right: 50px;">
                            <div class="bg-primary border cursor-pointer rounded-circle text-center" style="width: 35px; height: 35px; line-height: 32.5px;">
                                <small class="position-relative text-white">
                                    <i class="icofont-camera"></i>
                                </small>
                            </div>
                        </div>
                        <div class="image-loader bg-main-dark text-center d-none position-absolute rounded-circle border" data-id="gallery-upload" style="top: 40%; left: 50%; z-index: 2; width: 50px; height: 50px; background-color: rgba(0, 0, 0, 0.75);">
                            <div class="position-relative" style="top: 10px;">
                                <img src="/images/spinner.svg">
                            </div>
                        </div>
                        <div class="card border-theme-color m-0">
                            <div class="card-header">
                                <div class="text-theme-color">Upload image</div>
                            </div>
                            <div class="card-body p-0 m-0">
                                <div class="position-relative">
                                    <form action="javascript:;">
                                        @csrf
                                        <input type="file" name="image" accept="image/*" class="image-input" data-url="{{ route('admin.image.upload', ['model_id' => null, 'type' => 'gallery']) }}" style="display: none;">
                                    </form>
                                    <a href="javascript:;" style="height: 280px;" class="d-block mb-4">
                                        <img src="/images/holder.png" class="img-fluid image-preview h-100 w-100 object-cover">
                                    </a>
                                </div>  
                            </div>
                        </div>     
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-block">
                        @if(empty($images->count()))
                            <div class="alert-info alert mb-4">No images yet</div>
                        @else
                            <div class="alert-info alert mb-4">Uploaded images</div>
                            <div class="row">
                                @foreach($images as $gallery)
                                    <div class="col-12 col-md-4 col-lg-6 mb-4">
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
    </div>
</div>
@include('layouts.footer')    