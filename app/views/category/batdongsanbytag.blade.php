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
          
               
         @include('category.links')
           <h3 class="h-color">{{$data['tagname']}}</h3>
         <!--end .links-->
          <!--sort
         @include('category.sort')
         -End sort-->
        
         @include('category.productlist')
         @include('category.paginationtag')
                 @include('template.quangcaolamdep')
         
        
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
      
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.quangcaovnexpress')
         @include('template.flagcounter')
      @include('template.quangcaomicrosoft')
      @include('template.quangcaobosuutap')
         
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

  
  