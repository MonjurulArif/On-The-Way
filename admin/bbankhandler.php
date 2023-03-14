<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['bbankbtn'])) {
	$bbankname = $_POST['bbankname'];
	$bbankaddress = $_POST['bbankaddress'];
	$bbankwebsite = $_POST['bbankwebsite'];
	$bbankcont = $_POST['bbankcont'];

	$sql = "INSERT INTO bloodbank VALUES('','$bbankname','$bbankaddress','$bbankwebsite','$bbankcont')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Data Added Successfully") </script>
		<script type="text/javascript">window.location="bbankhandler.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$bbankid = $_GET['delete'];
	$sql3 = "DELETE FROM bloodbank WHERE bbankId = {$bbankid}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Data Deleted Successfully") </script>
		<script type="text/javascript">window.location="bbankhandler.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="bbankname" placeholder="Blood Bank Name">
		<input class="form-control" type="text" name="bbankaddress" placeholder="Blood Bank Address">
		<input class="form-control" type="text" name="bbankwebsite" placeholder="Blood Bank Website">
		<input class="form-control" type="text" name="bbankcont" placeholder="Blood Bank Contact No">
		<input class="btn btn-success" type="submit" name="bbankbtn" value="Send">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$bbankid= $_GET['update'];
			$sql = "SELECT * FROM bloodbank WHERE bbankId = {$bbankid}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getbbankid = $row2['bbankId'];
				$getbbankname = $row2['bbankName'];
				$getbbankaddress = $row2['bbankAddress'];
				$getbbankwebsite = $row2['bbankWebsite'];
				$getbbankcont = $row2['bbankcontno'];
			
		?>
		<input class="form-control" type="text" name="bbankid" value="<?php echo $getbbankid?>">
		<input class="form-control" type="text" name="bbankname" value="<?php echo $getbbankname?>">
		<input class="form-control" type="text" name="bbankaddress" value="<?php echo $getbbankaddress?>">
		<input class="form-control" type="text" name="bbankwebsite" value="<?php echo $getbbankwebsite?>">
		<input class="form-control" type="text" name="bbankcontno" value="<?php echo $getbbankcont?>">
		<input class="btn btn-primary" type="submit" name="bbankupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['bbankupdatebtn'])) {
			$updatebbankid = $_POST['bbankid'];
			$updatebbankname = $_POST['bbankname'];
			$updatebbankaddress = $_POST['bbankaddress'];
			$updatebbankwebsite = $_POST['bbankwebsite'];
			$updatebbankcont = $_POST['bbankcont'];
			$sql = "UPDATE bloodbank SET bbankId='$updatebbankid', bbankName = '$updatebbankname', bbankAddress = '$updatebbankaddress', bbankWebsite='$updatebbankwebsite', bbankcontno = '$updatebbankcont' WHERE bbankId = $bbankid";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Data Updated Successfully") </script>
		<script type="text/javascript">window.location="bbankhandler.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered" style="">
		<tr>
			<th>Blood Bank ID</th>
			<th>Blood Bank Name</th>
			<th>Blood Bank Address</th>
			<th>Blood Bank Website</th>
			<th>Blood Bank Contact No</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM bloodbank";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showbbankid = $row['bbankId'];
		$showbbankname = $row['bbankName'];
		$showbbankaddress = $row['bbankAddress'];
		$showbbankwebsite = $row['bbankWebsite'];
		$showbbankcont = $row['bbankcontno'];
		?>
		<tr>
			<td><?php echo $showbbankid ?></td>
			<td><?php echo $showbbankname ?></td>
			<td><?php echo $showbbankaddress ?></td>
			<td><?php echo $showbbankwebsite ?></td>
			<td><?php echo $showbbankcont ?></td>
			<td><a href="bbankhandler.php?update=<?php echo $showbbankid;?>" class="btn btn-info">Update</a></td>
			<td><a href="bbankhandler.php?delete=<?php echo $showbbankid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>