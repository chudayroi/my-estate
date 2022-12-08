
<div class="row category-panel-batdongsanxemnhieunhat">
<div class="panel panel-danger">
<div class="panel-heading">
<h3 class="panel-title">TÌM KIẾM NHÀ ĐẤT</h3>
</div>
 <div class="panel-body custom-body">
   <form method ="post" id="side_bar" action="{{Asset('bat-dong-san/search')}}" class="form-horizontal">
		<div class="form-group" >
			<label style="padding-left:0px" for="category" class="col-sm-5 control-label">Hạng mục</label>
			<div style="padding-left:0px"  class="col-sm-7" >
				<select class="form-control" id="category" name="category" >
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
				 <select class="form-control" id="type" name="type" >
					<option style="color:gray" value="">Chọn Hình thức</option>
                    @foreach($types as $type)
                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                    @endforeach
                    </select>
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="col-sm-5 control-label">Tỉnh/TP</label>
			<div class="col-sm-7" style="padding-left:0px" >
				<select class="form-control" id="city" name="city">
					<option style="color:gray" value="">Chọn Tỉnh/TP</option>
					@foreach($cityinfo as $city)
					<option value="{{$city['id']}}">{{$city['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group" id="display-sibar-district">
			<label for="district" class="col-sm-5 control-label">Quận/Huyện</label>
			<div class="col-sm-7" style="padding-left:0px" >

				<select class="form-control" id="district" name="district" >
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

				<select class="form-control" id="street" name="street" >
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
				<select class="form-control" id="area" name="area" >
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
				<select class="form-control" id="amount" name="amount" >
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
</div>
</div>
<script type="text/javascript">
    $('#category').val('{{$info_search['category']}}');
	$('#type').val('{{$info_search['type']}}');
	$('#city').val('{{$info_search['city']}}');
	var district = '{{$info_search['district']}}';
	if(district !='') $('#display-sibar-district').show();
	$('#district').val('{{$info_search['district']}}');
	$('#street').val('{{$info_search['street']}}');
	$('#area').val('{{$info_search['area']}}');
	$('#amount').val('{{$info_search['amount']}}');
	
	
   $('#city').change(function(event){

   	event.preventDefault();
     var city_id =  $('#city').val();
     $('#district').empty();
 		$('#district')
			.append($("<option></option>")
			.attr("value","")
			.attr("style","color:gray")
			.text("Chọn Quận/Huyện")
			); //End $('#sibar-quanhuyen')
        

         $.ajax({
                    url : "{{asset('first/loadDistrict')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{city_id:city_id},
                    success : function (result){

                     $.each(result, function(index, val) {
                         $('#district')
                           .append($("<option></option>")
                           .attr("value",val.id)
                           .text(val.name)
                       ); //End $('#quanhuyen')
                     });//End $.each(result, function(index, val)
                     
                    }//End success
         });//End ajax
   });//End $('#tinhtp').change(function(event)
   //street
$('#district').change(function(event){

   	event.preventDefault();
     var district_id =  $('#district').val();
     $('#street').empty();
 		$('#street')
			.append($("<option></option>")
			.attr("value","")
			.attr("style","color:gray")
			.text("Chọn Đường")
			); //End $('#sibar-quanhuyen')
        

         $.ajax({
                    url : "{{asset('first/loadStreet')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{district_id:district_id},
                    success : function (result){

                     $.each(result, function(index, val) {
                         $('#street')
                           .append($("<option></option>")
                           .attr("value",val.id)
                           .text(val.name)
                       ); //End $('#quanhuyen')
                     });//End $.each(result, function(index, val)
                     
                    }//End success
         });//End ajax
   });//End $('#tinhtp').change(function(event)
   //end street
   $('#btnclear').click(function(event) {
   		event.preventDefault();
   		$('#bar').attr('action', '{{Asset('timkiem')}}'); 
		$('#category').val('');
		$('#sibar_type').val('');
		$('#city').val('');
		$('#display-sibar-district').hide();
		$('#district').val('');
		$('#street').val('');
		$('#area').val('');
		$('#amount').val('');

   });
   //search  sider-bar
</script>