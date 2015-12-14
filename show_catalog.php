<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html"/>
		<meta charset="UTF-8" />
		
		<title>Catalog</title>
		<link href="css/reset.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<link href='https://fonts.googleapis.com/css?family=Great+Vibes|Lato:400,100,300|Oswald|Lobster|Kaushan+Script' rel='stylesheet' type='text/css'>
		
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
	<div id="wrap">
		<h2 class="list">Catalog List</h2>
	<?php
			require( "dbconnect.php" );
			$sql = "SELECT * FROM productTable";
			$results = mysql_query( $sql );
			while ( $myrow = mysql_fetch_array( $results ) ) {
			
				$image_sm   = $myrow['image_sm'];
				$id         = $myrow['ID'];
				$name       = $myrow['name'];
				$price      = $myrow['price'];
				$desc_short = $myrow['desc_short'];
				$reviews	= $myrow['reviews'];
				$rating 	= round( $myrow['rating']);
				
				echo "<div class='item'>
			<img src='$image_sm' />
				<p class='name'><a href='product_detail.php?cat_id=$id'>$name </a></p>
				<p class='price_sm'>\$$price</p>
				<p class='short'>$desc_short</p>
				<p class='review'>Reviews: $reviews Rating: $rating</p>
			</div>\n";
			if( ($count % 2 ) == 2) {
						echo "<hr />";
					}

			}
		?>
</div>
	</div>
</div>


</body>
</html>
