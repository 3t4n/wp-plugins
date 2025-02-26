<?php
add_action( 'admin_menu', 'hexasmal_cp_menu' );

function hexasmal_cp_menu() {
	add_options_page( 
		'Réglages Hexasmal',
		'Codes Postaux',
		'manage_options',
		'hexasmal_cp.php',
		'hexasmal_cp_admin_page'
	);
}


function hexasmal_cp_admin_page() {
	


	if(isset($_POST['action']) && $_POST['action'] == 'update') {
		if(!wp_verify_nonce($_POST['hexasmal_settings_nonce'],'update')) {
			die('Not permitted');
			return false;
		}

		foreach(array('hexasmal_add_on_WC_order_billing','hexasmal_switch_address_fields','hexasmal_add_on_WC_order_shipping','hexasmal_add_on_WC_cart') as $option)
		if(isset($_POST[$option]) && $_POST[$option] == 'on') {
			update_option($option,1);
		}
		else {
			update_option( $option,0);
		}
	}
?>

	<div class="wrap">
		<h1>Réglages La Poste Hexasmal</h1>

<form method="post" action="">
    <?php settings_fields( 'hexasmal-settings' ); ?>
    <?php do_settings_sections( 'hexasmal-settings' ); ?>
    <?php wp_nonce_field( 'update', 'hexasmal_settings_nonce' );?>
    <table class="form-table">

    	
    	<tr valign="top">
        <th scope="row"><?php _e('Inverser l\'ordre des champs (code postal avant la ville)','hexasmal_cp'); ?></th>
        <td><input type="checkbox" name="hexasmal_switch_address_fields" <?php if( get_option('hexasmal_switch_address_fields') ) echo 'checked="checked"'; ?> /></td>
        </tr>

        <?php if(class_exists('WC_Order')) : ?>
        <tr valign="top">
        <th scope="row">Ajouter la vérification sur le calculateur de livraison (panier)</th>
        <td><input type="checkbox" name="hexasmal_add_on_WC_cart" <?php if( get_option('hexasmal_add_on_WC_cart') ) echo 'checked="checked"'; ?> /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Ajouter la vérification sur l'adresse de livraison</th>
        <td><input type="checkbox" name="hexasmal_add_on_WC_order_shipping" <?php if( get_option('hexasmal_add_on_WC_order_shipping') ) echo 'checked="checked"'; ?> /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Ajouter la vérification sur l'adresse de facturation</th>
        <td><input type="checkbox" name="hexasmal_add_on_WC_order_billing" <?php if( get_option('hexasmal_add_on_WC_order_billing') ) echo 'checked="checked"'; ?> /></td>
        </tr>
        

    	<?php endif; ?>
         
    </table>
    <p class="description">
    	Pour l'utiliser hors de WooCommerce, utiliser le shortcode :<br />
<pre>[hexasmal_verification uniqid="#&lt;id du formulaire&gt;" add_styles="&lt;0/1&gt;" code_postal_name="&lt;nom du champ du code postal&gt;" commune_name="&lt;nom du champ de la commune&gt;"]</pre>
</p>
    
    <?php submit_button(); ?>

</form>		
	</div>

		<?php

}