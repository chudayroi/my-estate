<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
<style>

 
</style>
<script src="libs/js/jquery-2.1.3.min.js"></script>

    
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="libs/css/style.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
     <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
</head>
<body>

<div id="wrapper">
<div id="map">
</div>
<div id="map_show" class="row"  >
	<button type="button" style="display:none" class="btn btn-default btn_showbox" id="btn_showbox" aria-label="Left Align">
	<span class="glyphicon glyphicon-expand fa-2x icon_showbox" aria-hidden="true"></span>
	</button>
</div>
<div id="over_map" class="row">
	<div class=" over_map1">
		<div class="row top">
		<div class="col-sm-2 ">
			<select style="border: solid 0px #f5f5f5">
			  <option value="en">EN</option>
			  <option value="bg">BG</option>
			  <option value="ca">CA</option>
			  <option value="cs">CS</option>
			</select>
	  	</div>
	  <div class="col-sm-7">
            <img id='image' src="libs/image/anhnoimang.png" width='200px' height='60px' alt='delete'/>
	  </div>
	  <div class="col-sm-1 pull-left">
	  	<button type="button" class="btn btnborder" aria-label="Left Align">
	  		<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
		</button>

	  </div>
	  <div class="col-sm-1 pull-left">
	  	<button type="button" id="btnclose" class="btn btnborder" aria-label="right Align">
	  		<span class="glyphicon glyphicon-remove-circle " aria-hidden="true"></span>
		</button>
	  </div>
  </div>
	<div class="row">
		<div class="col-sm-12">
			<div class="row top">
				<label for="start" class="col-sm-2 start">Start</label>
				<div class="col-sm-6" >
	                 <input type="text" class="form-control" id="start" name="start" value ="" placeholder="">
				</div>
				 <div class="col-sm-1 pull-left">
				  	<button type="button" id="clear_start" class="btn btnborder" aria-label="right Align">
				  		<span class="glyphicon glyphicon-remove-circle " aria-hidden="true"></span>
					</button>
				  </div>
				<div class="col-sm-3 right">
				  	<button type="button" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true">Show</span>
					</button>
			  </div>
			</div>
			<div class="row top">
				<label for="end" class="col-sm-2 end">End</label>
				<div class="col-sm-6"  >
	                 <input type="text" class="form-control" id="end" name="end" value ="" placeholder="">
				</div>
				<div class="col-sm-1 pull-left">
				  	<button type="button" id="clear_end" class="btn btnborder" aria-label="right Align">
				  		<span class="glyphicon glyphicon-remove-circle " aria-hidden="true"></span>
					</button>
				 </div>
				<div class="col-sm-3 right">
				  	<button type="button" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true">Show</span>
					</button>
			  	</div>
			</div>
			<div class="row top">
				<div class="col-sm-2 ">
				  	<button type="button" id="reset" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true">Reset</span>
					</button>
			  	</div>
				<div class="col-sm-offset-2 col-sm-5 top2">
					<select style="border: solid 0px #f5f5f5">
					  <option value="volvo">Car(fastest)</option>
					  <option value="saab">Car(fastest)</option>
					</select>
			  	</div>
				<div class="col-sm-3 right">
				  	<button type="button" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true">Reverse</span>
					</button>
			  </div>
			</div>
			
			<div class="row top">
			<label for="end" class="col-sm-2 end">Menu:</label>
				<div class="col-sm-4">
				  	<button type="button" id="tramxang" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true"> Trạm xăng </span>
					</button>
					<button type="button" id="close_tramxang" style="display:none" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true"> Close Trạm xăng </span>
					</button>
			  	</div>
				
				<div class="col-sm-3 right">
				  	<button type="button" id= "atm" class="btn btn-default" aria-label="Left Align">
				  		<span class="" aria-hidden="true">ATM</span>
					</button>
			  </div>
			</div>

		</div>
		</div>
		

	</div>

	<div class="over_map2">
		
		<div class="row description">
			<div class="col-sm-6 ">
				<strong class="route_des"> Route Description</strong>
			</div>
			<div class="col-sm-offset-3 col-sm-3 pull-right ">
				<button class="btn btn_a" id="a" type="submit">A</button>
				<button class="btn btn_b" id="b" type="submit">B</button>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-6 ">
				<span>(Le duan)</span>
			</div>
			
		</div>
		<div class="row ">
			<div class="col-sm-6 ">
				<span>Distance: 123456</span>
			</div>
			<div class="col-sm-offset-2 col-sm-4 pull-right">
				<a href="#">[Generate Link]</a>
			</div>
			
		</div>
		<div class="row ">
			<div class="col-sm-6 ">
				<span>Duration:7 min</span>
			</div>
			<div class="col-sm-offset-3 col-sm-3 pull-right">
				<a href="#">[GPX File]</a>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-1 icon">
				A
			</div>
			<div class="col-sm-8">
				lsdfd sdfsdf sdfsdf sdfsdf sfsd
			</div>
			<div class="col-sm-3">23423 km
				
			</div>
			
		</div>
	</div>
</div>
</body>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script>
// create a map in the "map" div, set the view to a given place and zoom

 var map=  L.map("map", {
    zoomControl: false
    //... other options
});
 map.setView([10.77155, 106.69841], 13);
//add zoom control with your options
L.control.zoom({
     position:'topright'
}).addTo(map);
// add an OpenStreetMap tile layer
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// add a marker in the given location, attach some popup content to it and open the popup
L.marker([10.77155, 106.69841]).addTo(map)
    .bindPopup('A pretty CSS3 popup. <br> Easily customizable.')
    .openPopup();
var circle = L.circle([10.77155, 106.68741], 500, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(map);
var polygon = L.polygon([
    [10.77665, 106.65493],
    [10.77631, 106.67038],
    [10.76451, 106.64532]
]).addTo(map);
//add tram xang
			/*for(var i = 1;i<10;i++){
				var tramxang = 'tramxang'+i;
				var lt = 10.80599 - i/100;
				var lg =  106.70214 - i/100 ;
	  			tramxang = new L.marker([lt,lg], {draggable:'true'}).bindPopup(tramxang).openPopup();
	  			tramxang.myCustomID = 'tramxang'+i;
			  	tramxang.on('dragend', function(event){

			    var tramxang = event.target;
			    alert(this.myCustomID);
			    var position = tramxang.getLatLng();
			    lt = tramxang.getLatLng().lat.toFixed(5);
	    	 	lg = tramxang.getLatLng().lng.toFixed(5);
			  	point = '('+ lt + ','+ lg +')';
			   
			    
			    tramxang.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
			    map.panTo(new L.LatLng(position.lat, position.lng))
			  	});
	    		 map.addLayer(tramxang);
    		}
    		*/
//End add tram xang
/*
function onMapClick(e) {
                if ($('#start').val() == ''){
                        $('#start').val(e.latlng);
                        L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
                    .bindPopup('Start')
                    .openPopup();
                }
                else if(($('#start').val() != '') && ($('#end').val() == '')) {
                        $('#end').val(e.latlng);
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
                    .bindPopup('End')
                    .openPopup();

                }
}
map.on('click', onMapClick);
*/
function onMapClick(e) {
		   console.log(e);

	var lt,lg,point;
	if ($('#start').val() == ''){
    	  marker1 = new L.marker(e.latlng, {draggable:'true'}).bindPopup('Start').openPopup();
    	  lt = marker1.getLatLng().lat.toFixed(5);
    	  lg = marker1.getLatLng().lng.toFixed(5);

		  point =  lt + ','+ lg ;
		  $('#start').val(point);
		  marker1.myCustomID = 'start';
		   marker1.on('dragend', function(event){

		    var marker1 = event.target;
		    //alert(this.myCustomID);
		    var position = marker1.getLatLng();
		    lt = marker1.getLatLng().lat.toFixed(5);
    	 	lg = marker1.getLatLng().lng.toFixed(5);
		  	point = '('+ lt + ','+ lg +')';
		   
		    if(this.myCustomID == 'start'){
	 			$('#start').val(point);
	 		}
	 		if(this.myCustomID == 'end'){
	 			$('#end').val(point);
	 		}
		    marker1.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
		    map.panTo(new L.LatLng(position.lat, position.lng))
		  });
	///

	 map.addLayer(marker1);
		  
	 } 
	else if(($('#start').val() != '') && ($('#end').val() == '')) {
		 marker2 = new L.marker(e.latlng, {draggable:'true'}).bindPopup('End').openPopup();;
    	  lt = marker2.getLatLng().lat.toFixed(5);
    	  lg = marker2.getLatLng().lng.toFixed(5);
		  point = lt + ','+ lg;
		  $('#end').val(point);
		  marker2.myCustomID = 'end';
		  marker2.on('dragend', function(event){

		    var marker2 = event.target;
		    //alert(this.myCustomID);
		    var position = marker2.getLatLng();
		    lt = marker2.getLatLng().lat.toFixed(5);
    	 	lg = marker2.getLatLng().lng.toFixed(5);
		  	point = '('+ lt + ','+ lg +')';
		   
		    if(this.myCustomID == 'start'){
	 			$('#start').val(point);
	 		}
	 		if(this.myCustomID == 'end'){
	 			$('#end').val(point);
	 		}
		  //  console.log(marker._latlng.lat);
		    marker2.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
		    map.panTo(new L.LatLng(position.lat, position.lng))
		  });
	///

	 map.addLayer(marker2);
		  
	}
	
	//move marker
	 
	

};

map.on('click', onMapClick);
$(document).ready(function(){
	$("#btnclose").click(function(event) {
		    event.preventDefault();
		   //alert(124);
		   $("#over_map").hide();
		   $('#btn_showbox').show();

	});
	$("#btn_showbox").click(function(event) {
		    event.preventDefault();
		   $("#over_map").show();
		   $('#btn_showbox').hide();

	});
	$("#clear_start").click(function(event) {
		    event.preventDefault();
			$('#start').val('');
			map.removeLayer(marker1);


	});
	$("#clear_end").click(function(event) {
		    event.preventDefault();
			$('#end').val('');
				map.removeLayer(marker2);
	});
	$("#reset").click(function(event) {
		    event.preventDefault();
			$('#start').val('');
			map.removeLayer(marker1);
		    $('#end').val('');
		    map.removeLayer(marker2);
	});
	$("#tramxang").click(function(event) {
		    event.preventDefault();
			for(var i = 1;i<5;i++){
				var tramxang = 'tramxang'+i;
				var lt = 10.80599 - i/100;
				var lg =  106.70214 - i/100 ;
	  			tramxang = new L.marker([lt,lg], {draggable:'true'}).bindPopup(tramxang).openPopup();
	  			tramxang.myCustomID = 'tramxang'+i;
			  	tramxang.on('dragend', function(event){

			    var tramxang = event.target;
			   
			    var position = tramxang.getLatLng();
			    lt = tramxang.getLatLng().lat.toFixed(5);
	    	 	lg = tramxang.getLatLng().lng.toFixed(5);
			  	point = '('+ lt + ','+ lg +')';
			   
			    
			    tramxang.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
			    map.panTo(new L.LatLng(position.lat, position.lng))
			  	});
	    		 map.addLayer(tramxang);
    		}

    		$("#tramxang").hide();
    		$("#close_tramxang").show();
	});
	$("#close_tramxang").click(function(event) {
		    event.preventDefault();
			for(var i = 1;i<2;i++){
				var tramxang1 = 'tramxang'+i;
				map.removeLayer(tramxang);
    		}

    		$("#tramxang").show();
    		$("#close_tramxang").hide();
	});
	$("#atm").click(function(event) {
		    event.preventDefault();
					for(var i = 1;i<10;i++){
				var atm = 'atm'+i;
				var lt = 10.80599 - i/100;
				var lg =  106.70214 - i/100 ;
	  			atm = new L.marker([lt,lg], {draggable:'true'}).bindPopup(atm).openPopup();
	  			atm.myCustomID = 'atm'+i;
			  	atm.on('dragend', function(event){

			    var atm = event.target;
			    alert(this.myCustomID);
			    var position = atm.getLatLng();
			    lt = atm.getLatLng().lat.toFixed(5);
	    	 	lg = atm.getLatLng().lng.toFixed(5);
			  	point = '('+ lt + ','+ lg +')';
			   
			    
			    atm.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
			    map.panTo(new L.LatLng(position.lat, position.lng))
			  	});
	    		 map.addLayer(atm);
    		}
	});
});
</script>


</html>


