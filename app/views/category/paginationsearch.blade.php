
<div class="pagination">

   @if($currentpage !='1')
  <a href="{{asset('bat-dong-san')}}/search?category={{$data['category']}}&type={{$data['type']}}&city={{$data['city']}}&district={{$data['district']}}&street={{$data['street']}}&area={{$data['area']}}&amount={{$data['amount']}}&page={{$data['start']}}" class="">First</a>
  @endif
  @if($currentpage > '1')
  <a href="{{asset('bat-dong-san')}}/search?category={{$data['category']}}&type={{$data['type']}}&city={{$data['city']}}&district={{$data['district']}}&street={{$data['street']}}&area={{$data['area']}}&amount={{$data['amount']}}&page={{$data['prepage']}}" class="prev"><i class="fa fa-arrow-left"></i></a>
  @endif
  @for($i=1;$i<=$totalpage;$i++)
  @if($i == $currentpage)
  <a class = "currentpage" href="{{asset('bat-dong-san')}}/search?category={{$data['category']}}&type={{$data['type']}}&city={{$data['city']}}&district={{$data['district']}}&street={{$data['street']}}&area={{$data['area']}}&amount={{$data['amount']}}&page={{$i}}">{{$i}}</a> 
  @else
  <a class = "currentpage1" href="{{asset('bat-dong-san')}}/search?category={{$data['category']}}&type={{$data['type']}}&city={{$data['city']}}&district={{$data['district']}}&street={{$data['street']}}&area={{$data['area']}}&amount={{$data['amount']}}&page={{$i}}">{{$i}}</a> 
  @endif
  @endfor
   @if($currentpage < $totalpage)

  <a href="{{asset('bat-dong-san')}}/search?category={{$data['category']}}&type={{$data['type']}}&city={{$data['city']}}&district={{$data['district']}}&street={{$data['street']}}&area={{$data['area']}}&amount={{$data['amount']}}&page={{$data['nextpage']}}" class="next"><i class="fa fa-arrow-right"></i></a>
  
  <a href="{{asset('bat-dong-san')}}/search?category={{$data['category']}}&type={{$data['type']}}&city={{$data['city']}}&district={{$data['district']}}&street={{$data['street']}}&area={{$data['area']}}&amount={{$data['amount']}}&page={{$data['totalpage']}}" class="last">Last</a>
  @endif
</div>

