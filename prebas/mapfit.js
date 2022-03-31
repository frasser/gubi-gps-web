

<!-- libreria de Mapfit  Font -->
 <link href="http://cdn.mapfit.com/v2-4/assets/css/mapfit.css" rel='stylesheet' />



<!------ archivos necesarios para cargar api de mapfit ----->
<script src="https://cdn.mapfit.com/v2-4/assets/js/tetragon.js"></script>
<script src="https://cdn.mapfit.com/v2-4/assets/js/mapfit.js"></script>

<!------ aca terminan los archivos necesarios para cargar api de mapfit ----->

let map ; // crea el mapa
let myIcon = mapfit.Icon(); //crear icono
let museums = mapfit.Layer(); // crea una capa de marcadores
//let placeInfo = mapfit.PlaceInfo(); // crea cuadro de informacion


// create map
map = mapfit.MapView('map', {theme: 'day'},{drawControl: true});
// map.showUserLocation(); // permite ubicar posicion de usuario

var mapi = L.map('map').setView([43.2980 , -1.9887], 13);
L.marker([51.50915, -0.096112], { pmIgnore: true }).addTo(map);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

config_mapa();




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

mapfit.apikey = "591dccc4e499ca0001a4c6a4ea3bc6745e7646b6b516841c21c89a91";
//set zoom
//


position = mapfit.LatLng([3.4372201, -76.5224991])
map.setCenter(position);



// add marker
/*myMarker = mapfit.Marker([3.48861, -76.48547]);

myIcon.setIconUrl('auto');// fijar la categoria

myMarker.setIcon(myIcon); //asignar icono al marcador

//agregarmarcador al mapa
map.addMarker(myMarker);

*/




// disable zoom controls
map.setZoomControlVisibility(true);
// enable recenter
map.setRecenterButtonEnabled(true);
//disable pan
map.setPanEnabled(true);
//disable pinch
map.setPinchEnabled(true);

map.zoomControl.setPosition ('topleft'); /// linea para ubicar la posicion del controlador de zoom

// define toolbar options
var options = {
position: 'topleft', // toolbar position, options are 'topleft', 'topright', 'bottomleft', 'bottomright'
drawMarker: true, // adds button to draw markers
drawPolyline: true, // adds button to draw a polyline
drawRectangle: true, // adds button to draw a rectangle
drawPolygon: true, // adds button to draw a polygon
drawCircle: true, // adds button to draw a cricle
cutPolygon: true, // adds button to cut a hole in a polygon
editMode: true, // adds button to toggle edit mode for all layers
removalMode: true, // adds a button to remove layers
};

// add leaflet.pm controls to the map
map.pm.addControls(options);


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

 var point = mapfit.LatLng([
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

function miTema(){

 var checkBox = document.getElementById("modo");
 var text = document.getElementById("text");
 if (checkBox.checked == true){
   text.style.display = "block";
   map.remove();

     map = mapfit.MapView('map', {theme: 'night'});
               config_mapa();

 } else {
    text.style.display = "none";
    map.remove();

     map = mapfit.MapView('map', {theme: 'day'});
    config_mapa();

 }
}

//var coordenadasPoligono =  Array(); // arreglo que almacena coordenadas para poligono
var coords;

function onMapClick(e) {
alert( e.latlng.toString());

//var valor = e.latlng;
//coordenadasPoligono.push[e.latlng];
//alert("tus coordenadas son :  " + coordenadasPoligono[0]);

}

map.on('click', onMapClick); // evento para capturar corrdenada del mapa al dar click
//getLatLngBounds()
//3.437437, -76.523075
/////////////////////////////////////////////////////////
<div class="modal fade" id="modal_mapa" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <link rel="stylesheet" href="plugins/leaflet.pm-develop/leaflet.pm.css"/>
        <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editor</h4>
      </div>
      <form role="form" action="" name="frmMapa" method="post" >
        <div id="mapaEdicion" style="height: 470px;">





        //////////////////////////////////////////////////////////////////


          // listen to the center of a circle being added
        geo.on('pm:drawstart', function(e) {
            var layer = e.workingLayer;
            var circle = e.workingLayer;

           var radios = null;

        // este evento sirve para capturar los puntos de un polygono
            layer.on('pm:vertexadded', function(e) {
                // e includes the new vertex, it's marker
                // the index in the coordinates array
                // the working layer and shape
                 co = layer.getLatLngs();

              console.log(co);
              alert(co);
            });





            // evento utilizado para obtener el centro de una circunferencia
            circle.on('pm:centerplaced', function(e) {
                //console.log(e.latLng);

                //alert('el centor es: '+e.latlng);
                //console.log('el centor es: '+e.latlng);
                centro = e.latlng;
                //alert(centro);
                console.log(centro);

                geo.on('pm:drawend', function(e) {
                    e.shape; // the name of the shape being drawn (i.e. 'Circle')
                    radios = null;



                      geo.on('pm:create', function(e) {
            e.shape; // the name of the shape being drawn (i.e. 'Circle')
            e.layer; // the leaflet layer created
          if (e.shape ==='Circle')  {
            radios = e.layer.getRadius();
                //alert(radios);
                //console.log('el radio del circulo es: '+radios);
             var  radio = radios;
               console.log(radio);
               console.log(' estas en el condicional del circulo');
               NuevaGeo();
             }


        });



        });

                });

            });



                geo.on('pm:drawend', function(e) {

                    e.shape; // the name of the shape being drawn (i.e. 'Circle')
                    //alert(e.shape);
                    if (e.shape ==='Poly') {


                      console.log('tus coordenadas son:'+co);
                      NuevaGeo();

                    }


                });
