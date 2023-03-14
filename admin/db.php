<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ontheway";
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}