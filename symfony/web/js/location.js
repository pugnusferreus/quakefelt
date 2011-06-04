(function( win, doc ) {
	
	var location = doc.getElementById("getLocation"),
		body = doc.body,
		distanceThreshhold = 400;
	
	/* Geolocation */
	function getLocation() {
		
		// Data is loading
		$.mobile.pageLoading();
		
		if("geolocation" in navigator) {
			navigator.geolocation.getCurrentPosition(success, error); // Request live position
		} else {
			// Maybe do something if they don't have GPS. Fallback to postcode?
		}
		
		function success(pos) {
			var coords = pos.coords,
				lat = coords.latitude,
				lng = coords.longitude,
				list = $("#recent-quakes"),
				point, point2,
				point1 = new LatLon(lat, lng),
				noquake = true;

			
			// Build list of event sbased on RSS feed data, converted to JSON through YQL
			$.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20rss%20where%20url%3D'http%3A%2F%2Fwww.ga.gov.au%2Fearthquakes%2Fall_recent.rss'&format=json&callback=?",function(data) {
			//$.getJSON("http://quakefelt.local/quakes.json",function(data) {
				// Clear list
				list.html("");
				
				$.each(data.query.results.item,function(index,key) {
					point = key.point.split(" ");
					point2 = new LatLon(point[0], point[1]);
					
					// Find any quakes within 400km of your location
					if(point1.distanceTo(point2) <= distanceThreshhold) {
						noquake = false;
						
						list.append(["<li><a href='form.html'>",
							"<h3>"+key.title+"</h3>",
							"<p>"+key.description+"</p>",
						"</a></li>"].join(''));
					}
				});
				
				if(noquake) {
					// No quakes within a 400km distance
					list.append(["<li>",
						"<h3>No quakes have been recorded in your area</h3>",
					"</li>"].join(''));
				}
				
				// Hide loader
				$.mobile.pageLoading(true);
				
				$.mobile.changePage("#bar", "slide");
			});
		}
		function error(err) {
			
		}
	}
	
	$(location).bind("click", getLocation);

})( this, this.document );