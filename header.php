<?php
session_start();
include_once 'db.php';
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>On the Way</title>
	<link rel="icon" href="icon.png">
	<link rel="stylesheet"  href="style.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<header>
		<img height="100px" width="200px" class="logo" src="logo.jpg">
		<img class='rounded-circle'height="50px" width="50px" class="logo" style="margin-bottom: 20px;" src="logo8.png">
	
	<nav>
		<div class="navbar">
			<ul>
			    <?php
			    if(isset($_SESSION['useruid']))
			    {
			    	$var = $_SESSION['useruid'];
			    	$sql = mysqli_query($conn,"SELECT usersImage FROM users where usersUid = '$var';");
			    	$row = mysqli_fetch_assoc($sql);
			    	$var2 =$row['usersImage'];
			    	echo "<li><a href='index.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'> Home</a></li>";
			    	echo "<li><a href='profile.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Profile-Page</a></li>";
			    	echo " <li><a href='logout.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Logout</a></li>";
			    	echo "<img class='rounded-circle'height= 30 width =30 src='images/$var2'>";
			    	echo "<p>Hello there, " . $_SESSION["useruid"] . "</p>";

			    }
			    else
			    {
			    	echo "<li><a href='home.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'> Home</a></li>";
			    	echo "<li><a href='signup.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Signup</a></li>";
			    	echo " <li><a href='login.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Login</a></li>";
			    	echo " <li><a href='admin/login.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>AdminLogin</a></li>";
			    }
			    ?>
		    </ul>
		</div>
		
	</nav>
	</header>
