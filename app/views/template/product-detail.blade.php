@extends('nhadat.basic')
@section('links')
<div class="row links">
	<i class="glyphicon glyphicon-play icon"></i>
	<a href="#"><span class="level-1">Nhà Đất</span></a>
	<i class="glyphicon glyphicon-play icon"></i>
	<a href="#"><span class="level-2" >Tỉnh/Tp</span></a>
	<i class="glyphicon glyphicon-play icon"></i>
	<a href="#"><span class="level-3" >Mua</span></a>
</div>
@endsection
@section('show-detail')
@include('template.product-lists')
@endsection
@section('pagination')
<div class="pagination">
	<a href= "#" class="first">Đầu tiên</a>
	<a href="#" class="prev"><i class="glyphicon glyphicon-hand-left"></i></a>
	<a href="#">1</a> 
	<a href="#">2</a> 
	<a  href="#" class="next"><i class="glyphicon glyphicon-hand-right"></i></a>
	<a href="#" class="last">Cuối</a>
</div>
@endsection
