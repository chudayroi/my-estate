@extends('tintuc.basic')
@section('content')
<div class="container">
      <div class="row">
   
  
      <div class="col-sm-9 news-block">
      @include('tintuc.link-category')
      <div class="row">
        @if(!empty($product_hot))
        <div class="col-sm-8 news-hot">
         <div class="image-hot" id="id_image">
            <a href="{{Asset('tintuc')}}/{{$product_hot->category_title}}/{{$product_hot->name}}-{{$product_hot->id}}" id="ai">
               <img src="{{Asset('assets')}}/img/news/{{$product_hot->image}}" class="img-responsive img-hot-responsive" alt="{{$product_hot->name}}"/>
            </a>
         </div>  
         <div class="news-hot-title">
            <a href="{{$product_hot->category_title}}/{{$product_hot->name}}-{{$product_hot->id}}" id="ai">
              <h4 class="hot-title">{{$product_hot->title}}</h4>
            </a>
         </div>
         <div>
           {{$product_hot->content_summary}}
         </div>
          </div><!--End .col-sm-8-->
          @endif
          <div class="col-sm-4 most-viewed-link">
              <ul class="list-unstyled ">
              @if(!empty($product_common))
              @foreach($product_common as $product)
                <li class="viewed-link">
                  <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="btn-news-categoty-top" class="" >
                  <span class="viewed-name">{{$product->title}}</span>
                  </a>
                </li>
                @endforeach
                @endif
              </ul>
          </div><!--End .most-viewed-link-->
         </div><!--End .row-->
         <div class="row line"></div>
         <div class="col-sm-7 news-nomal-list">
            @if(!empty($product_nomal))
            @foreach($product_nomal as $product)
             <div class="row news-nomal">
               <div>
                    <a  href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}">
                    <h4>{{$product->title}}</h4>
                    </a>
                </div>
                  <div class="col-sm-5 image" id="id_image">
                     <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="ai">
                     <img src="{{Asset('assets')}}/img/news/{{$product->image}}" class="img-responsive img-news-nomal" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7 content_summary">
                    {{$product->content_summary}}
                  </div>
              </div><!--End .news-nomal-->
              @endforeach
              @endif
      </div><!--Enf .news-nomal-list-->
       <div class="col-sm-5 news-categoty-list">
          <?php $i=0;?>
          @foreach($products_category as $categorytitle => $category_title)
          @foreach($category_title as $categoryname => $category)
          <?php $i++; ?>
          @if($i==2)
          <div class="row">
            <div class="row news-categoty">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a href="{{Asset('nha-dat')}}" id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">Rao v???t</span>
                        </a>
                     </li>
              </ul>
            </div>
            <div class="row news-dot-list">
                <ul class="">
                    @foreach($product_dangtin as $product)
                     <li>
                        <a href="{{Asset($product->category_title)}}/chitiet/{{$product->name}}-{{$product->id}}" id="news-dot" class="news-dot" >
                        <span class="news-dot-title">{{$product->title}} </span>
                        </a>
                     </li>
                     @endForeach
                </ul>
            </div><!--End .news-dot-list-->
          </div><!--End .row .Rao vat-->
          @endif
         <div class="row">
            <div class="row news-categoty">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a href="{{Asset('tintuc')}}/{{$categorytitle}}" id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">{{$categoryname}}</span>
                        </a>
                     </li>
                <!--    @foreach($category as $key1 => $items)
                    @if($key1=='item')
                    @foreach($items as $item)
                    <li>
                        <a href="{{Asset('tintuc')}}/{{$categoryname}}/{{$item['title']}}" id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">{{$item['name']}}</span>
                        </a>
                     </li>
                    @endforeach
                    @endif
                    @endforeach
                    -->
                  </ul>
            </div>
            @foreach($category as $key1 => $items)
            @if($key1=='product')
            @foreach($items as $item)
            <div class="row news-content">
               <div>
                 <a href="{{Asset('tintuc')}}/{{$item->category_title}}/{{$item->name}}-{{$item->id}}" title="">
                   <h4>{{$item->title}} </h4>
                 </a>
               </div>
                  <div class="col-sm-5 " id="id_image">
                     <a href="{{Asset('tintuc')}}/{{$item->category_title}}/{{$item->name}}-{{$item->id}}" id="ai">
                     <img src="{{Asset('assets')}}/img/news/{{$item->image}}" class="img-responsive image-dot" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7">
                    {{$item->content_summary}}
                  </div>
            </div> <!--End .news-content-->
            @endforeach
            @endif
            @endforeach
            <div class="row news-dot-list">
                <ul class="">
                     @foreach($category as $key1 => $items)
                     @if($key1=='product_dot')
                     @foreach($items as $item)
                     <li>
                        <a href="{{Asset('tintuc')}}/{{$item->category_title}}/{{$item->name}}-{{$item->id}}" id="news-dot" class="news-dot" >
                        <span class="news-dot-title">{{$item->title}}</span>
                        </a>
                     </li>
                      @endforeach
                      @endif
                      @endforeach
                </ul>
            </div><!--End .news-dot-list-->
         </div><!--End .row-->
        @endForeach
        @endForeach
            
         </div><!--End .News-category-list-->
      </div><!--End .news-list-->
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
      
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.quangcaovnexpress')
         @include('template.flagcounter')
         
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div>
</div>
<!--End .container-->
@endsection
