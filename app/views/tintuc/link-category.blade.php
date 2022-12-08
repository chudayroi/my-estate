<div class="page-first">
	         <div   class="arrowLine1 "><span class="title-page-first"></span></div>
	         
		<div class="hvr-wobble-horizontal">
	         <div   class="arrowLine">
	         <a href="{{Asset('tintuc')}}"><span class="title-page-first">Tin Tức</span></a>
	         </div>
	         <div class="triangle_left"></div>
         </div>
         @if(!empty($data_category))
         <div class="hvr-wobble-horizontal">
	         <div class="triangle_left1"></div>
	         @if(strlen($data_category->title)>9)
	         <div class="arrowLine2"><a href="{{Asset('tintuc')}}/{{$data_category->title}}"><span class="title-page-current">{{$data_category->name}}</span></a></div>
	         @else
	         <div class="arrowLine"><a href="{{Asset('tintuc')}}/{{$data_category->title}}"><span class="title-page-current">{{$data_category->name}}</span></a></div>
	         @endif
	         <div class="triangle_left"></div>
         </div>
         @endif
 </div>
   