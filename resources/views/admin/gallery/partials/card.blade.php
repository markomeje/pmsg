<div class="rounded position-relative">
    <div class="position-absolute w-100 p-4" style="z-index: 2;">
        <div class="row">
            <div class="col-6">
                <a class="btn btn-info text-center cursor-pointer upload-image-{{ $gallery->id }}" data-id="{{ $gallery->id }}">
                    <small class="text-white">
                        <i class="icofont-camera"></i>
                    </small>
                </a>
            </div>
            <div class="col-6">
                <a class="btn btn-danger text-white text-center w-100 d-flex align-items-center justify-content-center text-center cursor-pointer delete-image-button-{{ $gallery->id }} delete-image-{{ $gallery->id }}" data-url="{{ route('admin.image.delete', ['id' => $gallery->id, 'type' => 'gallery']) }}" data-message="Are you sure to delete image?">
                    <img src="/images/spinner.svg" class="mr-2 d-none delete-image-spinner-{{ $gallery->id }}">
                    <small class="text-white">
                        <i class="icofont-trash"></i>
                    </small>
                </a>
            </div>
        </div>    
    </div>
    <div class="image-loader-{{ $gallery->id }} bg-main-dark text-center d-none position-absolute rounded-circle border" data-id="{{ $gallery->id }}" style="top: 40%; left: 50%; z-index: 2; width: 50px; height: 50px; background-color: rgba(0, 0, 0, 0.75);">
        <div class="position-relative" style="top: 10px;">
            <img src="/images/spinner.svg">
        </div>
    </div>
    <div class="position-relative">
        <form action="javascript:;">
            @csrf
            <input type="file" name="image" accept="image/*" class="image-input-{{ $gallery->id }}" data-url="{{ route('admin.image.upload', ['model_id' => null, 'type' => 'gallery', 'id' => $gallery->id]) }}" style="display: none;">
        </form>
        <a href="javascript:;" style="height: 280px;" class="d-block">
            <img src="{{ $gallery->url }}" class="img-fluid image-preview-{{ $gallery->id }} h-100 w-100 border object-cover">
        </a>
    </div>
</div>