<div class="row">
	<div class="col-sm-3"><span class="span-bold" >Số lượt Up còn lại: </span><span class="span-bold-red" id="totalup">{{$total_uptin}}</span></div>
</div>
<div class="row">
	<div class="col-sm-2 pull-right"><span class="span-bold" ><i class="fa fa-level-up span-bold-red"></i>
	@if($total_uptin > 0)
		<a href="#" id="uptatca" >Làm mới tất cả</a></span>
	@else
		<a id="mualuotup" href="{{Asset('dangtin/mualuotup')}}">Mua Lượt Up</a>
		
	@endif
		<a href="{{Asset('dangtin/mualuotup')}}" style="display:none"  id="mualuotup1">Mua Lượt Up</a>
	</div>
		

</div>
<script type="text/javascript" >
var totalpage = {{$totalpage}};
$(document).ready(function(){

  $("#uptatca").click(function(event) {
         event.preventDefault();
          	var id = 1;

          $.ajax({
            url : "{{asset('dangtin/allup')}}",
            type : 'post',
            dataType: 'json',
            data: {'id':id},
            success : function (result){
            	
            		
            	 	 if(result.check_total_uptin == 0)  {
            	 	 	alert("Hãy mua thêm lượt Up");
            	 		$('#uptatca').hide();
                        $('#mualuotup1').show();
            	 		$('#mualuotup').hide();
            	 		
            	 	}
            	 	else {
            	 		alert("Số tin làm mới thành công: " + result.total_uptin);
            	 		$('#totalup').html(result.total_uptin_conlai);
            	 		if(result.total_uptin_conlai ==0){
            	 			$('#uptatca').hide();
                            $('#mualuotup').hide();
            	 			$('#mualuotup1').show();
            	 		}
            	 	}
             // $('#id_item_batdongsanbytag'+id).hide();
            }
        });

    });
 });
   //sear
</script>
