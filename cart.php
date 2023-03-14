<?php
session_start();
require_once("dbcontroller.php");
require_once("db.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
<link rel="icon" href="icon.png">
<link href="style.css" type="text/css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</HEAD>
<BODY>
	<header>
		<img height="100px" width="200px" class="logo" src="logo.jpg">
		<img class='rounded-circle'height="50px" width="50px" class="logo" style="margin-bottom: 20px;" src="logo8.png">
	
	<nav>
		<div class="navbar">
			<ul>
			    <?php
			    if(isset($_SESSION['useruid']))
			    {
			    	$var = $_SESSION['useruid'];
			    	$sql = mysqli_query($conn,"SELECT usersImage FROM users where usersUid = '$var';");
			    	$row = mysqli_fetch_assoc($sql);
			    	$var2 =$row['usersImage'];

			    	
			    	echo "<li><a href='index.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'> Home</a></li>";
			    	echo "<li><a href='profile.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Profile-Page</a></li>";
			    	echo " <li><a href='logout.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Logout</a></li>";
			    	echo "<img class='rounded-circle'height= 30 width =30 src='images/$var2'>";
			    	echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
			    }
			    else
			    {
			    	echo "<li><a href='home.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'> Home</a></li>";
			    	echo "<li><a href='signup.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Signup</a></li>";
			    	echo " <li><a href='login.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Login</a></li>";
			    }
			    ?>
		    </ul>
		</div>
		
	</nav>
	</header>

<div id="shopping-cart">
<div class="txt-heading"><h3>Medicine Cart</h3>
<a class="btn btn-primary" href="orderhistory.php" role="button" style="float: right; margin-top: -35px;">My Orders</a>
</div>
<h6 style="color: green;">Call us before ordering to know about stock</h6>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "৳ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "৳ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><?php echo "৳ ".number_format($total_price, 2); ?></td>
<td></td>
</tr>
</tbody>
</table>
<form action="cart.php" method="post">
	<button type="submit" name="purchase" value="" class="btn btn-primary" style="float:right"> Purchase</button>	
 </form>
 <?php
if(isset($_POST['purchase']))
{
	$items = "";
	$op = " x ";

	foreach ($_SESSION["cart_item"] as $item){
		$items .= $item["name"];
		$items .= $op;
		$items .= $item["quantity"];
	
				 //echo $item["name"];
				 //echo "*";
				 //$items= $item["name"];
				 //echo $items;
				 
				
		}
		
			
				if(mysqli_connect_error())
{
    die('Connect Error ('.mysqli_connect_errno().')'
        .mysqli_connect_error());
}
				echo $items;
				$sql = "INSERT INTO orders VALUES('', CURDATE(),CURTIME(),'$_SESSION[useruid]','$items','$total_price','pending');";
		if(mysqli_query($conn,$sql))
		{
			?>
			<script type="text/javascript"> alert("Purchase Completed Successfully") </script>
		<script type="text/javascript">window.location="pdfgenerator.php"</script>
			<?php
			unset($_SESSION["cart_item"]);
			}
			else
			{
				echo "Error".$sql."<br>".$conn->error;
				 //echo $item["code"]; 
			}
				//echo $item["quantity"];
				

}
?>


	
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY name ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img height="150px" width="200px" src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "৳".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction btn btn-primary" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>