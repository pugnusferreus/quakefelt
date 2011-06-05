/**
 * Maps - functions for loading and manipulating Google Maps API.
 *
 * Dependencies:
 * - Google Maps Javascript API V3: http://code.google.com/apis/maps/documentation/javascript/
 *
 */
Maps = (function($, window) {
	
	/** google maps object */
	var map,

	/** Array of markers */
		markers = [],

	/** Marker events */
		markerEvents = [],	

	/** Default Latitude, AU */	
		defaultLat = -25.274398,

	/** Default Longitude, AU */
		defaultLong = 133.775136,

	/** Default Map Zoom level */
		defaultZoom = 3,

	/** Default map options */
		defaultMapOpts = {
		  zoom: 3,
		  center: new google.maps.LatLng(defaultLat, defaultLong),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};

	/**
	 * @return mapOpts Object containing map options.
	 */
	function _getmapOpts(lat, lng, zoom) {

		lat = lat || defaultLat;
		lng = lng | defaultLong;

		var opts = {
			zoom: zoom,
			center: new google.maps.LatLng(lat, lng)
		};

		mapOpts = $.extend({}, defaultMapOpts, opts);
		return mapOpts;
	}

	/**
	 * @return marker Marker object
	 */
	function _getMarker(lat, lng, title) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lng),
			title: title || '',
			animation: google.maps.Animation.DROP
		});
		return marker;
	}
	

	/**
	 * Public API
	 */
	return {

		getMap: function maps_getMap() {
			return map;
		},	
		
		/**
		 * Load a static map into the specified element id.
		 *
		 * @param id element id of map container div
		 * @param lat Latitude for center point
		 * @param long Longitude for center point
		 * @param zoom integer Zoom level 
		 */
		loadMap : function maps_load(id, lat, lng, zoom) {
			Maps.clearMarkers();		

			var canvas = $('#' + id),
				opts = _getmapOpts(lat, lng, zoom);
			map = new google.maps.Map(canvas[0], opts);
		},

		/**
		 * Set the center point of the current map.
		 *
		 * @param lat Latitude for center point
		 * @param long Longitude for center point
		 */
		setCenter: function maps_setCenter(lat, lng) {
			if (map !== undefined) {
				map.setCenter(new google.maps.LatLng(lat, lng));
			}
		},

		/**
		 * Set the zoom value of the current map.
		 *
		 * @param value New zoom value
		 */
		zoom: function maps_zoom(value) {
			if (map !== undefined) {
				map.setZoom(value);
			}	
		},

		/**
		 * Add a marker to the current map.
		 *
		 * @param lat Latitude of the marker
		 * @param long Longitude of the marker
		 * @param title String title for the marker, can be empty
		 */
		addMarker : function maps_addmarker(lat, lng, title) {
			var marker = _getMarker(lat, lng, title);
			// To add the marker to the map, call setMap();
			if (map == undefined) {
				return;
			}

			// add to array
			markers.push(marker);

			// add a listener for a marker click
			google.maps.event.addListener(marker, 'click', function() {
				if (markerEventHandler !== undefined) {
		    		markerEventHandler(marker);
		    	}
		  	});

			marker.setMap(map);
		},

		/**
		 * Clear the markers array from the current map.
		 */
		clearMarkers: function maps_clearMarkers() {
			if (markers) {
				for (i in markers) {
			    	markers[i].setMap(null);
			    }
			}	
		},

		/**
		 * Set the event handler function for a click event on a marker.
		 */
		setMarkerEventHandler: function maps_addMarkerEventHandler(callback) {
			markerEventHandler = callback;
		}
		
	};
	
})(jQuery, this);

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
		
		var MMIHash = {
			"motion" : {
				"NOT_FELT": 0,
				"WEAK": 1,
				"MILD": 2,
				"MODERATE": 3,
				"STRONG": 4,
				"VIOLENT": 5
			},
			"reaction": {
				"NONE": 0,
				"LITTLE": 1,
				"EXCITEMENT": 2,
				"SOMEWHAT_FRIGHTENED": 3,
				"VERY_FRIGHTENED": 4,
				"EXTREMELY_FRIGHTENED": 5
			},
			"stand": {
				"NO": 0,
				"YES": 1
			},
			"shelf": {
				"NO": 0,
			    "RATTLED_SLIGHTLY": 0,
		        "RATTLED_LOUDLY": 0,
		        "FEW_TOPPLED": 1,
		        "MANY_FELL": 2,
		        "MOST_FELL": 3
			},
			"pictures": {
				"NO": 0,
				"NONE_FELL": 1,
				"SOME_FELL": 1
		  	},
			"furniture": {
				"NO": 0,
				"YES": 1
			},
			"damage": {
				"NONE": 0,
			    "HAIRLINE_CRACKS": 0.5,
			    "SOME_LARGE_WALL_CRACKS": 0.5,
			    "MANY_LARGE_WALL_CRACKS": 0.75,
			    "TILES_FELL": 1,
			    "CHIMNY_CRACKS": 1,
			    "CRACKED_WINDOW": 2,
			    "BROKEN_WINDOWS": 2,
			    "MASONRY_FELL": 2,
			    "OLD_CHIMNEY_FELL": 2,
			    "NEW_CHIMNEY_FELL": 3,
			    "WALL_COLLAPSED": 3,
			    "ADDITION_SEPERATED": 3,
			    "BUILDING_MOVED": 3
			}
		}
		
		/* Work out MMI using my mighty math power */
		var damages = $.grep(report.Damages,function(el,index) {
			if(index > 1) {
				return MMIHash.damage[el.damage] > MMIHash.damage[report.Damages[index-1].damage];
			}
		});
		
		var calc = (5 * report.felt) + MMIHash.motion[report.motion] + MMIHash.reaction[report.reaction] + (2 * MMIHash.stand[report.stand]) + (5 * MMIHash.shelf[report.shelf]) + (2 * MMIHash.pictures[report.picture]) + (3 * MMIHash.furniture[report.furniture]) + (5 * damages);
		
		var intensity;
		if(calc < 6.53 && report.felt === "0") {
			intensity = 1
		} else if(calc < 6.53 && report.felt === "1") {
			intensity = 2 
		} else {
			intensity = (3.4 * Math.log(calc)) - 4.38;
		}
		
		
		$("#quake-report").html([
			"<h2>"+report.reporter_name+"</h2>",
			"<p class=mmi"+intensity+">"+intensity+"</p>",
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