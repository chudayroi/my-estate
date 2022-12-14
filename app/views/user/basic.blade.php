<!DOCTYPE html>
<html lang="">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon"  href="{{Asset('assets/icon/favicon.ico')}}">
        <title>
           Dat Nha Be|Dat Nha Be Dau Tu Gia Re|Dat Mat Tien Duong Nha Be Gia Re|Dat Nha Be Dien Tich Lon Gia Re|Dat Dien Tich Lon Nha Be|Dat Nha Be Xay Biet Thu Vuon Gia Re|Dat Duong Long Thoi Nha Be Gia Re|Dat Mat Tien Long Thoi Nha Be Gia Re|Dat Duong Xuong Ca Long Thoi Nha Be|Dat Duong Le Van Luong|Dat Duong Nguyen Van Tao|Dat Duong Long Thoi Nha Be |Dat Xay Phong Tro Nha Be|Dat Nha Be Gan Quan 7| Dat Nha Be Lien Ke Phu My Hung| Tin Tuc Bat Dong San| Tin Tuc Nha Dat| Mua Ban Dat Va Nha Nha Be Gia Re 
        </title>
        <meta name="description" content="Chuyen mua ban, tu van dau tu bat dong san nha be gia re,dat nha be xay biet thu vuon , dat long thoi xay phong tro, dat nha be dau tu gia re, dat nha be dien tich lon gia re, tai: khu do thi cang Hiep Phuoc, Tan Cang Hiep Phuoc,  duong le van luong, nguyen van tao, long thoi nhon duc, huynh tan phat, phuoc kien, mat tien duong kinh doanh nha be, nha va dat nha be gia re">
        <meta name="author" content="tinbatdongsan.net.vn">
        <meta name="keywords" content="dat nha be gia re|dat nha be dien tich lon gia re|dat nha be dau tu gia re| dat lam biet thu vuon gia re|dat dien tich lon| dat so rieng nha be|dat mat tien duong le van luong|dat mat tien duong nguyen van tao| dat xay nha|dat dau tu| dat nguyen van tao| dat le van luong| dat mat tien long thoi nha be|dat xay phong tro nha be| tin tuc bat dong|tin tuc nha dat| mua ban dat va nha nha be gia re " />
        <meta name="robots" content="noodp,index,follow" />
        <meta http-equiv="content-language" content="vi" />
        <meta name='revisit-after' content='1 days' />
      @include('template.css')
      @include('template.js')
      @yield('css')
       
   </head>
   <body>
      <header>
         @include('template.head')
      </header>
      <section class="slider">
         @yield('slider')
      </section>
      <section class="content">
         @yield('content')
      </section>
      <!-- jQuery -->
   <footer class="footer">
     @include('template.footer')
   </footer><!--end .footer-->
   @yield('link-js')

</body>


<script type="text/javascript">

 $( "#datepicker_start" ).datepicker();
 $( "#datepicker_finish" ).datepicker();
//textarea
tinyMCE.init({
      // General options
      mode : "textareas",
      theme : "advanced",
      plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

      // Theme options
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "bullist,numlist,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "",

      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true,

      // Example content CSS (should be your site CSS)
      //content_css : "{{Asset('assets/editor/css/content.css')}}",

      // Drop lists for link/image/media/template dialogs
      template_external_list_url : "lists/template_list.js",
      external_link_list_url : "lists/link_list.js",
      external_image_list_url : "lists/image_list.js",
      media_external_list_url : "lists/media_list.js",

      // Style formats
      style_formats : [
         {title : 'Bold text', inline : 'b'},
         {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
         {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
         {title : 'Example 1', inline : 'span', classes : 'example1'},
         {title : 'Example 2', inline : 'span', classes : 'example2'},
         {title : 'Table styles'},
         {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
      ],

      // Replace values for the template plugin
      template_replace_values : {
         username : "Some User",
         staffid : "991234"
      }
   });
//text area

   //sider bar
   $('#sibar_category').val('{{$info_search['sibar_category']}}');
   $('#sibar_type').val('{{$info_search['sibar_type']}}');
   $('#sibar_city').val('{{$info_search['sibar_city']}}');
   var district = '{{$info_search['sibar_district']}}';
   if(district !='') $('#display-sibar-district').show();
   $('#sibar_district').val('{{$info_search['sibar_district']}}');
   $('#sibar_area').val('{{$info_search['sibar_area']}}');
   $('#sibar_amount').val('{{$info_search['sibar_amount']}}');
   $('#city').change(function(event){
      event.preventDefault();
      var city_id =  $('#city').val();
      $('#district').empty();
      $('#district')
         .append($("<option></option>")
         .attr("value","")
         .attr("style","color:gray")
         .text("Ch???n Qu???n/Huy???n")
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
                       ); //End $('#sibar-quanhuyen')
                     });//End $.each(result, function(index, val)
                     
                    }//End success
         });//End ajax
   });//End $('#sibar-tinhtp').change(function(event)
   
   
   
   $('#btnsearch').click(function(event) {
         event.preventDefault();
         var data = $('#side_bar').serialize();
         $.ajax({
                    url : "{{asset('dangtin/search')}}",
                    type : 'get',
                    dataType: 'json',
                    data:data,
                    success : function (result){
                         $('.product-lists').empty();
                        $('.product-lists')
                           .append($('<div></div>')
                           .attr('class','row')
                           .attr('id','product_row')
                           );
                           var i=0;
                           var total=0;
                        $.each(result, function(index, result1) {
                           $.each(result1, function(index1, val1) {
                              i = i+1;
                              if(i==1) total = val1.total;
                              $('#product_row')
                                 .append($('<div></div>')
                                 .attr('class','col-sm-3 product-item')
                                 .attr('id','id_product_item'+i)
                                 );
                              $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','image')
                                 .attr('id','id_image'+i)
                                 
                                 );
                                 $('#id_image'+i)
                                 .append($('<a></a>')
                                 .attr('href','#')
                                 .attr('id','ai'+i)
                                 );
                                 $('#ai'+i)
                                 .append($('<img></img>')
                                 .attr('src','{{asset('assets/img/product/1.jpg')}}')
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','title')
                                 .attr('id','title'+i)
                                 );
                                 $('#title'+i)
                                 .append($('<p></p>')
                                 .attr('id','p'+i)
                                 );
                                 $('#p'+i)
                                 .append($('<a></a>')
                                 .text(val1.title)
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','area'+i)
                                 );
                                 $('#area'+i)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','area_icon'+i)
                                 );
                                 $('#area_icon'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-th-large')
                                 );
                                 $('#area'+i)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.area+' m2')
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','amount'+i)
                                 );
                                 $('#amount'+i)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','amount_icon'+i)
                                 );
                                 $('#amount_icon'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-usd')
                                 );
                                 $('#amount'+i)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.amount+' '+val1.amount_unit)
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','district'+i)
                                 );
                                 $('#district'+i)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','district_icon'+i)
                                 );
                                 $('#district_icon'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-map-marker')
                                 );
                                 $('#district'+i)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.district+', '+val1.city)
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('data-toggle','tooltip')
                                 .attr('data-placement','bottom')
                                 .attr('title','Ng??y ????ng')
                                 .attr('id','startdate'+i)
                                 );
                                 $('#startdate'+i)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','startdate_icon'+i)
                                 );
                                 $('#startdate_icon'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-time')
                                 );
                                 $('#startdate'+i)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.startdate)
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','row tools')
                                 .attr('id','tools'+i)
                                 );
                                 $('#tools'+i)
                                 .append($('<div></div>')
                                 .attr('class','col-sm-offset-1 col-sm-1 icon-edit')
                                 .attr('id','icon-edit'+i)
                                 );
                                 $('#icon-edit'+i)
                                 .append($('<a></a>')
                                 .attr('class','')
                                 .attr('id','edit'+i)
                                 .attr('title','S???a')
                                 .attr('href','{{asset('dangtin/edit')}}/'+val1.id)
                                 );
                                 $('#edit'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-edit')
                                 );
                                 $('#tools'+i)
                                 .append($('<div></div>')
                                 .attr('class','col-sm-offset-1 col-sm-1 icon-remove')
                                 .attr('id','icon-remove'+i)
                                 );
                                 $('#icon-remove'+i)
                                 .append($('<a></a>')
                                 .attr('class','')
                                 .attr('data-toggle','modal')
                                 .attr('data-target','#modal'+i)
                                 .attr('href','#')
                                 .attr('id','remove'+i)
                                 .attr('title','remove')
                                 );
                                 $('#remove'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-trash')
                                 );
                                 $('#tools'+i)
                                 .append($('<div></div>')
                                 .attr('class','modal fade')
                                 .attr('id','modal'+i)
                                 .attr('tabindex','-1')
                                 .attr('role','dialog')
                                 .attr('aria-hidden','true')
                                 .attr('aria-labelledby','myModalLabel')
                                 );
                                 $('#modal'+i)
                                 .append($('<div></div>')
                                 .attr('class','modal-dialog')
                                 .attr('id','modaldialog'+i)
                                 );
                                 $('#modaldialog'+i)
                                 .append($('<div></div>')
                                 .attr('class','modal-content')
                                 .attr('id','modalcontent'+i)
                                 );
                                 $('#modalcontent'+i)
                                 .append($('<div></div>')
                                 .attr('class','modal-header')
                                 .attr('id','modalheader'+i)
                                 );
                                 $('#modalheader'+i)
                                 .append($('<button></button>')
                                 .attr('type','button')
                                 .attr('class','close')
                                 .attr('data-dismiss','modal')
                                 .attr('aria-label','Close')
                                 .attr('class','close')
                                 .attr('id','buttonmodal'+i)
                                 );
                                 $('#buttonmodal'+i)
                                 .append($('<span></span>')
                                 .attr('aria-hidden','true')
                                 .text('&times;')
                                 );
                                 $('#modalheader'+i)
                                 .append($('<h4></h4>')
                                 .attr('type','button')
                                 .attr('class','modal-title')
                                 .text('X??a Tin')
                                 .attr('id','myModalLabel'+i)
                                 );
                                 $('#modalcontent'+i)
                                 .append($('<div></div>')
                                 .attr('class','modal-body')
                                 .text('B???n c?? ch???c mu???n x??a tin n??y?')
                                 );
                                 $('#modalcontent'+i)
                                 .append($('<div></div>')
                                 .attr('class','modal-footer')
                                 .attr('id','modalfooter'+i)
                                 );
                                 $('#modalfooter'+i)
                                 .append($('<a></a>')
                                 .attr('class','btn btn-default')
                                 .attr('href','{{asset('dangin/delete')}}/'+val1.id)
                                 .text('Delete')
                                 );
                                  $('#modalfooter'+i)
                                 .append($('<button></button>')
                                 .attr('class','btn btn-primary')
                                 .attr('type','button')
                                 .attr('data-dismiss','modal')
                                 .text('Cancel')
                                 );
                                  
                           });//End $.each(result1, function(index1, val1)
                     });//End $.each(result, function(index, val)
                     
                        $('.btnpage').empty();
                        //append btnpage
                        $('.btnpage')
                           .append($('<button></button>')
                                  .attr('class','btn btn-link first btn-pagination')
                                  .attr('type','button')
                                  .attr('id','first')
                                  .text('?????u ti??n')
                           );
                        $('.btnpage')
                           .append($('<button></button>')
                                  .attr('class','btn btn-link pre btn-pagination')
                                  .attr('type','button')
                                  .attr('id','pre')
                                  .html('<i class="glyphicon glyphicon-hand-left"></i>')
                           );
                           for (var i = 1; i <= total; i++) {
                              if(i==1) {
                                 $('.btnpage')
                                 .append($('<button></button>')
                                  .attr('class','btn btn-link page btn-pagination')
                                  .attr('type','button')
                                  .attr('id',i)
                                  .html(i)
                                 );
                              }
                              else {
                                 $('.btnpage')
                                 .append($('<button></button>')
                                  .attr('class','btn btn-link btn-pagination')
                                  .attr('type','button')
                                  .attr('id',i)
                                  .html(i)
                                 );
                              }
                                                   
                           };
                           $('.btnpage')
                           .append($('<button></button>')
                                  .attr('class','btn btn-link next btn-pagination')
                                  .attr('type','button')
                                  .attr('id','next')
                                 .html('<i class="glyphicon glyphicon-hand-right"></i>')
                           );
                        $('.btnpage')
                           .append($('<button></button>')
                                  .attr('class','btn btn-link end btn-pagination')
                                  .attr('type','button')
                                  .attr('id','end')
                                  .text('Cu???i')
                                  
                           );
                           //End append btnpage
                    
                    }//End success
         });//End ajax
   });

   //End search sider bar
   

$(".btn-pagination").click(function(event) {
    event.preventDefault();
   var page = this.id;
   if($('#elemId').length){
      var sortby = $('#sortby').val();
   }
   else var sortby=0;
   var sibar_category = $('#sibar_category').val();
   var sibar_type = $('#sibar_type').val();
   var sibar_city = $('#sibar_city').val();
   var sibar_district = $('#sibar_district').val();
   var sibar_area = $('#sibar_area').val();
   var sibar_amount = $('#sibar_amount').val();
   var currentpage = $('#currentpage').val();
   if(page=='first') page =1;
   else if(page=='pre') page =currentpage -1;
   else if(page=='next') page = parseInt(currentpage) +1;
   else if(page=='end') page =totalpage;
   if($.isNumeric(page)){
      $('.process').show();
     $.ajax({
                       url : "{{asset('dangtin/load')}}",
                       type : 'post',
                       dataType: 'json',
                       data: {'page':page,'sortby':sortby,'sibar_category':sibar_category,'sibar_type':sibar_type,'sibar_city':sibar_city,'sibar_district':sibar_district,'sibar_area':sibar_area,'sibar_amount':sibar_amount},
                       success : function (result){
                           $( "button" ).removeClass( "page" );
                           if(page>1 && page < totalpage){
                              $('.first').show();
                              $('.pre').show();
                              $('.next').show();
                              $('.end').show();
                           }
                           else if(page==1){
                              $('.first').hide();
                              $('.pre').hide();
                              $('.next').show();
                              $('.end').show();
                           }
                           else if(page==totalpage){
                              $('.next').hide();
                              $('.end').hide();
                              $('.first').show();
                              $('.pre').show();
                           }
                           $('#currentpage').val(page);
                           $('#'+page).addClass('page');
                           $('.product-lists').empty();
                           $('.product-lists')
                              .append($('<div></div>')
                              .attr('class','row')
                              .attr('id','product_row')
                              );
                              var i=0;
                           $.each(result, function(index, result1) {
                              $.each(result1, function(index1, val1) {
                                 i = i+1;
                                 $('#product_row')
                                    .append($('<div></div>')
                                    .attr('class','col-sm-3 product-item')
                                    .attr('id','id_product_item'+i)
                                    );
                                 $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','image')
                                    .attr('id','id_image'+i)
                                    
                                    );
                                    $('#id_image'+i)
                                    .append($('<a></a>')
                                    .attr('href','{{Asset('dangtin/chitiet')}}'+'/'+val1.name+'-'+val1.id)
                                    .attr('id','ai'+i)
                                    );
                                    $('#ai'+i)
                                    .append($('<img></img>')
                                    .attr('src','{{asset('assets/img')}}'+'/'+val1.image)
                                    );
                                    $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','title')
                                    .attr('id','title'+i)
                                    );
                                    $('#title'+i)
                                    .append($('<p></p>')
                                    .attr('id','p'+i)
                                    );
                                    $('#p'+i)
                                    .append($('<a></a>')
                                    .attr('href','{{Asset('dangtin/chitiet')}}'+'/'+val1.name+'-'+val1.id)
                                    .text(val1.title)
                                    );
                                    $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','address')
                                    .attr('id','area'+i)
                                    );
                                    $('#area'+i)
                                    .append($('<div></div>')
                                    .attr('class','icon')
                                    .attr('id','area_icon'+i)
                                    );
                                    $('#area_icon'+i)
                                    .append($('<i></i>')
                                    .attr('class','glyphicon glyphicon-th-large')
                                    );
                                    $('#area'+i)
                                    .append($('<div></div>')
                                    .attr('class','info')
                                    .text(val1.area+' m2')
                                    );
                                    $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','address')
                                    .attr('id','amount'+i)
                                    );
                                    $('#amount'+i)
                                    .append($('<div></div>')
                                    .attr('class','icon')
                                    .attr('id','amount_icon'+i)
                                    );
                                    $('#amount_icon'+i)
                                    .append($('<i></i>')
                                    .attr('class','glyphicon glyphicon-usd')
                                    );
                                    $('#amount'+i)
                                    .append($('<div></div>')
                                    .attr('class','info')
                                    .text(val1.amount+' '+val1.amount_unit)
                                    );
                                    $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','address')
                                    .attr('id','district'+i)
                                    );
                                    $('#district'+i)
                                    .append($('<div></div>')
                                    .attr('class','icon')
                                    .attr('id','district_icon'+i)
                                    );
                                    $('#district_icon'+i)
                                    .append($('<i></i>')
                                    .attr('class','glyphicon glyphicon-map-marker')
                                    );
                                    $('#district'+i)
                                    .append($('<div></div>')
                                    .attr('class','info')
                                    .text(val1.district+', '+val1.city)
                                    );
                                    $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','address')
                                    .attr('data-toggle','tooltip')
                                    .attr('data-placement','bottom')
                                    .attr('title','Ng??y ????ng')
                                    .attr('id','startdate'+i)
                                    );
                                    $('#startdate'+i)
                                    .append($('<div></div>')
                                    .attr('class','icon')
                                    .attr('id','startdate_icon'+i)
                                    );
                                    $('#startdate_icon'+i)
                                    .append($('<i></i>')
                                    .attr('class','glyphicon glyphicon-time')
                                    );
                                    $('#startdate'+i)
                                    .append($('<div></div>')
                                    .attr('class','info')
                                    .text(val1.startdate)
                                    );
                                    $('#id_product_item'+i)
                                    .append($('<div></div>')
                                    .attr('class','row tools')
                                    .attr('id','tools'+i)
                                    );
                                    $('#tools'+i)
                                    .append($('<div></div>')
                                    .attr('class','col-sm-offset-1 col-sm-1 icon-edit')
                                    .attr('id','icon-edit'+i)
                                    );
                                    $('#icon-edit'+i)
                                    .append($('<a></a>')
                                    .attr('class','')
                                    .attr('id','edit'+i)
                                    .attr('title','S???a')
                                    .attr('href','{{asset('dangtin/edit')}}/'+val1.name+'-'+val1.id)
                                    );
                                    $('#edit'+i)
                                    .append($('<i></i>')
                                    .attr('class','glyphicon glyphicon-edit')
                                    );
                                    $('#tools'+i)
                                    .append($('<div></div>')
                                    .attr('class','col-sm-offset-1 col-sm-1 icon-remove')
                                    .attr('id','icon-remove'+i)
                                    );
                                    $('#icon-remove'+i)
                                    .append($('<a></a>')
                                    .attr('class','')
                                    .attr('data-toggle','modal')
                                    .attr('data-target','#modal'+i)
                                    .attr('href','#')
                                    .attr('id','remove'+i)
                                    .attr('title','remove')
                                    );
                                    $('#remove'+i)
                                    .append($('<i></i>')
                                    .attr('class','glyphicon glyphicon-trash')
                                    );
                                    $('#tools'+i)
                                    .append($('<div></div>')
                                    .attr('class','modal fade')
                                    .attr('id','modal'+i)
                                    .attr('tabindex','-1')
                                    .attr('role','dialog')
                                    .attr('aria-hidden','true')
                                    .attr('aria-labelledby','myModalLabel')
                                    );
                                    $('#modal'+i)
                                    .append($('<div></div>')
                                    .attr('class','modal-dialog')
                                    .attr('id','modaldialog'+i)
                                    );
                                    $('#modaldialog'+i)
                                    .append($('<div></div>')
                                    .attr('class','modal-content')
                                    .attr('id','modalcontent'+i)
                                    );
                                    $('#modalcontent'+i)
                                    .append($('<div></div>')
                                    .attr('class','modal-header')
                                    .attr('id','modalheader'+i)
                                    );
                                    $('#modalheader'+i)
                                    .append($('<button></button>')
                                    .attr('type','button')
                                    .attr('class','close')
                                    .attr('data-dismiss','modal')
                                    .attr('aria-label','Close')
                                    .attr('class','close')
                                    .attr('id','buttonmodal'+i)
                                    );
                                    $('#buttonmodal'+i)
                                    .append($('<span></span>')
                                    .attr('aria-hidden','true')
                                    .html('&times;')
                                    );
                                    $('#modalheader'+i)
                                    .append($('<h4></h4>')
                                    .attr('type','button')
                                    .attr('class','modal-title')
                                    .text('X??a Tin')
                                    .attr('id','myModalLabel'+i)
                                    );
                                    $('#modalcontent'+i)
                                    .append($('<div></div>')
                                    .attr('class','modal-body')
                                    .text('B???n c?? ch???c mu???n x??a tin n??y?')
                                    );
                                    $('#modalcontent'+i)
                                    .append($('<div></div>')
                                    .attr('class','modal-footer')
                                    .attr('id','modalfooter'+i)
                                    );
                                 
                                    $('#modalfooter'+i)
                                    .append($('<a></a>')
                                    .attr('class','btn btn-default')
                                    .attr('href','{{asset('dangin/delete')}}/'+val1.id)
                                    .text('Delete')
                                    );
                                     $('#modalfooter'+i)
                                    .append($('<button></button>')
                                    .attr('class','btn btn-primary')
                                    .attr('type','button')
                                    .attr('data-dismiss','modal')
                                    .text('Cancel')
                                    );
                                     
                              });//End $.each(result1, function(index1, val1)
                        });//End $.each(result, function(index, val)
                        $('.process').hide();
                        
     
                           //$(".product-item").animate({ scrollTop: 0 }, "slow");
                       }//End success
            });//End ajax
         }//End if is number
});

 @yield('js')

   //End pagination
</script>

</html>