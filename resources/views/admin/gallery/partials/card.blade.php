<div class="rounded position-relative">
	<div class="position-absolute bg-theme-color rounded-circle upload-image-{{ $gallery->id }}" data-id="{{ $gallery->id }}" style="z-index: 2; bottom: 20px; right: 20px;">
        <div class="bg-success border rounded-circle text-center cursor-pointer" style="width: 35px; height: 35px; line-height: 32.5px;">
            <small class="position-relative text-white">
                <i class="icofont-camera"></i>
            </small>
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