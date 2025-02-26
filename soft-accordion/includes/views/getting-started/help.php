<?php

$faqs = array(
	array(
		'question' => __( 'Is Soft Accordion Responsive?', 'soft-accordion' ),
		'answer'   => __( 'Yes, Soft Accordion is fully responsive, ensuring it looks great on all devices, from desktops to mobiles.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Is Soft Accordion Compatible with Popular Themes?', 'soft-accordion' ),
		'answer'   => __( 'Yes, Soft Accordion is fully compatible with popular themes (Divi, Astra, Kadence, Generatepress, and others), ensuring smooth integration and seamless functionality.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Can I display multiple accordions on one page?', 'soft-accordion' ),
		'answer'   => __( 'Yes, you can display multiple accordions on one page!', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Does this plugin offer FAQ Schema?', 'soft-accordion' ),
		'answer'   => __( 'Yes, this plugin offers FAQ Schema support to help your FAQs appear in rich snippets on search engines.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Can I re-order my FAQ accordions?', 'soft-accordion' ),
		'answer'   => __( 'Yes, you can easily re-order your FAQ accordions using a simple drag-and-drop feature.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Can I customize accordion colors & styles?', 'soft-accordion' ),
		'answer'   => __( 'Yes, you can customize the accordion colors and styles to match your site’s design, giving you full control over its look and feel. Also, you can choose our pre-designed templates to fit your design.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Is there a Gutenberg block to display FAQs?', 'soft-accordion' ),
		'answer'   => __( 'A Gutenberg block to display FAQs is coming soon. This new feature will allow you to easily create and customize FAQ sections directly within the Gutenberg editor. You’ll be able to add, organize, and style your FAQs without any hassle, making it simpler to provide helpful information to your website visitors.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Are the accordions searchable?', 'soft-accordion' ),
		'answer'   => __( 'Yes, the accordions are searchable. They include a feature that allows users to search for any content within the accordion, making it easier to find specific information quickly.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Is Soft Accordion Translation Ready?', 'soft-accordion' ),
		'answer'   => __( 'Yes, Soft Accordion is translation-ready. This means it is designed to support multiple languages, allowing users to easily translate its content and interface to different languages for a global audience.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Can I keep the accordion items active on load?', 'soft-accordion' ),
		'answer'   => __( 'Yes, you can keep the accordion items active on load. This allows specific items to be opened by default when the page is loaded, providing a better user experience.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Can I animate the accordions?', 'soft-accordion' ),
		'answer'   => __( 'Yes, you can animate the accordions. The accordion items can be animated for smooth transitions, adding a dynamic and engaging effect when they open or close.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Does Soft Accordion support Shortcode?', 'soft-accordion' ),
		'answer'   => __( 'Yes, Soft Accordion supports shortcodes. This feature allows you to easily insert and display accordions anywhere on your site using simple shortcodes.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Is Soft Accordion compatible with the multisite network?', 'soft-accordion' ),
		'answer'   => __( 'Yes, Soft Accordion is compatible with multisite networks. It works smoothly across multiple sites within a network, allowing you to use the accordion functionality on all sites without issues.', 'soft-accordion' ),
	),
	array(
		'question' => __( 'Will Soft Accordion slow down my site?', 'soft-accordion' ),
		'answer'   => __( 'No, Soft Accordion will not slow down your site. The code is optimized for performance, ensuring that it runs smoothly without affecting your site’s speed.', 'soft-accordion' ),
	),
);

?>

<div id="help" class="getting-started-content">
	<div class="content-heading">
		<h2><?php esc_html_e( 'Frequently Asked Questions', 'soft-accordion' ); ?></h2>
	</div>

	<section class="section-faq">
		<?php foreach ( $faqs as $faq ) : ?>
			<div class="faq-item">
				<div class="faq-header">
					<i class="dashicons dashicons-arrow-down-alt2"></i>
					<h3><?php echo $faq['question']; ?></h3>
				</div>

				<div class="faq-body">
					<p><?php echo $faq['answer']; ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</div>

<script>
	jQuery(document).ready(function ($) {
		$('.section-faq .faq-item .faq-header').on('click', function (e) {
			e.preventDefault();
			$(this).parent().toggleClass('active');
		})
	});
</script>
