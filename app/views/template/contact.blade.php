<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="{{Asset('assets/icon/tinbatdongsan_logo.ico')}}">
		<title>
			@yield('title')
		</title>
		@include('template.css')
		@yield('css')
		@include('template.js')
		@yield('link-js')
		 
	</head>
	<body>
		<header>

			@include('template.head')
		</header>
    
		   <div class="container">
            <div class="row">
        		<div class="well">
                    <form>
                        <h4>Liên Hệ:</h4>
                        <h4> Nguyễn Bình</h4>
                        <div class="mobile">
                            <a class="btn-phone" href="#">
                            <i class="glyphicon glyphicon-earphone"> <span class="span-mobile">0938.569.939</span></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--End .container-->

		<!-- jQuery -->
	<footer class="footer">
     @include('template.footer')
	</footer><!--end .footer-->
	
</body>
</html>