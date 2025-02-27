<?php namespace managerForIcomoon ;  ?>

<form method="post" action="options.php" enctype="multipart/form-data">
	<?php settings_fields( 'managerforicomoon_options' ); ?>
	<h2><?= __( "Settings", 'managerforicomoon'); ?></h2>

	<table class="form-table">
		<?php 

		settings_fields( 'managerforicomoon_options' );
		do_settings_fields( Core::getPluginSlug() ,'managerforicomoon_settings_section_main'); 
		do_settings_fields( Core::getPluginSlug() ,'managerforicomoon_settings_section_icomoon'); 
		
		?>
	</table>
	<?php submit_button(); ?>
</form> 

<?php

