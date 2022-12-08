<div class="sidebar-rotater">
<div class="panel panel-warning panel-search">
  <div class="panel-heading">
    <h3 class="panel-title text_center">TÌM KIẾM NHÀ ĐẤT</h3>
  </div>
  <div class="panel-body custom-body">
   <form method ="post" id="side_bar" action="{{Asset('dangtin/list')}}" class="form-horizontal">
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
			<input type="submit" class="btn btn-info hvr-wobble-to-bottom-right" value="Tìm">

			<button id="btnclear" name="btnclear" class="btn btn-default hvr-float-shadow">Làm trắng</button>
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

<div class="well">
	<form>
		<h4>Số lượt xem</h4>
		
		<div class="mobile">
			<a href="http://info.flagcounter.com/xE27"><img src="http://s07.flagcounter.com/count2/xE27/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_3/labels_0/pageviews_1/flags_0/" alt="Flag Counter" border="0"></a>
			<a href="http://info.flagcounter.com/v38W"><img src="http://s05.flagcounter.com/count2/v38W/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_3/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
			
		</div>		
	</form>
  
</div><!--end .well-->
</div>

<!--End .well-->
