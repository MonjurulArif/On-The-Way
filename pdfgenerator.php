<?php
include_once 'header.php';
include_once 'db.php';
require('vendor/autoload.php');
$var = $_SESSION['useruid'];
$res=mysqli_query($conn,"SELECT * FROM orders WHERE customerId='$var' and orderId = (SELECT MAX(orderId) FROM orders);");
if(mysqli_num_rows($res)>0){
	$html='<style>table, th, td {
  border: 1px solid black;
}
h1{padding: 5%; padding-left: 250px;color: green;}
h3{padding: 5%;}

table {

  width: 100%;
}</style><h1>ON THE WAY</h1><br><h2>Cash Memo</h2><br><table >';
		$html.='<tr><td>Order ID</td><td>Order Date</td><td>Order Time</td><td>Customer ID</td><td><center>Ordered Items</center></td><td>Total Price</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr><td>'.$row['orderId'].'</td><td>'.$row['orderDate'].'</td><td>'.$row['orderTime'].'</td><td>'.$row['customerId'].'</td><td>'.$row['orderedItems'].'</td><td>'.$row['totalPrice'].'</td></tr>';
		}
	$html.='</table><br><h3>Thanks For purchasing from us. Come again!</h3>';
}
$html = iconv("UTF-8", "UTF-8//IGNORE", $html);
$body = ob_get_clean();
$mpdf=new \Mpdf\Mpdf();
$mpdf->debug = true;
$mpdf->WriteHTML($html);
$file='memo.pdf';
$mpdf->output($file,'D');
//D
//I
//F
//S
?>