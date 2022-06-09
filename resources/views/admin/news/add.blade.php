@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 mb-4">
                    <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">Add News</div>
                    <div class="bg-white p-4 shadow-sm">
                        <form method="post" action="javascript:;" class="add-news-form mb-2" data-action="{{ route('admin.news.add'); }}" autocomplete="off">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label class="form-label text-muted">Title</label>
                                    <input type="text" name="title" class="form-control title" placeholder="e.g., The times are going on down road">
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
                                                <option value="{{ $category }}">
                                                    {{ ucwords($category) }}
                                                </option>
                                            @endforeach
                                        @endempty
                                    </select>
                                    <small class="invalid-feedback category-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label text-muted">Publish now?</label>
                                    <select class="custom-select form-control istatus" name="status">
                                        <?php $status = \App\Models\News::STATUS; ?>
                                        @empty($status)
                                            <option>No Status</option>
                                        @else
                                            @foreach ($status as $key => $value)
                                                <option value="{{ (boolean)$value }}">
                                                    {{ ucfirst($key) }}
                                                </option>
                                            @endforeach
                                        @endempty
                                    </select>
                                    <small class="invalid-feedback status-error"></small>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-muted">Description</label>
                                <textarea class="form-control description" name="description" rows="4" placeholder="Add blog description" id="description"></textarea>
                                <small class="invalid-feedback description-error"></small>
                            </div>
                            <div class="alert mb-3 add-news-message d-none"></div>
                            <button type="submit" class="btn bg-theme-color text-white add-news-button mt-3 px-5 py-3">
                                <img src="/images/spinner.svg" class="mr-2 d-none add-news-spinner mb-1">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="alert alert-info mb-4">Recent News</div>
                    <div class="rows">
                        <?php $news = \App\Models\News::latest('created_at')->take(3)->get(); ?>
                        @if(empty($news->count()))
                            <div class="alert alert-danger mb-4">No Recent News</div>
                        @else
                            <div class="row">
                                @foreach($news as $info)
                                    <div class="col-12 col-md-4 col-lg-12 mb-4">
                                        @include('admin.news.partials.card')
                                    </div>
                                @endforeach
                            </div> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    