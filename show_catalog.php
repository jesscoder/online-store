<?php 
	require("dbconnect.php");
	$sql = "SELECT * FROM productTable";
	$results = mysql_query( $sql );
	$count = 0; //Initializes the count
	while ( $myrow = mysql_fetch_array( $results ) )
	{
		//display catalogue items
		$image_sm = $myrow['image_sm'];
		$id = $myrow['id'];
		$name = $myrow['name'];
		$price = $myrow['price'];
		$desc_short = $myrow['desc_short'];
		
		echo "<div class='item'>
				<a href='product_detail.php?cat_id=$id'><img src='images/$image_sm' />
				<p>Name:<a href='product_detail.php?cat_id=$id'>$name</a>
				Price:\$$price</p>
					<p>$desc_short</p>
					<p>Reviews: 12 rating:5</p>
				</a>
				</div>\n";
				
		if ( ( $count % 3 ) == 3 ) {
			echo "<hr />";
		}
	}
?>
