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
         <!--end .links-->
           <h3 class="h-color">{{$tag_name}}</h3>
               
          <!--sort-->
         @include('category.sort')
         <!--End sort-->
        
         @include('template.batdongsanbysearch')
         @include('template.paginationbytag')
         
        
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('category.search-sidebar')
         @include('template.quangcaofuland')
         
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.quangcaovnexpress')
         @include('template.flagcounter')
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

  
  