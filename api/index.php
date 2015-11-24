<?php
	require( "dbconnect.php" );
	
	$catalog = array();
	
	$sql = "SELECT * FROM productList";
	$results = mysql_query( $sql );
	
	while ( $myrow = mysql_fetch_array( $results ) ) {
		$catalog[] = array(
			"thumbnail" => $myrow['image_sm'],
			"id" => $myrow['id'],
			"name" => htmlentities( $myrow['name'] ),
			"price" => $myrow['price'],
			"excerpt" => htmlentities( $myrow['desc_short'] ),
		);
	}
	
	echo json_encode( array( 'catalog' => $catalog ) );
?>
