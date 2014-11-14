<?php
	$userId = $_GET['user_id'];
?>
<!DOCTYPE html>
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

function changeHeight(elementId) {
	if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();

	var currentElement = "classListItem" + elementId;
	var theElement = document.getElementById(currentElement);
	var startingHeight = theElement.style.height;

	var createOptionDiv = document.createElement("DIV");
	createOptionDiv.style.position = "relative";
	createOptionDiv.style.top = "20%";
	createOptionDiv.style.height = "80%";
	createOptionDiv.style.width = "80%";
	createOptionDiv.style.left = "10%";
	createOptionDiv.style.background = "red";
	createOptionDiv.style.padding = "0";
	createOptionDiv.style.margin = "0";
	createOptionDiv.id = "selectoptions" + elementId;

	var tutOption = document.createElement("A");
	tutOption.id = "tutoptions" + elementId;
	tutOption.style.position = "absolute";
	tutOption.style.top = "0";
	tutOption.style.left = "0";
	tutOption.style.width = "50%";
	tutOption.style.height = "100%";
	tutOption.style.background = "white";
	tutOption.href = "#tutorial";
	var tutText = document.createTextNode("Tutorials");
	tutOption.appendChild(tutText);
	
	var fileOption = document.createElement("A");
	fileOption.id = "fileoptions" + elementId;
	fileOption.style.position = "absolute";
	fileOption.style.top = "0";
	fileOption.style.left = "50%";
	fileOption.style.width = "50%";
	fileOption.style.height = "100%";
	fileOption.href = "#files";
	fileOption.style.background = "white";
	var fileText = document.createTextNode("Files");
	fileOption.appendChild(fileText);

	if (theElement.style.height == "30%") {
		theElement.style.height = "5%";
		document.getElementById("selectoptions" + elementId).remove();
		document.getElementById("fileoptions" + elementId).remove();
		document.getElementById("tutoptions" + elementId).remove();
	}
	else {
		theElement.style.height = "30%";
		/*
		$("#classListItem"+elementId).click(function() {
			$("#classListItem"+elementId).animate({height:"30%"});
		});
		*/
		theElement.appendChild(createOptionDiv);
		createOptionDiv.appendChild(fileOption);
		createOptionDiv.appendChild(tutOption);
	}
}
</script>

<style>
body {
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

#assignment_div {
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
	width:100%;
	top:2.5%;
	text-align:center;
	margin:0;
	padding:0;
}

#fullNameWrapper {
	width: 100%;
	height: 10%;
}

#userClasses {
	width:100%;
	height: 80%;
	top:0%;
	padding:0;
	margin:0;
}

#classListLinks {
	width: 97%;
	text-align: center;
	text-decoration: none;
	-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

#classListLinks:visited {
	text-decoration:none;
}

.classListItems:hover {
	background-color: purple;
}

.classListItems {
	width:90%; 
	padding: 5%;
	height: 5%;
	display:inline-block;
	text-align: center;
	text-decoration: none;
	background-color: green;
	-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
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
		<div id="fullNameWrapper"> 
			<p id="fullName"><?php //echo $userFullName ?>Noah</p>
		</div>
	</div>

	<div id="content_div">
		<ul id="userClasses">
			<?php
				require 'html_element.php';

				$power = array('My','Name','Noah','Blahhhhhhh');

				for ($i = 0; $i < count($power); $i++) {
					$fullLink = "<a id='classListLinks'>" . $power[$i] . "</a>";

					$listItem = new html_element("li");
					$listItem->set("text", $fullLink);
					$elementId = "classListItem" . $i;
					$listItem->set("id", $elementId);
					$listItem->set("class","classListItems");
					$listItem->set("onclick", "changeHeight($i)");
					$listItem->output();

					$breakItem = new html_element("br");
					$breakItem->output();
				}
			?>
		</ul>
	</div>
	
	<div id="assignment_div">
	</div>
</body>

</head>
</html>