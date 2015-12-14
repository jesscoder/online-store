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
			<h1>Add a review</h1>
			
			<?php 
			//connect to db
				require( "dbconnect.php" );
				
				// Connect form data
				$name   = $_POST['name'];
				$review = $_POST['review'];
				$cat_id = $_POST['cat_id'];
				$rating = $_POST['rating'];
				
			//Set up an SQL query that adds a new review to review table
				
				
				$sql = "INSERT INTO review ( id, name, review, rating, date ) 
				VALUES( '', '$name', '$review', '$rating', NOW() )";
				
				$sql = "SELECT * FROM productTable WHERE id = '$cat_id'";
				$result = mysql_query( $sql );
				$myrow = mysql_fetch_array( $result );
				$product_name = $myrow['name'];
				echo "Thanks for reviewing $product_name";
				
				
				if ( $result ) {
					echo "<p>The review table has been updated.</p>";
					echo "<p class='add'><a href='product_detail.php?cat_id='$cat_id'>Add another</a></p>";
					echo "<p class='back'><a href='product_detail.php?cat_id='$cat_id'>Back to product</a></p>";
				} else {
					echo "<p>There has been an error updating the review table</p>";
					echo "<p>Error:" .mysql_error() . "</p>";
					echo "<p><a href='product_detail.php?cat_id=$cat_id'>Back.</a></p>";
				
				}
				
			//Set up an SQL query to get all reviews for product
				
				$sql = "SELECT * FROM productTable WHERE cat_id = '$cat_id'";
				
				$result = mysql_query( $sql );
				
			//Count and average all ratings taken from reviews of a product
				
				$count = 0;
				$total_rating = 0;
				
				while ( $myrow = mysql_fetch_array($result) ) {
					$count ++;
					$total_rating +- $myrow['rating'];
				}
				
				$average_rating = $total_rating / $count;
				
			//Update the catalog table with new review count & average
			
				$sql = "UPDATE review SET rating = '$average_rating', reviews='$count' WHERE id='$cat_id' LIMIT 1";
				mysql_query( $sql );
		
			?>
			
		</div>
	</div> <!-- /container -->
	</body>
</html>