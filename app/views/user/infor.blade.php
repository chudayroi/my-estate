@extends('user.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-9 content-detail">
         @include('dangtin.warning')
      
        <div class='col-sm-12 category-batdongsannoibat'>
      <span class='span-batdongsannoibat'>Thông Tin Tài Khoản</span>
   </div>
      <div data-example-id="striped-table" class=" col-sm-12 mualuotuptin">
          <div class="row">
            <div class="col-sm-offset-2 col-sm-3 ">Tên truy cập</div>
            <div class="col-sm-3"><span class="span-bold-red">{{$user['email']}}</span></div>
            <div class="col-sm-1 user_conttent" id="user-edit">
                  <a class="mylist-action-sub" id="edit" title="Sửa"data-toggle="tooltip" data-placement="right" title="Sửa"  href="{{Asset('user')}}/edit/{{$user['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-offset-2 col-sm-3 ">Số dư tài khoản</div>
            <div class="col-sm-3"><span class="span-bold-red">${{number_format($user['amount'],0)}}</span></div>
          </div>
          <div class="row">
            <div class="col-sm-offset-2 col-sm-3 ">Số Lượt UpTin</div>
            @if($user['total_uptin'] > '0')
            <div class="col-sm-3"><span class="span-bold-red">{{number_format($user['total_uptin'],0)}}</span></div>
            @else
            <div class="col-sm-3"><span class="span-bold-red">0: <a href="{{Asset('dangtin/mualuotup')}}">Mua Lượt Up Tin</a></span></div>
            
            @endif
          </div>
      </div>
         
         <!--End .dangtin-->
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div>
<!--End .container-->

@endsection




