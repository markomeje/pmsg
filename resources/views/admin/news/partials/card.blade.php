<div class="card shadow-sm border-theme-color">
    <div class="card-img p-4 position-relative">
        @if(empty($info->image))
            <a href="{{ route('admin.news.edit', ['id' => $info->id]) }}" style="height: 140px;" class="d-block">
                <img src="/images/holder.png" class="img-fluid h-100 w-100 object-cover rounded shadow-sm border-theme-color">
            </a>
        @else
            <a href="{{ route('admin.news.edit', ['id' => $info->id]) }}" style="height: 140px;" class="d-block">
                <img src="{{ $info->image->url }}" class="img-fluid h-100 w-100 object-cover rounded shadow-sm border-theme-color">
            </a>
        @endif
    </div>
    <div class="card-body border-top">
        <div class="pb-3 mb-3 border-bottom d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.news.edit', ['id' => $info->id]) }}" class="text-underline">
                {{ \Str::limit(strip_tags($info->title), 10) }}
            </a>
            <?php $published = $info->published; ?>
            <div class="dropdown">
                <a href="javascript:;" class="rounded-circle d-block bg-{{ $published ? 'success' : 'danger' }} text-center" id="status-{{ $info->id }}" data-toggle="dropdown" style="width: 26px; height: 26px; line-height: 22px;">
                    <small class="text-white tiny-font position-relative">
                        <i class="icofont-{{ $published ? 'tick-mark' : 'close' }}"></i>
                    </small>
                </a>
                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="status-{{ $info->id }}">
                    <form method="post" class="p-4 w-100 update-news-status-form" action="javascript:;" style="width: 210px !important;" data-action="{{ route('admin.news.status.update', ['id' => $info->id]) }}">
                        <div class="form-group">
                            <label class="form-label text-muted">Published?</label>
                            <select class="custom-select form-control status" name="status">
                                <?php $status = \App\Models\News::STATUS; ?>
                                @empty($status)
                                    <option value="">No Status</option>
                                @else
                                    <option value="">Select option</option>
                                    @foreach ($status as $key => $value)
                                        <option value="{{ (boolean)$value }}" {{ (boolean)$published == (boolean)$value ? 'selected' : '' }}>
                                            {{ ucfirst($key) }}
                                        </option>
                                    @endforeach
                                @endempty
                            </select>
                            <small class="invalid-feedback status-error"></small>
                        </div>
                        <div class="alert mb-3 tiny-font update-news-status-message d-none"></div>
                        <div class="d-flex justify-content-right mb-3 mt-1">
                            <button type="submit" class="btn bg-theme-color text-white px-4 py-2 btn-block update-news-status-button">
                                <img src="/images/spinner.svg" class="mr-2 d-none update-news-status-spinner mb-1">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-main-dark">
                {{ number_format($info->reads ?? 0) }} reads
            </small>
            <a href="{{ route('admin.blogs', ['category' => \Str::slug(strtolower($info->category))]) }}" class="text-main-dark text-underline">
                {{ ucwords(\Str::limit($info->category, 10) ?? 'Nill') }}
            </a>
        </div>
    </div>
    <div class="card-footer bg-theme-color d-flex justify-content-between">
        <small class="text-white">
            {{ $info->created_at->diffForHumans() }}
        </small>
        <div class="d-flex">
            <small class="mr-2">
                <a href="{{ route('admin.news.edit', ['id' => $info->id]) }}" class=" text-warning">
                    <i class="icofont-edit"></i>
                </a>
            </small>
            <small class="text-danger cursor-pointer delete-news" data-url="{{ route('admin.news.delete', ['id' => $info->id]) }}" data-message="Are you sure to delete news?">
                <i class="icofont-trash"></i>
            </small>
        </div>
    </div>
</div>