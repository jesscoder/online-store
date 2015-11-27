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
			$sql = "SELECT * FROM productTable";
			$results = mysql_query( $sql );
			while ( $myrow = mysql_fetch_array( $results ) ) {
			
				$image_sm   = $myrow['image_sm'];
				$id         = $myrow['id'];
				$name       = $myrow['name'];
				$price      = $myrow['price'];
				$desc_short = $myrow['desc_short'];
				
				echo "<div class='item'>
			<img src='$image_sm' />
			<p class='name'>Name: <a href='product_detail.php?cat_id=$id'>$name </a> Price:\$$price</p>
			<p class='short'>$desc_short</p>
			<p class='review'>Reviews: 12 Rating: 5.0</p>
		</div>\n";
			}
		?>
	</div>
</div>


</body>
</html>
