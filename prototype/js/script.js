/* QuakeFelt Code */

var QF = QF || {};

(function( win, doc ) {
	
	var container,
		body = doc.body;
	
	/* Geolocation */
	function getLocation() {
		
		if("geolocation" in navigator) {
			navigator.geolocation.getCurrentPosition(success, error); // Request live position
		} else {
			// Maybe do something if they don't have GPS. Fallback to postcode?
		}
		
		function success(pos) {
			var lat = pos.coords.latitude,
				lng = pos.coords.longitude,
				img = document.createElement("img");
				
			// Build static image based on user location and insert into main container
			img.src = "";
			container.appendChild(img);
				
			alert("lat: " + lat + " \nlng:" + lng); 
		}
		function error(err) {
			var postcode = prompt("Something went wrong, enter your postcode:");
			
			alert("thanks for your postcode" + postcode);
		}
	}
	
	win.onload = function() {
		//getLocation();
	}

})( this, this.document );

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