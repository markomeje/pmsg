<div class="card border-theme-color shadow-sm position-relative">
	<a href="{{ route('news.read', ['id' => $info->id, 'slug' => \Str::slug(strtolower($info->title))]) }}" class="card-img d-block position-relative px-4" style="top: -50px; height: 280px;">
		<img src="{{ empty($info->image->url) ? '/images/news.jpg' : $info->image->url }}" class="img-fluid object-cover w-100 h-100 bg-theme-color rounded shadow">
	</a>
	<div class="card-body position-relative px-4 m-0 py-0" style="top: -24px;">
		<h5 class="mb-3">
			<a href="{{ route('news.read', ['id' => $info->id, 'slug' => \Str::slug(strtolower($info->title))]) }}" class="text-underline text-theme-color">
				{{ \Str::limit(ucfirst($info->title), 44) }}
			</a>
		</h5>
		<a href="{{ route('news.read', ['id' => $info->id, 'slug' => \Str::slug(strtolower($info->title))]) }}" class="d-block text-underline text-theme-color">
			{{ \Str::limit(ucfirst(strip_tags($info->description)), 60) }}
		</a>
	</div>
	<div class="card-footer bg-theme-color d-flex justify-content-between align-items-center">
		<small class="text-white">
			Posted {{ $info->created_at->diffForHumans() }}
		</small>
		<a href="{{ route('news.read', ['id' => $info->id, 'slug' => \Str::slug(strtolower($info->title))]) }}" class="text-light-green">
			<i class="icofont-long-arrow-right"></i>
		</a>
	</div>
</div>