

<div class="col-sm-12 batdongsannoibat" id="product_row">
   <div class='col-sm-12 category-batdongsannoibat'>
      <span class='span-batdongsannoibat'>BẤT ĐỘNG SẢN NỔI BẬT</span>
   </div>
   @if(!empty($list_vip))
   <?php $i=0;?>
   @foreach($list_vip as $product)
   <?php $i++;?>
   <div class="col-sm-6 content-batdongsannoibat " id="id_product_item{{$i}}">
      <div class="col-sm-12 item-batdongsannoibat hvr-glow hvr-overline-from-center">
         <div class="col-sm-4 image-batdongsannoibat" id="id_image{{$i}}">
            <div class="row ">
               <a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
               @if(!empty($product['image']))
               <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-batdongsannoibat" alt="{{$product['name']}}"/>
               @else
               <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
               @endif
               </a>
            </div>
         </div>
         <div class="col-sm-8" id='title{{$i}}'>
            <div class="row title-batdongsannoibat">
               <div class="col-sm-12 info">
               @if(strlen($product['title']) <'75')
                  <p id='p{{$i}}'><a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-red'>{{$product['title']}}</span></a></p>
               @else
               <?php
                  $title = substr($product['title'],0,70);
                  $pos= strrpos($title," ");
                  $title = substr($title,0,$pos);

               ?>
                  <p id='p{{$i}}'><a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-red'>{{$title}}...</span></a></p>
                  
               @endif
               

               </div>
               <div class="col-sm-5 info">
                  <span class='span-bold'>DT:</span> <span>{{$product['area']}}m<sup>2</sup></span>
               </div>
               <div class="col-sm-7 info">
               <span class='span-bold'>Giá:</span>
                     <span class='span-bold-red'>
                 {{$product['amount']}}
                 {{$product['amount_unit']}}
                  </span>
               </div>
               <div class="col-sm-12 info">
                  <span class='span-bold'>
                  {{$product['district']}}, {{$product['city']}}
                   </span>
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

