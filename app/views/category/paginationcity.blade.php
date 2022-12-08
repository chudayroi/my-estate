@if(!empty($list))

<div class="pagination">
   @if($currentpage !='1')
  <a href="{{asset('/')}}{{$data['category']}}/{{$data['city']}}/{{$data['start']}}" class="">First</a>
  @endif
  @if($currentpage > '1')
  <a href="{{asset('/')}}{{$data['category']}}/{{$data['city']}}/{{$data['prepage']}}" class="prev"><i class="fa fa-arrow-left"></i></a>
  @endif
  @for($i=1;$i<=$totalpage;$i++)
  @if($i == $currentpage)
  <a class = "currentpage" href="{{asset('/')}}{{$data['category']}}/{{$data['city']}}/{{$i}}">{{$i}}</a> 
  @else
  <a class = "currentpage1" href="{{asset('/')}}{{$data['category']}}/{{$data['city']}}/{{$i}}">{{$i}}</a> 
  @endif
  @endfor
  @if($currentpage < $totalpage)
  <a href="{{asset('/')}}{{$data['category']}}/{{$data['city']}}/{{$data['nextpage']}}" class="next"><i class="fa fa-arrow-right"></i></a>
  
  <a href="{{asset('/')}}{{$data['category']}}/{{$data['city']}}/{{$data['totalpage']}}" class="last">Last</a>
  @endif
</div>
  @endif