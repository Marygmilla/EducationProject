<?php
	require 'school_connect.php';
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	$loginUsername = $_POST['login_username'];
	$loginPassword = $_POST['login_password'];
	$passwordHash = crypt($loginPassword,$loginUsername);
		
		$userInfo = "SELECT * FROM members WHERE username='$loginUsername' AND password='$passwordHash'";
		$userQuery = mysqli_query($connection,$userInfo);
		if (mysqli_num_rows($userQuery) == 1) {
			$userArray = mysqli_fetch_array($userQuery);
			$urlString = "http://thisisnoah.x10.mx/school/home.php?user_id=".$userArray['id'];
			header("Location: " . $urlString);
		}
		else {
			echo "You need to make an account. " . mysqli_num_rows($userQuery);
		}
?>