<!DOCTYPE html>
<html>
<head>

<body>

<?php
	require 'school_connect.php';
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if (isset($_POST['register'])) { 
		$username = $_POST['username'];
		$password = trim(crypt($_POST['password'], $username));
		
		$userInfo = "INSERT INTO members(username,password) VALUES('$username','$password')";
		$userQuery = mysqli_query($connection,$userInfo);
		
		echo "<h1>You are registered.</h1>";
	}
	else {
?>
	<form id="register_form" method="POST">
		Username: <input type="text" name="username"> </br>
		Password: <input type="password" name="password"> </br>
		<input type="submit" value="Sign Up" name="register">
	</form>
	</br>
	
	<form id="login_form" action="login.php" method="POST">
		Username: <input type="text" name="login_username"> </br>
		Password: <input type="password" name="login_password"> </br>
		<input type="submit" value="Login" name="login">
	</form>
<?php
}
?>
</body>

</head>
</html>