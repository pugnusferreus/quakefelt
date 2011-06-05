<!doctype html>
<!-- Conditional comment for mobile ie7 http://blogs.msdn.com/b/iemobile/ -->
<!-- Appcache Facts http://appcachefacts.info/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" manifest="default.appcache?v=1"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" manifest="default.appcache?v=1"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>

  <!-- Mobile viewport optimization http://goo.gl/b9SaQ -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Home screen icon  Mathias Bynens http://goo.gl/6nVq0 -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="img/l/apple-touch-icon.png">

  <!--iOS web app, deletable if not needed -->
  <!--<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="apple-touch-startup-image" href="img/l/splash.png">-->

  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">

  <?php include_stylesheets() ?>

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="/js/libs/modernizr-custom.js"></script>
</head>

<body>

  <?php echo $sf_content ?>

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='/js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>

   <script>
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
					point1 = new LatLon(lat, lng);


				// Build list of event sbased on RSS feed data, converted to JSON through YQL
				$.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20rss%20where%20url%3D'http%3A%2F%2Fwww.ga.gov.au%2Fearthquakes%2Fall_recent.rss'&format=json&callback=?",function(data) {
					$.each(data.query.results.item,function(index,key) {
						point = key.point.split(" ");
						point2 = new LatLon(point[0], point[1]);

						console.log(key.title + ": " + point1.distanceTo(point2) + "km");

						// Find any quakes within 400km of your location
						if(point1.distanceTo(point2) <= distanceThreshhold) {
							list.append(["<li><a href='#'>",
								"<h3>"+key.title+"</h3>",
								"<p>"+key.description+"</p>",
							"</a></li>"].join(''));
						} else {
							// No quakes within a 40km distance
						}
					});

					// Hide loader
					$.mobile.pageLoading(true);

					$.mobile.changePage("#bar", "slide");
				});
			}
			function error(err) {
				var postcode = prompt("Something went wrong, enter your postcode:");

				alert("thanks for your postcode" + postcode);
			}
		}

		$(location).bind("click", getLocation);

	})( this, this.document );
   </script>

  <?php include_javascripts() ?>

  <?php if($sf_context->getConfiguration()->getEnvironment() != 'prod'): ?>

  <!-- Debugger - remove for production -->
  <!-- <script src="https://getfirebug.com/firebug-lite.js"></script> -->

  <?php else: ?>

  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script> -->

  <?php endif; ?>

</body>
</html>
