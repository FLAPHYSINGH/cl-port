﻿<!DOCTYPE html>
<html>
<head>
	<title>BILLING</title>
</head>
<body>
<!-- Page 1 -->
<table cellspacing="0" cellpadding="1" width="760" style="border:none;">
	<tr>
		<td style="width:52%;" class="txt_color center">
                    <span style="line-height:5px;"><h2 style="color: #9A9A99;">BILLING PAGE</h2></span>
		</td>

	</tr>
</table>

<table width="760" style="color: #333332;">
	<tr>
		<td valign="top" class="des-font">Customer Email</td>
		<td valign="top" class="des-font" align="right"><?=$email;?></td>
	</tr>
</table>
<br><br><br>
<div class="table-responsive">
	<table class="table table-line footable" cellspacing="0" data-toggle-column="last">
		<thead>
		<tr>
			<th class="text-left">Product Id</th>
			<th class="text-left">Unit Price</th>
			<th class="text-left">Quantity</th>
			<th class="text-left">Purchase Price</th>
			<th class="text-left">Tax</th>
			<th class="text-left">Tax Payable</th>
			<th class="text-left">Total Price</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$totatlprice = $tax = $t = 0;
		foreach($result as $v) {
			$totatlprice = $totatlprice + $v['product_quantity']*($v['price']+$v['tax']);
			$t = $t + $v['product_quantity']*$v['price'];
			$tax = $tax + $v['tax'];
			?>
			<tr>
				<td><?=$v['product_id']?></td>
				<td><?=$v['price']?></td>
				<td><?=$v['product_quantity']?></td>
				<td><?=$v['price']?></td>
				<td><?=$v['tax']?></td>
				<td><?=$v['tax']*$v['product_quantity'];?></td>
				<td><?=$v['price']*$v['product_quantity'] + $v['tax']*$v['product_quantity'];?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<table width="760">
	<tr>
		<td valign="top" class="des-font" align="right">Total Price Without Tax : <?=$t;?></td>
	</tr>
</table>
<table width="760">
	<tr>
		<td valign="top" class="des-font" align="right">Total Tax : <?=$tax;?></td>
	</tr>
</table>
<table width="760">
	<tr>
		<td valign="top" class="des-font" align="right">Net Price Of Parchased Item : <?=$t + $tax;?></td>
	</tr>
</table>
<table width="760">
	<tr>
		<td valign="top" class="des-font" align="right">Rounded Down Value of The Purchased items net price : <?=$t + $tax;?></td>
	</tr>
</table>
<table width="760">
	<tr>
		<td valign="top" class="des-font" align="right">Balance Payable to Customer : <?=$t + $tax;?></td>
	</tr>
</table>
<hr>
<table width="760">
	<tr>
		<td valign="top" class="des-font" align="right">Balance Denomination</td>
	</tr>
</table>
<?php foreach($result as $v) {?>
	<table width="760">
		<tr>
			<td valign="top" class="des-font" align="right"> <?=$v['denomination']?>:   <?=$v['qty_denomination']?> </td>
		</tr>
	</table>
<?php }?>
</body>
</html>
