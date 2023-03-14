<?php
include_once 'header.php';
include_once 'db.php';
?>


<br><h2>Doctors</h2><br>
<div class="scroll">
<?php
$res=mysqli_query($conn,"SELECT * FROM doctors;");
echo "<table class='table table-bordered table-hover table-striped table-dark'>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "ID";   echo "</th>";
echo "<th>"; echo "Name";   echo "</th>";
echo "<th>"; echo "Username";   echo "</th>";
echo "<th>"; echo "Designation";   echo "</th>";
echo "<th>"; echo "Contact No";   echo "</th>";
echo "<th>"; echo "Email";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($res))
 {
	echo "<tr>";
	echo "<td>"; echo $row['doctorId']; echo "</td>";
	echo "<td>"; echo $row['doctorName']; echo "</td>";
	echo "<td>"; echo $row['doctorUsername']; echo "</td>";
	echo "<td>"; echo $row['doctorDesignation']; echo "</td>";
	echo "<td>"; echo $row['doctorContactNo']; echo "</td>";
	echo "<td>"; echo $row['doctorEmail']; echo "</td>";
	echo "</tr>";
}
echo "</table>";
?>
</div>
<br><br><br>
<div class="wrapper">
	<h1>Ask your questions</h1>
	<form style="" action="" method="post">
		<input style="width: 800px; height: 70px; margin-left: 25px;" type="text" name="comment" placeholder="write here...">
		<input type="submit" name="submit" value="Post">
	</form>
	<br>

<div class="scroll">
	<?php
	date_default_timezone_set("Asia/Dhaka");
	$dt = date("Y/m/d");
	$tm = date("h:i:sa");
	if (isset($_POST['submit'])) {
		$sql="INSERT INTO quora VALUES('', '$_SESSION[useruid]','$_POST[comment]', CURDATE(),CURTIME());";
		if(mysqli_query($conn,$sql))
		{
			$sql2="SELECT * FROM `quora` ORDER BY quora.commId DESC;";
			$res=mysqli_query($conn,$sql2);
			echo "<table class= 'table table-bordered table-hover table-striped table-dark'>";
			while ($row=mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['qadate']; echo "&nbsp &nbsp"; echo $row['qatime']; echo "</td>";
				echo "<td>"; echo $row['qa']; echo "</td>";
				echo "</tr>";
			}
		}
		

	}
	?>
</div>
</div>



<style type="text/css">
	body{
		background-image: url("medbackground.jpg");
		 height: 1300px;
		 width: 1900px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
