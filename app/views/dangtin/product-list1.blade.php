   <div class="form-batdongsanbytag">
   @if(!empty($list))
   <?php $i=0;?>
   @foreach($list as $product)
   <?php $i++;?>
   <div class="col-sm-12 batdongsanbytag hvr-glow hvr-box-shadow-inset hvr-overline-from-center" id="id_batdongsanbytag{{$product['id']}}">
      <div class="col-sm-12 item-batdongsanbytag " id ="id_item_batdongsanbytag{{$product['id']}}">
            <div class="col-sm-12 content-title-batdongsanbytag" id ="id_content_title_batdongsanbytag{{$product['id']}}">
                  <a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-blue'>{{$product['title']}}</span></a>
            </div>
         <div class="col-sm-2 image-batdongsanbytag" id="id_image_batdongsanbytag{{$product['id']}}">
            <div class="row ">
               <a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$product['id']}}">
               @if(!empty($product['image']))
               <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-batdongsanbytag" alt="{{$product['name']}}"/>
               @else
               <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
               @endif
               </a>
            </div>
         </div>
         <div class="col-sm-10" id='title{{$product['id']}}'>
            <div class="row title-batdongsanbytag">
               
                 <div class="col-sm-2 info2">
                  <span class='span-bold'>DT:</span> <span>{{$product['area']}}m<sup>2</sup></span>
              
               </div>
                <div class="col-sm-2 info2">
               <span class='span-bold'>Giá:</span>
                     <span class='span-bold-red'>
                  <?php 
                     if($product['amount_unit']=='tỷ') echo $product['amount']/1000;
                     else echo $product['amount'];
                     ?>
                  {{$product['amount_unit']}}
                  </span>
               </div>
               <div class="col-sm-8 info2">
                  <span class='span-bold'>
                  {{$product['district']}}, {{$product['city']}}
                   </span>
               </div>
               <div class="row col-sm-12 date-time ">
               	<div class="col-sm-5 info2">
                  <span class='span-bold'>Ngày đăng: 12 123 123123 1312</span>
              
               </div>
               	<div class="col-sm-5 info2">
                  <span class='span-bold'>Ngày Up: 1231 12312 12312</span>
               </div>
					
               </div>
				<div class="col-sm-12 tools" id="tools{{$product['id']}}">
					<div class="col-sm-2 icon-edit" id="icon-edit{{$product['id']}}">
						<a class="" id="edit{{$product['id']}}" title="Sửa" href="{{asset('dangtin/edit')}}/{{$product['name']}}-{{$product['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
					</div>
					<div class="col-sm-2 icon-up" id="icon-up{{$product['id']}}">
						<a class="btn-up" id="up{{$product['id']}}" title="Up" href="#"><i class="glyphicon glyphicon-arrow-up"></i></a>
					</div>
					<div class="col-sm-2 icon-remove" id="icon-remove{{$product['id']}}">
						<a class="btn-delete" id="remove{{$product['id']}}" href="#"><i class="glyphicon glyphicon-trash"></i></a>
					</div>
				</div>

            </div>
         </div>
        
      </div>
      </div>
  
   <!--end .product-item-->
   @endforeach
   @else
   <div class="col-sm-12"><span style="color:red">Không tìm thấy!</span></div>
   @endif
      </div>
<script type="text/javascript" >
var totalpage = {{$totalpage}};
$(document).ready(function(){
	$(".btn-delete").click(function(event) {
        event.preventDefault();
        var id = this.id;
         id = id.replace("remove", ""); 
         $.ajax({
            url : "{{asset('dangtin/delete')}}",
            type : 'post',
            dataType: 'json',
            data: {'id':id},
            success : function (result){
            	$('#id_item_batdongsanbytag'+id).hide();
              console.log('id_batdongsanbytag'+id);
            }
        });
    });
	$(".btn-up").click(function(event) {
         event.preventDefault();
        var id = this.id;
        id = id.replace("up", ""); 
         $.ajax({
            url : "{{asset('dangtin/up')}}",
            type : 'post',
            dataType: 'json',
            data: {'id':id},
            success : function (result){
            	$('#up'+id).hide();
            }
        });
    });
 });
   //sear
</script>
   
<!--End .row-->

