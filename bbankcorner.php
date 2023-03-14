<?php
include_once 'header.php';
include_once 'db.php';
?>

	<div>
		<form class="form-inline" method="post" name="form1">
			<div>
				<input class="form-control mr-sm-2" style="width: 350px;" type="search" name="search" placeholder="Search for Blood Banks..." required="">
				<br><button style ="background-color: #6db6b9e6;"type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">
					
						search
					
				</button>
			</div>
		</form>
	</div>
<br><h2>Blood Bank Info</h2><br>
<div class="scroll">
<?php
if (isset($_POST['submit'])) 
{
	$q=mysqli_query($conn,"SELECT * FROM bloodbank where bbankName LIKE '%$_POST[search]%';");
	if(mysqli_num_rows($q)==0)
	{
		echo "Sorry! Your desired bloodbank info is not available right now";
	}
	else
	{
		echo "<table class='table table-bordered table-hover table-striped table-dark '>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "ID";   echo "</th>";
echo "<th>"; echo "Name";   echo "</th>";
echo "<th>"; echo "Adress";   echo "</th>";
echo "<th>"; echo "Contact No";   echo "</th>";
echo "<th>"; echo "Website";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($q))
 {
	echo "<tr>";
	echo "<td>"; echo $row['bbankId']; echo "</td>";
	echo "<td>"; echo $row['bbankName']; echo "</td>";
	echo "<td>"; echo $row['bbankAddress']; echo "</td>";
	echo "<td>"; echo $row['bbankcontno']; echo "</td>";
	$web = $row['bbankWebsite'];
	echo "<td>"; echo $web; echo "</td>";

	echo "</tr>";
}
echo "</table>";
	}
}
else
{
$res=mysqli_query($conn,"SELECT * FROM bloodbank;");
echo "<table class='table table-bordered table-hover table-striped table-dark'>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "ID";   echo "</th>";
echo "<th>"; echo "Name";   echo "</th>";
echo "<th>"; echo "Adress";   echo "</th>";
echo "<th>"; echo "Contact No";   echo "</th>";
echo "<th>"; echo "Website";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($res))
 {
	echo "<tr>";
	echo "<td>"; echo $row['bbankId']; echo "</td>";
	echo "<td>"; echo $row['bbankName']; echo "</td>";
	echo "<td>"; echo $row['bbankAddress']; echo "</td>";
	echo "<td>"; echo $row['bbankcontno']; echo "</td>";
	$web = $row['bbankWebsite'];
	echo "<td>"; echo "<a href='$web'>$web</a>"; echo "</td>";

	echo "</tr>";
}
echo "</table>";
}

?>
</div>

</body>
</html>
<div class="bbank-footer">
		<h3>Email: ontheway7911@gmail.com <br>Contact: +8801787772338,+8801515652762</h3>
</div>
<style type="text/css">
	body{
		background-image: url("medbackground.jpg");
		 height: 937px;
		 width: 1900px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
