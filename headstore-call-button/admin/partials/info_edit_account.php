<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 
?>

<div id="message-info-add-account" class="notice hs-notice">

		<?php _e( 'To edit your account or add and delete profiles, please go to', $this->plugin_name); ?> <a href="https://<?php echo hs_backend::domain; ?>/" class="hs-link" target="_blank"><?php _e( 'the PAYCALL website', $this->plugin_name); ?></a> <br>
		<?php _e( 'Important: If you want to change the email address or password of your PAYCALL account, it must first be changed on', $this->plugin_name); ?> <a href="https://<?php echo hs_backend::domain; ?>/" class="hs-link" target="_blank"><?php _e( 'paycall.headstore.com', $this->plugin_name); ?></a> <?php _e( 'and then updated below.', $this->plugin_name); ?> 
		 
</div>
