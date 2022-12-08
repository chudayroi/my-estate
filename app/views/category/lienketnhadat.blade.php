<div class="col-sm-12 batdongsanthuong" id="product_row">
   <div class='row category-batdongsanthuong'>
      <span class='span-batdongsanthuong'>BẤT ĐỘNG SẢN KHÁC</span>
   </div>
   @if(!empty($list))
   <?php $i=0;?>
   @foreach($list as $product)
   <?php $i++;?>
   <div class="col-sm-12 content-batdongsanthuong " id="id_product_item{{$i}}">
      <div class="col-sm-12 item-batdongsanthuong hvr-glow hvr-box-shadow-inset hvr-overline-from-center">
      <div class="col-sm-12 content-title-batdongsanthuong">
                  <a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-blue'>{{$product['title']}}</span></a>
               </div>
         <div class="col-sm-2 image-batdongsanthuong" id="id_image{{$i}}">
            <div class="row ">
               <a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$i}}">
               @if(!empty($product['image']))
               <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-batdongsanthuong" alt="{{$product['name']}}"/>
               @else
               <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
               @endif
               </a>
            </div>
         </div>
         <div class="col-sm-10" id='title{{$i}}'>
            <div class="row title-batdongsanthuong">
               <div class="col-sm-12 info1">
               <span class='span-small-font'> Bán nhà nằm trong khu dân cư yên tĩnh và ít người qua lại, rất an ninh. Đi ra Big C mất 5p, Bệnh viện 175 mất 7p, công viên Gia Định 10p, gần trường ĐH Công Nghiệp... </span>
               <a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-blue'>Xem chi tiết</span></a>
               
               </div>
               <div class="col-sm-2 info">
                  <span class='span-bold'>DT:</span> <span>{{$product['area']}}m<sup>2</sup></span>
               </div>
               <div class="col-sm-2 info">
               <span class='span-bold'>Giá:</span>
                     <span class='span-bold-red'>
                 {{$product['amount']}}
                 
                  {{$product['amount_unit']}}
                  </span>
               </div>
               <div class="col-sm-5 info">
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

