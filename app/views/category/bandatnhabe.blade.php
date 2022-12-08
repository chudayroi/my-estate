@extends('category.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
   <div class="row">

      <div class="col-sm-9 content-detail">
         @include('template.tienich')
         <!--End .row-->
            <h3 class="h-color">{{$tag_name}}</h3>
               
         @include('category.links')
         <!--end .links-->
          <!--sort-->
         @include('category.sort')
         <!--End sort-->
         <div class="product-lists">
               @include('category.product-list')
         </div>
         @include('template.pagination') 
         <div class="about">
            <div class="row">

               <div class="col-sm-3 about-w">
                  <div class="form-about">
                     <h3>Giới thiệu</h3>
                     <a href="{{Asset('dat-nha-be-contact')}}" class="btn btn-default">Liên Hệ</a>
                  </div>
               </div>
               <div class="col-sm-9 shop-about">
                  <p>
                     Quốc hội bấm nút thông qua nhiều đạo luật quan trọng về đất đai, lần đầu tiên mở cửa cho người nước ngoài mua nhà, hứa hẹn sẽ tạo động lực mới, với khả năng một lượng vốn ngoại không nhỏ sẽ đổ vào thị trường trong tương lai gần.
                  </p>
               </div>
            </div>
         </div>
         <!--end .about-->
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('category.side-bar')
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div>
<!--End .container-->

@endsection
@section('js')
var totalpage = {{$totalpage}};
@endSection

  
  