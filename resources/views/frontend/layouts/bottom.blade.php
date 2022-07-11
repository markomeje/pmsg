<section class="bg-white" style="padding: 10rem 0; border-top: 20px solid var(--theme-color);">
	<div class="container">
		<?php $images = \App\Models\Image::where(['type' => 'gallery'])->inRandomOrder()->take(4)->get(); ?>
		@if(!empty($images))
			<div class="row mb-5">
				@foreach($images as $image)
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<a href="{{ $image->url }}" class="d-block" style="height: 280px;">
                            <img src="{{ $image->url }}" class="img-fluid shadow w-100 h-100 object-cover rounded">
                        </a>
					</div>
				@endforeach
			</div>
		@endif
		<div class="row">
			<div class="col-12 col-lg-4 mb-4">
				<a href="{{ route('home') }}" class="logo-wrapper d-block mb-4">
                    <img src="/images/logo.png" class="img-fluid" alt="{{ config('app.name') }}">
                </a>
				<div class="text-theme-color mb-4">Our mission is to build a solid support and put up a strong campaign to ensure that the PDP Enugu state flag bearer Peter Mba gets elected as governor.</div>
				<a href="{{ route('support') }}" class="btn btn-lg bg-light-green px-5 py-3 text-white">Support Now</a>
			</div>
			<div class="col-12 col-md-6 col-lg-4 mb-4">
				<h3 class="text-light-green mb-4">Quick Links</h3>
				<a href="{{ route('home') }}" class="d-block text-decoration-none text-theme-color pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">Home</a>
				<a href="{{ route('news') }}" class="d-block text-decoration-none text-theme-color pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">News</a>
				<a href="{{ route('support') }}" class="d-block text-decoration-none text-theme-color pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">Support</a>
				<a href="{{ route('gallery') }}" class="d-block text-decoration-none text-theme-color pb-3 mb-3" style="border-bottom: 1px solid var(--light-green)">Gallery</a>
			</div>
			<div class="col-12 col-md-6 col-lg-4 mb-4">
				<h3 class="text-light-green mb-4">Social Connect</h3>
				<div class="mb-4">
					<div class="text-theme-color mb-4">To stay informed, connect with us via our social handles</div>
					<div class="d-flex align-items-center justify-content-around p-4 bg-light-green">
						<a href="https://www.facebook.com/petermbahsupport/" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;" target="_blank">
							<i class="icofont-facebook"></i>
						</a>
						<a href="https://www.instagram.com/p/CegXdyqMvjU/?igshid=YmMyMTA2M2Y=" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;" target="_blank">
							<i class="icofont-instagram"></i>
						</a>
						<a href="https://twitter.com/PMSG2023/status/1532366562686128135?s=20&t=tDSFDuXB7EO2oXbpYJRy9g" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;" target="_blank">
							<i class="icofont-twitter"></i>
						</a>
						<a href="mailto:{{ env('OFFICIAL_EMAIL') }}" class="bg-white text-center rounded-circle text-theme-color mr-3" style="width: 40px; height: 40px; line-height: 40px;" target="_blank">
							<i class="icofont-email"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>