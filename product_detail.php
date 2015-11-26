<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Online Store</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      	<div class="navbar-header">
         <h3>Typographix</h3>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="show_catalog.php">Catalog</a></li>
            <li><a href="about.php">About Us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container catalog">
	<div class="wrap">
<?php
	require( "dbconnect.php" );
	$id  = $_GET['cat_id'];
	$sql = "SELECT * FROM productTable WHERE id='$id'";
	$result = mysql_query( $sql );
	$myrow  = mysql_fetch_array( $result );
	$image_lg  = $myrow['image_lg'];
	$name      = $myrow['name'];
	$price     = $myrow['price'];
	$desc_long = $myrow['desc_long'];
	
	echo "<div class='item'>
			<img src='images/$image_sm' />
			<p>Name:<a href='product_detail.php?cat_id=$id'>$name</a> Price:\$$price</p>
			<p>$desc_long</p>
		</div>\n";

?>

	</div>
</div>
</body>
</html>

