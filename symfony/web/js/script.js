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
		getLocation();
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
	var map;

	/** Default Latitude, AU */	
	var defaultLat = -25.274398;

	/** Default Longitude, AU */
	var defaultLong = 133.775136;

	/** Default Map Zoom level */
	var defaultZoom = 3;

	/** Default map options */
	var defaultMapOpts = {
	  zoom: 12,
	  center: new google.maps.LatLng(defaultLat, defaultLong),
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	/**
	 * @return mapOpts Object containing map options.
	 */
	function _getmapOpts(lat, long, zoom) {
		
		lat = lat || defaultLat;
		long = long | defaultLong;

		var opts = {
			zoom: zoom,
			center: new google.maps.LatLng(lat, long)
		}

		mapOpts = $.extend({}, defaultMapOpts, opts);
		return mapOpts;
	}

	/**
	 * @return marker Marker object
	 */
	function _getMarker(lat, long, title) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, long),
			title: title || ''
		});
		return marker;
	}
	

	/**
	 * Public API
	 */
	return {

		getMap: function() {
			return map;
		},	
		
		/**
		 * Load a static map into the specified element id.
		 *
		 * @param lat Latitude for center point
		 * @param long Longitude for center point
		 * @param zoom integer Zoom level 
		 */
		loadMap : function maps_load(id, lat, long, zoom) {
			var canvas = $(id);
			var opts = _getmapOpts(lat, long, zoom);
			map = new google.maps.Map(canvas, opts);
		},

		/**
		 * Set the center point of the current map.
		 
		 * @param lat Latitude for center point
		 * @param long Longitude for center point
		 */
		setCenter: function(lat, long) {
			if (map !== undefined) {
				map.setCenter(new google.maps.LatLng(lat, long));
			}
		},

		/**
		 * Add a marker to the current map.
		 *
		 * @param lat Latitude of the marker
		 * @param long Longitude of the marker
		 * @param title String title for the marker, can be empty
		 */
		addMarker : function maps_addmarker(lat, long, title) {
			var marker = _getMarker(lat, long, title);
			// To add the marker to the map, call setMap();
			marker.setMap(getMap());
		}
	};
	
})(jQuery, this);