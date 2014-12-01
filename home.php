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
	overflow-x:none;
	margin:0;
	padding:0;
}

#profile_div {
	position:absolute;
	width:20%;
	height:100%;
	top:0;
	left:80%;
	background-color:gray;
	overflow-x:none;
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

p,ul {
	position:absolute;
	font-family:"Arial";
}

#fullName {
	width:90%;
	height:10%;
	text-align:center;
	margin:0;
	padding:5%;
}

#userClassList {
	width:100%;
	height: 80%;
	top:10%;
	padding:0;
	margin:0;
}

#classListLinks {
	width: 97%;
	text-align: center;
	text-decoration: none;
}

#classListLinks:visited {
	text-decoration:none;
}

#classListItems:hover {
	background-color: purple;
}

#classListItems {
	width:90%; 
	padding: 5%;
	display:inline-block;
	text-align: center;
	text-decoration: none;
	background-color: green;
}#userAssignments {
	width:100%;
	height: 80%;
	top:10%;
	padding:0;
	margin:0;
}

#assignmentListLinks {
	width: 97%;
	text-align: center;
	text-decoration: none;
}

#assignmentListItems {
	width: 90%;
	padding: 5%;
	display: inline-block;
	text-align: center;
	text-decoration: none;
	background-color: orange;
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
		<p id="fullName"><?php //echo $userFullName ?>Noah</p>

		<ul id="userClassList">
			<?php
				$power = array('My','Name','Noah');
				require 'html_element.php';

				for ($i = 0; $i < count($power); $i++) {
					$fullLink = "<a href='#" . $power[$i] . "' id='classListLinks'>" . $power[$i] . "</a>";

					$listItem = new html_element("li");
					$listItem->set("text", $fullLink);
					$listItem->set("id", "classListItems");
					$listItem->set("style", "");
					$listItem->output();

					$breakItem = new html_element("br");
					$breakItem->output();
				}
			?>
		</ul>
	</div>

	<div id="content_div">
		<p><?php echo $username; ?></p>
	</div>
	
	<div id="assignments_div">
			<h> Assignments </h>
	<ul id="userAssignments">
		<?php
			$power = array('chapter 1','chapter 2','chapter 3');
			require 'html_element.php';
			
			for ($i = 0; $i < count($power); $i++) {
			$fullLink = "<a href='#" . $power[$i] . "' id='assignmentListLinks'>" . $power[$i] . "</a>";
			
			$listItem = new html_element("li");
			$listItem->set("text", $fullLink);
			$listItem->set("id", "assignmentListItems");
			$listItem->set("style", "");
			$listItem->output();
			
			$breakItem = new html_elemt("br");
			$breakItem->output();
		}
		?>
	</ul>
	</div>
</body>

</head>
</html>
