

<div class="row">
   <div class="col-sm-12">
      <div class="form-group">
         <label class="diachi-label"  for="title">Chọn Vị trí bản đồ</label>
         <div class="line">
         </div>
      </div>
   </div>
</div>
<div class="col-sm-12" style="display:none " >
   <input type="text" class="form-control" id="start" name="start" value ="0" placeholder="">
</div>
<div id="map" style="width: 700px; height: 600px"></div>
<div class="col-sm-12">
		<button type='button' class='btn btn-danger btn-xs reload'>reload</button>
	   <input type="text"  id="lt" name="lt" value ="0" placeholder="">
	   <input type="text"  id="lg" name="lg" value ="0" placeholder="">
 </div>
<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>
   var lt,lg;
   lt = {{$product->lt}};
   lg = {{$product->lg}};
	$("#lt").val('{{$product->lt}}');
	$("#lg").val('{{$product->lg}}');

   var map = L.map('map').setView([lt,lg],15);
   
   L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
   	maxZoom: 18,
   	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
   		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
   		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
   	id: 'mapbox.streets'
   }).addTo(map);
   //creat market
  if(lt !=''){
		 marker1 = new L.marker([lt,lg], {draggable:'true'}).bindPopup("<div class='row'>Diện tích:1000 m2, Giá 100 trieu<div> <div><button type='button' class='btn btn-danger btn-xs marker-delete-button'>Xóa</button><button type='button' class='btn btn-danger btn-xs marker-detail-button'>Chi tiết</button></div>").openPopup();
		        marker1.on("popupopen", onPopupOpen);
		        marker1.on("mouseover", mouseover);
		     	 map.addLayer(marker1);
		     	  map.addLayer(marker1);
		             $('#start').attr('value',1);
		marker1.on('dragend', function(event){
		    var marker1 = event.target;
		    //alert(this.myCustomID);
		    var position = marker1.getLatLng();
		    lt = marker1.getLatLng().lat.toFixed(5);
    	 	lg = marker1.getLatLng().lng.toFixed(5);
    	 	$('#lt').val(lt);
            $('#lg').val(lg);

		  	point = '('+ lt + ','+ lg +')';
		  	marker1.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
		    map.panTo(new L.LatLng(position.lat, position.lng))
		    console.log(lt);
		   
});
     	 }
   //end
   function onMapClick(e) {
      console.log(e);
            if ($('#start').val() == '0'){
             $('#start').attr('value',1);
      var lt,lg,point;
   
       marker1 = new L.marker(e.latlng, {draggable:'true'}).bindPopup("<div class='row'>Dien tich:1000 m2, Giá 100 trieu<div> <div><button type='button' class='btn btn-danger btn-xs marker-delete-button'>Xóa</><button type='button' class='btn btn-danger btn-xs marker-detail-button'>Chi tiết</button></div>").openPopup();
        marker1.on("popupopen", onPopupOpen);
        marker1.on("mouseover", mouseover);
     	  lt = marker1.getLatLng().lat.toFixed(5);
     	  lg = marker1.getLatLng().lng.toFixed(5);
     	  $('#lt').attr('value',lt);
            $('#lg').attr('value',lg);
              marker1.on('dragend', function(event){
      var lt,lg,point;
              	
       var marker1 = event.target;
       //alert(this.myCustomID);
       var position = marker1.getLatLng();
       lt = marker1.getLatLng().lat.toFixed(5);
     	 	lg = marker1.getLatLng().lng.toFixed(5);
     	 	$('#lt').attr('value',lt);
            $('#lg').attr('value',lg);
     	point = '('+ lt + ','+ lg +')';
     	marker1.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
       map.panTo(new L.LatLng(position.lat, position.lng))
       console.log(point);
       
       
     });
   ///
   map.addLayer(marker1);
       }
   
   };
   map.on('click', onMapClick);
   function onPopupOpen() {
   
     var tempMarker = this;
   
     
     $(".marker-delete-button:visible").click(function () {
         map.removeLayer(tempMarker);
             $('#start').attr('value',0);
          $('#lt').attr('value',0);
            $('#lg').attr('value',0);
          });
   
      $(".marker-detail-button:visible").click(function () {
            alert(123);
          });
     };
      
   
   
   function mouseover() {
   
     this.openPopup();
     };
    
    $(".reload").click(function(event) {
		    event.preventDefault();
		  
         map.setView(new L.LatLng(10.63657,106.63725), 14);
        
		});
     	
</script>

