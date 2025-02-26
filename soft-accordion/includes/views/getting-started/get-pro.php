<?php

$features = [
	[
		'title' => __( 'Responsive & Mobile ready', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Lightweight and Fast', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Clean and intuitive admin panel', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Multiple Accordions', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'WP Classic Editor for accordion content', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Multiple Accordions Collapsible or Toggle', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Add & Remove Accordion item from Back-end', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Fill space and Fixed Content Height', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Drag & drop Accordion sorting', 'soft-accordion' ),
		'pro'   => 0,
	],
	[
		'title' => __( 'Activator Event (Auto Play)', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Accordion Mode on Page Load', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( '20+ Beautiful Premium Themes with Preview', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Advanced Shortcode Generator', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Multi-level or Nested Accordion', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Accordion Border and Radius options', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Display FAQ Search', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Expand & Collapse Icon Style', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Accordion Animation Style', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Ajax Pagination for load accordion', 'soft-accordion' ),
		'pro'   => true,
	],
	[
		'title' => __( 'Change Accordion Title & Description Typography', 'soft-accordion' ),
		'pro'   => true,
	],
];

?>

<div id="get-pro" class="getting-started-content content-get-pro">
    <div class="content-heading">
        <h2><?php _e( 'Soft Accordion for wordpress solution is a powerful and fully responsive accordion of wordpress.', 'soft-accordion' ); ?></h2>
        <p><?php _e( 'we’ve created several packages with different features in them. These are priced according to the value they deliver.', 'soft-accordion' ); ?></p>
    </div>

    <div class="features-list">
        <div class="list-header">
            <div class="feature-title"><?php esc_html_e( 'Our Valuable Feature list', 'soft-accordion' ); ?></div>
            <div class="feature-free"><?php esc_html_e( 'Free', 'soft-accordion' ); ?></div>
            <div class="feature-pro"><?php esc_html_e( 'Pro', 'soft-accordion' ); ?></div>
        </div>

		<?php foreach ( $features as $feature ) : ?>
            <div class="feature">
                <div class="feature-title"><?php echo $feature['title']; ?></div>
                <div class="feature-free">
					<?php if ( $feature['pro'] ) : ?>
                        <i class="dashicons dashicons-no-alt"></i>
					<?php else : ?>
                        <i class="dashicons dashicons-saved"></i>
					<?php endif; ?>
                </div>
                <div class="feature-pro">
                    <i class="dashicons dashicons-saved"></i>
                </div>
            </div>
		<?php endforeach; ?>

    </div>

    <div class="get-pro-cta">
        <div class="cta-content">
            <h2><?php esc_html_e( 'Don\'t waste time, get the PRO version now!', 'soft-accordion' ); ?></h2>
            <p><?php esc_html_e( 'Upgrade to the PRO version of the plugin and unlock all the amazing Google Drive Integration features for your website.', 'soft-accordion' ); ?></p>
        </div>

        <div class="cta-btn">
            <a href="" class="soft-accordion-btn"><?php esc_html_e( 'Upgrade Now', 'soft-accordion' ); ?></a>
        </div>

    </div>

    <div class="demo-cta">
        <div class="cta-content">
            <h2><?php esc_html_e( 'Want to try live demo, before purchase?', 'soft-accordion' ); ?></h2>
            <p><?php esc_html_e( 'You can try our instant ready-made demo. The demo allows you to experiment with all the functionality of
                the plugins on both Front-End and Back-End. Feel free to explore the possibilities and limits of our
                plugins to see if it fits your requirements!', 'soft-accordion' ); ?></p>
        </div>

        <div class="cta-btn">
            <a href="https://demo.softlabbd.com/?product=soft-accordion" target="_blank"
               class="soft-accordion-btn"><?php esc_html_e( 'Try Live Demo', 'soft-accordion' ); ?></a>
        </div>

    </div>

</div>