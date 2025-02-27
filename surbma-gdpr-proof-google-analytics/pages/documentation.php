<?php

function surbma_gpga_documentation_page() {
?>
<div class="surbma-admin">
	<?php surbma_gpga_admin_header( __( 'Documentation' ) ); ?>
	<div class="wrap">
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-1-1">
					<div class="uk-card uk-card-small uk-card-default uk-card-hover">
						<div class="uk-card-header uk-background-muted">
							<h3 class="uk-card-title"><?php _e( 'Shortcodes', 'surbma-gdpr-proof-google-analytics' ); ?> <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #shortcodes"></a></h3>
					    </div>
		            	<div id="shortcodes" class="uk-card-body">
							<h4 class="uk-heading-divider"><?php _e( 'Cookie Popup Link', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
							<p><code>[surbma-cookie-popup-link]</code></p>
							<p><?php _e( 'It will place a link in your content. Clicking on the link will open the Cookie Popup again, and users can change their settings about the Cookie trackings.', 'surbma-gdpr-proof-google-analytics' ); ?></p>
							<p><strong><?php _e( 'It has 2 attributes', 'surbma-gdpr-proof-google-analytics' ); ?>:</strong></p>
							<ul class="uk-list">
								<li><code>class</code> - <?php _e( 'You can set the class of the link, so you can easily create a button like link.', 'surbma-gdpr-proof-google-analytics' ); ?></li>
								<li><code>text</code> - <?php _e( 'You can change the default text of the link, which is "Open Cookie Settings".', 'surbma-gdpr-proof-google-analytics' ); ?></li>
							</ul>
							<p><strong><?php _e( 'Examples', 'surbma-gdpr-proof-google-analytics' ); ?>:</strong></p>
							<ul class="uk-list">
								<li><code style="white-space: normal;">[surbma-cookie-popup-link text="I've changed my mind about Cookie settings."]</code></li>
								<li><code style="white-space: normal;">[surbma-cookie-popup-link class="button" text="Please show me the Cookie settings again!"]</code></li>
							</ul>
							<h4 class="uk-heading-divider"><?php _e( 'Live Cookie Scan', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
							<p><code>[surbma-live-cookie-scan]</code></p>
							<p><?php _e( 'You can display all the actual Cookies, a visitor has right now. It is not a full list of Cookies, that your website is using!', 'surbma-gdpr-proof-google-analytics' ); ?></p>
							<p><strong><?php _e( 'It has 1 attribute', 'surbma-gdpr-proof-google-analytics' ); ?>:</strong></p>
							<ul class="uk-list">
								<li><code>cookievalue</code> - <?php _e( 'Show or hide the Cookie values in the list.', 'surbma-gdpr-proof-google-analytics' ); ?></li>
							</ul>
							<p><strong><?php _e( 'Examples', 'surbma-gdpr-proof-google-analytics' ); ?>:</strong></p>
							<ul class="uk-list">
								<li><code style="white-space: normal;">[surbma-live-cookie-scan cookievalue="false"]</code></li>
							</ul>
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
