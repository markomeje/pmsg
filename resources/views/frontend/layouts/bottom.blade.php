<section class="bg-theme-color" style="padding: 10rem 0;">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 mb-4">
				<a href="{{ route('home') }}" class="logo-wrapper d-block mb-4">
                    <img src="/images/logo.png" class="img-fluid" alt="{{ config('app.name') }}">
                </a>
				{{-- <div class="text-white mb-4"></div> --}}
				<a href="{{ route('support') }}" class="btn btn-lg bg-light-green px-5 py-3 text-white">Support Now</a>
			</div>
			<div class="col-12 col-md-6 col-lg-4 mb-4">
				<h3 class="text-light-green mb-4">Quick Links</h3>
				<a href="{{ route('home') }}" class="d-block pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">Home</a>
				<a href="{{ route('news') }}" class="d-block pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">News</a>
				<a href="{{ route('news') }}" class="d-block pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">Blog</a>
			</div>
			<div class="col-12 col-md-6 col-lg-4 mb-4">
				<h3 class="text-light-green mb-4">Social Connect</h3>
				<div class="">
					<div class="text-white mb-4">To stay informed, connect with us via our social handles</div>
					<div class="d-flex align-items-center justify-content-around p-4 bg-light-green">
						<a href="" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;">
							<i class="icofont-facebook"></i>
						</a>
						<a href="" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;">
							<i class="icofont-instagram"></i>
						</a>
						<a href="" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;">
							<i class="icofont-twitter"></i>
						</a>
						<a href="" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;">
							<i class="icofont-whatsapp"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>