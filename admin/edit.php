<?php
include_once 'header.php';
require_once 'db.php';
?>
<div class="editbox">
<br><h2 style="margin-left: 150px; color: white;">Edit Profile</h2><br>
<?php
$suid = $_SESSION['useruid'];
$sql = mysqli_query($conn,"SELECT adminsFirstname,adminsLastname,adminsEmail FROM admin where adminsAid = '$suid';");
$result = mysqli_fetch_assoc($sql);
	$first=$result['adminsFirstname'];
	$last=$result['adminsLastname'];
	$email=$result['adminsEmail'];
?>
<div class="profile_info">
	<span style="text-align: center; margin-left: -5px;"> Welcome,</span>
	<h4 style="margin-left: -20px;"> <?php echo $_SESSION['useruid'];?></h4>
</div><br>
<form class="editform"action="" method="post" enctype="multipart/form-data">
	<a class="btn btn-primary" style="text-decoration: none; height: 35px; width: 200px; background-color: green; color: white; margin-left: 45px;" href='changedp.php'> Change Profile Picture</a><br><br>
	<label><h4 style="color: white"><b>First Name</b></h4></label>
	<input class="form-control"type="text" name="fname" value="<?php echo $first?>"><br>
	<label><h4 style="color: white"><b>Last Name</b></h4></label>
	<input class="form-control"type="text" name="lname" value="<?php echo $last?>"><br>
	<label><h4 style="color: white"><b>Email</b></h4></label>
	<input class="form-control"type="text" name="uemail" value="<?php echo $email?>"><br>
	<button class="btn btn-success" style="float: center; margin-left: 110px;   width: 70px;" name="submit2" type="submit">save
		</button>

</form>
</div>
<?php
if(isset($_POST['submit2']))
{
	$suid2 = $_SESSION['useruid'];
	$first2=$_POST['fname'];
	$last2=$_POST['lname'];
	$email2=$_POST['uemail'];
	$sql2 = mysqli_query($conn,"UPDATE admin SET adminsFirstname='$first2',adminsLastname='$last2',adminsEmail='$email2' where adminsAid = '$suid2';");
		?>
		<script type="text/javascript"> alert("Profile Updated Successfully") </script>
		<script type="text/javascript">window.location="profile.php"</script>
		<?php
}
?>
<div class="editform-footer">
		<h3>Email: ontheway7911@gmail.com <br>Contact: +8801787772338,+8801515652762</h3>
</div>
<style type="text/css">
	body{
		background-image: url("background2.jpg");
		 height: 900px;
		 width: 1900px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
