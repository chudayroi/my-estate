

<div class="col-sm-12 duannoibat" id="product_row">
   <div class='col-sm-12 category-duannoibat'>
      <span class='span-duannoibat'>DỰ ÁN NỔI BẬT</span>
   </div>
   @if(!empty($projects))
   <?php $i=0;?>
   @foreach($projects as $product)
   <?php $i++;?>
   <div class="col-sm-4 content-duannoibat " id="id_product_item{{$i}}">
      <div class="col-sm-12 item-duannoibat hvr-glow hvr-overline-from-center">
         <div class=" image-duannoibat ">
            <a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
            @if(!empty($product['image']))
            <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-duannoibat" alt="{{$product['name']}}"/>
            @else
            <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
            @endif
            </a>
         </div>
         <div class="info">
            <p id='p{{$i}}'><a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-red'>{{$product['title']}}</span></a></p>
         </div>
         <div class="info">
            <span class='span-bold'>
            {{$product['district']}}, {{$product['city']}}
            </span>
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

