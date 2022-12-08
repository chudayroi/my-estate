@extends('dangtin.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-9 content-detail">
         @include('tintuc/link-child')
         
         <div class="row info">
            <div class="panel panel-info">
               <!-- Default panel contents -->
               <div class="panel-heading">
                  <i class="glyphicon glyphicon-pencil icon-pencil"></i><span class="content-title">Sửa thông tin</span>
               </div>
               <div class="panel-body">
                  <form id="form-upload" action="{{Asset('tintuc/uploadimagenews')}}" method="POST" role="form" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label  for="title">Tiêu đề <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                 <input type="text" class="form-control" id="title"  name="title" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 form-group">
                           <label class="" for="category">Hạng mục</label>
                           <div class="">
                              <select class="form-control" id="category" name="category" >
                                 <option value=""></option>
                                 @foreach($news_category as $category)
                                 <option value="{{$category['id']}}">{{$category['name']}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-3 form-group">
                           <label class="type" for="type">Loại</label>
                           <div class="">
                              <select class="form-control" id="item" name="item" >
                                 <option value=""></option>
                                 @foreach($item as $type)
                                 <option value="{{$type['id']}}">{{$type['name']}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-3 form-group">
                           <label class="type" for="type">Nhóm</label>
                           <div class="">
                              <select class="form-control" id="group" name="group" >
                                 <option value=""></option>
                                 @foreach($group as $type)
                                 <option value="{{$type['id']}}">{{$type['name']}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                     
                     <div class="row">
                        <div class="col-sm-12 form-group">
                           <label class="diachi-label"  for="title">Thời gian đăng tin</label>
                           <div class="line">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 form-group">
                           <label class="" for="title">Ngày bắt đầu <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                           <div class="">
                              <input type="" class="form-control" id="datepicker_start" name="datepicker_start" value="" placeholder="">
                           </div>
                        </div>
                        <div class="col-sm-6 form-group">
                           <label class="" for="title">Ngày kết thúc</label>
                           <div class="">
                              <input type="" class="form-control" id="datepicker_finish" name="datepicker_finish" value="" placeholder="">
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                     <div class="row">
                           <div class="col-sm-12 form-group">
                              <label class="" for="title">Nội dung tóm tắt<sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                 <textarea id="content_summary" name="content_summary" value="" class="form-control ckeditor" rows="3">{{$product->content_summary}}</textarea>
                                 <textarea id="content_summary1" name="content_summary1"  class="form-control" rows="3"style="display:none" ></textarea>

                              </div>
                           </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 form-group">
                           <div class="line">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 form-group">
                           <label class="" for="title">Nội dung <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                           <div class="">
                              <textarea id="content" name="content"  class="form-control" rows="3" >{{$product->content}}</textarea>
                              <textarea id="content1" name="content1"  class="form-control" rows="3"style="display:none" ></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 form-group">
                           <label class="" for="title">Tags</label>
                           <div class="">
                              <textarea id="tags" name="tags" class="form-control fixed" rows="1">{{$product->tags}}</textarea>
                              <textarea id="tags1" name="tags1" class="form-control fixed" rows="1" style="display:none"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 form-group">
                           <label class="upload-label"  for="title">Upload ảnh</label>
                           <div class="line">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 form-group">
                           <div class="col-sm-4">
                              <input type="file" id="file" name="file">
                           </div>
                           <div class="col-sm-1">                                    
                              <input type="submit" id="submit-upload"  value="Upload"   title="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div id="image-lists" class="image-lists" >
                           <div class="col-sm-offset-1 col-sm-12 " >
                              <?php $i=0; ?>
                              @foreach($files as $file)
                              <?php $i++;?>
                              <div class="col-sm-2"  id="divimage{{$i}}" style ="display:block">
                                 <img id='image{{$i}}' src="{{asset('/')}}/assets/img/news/{{$file->name}}" width='100px' height='100px' alt='delete'/>
                                 <button  type="button" id="remove-img{{$i}}" class="btn btn-link"><i class="glyphicon glyphicon-remove "></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img{{$i}}" name="img{{$i}}" value ="{{$file->name}}" placeholder="">
                              </div>
                              @endforeach
                              <?php $i++; ?>
                              @for($j=$i;$j<'6';$j++)
                              <div class="col-sm-2"  id="divimage{{$j}}" style ="display:none">
                                 <img id='image{{$j}}' src="" width='100px' height='100px' alt='delete'/>
                                 <button  type="button" id="remove-img{{$j}}" class="btn btn-link"><i class="glyphicon glyphicon-remove "></i></button>
                                 <input type="text" style ="display:none" class="form-control" id="img{{$j}}" name="img{{$j}}" value ="" placeholder="">
                              </div>
                              @endfor
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-5">
                           <div class="warning-upload" >
                              <div class="alert alert-warning alert-dismissible" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Chú ý!</strong> Hãy chọn ảnh.
                              </div>
                           </div>
                           <div class="ibars" id="ibars" style="display:none" >
                              <div id= "progress" class="progress">
                                 <div id="bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    0% 
                                 </div>
                              </div>
                           </div>
                           <span style="float:center" class="process" >Saving</span>
                        </div>
                        <div class="col-sm-offset-3 col-sm-4">
                           <button type="button" id="submit-save" class="btn btn-success">Lưu</button>
                           <a class="btn btn-danger"  id="mylist-title-a1" href="{{Asset('tintuc/detail')}}/{{$product['name']}}-{{$product['id']}}">Hủy</a>

                        </div>
                     </div>
                     <!--End row-->
                  </form>
               </div>
            </div>
            <!--end panel-info-->
         </div>
         <!--End .dangtin-->
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.flagcounter')
         
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div>
<!--End .container-->

@endsection
@section('js')
$("#title").val('{{$product->title}}');
$("#category").val('{{$product->categories_id}}');
$("#item").val('{{$product->item_id}}');
$("#group").val('{{$product->group}}');
$("#datepicker_start").val('{{$product->startdate}}');
$("#datepicker_finish").val('{{$product->enddate}}');
$(document).ready(function(){
//uploadhinh
   $("#submit-upload").click(function () {
      var filename = $("#file").val();
      var bar = $('#bar');
      if(filename!=''){
      $("#ibars").show();
   }
   $('#form-upload').ajaxForm({
      // Do something before uploading
      beforeUpload: function() {
      if(filename.length >0){
      bar.empty();
      bar.attr("style","width =0%");
      bar.html('0');
      }
   },
   uploadProgress: function(event, position, total, percentComplete) {
      if(filename.length >0){
      var percentValue = percentComplete + '%';
      bar.width(percentValue)
      bar.html(percentValue);
      }
   },
   success: function() {
      if(filename.length >0){
      var percentValue = '100%';
      bar.width(percentValue)
      bar.html(percentValue);
      }
   },
   //End before upload
   complete: function(result) {   
      var file_name = result.responseText;
      if(file_name =='error') {
         $("#ibars").hide();
         $('.warning-upload').show();
         setTimeout(function() {
         $('.warning-upload').hide();
         }, 2000);
       }
   else{
            var url = '{{asset('/')}}/assets/img/news/';
            var imagepath = url+file_name;
            var img1 = $("#img1").val();
            var img2 = $("#img2").val();
            var img3 = $("#img3").val();
            var img4 = $("#img4").val();
            var img5 = $("#img5").val();
            if( img1==''){
               $('#divimage1').show();
               $('#image1').attr("src",imagepath);
               $("#img1").val(file_name);
            }//end if img1
            else if(img2 ==''){
               $('#divimage2').show();
               $('#image2').attr("src",imagepath);
               $("#img2").val(file_name);
            }//end if img2
            else if(img3 ==''){
               $('#divimage3').show();
               $('#image3').attr("src",imagepath);
               $("#img3").val(file_name);
            }//end if img3
            else if(img4 ==''){
               $('#divimage4').show();
               $('#image4').attr("src",imagepath);
               $("#img4").val(file_name);
            }//end if img4
            else if(img5 ==''){
               $('#divimage5').show();
               $('#image5').attr("src",imagepath);
               $("#img5").val(file_name);
            }//end if img5
            $("#file").val("");
            setTimeout(function() {
               $("#ibars").hide();
               $('#bar').width('0%')
               $('#bar').html(0);
               }, 2000);
            }
         }//end complete
       });
   });
   //upload hinh
   //remove image
   $("#remove-img1").click(function () {
      $('#divimage1').hide();
      $("#img1").val("");
   });
   $("#remove-img2").click(function () {
      $('#divimage2').hide();
      $("#img2").val("");
   });
   $("#remove-img3").click(function () {
      $('#divimage3').hide();
      $("#img3").val("");
   });
   $("#remove-img4").click(function () {
      $('#divimage4').hide();
      $("#img4").val("");
   });
   $("#remove-img5").click(function () {
      $('#divimage5').hide();
      $("#img5").val("");
   });
   //End remove image
   //validate
   $("#form-upload").validate({
      rules:{
            title:{
                required:true,
                minlength:10
            },
            
            content:{
                required:true,
                minlength:10
            },
            content_summary:{
                required:true,
                minlength:10
            }
      },
        messages: {
           title:{
                required:"Nhập Tiêu đề.",
                minlength:"Phải tối thiểu 10 ký tự."
            },
            content:{
                required:"Nhập Nội dung.",
                minlength:"Phải tối thiểu 10 ký tự."
            },
            content_summary:{
                required:"Nhập Nội dung tóm tắt.",
                minlength:"Phải tối thiểu 10 ký tự."
            }
        }
   });
   //End validate
   //submitsave
   $("#submit-save").click(function () {
   //validate
   $("#form-upload").valid();
   //End validate
   var city_id =  $('#city').val();
      tinyMCE.triggerSave();
      var content_summary1 = tinymce.get('content_summary').getContent();
      $('#content_summary1').val(content_summary1);
      var content1 = tinymce.get('content').getContent();
      $('#content1').val(content1);
      var tags1 = tinymce.get('tags').getContent();
      $('#tags1').val(tags1);
      var data = $('#form-upload').serialize();
      $(".process").text('Saving');
      $(".process").show();
      $.ajax({
         url : "{{asset('tintuc/update')}}/{{$product->id}}",
         type : 'post',
         dataType: 'json',
         data:data,
         success : function (result){
         if(result.report){
         $(".process").text('Finish');
         setTimeout(function() {
         $(".process").hide();
         }, 2000);
         }//end if true
         else{
         $(".process").text('Error');
         setTimeout(function() {
         $(".process").hide();
         $("html, body").animate({ scrollTop: 0 }, "slow");
         }, 2000);
         }
         }//End success
         });//End ajax
      });
   //End submit save
});
//
@endSection
