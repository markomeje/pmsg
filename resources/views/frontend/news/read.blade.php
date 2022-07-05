@include('layouts.header')
    <div class="bg-light">
        @include('frontend.layouts.navbar')
        <div class="position-relative" style="padding: 10rem 0 4rem">
            <div class="container">
                @if(empty($info))
                    <div class="alert alert-danger mb-4">The requested news was not found.</div>
                    <?php $news = \App\Models\News::published()->latest('created_at')->paginate(6); ?>
                    @if(!empty($news))
                        <h1 class="text-theme-color m-0">Read other News</h1>
                        <div class="row" style="margin-top: 5rem;">
                            @foreach($news as $info)
                                <div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 5rem;">
                                    @include('frontend.news.partials.card')
                                </div>
                            @endforeach
                        </div>
                        <div class="position-relative" style="top: -3rem">
                            {{ $news->links('vendor.pagination.default') }}
                        </div>
                    @endif
                @else
                    <?php $id = $info->id; ?>
                    <div class="row">
                        <div class="col-12 col-lg-8 mb-4">
                            <h1 class="mb-4 text-theme-color">
                                {{ ucfirst($info->title) }}
                            </h1>
                            <div class="mb-4 shadow-sm rounded" style="">
                                <img src="{{ empty($info->image->url) ? '/images/news.jpg' : $info->image->url }}" class="w-100 img-fluid h-100 rounded border-theme-color">
                            </div>
                            <div class="text-theme-color">
                                {!! $info->description !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <?php $news = \App\Models\News::published()->where(['category' => $info->category])->inRandomOrder()->take(4)->get(); ?>
                            <div class="bg-theme-color d-block text-white p-4" >Related News</div>
                            @if(empty($news))
                                <div class="alert alert-danger">No related news</div>
                            @else
                                <div class="row" style="margin-top: 5rem;">
                                    @foreach($news as $info)
                                        @if($info->id !== $id)
                                            <div class="col-12 col-md-4 col-lg-12" style="margin-bottom: 5rem;">
                                                @include('frontend.news.partials.card')
                                            </div>
                                        @endif
                                    @endforeach
                                </div> 
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @include('frontend.layouts.bottom')
    </div>
@include('layouts.footer')