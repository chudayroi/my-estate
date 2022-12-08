<div class="main-header">
  <div class="container">
    <div class="row">
     
      <div class="col-sm-2">
          <a href="{{asset('/')}}"><img src="{{asset('assets/img/logo.png')}}" alt="Logo" /></a>
      </div>
       <div class="col-sm-2 banner1">
        
          <a href="http://fuland.vn/tuyendung"><img class="img-responsive banner-img1" src="{{asset('assets/img/tuyendung.jpg')}}" alt="Logo" /></a>
      </div>
     
      <div class="col-sm-6 banner1">
        
          <a href="{{asset('/')}}"><img class="img-responsive banner-img" src="{{asset('assets/img/dat-nha-be-banner-1.jpg')}}" alt="Logo" /></a>
      </div>
      
           <div class="col-sm-2">
        <div class="pull-right">
         @if (Auth::check()) 
        <div class="nav-login">
        
         <ul class="nav nav-pills">
         <li class="dropdown">

         
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Welcome, {{Auth::user()->fb_fullname}}
            </a>
            <ul class="dropdown-menu">
              @if(Auth::user()->usertype_id !='3')
              <li><a href="{{Asset('tintuc/add')}}">Tạo Tin Tức</a></li>
              <li><a href="{{Asset('tintuc/mylist')}}">Danh Sách Tin Tức</a></li>
              @endif
              @if(Auth::user()->usertype_id != '2')
              <li><a href="{{Asset('dangtin')}}">Tạo Đăng Tin</a></li>
              <li><a href="{{Asset('dangtin/list/1')}}">Danh Sách Đăng Tin</a></li>
              <li><a href="{{Asset('user/infor')}}">Thông Tin Tài Khoản</a></li>
              @if(Auth::user()->total_uptin <= '0')
              <li><a href="{{Asset('dangtin/mualuotup')}}">Mua Lượt Up Tin</a></li>
              @endif
              @endif
              @if(Auth::user()->usertype_id == '1')
              <li><a href="{{Asset('user/add')}}">Tạo User</a></li>
              <li><a href="{{Asset('user/list')}}">Danh Sách User</a></li>
              @endif
              <li><a href="{{Asset('user')}}/edit/{{Auth::user()->id}}">Đổi Password</a></li>
              <li><a href="{{Asset('logout')}}">Logout</a></li>
            </ul>
          </li>
        </ul>
        </div>
        
         
        @endif
         <ul class="list-unstyled top-links">
           <!-- <li><a target="_blank" href="http://tinbatdongsan.net.vn/crm/index.php">Quản Lý Sản Phẩm</a></li>-->
          </ul>

          <!--Begin modal Login-->
          <!-- Button trigger modal -->
          
          
          <!-- Modal -->
          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Register</h4>
                </div>
                <div class="modal-body">
                  <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li id="li-login" role="presentation" class=""><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                      <li id="li-register" class="" role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
                      <li id="li-forget-password" role="presentation"><a href="#forget-password" aria-controls="forget-password" role="tab" data-toggle="tab">Forget Password</a></li>
                      <li id="li-about" role="presentation"><a href="#contact-us" aria-controls="contact-us" role="tab" data-toggle="tab">Contact Us</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="login">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-12 regis">Login Here</div>
                            </div><!--End row-->
                            <div class="row">
                              <div class="col-sm-12 line"></div>
                            </div><!--End row-->
                            <form id="form-login" action="" method="Post">
                            <div class="row col-sm-12 no-radius btnfa">
                              <div class="form-group">
                                <label  for="email">Email</label>
                                <div class="">
                                  <input type="text" class="form-control" id="login_email"  name="login_email" value="" placeholder="">
                                </div>
                              </div>
                            </div>
                            <div class="row col-sm-12 ">
                              <div class="form-group">
                                <label class=""  for="password">Password</label>
                                <div class="">
                                  <input type="password" class="form-control" id="login_password"  name="login_password" value="" placeholder="">
                                </div>
                              </div>
                            </div>
                            <!--End .row-->
                            <div class="col-sm-6">
                              <div class="col-sm-offset-6 col-sm-6">
                                <button type="submit" id="submit-login" class="btn btn-success" >Login</button>
                              </div>
                            </div><!--End row-->
                            </form>
                          </div>
                          @include('template.social')
                          
                        </div>
                        <!--End .div-->
                      </div>
                      <div role="tabpanel" class="tab-pane" id="register">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-12 regis">Khi tạo tài khoản mới được tặng: 2 triệu đồng trong tài khoản và 1 triệu lượt up</div>
                            </div><!--End row-->
                            <div class="row">
                              <div class="col-sm-12 line"></div>
                            </div><!--End row-->
                            <form id="form-register" action="">
                            <div class="row" >
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label  for="email">Email</label>
                                  <div class="">
                                    <input type="text" class="form-control" id="register_email"  name="register_email" value="" placeholder="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label  for="first_name">First name</label>
                                  <div class="">
                                    <input type="text" class="form-control" id="register_first_name"  name="register_first_name" value="" placeholder="">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label  for="last_name">Last name</label>
                                  <div class="">
                                    <input type="text" class="form-control" id="register_last_name"  name="register_last_name" value="" placeholder="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6 ">
                                <div class="form-group">
                                  <label class="" for="password">Password</label>
                                  <div class="">
                                    <input type="password" class="form-control" id="register_password"  name="register_password" value="" placeholder="">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="" for="confirm_password">Repeat Password</label>
                                  <div class="">
                                    <input type="password" class="form-control" id="confirm_password"  name="confirm_password" value="" placeholder="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--End .row-->
                            <div class="col-sm-6">
                              <div class="col-sm-offset-6 col-sm-6">
                                <button type="button" id="submit-register" class="btn btn-success" >Login</button>
                              </div>
                            </div><!--End row-->
                            </form>
                          </div><!--left-->
                          @include('template.social')
                        </div><!--End row-->
                      </div>
                      <div role="tabpanel" class="tab-pane" id="forget-password">
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="row">
                                <div class="col-sm-12 regis">Password Recovery</div>
                              </div><!--End row-->
                              <div class="row">
                                <div class="col-sm-12 line"></div>
                              </div><!--End row-->
                              <form id="recovery_password" action="" method="">
                              <div class="row col-sm-12 no-radius btnfa">
                                <div class="form-group">
                                  <label  for="email">Email</label>
                                  <div class="">
                                    <input type="text" class="form-control" id="recovery_email"  name="recovery_email" value="" placeholder="">
                                  </div>
                                </div>
                              </div>
                                                            <!--End .row-->
                              <div class="col-sm-6">
                                <div class="col-sm-offset-6 col-sm-6">
                                  <button type="button" id="sumit-recovery" class="btn btn-success">Password Recovery</button>
                                </div>
                              </div><!--End row-->
                              </form>
                            </div><!--left-->
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="contact-us">
                        .2354234..
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <div class="row modal-footer">
                  <div class="col-sm-offset-2 col-sm-8">
                  <div id="error-login" style="display:none" class="alert alert-warning" role="alert" onclick="removeAlert(id);">
                    <strong><i class="glyphicon glyphicon-warning-sign"></i></strong>
                    Email hoặc mật khẩu chưa đúng
                      Nếu chưa có tài khoản hãy click tab Đăng ký.
                    </div>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--End modal-->
          
        </div>
      </div>
    </div>
  </div>
</div> <!- end div main-header -->
<div class="top-bar">
  <div class="container">
   

    </div>
  </div>
</div>
<!--end .top-bar-->

<nav class="navbar navbar-default ">
<div class="main-nav1">
  <div class="container-fluid container ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{Asset('/')}}"><span class="span-kinhnghiem"><i class="glyphicon glyphicon-home"></i> Home</span></a>
      
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="active dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="span-nhadat">Nhà Đất</span> <span class="sr-only">(current)</span></a>
          <ul class="dropdown-menu">
              <li><a href="{{Asset('bat-dong-san/bat-dong-san-ho-chi-minh-163')}}"><span class="span-kinhnghiem1">TP. Hồ Chí Minh</span></a></li>
              <li><a href="{{Asset('bat-dong-san/bat-dong-san-binh-duong-164')}}"><span class="span-kinhnghiem1">Bình Dương</span></a></li>
              <li><a href="{{Asset('bat-dong-san/bat-dong-san-binh-duong-165')}}"><span class="span-kinhnghiem1">Bình Phước</span></a></li>
              <li><a href="{{Asset('bat-dong-san/bat-dong-san-binh-phuoc-166')}}"><span class="span-kinhnghiem1">Đồng Nai</span></a></li>
              <li><a href="{{Asset('bat-dong-san/bat-dong-san-long-an-167')}}"><span class="span-kinhnghiem1">Long An</span></a></li>
              <li><a href="{{Asset('bat-dong-san/bat0-dong-san-viet-nam-168')}}"><span class="span-kinhnghiem1">Việt Nam</span></a></li>
          </ul>
        </li>
         <li><a href="{{Asset('tintuc')}}"><span class="span-kinhnghiem">Tin Tức</span></a></li>
          <li><a href="{{Asset('tintuc/kinh-nghiem')}}"><span class="span-kinhnghiem">Kinh Nghiệm</span></a></li>
         @if (Auth::check()) 
          <li><a href="{{Asset('dangtin')}}"><span class="span-kinhnghiem">Đăng Tin</span></a></li>
          @else
          <li><a id="btn-dangtin" data-toggle="modal" data-target="#loginModal" href="#"><span class="span-kinhnghiem">Đăng Tin</span></a></li>
          @endif
            <li><a href="{{Asset('dat-nha-be-contact')}}"><span class="span-kinhnghiem">Liên Hệ</span></a></li>
              <li><a href="{{Asset('dat-nha-be-webinfo')}}"><span class="span-kinhnghiem">Giới Thiệu</span></a></li>
              <li><a href="{{Asset('tuyendung')}}"><span class="span-kinhnghiem">Tuyển Dụng</span></a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
         @if (!Auth::check()) 
        <li><a href="#" id="btn-login1" class="btn1" data-toggle="modal" data-target="#loginModal"><span class="span-kinhnghiem">Đăng Nhập</span></a></li>
        <li><a href="#" id="btn-register" class="btn1" data-toggle="modal" data-target="#loginModal"><span class="span-kinhnghiem">Tạo Tài Khoản</span></a></li>
         @endif
         
         
      </ul>
      
    </div><!-- /.navbar-collapse -->
 
  </div><!-- /.container-fluid -->
  </div>

</nav>
<!--end .header-header-->
<script type="text/javascript">

$(document).ready(function(){

  //form register(
    $('#btn-login').click(function(event) {
      event.preventDefault();

      $('#li-register').removeClass('active');
      $('#register').removeClass('active');
      $('#li-forget-password').removeClass('active');
      $('#forget-password').removeClass('active');

      $('#li-login').removeClass('active').addClass('active');
      $('#login').removeClass('active').addClass('active');

    });
    $('#btn-register').click(function(event) {
      event.preventDefault();


      $('#li-login').removeClass('active');
      $('#login').removeClass('active');
      $('#li-forget-password').removeClass('active');
      $('#forget-password').removeClass('active');
      $('#li-register').removeClass('active').addClass('active');
      $('#register').removeClass('active').addClass('active');
    });
    $('#submit-login').click(function(event) {
      event.preventDefault();

      var data = $('#form-login').serialize();
       $.ajax({
           url : "{{asset('login')}}",
           type : 'post',
           dataType: 'json',
           data:data,
           success : function (result){
            if(result.login =='success') {
              //console.log(123);
              location.reload(true);
              //
            }
            if(result.login =='error'){
              $("#error-login").show().delay(10).addClass("in").fadeOut(5000);
              
            }

            //$('.top-links').empty();
           }//End success
         });//End ajax
    });
    $('#submit-register').click(function(event) {
      event.preventDefault();

      $("#form-register").validate({
       rules:{
            register_email:{
                required:true,
        email:true,
        remote:{
                url:"{{Asset("checkemail")}}",
                type:"POST"
              }
            },
            register_password:{
              required:true,
              minlength:6
            },
            register_first_name:{
                required:true,
                minlength:2
                
            },
            register_last_name:{
              required:true,
              minlength:2
            },
            confirm_password:{
              required:true,
              equalTo:"#register_password"
            }
      },
        messages: {
           register_email:{
              required:"Nhập Email.",
              email:"Email chưa đúng định dạng.",
              remote:"Email đã tồn tại. Nhập Emal khác."
          },
            register_first_name:{
                required:"Nhập Tên",
                minlength:"Tên phải hơn 2 ký tự"
                
            },
            register_last_name:{
              required:"Nhập Họ",
                minlength:"Họ phải hơn 2 ký tự"
            },
            register_password:{
              required:"Nhập Password",
                minlength:"Password phải hơn 6 ký tự."
            },
            confirm_password:{
              required:"Nhập Password",
                equalTo:"Password chưa trùng."
            }


        }
   });
      $("#form-register").valid();
      var data = $('#form-register').serialize();
       $.ajax({
           url : "{{asset('register')}}",
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
    
    //End form register
    //form  recovery password
 $('#sumit-recovery').click(function(event) {
      event.preventDefault();

      var data = $('#recovery_password').serialize();
       $.ajax({
           url : "{{asset('recoverypassword')}}",
           type : 'post',
           dataType: 'json',
           data:data,
           success : function (result){
            if(result.recovery =='success') {
              //console.log(result.email);
              //location.reload(true);
              alert('Một password mới đã gủi tới mail của bạn');
              $('#forget-password').removeClass('active');
               $('#login').removeClass('active').addClass('active');
            }
            if(result.login =='error'){
              $("#error-login").show().delay(10).addClass("in").fadeOut(5000);
            }

            //$('.top-links').empty();
           }//End success
         });//End ajax
    });
    //end recovery password
});
</script>
