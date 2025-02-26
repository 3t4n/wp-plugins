<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', 'fil_fil_admin_menu' );

function fil_fil_admin_menu() {
	
	add_dashboard_page( null, null, 'read', 'fil-disabled-page', 'fil_fil_page' );
	remove_submenu_page( 'index.php', 'fil-disabled-page' );
	
} 
	

function fil_fil_page() {
	
	ob_start(); ?>
    
		<style type="text/css" media="screen">
		/*<![CDATA[*/

		.about-wrap .feature-section {
			margin-top: 50px;
			padding: 30px;
			background: #fff6ef;
			border: 1px dashed #c2c2c2;
			text-align: center;
			width: 100%;
		}
		.about-wrap .dashicons-warning {
			font-size: 5em;
			margin-bottom: 20px;
			color: #ff4848;
		}
		.about-wrap .feature-section p {
			max-width: 100%;
			font-size: 18px;
			text-align: center;
		}
		.about-wrap .feature-section h4 {
			padding-bottom: 10px;
			display:inline-block;
			border-bottom: 1px dashed #CCC;
		}
		/*]]>*/
		</style>
 
	<div class="wrap about-wrap filwelcome">
    
          <div class="feature-section">
          <span class="dashicons dashicons-warning"></span>
          <h2><?php _e( 'Instagram Feed plugin temporarily disabled', 'feed-instagram-lite' ); ?></h2>
              <p><span style="color:#fc0e0e">We are really sorry</span>, Instagram decided to make some changes without telling anyone today, you can read more about it here : <a href="https://www.instagram.com/developer/changelog/" target="_blank">https://www.instagram.com/developer/changelog/</a></p>
              <p>We are still in development to adapt with the new endpoints and will update when it is done, please be patient.</p>
          </div>   
                
	</div>

<!-- Content End -->
	<?php
	echo ob_get_clean();
}
