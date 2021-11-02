<!DOCTYPE html>
<html lang="en">
<?php
	require_once('connection.php');
?>
<head>
    <meta charset="utf-8">
    <title>stock</title>
</head>

<style type="text/css">
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
.sell-con
{
	width: 50px;
	margin-bottom: 10px;
}
.prod-con{
	margin-left: 20px;
}
</style>

<body>
	<table>
	  <tr>
	    <th>Products</th>
	    <th>Stocks</th>
	    <th>Price</th>
	  </tr>
	  <?php echo ref_table(); ?>
	</table>
	  <?php echo '<h4>Total Sale: '.ref_total().'<h4>'; ?>
	<br>
	<form method="POST" action="index.php">
		<p>Sell Stock</p>
		<div class="prod-con">
			<label>Product A</label>
			<input class="sell-con" type="number" name="PSA" <?php echo 'value="'.$IA.'"'; ?>>
		</div>
		<div class="prod-con">
			<label>Product B</label>
			<input class="sell-con" type="number" name="PSB" <?php echo 'value="'.$IB.'"'; ?>>
		</div>
		<div class="prod-con">
			<label>Product C</label>
			<input class="sell-con" type="number" name="PSC" <?php echo  'value="'.$IC.'"'; ?>>
		</div>
	  <?php echo $compute_error; ?>
		<br>
		<button type="submit" name="sell_confirm">Confirm Sell</button>
	</form>


	<hr>
	<form method="POST" action="update_price.php">
		<p>Change Price</p>
		<div class="prod-con">
			<label>Product A</label>
			<input class="sell-con" type="number" name="PCSA" <?php echo  'value="'.ref_price("Product A") .'"'; ?>>
		</div>
		<div class="prod-con">
			<label>Product B</label>
			<input class="sell-con" type="number" name="PCSB"<?php echo  'value="'.ref_price("Product B").'"'; ?>>
		</div>
		<div class="prod-con">
			<label>Product C</label>
			<input class="sell-con" type="number" name="PCSC" <?php echo  'value="'.ref_price("Product C").'"'; ?>>
		</div>
		<br>
		<button type="submit" name="change_stock_confirm">Confirm Change</button>
	</form>
	<hr>
	<form method="POST" action="update_stock.php">
		<p>Change Stocks</p>
		<div class="prod-con">
			<label>Product A</label>
			<input class="sell-con" type="number" name="PASA" <?php echo  'value="'.ref_stock("Product A") .'"'; ?>>
		</div>
		<div class="prod-con">
			<label>Product B</label>
			<input class="sell-con" type="number" name="PASB" <?php echo  'value="'.ref_stock("Product B") .'"'; ?>>
		</div>
		<div class="prod-con">
			<label>Product C</label>
			<input class="sell-con" type="number" name="PASC" <?php echo  'value="'.ref_stock("Product C") .'"'; ?>>
		</div>
		<br>
		<button type="submit" name="add_stock_confirm">Confirm Stack</button>
	</form>
	<hr>

</body>

</html>