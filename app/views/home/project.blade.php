@if(count($projects)>0)
<div class="promo">
		<div class="page-first">
	         <div   class="arrowLine1 "><span class="title-page-first"></span></div>
			<div class="hvr-wobble-horizontal">
			         
			         <div   class="arrowLine">
			         <a href="{{Asset('du-an')}}"><span class="title-page-first">Dự án</span></a>
			         </div>
			         <div class="triangle_left"></div>
		 	</div>
		</div>
	
	<div class="row">
	@foreach($projects as $project)
		<div class="col-sm-4">
			<div class="project-image">
				<a href="{{asset('du-an')}}/{{$project['city_title']}}/{{$project['name']}}-{{$project['id']}}">
				<img class="img-responsive img-project" src="{{asset('assets/img')}}/{{$project['image']}}" alt="{{$project['title']}}" />
				</a>
			</div>
			<div class="project-title">
				<a href="{{asset('du-an/')}}/{{$project['city_title']}}/{{$project['name']}}-{{$project['id']}}">{{$project['title']}}</a>
			</div>
			
		</div>
		
	@endForeach
	</div>
	
	<!--End .row-->
</div>
@endIf