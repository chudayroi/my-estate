   <div class="row">
      <div class="col-sm-9 content-detail">
         @include('template.tienich')
         <!--End .row-->
         <div class="row links">
            <i class="glyphicon glyphicon-play icon"></i>
            <a href="#"><span class="level-1">Đăng tin</span></a>
         </div>
         <!--end .links-->
         <div class="row info">
            <div class="panel panel-info">
               <!-- Default panel contents -->
               <div class="panel-heading">
                  <i class="glyphicon glyphicon-pencil icon-pencil"></i><span class="content-title">Nhập thông tin</span>
               </div>
               <div class="panel-body">
                  <form id="form-upload" action="{{Asset('dangtin/postdangtin')}}" method="POST" role="form" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <label  for="title">Tiêu đề <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                 <input type="text" class="form-control" id="title"  name="title" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-5 ">
                           <div class="form-group">
                              <label class="" for="category">Hạng mục</label>
                              <div class="">
                                 <select class="form-control" id="category " name="category" >
                                    @foreach($categories as $category)
                                       <option value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-5 ">
                           <div class="form-group">
                              <label class="type" for="type">Loại</label>
                              <div class="">
                                 <select class="form-control" id="type" name="type" >
                                     @foreach($types as $type)
                                       <option value="{{$type['id']}}">{{$type['name']}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-5">
                            <div class="row">
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <label class="" for="title">Diện tích <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                                    <div class='' >
                                    <input type="text" class="form-control" id="area" name="area" value ="" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4" >
                                 <div class="form-group">
                                    <label class="" for="title">Đơn vị tính</label>
                                    <div class=''>
                                       <select class="form-control" id="area_unit" name="area_unit" >
                                          @foreach($area_unit as $unit)
                                          <option value="{{$unit->id}}">{{$unit->name}}</option>   
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <label class="" for="title">Giá<sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                                    <div class='' >
                                    <input type="text" class="form-control" id="amount" name="amount" value ="" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4" >
                                 <div class="form-group">
                                    <label class="" for="title">Đơn vị tính</label>
                                    <div class=''>
                                       <select class="form-control" id="amount_unit" name="amount_unit" >
                                          @foreach($amount_unit as $unit)
                                          <option value="{{$unit->id}}">{{$unit->name}}</option>   
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                    
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <label class="diachi-label"  for="title">Địa chỉ</label>
                              <div class="line">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-5">
                           <div class="form-group">
                              <label class="" for="title">Số nhà, đường</label>
                              <div class="">
                                 <input type="text" class="form-control" id="street" name="street" value ="" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div class="row">
                              <div class="col-sm-6 pull-left">
                                 <div class="form-group">
                                    <label class="" for="title">Tỉnh/TP <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                                    <div class='' >
                                       <select class="form-control" id="city" name="city" >
                                           <option style="color:gray" value="">Chọn Tỉnh/TP</option>
                                          @foreach($cityinfo as $city)
                                             <option value="{{$city['id']}}">{{$city['name']}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 pull-right">
                                 <div class="form-group">
                                    <label class="" for="title">Quận/Huyện <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                                    <div class=''>
                                       <select class="form-control" id="district" name="district" >
                                          <option style="color:gray" value="">Chọn Quận/Huyện</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <label class="diachi-label"  for="title">Thời gian đăng tin</label>
                              <div class="line">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-5">
                           <div class="form-group">
                              <label class="" for="title">Ngày bắt đầu <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                 <input type="" class="form-control" id="datepicker_start" name="datepicker_start" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div class="form-group">
                              <label class="" for="title">Ngày kết thúc</label>
                              <div class="">
                                 <input type="" class="form-control" id="datepicker_finish" name="datepicker_finish" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <div class="line">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <label class="" for="title">Nội dung <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                 <textarea id="content" name="content" value="" class="form-control" rows="3"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <label class="" for="title">Tags</label>
                              <div class="">
                                 <textarea id="tags" name="tags" value="" class="form-control fixed" rows="1"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <label class="upload-label"  for="title">Upload ảnh</label>
                              <div class="line">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                           <div class="form-group">
                              <div class="col-sm-4">
                                 <input type="file" id="file" name="file">
                              </div>
                              <div class="col-sm-1">											    
                                 <input type="submit" id="submit-upload"  value="Upload"   title="">
                              </div>
                             
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-1 col-sm-6 warning-upload" >
                           <div class="alert alert-warning alert-dismissible" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Chú ý!</strong> Hãy chọn ảnh.
                           </div>
                        </div>
                     </div>
                     <div class="row ibars" id="ibars" style="display:none" >
                       
                           <div class="col-sm-offset-1 col-sm-5">
                              <div id= "progress" class="progress">
                                 <div id="bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    0% 
                                 </div>
                              </div>
                           </div>
                        
                     </div>
                     <div class="row">
                        <div id="image-lists" class="image-lists" >
                           <div class="col-sm-offset-1 col-sm-12 " >
                              <div class="col-sm-2"  id="divimage1" style ="display:none">
                                 <img id='image1' src="" width='100px' height='100px' alt='delete'/>
                                 <button  type="button" id="remove-img1" class="btn btn-link"><i class="glyphicon glyphicon-remove "></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img1" name="img1" value ="" placeholder="">
                              </div>
                              <div class="col-sm-2" style ="display:none" id="divimage2">
                                 <img id='image2' src=""  width='100px' height='100px' alt='delete'/>
                                 <button type="button" id="remove-img2" class="btn btn-link"><i class="glyphicon glyphicon-remove"></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img2" name="img2" value ="" placeholder="">
                              </div>
                              <div class="col-sm-2" style ="display:none" id="divimage3">
                                 <img id='image3' src=""  width='100px' height='100px' alt='delete'/>
                                 <button type="button" id="remove-img3" class="btn btn-link"><i class="glyphicon glyphicon-remove"></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img3" name="img3" value ="" placeholder="">
                              </div>
                              <div class="col-sm-2" style ="display:none" id="divimage4">
                                 <img id='image4' src=""  width='100px' height='100px' alt='delete'/>
                                 <button type="button" id="remove-img4" class="btn btn-link"><i class="glyphicon glyphicon-remove"></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img4" name="img4" value ="" placeholder="">
                              </div>
                              <div class="col-sm-2" style ="display:none" id="divimage5">
                                 <img id='image5' src=""  width='100px' height='100px' alt='delete'/>
                                 <button type="button" id="remove-img5" class="btn btn-link"><i class="glyphicon glyphicon-remove"></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img5" name="img5" value ="" placeholder="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-offset-4 col-sm-4">
                              <span class="process" >Loading</span>
                        </div>
                       <div class="col-sm-4">
                              <button type="button" id="submit-save" class="btn btn-success">Lưu</button>
                              <button type="button" id="submit-cancel" class="btn btn-danger">Hủy</button>
                        </div>
                        
                     </div><!--End row-->
                     <div class="row">
                        <div class="col-sm-offset-2 col-sm-6 edit-dangtin" >
                           <div class="alert alert-success alert-dismissible" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Đã lưu!</strong> <a href="{{Asset('dangtin/edit')}}" id="dangtin_edit" class="alert-link">Click để thay đổi. </a>
                           </div>
                        </div>
                     </div>
                     
                  </form>
               </div>
            </div>
            <!--end panel-info-->
         </div>
         <!--End .dangtin-->
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.side-bar')
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
