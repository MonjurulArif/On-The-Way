<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['dbtn'])) {
	$dname = $_POST['dname'];
	$dusername = $_POST['dusername'];
	$ddes = $_POST['ddes'];
	$dcont = $_POST['dcont'];
	$dmail = $_POST['dmail'];
	$sql = "INSERT INTO doctors VALUES('','$dname','$dusername','$ddes','$dcont','$dmail')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Data Added Successfully") </script>
		<script type="text/javascript">window.location="dcornerhandler.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$did = $_GET['delete'];
	$sql3 = "DELETE FROM doctors WHERE doctorId = {$did}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Data Deleted Successfully") </script>
		<script type="text/javascript">window.location="dcornerhandler.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="dname" placeholder="Doctor Name">
		<input class="form-control" type="text" name="dusername" placeholder="Doctor User Name">
		<input class="form-control" type="text" name="ddes" placeholder="Doctor Designation">
		<input class="form-control" type="text" name="dcont" placeholder="Doctor Contact No">
		<input class="form-control" type="text" name="dmail" placeholder="Doctor Email">
		<input class="btn btn-success" type="submit" name="dbtn" value="Send">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$did= $_GET['update'];
			$sql = "SELECT * FROM doctors WHERE doctorId = {$did}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getdname = $row2['doctorName'];
				$getdusername = $row2['doctorUsername'];
				$getddes = $row2['doctorDesignation'];
				$getdcont = $row2['doctorContactNo'];
				$getdmail = $row2['doctorEmail'];

			
		?>
		<input class="form-control" type="text" name="dname" value="<?php echo $getdname?>">
		<input class="form-control" type="text" name="dusername" value="<?php echo $getdusername?>">
		<input class="form-control" type="text" name="ddes" value="<?php echo $getddes?>">
		<input class="form-control" type="text" name="dcont" value="<?php echo $getdcont?>">
		<input class="form-control" type="text" name="dmail" value="<?php echo $getdmail?>">
		<input class="btn btn-primary" type="submit" name="dupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['dupdatebtn'])) {
			$updatedname = $_POST['dname'];
			$updatedusername = $_POST['dusername'];
			$updatedes = $_POST['ddes'];
			$updatedcont = $_POST['dcont'];
			$updatedmail = $_POST['dmail'];
			$sql = "UPDATE doctors SET doctorName='$updatedname',doctorUsername='$updatedusername', doctorDesignation = '$updatedes', doctorContactNo = '$updatedcont', doctorEmail = '$updatedmail' WHERE doctorId = $did";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Data Updated Successfully") </script>
		<script type="text/javascript">window.location="dcornerhandler.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered" style="">
		<tr>
			<th>Doctor ID</th>
			<th>Doctor Name</th>
			<th>Doctor User Name</th>
			<th>Doctor Designation</th>
			<th>Doctor Contact No</th>
			<th>Doctor Email</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM doctors";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showdid = $row['doctorId'];
		$showdname = $row['doctorName'];
		$showdusername = $row['doctorUsername'];
		$showddes = $row['doctorDesignation'];
		$showdcont = $row['doctorContactNo'];
		$showdmail = $row['doctorEmail'];
	
		?>
		<tr>
			<td><?php echo $showdid ?></td>
			<td><?php echo $showdname ?></td>
			<td><?php echo $showdusername ?></td>
			<td><?php echo $showddes ?></td>
			<td><?php echo $showdcont ?></td>
			<td><?php echo $showdmail ?></td>
			<td><a href="dcornerhandler.php?update=<?php echo $showdid;?>" class="btn btn-info">Update</a></td>
			<td><a href="dcornerhandler.php?delete=<?php echo $showdid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>