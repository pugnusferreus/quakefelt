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
			//$.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20rss%20where%20url%3D'http%3A%2F%2Fwww.ga.gov.au%2Fearthquakes%2Fall_recent.rss'&format=json&callback=?",function(data) {
			$.getJSON("quakes.json",function(data) {
				// Clear list
				list.html("");
				
				$.each(data,function(index,key) {
					point2 = new LatLon(key.latitude, key.longitude);
					distance = point1.distanceTo(point2);

					// Find any quakes within 400km of your location
					if(distance <= distanceThreshhold) {
						noquake = false;
						
						list.append(["<li><a href='map2.html?qid="+key.id+"' rel='external'>",
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
	
	// Map points
	$(window).load(function() {
		
		// get quake data
		var qid = QS.queryString('qid'),
			hash = {};
		
		// load a map in using quake data
		Maps.loadMap("mapcontainer", -37.490, 142.425, 9);

		Maps.setMarkerEventHandler(function(marker){
			// load the data for this marker
			var report = hash[marker.title],
				days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

			
			//On Monday I felt/was woken by/slept through (asleep) a quake while inside/outside (physical situation). In Melbourne at 20 (distance to epicentre) km from the epicentre. The shaking was violent (strength) and I felt frightened (emotions). I hid under a table (action) during the 30 seconds (time) of shaking. Personal notes: This is a little story I can add to my report. Maxium of x characters would be good.
			$("#quake-report").html([
				"<h2>"+report.reporter_name+"</h2>",
				"<p>",
					"On ",
					days[new Date(report.created_at.replace(/\-/g,"/")).getDay()],
					" while " + report.situation.toLowerCase(),
					" and " +  report.distance_from_epicentre + "km from the epicentre. ",
					"The shaking was " + report.motion.toLowerCase() + " and I felt " + report.reaction.replace(/\_/g," ").toLowerCase() + ". ",
					"The shaking lasted " + report.duration + " seconds. ",
					"Personal notes: " + report.d_text, // report.story on real data
				"</p>"
			].join(''));
			
			$.mobile.changePage("#maplistpage", "slide");
		});

		// loop other reports and add markers
		$.getJSON("quake/"+qid+"/reports.json",function(data){
			$.each(data,function(index,key){
				hash[key.id] = key;	
				Maps.addMarker(key.latitude, key.longitude, ""+key.id);
			});
		});

	});

})( this, this.document );