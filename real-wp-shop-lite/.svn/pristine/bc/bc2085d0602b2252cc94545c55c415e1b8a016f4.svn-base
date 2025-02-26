<?php

if ( isset($_POST['submit']) ) { 
    $nonce = $_REQUEST['_wpnonce'];
    if (! wp_verify_nonce($nonce, 'vkrwps-map' ) ) {
        die('security error');
    }

    $sn = $_POST['sn'];

    $mem = $_POST['mem'];


    $sym = $_POST['sym'];

    $cartdc = $_POST['cartdc'];

    $codc = $_POST['codc'];

    $cd = $_POST['cd'];

    $cpn = $_POST['cpn'];
    $cpn = stripslashes($cpn);

    $ppk = $_POST['ppk'];

    $mon = $_POST['mon'];


    $pdo = $_POST['pdo'];

    $symba = $_POST['symba'];

    $oid = $_POST['oid'];

    $paging = $_POST['paging'];

    $orders_paging = $_POST['orders_paging'];


    $aoef = $_POST['aoef'];

    $ppe = $_POST['ppe'];

    $nltc = $_POST['nltc'];

    $nlbc = $_POST['nlbc'];

    $nltextc = $_POST['nltextc'];

    update_option( 'vkrwps_mem', $mem );    
    update_option('vkrwps_currency', $sym );
    update_option( 'vkrwps_cart_div', $cartdc );
    update_option( 'vkrwps_co_div', $codc );
    update_option( 'vkrwps_cart_display', $cd );
    update_option( 'vkrwps_checkout_page', $cpn );
    update_option( 'vkrwps_sppk', $ppk );
    update_option( 'vkrwps_pdo', $pdo ); 
    update_option( 'vkrwps_symba', $symba );
    update_option( 'vkrwps_oid', $oid );
    update_option( 'vkrwps_paging', $paging );
    update_option( 'vkrwps_shopname', $sn );   
    update_option( 'vkrwps_aoef', $aoef );
    update_option( 'vkrwps_orders_paging', $orders_paging ); 
    update_option( 'vkrwps_ppemail', $ppe );   
    update_option( 'vkrwps_nltc', $nltc );                     
    update_option( 'vkrwps_nlbc', $nlbc );  
    update_option( 'vkrwps_nltextc', $nltextc );
    update_option( 'vkrwps_mon', $mon );

    echo '<div class=msg><p>Update successfull!</p></div>';       

}

$mem            = get_option( 'vkrwps_mem' );
$sym 			= get_option( 'vkrwps_currency' );
$cartdc 		= get_option( 'vkrwps_cart_div' );
$codc 			= get_option( 'vkrwps_co_div' );
$cart_display 	= get_option( 'vkrwps_cart_display' );
$cpn 			= get_option( 'vkrwps_checkout_page' );
$ct 			= get_option( 'vkrwps_checkout_text' );
$ecs 			= get_option( 'vkrwps_empty_cart_s' );
$ppk 			= get_option( 'vkrwps_sppk' );
$pdo            = get_option( 'vkrwps_pdo' );
$symba 			= get_option( 'vkrwps_symba' );
$oid 			= get_option( 'vkrwps_oid' );
$paging 		= get_option( 'vkrwps_paging' );
$sn             = get_option( 'vkrwps_shopname' );
$aoef           = get_option( 'vkrwps_aoef' ); 
$orders_paging  = get_option( 'vkrwps_orders_paging' );
$ppe            = get_option('vkrwps_ppemail');
$nltc           = get_option('vkrwps_nltc');
$nlbc           = get_option('vkrwps_nlbc');
$nltextc        = get_option('vkrwps_nltextc');
$mon            = get_option('vkrwps_mon');          

echo '<div class=wrap style="position:relative;"><h2>Main Real WP Shop Admin Page</h2>';

?>

<form action="" method="post" id="vkrpsp-config">

<div class="proinfo">
    For a better, more powerful e-commerce solution check out<br>
    <strong>Real WP Shop Pro<strong>
    <br>
    <a href="http://jultranet.com/wp/realwpshop" target="_blank">Go to RWPS Pro Plugin Site</a>
    <br>
    <a href="http://jultranet.com/wp/demorwpspro" target="_blank">Go to RWPS Pro DEMO</a>
    <br>

</div> <!-- end .proinfo -->

<div class="docslink">
    <a href="http://jultranet.com/wp/rwpslitedocs/index.html" target="_blank">RWPS LITE DOCUMENTATION</a>
</div> <!-- /.docslink -->


<table class="form-table widefat">
<?php wp_nonce_field('vkrwps-map'); ?>

	<thead><tr><th colspan="2" style="padding-left:10px;">Mandatory Settings</th></tr></thead>

    <tr>
        <td td style="width:300px;">
             <label>Shop Name:</label>
        </td>
        <td>
            <input type="text" name="sn" id="sn" class="regular-text" value="<?php echo $sn; ?>">
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>Shop Email:</label>
        </td>
        <td>
            <input type="text" name="mem" id="mem" class="regular-text" value="<?php echo $mem; ?>">
        </td>
    </tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Currency symbol/text:</label>
	    </td>
	    <td>
	        <input type="text" name="sym" id="sym" class="regular-text" value="<?php echo $sym; ?>">
	    </td>
	</tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Cart div class:</label>
	    </td>
	    <td>
	        <input type="text" name="cartdc" id="cartdc" class="regular-text" value="<?php echo $cartdc; ?>">
            &nbsp;&nbsp; for example .myclass
	    </td>
	</tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Main div class:</label>
	    </td>
	    <td>
	        <input type="text" name="codc" id="codc" class="regular-text" value="<?php echo $codc; ?>">
            &nbsp;&nbsp; for example .mainclass
	    </td>
	</tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Your cart display:</label>
	    </td>
	    <td>
	        <input type="radio" name="cd" id="simple" value="simple" <?php if ($cart_display == 'simple') echo 'checked=checked'; ?>>
	    	<label for="simple">Simple</label>
	    	&nbsp;&nbsp;&nbsp;&nbsp;
	        <input type="radio" name="cd" id="full" value="full" <?php if ($cart_display == 'full') echo 'checked=checked'; ?>>
	        <label for="full">Full</label>
	    </td>
	</tr>

    <tr>
        <td td style="width:300px;">
             <label>Max. no. of viewable orders</label>
        </td>
        <td>
            <input type="text" name="mon" id="mon" class="regular-text" value="<?php echo $mon; ?>">
        </td>
    </tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Checkout page name:</label>
	    </td>
	    <td>
	        <input type="text" name="cpn" id="pid" class="regular-text" value="<?php echo $cpn; ?>">
	    </td>
	</tr>
	
	<tr>
	    <td td style="width:300px;">
	         <label>Shipping price per kilo / pound:</label>
	    </td>
	    <td>
	        <input type="text" name="ppk" id="pid" class="regular-text" value="<?php echo $ppk; ?>">
	    </td>
	</tr>

    <tr>
        <td td style="width:300px;">
             <label>Product display order:</label>
        </td>
        <td>
            <input type="radio" name="pdo" id="pdoasc" value="asc" <?php if ($pdo == 'asc') echo 'checked=checked'; ?>>
            <label for="pdoasc">Oldest First</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="pdo" id="pdodesc" value="desc" <?php if ($pdo == 'desc') echo 'checked=checked'; ?>>
            <label for="pdodesc">Newest First</label>
        </td>
    </tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Show currency symbol before or after price?:</label>
	    </td>
	    <td>
	        <input type="radio" name="symba" id="bef" value="before" <?php if ($symba == 'before') echo 'checked=checked'; ?>>
	    	<label for="bef">Before</label>
	    	&nbsp;&nbsp;&nbsp;&nbsp;
	        <input type="radio" name="symba" id="aft" value="after" <?php if ($symba == 'after') echo 'checked=checked'; ?>>
	        <label for="aft">After</label>
	    </td>
	</tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Order ID start number:</label>
	    </td>
	    <td>
	        <input type="text" name="oid" id="oid" class="regular-text" value="<?php echo $oid; ?>">
	    </td>
	</tr>

	<tr>
	    <td td style="width:300px;">
	         <label>Pagination (products):</label>
	    </td>
	    <td>
	        <input type="text" name="paging" id="paging" class="regular-text" value="<?php echo $paging; ?>">
	    </td>
	</tr>

    <tr>
        <td td style="width:300px;">
             <label>Pagination (orders):</label>
        </td>
        <td>
            <input type="text" name="orders_paging" id="orders_paging" class="regular-text" value="<?php echo $orders_paging; ?>">
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>Admin receive notification email?:</label>
        </td>
        <td>
            <input type="radio" name="aoef" id="aoefno" value="no" <?php if ($aoef == 'no') echo 'checked=checked'; ?>>
            <label for="aoefno">No</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="aoef" id="aoefyes" value="yes" <?php if ($aoef == 'yes') echo 'checked=checked'; ?>>
            <label for="aoefyes">Yes</label>
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>Paypal email address:</label>
        </td>
        <td>
            <input type="radio" name="ppe" id="ppereal" value="real" <?php if ($ppe == 'real') echo 'checked=checked'; ?>>
            <label for="ppereal">Real</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="ppe" id="ppetester" value="tester" <?php if ($ppe == 'tester') echo 'checked=checked'; ?>>
            <label for="ppetester">Tester</label>
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>E-mail titles color:</label>
        </td>
        <td>
            <input type="text" name="nltc" id="nltc" class="regular-text" value="<?php echo $nltc; ?>">
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>E-mail bg color:</label>
        </td>
        <td>
            <input type="text" name="nlbc" id="nlbc" class="regular-text" value="<?php echo $nlbc; ?>">
        </td>
    </tr>

    <tr>
        <td td style="width:300px;">
             <label>E-mail text color:</label>
        </td>
        <td>
            <input type="text" name="nltextc" id="nltextc" class="regular-text" value="<?php echo $nltextc; ?>">
        </td>
    </tr>

</table>
<p class="submit"><input type="submit" value="Submit" class="button button-primary" id="submit" name="submit"></p>

</form>

</div> 