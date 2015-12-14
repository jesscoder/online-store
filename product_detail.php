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
		<h2>Product Detail View</h2>
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
		$review	   = $myrow['review'];
		$rating    = round( $myrow['rating']. 2);
		
		
		echo "<div class='item_long'>
				<img src='images/$image_lg' />
				<h3 class='long_name'>Name: $name </h5>
				<p class='price'>Price: \$$price</p>
				<p class='description'>Description: $desc_long</p>
				<p class='rating'>Reviews: $review | Rating: $rating</p>
			</div>\n";
	?>
	
	<form action="add_review.php" method="post" class="form_review">
		<h3 class="review_h3">Add a review</h3>
			<p class="r"><label>Name:</label>
				<input type="text" class="type" name="name" />
			</p>
			
			<p class="r"><label>Review:</label>	
				  <textarea name="review"></textarea>
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
	</form>
	
	<div id='review'>
		<?php
			$sql = "SELECT * FROM productTable WHERE cat_id ='$id' ";
					 
			$result = mysql_query( $sql );
			while ( $myrow = mysql_fetch_array( $result ) ) {
			$name	= $myrow['name'];
			$date	= date( "M d Y", strtotime( $myrow['date'] ) );
			$rating = $myrow['rating'];
			$review = $myrow['review'];
					
					
			echo "<div class='review_item'>
				<h4>Name:$name Date:$date Rating:<img src='stars_$rating.jpg /></h4>
				<p>$review</p>
			</div>\n";
			
			
			}
		?>
	</div>
	</div>

</div><!-- container catalog -->

</body>
</html>

