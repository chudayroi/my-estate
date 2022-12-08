@extends('tintuc.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
      @include('tintuc.link-category')
        <div class="row news-link-top">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">Thể Thao</span>
                        </a>
                     </li>
                    
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Bóng Đá</span>
                        </a>
                     </li>
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Cờ Vua</span>
                        </a>
                     </li>
                  </ul>
          </div>

      
         <div class="row">

            <div class="col-sm-9 news-block">
           @include('tintuc/link-child')

              <div class="row">
                <div class="col-sm-8 news-detail ">
                  <div class="row">
                    <div class="col-sm-10 pull-left">
                    {{$product->startdate}}
                      
                    </div>
                    <?php $i=1; ?>
                    <div class="col-sm-2 pull-right">
                          <a class="" id="edit{{$i}}" title="Sửa"data-toggle="tooltip" data-placement="right" title="Sửa"  href="{{Asset('tintuc/edit')}}/{{$product['name']}}-{{$product['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
                         <a class="" id="remove{{$i}}" title="Xóa" data-toggle="tooltip" data-placement="right" title="Xóa" href="{{Asset('tintuc/delete')}}/{{$product['id']}}"><i class="glyphicon glyphicon-trash"></i></a>
                              
                    </div>
                  </div>
                  <div class="row">
                    <h3>{{$product->title}}</h3>
                  {{$product->content}}  
                  </div>
                </div>
                <div class="col-sm-4 news-categoty-list">
                  <div class="row">
            <div class="row news-categoty">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">Thể Thao</span>
                        </a>
                     </li>
                    
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Bóng Đá</span>
                        </a>
                     </li>
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Cờ Vua</span>
                        </a>
                     </li>
                  </ul>
            </div>
            <div class="row news-content">
               <div>Trăm cảnh sát bao vây nhà đàn em trùm xã hội đen ở Sài Gòn </div>
                  <div class="col-sm-5 image" id="id_image">
                     <a href="#" id="ai">
                     <img src="{{Asset('assets')}}/img/promo1.jpg" class="img-responsive" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7">
                      Gần trăm cảnh sát thuộc Bộ Công an và quận Bình Thạnh, TP HCM, bao vây khu vực, khám xét nhà nam thanh niên bị tình nghi là "chân rết" của ông 
                  </div>
            </div>
         </div>
         <div class="row">
            <div class="row news-categoty">
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">Xã Hội</span>
                        </a>
                     </li>
                    
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">An Ninh</span>
                        </a>
                     </li>
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Giáo Dục</span>
                        </a>
                     </li>
                  </ul>
            </div>
            <div class="row news-content">
               <div>Trăm cảnh sát bao vây nhà đàn em trùm xã hội đen ở Sài Gòn </div>
                  <div class="col-sm-5 image" id="id_image">
                     <a href="#" id="ai">
                     <img src="{{Asset('assets')}}/img/promo1.jpg" class="img-responsive" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7">
                      Gần trăm cảnh sát thuộc Bộ Công an và quận Bình Thạnh, TP HCM, bao vây khu vực, khám xét nhà nam thanh niên bị tình nghi là "chân rết" của ông 
                  </div>
            </div>
         </div>

            <div class="row">
            <div class="row news-categoty">
              
               <ul class="list-unstyled news-categoty-top">
                     <li>
                        <a id="btn-news-categoty-top" class="btn btn-news-categoty-top btn-no-radius" >
                        <span class="name-news-categoty">Số Hóa</span>
                        </a>
                     </li>
                    
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Điện Thoại</span>
                        </a>
                     </li>
                     <li>
                        <a id="btn-news-categoty" class="btn btn-news-categoty btn-no-radius" data-toggle="modal" data-target="#loginModal">
                        <span class="title-news-categoty">Laptop</span>
                        </a>
                     </li>
                  </ul>
            </div>
            <div class="row news-content">
               <div>Trăm cảnh sát bao vây nhà đàn em trùm xã hội đen ở Sài Gòn </div>
                  <div class="col-sm-5 image" id="id_image">
                     <a href="#" id="ai">
                     <img src="{{Asset('assets')}}/img/promo1.jpg" class="img-responsive" alt=""/>
                     </a>
                  </div>
                  <div class="col-sm-7">
                      Gần trăm cảnh sát thuộc Bộ Công an và quận Bình Thạnh, TP HCM, bao vây khu vực, khám xét nhà nam thanh niên bị tình nghi là "chân rết" của ông 
                  </div>
            </div>
         </div>
         </div>
                </div>
              </div>
            <div class="col-sm-3 side-bar">
            @include('category.side-bar')
            </div>
            </div>
      </div>
<!--End .container-->

@endsection
