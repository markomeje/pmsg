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
                    <?php $links = ['supporters' => ['text' => 'Our Supporters', 'icon' => 'web', 'count' => \App\Models\Supporter::count()], 'users' => ['text' => 'Admin Users', 'icon' => 'web', 'count' => \App\Models\User::count()], 'blogs' => ['text' => 'Blog Posts', 'icon' => 'web', 'count' => \App\Models\Post::count()], 'new' => ['text' => 'All News.', 'icon' => 'web', 'count' => \App\Models\News::count()]]; ?>
                    <div class="row">
                        @if(empty($links))
                            <div class="alert alert-danger w-100">Dashboard links not found.</div>
                        @else
                            @foreach($links as $link => $value)
                                <div class="col-12 col-md-4 col-lg-4 mb-4">
                                    <div class="card bg-white shadow-sm border-theme-color" style="border-raduis: 50px !important;">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div class="">
                                                <h3 class="m-0 text-theme-color">
                                                    {{ $value['count'] ?? 0 }}
                                                </h3>
                                                <a href="{{ '' }}" class="font-weight-bold mb-3">
                                                    <small class="text-theme-color">
                                                        {{ $value['text'] }}
                                                    </small>
                                                </a>
                                            </div>
                                            <div class="bg-theme-color mb-3 rounded-circle text-center" style="width: 55px; height: 55px; line-height: 55px;">
                                                <small class="text-white">
                                                    <i class="icofont-{{ $value['icon'] }}"></i>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="bg-theme-color text-white p-3 mb-4">New Supporters</div>
                    <div class="bg-white p-3 pt-4 border border-light">
                        <?php $supporters =  \App\Models\Supporter::latest()->take(4)->get(); ?>
                        @if($supporters->count() <= 0)
                            <div class="alert alert-danger">No recent supporters</div>
                        @else
                        <div class="row">
                            @foreach($supporters as $supporter)
                                <div class="col-12 col-md-4 col-lg-12">
                                    <div class="p-3 bg-white mb-4 shadow-sm border-theme-color d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2">
                                                <div class="text-center text-main-dark border rounded-circle" style="height: 35px; width: 35px; line-height: 35px; background-color: {{ randomrgba() }};">
                                                    {{ substr($supporter->firstname, 0, 1) }}
                                                </div>
                                            </div> 
                                            <div class="">
                                                <a href="{{ '' }}">
                                                    <small class="text-main-dark d-block">
                                                        {{ \Str::limit($supporter->firstname, 12) }}
                                                    </small>
                                                </a> 
                                                <small class="text-muted tiny-font">
                                                    {{ ucwords($supporter->created_at->diffForHumans()) }}
                                                </small>
                                            </div>
                                        </div> 
                                        <div class="rounded-circle bg-success text-center" style="height: 20px; width: 20px; line-height: 20px;">
                                            <small class="text-white">
                                                <i class="icofont-tick-mark"></i>
                                            </small>
                                        </div>
                                    </div>
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