<?php
//As woo owl option page
function as_woo_owl_admin_menu(){
	add_menu_page('As woo owl options','As Short code', 'manage_options', 'as_options', 'as_woo_owl_display_menu');

    add_submenu_page( 
        'as_options',   //or 'options.php'
        'As Woo Option',
        'As option',
        'manage_options',
        'as_woo_options',
        'as_woo_owl_option_callback'
    );

}
add_action('admin_menu','as_woo_owl_admin_menu');

function as_woo_owl_display_menu(){?>
<div class="wrap" style="position:relative;overflow: hidden;">
    <?php require_once( as_woo_owl_path . '/inc/anu_ads.php' ); ?>
	<?php require_once( as_woo_owl_path . '/inc/as_woo_owl_opt/as_woo_owl_opt_interface.php' ); ?>
</div><?php
}

function as_woo_owl_option_callback(){
?>
	<div class="wrap" style="position:relative;overflow: hidden;">
	    <?php require_once( as_woo_owl_path . '/inc/anu_ads.php' ); ?>
		<?php require_once( as_woo_owl_path . '/inc/as_woo_owl_opt/as_woo_owl_setting.php' ); ?>
	</div>
<?php
}