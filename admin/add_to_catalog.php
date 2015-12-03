<?php
	// ---- Must be logged in to view this page ----
	require( "pass.php" );
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Add Item</title>
</head>

<body>
<h1>Add Item</h1>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="logout.php">Log out</a></li>
    <li><a href='list_catalog.php'>List All</a></li>
</ul>
<?php 

	if ( $_POST['submit'] ) {
		$time = time();
		
		$image_sm_name = $time . "_sm.jpg";
		$image_lg_name = $time . "_lg.jpg";
		
		$image_sm = move_uploaded_file( $_FILES['image_sm']['tmp_name'], "$image_sm_name" );
		$image_lg = move_uploaded_file( $_FILES['image_lg']['tmp_name'], "$image_lg_name" );
		
		if ( $image_sm ) { // Move the file over.
			echo "<p>Small Image, $image_sm_name, uploaded successfully</p>";
		} else { // Couldn't move the file over.
			echo "<p><font color='red'>Small Image, $image_sm_name, upload failed</font></p>";
		}
		
		if ( $image_lg ) { // Move the file over.
			echo "<p>Large Image, $image_lg_name, uploaded successfully</p>";
		} else { // Couldn't move the file over.
			echo "<p><font color='red'>Large Image, $image_lg_name, upload failed</font></p>";
		}
	
		require( "../../dbconnect.php" );
			
		$name       = escape_data( $_POST['name'] );
		$price      = escape_data( $_POST['price'] );
		$desc_short = escape_data( $_POST['desc_short'] );
		$desc_long  = escape_data( $_POST['desc_long'] );
		$category   = escape_data( $_POST['category'] );

		
			
		$sql = "INSERT INTO productTable ( id, name, desc_short, desc_long, price, category, image_sm, image_lg ) 
VALUES ( NULL, '$name', '$desc_short', '$desc_long', '$price', '$category', '$image_sm_name', '$image_lg_name' );";
	
		$result = mysql_query( $sql );
	
		if ( $result ) {
			echo "<p>The catalog table has been updated</p>";
			echo "<p><a href='{$_SERVER['PHP_SELF']}'>Add another</a></p>";
		} else {
			echo "<p>There has been an error updating the catalog table</p>";
			echo "<p>Error:" . mysql_error() . "</p>";
		}
	} else {
		?>
		
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' enctype="multipart/form-data">
	<p><label for='name'>Name:</label><br />
	<input name='name' type='text' id='name' /></p>
	<p><label for='price'>Price:</label><br />
	<input id='price' type='text' name='price' /></p>
	<p><label for='desc_short'>Description short:</label><br />
	<textarea id='desc_short' name='desc_short'></textarea></p>
	<p><label for='desc_long'>Description long:</label><br />
	<textarea id='desc_long' name='desc_long'></textarea></p>
	<p><label for='category'> Choose a category</label><br />
	<select id='category' name='category'>
		<option value='Booster'>Booster</option>
		<option value='Compression'>Compression</option>	
		<option value='Delay'>Delay</option>	
		<option value='Distortion'>Distortion</option>
		<option value='Fuzz'>Fuzz</option>
		<option value='Octave'>Octave</option>
		<option value='Other'>Other</option>
	</select></p>
	<input type="hidden" name="MAX_FILE_SIZE" value="524288">
	<p><label for='image_sm'>Small Image (500k<)</label><br />
	<input id='image_sm' type="file" name="image_sm" />
	<p><label for='image_sm'>Large Image (500k<)</label><br />
	<input id='image_lg' type="file" name="image_lg" />
	<p><input id='submit' type='submit' name='submit' value='submit' /></p>
</form>
		
		<?php
	}
?>
</body>
</html>
