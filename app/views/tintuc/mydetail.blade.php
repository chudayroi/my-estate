@extends('tintuc.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
      @include('tintuc.link-category')
       
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
                
                </div>
              </div>
            <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
            
             @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.flagcounter')
         
            </div>
            </div>
      </div>
<!--End .container-->

@endsection
