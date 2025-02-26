<?php
$source = isset( $_GET['source'] ) ? sanitize_text_field( $_GET['source'] ) : 'dashboard';
$components = auto_aliexpress_get_components($source);
?>

<div id="dashboard" class="aliexpress-box-tab active" data-nav="dashboard" >

	<div class="aliexpress-box-header">
		<h2 class="aliexpress-box-title"><?php esc_html_e( 'General', Auto_Aliexpress::DOMAIN ); ?></h2>
	</div>

    <div class="aliexpress-box-body">
            <?php
				foreach ($components as $key => $value) {
					$this->template($value, $settings);
			    }
 			?>
   </div>


</div>
