<div class="container">
<div class="row slider">
	
<div id="slider-demo" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#slider-demo" data-slide-to="0" class="active"></li>
		<li data-target="#slider-demo" data-slide-to="1"></li>
		<li data-target="#slider-demo" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="{{asset('assets/img/slider1.jpg')}}"  alt="Slider 1">
			<div class="carousel-caption">
				<h3>Demo Slider</h3>
				<p>The slideshow below shows a generic plugin and component for cycling through elements like a carousel.</p>
			</div>
		</div>
		<div class="item">
			<img src="{{asset('assets/img/slider2.jpg')}}" alt="Slider"/>
		</div>
		<div class="item">
			<img src="{{asset('assets/img/slider3.jpg')}}" alt="Slider"/>
		</div>
	</div>
	<!-- Controls -->
	<a class="left carousel-control" href="#slider-demo" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#slider-demo" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
</div>
</div>
