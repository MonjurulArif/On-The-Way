<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['orderbtn'])) {
	$orderdate = $_POST['orderdate'];
	$ordertime = $_POST['ordertime'];
	$customerid = $_POST['customerid'];
	$ordereditems = $_POST['ordereditems'];
	$totalprice = $_POST['totalprice'];
	$status = $_POST['status'];

	$sql = "INSERT INTO orders VALUES('','$orderdate','$ordertime','$customerid','$ordereditems','$totalprice','$status')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Data Added Successfully") </script>
		<script type="text/javascript">window.location="ordermanagement.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$orderid = $_GET['delete'];
	$sql3 = "DELETE FROM orders WHERE orderId = {$orderid}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Data Deleted Successfully") </script>
		<script type="text/javascript">window.location="ordermanagement.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="orderdate" placeholder="Order Date">
		<input class="form-control" type="text" name="ordertime" placeholder="Order Time">
		<input class="form-control" type="text" name="customerid" placeholder="Customer ID">
		<input class="form-control" type="text" name="ordereditems" placeholder="Ordered Items">
		<input class="form-control" type="text" name="totalprice" placeholder="Total Price">
		<input class="form-control" type="text" name="status" placeholder="Satus">
		<input class="btn btn-success" type="submit" name="orderbtn" value="Send">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$orderid= $_GET['update'];
			$sql = "SELECT * FROM orders WHERE orderId = {$orderid}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getorderid = $row2['orderId'];
				$getorderdate = $row2['orderDate'];
				$getordertime = $row2['orderTime'];
				$getcustomerid = $row2['customerId'];
				$getordereditems = $row2['orderedItems'];
				$gettotalprice = $row2['totalPrice'];
				$getstatus = $row2['status'];
			
		?>
		<input class="form-control" type="text" name="orderid" value="<?php echo $getorderid?>">
		<input class="form-control" type="text" name="orderdate" value="<?php echo $getorderdate?>">
		<input class="form-control" type="text" name="ordertime" value="<?php echo $getordertime?>">
		<input class="form-control" type="text" name="customerid" value="<?php echo $getcustomerid?>">
		<input class="form-control" type="text" name="ordereditems" value="<?php echo $getordereditems?>">
		<input class="form-control" type="text" name="totalprice" value="<?php echo $gettotalprice?>">
		<input class="form-control" type="text" name="status" value="<?php echo $getstatus?>">
		<input class="btn btn-primary" type="submit" name="orderupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['orderupdatebtn'])) {
			$updateorderid = $_POST['orderid'];
			$updateorderdate = $_POST['orderdate'];
			$updateordertime = $_POST['ordertime'];
			$updatecustomerid = $_POST['customerid'];
			$updateordereditems = $_POST['ordereditems'];
			$updatetotalprice = $_POST['totalprice'];
			$updatestatus = $_POST['status'];
			$sql = "UPDATE orders SET orderId='$updateorderid', orderDate = '$updateorderdate', orderTime = '$updateordertime', customerId = '$updatecustomerid',orderedItems = '$updateordereditems',totalPrice = '$updatetotalprice',status = '$updatestatus' WHERE orderId = $orderid";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Data Updated Successfully") </script>
		<script type="text/javascript">window.location="ordermanagement.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered" style="">
		<tr>
			<th>Order ID</th>
			<th>Order Date</th>
			<th>Order Time</th>
			<th>Customer ID</th>
			<th>Ordered Items</th>
			<th>Total Price</th>
			<th>Status</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM orders";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showorderid = $row['orderId'];
		$showorderdate = $row['orderDate'];
		$showordertime = $row['orderTime'];
		$showcustomerid = $row['customerId'];
		$showordereditems = $row['orderedItems'];
		$showtotalprice = $row['totalPrice'];
		$showstatus = $row['status'];
	
		?>
		<tr>
			<td><?php echo $showorderid ?></td>
			<td><?php echo $showorderdate ?></td>
			<td><?php echo $showordertime ?></td>
			<td><?php echo $showcustomerid ?></td>
			<td><?php echo $showordereditems ?></td>
			<td><?php echo $showtotalprice ?></td>
			<td><?php echo $showstatus ?></td>

			<td><a href="ordermanagement.php?update=<?php echo $showorderid;?>" class="btn btn-info">Update</a></td>
			<td><a href="ordermanagement.php?delete=<?php echo $showorderid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>