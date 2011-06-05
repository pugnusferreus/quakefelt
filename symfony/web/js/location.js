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
				noquake = true, distance;

			
			// Build list of event sbased on RSS feed data, converted to JSON through YQL
			$.getJSON("quakes.json",function(data) {
				// Clear list
				list.html("");
				
				$.each(data,function(index,key) {
					point2 = new LatLon(key.latitude, key.longitude);
					distance = point1.distanceTo(point2);

					// Find any quakes within 400km of your location
					if(distance <= distanceThreshhold) {
						noquake = false;
						
						list.append(["<li><a href='quake/"+key.id+"/map?qid="+key.id+"' rel='external'>",
							"<div class='intensity'>"+key.magnitude+"</div>",
							"<h3>"+key.description+"</h3>",
							"<p>"+distance+"km away, "+QS.dateDiff(key.time_of_quake)+" hrs ago<br />"+key.report_count+" Existing reports</p>",
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
	
	// Return hours difference between now and quake date to the nearest whole number
	function dateDiff(date, overidenow) {
		var dateNow = overidenow || Date.now(),
			hourMS = 3600000,
			quakeDate = new Date(date.replace(/\-/g,"/")).getTime();
			
		return Math.floor(Math.abs(quakeDate - dateNow)/hourMS);
	}
	
	window["QS"] = {
		queryString: queryString,
		getLocation: getLocation,
		dateDiff: dateDiff
	}
	
	location.bind("click", getLocation);

})( this, this.document );