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
@section('js')

var totalpage = {{$totalpage}};
$(document).ready(function(){
   $('#btnclear').click(function(event) {
         event.preventDefault();
      $('#sibar_category').val('');
      $('#sibar_type').val('');
      $('#sibar_city').val('');
      $('#display-sibar-district').hide();
      $('#sibar_district').val('');
      $('#sibar_area').val('');
      $('#sibar_amount').val('');
   });
   //search  sider-bar
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
                              if(i==1) total = val1.total;
                              $('#product_row')
                                 .append($('<div></div>')
                                 .attr('class','col-sm-4 product-item')
                                 .attr('id','id_product_item'+i)
                                 );
                              $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','image')
                                 .attr('id','id_image'+i)
                                 
                                 );
                                 $('#id_image'+i)
                                 .append($('<a></a>')
                                 .attr('href','{{Asset('/')}}'+val1.category_title+'/'+val1.city_title+'/'+val1.name+'-'+val1.id)
                                 .attr('id','ai'+i)
                                 );
                                  if(val1.image.length != 0){
                                   
                                        $('#ai'+i)
                                      .append($('<img></img>')
                                      .attr('class','img-responsive')
                                      .attr('alt',val1.name)
                                      .attr('src','{{asset('assets/img')}}'+'/'+val1.image)

                                      );
                                    }
                                     else{
                                      $('#ai'+i)
                                      .append($('<img></img>')
                                      .attr('class','img-responsive')
                                      .attr('alt',val1.name)
                                      .attr('src','{{asset('assets/img')}}'+'/'+'tinbatdongsan.png')
                                      );
                                    }
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
                                 .attr('href','{{Asset('/')}}'+val1.category_title+'/'+val1.city_title+'/'+val1.name+'-'+val1.id)
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
                                 .text(amount+' '+val1.amount_unit)
                                 );
                                 $('#id_product_item'+i)
                                 .append($('<div></div>')
                                 .attr('class','address')
                                 .attr('id','district'+i)
                                 );
                                 $('#district'+i)
                                 .append($('<div></div>')
                                 .attr('class','icon1')
                                 .attr('id','district_icon'+i)
                                 );
                                 $('#district_icon'+i)
                                 .append($('<i></i>')
                                 .attr('class','glyphicon glyphicon-map-marker')
                                 );
                                 $('#district'+i)
                                 .append($('<div></div>')
                                 .attr('class','info1')
                                 .text(val1.district+', '+val1.city)
                                 );
                               
                                 
                           });//End $.each(result1, function(index1, val1)
                     });//End $.each(result, function(index, val)
                      $('.process').hide();
                    }//End success
         });//End ajax
   });

   //End search sider bar

});

@endSection
 