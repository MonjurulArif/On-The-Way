<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['userbtn'])) {
	$userfname = $_POST['userfname'];
	$userlname = $_POST['userlname'];
	$usermail = $_POST['usermail'];
	$useruid = $_POST['useruid'];
	$userpwd = $_POST['userpwd'];
	$userimg = $_POST['userimg'];

	$sql = "INSERT INTO users VALUES('','$userfname','$userlname','$usermail','$useruid','$userpwd','$userimg')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Data Added Successfully") </script>
		<script type="text/javascript">window.location="userhandler.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$userid = $_GET['delete'];
	$sql3 = "DELETE FROM users WHERE usersId = {$userid}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Data Deleted Successfully") </script>
		<script type="text/javascript">window.location="userhandler.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="userfname" placeholder="First Name">
		<input class="form-control" type="text" name="userlname" placeholder="Last Name">
		<input class="form-control" type="text" name="usermail" placeholder="User Email">
		<input class="form-control" type="text" name="useruid" placeholder="User's UID">
		<input class="form-control" type="text" name="userpwd" placeholder="User's Password">
		<input class="form-control" type="text" name="userimg" placeholder="User Image">
		<input class="btn btn-success" type="submit" name="userbtn" value="Send">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$userid= $_GET['update'];
			$sql = "SELECT * FROM users WHERE usersId = {$userid}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getuserid = $row2['usersId'];
				$getuserfname = $row2['firstname'];
				$getuserlname = $row2['lastname'];
				$getusermail = $row2['usersEmail'];
				$getuseruid = $row2['usersUid'];
				$getuserpwd = $row2['usersPwd'];
				$getuserimg = $row2['usersImage'];
			
		?>
		<input class="form-control" type="text" name="userid" value="<?php echo $getuserid?>">
		<input class="form-control" type="text" name="userfname" value="<?php echo $getuserfname?>">
		<input class="form-control" type="text" name="userlname" value="<?php echo $getuserlname?>">
		<input class="form-control" type="text" name="usermail" value="<?php echo $getusermail?>">
		<input class="form-control" type="text" name="useruid" value="<?php echo $getuseruid?>">
		<input class="form-control" type="text" name="userpwd" value="<?php echo $getuserpwd?>">
		<input class="form-control" type="text" name="userimg" value="<?php echo $getuserimg?>">
		<input class="btn btn-primary" type="submit" name="userupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['userupdatebtn'])) {
			$updateuserid = $_POST['userid'];
			$updateuserfname = $_POST['userfname'];
			$updateuserlname = $_POST['userlname'];
			$updateusermail = $_POST['usermail'];
			$updateuseruid = $_POST['useruid'];
			$updateuserpwd = $_POST['userpwd'];
			$updateuserimg = $_POST['userimg'];
			$sql = "UPDATE users SET usersId='$updateuserid', firstname = '$updateuserfname', lastname = '$updateuserlname', usersEmail = '$updateusermail',usersUid = '$updateuseruid',usersPwd = '$updateuserpwd',usersImage = '$updateuserimg' WHERE usersId = $userid";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Data Updated Successfully") </script>
		<script type="text/javascript">window.location="userhandler.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered" style="">
		<tr>
			<th>User ID</th>
			<th>User's First Name</th>
			<th>User's last Name</th>
			<th>User's Email</th>
			<th>User's UID</th>
			<th>User's Password</th>
			<th>User's Image</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM users";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showuserid = $row['usersId'];
		$showfirstname = $row['firstname'];
		$showlastname = $row['lastname'];
		$showuseremail = $row['usersEmail'];
		$showuseruid = $row['usersUid'];
		$showuserpwd = $row['usersPwd'];
		$showuserimg = $row['usersImage'];
	
		?>
		<tr>
			<td><?php echo $showuserid ?></td>
			<td><?php echo $showfirstname ?></td>
			<td><?php echo $showlastname ?></td>
			<td><?php echo $showuseremail ?></td>
			<td><?php echo $showuseruid ?></td>
			<td><?php echo $showuserpwd ?></td>
			<td><?php echo $showuserimg ?></td>

			<td><a href="userhandler.php?update=<?php echo $showuserid;?>" class="btn btn-info">Update</a></td>
			<td><a href="userhandler.php?delete=<?php echo $showuserid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>