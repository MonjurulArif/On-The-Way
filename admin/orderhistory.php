<?php
include_once 'header.php';
include_once 'db.php';
?>

<br><h2>Order History</h2><br>
<div class="scroll">
<?php
$suid = $_SESSION['useruid'];
$res=mysqli_query($conn,"SELECT * FROM orders where customerID = '$suid' ORDER BY orders.orderID DESC;");
echo "<table class='table table-bordered table-hover  table-dark'>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "Order ID";   echo "</th>";
echo "<th>"; echo "Order Date";   echo "</th>";
echo "<th>"; echo "Order Time";   echo "</th>";
echo "<th>"; echo "Customer ID";   echo "</th>";
echo "<th>"; echo "Order Details";   echo "</th>";
echo "<th>"; echo "Total Price(in Taka)";   echo "</th>";
echo "<th>"; echo "Status";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($res))
 {
	echo "<tr>";
	echo "<td class='bg-success'>"; echo $row['orderId']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['orderDate']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['orderTime']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['customerId']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['orderedItems']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['totalPrice']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['status']; echo "</td>";

	echo "</tr>";
}
echo "</table>";

?>
</div>

</body>
</html>
<div class="history-footer">
		<h3>Email: ontheway7911@gmail.com <br>Contact: +8801787772338,+8801515652762</h3>
</div>
<style type="text/css">
	body{
		background-image: url("medbackground.jpg");
		 height: 937px;
		 width: 1903px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
