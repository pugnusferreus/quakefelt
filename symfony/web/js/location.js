var QS = QS || {};

(function( win, doc ) {
	
	var location = $("#getLocation"),
		list = $("#recent-quakes"),
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
				point1 = new LatLon(lat, lng), point2,
				noquake = true, distance, quakeDate, dateNow = Date.now(),
				dateDiff, hourMS = 3600000;

			
			// Build list of event sbased on RSS feed data, converted to JSON through YQL
			//$.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20rss%20where%20url%3D'http%3A%2F%2Fwww.ga.gov.au%2Fearthquakes%2Fall_recent.rss'&format=json&callback=?",function(data) {
			$.getJSON("quakes.json",function(data) {
				// Clear list
				list.html("");
				
				$.each(data,function(index,key) {
					quakeDate = new Date(key.time_of_quake.replace(/\-/g,"/")).getTime();
					dateDiff = Math.floor(Math.abs(quakeDate - dateNow)/hourMS);
					point2 = new LatLon(key.latitude, key.longitude);
					distance = point1.distanceTo(point2);

					// Find any quakes within 400km of your location
					if(distance <= distanceThreshhold) {
						noquake = false;
						
						list.append(["<li><a href='map.html?qid="+key.id+"' rel='external'>",
							"<div class='intensity'>"+key.magnitude+"</div>",
							"<h3>"+key.description+"</h3>",
							"<p>"+distance+"km away, "+dateDiff+" hrs ago<br />"+key.report_count+" Existing reports</p>",
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
	
	function queryString(param){
	
		var req = win.location, qs = req.search;
			
		qs = qs.replace(/^\?/,"");
		
		var parameters = qs.split("&"),
			values, len = parameters.length, obj = {};
		
		while(len--) {
			values = parameters[len].split("=");
			obj[values[0]] = (values[1]) ? values[1] : values[0];
		}
		
		return obj[param];
	}
	
	window["QS"] = {
		queryString: queryString,
		getLocation: getLocation
	}
	
	location.bind("click", getLocation);

})( this, this.document );