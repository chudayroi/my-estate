
<!--
<div class="row sort ">
   <form class="form-horizontal">
      <div class="form-group" >
         <label style="padding-left:0px" for="category" class="col-sm-offset-8 col-sm-2 control-label">Sắp xếp</label>
         <div style="padding-left:0px"  class="col-sm-2" >
            <select class="form-control" id="sortby" name="sortby" >
               <option value="1">Thông thường</option>
               <option value="2">Tin mới nhất</option>
               <option value="3">Tin cũ nhất</option>
               <option value="4">Giá cao nhất</option>
               <option value="5">Giá thấp nhất</option>
               <option value="6">Diện tích rộng nhất</option>
               <option value="7">Diện tích thấp nhất</option>
                  
            </select>
         </div>
      </div>
      </form>
</div>
<script type="text/javascript">

var totalpage = {{$totalpage}};
$(document).ready(function(){

   $('#sortby').change(function(event) {
         event.preventDefault();
      $('.process').show();

         var page=1;
         var sortby = $('#sortby').val();
         var sibar_category = $('#sibar_category').val();
         var sibar_type = $('#sibar_type').val();
         var sibar_city = $('#sibar_city').val();
         var sibar_district = $('#sibar_district').val();
         var sibar_area = $('#sibar_area').val();
         var sibar_amount = $('#sibar_amount').val();
         $( "button" ).removeClass("page");
                         $('.product-lists').empty();
                        $('.product-lists')
                           .append($('<div></div>')
                           .attr('class','row')
                           .attr('id','product_row')
                           );
                          
         $.ajax({
                    url : "{{asset('dangtin/load')}}",
                    type : 'post',
                    dataType: 'json',
                    data: {'page':page,'sortby':sortby,'sibar_category':sibar_category,'sibar_type':sibar_type,'sibar_city':sibar_city,'sibar_district':sibar_district,'sibar_area':sibar_area,'sibar_amount':sibar_amount},
                    success : function (result){
                        $( "button" ).removeClass("page");
                         $('.product-lists').empty();
                        $('.product-lists')
                           .append($('<div></div>')
                           .attr('class','row')
                           .attr('id','product_row')
                           );
                          
                           var i=0;
                           var total=0;
                           $('#currentpage').val(page);
                           $('#'+page).addClass('page');
                           if(page==1){
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
                        $.each(result, function(index, result1) {
                           $.each(result1, function(index1, val1) {
                              i = i+1;
                             
                               var amount;
                                if(val1.amount_unit =='tỷ') amount = (parseInt(val1.amount))/1000;
                                else amount = val1.amount;
                                if(i==1)  total = val1.total;
                              $('#product_row')
                                 .append($('<div></div>')
                                 .attr('class','col-sm-4 product-item')
                                 .attr('id','id_product_item'+val1.id)
                                 );
                              $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','image')
                                 .attr('id','id_image'+val1.id)
                                 
                                 );
                                 $('#id_image'+val1.id)
                                 .append($('<a></a>')
                                 .attr('href','{{Asset('dangtin/chitiet')}}'+'/'+val1.name+'-'+val1.id)
                                 .attr('id','ai'+val1.id)
                                 );
                                 $('#ai'+val1.id)
                                 .append($('<img></img>')
                                 .attr('class','img-responsive')
                                 .attr('alt',val1.name)
                                 .attr('src','{{asset('assets/img')}}'+'/'+val1.image)
                                 );
                                 $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','title')
                                 .attr('id','title'+val1.id)
                                 );
                                 $('#title'+val1.id)
                                 .append($('<p></p>')
                                 .attr('id','p'+val1.id)
                                 );
                                 $('#p'+val1.id)
                                 .append($('<a></a>')
                                 .attr('href','{{Asset('dangtin/chitiet')}}'+'/'+val1.name+'-'+val1.id)
                                 .text(val1.title)
                                 );
                                 $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','area'+val1.id)
                                 );
                                 $('#area'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','area_icon'+val1.id)
                                 );
                                 $('#area_icon'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-th-large')
                                 );
                                 $('#area'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.area+' m2')
                                 );
                                 $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','amount'+val1.id)
                                 );
                                 $('#amount'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','amount_icon'+val1.id)
                                 );
                                 $('#amount_icon'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-usd')
                                 );
                                 $('#amount'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.amount+' '+val1.amount_unit)
                                 );
                                 $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','district'+val1.id)
                                 );
                                 $('#district'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','icon1')
                                 .attr('id','district_icon'+val1.id)
                                 );
                                 $('#district_icon'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-map-marker')
                                 );
                                 $('#district'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','info1')
                                 .text(val1.district+', '+val1.city)
                                 );
                                 $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('data-toggle','tooltip')
                                 .attr('data-placement','bottom')
                                 .attr('title','Ngày đăng')
                                 .attr('id','startdate'+val1.id)
                                 );
                                 $('#startdate'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','icon')
                                 .attr('id','startdate_icon'+val1.id)
                                 );
                                 $('#startdate_icon'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-time')
                                 );
                                 $('#startdate'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','info')
                                 .text(val1.startdate)
                                 );
                                 $('#id_product_item'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','row tools')
                                 .attr('id','tools'+val1.id)
                                 );
                                 $('#tools'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','col-sm-offset-1 col-sm-1 icon-edit')
                                 .attr('id','icon-edit'+val1.id)
                                 );
                                 $('#icon-edit'+val1.id)
                                 .append($('<a></a>')
                                 .attr('class','')
                                 .attr('id','edit'+val1.id)
                                 .attr('title','Sửa')
                                 .attr('href','{{asset('dangtin/edit')}}/'+val1.name+'-'+val1.id)
                                 );
                                 $('#edit'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-edit')
                                 );

                                 $('#tools'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','col-sm-1 icon-up')
                                 .attr('id','icon-up'+val1.id)
                                 );
                                 $('#icon-up'+val1.id)
                                 .append($('<a></a>')
                                 .attr('class','btn-up')
                                 .attr('id','up'+val1.id)
                                 .attr('title','Up')
                                 .attr('href','#')
                                 );
                                 $('#up'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-arrow-up')
                                 );

                                 $('#tools'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','col-sm-1 icon-remove')
                                 .attr('id','icon-remove'+val1.id)
                                 );
                                 $('#icon-remove'+val1.id)
                                 .append($('<a></a>')
                                 .attr('class','')
                                 .attr('data-toggle','modal')
                                 .attr('data-target','#modal'+val1.id)
                                 .attr('href','#')
                                 .attr('id','remove'+val1.id)
                                 .attr('title','remove')
                                 );
                                 $('#remove'+val1.id)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-trash')
                                 );
                                 $('#tools'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','modal fade')
                                 .attr('id','modal'+val1.id)
                                 .attr('tabindex','-1')
                                 .attr('role','dialog')
                                 .attr('aria-hidden','true')
                                 .attr('aria-labelledby','myModalLabel')
                                 );
                                 $('#modal'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','modal-dialog')
                                 .attr('id','modaldialog'+val1.id)
                                 );
                                 $('#modaldialog'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','modal-content')
                                 .attr('id','modalcontent'+val1.id)
                                 );
                                 $('#modalcontent'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','modal-header')
                                 .attr('id','modalheader'+val1.id)
                                 );
                                 $('#modalheader'+val1.id)
                                 .append($('<button></button>')
                                 .attr('type','button')
                                 .attr('class','close')
                                 .attr('data-dismiss','modal')
                                 .attr('aria-label','Close')
                                 .attr('class','close')
                                 .attr('id','buttonmodal'+val1.id)
                                 );
                                 $('#buttonmodal'+val1.id)
                                 .append($('<span></span>')
                                 .attr('aria-hidden','true')
                                 .html('&times;')
                                 );
                                 $('#modalheader'+val1.id)
                                 .append($('<h4></h4>')
                                 .attr('type','button')
                                 .attr('class','modal-title')
                                 .text('Xóa Tin')
                                 .attr('id','myModalLabel'+val1.id)
                                 );
                                 $('#modalcontent'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','modal-body')
                                 .text('Bạn có chắc muốn xóa tin này?')
                                 );
                                 $('#modalcontent'+val1.id)
                                 .append($('<div></div>')
                                 .attr('class','modal-footer')
                                 .attr('id','modalfooter'+val1.id)
                                 );
                                 $('#modalfooter'+val1.id)
                                 .append($('<button></button>')
                                 .attr('id',val1.id)
                                 .attr('class','btn btn-default btn-delete')
                                 .attr('data-dismiss','modal')
                                 .attr('type','button')
                                 .text('Delete')
                                 );
                                  $('#modalfooter'+val1.id)
                                 .append($('<button></button>')
                                 .attr('class','btn btn-primary')
                                 .attr('type','button')
                                 .attr('data-dismiss','modal')
                                 .text('Cancel')
                                 );
                                  
                           });//End $.each(result1, function(index1, val1)
                     });//End $.each(result, function(index, val)
                  $('.process').hide();
                     
                    $(".btn-delete").click(function(event) {
                          event.preventDefault();
                          var id = this.id;
                           $.ajax({
                              url : "{{asset('dangtin/delete')}}",
                              type : 'post',
                              dataType: 'json',
                              data: {'id':id},
                              success : function (result){
                                 $('#id_product_item'+id).hide();
                              }
                          });
                      });//End btn-delete
                    }//End success
         });//End ajax
   });

   //End search sider bar
   

});

</script>
 