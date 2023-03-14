<?php
include_once 'header.php';
include_once 'db.php';
require('vendor/autoload.php');
$var = $_SESSION['useruid'];
$res=mysqli_query($conn,"SELECT * FROM orders WHERE customerId='$var' and orderId = (SELECT MAX(orderId) FROM orders);");
if(mysqli_num_rows($res)>0){
	$html='<style></style><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"><table class="table table-stripped">';
		$html.='<tr><td>Order ID</td><td>Order Date</td><td>Order Time</td><td>Customer ID</td><td><center>Ordered Items</center></td><td>Total Price</td><td>Status</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr><td>'.$row['orderId'].'</td><td>'.$row['orderDate'].'</td><td>'.$row['orderTime'].'</td><td>'.$row['customerId'].'</td><td>'.$row['orderedItems'].'</td><td>'.$row['totalPrice'].'</td><td>'.$row['status'].'</td></tr>';
		}
	$html.='</table>';
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