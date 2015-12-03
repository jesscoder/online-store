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
		$id  = $_GET['cat_id'];
		$sql = "SELECT * FROM productTable WHERE id='$id'";
		$result = mysql_query( $sql );
		$myrow  = mysql_fetch_array( $result );
		$image_lg  = $myrow['image_lg'];
		$name      = $myrow['name'];
		$price     = $myrow['price'];
		$desc_long = $myrow['desc_long'];
		
		echo "<div class='item'>
				<img src='$image_sm' />
				<p>Name:<a href='product_detail.php?cat_id=$id'>$name</a> Price: \$$price</p>
				<p>$desc_long</p>
			</div>\n";

	?>
	<form action="add_review.php" method="post">
		<input type="text" name="name" />
		  <textarea name="review"></textarea>
			<input type="hidden" name="cat_id" value="<?php echo $id; ?>" />
			  <select name="rating">
				<option value="0"> </option>
				<option value="1">*</option>
				<option value="2">**</option>
				<option value="3">***</option>
				<option value="4">****</option>
				<option value="5">*****</option>
			  </select>
			<input type="submit" name="submit" />
	</form>
	<div class='sixteen column' id='review'>
		<?php
			$sql = "SELECT * FROM review WHERE cat_id ='$id' ";
					 
			$result = mysql_query( $sql );
			while ( $myrow = mysql_fetch_array( $result ) ) {
			$name	= $myrow['name'];
			$date	= date( "M d Y", strtotime( $myrow['date'] ) );
			$rating = $myrow['rating'];
			$review = $myrow['review'];
					
					
			echo "<div class='review_item sixteen columns'>
				<h4>Name:$name Date:$date Rating:<img src='stars_$rating.jpg /></h4>
				<p>$review</p>
			</div>\n";
			}
		?>
	</div><!-- wrap -->
</div><!-- container catalog -->

</body>
</html>

