<div class="col-sm-12 content-pagination">

@if($totalpage>0)
<div class="pagination">
<div class="row">
<input type="text"  style="display:none" class="form-control" id="currentpage"  name="currentpage" value="1" placeholder="">
</div>
            
<div class="row">
<div class="btn-group btn-group-sm btnpage" role="group" aria-label="...">
<button id="first" type="button" class="btn btn-link first btn-pagination">Đầu tiên</button>
<button id= "pre" type="button" class="btn btn-link pre btn-pagination"><i class="glyphicon glyphicon-hand-left"></i></button>
@for($i=1;$i<=$totalpage;$i++)
@if($i==1)
<button id="{{$i}}" type="button" class="btn btn-link page btn-pagination">{{$i}}</button>
@else
<button id="{{$i}}"type="button" class="btn btn-link btn-pagination">{{$i}}</button>
@endif
@endfor
@if($totalpage>1)
<button id="next" type="button" class="btn btn-link next btn-pagination"><i class="glyphicon glyphicon-hand-right"></i></button>
<button id="end" type="button" class="btn btn-link end btn-pagination">Cuối</button>
@endif
</div>
<span class="process" >Loading</span>

</div>
</div>
@endif
@section('js')
var totalpage = {{$totalpage}};
@endSection
</div>

<script type="text/javascript">
 //sider bar
 
    $('#sibar_category').val('{{$info_search['sibar_category']}}');
    $('#sibar_type').val('{{$info_search['sibar_type']}}');
    $('#sibar_city').val('{{$info_search['sibar_city']}}');
    var district = '{{$info_search['sibar_district']}}';
    if(district !='') $('#display-sibar-district').show();
    $('#sibar_district').val('{{$info_search['sibar_district']}}');
    $('#sibar_area').val('{{$info_search['sibar_area']}}');
    $('#sibar_amount').val('{{$info_search['sibar_amount']}}');
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
   var sibar_street = $('#sibar_street').val();
   var sibar_area = $('#sibar_area').val();
   var sibar_amount = $('#sibar_amount').val();
   var currentpage = $('#currentpage').val();
   if(page=='first') page = '1';
   else if(page=='pre') page =parseInt(currentpage) -1;
   else if(page=='next') page = parseInt(currentpage) +1;
   else if(page=='end') page =totalpage;
   if($.isNumeric(page)){
      $('.process').show();
     $.ajax({
                       url : "{{asset('dangtin/load')}}",
                       type : 'post',
                       dataType: 'json',
                       data: {'page':page,'sortby':sortby,'sibar_category':sibar_category,'sibar_type':sibar_type,'sibar_city':sibar_city,'sibar_district':sibar_district,'sibar_street':sibar_street,'sibar_area':sibar_area,'sibar_amount':sibar_amount},
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
                           $('.form-batdongsanthuong').empty();
                          
                            var i=0;
                           $.each(result, function(index, result1) {
                              $.each(result1, function(index1, val1) {
                              	i = i+1;
                                var amount;
	                            amount = val1.amount;
	                             $('.form-batdongsanthuong')
	                              .append($('<div></div>')
	                              .attr('class','col-sm-12 content-batdongsanthuong')
	                              .attr('id','id_content_batdongsanthuong'+val1.id)
	                              );
	                             $('#id_content_batdongsanthuong'+val1.id)
	                              .append($('<div></div>')
	                              .attr('class','col-sm-12 item-batdongsanthuong hvr-glow hvr-box-shadow-inset hvr-overline-from-center')
	                              .attr('id','id_item_batdongsanthuong'+val1.id)
	                              );
	                               $('#id_item_batdongsanthuong'+val1.id)
	                              .append($('<div></div>')
	                              .attr('class','col-sm-12 content-title-batdongsanthuong')
	                              .attr('id','id_content-title-batdongsanthuong'+val1.id)
	                              );
	                               $('#id_content-title-batdongsanthuong'+val1.id)
	                              .append($('<a></a>')
	                              .attr('class','link')
	                              .attr('id','id_link'+val1.id)
                                  .attr('href','{{Asset('/')}}'+val1.category_title+'/'+val1.city_title+'/'+val1.name+'-'+val1.id)
	                              );
	                              $('#id_link'+val1.id)
	                              .append($('<span></span>')
	                              .attr('class','span-bold-blue')
	                              .text(val1.title)
                                  );
                                   $('#id_item_batdongsanthuong'+val1.id)
	                              .append($('<div></div>')
	                              .attr('class','col-sm-2 image-batdongsanthuong')
	                              .attr('id','id_image_batdongsanthuong'+val1.id)
	                              );
	                              $('#id_image_batdongsanthuong'+val1.id)
	                              .append($('<div></div>')
	                              .attr('class','row 1')
	                              .attr('id','id_row'+val1.id)
	                              );
	                              $('#id_row'+val1.id)
	                              .append($('<a></a>')
	                              .attr('id','ai_batdongsanthuong'+val1.id)
                                  .attr('href','{{Asset('/')}}'+val1.category_title+'/'+val1.city_title+'/'+val1.name+'-'+val1.id)
	                              );
	                              
                                    
                                   if(val1.image.length != 0){
                                        $('#ai_batdongsanthuong'+val1.id)
                                      .append($('<img></img>')
                                      .attr('class','img-responsive')
                                      .attr('alt',val1.name)
                                      .attr('src','{{asset('assets/img')}}'+'/'+val1.image)

                                      );
                                    }
                                     else{
                                       $('#ai_batdongsanthuong'+val1.id)
                                      .append($('<img></img>')
                                      .attr('class','img-responsive img-category')
                                      .attr('alt',val1.name)
                                      .attr('src','{{asset('assets/img')}}'+'/'+'tinbatdongsan.png')
                                      );
                                    }
                                   $('#id_item_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','col-sm-10')
		                              .attr('id','id_detail_batdongsanthuong'+val1.id)
	                              );
		                           $('#id_detail_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','col-sm-10')
		                              .attr('id','id_detail_batdongsanthuong'+val1.id)
	                              );
		                           $('#id_detail_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','row title-batdongsanthuong')
		                              .attr('id','id_title_batdongsanthuong'+val1.id)
	                              );
		                          $('#id_detail_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','row title-batdongsanthuong')
		                              .attr('id','id_title_batdongsanthuong'+val1.id)
	                              );
		                          $('#id_title_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','col-sm-12 info1')
		                              .attr('id','id_info1_batdongsanthuong'+val1.id)
	                              );
		                          $('#id_info1_batdongsanthuong'+val1.id)
		                              .append($('<span></span>')
		                              .attr('class','span-small-font')
	                              	  .text(val1.title)
	                              );
		                            $('#id_title_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','col-sm-2 info')
		                              .attr('id','id_area_info_batdongsanthuong'+val1.id)
	                              );
		                           $('#id_area_info_batdongsanthuong'+val1.id)
		                              .append($('<span></span>')
		                              .attr('class','span-bold')
	                              	  .text('DT: ')
	                              );
		                           
		                          $('#id_area_info_batdongsanthuong'+val1.id)
		                              .append($('<span></span>')
		                              .attr('id','id_area'+val1.id)
	                              	  .text(val1.area+'m')
	                              );
		                          $('#id_area'+i)
		                              .append($('<sup></sup>')
	                              	  .text('2')
	                              );
		                          $('#id_title_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','col-sm-2 info')
		                              .attr('id','id_amount_info_batdongsanthuong'+val1.id)
	                              );
		                           $('#id_amount_info_batdongsanthuong'+val1.id)
		                              .append($('<span></span>')
		                              .attr('class','span-bold')
	                              	  .text('Giá: ')
	                              );
		                           
		                          $('#id_amount_info_batdongsanthuong'+val1.id)
		                              .append($('<span></span>')
		                              .attr('id','id_area'+val1.id)
		                              .attr('class','span-bold-red')
	                              	  .text(amount+val1.amount_unit)
	                              );
		                           $('#id_title_batdongsanthuong'+val1.id)
		                              .append($('<div></div>')
		                              .attr('class','col-sm-5 info')
		                              .attr('id','id_where_info_batdongsanthuong'+val1.id)
	                              );
		                         $('#id_where_info_batdongsanthuong'+val1.id)
		                              .append($('<span></span>')
		                              .attr('class','span-bold')
                                    .text(val1.district+', '+val1.city)
	                              	  
	                              );
                                  
                                  
                              });//End $.each(result1, function(index1, val1)
                        });//End $.each(result, function(index, val)
                          
						 $('.process').hide();
                        setTimeout(function() {
                              $("html, body").animate({ scrollTop: 1000 }, "slow");
                           }, 2000);
                           //$(".product-item").animate({ scrollTop: 0 }, "slow");
                       }//End success
            });//End ajax
         }//End if is number
});

</script>