<div class="container">
	<div class="row">
		<div class="new-lists">
			<div class="page-first">
	         <div   class="arrowLine1 "><span class="title-page-first"></span></div>
			<div class="hvr-wobble-horizontal">
			         
			         <div   class="arrowLine">
			         <a href="{{Asset('tintuc')}}"><span class="title-page-first">Tin tức</span></a>
			         </div>
			         <div class="triangle_left"></div>
		 	</div>
		</div>
			<div class="row">
				@foreach($news_common as $product)
				<div class="col-sm-3 news-item">
					
					<a class="news-title" href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}"><span class="span-news-title">{{$product->title}}</span></a>
					
					<div class="image-news">
						<a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}"><img src="{{asset('assets/img/news')}}/{{$product->image}}" alt="{{$product->name}}" class="img-responsive img-news" /></a>
					</div>
					<p class="">
						{{$product->content_summary}}
					</p>
				</div><!--news-item-->
				@endforeach
			</div>

			
		</div>
		<!--end .new-lists-->
	</div>
</div>
