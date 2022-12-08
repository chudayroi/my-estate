      <div class="form-batdongsanbytag">
   @if(!empty($list))
   <?php $i=0;?>
   @foreach($list as $product)
   <?php $i++;?>
   <div class="col-sm-12 batdongsanbytag hvr-glow hvr-box-shadow-inset hvr-overline-from-center" id="id_batdongsanbytag{{$product['id']}}">
      <div class="col-sm-12 item-batdongsanbytag " id ="id_item_batdongsanbytag{{$product['id']}}">
            <div class="col-sm-12 content-title-batdongsanbytag" id ="id_content_title_batdongsanbytag{{$product['id']}}">
                  <a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}"><span class='span-bold-blue'>{{$product['title']}}</span></a>
            </div>
         <div class="col-sm-2 image-batdongsanbytag" id="id_image_batdongsanbytag{{$product['id']}}">
            <div class="row ">
               <a href="{{Asset($product['category_title'])}}/{{$product['name']}}-{{$product['id']}}" id="ai{{$product['id']}}">
               @if(!empty($product['image']))
               <img src="{{asset('assets/img')}}/{{$product['image']}}" class="img-responsive img-category-batdongsanbytag" alt="{{$product['name']}}"/>
               @else
               <img src="{{asset('assets/img')}}/tinbatdongsan.png" class="img-responsive img-category" alt="{{$product['name']}}"/>
               @endif
               </a>
            </div>
         </div>
         <div class="col-sm-8" id='title{{$product['id']}}'>
            <div class="row title-batdongsanbytag">
               
                 <div class="col-sm-2 info2">
                  <span class='span-bold'>DT:</span> <span>{{$product['area']}}m<sup>2</sup></span>
              
               </div>
                <div class="col-sm-3 info2">
               <span class='span-bold'>Giá:</span>
                     <span class='span-bold-red'>
                 {{$product['amount']}}
                 
                  {{$product['amount_unit']}}
                  </span>
               </div>
               <div class="col-sm-3 info2">
                  <span class='span-bold'>
                  {{$product['district']}}, {{$product['city']}}
                   </span>
               </div>
            </div>

         </div>
          <div class="col-sm-2 pull-left" id="id_action{{$product['id']}}">
            <div class="col-sm-12 tools" id="tools{{$product['id']}}">
          <div class="col-sm-2 icon-edit" id="icon-edit{{$product['id']}}">
            <a class="" id="edit{{$product['id']}}" title="Sửa" href="{{asset('dangtin/edit')}}/{{$product['name']}}-{{$product['id']}}"><i class="glyphicon glyphicon-edit"></i></a>
          </div>
          <div class="col-sm-2 icon-up" id="icon-up{{$product['id']}}">
            <a class="btn-up" id="up{{$product['id']}}" title="Up" href="#"><i class="glyphicon glyphicon-arrow-up"></i></a>
          </div>
          <div class="col-sm-2 icon-remove" id="icon-remove{{$product['id']}}">
            <a class="btn-delete" id="remove{{$product['id']}}" href="#"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        </div>
          </div>
      </div>
      </div>
  
   <!--end .product-item-->
   @endforeach
   @else
   <div class="col-sm-12"><span style="color:red">Không tìm thấy!</span></div>
   @endif
      </div>
<div class="pagination">
  @if($currentpage !='1')
  <a href="{{asset("dangtin/list")}}/1" class="">First</a>
  @endif
  @if($currentpage > '1')
  <a href="{{asset("dangtin/list")}}/{{$data['prepage']}}" class="prev"><i class="fa fa-arrow-left"></i></a>
  @endif
  @for($i=1;$i<=$totalpage;$i++)
  @if($i == $currentpage)
  <a class = "currentpage" href="{{asset("dangtin/list")}}/{{$i}}">{{$i}}</a> 
  @else
  <a class = "currentpage1" href="{{asset("dangtin/list")}}/{{$i}}">{{$i}}</a> 
  @endif
  @endfor
   @if($currentpage < $totalpage)
  <a href="{{asset("dangtin/list")}}/{{$data['nextpage']}}" class="next"><i class="fa fa-arrow-right"></i></a>
  @endif
  @if($currentpage != $totalpage)
  <a href="{{asset("dangtin/list")}}/{{$data['totalpage']}}" class="last">Last</a>
  @endif
</div>
<!-- pi -->
   
<!--End .row-->


<script type="text/javascript">

  $(document).ready(function(){
   $(".btn-delete").click(function(event) {
        event.preventDefault();
        var id = this.id;
         id = id.replace("remove", ""); 
         $.ajax({
            url : "{{asset('dangtin/delete')}}",
            type : 'post',
            dataType: 'json',
            data: {'id':id},
            success : function (result){
              $('#id_item_batdongsanbytag'+id).hide();
            }
        });
    });
 
$(".btn-up").click(function(event) {
         event.preventDefault();
         
        var id = this.id;
        id = id.replace("up", ""); 
         $.ajax({
            url : "{{asset('dangtin/up')}}",
            type : 'post',
            dataType: 'json',
            data: {'id':id},
            success : function (result){
              $('#totalup').html(result.total_uptin_conlai);
              if(result.check_total_uptin ==0) {
                  $('#uptatca').hide();
                  $('#mualuotup').hide();
                  $('#mualuotup1').show();
                }
               else  $('#up'+id).hide();
            

            }
        });
    });

});

</script>
   
<!--End .row-->

