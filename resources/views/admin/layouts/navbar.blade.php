<div class="fixed-top bg-theme-color">
	<div class="py-4">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center">
					<div class="mr-3 cursor-pointer text-center">
				    	<a href="{{ route('admin') }}" class="text-decoration-none text-white">Dashboard</a>
				    </div>
				    <div class="mr-3 cursor-pointer text-center">
				    	<a href="{{ route('home') }}" class="text-decoration-none text-light-green" target="_blank">
				    		<i class="icofont-web"></i>
				    	</a>
				    </div>
				</div>
				<ul class="d-flex align-items-baseline">
				    <a href="{{ route('logout') }}" class="text-decoration-none text-center">
				    	<i class="icofont-power text-danger"></i>
				    </a>
				</ul>
			</div>
		</div>
	</div>
</div>

