<div class="row batdongsantinhtp ">
		@foreach($citytag as $city)
      <div class="col-sm-2 link-batdongsantinhtp ">
         <a class="" id="btn-news-categoty-top" href="{{Asset('bat-dong-san')}}{{'/'}}{{$city['title']}}">
         <span class="viewed-name">{{$city['name']}}</span>
         </a>
      </div>
   		@endforeach
     
   </div>