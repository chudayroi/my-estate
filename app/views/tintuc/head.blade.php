<nav class="navbar navbar-default navbar-fixed-top">
	<div class=" main-nav">
		<div class="container">
			<div class="row">
				<ul class="nav nav-pills">
					<li class="">
						<a href="{{Asset('/')}}"><i class="glyphicon glyphicon-home"></i> Home</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Nhà Đất
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{Asset('nha-dat/ho-chi-minh')}}">TP. Hồ Chí Minh</a></li>
							<li><a href="{{Asset('nha-dat/binh-duong')}}">Bình Dương</a></li>
							<li><a href="{{Asset('nha-dat/dong-nai')}}">Đồng Nai</a></li>
							<li><a href="{{Asset('nha-dat/long-an')}}">Long An</a></li>
							<li><a href="{{Asset('nha-dat')}}">Tất cả</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Dự Án
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{Asset('du-an/ho-chi-minh')}}">TP. Hồ Chí Minh</a></li>
							<li><a href="{{Asset('du-an/binh-duong')}}">Bình Dương</a></li>
							<li><a href="{{Asset('du-an/dong-nai')}}">Đồng Nai</a></li>
							<li><a href="{{Asset('du-an/long-an')}}">Long An</a></li>
							<li><a href="{{Asset('du-an')}}">Tất cả</a></li>
						</ul>
					</li>
					<li><a href="{{Asset('tintuc')}}">Tin Tức</a></li>
					@if (Auth::check()) 
					<li><a href="{{Asset('dangtin')}}">Đăng Tin</a></li>
					@else
					<li><a id="btn-dangtin" data-toggle="modal" data-target="#loginModal" href="#">Đăng Tin</a></li>
					@endif

					<li><a href="{{Asset('contact')}}">Liên Hệ</a></li>
					<li><a href="{{Asset('webinfo')}}">Giới Thiệu</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Link Liên kết
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
</div><!--end .main-nav-->
</nav>
<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<ul class="list-unstyled top-links">
						<li>
							<a id="btn-batdongsan" class="btn btn-batdongsan btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/bat-dong-san')}}" >
							<span class="title-link">Bất Động Sản</span>
							</a>
						</li>
						<li>
							<a id="btn-thoisu" class="btn btn-thoisu btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/thoi-su')}}">
								<span class="title-link">Thời Sự</span>
							</a>
						</li>
						<li>
							<a id="btn-thegioi" class="btn btn-thegioi btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/the-gioi')}}" >
							<span class="title-link">Thế Giới</span>
							</a>
						</li>
						<li>
							<a id="btn-sohoa" class="btn btn-sohoa btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/so-hoa')}}">
							<span class="title-link">Số Hóa</span>
							</a>
						</li>
						<li>
							<a id="btn-thethao" class="btn btn-thethao btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/the-thao')}}">
							<span class="title-link">Thề Thao</span>
							</a>
						</li>
						<li>
							<a id="btn-giaitri" class="btn btn-giaitri btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/giai-tri')}}">
							<span class="title-link">Giải Trí</span>
							</a>
						</li>
						<li>
							<a id="btn-cuoi" class="btn btn-cuoi btn-no-radius hvr-wobble-vertical" href="{{Asset('tintuc/cuoi')}}">
							<span class="title-link">Cười</span>
							</a>
						</li>
					</ul>
			</div>
			<div class="col-sm-3">
				<div class="pull-right">
				 @if (Auth::check()) 
				<div class="nav-login">
				
				 <ul class="nav nav-pills">
				 <li class="dropdown">

				 
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Welcome, {{Auth::user()->fb_fullname}}
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{Asset('tintuc/add')}}">Tạo Tin Tức</a></li>
							<li><a href="{{Asset('tintuc/mylist')}}">Danh Sách Tin Tức</a></li>
							<li><a href="{{Asset('user')}}/edit/{{Auth::user()->id}}">Đổi Password</a></li>
							<li><a href="{{Asset('logout')}}">Logout</a></li>
						</ul>
					</li>
				</ul>
				</div>
				
				 @else
					<ul class="list-unstyled top-links">
						<li>
							<button type="button"id="btn-login" class="btn btn-info btn-no-radius" data-toggle="modal" data-target="#loginModal">
							Login
							</button>
						</li>
						<li>
							<button type="button" id="btn-register" class="btn btn-success btn-no-radius" data-toggle="modal" data-target="#loginModal">
							Create Account
							</button>
						</li>
					</ul>
				@endif
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
																<label class="" for="password">Password</label>
																<div class="">
																	<input type="text" class="form-control" id="login_password"  name="login_password" value="" placeholder="">
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
															<div class="col-sm-12 regis">Register Here</div>
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
																		<input type="text" class="form-control" id="register_password"  name="register_password" value="" placeholder="">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label class="" for="confirm_password">Repeat Password</label>
																	<div class="">
																		<input type="text" class="form-control" id="confirm_password"  name="confirm_password" value="" placeholder="">
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
															<form action="">
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
</div>
<!--end .top-bar-->
<div class="main-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 search-w">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search intire store here">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
					</span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="logo text-center">
					<a href="{{asset('/')}}"><img src="{{asset('assets/img/tinbatdongsan1.png')}}" alt="Logo" /></a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="pull-right">
					<div class="cart-wish-w">
						<div class="cart-w">
							<div class="cart-info">
								<span>
								<strong>0 item</strong>
								<strong>0 quantity</strong>
								</span>
								<a href="#" class="btn-cart">
								<i class="glyphicon glyphicon-shopping-cart"></i>
								</a>
							</div>
						</div>
						<div class="wishlist-w">
							<div class="wishlist-info">
								<span>
								<strong>0 product</strong>
								</span>
								<a href="#" class="btn-cart">
								<i class="glyphicon glyphicon-heart"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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

});
</script>
