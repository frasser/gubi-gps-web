document.addEventListener("DOMContentLoaded", function(){
    mapfit.apikey = "591dccc4e499ca0001a4c6a423229dd9f27f4b999d8353e974feb679"
    map = mapfit.MapView('mapfit', {theme: 'grayscale'});
    let center = mapfit.LatLng([40.714997,-73.985367]);
    map.setCenter(center);
    map.setRecenterButtonEnabled(true);
    map.setZoom(13);
    detailMap = mapfit.MapView('detail-map', {theme:'./transitNY.yaml'});
    let position = mapfit.LatLng([40.714997, -73.985367])
    detailMap.setCenter(position);
    detailMap.setRecenterButtonEnabled(true);
    let neighborhoods = []
    let filteredNeighborhoods = []
    let chel = false;
    
    data.features.forEach(function(element){
        
        if(cityHoods.includes(element.properties.name.toLowerCase())){
            if(element.properties.name.toLowerCase() == "chelsea" && !chel){
                chel = true;
            }else{
                districts.push(element.properties.name)
                neighborhoods.push(element.geometry.coordinates[0][0])
            }
            
        }
       
    })
    neighborhoods.forEach(function(element, idx){
        let newArr = [];
        element.forEach(function(element){
        
            let arr = []
            arr.push(element[1],element[0])
            newArr.push(arr);
        })
        filteredNeighborhoods.push(newArr);
    })
    
    filteredNeighborhoods.forEach(function(element, idx){
        
        let poly = mapfit.Polygon(element);
        let detailPoly = mapfit.Polygon(element)
        poly.district = districts[idx];
        poly.setStyle({color: "#8a94ff", fillColor: "rgba(67, 83, 255, 0.1)"})
        poly.on('click',function(){
            if(lastPoly){
                lastPoly.setStyle({color: "#8a94ff", fillColor: "rgba(67, 83, 255, 0.1)"})
                lastPoly = this;
            }else{
                lastPoly = this;
            }
            selectedDistrict.innerHTML = `<b id="selection">${this.district}</b>`;
            this.setStyle({color:"black", fillColor:"rgba(74, 74, 74, 0.15)"})
            currentBounds = this.getLatLngBounds();
            openMarkers(this.district,detailPoly);
        })
        map.addPolygon(poly);
    })

})

function openMarkers(district,poly){
    console.log(district)
    listings.innerHTML = '';
    if (buildingArr.length > 0 ) {
        for( element of  buildingArr){
            map.removeLayer(element);
        }
        buildingArr = []
    }

    if (districtMarkers.length > 0){
        for (marker of districtMarkers){
            map.removeLayer(marker)
        }
        districtMarkers = []
    }

   
   if (placesToLive[district]){
        // if(!listOpen){
        //     styleBtn.click()
        //     listOpen = true;
        // }
       map.fitBounds(currentBounds);
        
        
        placesToLive[district].forEach(function(element){
            let marker = mapfit.Marker();
            marker.address = element.location;
            marker.price = element.price;
            // let icon = L.icon({
            //     iconUrl: './images/pngs/black.png',
            //     iconSize: [70, 38],
            //     iconAnchor: [35, 35]
            // })
            // let iconClicked = L.icon({
            //     iconUrl: './images/pngs/blue.png',
            //     iconSize: [70, 38],
            //     iconAnchor: [35, 35]
            // })

            let markImg = document.createElement("img") 
            markImg.src =  './images/pngs/black.png'
            markImg.addEventListener("click", function(){
                this.src = "./images/pngs/blue.png"
            })

            let price = element.price
            let icon = L.divIcon({className:"divity", iconUrl: './images/pngs/black.png', html: '<img class="markerImg" src="./images/pngs/black.png" />' + `<span>${marker.price}</span>`})
            let iconClicked = L.divIcon({className:"divity", iconUrl: './images/pngs/blue.png', html: '<img src="./images/pngs/blue.png"/>' + `<span>${marker.price}</span>` + `<div id="div-list"><img height = 67 width= 67 src="./images/pngs/apt.jpg"/><div><span>${element.location}</span><span>${district}, Manhattan</span></span>1BD <d>|</d> 1BA <d>|</d> 700SF</span></div></div>`})
            marker.setIcon(icon);
            
        
            
            districtMarkers.push(marker)
            let listItem = document.createElement('li');
            let listImage = document.createElement('img');
            let listHeader = document.createElement('h3');
            let neighborhood = document.createElement('span');
            let rooms = document.createElement('span');
            let clicked = document.createElement('div');
            let priceTag = document.createElement('div');
            let listPrice = document.createElement('p');
            listHeader.innerText = element.location
            neighborhood.innerHTML = "Chelsea, Manhattan"
            rooms.innerHTML = "1 BD <d>|</d> 1BA <d>|</d> 700 SF "
            listImage.src = "./images/pngs/apt.jpg"
            listImage.style.width = "100%";
            listImage.style.height = "64%";
            priceTag.classList.add("list-price");
            listPrice.innerHTML = element.price
            priceTag.appendChild(listPrice);

            listItem.addEventListener("click", function(e){
                this.scrollIntoView();
                if(lastListItem.length > 0){
                    lastListItem[0].childNodes[0].classList.remove('clickable');
                    lastListItem = [];
                }

                if(detailBuildingArr.length > 0){
                    detailBuildingArr.forEach(function(element){
                        detailMap.removeLayer(element)
                    })
                }

                if(detailMarkerArr.length > 0){
                    detailMarkerArr.forEach(function(element){
                        detailMap.removeLayer(element);
                    })
                }

                if(detailPolyArr.length > 0 ){
                    detailPolyArr.forEach(function(element){
                        detailMap.removeLayer(element);
                    })
                }

                detailPolyArr = [];
                detailBuildingArr = [];
                detailMarkerArr = [];
                marker.fire("click")
                clicked.classList.add("clickable");
                lastListItem.push(this)
                detailArea.innerHTML = district + ' , Manhattan, NY, 10011'
                listingLocation.innerHTML = element.location
                detailLocation.innerHTML = element.location
                detailPrice.innerHTML = element.price;
                let detailMarker = mapfit.Marker();
                detailMarker.address = element.location
                detailMarkerArr.push(detailMarker);
                detailMarker.on("add",function(){
                    if (detailMarker.buildingPolygon){
                        detailBuildingArr.push(detailMarker.buildingPolygon)
                    }
                })
                poly.setStyle({color: "black", fillColor:"rgba(74, 74, 74, 0.15)"})
                app.style.display = "none";
                document.getElementById("second-bar").style.display = "none";
                detailPage.style.display = "block";
                detailPolyArr.push(poly);
                let position = mapfit.LatLng([40.714997, -73.985367])
                detailMap.invalidateSize();
                detailMap.setCenter(position);
                detailMap.addPolygon(poly)
                detailMap.addMarker(detailMarker);
                detailMarker.on("add",function(){
                    detailMap.panTo(detailMarker._latlng, 16);
                })
                

            })
            listItem.appendChild(clicked);
            listItem.appendChild(priceTag);
            listItem.appendChild(listImage);
            listItem.appendChild(listHeader);
            listItem.appendChild(neighborhood);
            listItem.appendChild(rooms);
            listings.appendChild(listItem);
            marker.on("add click" , function(e){
                switch (e.type){
                    case "add":
                        if (marker.buildingPolygon){
                        buildingArr.push(marker.buildingPolygon)
                        marker.buildingPolygon.setStyle({color:"black", fillColor:"rgba(74, 74, 74, 0.15)"})
                        }
                        break;
                    case "click":
                        marker.setIcon(iconClicked) 
                        if(lastMarker && lastMarker != marker){
                            let icon = L.divIcon({className:"divity", iconUrl: './images/pngs/black.png', html: '<img class="markerImg" src="./images/pngs/black.png" />' + `<span>${lastMarker.price}</span>`})
                            lastMarker.setIcon(icon)
                            lastMarker = marker
                        }else{
                            lastMarker = marker
                        }
                        if (marker.buildingPolygon){
                            
                            if(lastBuilding){
                                lastBuilding.setStyle({color:"black", fillColor:"rgba(74, 74, 74, 0.15)"})
                                lastBuilding = marker.buildingPolygon
                            }else{
                                lastBuilding = marker.buildingPolygon
                            }
                            marker.buildingPolygon.setStyle({color: "#8a94ff", fillColor: "rgba(67, 83, 255, 0.1)"})
                        }
                        if(lastListItem.length > 0){
                            lastListItem[0].childNodes[0].classList.remove('clickable');
                            lastListItem=[];
                        }


                        map.flyTo(marker._latlng, 16);
                        clicked.classList.add("clickable");
                        listItem.scrollIntoView();
                        lastListItem.push(listItem)

                        document.getElementById("div-list").addEventListener("click",function(){
                            listItem.click();
                        })
                        break;
                }
            })

            
            map.addMarker(marker);
        })
    }
}