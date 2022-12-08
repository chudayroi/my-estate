

<div class="row">
   <div class="col-sm-12">
      <div class="form-group">
         <label class="diachi-label"  for="title">Xem Vị trí bản đồ</label>
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
   lt = {{$products->lt}};
   lg = {{$products->lg}};
	$("#lt").val(lt);
	$("#lg").val(lg);

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
		 marker1 = new L.marker([lt,lg]).bindPopup("<div class='row'> <span class='title-line'>Diện tích:</span> {{$products->area}} m<sup>2</sup></div><div class='row'><span class='title-line'>Giá:</span> {{$products->amount}} {{$products->amount_unit}}</div>").openPopup();
		        marker1.on("mouseover", mouseover);
		     	 map.addLayer(marker1);
		     	 
		
     	 }
   
  
   
   
   
   function mouseover() {
   
     this.openPopup();
     };
    
    $(".reload").click(function(event) {
		    event.preventDefault();
		  
         map.setView(new L.LatLng(lt,lg), 14);
        
		});
     	
</script>

