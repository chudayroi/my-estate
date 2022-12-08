<div class="col-sm-12 batdongsanthuong" id="id_batdongsanthuong">
   <div class='col-sm-12 category-batdongsanthuong' id='id_category_batdongsanthuong'>
      <span class='span-batdongsanthuong' id="id_span_batdongsanthuong">BẤT ĐỘNG SẢN KHÁC</span>
   </div>
<div class="form-batdongsanthuong" id ="id_form_batdongsanthuong">
   
   @if(!empty($list))
   <?php $i=0;?>
   @foreach($list as $product)
   <?php $i++;?>
   <div class="col-sm-12 content-batdongsanthuong " id="id_content_batdongsanthuong{{$i}}">
      <div class="col-sm-12 item-batdongsanthuong hvr-glow hvr-box-shadow-inset hvr-overline-from-center" id="id_item_batdongsanthuong{{$i}}">
        
         <div class="col-sm-2 image-batdongsanthuong" id="id_image_batdongsanthuong{{$i}}">
            <div class="row" id="id_row{{$i}}">
               <a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
               @if(!empty($product['image']))
               <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-batdongsanthuong" alt="{{$product['name']}}"/>
               @else
               <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
               @endif
               </a>
            </div>
         </div>
         <div class="col-sm-10" id='id_detail_batdongsanthuong{{$i}}'>
            <div class="row title-batdongsanthuong" id='id_title_batdongsanthuong{{$i}}'>
                <div class="col-sm-12 content-title-batdongsanthuong" id="id_content-title-batdongsanthuong{{$i}}">
                  <a  class="link" id= "id_link" href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-blue'>{{$product['title']}}</span></a>
               </div>
               <div class="col-sm-2 info">
                  <span class='span-bold'>DT:</span> <span id="id_area{{$i}}">{{$product['area']}}m<sup>2</sup></span>
               </div>
               <div class="col-sm-2 info">
               <span class='span-bold'>Giá:</span>
                     <span class='span-bold-red'>
                 {{$product['amount']}}
                     
                  {{$product['amount_unit']}}
                  </span>
               </div>
               <div class="col-sm-3 info">
                  <span class='span-bold'>
                  {{$product['district']}}, {{$product['city']}}
                   </span>
               </div>
                <div class="col-sm-2 info3">
               <span class='span-small-font '> {{$product['startdate']}}</span>
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
 
</div>

<!--End .row-->

