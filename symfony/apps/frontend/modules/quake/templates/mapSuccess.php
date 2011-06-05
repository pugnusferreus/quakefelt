  <div  data-role="page" id="mapage"> 
	<div  data-role="header">
		<h1>QuakeFelt</h1>
	</div>
<div class="brownBar">
		<div class="richter">4.4</div>
		<div class="event">
			<span class="locn">Dandenong</span>
			<span class="detail">1.4 km away, 1:33 h ago</span>
		</div>
		<a href="#" class="home-button">home</a>
	</div> 
	<div data-role="content">
<div id="button-row">
			<div id="toggleView">
				<a href="" class="c-button grey ui-corner-all">Feed</a>
				<a href="" class="c-button grey ui-corner-all hidden">Map</a>
			</div>
			<div id="startForm">
				<a href="" class="c-button ui-corner-all">Report a Quake</a>
			</div>
		</div>
		<div id="mapcontainer" style="width:320px;height:300px"></div>
		<div id="markerdata" style="width:100%;height:100%"></div>
		<div id="markerlegend" style="position:absolute;left:40px;top:300px;width:295px;height:30px;background-image: url('/images/map/marker_legend.png')"></div>
	</div> 
  </div>
  
  <div  data-role="page" id="maplistpage"> 
	<div  data-role="header">
		<h1>QuakeFelt</h1>
	</div> 
	<div data-role="content">
		<div id="quake-report">
		
		</div>
	</div> 
  </div>