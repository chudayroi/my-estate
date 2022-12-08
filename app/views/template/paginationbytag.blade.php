<div class="pagination">
	<a href="{{Asset('bat-dong-san/search')}}?page=1" class="first">First</a>
	<a href="{{Asset('bat-dong-san/search')}}?page={{$data['prepage']}}" class="prev"><i class="fa fa-arrow-left"></i></a>
	@for($i=1;$i<=$pagetotal;$i++)
	<a class = "{{$i}}" href="{{Asset('bat-dong-san/search')}}?page={{$i}}">{{$i}}</a> 
	@endfor
	<a href="{{Asset('bat-dong-san/search')}}?page={{$data['nextpage']}}" class="next"><i class="fa fa-arrow-right"></i></a>
	<a href="{{Asset('bat-dong-san/search')}}?page={{$pagetotal}}" class="last">Last</a>
	
</div>
				
				</div>