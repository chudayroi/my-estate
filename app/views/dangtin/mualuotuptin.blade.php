@extends('dangtin.basic')
@section('css')
{{HTML::style('assets/css/dangtin.css');}}
@endsection
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-9 content-detail">
        <div class='col-sm-12 category-batdongsannoibat'>
      <span class='span-batdongsannoibat'>Mua Lượt Up Tin</span>
   </div>
         <div data-example-id="striped-table" class=" col-sm-12 mualuotuptin">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Số Tiền</th>
          <th>Lượt UP</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
      <?php $i=0;?>
         @foreach($program_uptin as $program)
          <?php $i++;?>
        <tr>
          <th scope="row">{{$i}}</th>
          <td>${{number_format($program['amount'],0)}}</td>
          <td>{{number_format($program['total'],0)}}</td>
          <td><button type="button" id = "mua{{$program['id']}}" class="btn btn-primary btn-sm btn-mua">Mua</button></td>
        </tr>
         @endforeach

       
      </tbody>
    </table>
  </div>
  <div style="display:none" class="col-sm-12 mualuotupthanhcong"><span style="color:red">Mua Thành Công!</span></div>
      </div>
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('category.search-sidebar')
         @include('template.tintucnoibat')
         @include('template.batdongsanxemnhieunhat')
         @include('template.flagcounter')
         
      </div>
      <!--End .side-bar-->

   </div>
  
</div>
<!--End .container-->

@endsection

@section('js')
$(".btn-mua").click(function(event) {
         event.preventDefault();
        var id = this.id;
        id = id.replace("mua", "");
        $('.mualuotuptin').hide();
         $.ajax({
            url : "{{asset('dangtin/mualuotup')}}",
            type : 'post',
            dataType: 'json',
            data: {'id':id},
            success : function (result){
              $('.mualuotuptin').hide();
              $('.mualuotupthanhcong').show();
            }
        });
    });

@endSection

  
  