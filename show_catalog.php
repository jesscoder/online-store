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
	<div id="wrap">

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
				$reviews	= $myrow['review'];
				$rating 	= round( $myrow['rating'], 2);
				
				echo "<div class='item'>
			<img src='$image_sm' />
				<p class='name'><a href='product_detail.php?cat_id=$id'>$name </a></p>
				<p class='price_sm'>\$$price</p>
				<p class='short'>$desc_short</p>
				<p class='review'>Reviews:$reviews Rating: $rating</p>
			</div>\n";
			}
		?>

	</div>
</div>


</body>
</html>
Things that don't work:

Long description image.
Name, price, and description on long description page.
Reviews/Rating results on catalog page and long description page.
You can add a review on the long description's page, it says it's been added, but 1.) "Thanks for reviewing (should show product name)." doesn't show. 2.) No review is added to the database. 
I've gone through this a few times, and also copied the module's example exactly, then did it over again, I still can't figure out why these things won't show. My brain is starting to fizzle. A second set of eyes can probably point out mistakes I just can't see right now. 