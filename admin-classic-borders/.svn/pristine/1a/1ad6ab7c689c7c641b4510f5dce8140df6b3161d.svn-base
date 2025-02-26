<?php
function admin_classic_borders_optionspage() {  
	add_theme_page(  
		'Admin Classic Borders',
		'Admin',
		'administrator',
		'admin_classic_borders_optionspage',
		'admin_classic_borders_optionspage_callback'
	);
}
add_action('admin_menu', 'admin_classic_borders_optionspage'); 

function admin_classic_borders_optionspage_callback() {

	$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'acb_options_main';

?>

	<div class="wrap">

		<div id="icon-themes" class="icon32"></div>
		<h2>Admin Classic Borders Options</h2>

		<form method="post" enctype="multipart/form-data" action="options.php">

		<h2 class="nav-tab-wrapper">

			<a href="?page=admin_classic_borders_optionspage&tab=acb_options_main" class="nav-tab<?php echo $active_tab == 'acb_options_main' ? ' nav-tab-active' : ''; ?>">Main Options (Borders)</a>

			<a href="?page=admin_classic_borders_optionspage&tab=acb_options_extra" class="nav-tab<?php echo $active_tab == 'acb_options_extra' ? ' nav-tab-active' : ''; ?>">Extra Misc. Options</a> 

		</h2>

		<?php


        	if( $active_tab == 'acb_options_main' ) {  
				settings_fields(str_replace('options','group',$active_tab));
				do_settings_sections($active_tab);
			}
			else {
				settings_fields(str_replace('options','group',$active_tab));
				do_settings_sections($active_tab);
			}
			submit_button();

		?>

		</form>

	</div>
<?php
}