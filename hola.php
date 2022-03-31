<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mapfit Map</title>
    <link href="https://staging.mapfit.com/cdn/v3-0/assets/css/mapfit.css" rel='stylesheet' />
	<link href="https://cdn.mapfit.com/v2-4/assets/css/mapfit.css" rel='stylesheet' />
	<!-- diseño de switch -->
   <link rel="stylesheet" type="text/css" href="vista/dist/css/switch/switches.css">
</head>
<body>
    <div id="mapfit" style="width: 100%; height: 435px;"></div>

   <script src="https://cdn.mapfit.com/v2-4/assets/js/tetragon.js"></script>
    <script src="https://cdn.mapfit.com/v2-4/assets/js/mapfit.js"></script> 
	<script src="https://staging.mapfit.com/cdn/v3-0/assets/js/tetragon.js"></script>
    <script src="https://staging.mapfit.com/cdn/v3-0/assets/js/mapfit.js"></script>
	
	<div class="box-tools pull-right">
                  <label class="switch">
		          <input type="checkbox" id="modo" onclick="miTema()"/>
                  <span class="slider round"></span>
            
                  </label>
				  <a id="text" style="display:none">Modo Nocturno!</a>
				  
                </div>
	
    <script>
	let map ;
	
	 
      // create map
       map = mapfit.MapView('mapfit', {theme: 'day'});
     config_mapa();
	 
	 
	 function config_mapa(){
		 
	   mapfit.apikey = "591dccc4e499ca0001a4c6a4ea3bc6745e7646b6b516841c21c89a91";	 
      //set zoom
      map.setZoom(10); 
	  
	     // add marker
       position = mapfit.LatLng([3.4372201, -76.5224991])
      // myMarker = mapfit.Marker(position);
      //myMarker.setIconUrl('cafe')
      map.setCenter(position)
	  
     // map.addMarker(myMarker);
	  // disable zoom controls
    map.setZoomControlVisibility(true);
	// enable recenter
    map.setRecenterButtonEnabled(true);
	//disable pan
      map.setPanEnabled(true);
	  //disable pinch
	  map.setPinchEnabled(true);
	 }
    
	function miTema(){
		        
				var checkBox = document.getElementById("modo");
				var text = document.getElementById("text");
				if (checkBox.checked == true){
					text.style.display = "block";
					map.remove();
					
					  map = mapfit.MapView('mapfit', {theme: 'night'});
                      config_mapa();

				} else {
					 text.style.display = "none";
					 map.remove();
					
					  map = mapfit.MapView('mapfit', {theme: 'day'});
					 config_mapa();
					
				}
			}
	</script>
</body>
</html>