<?php

function vkrwps_strings_callback() {

	if ( isset($_POST['submit']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-strings' ) ) {
            die('security error');
        }

        $ecs = $_POST['ecs'];

        $ctat = $_POST['ctat'];

        $pricetext = $_POST['pricetext'];

        $sps = $_POST['sps'];

        $scit = $_POST['scit'];

        $cct = $_POST['cct'];


        $atct = $_POST['atct'];

        $pdt = $_POST['pdt'];

        $apa = $_POST['apa'];

        $spt = $_POST['spt'];

        $dpt = $_POST['dpt'];

        $twtas = $_POST['twtas'];     

        $step2t = $_POST['step2t'];
        $btstep1t = $_POST['btstep1t'];
        $step3t = $_POST['step3t'];
        $btstep2t = $_POST['btstep2t'];
        $fco = $_POST['fco'];

        $pat = $_POST['pat'];

        $ppotext = $_POST['ppotext'];

        $ootext = $_POST['ootext'];

        $ooss = $_POST['ooss'];

        $orderconftext = $_POST['orderconftext'];

        $s1tt = $_POST['s1tt'];

        $s2tt = $_POST['s2tt'];        

        $s3tt = $_POST['s3tt'];

        $aes = $_POST['aes'];

        $ces = $_POST['ces'];

        $cps = $_POST['cps'];

	    update_option( 'vkrwps_empty_cart_s', $ecs );
	    update_option( 'vkrwps_cart_total_s', $ctat );
	    update_option( 'vkrwps_pricetext', $pricetext );
	    update_option( 'vkrwps_sps', $sps );
	    update_option( 'vkrwps_sci_s', $scit );
	    update_option( 'vkrwps_clear_cart_s', $cct );
	    update_option( 'vkrwps_addtocart_s', $atct );
	    update_option( 'vkrwps_pdetails_s', $pdt );
	    update_option( 'vkrwps_add_again_p_text', $apa );
	    update_option( 'vkrwps_remove_one_p_text', $spt );
	    update_option( 'vvkrwps_clear_p_s', $dpt );
	    update_option('vkrwps_step2_s', $step2t);
	    update_option('vkrwps_backts1_s', $btstep1t);
	    update_option('vkrwps_step3_s', $step3t);
	    update_option('vkrwps_backts2_s', $btstep2t);
	    update_option('vkrwps_finish_co_s', $fco);
	    update_option('vkrwps_twtas', $twtas);
	    update_option('vkrwps_pat', $pat);
	    update_option('vkrwps_ppotext', $ppotext);
	    update_option('vkrwps_ootext', $ootext);
	    update_option('vkrwps_ooss', $ooss);
	    update_option( 'vkrwps_orderconftext', $orderconftext );
	    update_option('vkrwps_ae_subj', $aes);	
	    update_option('vkrwps_ce_subj', $ces);	
	    update_option('vkrwps_cps', $cps);	
	    update_option('vkrwpspro_s1tt', $s1tt);
	    update_option('vkrwpspro_s2tt', $s2tt);				    		
	    update_option('vkrwpspro_s3tt', $s3tt);			

	    echo '<div class=msg><p>Update successfull!</p></div>'; 	    	 

    } 

	$ecs = get_option( 'vkrwps_empty_cart_s');
	$ctat = get_option( 'vkrwps_cart_total_s');
	$pricetext = get_option( 'vkrwps_pricetext' );
	$sps = get_option( 'vkrwps_sps' );
	$scit = get_option( 'vkrwps_sci_s' );
	$cct = get_option('vkrwps_clear_cart_s');
	$atct = get_option('vkrwps_addtocart_s');
	$pdt = get_option('vkrwps_pdetails_s');
	$apa = get_option('vkrwps_add_again_p_text');
	$spt = get_option('vkrwps_remove_one_p_text');
	$dpt = get_option('vkrwps_clear_p_s');
	$step2t = get_option('vkrwps_step2_s');
	$btstep1t = get_option('vkrwps_backts1_s');
	$step3t = get_option('vkrwps_step3_s');
	$btstep2t = get_option('vkrwps_backts2_s');
	$fco = get_option('vkrwps_finish_co_s');
	$twtas = get_option('vkrwps_twtas');
	$pat = get_option( 'vkrwps_pat' );
	$ppotext = get_option( 'vkrwps_ppotext' );
	$ootext = get_option( 'vkrwps_ootext' );
	$ooss = get_option( 'vkrwps_ooss' );	
	$orderconftext = get_option( 'vkrwps_orderconftext' );
	$aes = get_option( 'vkrwps_ae_subj' );
	$ces = get_option( 'vkrwps_ce_subj' );
	$cps = get_option( 'vkrwps_cps' );
	$s1tt = get_option('vkrwpspro_s1tt');
	$s2tt = get_option('vkrwpspro_s2tt');
	$s3tt = get_option('vkrwpspro_s3tt');

    echo '<div class=wrap><h2>Text Replacement</h2>';
    ?>

    <form action="" method="post" id="vkrpsp-strings">

	<table class="form-table widefat">
	<?php wp_nonce_field('vkrwps-strings'); ?>

		<thead><tr><th colspan="2" style="padding-left:10px;">Random strings</th></tr></thead>

		<tr>
		    <td style="width:300px;">
		        <label for="pid">Empty cart text:</label>
		    </td>
		    <td>
		        <input type="text" name="ecs" id="pid" class="regular-text" value="<?php echo $ecs; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="ctat">Cart total amount text:</label>
		    </td>
		    <td>
		        <input type="text" name="ctat" id="ctat" class="regular-text" value="<?php echo $ctat; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Price text:</label>
		    </td>
		    <td>
		        <input type="text" name="pricetext" id="pricetext" class="regular-text" value="<?php echo $pricetext; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Shipping price text:</label>
		    </td>
		    <td>
		        <input type="text" name="sps" id="sps" class="regular-text" value="<?php echo $sps; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Grand total text:</label>
		    </td>
		    <td>
		        <input type="text" name="twtas" id="sps" class="regular-text" value="<?php echo $twtas; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="scit">Simple cart items text:</label>
		    </td>
		    <td>
		        <input type="text" name="scit" id="scit" class="regular-text" value="<?php echo $scit; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="cct">Clear cart text:</label>
		    </td>
		    <td>
		        <input type="text" name="cct" id="cct" class="regular-text" value="<?php echo $cct; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="atct">Add to cart text:</label>
		    </td>
		    <td>
		        <input type="text" name="atct" id="atct" class="regular-text" value="<?php echo $atct; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="pdt">Product details text:</label>
		    </td>
		    <td>
		        <input type="text" name="pdt" id="pdt" class="regular-text" value="<?php echo $pdt; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="apa">Add same product again text:</label>
		    </td>
		    <td>
		        <input type="text" name="apa" id="apa" class="regular-text" value="<?php echo $apa; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="spt">Subtract a product text:</label>
		    </td>
		    <td>
		        <input type="text" name="spt" id="spt" class="regular-text" value="<?php echo $spt; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="dpt">Delete product text:</label>
		    </td>
		    <td>
		        <input type="text" name="dpt" id="dpt" class="regular-text" value="<?php echo $dpt; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="step2t">Step 2 text:</label>
		    </td>
		    <td>
		        <input type="text" name="step2t" id="step2t" class="regular-text" value="<?php echo $step2t; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="btstep1t">Back to step 1 text:</label>
		    </td>
		    <td>
		        <input type="text" name="btstep1t" id="btstep1t" class="regular-text" value="<?php echo $btstep1t; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="step3t">Step 3 text:</label>
		    </td>
		    <td>
		        <input type="text" name="step3t" id="step3t" class="regular-text" value="<?php echo $step3t; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="btstep2t">Back to step 2 text:</label>
		    </td>
		    <td>
		        <input type="text" name="btstep2t" id="btstep2t" class="regular-text" value="<?php echo $btstep2t; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label for="fco">Finish checkout text:</label>
		    </td>
		    <td>
		        <input type="text" name="fco" id="fco" class="regular-text" value="<?php echo $fco; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Product added text (ajax):</label>
		    </td>
		    <td>
		        <input type="text" name="pat" id="pat" class="regular-text" value="<?php echo $pat; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Out of stock text:</label>
		    </td>
		    <td>
		        <input type="text" name="ooss" id="ooss" class="regular-text" value="<?php echo $ooss; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Paypal order submission thank you text:</label>
		    </td>
		    <td>
		        <textarea name="ppotext" id="ppotext" style="border: 1px solid #ddd; color: #333;width:350px;height:70px;"><?php echo $ppotext; ?></textarea>
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Other order submission thank you text:</label>
		    </td>
		    <td>
		        <textarea name="ootext" id="ootext" style="border: 1px solid #ddd; color: #333;width:350px;height:70px;"><?php echo $ootext; ?></textarea>
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Order confirmation email top text:</label>
		    </td>
		    <td>
		        <textarea name="orderconftext" id="orderconftext" style="border: 1px solid #ddd; color: #333;width:350px;height:70px;"><?php echo $orderconftext; ?></textarea>
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Step 1 Checkout Top Text:</label>
		    </td>
		    <td>
		        <textarea name="s1tt" id="s1tt" style="border: 1px solid #ddd; color: #333;width:350px;height:70px;"><?php echo $s1tt; ?></textarea>
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Step 2 Checkout Top Text:</label>
		    </td>
		    <td>
		        <textarea name="s2tt" id="s2tt" style="border: 1px solid #ddd; color: #333;width:350px;height:70px;"><?php echo $s2tt; ?></textarea>
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Step 3 Checkout Top Text:</label>
		    </td>
		    <td>
		        <textarea name="s3tt" id="s3tt" style="border: 1px solid #ddd; color: #333;width:350px;height:70px;"><?php echo $s3tt; ?></textarea>
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Admin email subject:</label>
		    </td>
		    <td>
		        <input type="text" name="aes" id="aes" class="regular-text" value="<?php echo $aes; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Customer email subject:</label>
		    </td>
		    <td>
		        <input type="text" name="ces" id="ces" class="regular-text" value="<?php echo $ces; ?>">
		    </td>
		</tr>

		<tr>
		    <td style="width:300px;">
		        <label>Customer email subject (status update):</label>
		    </td>
		    <td>
		        <input type="text" name="cps" id="cps" class="regular-text" value="<?php echo $cps; ?>">
		    </td>
		</tr>

	</table>
	<p class="submit"><input type="submit" value="Submit" class="button button-primary" id="submit" name="submit"></p>

	</form>
	</div> 
    <?php
} 

?>