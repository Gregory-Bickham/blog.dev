<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="Gregory Charles Bickham II" content="">
    <!-- Bootstrap core CSS -->
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/weathermap.css" rel="stylesheet">

    <title>Weather Map</title>
</head>
<body>
	<h1 class="h1style">Weather Application</h1>

	<h1 id="city"></h1>
	<div id="forecast"></div>
    
    <div id="textField">
    	<button id="submitButton" for="submit">Submit</button>
        <input id="search" name="submit" type="text">

    	<!-- <textarea id="searchBar" placeholder="Enter address, city, or coordinates here..." cols="75" rows="2">
    	</textarea> -->
    </div>
    <div id="map-canvas"></div>

    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuqw5WeDMifaiM_EWP3lPRKEhmiHypMwI"></script>	
 <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
(function(){

	// Function to take in lat and long from Google Maps API and determine the forecast based on the Open Weather Map API
	function updateWeather(lat, long){
		var days = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
    	APPID: "ac218e4417f622d747772b1ede72af04",
    	lat: lat,
    	lon: long,
	    units: "imperial",
	    cnt: "7"
		});
		days.done(function(data){
	        $("#city").html(data.city.name);
	        $("#city-name").html(data.city.name);
	        var boxMaker = "";
	        boxMaker += "<div class=\"container\">";
	        console.log(data.list);	
	        data.list.forEach(function(element, index){
	        	 var date = new Date(element.dt*1000);
	            boxMaker += "<div class=\"box_size\">" + date.toDateString().substr(0,3) + "<br>" + "High/Low:" + " " + Math.round(element.temp.day) + "/" + Math.round(element.temp.night) + "&#8457" + "<br><img src=\"http://openweathermap.org/img/w/" + element.weather[0].icon + ".png\"><br>" + element.weather[0].main + "<br>" + "Humidity:" + " " + element.humidity + "%" + "<br>" + "Wind Speed:" + " " + element.speed + "mph" + "<br>" + "Pressure:" + " " + Math.round(element.pressure) +  "</div>";
	            
	        });
	        boxMaker += "</div>";
	        $("#forecast").empty();
	        $("#forecast").append(boxMaker);
	    }); 
	};
	var lat = 29.4284595;
	var long = -98.492433;
	
	//Calls the Weather function with a predetermined set of coordinates. 
	updateWeather(lat, long);
	
	// Sets the parameters for the Google Maps API. 
	var mapOptions = {
            zoom: 10,
            center: {
                lat:  29.4284595,
                lng: -98.492433
            }
        };    
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var geocoder = new google.maps.Geocoder();

    var codeUpAddress = { lat: 29.428459, lng: -98.492433 };
    var marker = new google.maps.Marker({position: codeUpAddress, map: map, draggable: true, animation: google.maps.Animation.DROP});
    var infowindow = new google.maps.InfoWindow({content: "San Antonio" + "<br>" + codeUpAddress.lat + "," + codeUpAddress.lng});
    infowindow.open(map, marker);
    
    //Event listener to record marker lat and long for processing through Weather function. 
    marker.addListener('dragend',function(event) {
        updateWeather(event.latLng.lat(), event.latLng.lng());
		infowindow.setContent("<span id=\"city-name\"></span>" + "<br>" + event.latLng.lat() + ', ' + event.latLng.lng())
		infowindow.open(map, marker);

    });

    //Event listener to record the info from Search Bar    
    $("#submitButton").click(function() {
    	console.log("submit button was clicked");
    	var search = $("#search").val();
    	console.log(search);
    	geocoder.geocode({"address": search}, function(results, status){
    		if (status === google.maps.GeocoderStatus.OK) {
      			map.setCenter(results[0].geometry.location);
      			var lat = results[0].geometry.location.lat();
      			var long = results[0].geometry.location.lng();
      			var marker = new google.maps.Marker({
        			map: map,
        			position: results[0].geometry.location
      			});
      			updateWeather(lat, long);
      			infowindow.open(map, marker);

    		} else {
      			alert('Geocode was not successful for the following reason: ' + status);
    		}
    	});
    	// get the address from the form input
    	// send that address to our geocoder
    	// use the coordinates to update weather information
    	// use the coorninates to recenter the map
    	// drops marker on address
	});
// 	function geocodeAddress(geocoder, resultsMap) {
//   		var address = document.getElementById('address').value;
//   		geocoder.geocode({'address': address}, function(results, status) {
//     	if (status === google.maps.GeocoderStatus.OK) {
//       	resultsMap.setCenter(results[0].geometry.location);
//       	var marker = new google.maps.Marker({
//         map: resultsMap,
//         position: results[0].geometry.location
//       });
//     } else {
//       alert('Geocode was not successful for the following reason: ' + status);
//     }
//   });
// }


    

})();
</script>
</body>
</html>