<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Online Store</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
		<div class="container">
			<div id="main" class="sisteen columns">
				<h1>Page Name</h1>
				<!-- Page Content -->
					<?php 
						require("dbconncet.php");
						
						$id = $_GET['cat_id'];
						
						$sql = "SELECT * FROM productList WHERE id='$id'";
						$result = mysql_query( $sql );
						$myrow = mysql_fetch_array( $result );
						
						$image_lg = $myrow['image_lg'];
						$name = $myrow['name'];
						$price = $myrow['price'];
						$desc_long = $myrow['desc_long'];
						
						echo "<div class='item'>
								<img src='images/$image_lg' />
								<p>Name:$name Price:$price</p>
								<p>$desc_long</p>
								<p><a href='%' onclick=\"openBrWindow('review_product.php?cat_id=$id','review',
								'width:300,height=400' )\">Review this Product</a></p>
								</div> \n";	

					?>	
				
				
				
				
			</div>
			<div id="nav_bar" class="sisteen columns">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="show_catalog.php">Catalog</a></li>
					<li><a href="about.html">About</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>
