<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['productbtn'])) {
	$productname = $_POST['productname'];
	$productcode = $_POST['productcode'];
	$productimg = $_POST['productimg'];
	$productprice = $_POST['productprice'];

	$sql = "INSERT INTO tblproduct VALUES('','$productname','$productcode','$productimg','$productprice')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Data Added Successfully") </script>
		<script type="text/javascript">window.location="producthandler.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$productid = $_GET['delete'];
	$sql3 = "DELETE FROM tblproduct WHERE id = {$productid}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Data Deleted Successfully") </script>
		<script type="text/javascript">window.location="producthandler.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="productname" placeholder="Product Name">
		<input class="form-control" type="text" name="productcode" placeholder="Product Code">
		<input class="form-control" type="text" name="productimg" placeholder="Product Image">
		<input class="form-control" type="text" name="productprice" placeholder="Product Price">
		<input class="btn btn-success" type="submit" name="productbtn" value="Send">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$productid= $_GET['update'];
			$sql = "SELECT * FROM tblproduct WHERE id = {$productid}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getproductid = $row2['id'];
				$getproductname = $row2['name'];
				$getproductcode = $row2['code'];
				$getproductimg = $row2['image'];
				$getproductprice = $row2['price'];
			
		?>
		<input class="form-control" type="text" name="productid" value="<?php echo $getproductid?>">
		<input class="form-control" type="text" name="productname" value="<?php echo $getproductname?>">
		<input class="form-control" type="text" name="productcode" value="<?php echo $getproductcode?>">
		<input class="form-control" type="text" name="productimg" value="<?php echo $getproductimg?>">
		<input class="form-control" type="text" name="productprice" value="<?php echo $getproductprice?>">
		<input class="btn btn-primary" type="submit" name="productupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['productupdatebtn'])) {
			$updateproductid = $_POST['productid'];
			$updateproductname = $_POST['productname'];
			$updateproductcode = $_POST['productcode'];
			$updateproductimg = $_POST['productimg'];
			$updateproductprice = $_POST['productprice'];
			$sql = "UPDATE tblproduct SET id='$updateproductid', name = '$updateproductname', code = '$updateproductcode', image = '$updateproductimg', price = '$updateproductprice' WHERE id = $productid";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Data Updated Successfully") </script>
		<script type="text/javascript">window.location="producthandler.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered" style="">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Product Code</th>
			<th>Product Image</th>
			<th>Product Price</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM tblproduct";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showproductid = $row['id'];
		$showproductname = $row['name'];
		$showproductcode = $row['code'];
		$showproductimg = $row['image'];
		$showproductprice = $row['price'];
		?>
		<tr>
			<td><?php echo $showproductid ?></td>
			<td><?php echo $showproductname ?></td>
			<td><?php echo $showproductcode ?></td>
			<td><?php echo $showproductimg ?></td>
			<td><?php echo $showproductprice ?></td>
			<td><a href="producthandler.php?update=<?php echo $showproductid;?>" class="btn btn-info">Update</a></td>
			<td><a href="producthandler.php?delete=<?php echo $showproductid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>