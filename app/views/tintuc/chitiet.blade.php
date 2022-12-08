@extends('category.basic-chitiet')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
         <div class="row">
            <div class="col-sm-9 content-detail">
               @include('template.tienich')
                @include('category.links')
               
               <div class=" detail">
                  @if(!empty($products))
                  <div class="panel panel-default">
                       <!-- Default panel contents -->
                        <div class="panel-heading">
                           <i class="glyphicon glyphicon-book icon-flag"></i>
                           <span class="content-title"> {{$products->title}}</span>
                        </div>
                       <div class="panel-body">
                         <p>{{$products->content}}</p>
                         <p><span class="title-line">Diện tích:</span> {{$products->area}} m<sup>2</sup></p>
                         @if($products->amount_unit_id =='3')
                         <p><span class="title-line">Giá:</span> {{$products->amount/1000}} {{$products->amount_unit}}</p>
                         @else
                         <p><span class="title-line">Giá:</span> {{$products->amount}} {{$products->amount_unit}}</p>
                         @endif
                         <p><span class="title-line">Địa điểm:</span> {{$products->street}}, {{$products->district}}, {{$products->city}} </p>
                       </div>
                       @if(count($images)>0)
                     
                       <div class="row">
                           <div class="col-sm-offset-1 col-sm-10 slider-image">
                           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <?php $i=0;?>
                          @foreach($images as $image)

                          @if($i==0)
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          @else
                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                          @Endif
                          <?php $i++;?>
                          @endforeach
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <div class="item active">
                            <?php $i=0;?>
                             @foreach($images as $image)
                            <?php $i++;?>
                              @if($i==1)
                              <img class="detail-image"  src="{{asset('assets/img')}}/{{$image->image}}"  alt="Slider 1">
                              <div class="carousel-caption">
                                 <h3>Đất Nhà Bè Giá Rẻ</h3>
                                 <p>Hãy sở hữu ngay!</p>
                              </div>
                           </div>

                           @else
                           <div  class="item">
                              <img class="detail-image" src="{{Asset('assets/img')}}/{{$image->image}}" alt="Slider"/>
                           </div>
                           @endif
                              @endforeach
                            </div>
                          <!-- Controls -->
                          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                        </div>
                        </div><!--End .silder-image-->
                        
                       
                       <!-- Table -->
                     @else if
                     
                       <div class="row">
                           <div class="col-sm-offset-1 col-sm-10 slider-image">
                           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                          
                        
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                           </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <div class="item active">
                           
                              <img class="detail-image"  src="{{asset('assets/img')}}/tinbatdongsan.png"  alt="Slider 1">
                              <div class="carousel-caption">
                                 <h3>Đất Nhà Bè Giá Rẻ</h3>
                                 <p>Hãy sở hữu ngay!</p>
                              </div>
                           </div>
                           
                          
                            </div>
                          <!-- Controls -->
                          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                        </div>
                        </div><!--End .silder-image-->
                        
                        @endif <!--End .row of slider image-->
                       <ul class="list-group ">
                            
                            <li class="list-group-item">
                              <div>
                                 <i class="glyphicon glyphicon-tags"></i> 
                              Tags: {{$products->tags}}
                              </div>
                            </li>
                       </ul>
             
                     
                    </div>
               @else
               <div class="page">Không có sản phẩm</div>
               @endif <!--end products-->
      
               </div><!--end <div class="row detail">-->

               <div class="line"></div>
               <div class="pagper-other">
                  <div class="col-sm-12">
                     <h3>Tin khác</h3>
                     <ul>
                        @if(count($productlist)>0)
                        @foreach($productlist as $product)
                        <li><a href="{{Asset($product['category_title'])}}/{{$product['city_title']}}/{{$product['name']}}-{{$product['id']}}">{{$product['title']}}</a></li>
                        @endforeach
                        @endif
                     </ul>
                  </div>
               </div>
            </div><!--End content-nha-->
            <div class="col-sm-3 side-bar">
               @include('category.side-bar')
            </div>
         </div>
      </div>
<!--End .container-->

@endsection

