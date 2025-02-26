	
 <h2>Please confirm recharge details   </h2> 
	<h3> Once proceeds this can not be refunded </h3>
	<table class="table" border="1">
	
	<tr>
	
	<td> Recharge Number /Consumer Number </td>
	
	<td><?php
    echo $recharge_number;
?>  </td>
	
	</tr>
	
	<tr>
	
	<td> Operator </td>
	
	<td><?php
    echo $recharge_operator;
?>  </td>
	
	</tr><tr>
	
	<td>  Amount </td>
	
	<td><?php
    echo $recharge_amount;
?> INR  </td>
	
	</tr>
	
	
	
	
	
 
 
	</table> 
	
	<?php 
	
	global $woocommerce;
$checkout_url = $woocommerce->cart->get_checkout_url();

?>
	
	<a href="<?php echo $checkout_url; ?>" > <h1>Please click here and complete the payment.</h1> </a>
	
	
 

