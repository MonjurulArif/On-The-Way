<?php
include_once 'header.php';
require_once 'db.php';
?>
<div class="editbox">
<br><h2 style="margin-left: 90px; margin-top: 70px; color: white;">Change Profile Picture</h2><br>
<?php
$suid = $_SESSION['useruid'];
?>
<div class="profile_info">
	<span style="text-align: center; margin-left: 18px;"> Welcome,</span>
	<h4> <?php echo $_SESSION['useruid'];?></h4>
</div><br>
<form class="editform"action="" method="post" enctype="multipart/form-data">
	<label><h4 style="color: white"><b>Profile Picture</b></h4></label>
	<input class="form-control"type="file" name="file"><br>
	<button class="btn btn-success" style="float: center; margin-left: 110px;   width: 70px;" name="submit2" type="submit">save
		</button>

</form>
</div>
<?php
if(isset($_POST['submit2']))
{
	$suid2 = $_SESSION['useruid'];
	move_uploaded_file($_FILES['file']['tmp_name'], "images/".$_FILES['file']['name']);
	$pic = $_FILES['file']['name'];
	$sql2 = mysqli_query($conn,"UPDATE admin SET adminsImage='$pic' where adminsAid = '$suid2';");
		?>
		<script type="text/javascript"> alert("Profile Picture Changed Successfully") </script>
		<script type="text/javascript">window.location="profile.php"</script>
		<?php
}
?>
<div class="profile-footer">
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
