<?php
	$userId = $_GET['user_id'];
?>
<!DOCTYPE html>
<html>
<head>

<style>

body {
	width:100%;
	height:100%;
}

#profile_div {
	position:absolute;
	width:20%;
	height:100%;
	top:0;
	left:80%;
	background-color:gray;
}

#content_div {
	position:absolute;
	position:absolute;
	width:60%;
	height:100%;
	top:0;
	left:20%;
	background-color:blue;
}

#classes_div {
	background-color:red;
	position:absolute;
	width:20%;
	height:100%;
	top:0;
	left:0%;
}

</style>

<body>
<?php
	require 'school_connect.php';
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	$getUserInfo = "SELECT * FROM members WHERE id='$userId'";
	$userQuery = mysqli_query($connection,$getUserInfo);
	if (mysqli_num_rows($userQuery) == 1) {
		$userResponse = mysqli_fetch_array($userQuery);
		$username = $userResponse['username'];
	}
?>

	<div id="profile_div">
		<img src="http://thisisnoah.x10.mx/photo21/i/678.jpg" alt="Profile" height="20%" width="80%">
	</div>

	<div id="content_div">
		<p><?php echo $username; ?></p>
	</div>
	
	<div id="classes_div">
	</div>
</body>

</head>
</html>