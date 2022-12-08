@extends('tintuc.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
      @include('tintuc.link-category')
    
  <div class="col-sm-6">
  <div class="row">
      <div class="">
    {{$product->startdate}}
  </div>
   <div class="">
    <h4 class="news-title">{{$product->title}}</h4>
  </div>
  <div class="">
    <h5>{{$product->content_summary}}</h5>
  </div>
  <div class="">
    {{$product->content}}
  </div>
  </div>
      @include('template.quangcaovinpearl')

  </div>
  <div class="col-sm-3 news-most-viewed">
    <div class="col-sm-12 most-viewed-top">
      <ul class="list-unstyled most-viewed-title">
        <li>
          <a href="{{Asset('nha-dat')}}" id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
          <span class="viewed-title">Xem nhiều nhất</span>
          </a>
        </li>
      </ul>
    </div><!--End .most-viewed-top-->
    <div class="col-sm-12 most-viewed-link">
      <ul class="list-unstyled ">
        @if(!empty($most_viewed))
        @foreach($most_viewed as $product)
        <li class="viewed-link">
          <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="btn-news-categoty-top" class="" >
          <span class="viewed-name">{{$product->title}}  </span>
          </a>
        </li>
        @endforeach
        @endif
      @include('template.quangcaomicrosoft')
        
      </ul>
    </div><!--End .most-viewed-link-->
    <div class="col-sm-12 most-viewed-top">
      <ul class="list-unstyled most-viewed-title">
        <li>
          <a href="{{Asset('nha-dat')}}" id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
          <span class="viewed-title">Rao vặt</span>
          </a>
        </li>
      </ul>
    </div><!--End .most-viewed-top-->
    <div class="col-sm-12 most-viewed-link">
      <ul class="list-unstyled ">
      @if(!empty($product_dangtin))
      @foreach($product_dangtin as $product)
        <li class="viewed-link">
          <a href="{{Asset($product->category_title)}}/{{$product->name}}-{{$product->id}}" id="btn-news-categoty-top" class="" >
          <span class="viewed-name">{{$product->title}}</span>
          </a>
        </li>
        @endforeach
        @endif
      @include('template.quangcaocitygarden')

      </ul>
    </div><!--End .most-viewed-link-->
         

  </div><!--End .news-most-viewed-->
  
   <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
   
      @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.quangcaovnexpress')
         @include('template.flagcounter')
         
   </div>

</div><!--End .container-->

<!--End .news-->
@endsection
