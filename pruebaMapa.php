<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
   integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
   crossorigin=""/>
    <link rel="stylesheet" href="plugins/leaflet.pm-develop/leaflet.pm.css"/>
  <body>
    <div id="map" style="height: 1000px;">
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
     integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
     crossorigin=""></script>

     <script  src="plugins/leaflet.pm-develop/leaflet.pm.min.js"></script>
    <script src="leaflet-tilelayer-here.js"></script>
    <script>

    var map = L.map('map').setView([3.4372201, -76.5224991], 13);
    L.marker([51.50915, -0.096112], { pmIgnore: true }).addTo(map);
/*
   var layer = L.tileLayer('http://1.base.maps.cit.api.here.com/maptile/2.1/maptile/newest/normal.day/{z}/{x}/{y}/256/png8?&app_id=bI8qS9hvczbJxOSBuMmg&app_code=Zl9ok_j17Xqr0x7ATtwDPA', {
   //attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
 }).addTo(map);
 */
 var scheme = 'normal.day.grey';

 var HERE_normalDay = L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}', {
	attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
	subdomains: '1234',
	mapID: 'newest',
	app_id: 'bI8qS9hvczbJxOSBuMmg',
	app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
	base: 'base',
	maxZoom: 20,
	type: 'maptile',
	language: 'eng',
	format: 'png8',
  scheme : scheme,
  //scheme: 'normal.night.grey',
	size: '256'
}).addTo(map);
  //  L.marker([51.50915, -0.096112], { pmIgnore: true }).addTo(map);
    var options = {
        position: 'topleft', // toolbar position, options are 'topleft', 'topright', 'bottomleft', 'bottomright'
        drawMarker: false, // adds button to draw markers
        drawPolyline: false, // adds button to draw a polyline
        drawRectangle: false, // adds button to draw a rectangle
        drawPolygon: true, // adds button to draw a polygon
        drawCircle: true, // adds button to draw a cricle
        cutPolygon: false, // adds button to cut a hole in a polygon
        editMode: false, // adds button to toggle edit mode for all layers
        removalMode: true, // adds a button to remove layers
    };
    // add leaflet.pm controls to the map
    map.pm.addControls(options);
   config_mapa();
/////////////////////////////////////////////////////////////////////////

    function downloadUrl(url, callback)
{
    var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;

    request.onreadystatechange = function() {
    if (request.readyState == 4) {
    request.onreadystatechange = doNothing;
    callback(request, request.status);
       }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing(){

}


function config_mapa(){

  //mapfit.apikey = "591dccc4e499ca0001a4c6a4ea3bc6745e7646b6b516841c21c89a91";
   //set zoom
   //


    //position = L.LatLng(3.4372201, -76.5224991)
    //map.setCenter(position);



 downloadUrl('controladores/datosXml.php', function(data)
 {
   var xml = data.responseXML;
   //window.alert('xml tiene un valor: ' +xml);
   var markers = xml.documentElement.getElementsByTagName('marker');

   Array.prototype.forEach.call(markers, function(markerElem)
   {
     var nombre = markerElem.getAttribute('nombre');
     var tipo = markerElem.getAttribute('tipo');
     var serie = markerElem.getAttribute('serie');
     var fecha = markerElem.getAttribute('fecha');
     var velocidad = markerElem.getAttribute('speed');

     var point = L.LatLng([
         parseFloat(markerElem.getAttribute('lat')),
         parseFloat(markerElem.getAttribute('lng'))]);
       //  position = mapfit.LatLng([3.4372201, -76.5224991])
     //  window.alert('point tiene un valor: ' +point);



     //var miMarcador = mapfit.Marker([point]);
     //map.addMarker(miMarcador);

     // add marker
     myMarker = mapfit.Marker(point);
     var informacion = mapfit.PlaceInfo();
     informacion.setTitle('<h4 align= center>'+nombre+'</h4><hr/>');
     informacion.setDescription('<p><strong>velocidad: </strong>'+velocidad+' Km/h </br><strong>ultimo registro: </strong></br>'+fecha+'</br><strong>estado:</strong></p>');
     //informacion.setContent('<h5 align= center >'+serie+'</h5></br><p><strong>velocidad: </strong>'+velocidad+' Km/h </br><strong>ultimo registro: </strong></br>'+fecha+'</p>');
     informacion.enableDirectionsButton(true);

     myMarker.setPlaceInfo(informacion);
     if (tipo != 1) {
     myIcon.setIconUrl('sports');// fijar la categoria
   }else {
     myIcon.setIconUrl('auto');// fijar la categoria
   }


     myMarker.setIcon(myIcon); //asignar icono al marcador

     //agregarmarcador al mapa
     map.addMarker(myMarker);





     museums.add(myMarker);
     map.addLayer(myMarker);
     map.setCenterWithLayer(museums, 90, 90 );

/*
     var circle = L.circle([51.508, -0.11], {
         color: 'red',
         fillColor: '#f03',
         fillOpacity: 0.5,
         radius: 500
     }).addTo(map);

     var polygon = L.polygon([
         [3.537568, -76.541935],
         [3.450334, -76.382681],
         [3.436764, -76.540964]
     ]).addTo(map);
*/




   });
 });


}



    </script>
  </body>
</html>
