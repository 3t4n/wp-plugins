<?php
require_once("data/dd-data.php");;
require_once("mod/dd-header.php");
require_once("mod/dd-properties.php");
require_once("mod/dd-color-picker-ui.php");
$header=new DDSOO_mod_header();
$properties=new DDSOO_mod_properties();
$colorPickerUI=new DDSOO_mod_color_picker_ui();

?>

<div id="DDSOO_settings" class="wrap _dd_settings __ddsoo_styles">
	<div id="icon-themes" class="icon32"></div>	
	<div class="-notifications"><h2></h2> 	</div>
	<?php echo $header->render(); ?>  
	<div class="-main">
		<div class="-left -settings">	
			<?php echo $properties->left(); ?>  
			<!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
			<?php 
				//settings_errors(); 
				settings_errors( 'doordash-notices' );
			?>  
			<form method="POST" action="options.php" class="DDSOO_properties">  
				<?php 					
					settings_fields( 'DDSOO_general_settings' );
					do_settings_sections( 'DDSOO_general_settings' ); 
				?>    
				<?php echo $properties->advanced_settings(); ?>       
				<?php submit_button("Save and Publish"); ?>  
			</form> 
		</div>
		<div class="-right">
			<?php echo $properties->right(); ?>  
		</div>
	</div>
	<?php echo $colorPickerUI->render(); ?>  
</div>