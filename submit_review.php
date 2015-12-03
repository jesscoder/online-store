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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="show_catalog.php">Catalog</a></li>
            <li><a href="about.php">About Us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

  <div class="container">

    <div id='wrap'>
			<div id='main'>
				<p>
					Review this product
				</p>
				<form action="add_review.php" method="post">
					<input type="text" name="name" />
<textarea name="review"></textarea> 
					<input type="hidden" name="cat_id" value="&lt;?php echo
$_GET['cat_id']; ?&gt;" />
					<select name="rating">
						<option value="0">
						</option>
						<option value="1">
							*
						</option>
						<option value="2">
							**
						</option>
						<option value="3">
						
							***
						</option>
						<option value="4">
							****
						</option>
						<option value="5">
							*****
						</option>
					</select>
					<input type="submit" name="submit" />
				</form>
			</div>
			
    </div> <!-- /container -->
	</body>
</html>
