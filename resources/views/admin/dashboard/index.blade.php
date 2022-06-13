@include('layouts.header')
<div class="min-vh-100 bg-light">
    @include('admin.layouts.navbar')
    <div class="pb-4" style="padding: 6rem 0 2rem">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <p class="m-0 text-main-dark">Welcome.</p>
                <div class="text-info">
                    Today's {{ date("F j, Y") }}
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9">
                    <?php 
                        $links = [
                            'supporters' => ['text' => 'Our Supporters', 'icon' => 'web', 'count' => \App\Models\Supporter::count()], 
                            'blogs' => ['text' => 'Blog Posts', 'icon' => 'web', 'count' => \App\Models\Post::count()], 
                            'news' => ['text' => 'All News.', 'icon' => 'web', 'count' => \App\Models\News::count()]
                        ]; 
                    ?>
                    <div class="row">
                        @if(empty($links))
                            <div class="alert alert-danger w-100">Dashboard links not found.</div>
                        @else
                            @foreach($links as $link => $value)
                                <div class="col-12 col-md-4 col-lg-4 mb-4">
                                    <div class="card bg-white border-0 shadow">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div class="">
                                                <h3 class="m-0 text-theme-color">
                                                    {{ $value['count'] ?? 0 }}
                                                </h3>
                                                <a href="{{ route("admin.{$link}") }}" class="font-weight-bold text-theme-color mb-3">
                                                    {{ ucfirst($link) }}
                                                </a>
                                            </div>
                                            <div class="bg-theme-color mb-3 rounded-circle text-center" style="width: 45px; height: 45px; line-height: 45px;">
                                                <small class="text-light-green">
                                                    <i class="icofont-{{ $value['icon'] }}"></i>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-theme-color">
                                            <a href="{{ route("admin.{$link}") }}" class="text-decoration-none text-light-green">
                                                <i class="icofont-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="">
                        <div class="alert alert-info mb-4 d-flex align-content-center justify-content-between">
                            <div>Recent News</div>
                            <a href="{{ route('admin.news') }}" class="">View all</a>
                        </div>
                        <?php $news = \App\Models\News::latest('created_at')->take(6)->get(); ?>
                        @if($news->count() > 0)
                            <div class="row">
                                @foreach($news as $info)
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        @include('admin.news.partials.card')
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info w-100">No Recent News</div>
                        @endif
                    </div>
                        
                </div>
                <div class="col-12 col-lg-3">
                    <div class="bg-theme-color text-white p-4 mb-4">New Supporters</div>
                    <div class="">
                        <?php $supporters =  \App\Models\Supporter::latest()->take(4)->get(); ?>
                        @if($supporters->count() <= 0)
                            <div class="alert alert-danger">No recent supporters</div>
                        @else
                        <div class="row">
                            @foreach($supporters as $supporter)
                                <div class="col-12 col-md-6 col-lg-12 mb-4">
                                    @include('admin.supporters.partials.card')
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