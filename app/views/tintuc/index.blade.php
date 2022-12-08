@extends('tintuc.basic')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-sm-9 news-block">
        @include('tintuc.link-category')
      <div class="row">
        @if(!empty($product_hot))
        <div class="col-sm-8 news-hot">
         <div class="image-hot" id="id_image">
            <a href="{{Asset('tintuc')}}/{{$product_hot->category_title}}/{{$product_hot->name}}-{{$product_hot->id}}" id="ai">
               <img src="{{Asset('assets')}}/img/news/{{$product_hot->image}}" class="img-responsive img-hot-responsive" alt="{{$product_hot->name}}"/>
            </a>
         </div>  
        
         <div class="news-hot-title">
            <a href="{{Asset('tintuc')}}/{{$product_hot->category_title}}/{{$product_hot->name}}-{{$product_hot->id}}" id="ai">
              <h4 class="hot-title">{{$product_hot->title}}</h4>
            </a>
         </div>
         <div>
           {{$product_hot->content_summary}}
         </div>
         
          </div><!--End .col-sm-8-->
          @endif
        <div class="col-sm-4 most-viewed-link">
              <ul class="list-unstyled ">
              @if(!empty($product_common))
              @foreach($product_common as $product)
                <li class="viewed-link">
                  <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="btn-news-categoty-top" class="" >
                  <span class="viewed-name">{{$product->title}}</span>
                  </a>
                </li>
                @endforeach
                @endif
              </ul>
          </div><!--End .most-viewed-link-->
         </div><!--End .row-->
         <div class="row line"></div>

         <div class="col-sm-7 news-nomal-list">

            @if(!empty($product_nomal))
            @foreach($product_nomal as $product)
             <div class="row news-nomal">
               <div class="row">
                    <a  href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}">
                    <h4>{{$product->title}}</h4>
                    </a>
                </div>
                <div class="row">
                  <div class="col-sm-5 image" id="id_image">
                     <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="ai">
                     <img src="{{Asset('assets')}}/img/news/{{$product->image}}" class="img-responsive img-news-nomal" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7 content-summary">
                    {{$product->content_summary}}
                  </div>
                  </div>
              </div><!--End .news-nomal-->
              @endforeach
              @endif
      </div><!--Enf .news-nomal-list-->
       <div class="col-sm-5 news-categoty-list">
                 @include('template.quangcaovinpearl')
       
          <?php $i=0;?>
          @foreach($products_category as $categorytitle => $category_title)
          @foreach($category_title as $categoryname => $category)
          <?php $i++; ?>
          @if($i==2)
          <div class="row">
            <div class="row news-categoty">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a href="{{Asset('nha-dat')}}" id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">Rao vặt</span>
                        </a>
                     </li>
              </ul>
            </div>
            <div class="row news-dot-list">
                <ul class="">
                    @foreach($product_dangtin as $product)
                     <li>
                        <a href="{{Asset($product->category_title)}}/chitiet/{{$product->name}}-{{$product->id}}" id="news-dot" class="news-dot" >
                        <span class="news-dot-title">{{$product->title}}</span>
                        </a>
                     </li>
                     @endForeach
                </ul>
            </div><!--End .news-dot-list-->
          </div><!--End .row .Rao vat-->
          @endif
         <div class="row">
            <div class="row news-categoty">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a href="{{Asset('tintuc')}}/{{$categorytitle}}" id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">{{$categoryname}}</span>
                        </a>
                     </li>
                <!--    @foreach($category as $key1 => $items)
                    @if($key1=='item')
                    @foreach($items as $item)
                    <li>
                        <a href="{{Asset('tintuc')}}/{{$categoryname}}/{{$item['title']}}" id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">{{$item['name']}}</span>
                        </a>
                     </li>
                    @endforeach
                    @endif
                    @endforeach
                    -->
                  </ul>
            </div>
            @foreach($category as $key1 => $items)
            @if($key1=='product')
            @foreach($items as $item)
            <div class="row news-content">
               <div>
                 <a href="{{Asset('tintuc')}}/{{$item->category_title}}/{{$item->name}}-{{$item->id}}" title="">
                   <h4>{{$item->title}} </h4>
                 </a>
               </div>
                  <div class="col-sm-5 " id="id_image">
                     <a href="{{Asset('tintuc')}}/{{$item->category_title}}/{{$item->name}}-{{$item->id}}" id="ai">
                     <img src="{{Asset('assets')}}/img/news/{{$item->image}}" class="img-responsive image-dot" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7">
                    {{$item->content_summary}}
                  </div>
            </div> <!--End .news-content-->
            @endforeach
            @endif
            @endforeach
            <div class="row news-dot-list">
                <ul class="">
                     @foreach($category as $key1 => $items)
                     @if($key1=='product_dot')
                     @foreach($items as $item)
                     <li>
                        <a href="{{Asset('tintuc')}}/{{$item->category_title}}/{{$item->name}}-{{$item->id}}" id="news-dot" class="news-dot" >
                        <span class="news-dot-title">{{$item->title}}</span>
                        </a>
                     </li>

                      @endforeach
                      @endif
                      @endforeach
                </ul>
            </div><!--End .news-dot-list-->
         </div><!--End .row-->
        @endForeach
        @endForeach
            
         </div><!--End .News-category-list-->
      </div><!--End .news-list-->
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.quangcaovnexpress')
         @include('template.flagcounter')
         @include('template.quangcaobosuutap')

         
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div><!--End .row-->
</div><!--End .container-->
@endsection
@section('ajax-js')
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
      var url = 'http://ivector/tinbatdongsan/public/assets/img/';
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

   
//submitsave
$("#submit-save").click(function () {
//validate
   $("#form-upload").validate({
       rules:{
            title:{
                required:true,
                minlength:10
            },
            area:{
                required:true,
                minlength:2,
                number:true
            },
            amount:{
                required:true,
                minlength:2,
                number:true
            },
            content:{
                required:true,
                minlength:2
            },
            datepicker_start:{
               required:true
            },
            city:{
               required:true
            },
            district:{
               required:true
            }
      },
        messages: {
           title:{
                required:"Nhập Tiêu đề.",
                minlength:"Tiêu đề phải tối thiểu 10 ký tự."
            },
            area:{
                required:"Nhập Diện tích.",
                minlength:"Diện tích phải tối thiểu 2 ký tự.",
                number:"Diện tích phải nhập số."
            },
            amount:{
                required:"Nhập Giá.",
                minlength:"Giá phải tối thiểu 2 ký tự.",
                number:"Giá phải nhập số."
            },
            content:{
                required:"Nhập Nội dung."
            },
            datepicker_start:{
               required:"Chọn Ngày bắt đâu đăng tin."
            },
            city:{
               required:"Chọn Tỉnh/TP"
            },
            district:{
               required:"Chọn Quận/Huyện"
            }

        }
   });
//End validate
   var city_id =  $('#city').val();
    var data = $('#form-upload').serialize();
   $(".process").text('Loading');
    $(".process").show();
   $.ajax({
                    url : "{{asset('dangtin/createproduct')}}",
                    type : 'post',
                    dataType: 'json',
                    data:data,
                    success : function (result){
                        if(result){
                           $(".process").text('Finish');
                           var link = window.location+'/edit/'+result.product_id;
                           $('a.alert-link').attr("href",link);

                           setTimeout(function() {
                              $(".process").hide();
                              $('#form-upload').resetForm();
                              $('#divimage1').hide();
                              $('#divimage2').hide();
                              $('#divimage3').hide();
                              $('#divimage4').hide();
                              $('#divimage5').hide();
                              $('#image1').attr("src","");
                              $('#image2').attr("src","");
                              $('#image3').attr("src","");
                              $('#image4').attr("src","");
                              $('#image5').attr("src","");
                              $(".edit-dangtin").show();
                           }, 2000);
                           setTimeout(function() {
                              $(".edit-dangtin").hide();
                           }, 100000);
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

@endsection