<?php

function surbma_gpga_cookies_page() {
?>
<div class="surbma-admin cookie-page">
	<?php surbma_gpga_admin_header( __( 'Cookie Scan' ) ); ?>
	<div class="wrap">
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-1-1">
					<div class="uk-card uk-card-small uk-card-default uk-card-hover">
						<div class="uk-card-header uk-background-muted">
							<h3 class="uk-card-title"><?php _e( 'Cookie Scan', 'surbma-gdpr-proof-google-analytics' ); ?> <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #cookies"></a></h3>
					    </div>
		            	<div id="cookies" class="uk-card-body">
                            <p><?php _e( 'This page shows all the Cookies, that the browser already saved. This scan is a simple request from the PHP <code>$_COOKIE</code> superglobal. This is the first step toward an automatic scan (only in Pro version), that can crawl the whole website for Cookies in a future version of this plugin. Automatic scan is not yet available in the Pro version!', 'surbma-gdpr-proof-cookies' ); ?></p>
                            <p><?php _e( 'Now please visit your website and click on as many menu items, as you can, put products in your cart, if you are running a webshop and be interactive with your website to collect as many cookies, as you can. Than return to this page and you will see all your current Cookies.', 'surbma-gdpr-proof-cookies' ); ?></p>
                            <p><?php _e( '<strong>NOTICE:</strong> The PHP <code>$_COOKIE</code> superglobal replaces dots (.) and spaces ( ) with underscores (_) in Cookie names.', 'surbma-gdpr-proof-cookies' ); ?></p>
							<h4 class="uk-heading-divider"><?php _e( 'Website Cookies', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
							<?php
							if( $_COOKIE ) {
                                echo '<table class="uk-table uk-table-divider uk-table-small uk-table-justify uk-table-responsive">';
                                echo '<thead><tr><th>' . __( 'Cookie name', 'surbma-gdpr-proof-google-analytics' ) . '</th><th>' . __( 'Cookie value', 'surbma-gdpr-proof-google-analytics' ) . '</th></tr></thead><tbody>';
								foreach ($_COOKIE as $key=>$val) {
                                    echo '<tr>';
									echo '<td>' . $key . '</td>';
									echo '<td>' . $val . '</td>';
                                    echo '</tr>';
								}
                                echo '</tbody>';
                                echo '</table>';
							}
							else {
								echo '<p>COOKIE is not set.</p>';
							}
							?>
			            </div>
					    <div class="uk-card-footer uk-background-muted">
		            		<p class="uk-text-right"><?php _e( 'License: GPLv2', 'surbma-gdpr-proof-cookies' ); ?></p>
						</div>
		    	    </div>
			</div>
		</div>
		<div class="uk-margin-bottom" id="bottom"></div>
	</div>
	<?php surbma_gpga_admin_footer(); ?>
</div>
<?php
}
