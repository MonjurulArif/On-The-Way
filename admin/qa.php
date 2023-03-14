<?php
include_once 'db.php';
include_once 'header.php';
?>
<div class="wrapper">
	<h1>Ask your questions</h1>
	<form style="" action="" method="post">
		<input style="width: 800px; height: 70px; margin-left: 25px;" type="text" name="comment" placeholder="write here...">
		<input type="submit" name="submit" value="Post">
	</form>
	<br>

<div class="scroll">
	<?php
	if (isset($_POST['submit'])) {
		$sql="INSERT INTO quora VALUES('', '$_SESSION[useruid]','$_POST[comment]');";
		if(mysqli_query($conn,$sql))
		{
			$sql2="SELECT * FROM `quora` ORDER BY quora.commId DESC;";
			$res=mysqli_query($conn,$sql2);
			echo "<table class= 'table table-bordered table-hover table-striped table-dark'>";
			while ($row=mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td>"; echo $row['qa']; echo "</td>";
				echo "</tr>";
			}
		}
		else
		{
			$sql2="SELECT * FROM `quora` ORDER BY quora.commId DESC;";
			$res=mysqli_query($conn,$sql2);
			echo "<table class= 'table table-bordered table-hover table-striped table-dark'>";
			while ($row=mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td>"; echo $row['qa']; echo "</td>";
				echo "</tr>";
			}
		}


	}
	?>
</div>
</div>