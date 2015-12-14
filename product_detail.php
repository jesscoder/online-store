<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html"/>
		<meta charset="UTF-8" />
		
		<title>Product Information</title>
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
		<h2 class="list">Product Detail View</h2>
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
		$reviews   = $myrow['reviews'];
		$rating 	= round( $myrow['rating']);
		
		
		echo "<div class='item_long'>
				<img src='$image_lg' />
				<h3><span>Name:</span> $name</h3>
				<h3><span>Price:</span> \$$price</h3>
				<h3><span>Description:</span> $desc_long</h3>
				<h3><span>Reviews:</span> $reviews | <span>Rating:</span> $rating</h3>
			</div>\n";
	?>
	
	<h2 class="list">Add a review</h2>
	
	<form action="add_review.php" method="post" class="form_review">
		<div class="add_review">
			<p class="r"><label>Name:</label>
				<input type="text" class="type" name="name" />
			</p>
			
			<p class="r"><label>Review:</label>	
				  <textarea class="text" name="review"></textarea>
			</p>
			
			<input type="hidden" name="cat_id" value="<?php echo $id; ?>" />
			
			<p class="r"><label>Rating</label>
				<select name="rating">
					<option value="0"> </option>
					<option value="1">*</option>
					<option value="2">**</option>
					<option value="3">***</option>
					<option value="4">****</option>
					<option value="5">*****</option>
				</select>
			</p>
			
			<input type="submit" name="submit" />
		</div>
	</form>
	<h2 class="list">Reviews</h2>
	<div id='review'>
		<?php
			$sql = "SELECT * FROM review WHERE cat_id ='$id'";
					 
			$result = mysql_query( $sql );
			while ( $myrow = mysql_fetch_array( $result ) ) {
				$name	 = $myrow['name'];
				$date	 = date( "M d Y", strtotime( $myrow['date'] ) );
				$rating  = $myrow['rating'];
				$reviews = $myrow['reviews'];
					
					
			echo "<div class='review_item'>
			<p class='rev'><span>Name:</span> $name </p>
			<p class='rev'><span>Date:</span> $date </p>
			<p class='rev'><span>Rating:</span> $rating </p>
			<p class='rev'><span>Reviews:</span> $reviews </p>
			<hr />
			</div>\n";
			
			
			}
		?>
	</div>
	</div>

</div><!-- container catalog -->

</body>
</html>

