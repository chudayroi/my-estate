

@extends('template.basic')
@section('slider')
@include('template.slider')
@endsection
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-12 search-kinhnghiem">
         @include('template.search')
         @include('template.kinhnghiem')
      </div>
   </div>
   <div class="row">
      <div class="col-sm-9 main-content">
         <!--project-->
         @include('template.batdongsannoibat')
         @include('template.batdongsanthuong')
         @include('template.duannoibat')
         
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
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
   @include('template.batdongsantinhtp')
</div>
<!--End .container-->
<!--End .news-->
@endsection

