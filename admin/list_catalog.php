<?php
	// ---- Must be logged in to view this page ----
	require( "pass.php" );
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>List Catalog</title>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>

<body>
	<div id='wrap'>
		<div id='main'>
			<p>Catalog list</p>
<?php
	require( "../../dbconnect.php" );
	$sql = "SELECT * FROM productTable";
	$results = mysql_query( $sql );
	while ( $myrow = mysql_fetch_array( $results ) ) {
		$name  = $myrow['name'];
		$price = $myrow['price'];
		$id    = $myrow['id'];
		$desc_short = $myrow['desc_short'];
	
		echo "<div class='item'>
	<p>Name:$name Price:$price
	<a href='edit_catalog.php?cat_id=$id'>Edit</a> 
	<a href='delete_catalog.php?cat_id=$id'>Delete</a>
	</p>
	<p>$desc_short</p>
</div>";
	}
?>
		</div>
		<div id='nav_bar'>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="logout.php">Log out</a></li>
				<li><a href='add_to_catalog.php'>Add new</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
