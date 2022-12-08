<!DOCTYPE html>
<html lang="">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" type="image/x-icon"  href="{{Asset('assets/icon/favicon.ico')}}">
        <title>
           Dat Nha Be|Dat Nha Be Dau Tu Gia Re|Dat Mat Tien Duong Nha Be Gia Re|Dat Nha Be Dien Tich Lon Gia Re|Dat Dien Tich Lon Nha Be|Dat Nha Be Xay Biet Thu Vuon Gia Re|Dat Duong Long Thoi Nha Be Gia Re|Dat Mat Tien Long Thoi Nha Be Gia Re|Dat Duong Xuong Ca Long Thoi Nha Be|Dat Duong Le Van Luong|Dat Duong Nguyen Van Tao|Dat Duong Long Thoi Nha Be |Dat Xay Phong Tro Nha Be|Dat Nha Be Gan Quan 7| Dat Nha Be Lien Ke Phu My Hung| Tin Tuc Bat Dong San| Tin Tuc Nha Dat| Mua Ban Dat Va Nha Nha Be Gia Re 
        </title>
        <meta name="description" content="Chuyen mua ban, tu van dau tu bat dong san nha be gia re,dat nha be xay biet thu vuon , dat long thoi xay phong tro, dat nha be dau tu gia re, dat nha be dien tich lon gia re, tai: khu do thi cang Hiep Phuoc, Tan Cang Hiep Phuoc,  duong le van luong, nguyen van tao, long thoi nhon duc, huynh tan phat, phuoc kien, mat tien duong kinh doanh nha be, nha va dat nha be gia re"/>
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
$(document).ready(function(){

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
          $('#display-sibar-district').show();
          $.ajax({
                    url : "{{asset('first/loadMapCity')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{city_id:city_id},
                    success : function (result){
                     // $.each(result, function(index, val) {
                      var lt =result['lt'];
                      var lg = result['lg'];
                      map.setView(new L.LatLng(lt,lg), 14);
                     //});//End $.each(result, function(index, val)
                     
                     
                    }//End success
         });//End ajax
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

    //side bar
   
   $('#district').change(function(event){
//alert(123);
    event.preventDefault();
     var district_id =  $('#district').val();
     $('#street_id').empty();
        $('#street_id')
            .append($("<option></option>")
            .attr("value","")
            .attr("style","color:gray")
            .text("Chọn Đường")
            ); //End $('#sibar-quanhuyen')
        $.ajax({
                    url : "{{asset('first/loadMapDistrict')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{district_id:district_id},
                    success : function (result){
                     // $.each(result, function(index, val) {
                      var lt =result['lt'];
                      var lg = result['lg'];
                      map.setView(new L.LatLng(lt,lg), 14);
                     //});//End $.each(result, function(index, val)
                     
                     
                    }//End success
         });//End ajax

         $.ajax({
                    url : "{{asset('first/loadStreet')}}",
                    type : 'get',
                    dataType: 'json',
                    data:{district_id:district_id},
                    success : function (result){

                     $.each(result, function(index, val) {
                         $('#street_id')
                           .append($("<option></option>")
                           .attr("value",val.id)
                           .text(val.name)
                       ); //End $('#quanhuyen')
                     });//End $.each(result, function(index, val)
                     
                    }//End success
         });//End ajax
   });//End $('#tinhtp').change(function(event)
   

});

 @yield('js')

   //End pagination
</script>

</html>