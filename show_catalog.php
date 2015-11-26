<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Online Store</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		 <script src="js/script.js"></script>
	</head>
<body>
	<div id='wrap'>
		<div id='main'>
			<p>Catalog list</p>
			
<?php
	require( "dbconnect.php" );
	$sql = "SELECT * FROM productTable";
	$results = mysql_query( $sql );
	while ( $myrow = mysql_fetch_array( $results ) ) {
	
		$image_sm   = $myrow['image_sm'];
		$id         = $myrow['id'];
		$name       = $myrow['name'];
		$price      = $myrow['price'];
		$desc_short = $myrow['desc_short'];
		
		echo "<div class='item'>
	<img src='images/$image_sm' />
	<p>Name:<a href='product_detail.php?cat_id=$id'>$name</a> Price:\$$price</p>
	<p>$desc_short</p>
	<p>Reviews:12 rating:5.0</p>
</div>\n";
	}
?>
		</div>
		<div id='nav_bar'>
			<ul>
				<li><a href='index.php'>Home</a></li>
				<li><a href='show_catalog.php'>Catalog</a></li>
				<li><a href='about.php'>About Us</a></li>
			</ul>
		</div>
	</div>
</body>
</html>

</html>

