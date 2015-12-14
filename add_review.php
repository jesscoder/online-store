<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html"/>
		<meta charset="UTF-8" />
		
		<title>Review</title>
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
			<h1 class="list">Reviewed</h1>
			
			<?php 
			//connect to db
				require( "dbconnect.php" );
				
				// Connect form data
				$name    = $_POST['name'];
				$reviews = $_POST['reviews'];
				$cat_id  = $_POST['cat_id'];
				$rating  = round ($rating);
				
			//Set up an SQL query that adds a new review to review table
				
				
				$sql = "INSERT INTO review ( id, cat_id, name, reviews, rating, date ) 
				VALUES( '', '$cat_id' '$name', '$reviews', '$rating', '$date', NOW() )";
				
				$result = mysql_query( $sql );
				
				$sql = "SELECT * FROM productTable WHERE id = '$cat_id'";
				$result = mysql_query( $sql );
				$myrow = mysql_fetch_array( $result );
				$product_name = $myrow['name'];
				echo "<p class='update1'>Thank you for reviewing $product_name </p>";
				
				
				if ( $result ) {
					echo "<p class='update'>The review table has been updated.</p>";
					echo "<p class='back'><a href='product_detail.php?cat_id=$cat_id'>Back to $product_name</a></p>";
				} else {
					echo "<p class='failed'>There has been an error updating the review table</p>";
					echo "<p>Error:" .mysql_error() . "</p>";
					echo "<p class='back'><a href='product_detail.php?cat_id=$cat_id'>Back to $product_name</a></p>";
				
				}
				
			//Set up an SQL query to get all reviews for product
				
				$sql = "SELECT * FROM review WHERE cat_id = '$cat_id'";
				
				$result = mysql_query( $sql );
				
			//Count and average all ratings taken from reviews of a product
				
				$count=0;
				$total_rating=0;
				
				while ( $myrow = mysql_fetch_array($result) ) {
					$count++;
					$total_rating += $myrow['rating'];
				}
				
				$average_rating = $total_rating/$count;
				
			//Update the catalog table with new review count & average
			
				$sql = "UPDATE productTable SET rating = '$average_rating', reviews='$count' WHERE id='$cat_id' LIMIT 1";
				mysql_query( $sql );
			?>
			
		</div>
	</div> <!-- /container -->
	</body>
</html>
