
  <div  data-role="page" id="foo"> 
	<div  data-role="header">
		<h1>QuakeFelt</h1>
	</div> 
	<div data-role="content">
		<img id="mapcontainer" src="" width="100%" height="200" />
		<a href="#bar" data-role="button" data-transition="slide">Report the quake</a> 
	</div> 
   </div>
   
   <!-- Start of second page -->
   <div data-role="page" id="bar">

	<div data-role="header">
		<h1>Bar</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<form>
			<div data-role="fieldcontain">
				<label>Question 1</label>
				<input type="text" />
			</div>
			<div data-role="fieldcontain">
				<label for="slider">Quake intensity:</label>
			 	<input type="range" name="slider" id="slider" value="0" min="1" max="10"  />
			</div>
		</form>
	</div><!-- /content -->
   </div><!-- /page -->
