<?php
include_once 'header.php';
require_once 'db.php';
?>
<div class="profile">
	<form action="" method="post">
		<button class="btn btn-success" style="float: right;width: 70px; margin-right: 680px; margin-top: 25px;" name="submit1" type="submit">Edit
		</button>
	</form>
	<div class="profile-box">
		<?php
		if (isset($_POST['submit1'])) {
			?>
			<script type="text/javascript">window.location="edit.php"</script>
			<?php
		}
		
		$sql = mysqli_query($conn,"SELECT adminsFirstname,adminsLastname,adminsEmail,adminsAid,adminsImage FROM admin where adminsAid = '$_SESSION[useruid]';");
		?>
		<br><h2>&nbsp&nbsp&nbsp&nbsp&nbspUser Info</h2>
		<?php
		$row = mysqli_fetch_assoc($sql);
		?>
		<?php
		$var2 =$row['adminsImage'];
        echo "<div class = propic>";
		echo "<img class='rounded-circle' height= 200 width =200 src='images/$var2'>";
		echo "</div>";
		echo "<br>";
		
		echo "<table border=3 class='profile-table '>";
		    echo "<tr>";
		    echo "<td>";
		    echo "<b> First Name: </b>";
		    echo "</td>";
		    echo "<td>";
		    echo $row['adminsFirstname'];
		    echo "</td>";
		    echo "</tr>";

		    echo "<tr>";
		    echo "<td>";
		    echo "<b> Last Name: </b>";
		    echo "</td>";
		    echo "<td>";
		    echo $row['adminsLastname'];
		    echo "</td>";
		    echo "</tr>";

		    echo "<tr>";
		    echo "<td>";
		    echo "<b> Email: </b>";
		    echo "</td>";
		    echo "<td>";
		    echo $row['adminsEmail'];
		    echo "</td>";
		    echo "</tr>";

		    echo "<tr>";
		    echo "<td>";
		    echo "<b> Admin ID: </b>";
		    echo "</td>";
		    echo "<td>";
		    echo $row['adminsAid'];
		    echo "</td>";
		    echo "</tr>";

		    echo "</table>";
		    
		?>

	</div>
</div>

<div class="profile-footer">
		<h3>Email: ontheway7911@gmail.com <br>Contact: +8801787772338,+8801515652762</h3>
</div>
<style type="text/css">
	body{
		background-image: url("background2.jpg");
		 height: 100%;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
