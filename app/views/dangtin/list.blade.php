@extends('dangtin.basic')

@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-9 content-detail">
         @include('template.tienich')
         @include('dangtin.warning')
         
         @include('dangtin/link-child')
         
         <!--End .row-->
         <div class="row hvr-wobble-horizontal">
            <div class="col-sm-12 page-first">
                  <div   class="arrowLine1 "><span class="title-page-first"></span></div>
                  <div   class="arrowLine">
                  <a href="{{Asset('dangtin/list')}}"><span class="title-page-first">Đăng tin</span></a>
                  </div>
                  <div class="triangle_left"></div>
            </div>
         </div>
   
         <!--end .links-->
         
         @include('dangtin.uptin')
         @include('dangtin.product-list')
        
         
        
         <!--end .about-->
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.flagcounter')
         
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
 
</div>
<!--End .container-->

@endsection




  
  