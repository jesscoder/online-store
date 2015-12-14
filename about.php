<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html"/>
		<meta charset="UTF-8" />
		
		<title>About Typographix</title>
		<link href="css/reset.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<link href='https://fonts.googleapis.com/css?family=Great+Vibes|Lato:400,100,300|Oswald|Lobster|Kaushan+Script' rel='stylesheet' type='text/css'>
		
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		 <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		 <script type="text/javascript">
			 
			 var map;
			 var infoWindow;
			 
			 function loadMap() {
				 
				 map = new google.maps.Map(document.getElementById(("map"), {
					 center: new google.maps.LatLng(40, -100),
					 zoom: 4,
					 myTypeId: 'roadmap',
					 mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
				 });
				 
				 infoWindow = new google.maps.InfoWindow();
				 
				 setLocations();
				 
			 }
			 
			 function setLocations() {
				 jQuery.ajax({
					 url: "google_maps/location.php",
					 dataType: 'json'
				 }).done( function(data, textStatus, jqXHR ) {
					 
					 var bound = new google.maps.LatLngBounds();
					 for( var i = 0; i < data.locations.length; i++ )
					 {
						 var markerInfo = data.locations[i];
						 var latlng = new google.maps.LatLng(
							 parseFloat(markerInfo.lat),
							 parseFloat(markerInfo.lng));
							 
							 createMarker(lanlng, markerInfo.address);
							 bounds.extend(latlng);
						 }
						 
						 map.fitBounds(bounds);
					 
				 }).fail( function( jqXHR, testStatus, errorThrown ) {
					 jQuery('#wrap').html( "Sorry, we are having server problems. Please try again later." );
				 });
			 }
			 
			 function createMarker(latlng, address) {
				 var html = "<b>" + name + "</b> <br/>" + address;
				 var marker = new google.maps.Marker({
					 map: map,
					 position: latlng
				 });
				 google.maps.event.addListener(marker, 'click', function() {
					 infoWindow.setContent(html);
					 infoWindow.open(map, marker);
				 });
			 }
			 
			 </script>
		 
	</head>
<body onload='loadMap()'>
	
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      	<div class="navbar-header">
         <h3>Typographix</h3>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="show_catalog.php">Catalog</a></li>
            <li class="active"><a href="about.php">About Us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div id="wrap" class="container catalog">
	<h2 class="list">About Typographix</h2>
	<p class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum cursus elit, sed mattis mauris tempus pharetra. Fusce feugiat quam vitae blandit consequat. Nunc pretium lorem leo, in ornare lorem mollis nec. In facilisis facilisis justo. Curabitur ut consectetur magna, id convallis eros. Phasellus finibus orci a turpis iaculis, tempus accumsan eros vestibulum. Nullam nec leo quis risus gravida laoreet. Phasellus vel tellus et magna ornare aliquet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque molestie ac mauris non rhoncus. Nam et maximus metus. Maecenas ac lacus in nulla rutrum elementum vel sit amet turpis. Nam sit amet dignissim tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	
	
	<div id="fb-root"></div>

			<script>
				(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
					  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
<div class="like">Like Us on Facebook</div>
<div class="fb-like" data-href="https://www.jessicavr.com/" data-width="50" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="products">

	<div id="map"></div>
</div>

</body>
</html>
