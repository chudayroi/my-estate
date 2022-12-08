   <div class="form-batdongsanbytag">
   @if(!empty($list))
   <?php $i=0;?>
   @foreach($list as $product)
   <?php $i++;?>
   <div class="col-sm-12 batdongsanbytag hvr-glow hvr-box-shadow-inset hvr-overline-from-center" id="id_batdongsanbytag{{$product['id']}}">
      <div class="col-sm-12 item-batdongsanbytag " id ="id_item_batdongsanbytag{{$product['id']}}">
         <div class="col-sm-2 image-batdongsanbytag" id="id_image_batdongsanbytag{{$product['id']}}">
            <div class="row ">
               <a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
               @if(!empty($product['image']))
               <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-batdongsanbytag" alt="{{$product['name']}}"/>
               @else
               <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
               @endif
               </a>
            </div>
         </div>
         <div class="col-sm-10" id='title{{$product['id']}}'>
            <div class="row title-batdongsanbytag" id="id_title_batdongsanbytag{{$product['id']}}">
               <div class="col-sm-12 content-title-batdongsanthuong" id="id_content-title-batdongsanthuong{{$i}}">
                  <a  class="link" id= "id_link" href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-blue'>{{$product['title']}}</span></a>
               </div>
                 <div class="col-sm-2 info2">
                  <span class='span-bold'>DT:</span> <span>{{$product['area']}}m<sup>2</sup></span>
              
               </div>
                <div class="col-sm-2 info2">
               <span class='span-bold'>Giá:</span>
                     <span class='span-bold-red'>
                 {{$product['amount']}}
                 
                  {{$product['amount_unit']}}
                  </span>
               </div>
               <div class="col-sm-3 info2">
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

   
<!--End .row-->

