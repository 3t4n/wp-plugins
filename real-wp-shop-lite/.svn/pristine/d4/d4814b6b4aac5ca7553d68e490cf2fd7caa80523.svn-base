<?php

function vkrwps_delete_products_callback() {

	if ( isset($_POST['del-prod']) ) {
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'vkrwps-delprod' ) ) {
            die('security error');
        }

      	$dpid = $_POST['dp'];

      	if ( $dpid == 'noval' ) { 
        	echo '<div class="msg error"><p>Please choose a product to delete</p></div>';

        } else {
        	global $wpdb;
        	$wpdb->delete( 'wp_vkrwps_products', array( 'ID' => $dpid ) );

            $img = WP_CONTENT_DIR . '/rwpsliteuploads/'.$dpid.'.jpg';
            unlink($img);

        	echo '<div class="msg"><p>The product has been deleted.</p></div>';
        }

	} 

	echo '<div class=wrap><h2>Delete Products</h2></div>';
	?>

	<form action="" method="post" id="vkrpsp-config">
    <table class="form-table widefat delp">
    <?php wp_nonce_field('vkrwps-delprod'); ?>

    <thead><tr><th colspan="2" style="padding-left:10px;">Choose a product to delete</th></tr></thead>

    <tr>
    	<td style="width:300px;">
    		<label>Choose a Product</label>
    	</td>
    	<td>
    	<select name="dp" id="dp" style="width:350px;">
        	<option value="noval"></option>
			<?php
			
			global $wpdb;

			$get_prods = $wpdb->get_results( 
			"
			SELECT id, name
			FROM wp_vkrwps_products
			"
			);

			foreach ($get_prods as $key => $value) {
				echo '<option value='.$value->id.'>'.$value->name.'</option>';
			}
			
			?>
	    </select>
		</td>
    </tr>

    </table>
    <p class="submit"><input type="submit" value="Delete Product" class="button button-primary delprod" id="del-prod" name="del-prod"></p>
    </form>

<?php
} 

?>
