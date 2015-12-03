<?php
	session_start(); // Start the session.
	
	//---------------------- Begin Login Submit ----------------------------
	if ( isset( $_POST['submit'] ) ) {
		$u = $_POST['username'];
		$p = $_POST['password'];
		
		if ( $u == "milo" && $p == "cute" ) { 
			session_start();
			$_SESSION['loggedin'] = true;
			header ( "Location: list_catalog.php" );
			exit();
		}
	}
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Login</title>
</head>

<body>
<h1>Log in</h1>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<p><b>User Name:</b> <input type='text' name='username' size='10' maxlength='20' /></p>
	<p><b>Password:</b>  <input type='password' name='password' size='20' maxlength='20' /></p>
	<p><input type='submit' name='submit' value='Login' />
	</p>
</form>
</body>
</html>