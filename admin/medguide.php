<?php
include_once 'header.php';
include_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Medicine Corner</title>
</head>
<body>
	<div>
		<form class="form-inline" method="post" name="form1">
			<div>
				<input class="form-control mr-sm-2" style="width: 350px;" type="search" name="search" placeholder="Search for Medicines..." required="">
				<br><button style ="background-color: #6db6b9e6;"type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">
					
						search
					
				</button>
			</div>
		</form>
	</div>
<br><h2>List of Medicines</h2><br>
<div class="scroll">
<?php
if (isset($_POST['submit'])) 
{
	$q=mysqli_query($conn,"SELECT * FROM medicine where medName LIKE '%$_POST[search]%';");
	if(mysqli_num_rows($q)==0)
	{
		echo "Sorry! Your desired medicine is not available right now";
	}
	else
	{
		echo "<table class='table table-bordered table-hover  table-dark'>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "ID";   echo "</th>";
echo "<th>"; echo "Name";   echo "</th>";
echo "<th>"; echo "Type";   echo "</th>";
echo "<th>"; echo "Company";   echo "</th>";
echo "<th>"; echo "Quantity";   echo "</th>";
echo "<th>"; echo "Price(in Taka)";   echo "</th>";
echo "<th>"; echo "Description";   echo "</th>";
echo "<th>"; echo "Side Effects";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($q))
 {
	echo "<tr>";
	echo "<td class='bg-success'>"; echo $row['medId']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medName']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medType']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medCompany']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medQuantity']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medPrice']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medDescription']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medSideEffects']; echo "</td>";

	echo "</tr>";
}
echo "</table>";
	}
}
else
{
$res=mysqli_query($conn,"SELECT * FROM medicine;");
echo "<table class='table table-bordered table-hover  table-dark'>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "ID";   echo "</th>";
echo "<th>"; echo "Name";   echo "</th>";
echo "<th>"; echo "Type";   echo "</th>";
echo "<th>"; echo "Company";   echo "</th>";
echo "<th>"; echo "Quantity";   echo "</th>";
echo "<th>"; echo "Price(in Taka)";   echo "</th>";
echo "<th>"; echo "Description";   echo "</th>";
echo "<th>"; echo "Side Effects";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($res))
 {
	echo "<tr>";
	echo "<td class='bg-success'>"; echo $row['medId']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medName']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medType']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medCompany']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medQuantity']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medPrice']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medDescription']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['medSideEffects']; echo "</td>";

	echo "</tr>";
}
echo "</table>";
}

?>
</div>

</body>
</html>
<div class="med-footer">
		<h3>Email: ontheway7911@gmail.com <br>Contact: +8801787772338,+8801515652762</h3>
</div>
<style type="text/css">
	body{
		background-image: url("medbackground.jpg");
		 height: 937px;
		 width: 1903px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
