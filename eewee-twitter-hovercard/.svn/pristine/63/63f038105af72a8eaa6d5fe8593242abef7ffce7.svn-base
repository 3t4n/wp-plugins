<?php
// VALIDATED FORM
if( !empty( $_POST['btn_save']) ){
	update_option( "eewee_twitterhovercard_val_enabled", $_POST['f_enabled'] );
	update_option( "eewee_twitterhovercard_val_apikey", $_POST['f_apikey'] );
	update_option( "eewee_twitterhovercard_val_version", $_POST['f_version'] );
	
	update_option( "eewee_twitterhovercard_val_expanded", $_POST['f_expanded'] );
	update_option( "eewee_twitterhovercard_val_linkify", $_POST['f_linkify'] );
	update_option( "eewee_twitterhovercard_val_infer", $_POST['f_infer'] );
}
?>

    
<?php 
// FORM
$f = new form_add_twitterHovercard();
$f->getForm();
?>