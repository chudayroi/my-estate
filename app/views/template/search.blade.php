

   <div class='col-sm-6 form-search'>
         <div class='row category-kinhnghiem'>
         <span class='span-kinhnghiem '>TÌM KIẾM NHÀ ĐẤT</span>
      </div>
      <form method ="post" id="side_bar" action="{{Asset('bat-dong-san/search')}}" class="form-horizontal ">
         <div class="col-sm-6 choose-search">
            <div class="form-group" >
               <label for="category" class="col-sm-4 control-label-search">Loại BĐS</label>
               <div style="padding-left:0px"  class="col-sm-8" >
                  <select class="form-control" id="category" name="category" >
                     <option style="color:gray" value="">Chọn Loại BDS</option>
                     @foreach($categories as $category)
                     <option value="{{$category['id']}}">{{$category['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label for="tinhtp" class="col-sm-4 control-label-search">Tỉnh/TP</label>
               <div class="col-sm-8" style="padding-left:0px" >
                  <select class="form-control" id="city" name="city">
                     <option style="color:gray" value="">Chọn Tỉnh/TP</option>
                     @foreach($cityinfo as $city)
                     <option value="{{$city['id']}}">{{$city['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
             <div class="form-group" id="display-sibar-district">
               <label for="quanhuyen" class="col-sm-4 control-label-search">Quận/Huyện</label>
               <div class="col-sm-8" style="padding-left:0px" >
                  <select class="form-control" id="district" name="district" >
                     <option style="color:gray" value="">Chọn Quận/Huyện</option>
                     @foreach($districts as $district)
                     <option value="{{$district['id']}}">{{$district['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group" id="display-sibar-street">
               <label for="street" class="col-sm-4 control-label-search">Đường</label>
               <div class="col-sm-8" style="padding-left:0px" >
                  <select class="form-control" id="street" name="street" >
                     <option style="color:gray" value="">Chọn Đường</option>
                     @foreach($streetinfo as $street)
                     <option value="{{$street['id']}}">{{$street['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
           
         </div>
         <div class="col-sm-6 choose-search">
            <div class="form-group">
               <label for="type" class="col-sm-4 control-label-search">Hình thức</label>
               <div class="col-sm-8" style="padding-left:0px" >
                  <select class="form-control" id="type" name="type" >
                     <option style="color:gray" value="">Chọn Hình thức</option>
                     @foreach($types as $type)
                     <option value="{{$type['id']}}">{{$type['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label for="dientich" class="col-sm-4 control-label-search">Diện tích</label>
               <div class="col-sm-8" style="padding-left:0px" >
                  <select class="form-control" id="area" name="area" >
                     <option style="color:gray" value="">Chọn Diện tích</option>
                     @foreach($areas as $area)
                     <option value="{{$area['id']}}">{{$area['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label for="gia" class="col-sm-4 control-label-search">Giá</label>
               <div class="col-sm-8" style="padding-left:0px" >
                  <select class="form-control" id="amount" name="amount" >
                     <option style="color:gray" value="">Chọn Giá</option>
                     @foreach($amounts as $amount)
                     <option value="{{$amount['id']}}">{{$amount['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
               <input type="submit" class="btn btn-info hvr-wobble-to-bottom-right" value="Tìm Kiếm">
               <button id="btnclear" name="btnclear" class="btn btn-default hvr-float-shadow">Làm trắng</button>
            </div>
         </div>
      </form>
   </div>

   <!--End panel-->

