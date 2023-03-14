<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['medbtn'])) {
	$medname = $_POST['medname'];
	$medtype = $_POST['medtype'];
	$medcompany = $_POST['medcompany'];
	$medquantity = $_POST['medquantity'];
	$medprice = $_POST['medprice'];
	$meddescription = $_POST['meddescription'];
	$medseffect = $_POST['medseffect'];

	$sql = "INSERT INTO medicine VALUES('','$medname','$medtype','$medcompany','$medquantity','$medprice','$meddescription','$medseffect')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Data Added Successfully") </script>
		<script type="text/javascript">window.location="medguidehandler.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$medid = $_GET['delete'];
	$sql3 = "DELETE FROM medicine WHERE medId = {$medid}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Data Deleted Successfully") </script>
		<script type="text/javascript">window.location="medguidehandler.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="medname" placeholder="Medicine Name">
		<input class="form-control" type="text" name="medtype" placeholder="Medicine Type">
		<input class="form-control" type="text" name="medcompany" placeholder="Medicine Company">
		<input class="form-control" type="text" name="medquantity" placeholder="Medicine Quantity">
		<input class="form-control" type="text" name="medprice" placeholder="Medicine Price">
		<input class="form-control" type="text" name="meddescription" placeholder="Medicine Description">
		<input class="form-control" type="text" name="medseffect" placeholder="Medicine Side Effect">
		<input class="btn btn-success" type="submit" name="medbtn" value="Send">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$medid= $_GET['update'];
			$sql = "SELECT * FROM medicine WHERE medId = {$medid}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getmedid = $row2['medId'];
				$getmedname = $row2['medName'];
				$getmedtype = $row2['medType'];
				$getmedcompany = $row2['medCompany'];
				$getmedquantity = $row2['medQuantity'];
				$getmedprice = $row2['medPrice'];
				$getmeddescription = $row2['medDescription'];
				$getmedseffect = $row2['medSideEffects'];
			
		?>
		<input class="form-control" type="text" name="medid" value="<?php echo $getmedid?>">
		<input class="form-control" type="text" name="medname" value="<?php echo $getmedname?>">
		<input class="form-control" type="text" name="medtype" value="<?php echo $getmedtype?>">
		<input class="form-control" type="text" name="medcompany" value="<?php echo $getmedcompany?>">
		<input class="form-control" type="text" name="medquantity" value="<?php echo $getmedquantity?>">
		<input class="form-control" type="text" name="medprice" value="<?php echo $getmedprice?>">
		<input class="form-control" type="text" name="meddescription" value="<?php echo $getmeddescription?>">
		<input class="form-control" type="text" name="medseffect" value="<?php echo $getmedseffect?>">
		<input class="btn btn-primary" type="submit" name="medupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['medupdatebtn'])) {
			$updatemedid = $_POST['medid'];
			$updatemedname = $_POST['medname'];
			$updatemedtype = $_POST['medtype'];
			$updatemedcompany = $_POST['medcompany'];
			$updatemedquantity = $_POST['medquantity'];
			$updatemedprice = $_POST['medprice'];
			$updatemeddescription = $_POST['meddescription'];
			$updatemedseffect = $_POST['medseffect'];
			$sql = "UPDATE medicine SET medId='$updatemedid', medName = '$updatemedname', medType = '$updatemedtype', medCompany = '$updatemedcompany',medQuantity = '$updatemedquantity',medPrice = '$updatemedprice',medDescription = '$updatemeddescription',medSideEffects = '$updatemedseffect' WHERE medId = $medid";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Data Updated Successfully") </script>
		<script type="text/javascript">window.location="medguidehandler.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered" style="">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Medicine Type</th>
			<th>Medicine Company</th>
			<th>Medicine Quantity</th>
			<th>Medicine Price</th>
			<th>Medicine Description</th>
			<th>Medicine Side Effects</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM medicine";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showmedid = $row['medId'];
		$showmedname = $row['medName'];
		$showmedtype = $row['medType'];
		$showmedcompany = $row['medCompany'];
		$showmedquantity = $row['medQuantity'];
		$showmedprice = $row['medPrice'];
		$showmeddescription = $row['medDescription'];
		$showmedseffect = $row['medSideEffects'];
	
		?>
		<tr>
			<td><?php echo $showmedid ?></td>
			<td><?php echo $showmedname ?></td>
			<td><?php echo $showmedtype ?></td>
			<td><?php echo $showmedcompany ?></td>
			<td><?php echo $showmedquantity ?></td>
			<td><?php echo $showmedprice ?></td>
			<td><?php echo $showmeddescription ?></td>
			<td><?php echo $showmedseffect ?></td>

			<td><a href="medguidehandler.php?update=<?php echo $showmedid;?>" class="btn btn-info">Update</a></td>
			<td><a href="medguidehandler.php?delete=<?php echo $showmedid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>