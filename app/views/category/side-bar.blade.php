	<div class="panel panel-warning panel-search">
  <div class="panel-heading">
    <h3 class="panel-title text_center">TÌM KIẾM NHÀ ĐẤT</h3>
  </div>
  <div class="panel-body custom-body">
   <form method ="post" id="side_bar" action="{{Asset('timkiem')}}" class="form-horizontal">
		<div class="form-group" >
			<label style="padding-left:0px" for="category" class="col-sm-5 control-label">Hạng mục</label>
			<div style="padding-left:0px"  class="col-sm-7" >
				<select class="form-control" id="sibar_category" name="sibar_category" >
					<option style="color:gray" value="">Chọn hạng mục</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
			</div>
		</div>
		<div class="form-group">
			<label for="type" class="col-sm-5 control-label">Hình thức</label>
			<div class="col-sm-7" style="padding-left:0px" >
				 <select class="form-control" id="sibar_type" name="sibar_type" >
					<option style="color:gray" value="">Chọn Hình thức</option>
                    @foreach($types as $type)
                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                    @endforeach
                    </select>
			</div>
		</div>
		<div class="form-group">
			<label for="tinhtp" class="col-sm-5 control-label">Tỉnh/TP</label>
			<div class="col-sm-7" style="padding-left:0px" >
				<select class="form-control" id="sibar_city" name="sibar_city">
					<option style="color:gray" value="">Chọn Tỉnh/TP</option>
					@foreach($cityinfo as $city)
					<option value="{{$city['id']}}">{{$city['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group" id="display-sibar-district">
			<label for="quanhuyen" class="col-sm-5 control-label">Quận/Huyện</label>
			<div class="col-sm-7" style="padding-left:0px" >

				<select class="form-control" id="sibar_district" name="sibar_district" >
					<option style="color:gray" value="">Chọn Quận/Huyện</option>
					@foreach($districts as $district)
					<option value="{{$district['id']}}">{{$district['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group" id="display-sibar-street">
			<label for="street" class="col-sm-5 control-label">Đường</label>
			<div class="col-sm-7" style="padding-left:0px" >

				<select class="form-control" id="sibar_street" name="sibar_street" >
					<option style="color:gray" value="">Chọn Đường</option>
					 @foreach($streetinfo as $street)
                    <option value="{{$street['id']}}">{{$street['name']}}</option>
                    @endforeach
                    
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="dientich" class="col-sm-5 control-label">Diện tích</label>
			<div class="col-sm-7" style="padding-left:0px" >
				<select class="form-control" id="sibar_area" name="sibar_area" >
					<option style="color:gray" value="">Chọn Diện tích</option>
					@foreach($areas as $area)
					<option value="{{$area['id']}}">{{$area['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="gia" class="col-sm-5 control-label">Giá</label>
			<div class="col-sm-7" style="padding-left:0px" >
				<select class="form-control" id="sibar_amount" name="sibar_amount" >
					<option style="color:gray" value="">Chọn Giá</option>
					@foreach($amounts as $amount)
					<option value="{{$amount['id']}}">{{$amount['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
			<input type="submit" class="btn btn-info" value="Tìm">
			<button id="btnclear" name="btnclear" class="btn btn-default">Làm trắng</button>
			</div>
		</div>
	</form>
</div><!--End panel-body-->
</div><!--End panel-->
<div class="panel panel-warning panel-search">
  <div class="panel-heading">
    <h3 class="panel-title text_center">Xem Nhiều Nhất</h3>
  </div>
	<div class="row ">
           
                <ul class="xemnhieunhat">
                    @foreach($product_dangtin as $product)
                     <li>
                        <a href="{{Asset($product->category_title)}}/chitiet/{{$product->name}}-{{$product->id}}" id="news-dot" class="news-dot" >
                        <span class="news-dot-title">{{$product->title}}</span>
                        </a>
                     </li>
                     @endForeach
                </ul>
          </div>
          </div><!--End .row .Rao vat--
<!--end .well-->
@include('category.danhmucnhadat')
<!--

-->
<div class="well">
	<form>
		<h4>Hotline:</h4>
		<h4> Nguyễn Bình</h4>
		<div class="mobile">
			<a class="btn-phone" href="#">
			<i class="glyphicon glyphicon-earphone"> <span class="span-mobile">0938.569.939</span></i>
			</a>
		</div>
		
	</form>
  
</div>
<div class="well">
	<form>
		<h4>Số lượt xem</h4>
		
		<div class="mobile">
			<a href="http://info.flagcounter.com/xE27"><img src="http://s07.flagcounter.com/count2/xE27/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_3/labels_0/pageviews_1/flags_0/" alt="Flag Counter" border="0"></a>
			
		</div>		
	</form>
  
</div><!--end .well-->
<!--End .well-->
<script type="text/javascript">
//side bar
	$('#sibar_category').val('{{$info_search['sibar_category']}}');
	$('#sibar_type').val('{{$info_search['sibar_type']}}');
	$('#sibar_city').val('{{$info_search['sibar_city']}}');
	var district = '{{$info_search['sibar_district']}}';
	if(district !='') $('#display-sibar-district').show();
	$('#sibar_district').val('{{$info_search['sibar_district']}}');
	$('#sibar_street').val('{{$info_search['sibar_street']}}');
	$('#sibar_area').val('{{$info_search['sibar_area']}}');
	$('#sibar_amount').val('{{$info_search['sibar_amount']}}');
	
	$('#sibar_category').change(function(event){
   		event.preventDefault();
    	var category_id =  $('#sibar_category').val();
   		$.ajax({
                    url : "{{asset('first/loadcategory')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{category_id:category_id},
                    success : function (result){
   						$('#side_bar').attr('action', '{{Asset('/')}}'+result.title); 
                    }//End success
         });//End ajax
     });//End $('#sibar_category').change(function(event)
   $('#sibar_city').change(function(event){

   	event.preventDefault();
     var city_id =  $('#sibar_city').val();
     $('#sibar_district').empty();
 		$('#sibar_district')
			.append($("<option></option>")
			.attr("value","")
			.attr("style","color:gray")
			.text("Chọn Quận/Huyện")
			); //End $('#sibar-quanhuyen')
        $('#display-sibar-district').show();

         $.ajax({
                    url : "{{asset('first/loadDistrict')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{city_id:city_id},
                    success : function (result){

                     $.each(result, function(index, val) {
                         $('#sibar_district')
                           .append($("<option></option>")
                           .attr("value",val.id)
                           .text(val.name)
                       ); //End $('#quanhuyen')
                     });//End $.each(result, function(index, val)
                     
                    }//End success
         });//End ajax
   });//End $('#tinhtp').change(function(event)
   $('#btnclear').click(function(event) {
   		event.preventDefault();
   		$('#side_bar').attr('action', '{{Asset('timkiem')}}'); 
		$('#sibar_category').val('');
		$('#sibar_type').val('');
		$('#sibar_city').val('');
		$('#display-sibar-district').hide();
		$('#sibar_district').val('');
		$('#sibar_street').val('');
		$('#sibar_area').val('');
		$('#sibar_amount').val('');

   });
   //search  sider-bar
</script>