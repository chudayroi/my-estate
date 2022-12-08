	<div class="row" id="product_row">
	@if(!empty($list))
	<?php $i=0;?>
	@foreach($list as $product)
	<?php $i++;?>

		<div class="col-sm-3 product-item" id="id_product_item{{$i}}">
			<div class="image" id="id_image{{$i}}">
				<a href="{{Asset('dangtin/detail')}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
				<img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive" alt=""/>
				</a>
			</div>
			<div class="title" id='title{{$i}}'>
				<p id='p{{$i}}'><a href="{{Asset('dangtin/detail')}}/{{$product['name']}}-{{$product['id']}}">{{$product['title']}}</a></p>
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
					<?php 
						if($product['amount_unit']==4) echo $product['amount']/1000;
						else echo $product['amount'];
					?>
					 {{$product['amount_unit']}}
				</div>
			</div>
			
			<div class="address" id="district{{$i}}">
				<div class="icon" id="district_icon{{$i}}">
					<i class="glyphicon glyphicon-map-marker"></i>
				</div>
				<div class="info">
					{{$product['district']}}, {{$product['city']}}
				</div>
			</div>
			<div class="address" id="startdate{{$i}}">
				<div class="icon" id="startdate_icon{{$i}}">
					<i class="glyphicon glyphicon-time"></i>
				</div>
				<div class="info">
					{{$product['startdate']}}
				</div>
			</div>
			<div class="row tools" id="tools{{$i}}">
				<div class="col-sm-offset-1 col-sm-1 icon-edit" id="icon-edit{{$i}}">
					<a class="" id="edit{{$i}}" title="Sửa" href="{{asset('dangtin/edit')}}/{{$product['name']}}-{{$product['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
				</div>
				<div class="col-sm-1 icon-remove" id="icon-remove{{$i}}">
					<a class="" id="remove{{$i}}" data-toggle="modal" data-target="#modal{{$i}}"  href="#"><i class="glyphicon glyphicon-trash"></i></a>
				</div>
				
					<!-- Modal -->
					<div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Xóa Tin</h4>
					      </div>
					      <div class="modal-body">
					        Bạn có chắc muốn xóa tin này?
					      </div>
					      <div class="modal-footer">
					        <button type="button" id="{{$product['id']}}" class="btn btn-default" data-dismiss="modal" >Delete</button>
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!--End modal-->
			</div>
		</div>
		<!--end .product-item-->
		
		@endforeach
		@else
		<div class="col-sm-12"><span style="color:red">Không tìm thấy!</span></div>
		@endif

	</div>

	<!--End .row-->
	