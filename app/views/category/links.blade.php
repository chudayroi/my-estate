   <div class="page-first">
   		@if(!empty($info_category))
         <div class="hvr-wobble-horizontal">
             <div   class="arrowLine1"><span class="title-page-first"></span></div>
             <div   class="arrowLine">
             <a href="{{Asset($info_category->title)}}"><span class="title-page-first">Tìm Kiếm</span></a>
             </div>
             <div class="triangle_left"></div>
         </div>
        @if(!empty($citys->name))
        <div class="hvr-wobble-horizontal">
             <div class="triangle_left1"></div>
             @if(strlen($citys->title)>8)
             <div class="arrowLine2"><a href="{{Asset($info_category->title)}}/{{$citys->title}}"><span class="title-page-current">{{$citys->name}}</span></a></div>
             @else
             <div class="arrowLine"><a href="{{Asset($info_category->title)}}/{{$citys->title}}"><span class="title-page-current">{{$citys->name}}</span></a></div>
             @endif
             <div class="triangle_left"></div>
         </div>
        @endif
        @else
        @if(!empty($citys->name))
        <div class="hvr-wobble-horizontal">
             <div   class="arrowLine1"><span class="title-page-first"></span></div>
             @if(strlen($citys->title)>8)
             <div class="arrowLine2"><a href="{{Asset($citys->title)}}"><span class="title-page-current">{{$citys->name}}</span></a></div>
             @else
             <div class="arrowLine"><a href="{{Asset($citys->title)}}"><span class="title-page-current">{{$citys->name}}</span></a></div>
             @endif
             <div class="triangle_left"></div>
         </div>
        @endif
        @endif
        
   </div>