@extends('user.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-9 content-detail">

         
         @include('user/link-child')
         <!--end .links-->
         <div class="info">
            <div class="panel panel-info">
               <!-- Default panel contents -->
               <div class="panel-heading">
                  <i class="fa fa-desktop fa-icon"></i>
                  <span class="content-title">Nhập thông tin</span>
               </div>
               <div class="panel-body">
                  <form id="form-createuser" action="#" method="POST" role="form" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label  for="title">First Name <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                  <input type="text" class="form-control" id="user_first_name"  name="user_first_name" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label  for="title">Last Name<sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                  <input type="text" class="form-control" id="user_last_name"  name="user_last_name" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label  for="title">Email <sup><i class="glyphicon glyphicon-asterisk required"></i></sup></label>
                              <div class="">
                                  <input type="text" class="form-control" id="user_email"  name="user_email" value="" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label class="" for="usertype">User Type</label>
                              <div class="">
                                 <select class="form-control" id="usertype" name="usertype" >
                                       <option value=""></option>
                                       @foreach($usertype as $user)
                                       <option value="{{$user['id']}}">{{$user['name']}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--End .row-->
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                                  <label class="" for="password">Password</label>
                                  <div class="">
                                    <input type="text" class="form-control" id="user_password"  name="user_password" value="" placeholder="">
                                  </div>
                                </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                                  <label class="" for="confirm_password">Repeat Password</label>
                                  <div class="">
                                    <input type="text" class="form-control" id="confirm_userpassword"  name="confirm_userpassword" value="" placeholder="">
                                  </div>
                         </div>
                        </div>
                     </div>
                     <!--End .row-->
                     <div class="col-sm-offset-8 col-sm-4">
                           <button type="button" id="register-user" class="btn btn-success">Lưu</button>
                           <a class="btn btn-danger"  id="mylist-title-a1" href="{{Asset('user/list')}}">Hủy</a>
                        </div>
                  </form>
               </div>
            </div>
            <!--end panel-info-->
         </div>
         <!--End .dangtin-->
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div>
<!--End .container-->

@endsection

@section('js')
  $('#register-user').click(function(event) {
      event.preventDefault();
      $("#form-createuser").validate({
       rules:{
            user_email:{
                required:true,
                email:true,
        remote:{
                url:"{{Asset("checkuseremail")}}",
                type:"POST"
              }
            },
            user_password:{
              required:true,
              minlength:6
            },
            user_first_name:{
                required:true,
                minlength:2
                
            },
            user_last_name:{
              required:true,
              minlength:2
            },
            confirm_userpassword:{
              required:true,
              equalTo:"#user_password"
            }
      },
        messages: {
           user_email:{
              required:"Nhập Email.",
              email:"Email chưa đúng định dạng.",
              remote:"Email đã tồn tại. Nhập Emal khác."
          },
            user_first_name:{
                required:"Nhập Tên",
                minlength:"Tên phải hơn 2 ký tự"
                
            },
            user_last_name:{
              required:"Nhập Họ",
                minlength:"Họ phải hơn 2 ký tự"
            },
            user_password:{
              required:"Nhập Password",
                minlength:"Password phải hơn 6 ký tự."
            },
            confirm_userpassword:{
              required:"Nhập Password",
                equalTo:"Password chưa trùng."
            }


        }
   });
   $("#form-createuser").valid();
      var data = $('#form-createuser').serialize();
      $.ajax({
           url : "{{asset('user/create')}}",
           type : 'post',
           dataType: 'json',
           data:data,
           success : function (result){
            if(result.register =='success') {
              //console.log(123);
              location.reload(true);


            }
            if(result.register =='error'){
              //console.log(1235);

              //$("#error-login").show().delay(10).addClass("in").fadeOut(5000);
              
            }
           }//End success
         });//End ajax
     
   });
@endsection

  