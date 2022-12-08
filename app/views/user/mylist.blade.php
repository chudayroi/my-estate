@extends('tintuc.basic')

@section('content')
<div class="container">

      
   <div class="row ">
      <div class="col-sm-9 user-mylist">
      <div class='col-sm-12 category-batdongsannoibat'>
      <span class='span-batdongsannoibat'>Danh Sách User</span>
   </div>
        @if(!empty($user_list))
        <?php $i=0;?>
        @foreach($user_list as $product)
        <?php $i++;?>

        <div class="row mylist-user" id="mylist-user{{$product['id']}}">
        <div class="col-sm-1 checkbox-user">
          <input name="checkbox" id="checkbox" value="1" type="checkbox" data-toggle="tooltip" data-placement="right" title="Chọn">
        </div>
          <div class="col-sm-3 user_content" id="user_email">
            <a href="{{Asset('user')}}/{{$product['id']}}"  class="myist-image-a" id="myist-image-a1">
                {{$product['email']}}
            </a>
          </div>
          <div class="col-sm-1 user_content" id="user_firstname">
                {{$product['first_name']}}
          </div>
           <div class="col-sm-1 user_content" id="user_lastname">
                {{$product['last_name']}}
          </div>
              
              <div class="col-sm-1 user_conttent" id="user-edit">
                  <a class="mylist-action-sub" id="edit{{$i}}" title="Sửa"data-toggle="tooltip" data-placement="right" title="Sửa"  href="{{Asset('user')}}/edit/{{$product['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
              </div>
              <div class="col-sm-1 user_conttent" id="user-delete">
                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modal{{$product['id']}}" id="{{$product['id']}}" title="Xóa" title="Xóa" ><i class="glyphicon glyphicon-trash icon1"></i></button>
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
        </div> <!--End news-mylist-item-->

          @endforeach
          @endif
    
      </div><!--End .news-myist-->

      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
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
