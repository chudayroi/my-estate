	<div class="row" id="product_row">
	@if(!empty($list))
	<?php $i=0;?>
	@foreach($list as $product)
	<?php $i++;?>

		<div class="col-sm-4 product-item" id="id_product_item{{$i}}">
			
			<div class="image" id="id_image{{$i}}">
				<a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
				@if(!empty($product['image']))
				<img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category" alt="{{$product['name']}}"/>
				@else
				<img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
				@endif
				</a>
			</div>
			<div class="title" id='title{{$i}}'>
				<p id='p{{$i}}'><a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}">{{$product['title']}}</a></p>
			</div>
			<div class="address" id="area{{$i}}">
				<div class="icon" id="area_icon{{$i}}">
					<i class="glyphicon glyphicon-th-large"></i>
				</div>
				<div class="info">
					{{$product['area']}}m<sup>2</sup>
				</div>
			</div>
			<div class="address" id="amount{{$i}}">
				<div class="icon" id="amount_icon{{$i}}">
					<i class="glyphicon glyphicon-usd"></i>
				</div>
				<div class="info">
                 {{$product['amount']}}
				 {{$product['amount_unit']}}
				</div>
			</div>
			
			<div class="address" id="district{{$i}}">
				<div class="icon1" id="district_icon{{$i}}">
					<i class="glyphicon glyphicon-map-marker"></i>
				</div>
				<div class="info1">
					{{$product['district']}}, {{$product['city']}}
				</div>
			</div>
			
			
		</div>
		<!--end .product-item-->
		
		@endforeach
		@else
		<div class="col-sm-12"><span style="color:red">Không tìm thấy!</span></div>
		@endif

	</div>

	<!--End .row-->
