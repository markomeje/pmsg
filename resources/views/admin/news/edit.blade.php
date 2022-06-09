@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="container-fluid">
                @if(empty($news))
                    <div class="alert alert-danger d-flex align-items-center justify-content-between mb-4">News Not Found</div>
                @else
                    <?php $id = $news->id; ?>
                    <div class="row">
                        <div class="col-12 col-lg-9 mb-4">
                            <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
                                <a href="{{ route('admin.news') }}" class="text-decoration-none">
                                    All News
                                </a>
                                <a href="{{ route('admin.news.add') }}" class="text-decoration-none">
                                    <i class="icofont-plus"></i>
                                </a>
                            </div>
                            <div class="position-relative">
                                <div class="d-flex position-absolute upload-image" data-id="{{ $news->id }}" style="bottom: 35px; right: 50px; z-index: 2;">
                                    <div class="cursor-pointer text-white bg-main-dark md-circle text-center rounded-circle">
                                        <small class="position-relative" style="top: 2px;">
                                            <i class="icofont-camera"></i>
                                        </small>
                                    </div>
                                </div>
                                <div class="image-loader bg-main-dark lg-circle text-center d-none position-absolute rounded-circle border" data-id="{{ $news->id }}" style="top: 40%; left: 50%; z-index: 2;">
                                    <div class="position-relative" style="top: 5px;">
                                        <img src="/images/spinner.svg">
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body p-4">
                                        @if(empty($news->image))
                                            <form action="javascript:;">
                                                <input type="file" name="image" accept="image/*" class="image-input" data-url="{{ route('admin.image.upload', ['model_id' => $news->id, 'type' => 'news', 'public_id' => '']) }}" style="display: none;">
                                            </form>
                                            <a href="{{ route('admin.news.edit', ['id' => $news->id]) }}" style="height: 280px;" class="d-block mb-4">
                                                <img src="/images/banner.jpg" class="img-fluid image-preview h-100 w-100 object-cover border">
                                            </a>
                                        @else
                                            <?php $image = $news->image; ?>
                                            <form action="javascript:;">
                                                <input type="file" name="image" accept="image/*" class="image-input" data-url="{{ route('admin.image.upload', ['model_id' => $image->model_id, 'type' => $image->type, 'public_id' => $image->public_id]) }}" style="display: none;">
                                            </form>
                                            <a href="{{ $news->image->url }}" style="height: 280px;" class="d-block mb-4">
                                                <img src="{{ $news->image->url }}" class="img-fluid image-preview h-100 w-100 object-cover border">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="alert alert-info mb-4">Edit News.</div>
                            <div class="bg-white p-4 card-raduis shadow-sm">
                                <form method="post" action="javascript:;" class="edit-new-form" data-action="{{ route('admin.news.edit', ['id' => $news->id]) }}" autocomplete="off">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="form-label text-muted">Title</label>
                                            <input type="text" name="title" class="form-control title" placeholder="e.g., How to buy a home" value="{{ $news->title ?? '' }}">
                                            <small class="invalid-feedback title-error"></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label text-muted">Category</label>
                                            <select class="custom-select form-control category" name="category">
                                                <option value="">Select Category</option>
                                                <?php $categories = \App\Models\News::CATEGORIES; ?>
                                                @if(empty($categories))
                                                    <option value="">No Categories</option>
                                                @else
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category }}" {{ $category == $news->category ? 'selected' : '' }}>
                                                            {{ ucwords($category) }}
                                                        </option>
                                                    @endforeach
                                                @endempty
                                            </select>
                                            <small class="invalid-feedback category-error"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label text-muted">Publish Now?</label>
                                            <select class="custom-select form-control status" name="status">
                                                <?php $status = \App\Models\News::STATUS; ?>
                                                @empty($status)
                                                    <option value="">No Status</option>
                                                @else
                                                    @foreach ($status as $key => $value)
                                                        <option value="{{ (boolean)$value }}" {{ $news->status == (boolean)$value ? 'selected' : '' }}>
                                                            {{ ucfirst($key) }}
                                                        </option>
                                                    @endforeach
                                                @endempty
                                            </select>
                                            <small class="invalid-feedback status-error"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted">Description</label>
                                        <textarea class="form-control description new-description-{{ $news->id }}" name="description" rows="4" placeholder="Add book description." id="description">{{ $news->description ?? '' }}</textarea>
                                        <small class="invalid-feedback description-error"></small>
                                    </div>
                                    <div class="alert mb-3 edit-new-message d-none"></div>
                                    <button type="submit" class="btn bg-theme-color text-white edit-new-button mt-1 px-5 py-3">
                                        <img src="/images/spinner.svg" class="mr-2 d-none edit-new-spinner mb-1">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">Recent news</div>
                            <div class="rows">
                                <?php $news = \App\Models\News::latest('created_at')->take(3)->get(); ?>
                                @if(empty($news->count()))
                                    <div class="alert alert-danger mb-4">No Recent news</div>
                                @else
                                    <div class="row">
                                        @foreach($news as $info)
                                            @if($info->id !== $id)
                                                <div class="col-12 col-md-4 col-lg-12 mb-4">
                                                    @include('admin.news.partials.card')
                                                </div>
                                            @endif
                                        @endforeach
                                    </div> 
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    