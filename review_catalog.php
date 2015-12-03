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

<body>
	<div class="container">
		<div is="wrap">
			<h1>Review</h1>
	
				<?php
					require( "dbconnect.php" );
						$id = $_GET['cat_id'];
						$sql = "SELECT * FROM productTable WHERE id='$id'";
						$result = mysql_query( $sql );
						$myrow = mysql_fetch_array( $result );
						$name  = $myrow['name'];
						$price = $myrow['price'];
						$desc_short = $myrow['desc_short'];
						
					echo "<div class='item'>
						<p>Name:$name Price:$price</p>
						<p>$desc_short</p>
						</div>";
				?>
	
			<form action="add_review.php?<?php echo "cat_id=" . $_GET['cat_id']; ?>" method="post" >
			
				<p><label for="name">Name:</label><input name='name' /></p>
				<p><label for='rating'>Rating:</label><select name='rating'>
					<option value='0'> </option>
					<option value='1'>*</option>
					<option value='2'>**</option>
					<option value='3'>***</option>
					<option value='4'>****</option>
					<option value='5'>*****</option>
				</select></p>
				
				<p><label for="review">Review:</label></p>
					<textarea name='review'></textarea>
					<p><input name='cancel' type='button' class='cancel' onclick='closeBrWindow()' value='Cancel' />
				<input class='submit' type='submit' name='submit' /></p>
			</form>
		</div>
	</div>
</body>
</html>
