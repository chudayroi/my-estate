@extends('tintuc.basic')

@section('content')
<div class="container">
@include('tintuc.link-category')
      <div>
           @include('tintuc/link-child')
        
      </div>
   <div class="row ">
      <div class="col-sm-9 news-mylist">
        @if(!empty($list))
        <?php $i=0;?>
        @foreach($list as $product)
        <?php $i++;?>
        <div class="row mylist-item" id="mylist-item{{$product['id']}}">
          <div class="col-sm-12" class="mylist-title" id="mylist-title1">
            <a class="mylist-title-a"  id="mylist-title-a1" href="{{Asset('tintuc/detail')}}/{{$product['name']}}-{{$product['id']}}">
              <h4> {{$product['title']}} </h4>
            </a>
          </div>
          <div class="col-sm-4 mylist-image" id="mylist-image1">
            <a href="{{Asset('tintuc/detail')}}/{{$product['name']}}-{{$product['id']}}"  class="myist-image-a" id="myist-image-a1">
               <img src="{{Asset('assets')}}/img/news/{{$product['image']}}" class="img-responsive" alt=""/>
            </a>
          </div>
          <div class="col-sm-7 mylist-content" id="mylist-content1">
                <div class="row" id="mylist-contentsummary1">
                {{$product['content_summary']}}
                </div>
                <div class="row mylist-startdate" id="mylist-startdate1">
                Ngày Đăng: {{$product['startdate']}}
                </div>
          </div>
          <div class="col-sm-1 pull-right mylist-actions" id="mylist-actions1">
              <div class="row mylist-action" id="mylist-checkbox1">
              <div class="controls mylist-action-sub">
                    <input name="checkbox" id="checkbox" value="1" type="checkbox" data-toggle="tooltip" data-placement="right" title="Chọn">
              </div>
              </div>
              <div class="row mylist-action" id="mylist-edit1">
                  <a class="mylist-action-sub" id="edit{{$i}}" title="Sửa"data-toggle="tooltip" data-placement="right" title="Sửa"  href="{{Asset('tintuc/edit')}}/{{$product['name']}}-{{$product['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
              </div>
              <div class="row mylist-action pull-left" id="mylist-delete1">
                    <button type="button" class="btn btn-link " data-toggle="modal" data-target="#modal{{$product['id']}}" id="{{$product['id']}}" title="Xóa" title="Xóa" ><i class="glyphicon glyphicon-trash icon1"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="modal{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete</h4>
                          </div>
                          <div class="modal-body">
                            Bạn có chắc muốn xóa Tin này?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                            <button type="button" class="btn btn-info btn-delete" id="{{$product['id']}}">Có</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!--End modal-->
              </div>
          </div>
        </div> <!--End news-mylist-item-->

          @endforeach
          @endif
    
      </div><!--End .news-myist-->

      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.quangcaofuland')
      
          @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.flagcounter')
         
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
</div>
<!--End .container-->
<script type="text/javascript" >
$('.btn-delete').click(function(event){
   var id= this.id;
    $('#mylist-item'+id).remove();
     $.ajax({
                       url : "{{asset('tintuc/delete')}}",
                       type : 'post',
                       dataType: 'json',
                       data: {id:id},
                       success : function (result){
                        //alert(123);
                       }//End success
    });
  });  
</script>
@endsection
