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
                         
                         <p><span class="title-line">Giá:</span> {{$products->amount}} {{$products->amount_unit}}</p>
                         
                         <p><span class="title-line">Địa điểm:</span> {{$products->street}}, {{$products->district}}, {{$products->city}} </p>
                         @if(!empty($products->lt))
                     @include('category.showmapdetail')
                          @endif
                         <p><span class="title-line">Xem Hình:</p>
                       </div>
                       @if(count($images)>0)
                     
                       <div class="row">
                           <div class="col-sm-offset-1 col-sm-10 slider-image">
                           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                         
                          <!-- Wrapper for slides -->
                            
                            <?php $i=0;?>
                             @foreach($images as $image)
                            <?php $i++;?>
                             <div >
                              <img class="img-responsive detail-image1"   content="width=device-width, initial-scale=1" src="{{asset('assets/img')}}/{{$image->image}}"  alt="dat-nha-be">
                           </div>
                              @endforeach
                           
                          <!-- Controls -->
                         
                        </div>
                        </div>
                        </div><!--End .silder-image-->
                        
                       
                       <!-- Table -->
                     @else
                     
                       <div class="row">
                          
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
                 @include('template.quangcaovinpearl')
                <h3><span class="span-bold-red">Có Thể Bạn Cần Tìm</span></h3>

                    
                     
                  </div>
               </div>
               
                 @include('category.productlist')
                 @include('category.paginationcity')
                 @include('template.quangcaolamdep')

            </div><!--End content-nha-->

            <div class="col-sm-3 side-bar">

                 @include('category.search-sidebar')
         @include('template.quangcaofuland')
                 
                 @include('template.tintucnoibat')
                 @include('template.batdongsanxemnhieunhat')
         @include('template.quangcaovnexpress')
                  @include('template.flagcounter')
      @include('template.quangcaomicrosoft')

            </div>
         </div>
         
      </div>
<!--End .container-->

@endsection

