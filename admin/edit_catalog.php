<?php
	// ---- Must be logged in to view this page ----
	require( "pass.php" );
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Edit Item</title>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>

<body>
	<div id='wrap'>
		<div id='main'>
			<p>Edit an item from the catalog table</p>
	
<?php
	require( "../../dbconnect.php" );
	
	if ( $_POST['submit'] ) {
		// get the id number of this record
		$id = $_GET['cat_id'];
	
		// Try and upload new images. We'll overwrite the old images
		$sql = "SELECT * FROM productTable WHERE id='$id'";
		$result = mysql_query( $sql );
		
		$myrow = mysql_fetch_array( $result );
		
		$image_sm_name = $myrow['image_sm'];
		$image_lg_name = $myrow['image_lg'];
		
		$image_sm = $_FILES['image_sm']['name'];
		$image_lg = $_FILES['image_lg']['name'];
		
		// Check if image was updated before trying to upload the file
		if ( $image_sm != "" ) {
			echo "<p>*** image sm: $image_sm";
			$image_sm = move_uploaded_file( $_FILES['image_sm']['tmp_name'], "$image_sm_name" );
			if ( $image_sm != "" ) { // Move the file over.
				echo "<p>Small Image, $image_sm_name, updated successfully</p>";
			} else { // Couldn't move the file over.
				echo "<p><font color='red'>Small Image, $image_sm_name, update failed</font></p>";
			}
		}
		
		if ( $image_lg != "" ) {
			echo "<p>*** image lg: $image_lg";
			$image_lg = move_uploaded_file( $_FILES['image_lg']['tmp_name'], "$image_lg_name" );
			if ( $image_lg ) { // Move the file over.
				echo "<p>Large Image, $image_lg_name, updated successfully</p>";
			} else { // Couldn't move the file over.
				echo "<p><font color='red'>Large Image, $image_lg_name, update failed</font></p>";
			}
		}

	
		// Run all of the form data through the escape_data function
		$name        = escape_data( $_POST['name'] );
		$price       = escape_data( $_POST['price'] );
		$image       = escape_data( $_POST['image'] );
		$desc_short  = escape_data( $_POST['desc_short'] );
		$desc_long   = escape_data( $_POST['desc_long'] );
		$category    = escape_data( $_POST['category'] );
		
		$sql = "UPDATE productTable SET name='$name', desc_short='$desc_short', desc_long='$desc_long', price='$price' 
		WHERE id='$id' LIMIT 1";
		$results = mysql_query( $sql );
		
		echo "<p>Info:" . mysql_info() . "</p>";
		echo "<p>Error" . mysql_error() . "</p>";
		
		
	} else {
		$sql        = "SELECT * FROM productTable WHERE id='{$_GET['cat_id']}'";
		$result     = mysql_query( $sql );
		$myrow      = mysql_fetch_array( $result );
		$name       = $myrow['name'];
		$price      = $myrow['price'];
		$desc_short = $myrow['desc_short'];
		$desc_long  = $myrow['desc_long'];
		$image_sm   = $myrow['image_sm'];
		$image_lg   = $myrow['image_lg'];
	}
	?>
	
		<form action="<?php echo $_SERVER['PHP_SELF'] . "?cat_id=" . $_GET['cat_id']; ?>" method="post" enctype="multipart/form-data" >
			<p><label for="name">Name:</label><input name='name' value='<?php echo $name; ?>' /></p>
			<p><label for="price">Price:</label><input name='price' value='<?php echo $price; ?>' /></p>
			<input type="hidden" name="MAX_FILE_SIZE" value="524288">
			<p><label for='image_sm'>Small Image (500k<)</label><br />
			<input id='image_sm' type="file" name="image_sm" />
			<p><label for='image_sm'>Large Image (500k<)</label><br />
			<input id='image_lg' type="file" name="image_lg" />
			<p><label for="desc_short">Description Short:</label></p>
			<textarea name='desc_short'><?php echo $desc_short; ?></textarea>
			<p><label for="desc_long">Description Long:</label></p>
			<textarea name='desc_long'><?php echo $desc_long; ?></textarea>
			<p><input class='submit' type='submit' name='submit' /></p>
		</form>
		</div>
		<div id='nav_bar'>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="logout.php">Log out</a></li>
				<li><a href='list_catalog.php'>List All</a></li>
				<li><a href='add_to_catalog.php'>Add new</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
