<?php
    include 'config/process.php';
	if(!isset($_SESSION['user'])){
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/cart.css">
  	<script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
	<div style="clear:both"></div>
			<br />
			<h3 class="text-center">Order Details</h3>
        <form action="checkout.php" method="post">
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr class="table-success">
                        <th width="20%">User Name</th>
						<th width="30%">Item Name</th>
                        <th width="20%">Item Image</th>
						<th width="10%">Quantity</th>
						<th width="10%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php

					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                                                 

					?>
					<tr>
                        <td><?php echo $_SESSION['user']; ?></td>
						<td><input type="hidden" value="<?php echo $values["item_name"]; ?>" name="name" id=""> <?php echo $values["item_name"]; ?></td>
                        <td><img src="<?php echo $values["item_image"];?>" style="width: 270px; height: 300px"></td>
						<td><input type="hidden" name="quantity" value="<?php echo $values["item_quantity"]; ?>"> <?php echo $values["item_quantity"]; ?></td>
						<td><input type="hidden" name="price" value="<?php echo $values["item_price"]; ?>">$ <?php echo $values["item_price"]; ?></td> 
						<td><input type="hidden" name="quantot" value="<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-danger text-light">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
                           

						}
					?>
					<tr>
						<td colspan="4" align="right" style="font-weight: 900;">Total</td>
						<td colspan="2" align="center" style="font-weight: 900;"><input type="hidden" value="<?php echo number_format($total, 2); ?>" name="total" id="">$ <?php echo number_format($total, 2); ?></td>
						<td><input type="submit" value="Checkout" class="btn btn-primary" style="float: right;" name="buy" id=""></a></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
            
            <a href="index.php" style="float: left;" class="btn btn-success">Continue Shopping</a>
        </form>
	</div>
</body>
</html>