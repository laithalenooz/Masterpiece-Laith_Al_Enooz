/*
Author       : Dreamguys
Template Name: Doccure - Bootstrap Template
Version      : 1.3
*/

google.maps.visualRefresh = true;
var slider, infowindow = null;
var bounds = new google.maps.LatLngBounds();
var map, current = 0;
var locations = latLngClinics;

var icons = {
  'default':'assets/img/marker.png'
};

function show() {
    infowindow.close();
  if (!map.slide) {
    return;
  }
    var next, marker;
    if (locations.length == 0 ) {
       return
     } else if (locations.length == 1 ) {
       next = 0;
     }
    if (locations.length >1) {
      do {
        next = Math.floor (Math.random()*locations.length);
      } while (next == current)
    }
    current = next;
    marker = locations[next];
    setInfo(marker);
    infowindow.open(map, marker);
}

function initialize() {
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        zoom: 14,
		center: new google.maps.LatLng(31.963158, 35.930359),
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		
    };
  
     map = new google.maps.Map(document.getElementById('map'), mapOptions);
    map.slide = true;

    setMarkers(map, locations);
    infowindow = new google.maps.InfoWindow({
        content: "loading..."
    });
    google.maps.event.addListener(infowindow, 'closeclick',function(){
       infowindow.close();
    });
    slider = window.setTimeout(show, 3000);
}

function setInfo(marker) {
  var content = 
'<div class="profile-widget" style="width: 100%; display: inline-block;">'+
	'<div class="doc-img">'+
		'<a href="' + marker.profile_link + '" tabindex="0" target="_blank">'+
			'<img class="img-fluid" alt="' + marker.doc_name + '" src="' + marker.image + '">'+
		'</a>'+
	'</div>'+
	'<div class="pro-content">'+
		'<h3 class="title">'+
			'<a href="' + marker.profile_link + '" tabindex="0">' + marker.doc_name + '</a>'+
			'<i class="fas fa-check-circle verified"></i>'+
		'</h3>'+
		'<p class="speciality">' + marker.speciality + '</p>'+
		'<div class="rating">'+
			'<i class="fas fa-star filled"></i>'+
			'<i class="fas fa-star filled"></i>'+
			'<i class="fas fa-star filled"></i>'+
			'<i class="fas fa-star filled"></i>'+
			'<i class="fas fa-star"></i>'+
			'<span class="d-inline-block average-rating"> (' + marker.total_review + ')</span>'+
		'</div>'+
		'<ul class="available-info">'+
			'<li><i class="fas fa-map-marker-alt"></i> ' + marker.address + ' </li>'+
			'<li><i class="far fa-clock"></i> ' + marker.next_available + '</li>'+
			'<li><i class="far fa-money-bill-alt"></i> ' + marker.amount + '</li>'+
		'</ul>'+
	'</div>'+
'</div>';
  infowindow.setContent(content);
}

function setMarkers(map, markers) {
  for (var i = 0; i < markers.length; i++) {
    var item = markers[i];
    var latlng = new google.maps.LatLng(item.lat, item.lng);
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        doc_name: item.doc_name,
        address: item.address,
        speciality: item.speciality,
        next_available: item.next_available,
        amount: item.amount,
        profile_link: item.profile_link,
        total_review: item.total_review,
        animation: google.maps.Animation.DROP,
        icon: icons[item.icons],
        image: item.image
        });
        bounds.extend(marker.position);
        markers[i] = marker;
        google.maps.event.addListener(marker, "click", function () {
            setInfo(this);
            infowindow.open(map, this);
            window.clearTimeout(slider);
        });
    }
    map.fitBounds(bounds);
  google.maps.event.addListener(map, 'zoom_changed', function() {
    if (map.zoom > 16) map.slide = false;
  });
}

google.maps.event.addDomListener(window, 'load', initialize);