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

	/** Google Maps geocoder */
		geocoder,

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
		},

	/** MarkerIcon used for quake epicenter */
		quakeIcon = new google.maps.MarkerImage('img/map/marker_quake.png'),

	/** URL to load marker sheet from */
		markerSheetUrl = "img/map/marker_sheet.png",

	/** Size of marker sheet sprites */
		markerSheetSize = new google.maps.Size(32, 38),

	/** Map of MarkerIcon used for MMI values */
		intensityIcons = {	
			1: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(0,0)),
			2: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(32,0)),
			3: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(32,0)),
			4: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(64,0)),
			5: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(96,0)),
			6: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(128,0)),
			7: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(160,0)),
			8: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(192,0)),
			9: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(224,0)),
			10: new google.maps.MarkerImage(markerSheetUrl, markerSheetSize, new google.maps.Point(256,0)),
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
	function _getMarker(lat, lng, title, icon) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lng),
			title: title || '',
			animation: google.maps.Animation.DROP,
			icon: icon
		});
		return marker;
	}

	/**
	 * @return google.maps.Geocoder
	 */
	function _getGeocoder() {
		if (!geocoder) {
			geocoder = new google.maps.Geocoder;
		}
		return geocoder;
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
			Maps.setCenter(lat, lng);
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
		 * @param mmi MMI value the associated with the report marker
		 */
		addMarker : function maps_addmarker(lat, lng, title, mmi) {
			
			// get marker icon
			var icon = intensityIcons[Math.round(mmi)];
			var marker = _getMarker(lat, lng, title, icon);
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
		 * Add a marker for the quake epicenter. This marker is not clickable.
		 * The quake marker should be added before user markers.
		 */
		addQuakeMarker: function maps_addQuakeMarker(lat, lng, title) {
			var marker = _getMarker(lat, lng, title, quakeIcon);
			if (!map) {
				return;
			}
			
			marker.setAnimation(null); 	// do not animate quake marker
			marker.setZIndex(-999); 	// place behind all other markers
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
		},

		/**
		 * Geocode a postcode using the Google Maps API
		 * If successful, set the map center to the returned latlng location.
		 */
		geocode: function maps_geocode(postcode) {
			_getGeocoder().geocode( { 'address': postcode.toString(), region: 'au'}, function(results, status) {
		      if (status == google.maps.GeocoderStatus.OK) {
		      	
		      	var lat = results[0].geometry.location.lat(),
		      		lng = results[0].geometry.location.lng();

		      	if (!map) {
		      		Maps.loadMap("mapcontainer", lat, lng, 10);
		      	}

		        Maps.setCenter(lat, lng);
		        
		      } else {
		        console.log("Geocode was not successful for the following reason: " + status);
		      }
			});
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
	$.getJSON("/quake/"+qid+"/reports.json",function(data){
		$.each(data,function(index,key){
			hash[key.id] = key;	
			Maps.addMarker(key.latitude, key.longitude, ""+key.id);
		});
	});

});