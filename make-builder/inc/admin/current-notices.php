<?php
/**
 * @package Make Builder
 */

// Bail if this isn't being included inside of a MAKE_Admin_NoticeInterface.
if ( ! isset( $this ) || ! $this instanceof MAKE_Admin_NoticeInterface ) {
	return;
}

function make_builder_get_campaign_form() {
	ob_start();
	?>
	<div class="welcome-panel-content">
		<h2><?php _e( 'Welcome to Make Builder', 'make-builder' ); ?> 👋</h2>
		<p class="about-description"><?php _e( 'Subscribe to our newsletter to stay up to date with the latest Make Builder news and improvements.', 'make-builder' ); ?></p>
		<div class="welcome-panel-column-container">
			<div class="welcome-panel-column">
				<h3><?php _e( 'Helpful Links', 'make-builder' ); ?></h3>
				<ul>
					<li>
						<a href="https://thethemefoundry.com/docs/make-docs/" target="_blank" class="welcome-icon dashicons-format-aside"><?php _e( 'Browse all our help guides', 'make-builder' ); ?></a>
					</li>
					<li>
						<a href="https://thethemefoundry.com/docs/make-docs/simple-start-handbook/" target="_blank" class="welcome-icon dashicons-format-aside"><?php _e( 'Read our simple start handbook', 'make-builder' ); ?></a>
					</li>
					<li>
						<a href="https://thethemefoundry.com/docs/make-docs/first-steps/getting-help/" target="_blank" class="welcome-icon dashicons-format-status"><?php _e( 'Contact us for help', 'make-builder' ); ?></a>
					</li>
				</ul>
			</div>
			<div class="welcome-panel-column welcome-panel-last">
				<h3><?php _e( 'Upgrade to Make Plus', 'make-builder' ); ?></h3>
				<ul>
					<li>
						<a href="https://thethemefoundry.com/wordpress-plugins/make-builder/" target="_blank" class="welcome-icon dashicons-format-aside"><?php _e( 'Discover the power of Make Plus', 'make-builder' ); ?></a>
					</li>
					<li>
						<a href="https://thethemefoundry.com/wordpress-plugins/make-builder/features/" target="_blank" class="welcome-icon dashicons-format-aside"><?php _e( 'Compare Make Plus features', 'make-builder' ); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
	$form = ob_get_clean();
	return $form;
}

// Help notices
$this->register_admin_notice(
	'make-builder-campaign-form',
	make_builder_get_campaign_form(),
	array(
		'cap'      => 'edit_pages',
		'dismiss'  => true,
		'screen'   => array( 'plugins' ),
		'sanitize' => false,
		'class'    => array( 'notice', 'welcome-panel' ),
	)
);