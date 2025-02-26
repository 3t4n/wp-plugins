<?php
if ( ! class_exists( 'ARSCP_Template_Loader' ) ) {
	class ARSCP_Template_Loader {

		public function __construct() {

			add_filter( 'amp_post_template_file', array( $this, 'my_amp_header_path' ), 10, 3 );
			add_filter( 'amp_post_template_file', array( $this, 'my_amp_footer_path' ), 10, 3 );
			add_filter( 'amp_post_template_file', array( $this, 'my_amp_related_posts_path' ), 10, 3 );

			if ( ARSCP_AMP_Revolution::get()->options->get_option_data( 'showCommentForm', 'personalizator', 'off' ) == 'on' ) {
				add_filter( 'amp_post_template_file', array( $this, 'my_amp_comments_path' ), 10, 3 );
			}

			add_filter( 'amp_post_article_footer_meta', array( $this, 'custom_amp_post_article_footer_meta' ) );
			add_action( 'amp_post_template_head', array( $this, 'custom_code_to_head' ), 100 );
			if ( ARSCP_AMP_Revolution::get()->options->get_option_data( 'disableGf', 'optimizator', 'off' ) == 'on' ) {
				add_action( 'amp_post_template_head', array( $this, 'remove_amp_google_fonts' ), 2 );
			}


		}

		function remove_amp_google_fonts() {

			remove_action( 'amp_post_template_head', 'amp_post_template_add_fonts' );
		}


		function custom_amp_post_article_footer_meta( $parts ) {
			if ( ARSCP_AMP_Revolution::get()->options->get_option_data( 'showRelated', 'personalizator', 'off' ) == 'off' ) {
				return $parts;
			}
			$index = 1;

			array_splice( $parts, $index, 0, array( 'related-posts' ) );

			return $parts;
		}


		function custom_code_to_head() {
			echo '<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>';
			echo '<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>';
			if ( ARSCP_AMP_Revolution::get()->options->get_option_data( 'useAnalytics', 'integrator', 'off' ) == 'on' ) {

				echo '<script async custom-element="amp-analytics"
        src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>';
			}
		}


		function my_amp_header_path( $file, $template_type, $post ) {

			if ( 'header-bar' === $template_type ) {
				$file = ARSCP_AMP_Revolution::get()->plugin_path . 'views/FrontEnd/header-bar.php';
			}

			return $file;
		}

		function my_amp_footer_path( $file, $template_type, $post ) {

			if ( 'footer' === $template_type ) {
				$file = ARSCP_AMP_Revolution::get()->plugin_path . 'views/FrontEnd/footer.php';
			}

			return $file;
		}

		function my_amp_related_posts_path( $file, $template_type, $post ) {

			if ( 'related-posts' === $template_type ) {
				$file = ARSCP_AMP_Revolution::get()->plugin_path . 'views/FrontEnd/related-posts.php';
			}

			return $file;
		}

		function my_amp_comments_path( $file, $template_type, $post ) {

			if ( 'meta-comments-link' === $template_type ) {
				$file = ARSCP_AMP_Revolution::get()->plugin_path . 'views/FrontEnd/comments.php';
			}

			return $file;

		}

	}
}