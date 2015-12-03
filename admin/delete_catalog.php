<?php
	// ---- Must be logged in to view this page ----
	require( "pass.php" );
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Delete Item</title>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>

<body>
	<div id='wrap'>
		<div id='main'>
	<?php 
		if ( isset( $_GET['confirm'] ) ) {
			if ( $_GET['confirm'] == "yes" ) {
				require( "../../dbconnect.php" );
				$result = mysql_query( "DELETE FROM productTable WHERE id ='{$_GET['cat_id']}' LIMIT 1" );
				echo "The item has been deleted.";
			}
		} else {
			echo "<p>Are you sure you want to delete this item?</p>
	<p><a href='{$_SERVER['PHP_SELF']}?cat_id={$_GET['cat_id']}&confirm=yes'>Yes</a> <a href='list_catalog_01.php'>No</a></p>";
		}
	?>
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
