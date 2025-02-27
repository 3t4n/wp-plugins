<?php
/**
 * The download/export XML file output.
 */
function design_import_download() {
	// Run some checks before allowing a WXR export file to be baked and returned.
	if ( isset( $_GET['design_import_download'] ) && isset( $_GET['design_import_posts'] ) && is_admin() && current_user_can('export') && isset( $_GET['design_import_nonce'] ) ) {

		check_admin_referer( 'design_import_download', 'design_import_nonce' );

		$design_import_posts_export = $_GET['design_import_posts'];

		$xml = '<?xml version="1.0" encoding="' . get_bloginfo( 'charset' ) . '" ?>

<!-- This is a WordPress eXtended RSS file generated as an export of your site design. -->
<!-- It contains information about your site design styles, templates, template parts and patterns. -->
<!-- You may use this file to transfer that content from one site to another. -->
<!-- The information in this file is intended to be used with the theme you selected as the basis of your design. -->

<!-- To import this information into a WordPress site follow these steps: -->
<!-- 1. Log in to that site as an administrator. -->
<!-- 2. Install and activate the "Design Import/Export" plugin. -->
<!-- 3. Go to Design Import/Export from your dashboard menu. -->
<!-- 4. Use the Import function to upload this file using the form provided on that page. -->
<!-- 5. The styles, templates, template parts and patterns -->
<!--    contained in this file will be imported into your site. -->

<rss version="2.0"
	xmlns:excerpt="http://wordpress.org/export/' . WXR_VERSION . '/excerpt/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:wp="http://wordpress.org/export/' . WXR_VERSION . '/"
>

<channel>
	<title>' . get_bloginfo_rss( 'name' ) . '</title>
	<link>' . get_bloginfo_rss( 'url' ) . '</link>
	<description>' . get_bloginfo_rss( 'description' ) . '</description>
	<pubDate>' . gmdate( 'D, d M Y H:i:s +0000' ) . '</pubDate>
	<language>' . get_bloginfo_rss( 'language' ) . '</language>
	<wp:wxr_version>' . WXR_VERSION . '</wp:wxr_version>
	<wp:base_site_url>' . design_import_wxr_site_url() . '</wp:base_site_url>
	<wp:base_blog_url>' . get_bloginfo_rss( 'url' ) . '</wp:base_blog_url>
';

		$args = array(
			'numberposts' => -1,
			'include' => $design_import_posts_export,
			'orderby' => 'post_type',
			'post_status' => 'publish',
			'post_type' => array( 'wp_template', 'wp_template_part', 'wp_block', 'wp_global_styles' ),
		);
		$export_posts = get_posts( $args );
		if ( $export_posts ) {
			foreach( $export_posts as $post ) {
				setup_postdata( $post );
				$is_sticky = is_sticky( $post->ID ) ? 1 : 0;
				$xml .= '
	<item>
		<title>' . design_import_wxr_cdata( $post->post_title ) . '</title>
		<link>' . get_permalink( $post->ID ) . '</link>
		<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true, $post->ID ), false ) . '</pubDate>
		<dc:creator>' . design_import_wxr_cdata( get_the_author_meta( 'login' ) ) . '</dc:creator>
		<guid isPermaLink="false">' . get_the_guid( $post->ID ) . '</guid>
		<description></description>
		<content:encoded>' . design_import_wxr_cdata( $post->post_content ) . '</content:encoded>
		<excerpt:encoded>' . design_import_wxr_cdata( $post->post_excerpt ) . '</excerpt:encoded>
		<wp:post_id>' . (int) $post->ID . '</wp:post_id>
		<wp:post_date>' . design_import_wxr_cdata( $post->post_date ) . '</wp:post_date>
		<wp:post_date_gmt>' . design_import_wxr_cdata( $post->post_date_gmt ) . '</wp:post_date_gmt>
		<wp:post_modified>' . design_import_wxr_cdata( $post->post_modified ) . '</wp:post_modified>
		<wp:post_modified_gmt>' . design_import_wxr_cdata( $post->post_modified_gmt ) . '</wp:post_modified_gmt>
		<wp:comment_status>' . design_import_wxr_cdata( $post->comment_status ) . '</wp:comment_status>
		<wp:ping_status>' . design_import_wxr_cdata( $post->ping_status ) . '</wp:ping_status>
		<wp:post_name>' . design_import_wxr_cdata( $post->post_name ) . '</wp:post_name>
		<wp:status>' . design_import_wxr_cdata( $post->post_status ) . '</wp:status>
		<wp:post_parent>' . (int) $post->post_parent . '</wp:post_parent>
		<wp:menu_order>' . (int) $post->menu_order . '</wp:menu_order>
		<wp:post_type>' . design_import_wxr_cdata( $post->post_type ) . '</wp:post_type>
		<wp:post_password>' . design_import_wxr_cdata( $post->post_password ) . '</wp:post_password>
		<wp:is_sticky>' . (int) $is_sticky . '</wp:is_sticky>'
		. design_import_wxr_post_taxonomy( $post )
		. design_import_wxr_postmeta( $post ) . '
	</item>
	';
			}
			wp_reset_postdata();
		}


			$xml .= '
</channel>
</rss>
';

		$sitename = sanitize_key( get_bloginfo( 'name' ) );
		if ( ! empty( $sitename ) ) {
			$sitename .= '.';
		}
		$date = gmdate( 'Y-m-d-H.i.s' );
		$filename = 'design.' . $sitename . $date . '.xml';

		// set header information
		header( 'Content-Description: File Transfer' );
		header( 'Content-Disposition: attachment; filename=' . $filename );
		//header( 'Content-Disposition: inline;' ); // for debugging purposes only
		header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ), true );

		echo $xml;
		die();

	}
}
add_action( 'wp_loaded', 'design_import_download' );


/**
 * The main page.
 */
function design_import_admin_page_html() {

	if ( ! current_user_can( 'export' ) || ! current_user_can( 'import' ) ) {
		wp_die( '<div class="notice notice-warning"><p>' . esc_html__( 'Please ask your site administrator to enable import and export capabilities for your user account.', 'design-import' ) . '</p></div>' );
	}

	if ( ! wp_is_block_theme() ) {
		wp_die( '<div class="notice notice-warning"><p>' . sprintf(
			/* translators: %1$s: opening <a> tag with themes.php admin link, %2$s: closing </a> tag */
			__( 'This site does not have Full Site Editing enabled. Please install and activate a %1$sblock theme%2$s.', 'design-import' ),
			'<a href="' . admin_url( 'theme-install.php?theme=eternal' ) . '">',
			'</a>'
			) . '</p></div>' );
	}
	?>
	<div class="wrap design-import">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<div class="has-2-columns">

			<div class="column is-column-upload">
				<h2><span class="dashicons-before dashicons-upload"></span> <?php esc_html_e( 'Import', 'design-import' ); ?></h2>
			<?php
			if ( isset( $_GET['design_import'] ) && is_admin() && current_user_can('import') && isset( $_GET["_wpnonce"] ) ) {
				check_admin_referer( 'import-upload', '_wpnonce' );
				design_import_importer();
			} else {
			?>
				<p><?php esc_html_e( 'If you have a previously saved design export file, you can import it into this site.', 'design-import' ); ?></p>
				<p><?php esc_html_e( 'Upload your XML file and we&#8217;ll import and update your customized Styles, Templates, Template Parts and Patterns into this site.', 'design-import' ); ?></p>
				<p><?php esc_html_e( 'Before using the importer, you may want to save and back up your current design using the Export function.', 'design-import' ); ?></p>
				<p><?php esc_html_e( 'Choose a file to upload, then click Upload file and import.', 'design-import' ); ?></p>
				<?php wp_import_upload_form( 'admin.php?page=design-import&amp;design_import=1' ); ?>
				<p></p>
			<?php
			}
			?>
			</div>

			<div class="column is-column-download">
				<h2><span class="dashicons-before dashicons-download"></span> <?php esc_html_e( 'Export', 'design-import' ); ?></h2>
				<p><?php esc_html_e( 'When you click the button below an XML file will be created for you to save to your computer.', 'design-import' ); ?></p>
				<p><?php esc_html_e( 'This file will contain your customized Styles, Templates, Template Parts and Patterns that are saved in the WordPress database.', 'design-import' ); ?></p>
				<p><?php esc_html_e( 'These are used in addition to the Styles, Templates, Template Parts and Patterns defined in your active Block Theme.', 'design-import' ); ?></p>
				<p><?php esc_html_e( 'Once you&#8217;ve saved the download file, you can use the Import function in another WordPress installation to import the design from this site.', 'design-import' ); ?></p>
				<?php
				if ( isset( $_GET["design_import_download"] ) && !isset( $_GET['design_import_posts'] ) ) {
					?>
					<p style="font-size: 1.6em;color: #e14d43;"><strong><?php esc_html_e( 'Please select at least one item to export!', 'design-import' ); ?></strong></p>
					<?php
				}
				?>
				<form method="get" class="download-form">
					<fieldset>
						<input type="hidden" name="page" value="design-import" />
						<input type="hidden" name="design_import_download" value="true" />
						<input type="hidden" name="design_import_nonce" value="<?php echo wp_create_nonce( 'design_import_download' ); ?>" />
						<p class="is-design-option"><label for="design-import-posts-all">
							<input type="checkbox" id="design-import-posts-all" class="design-import-posts-all" value="all" />
							<span class="is-font-weight-600"><?php esc_html_e( 'Select all', 'design-import' ); ?></span>
						</label></p>

			<?php
			$current_theme = wp_get_theme()->get_stylesheet();
			// Styles
			?>
			<h3 class="is-sub-heading"><?php esc_html_e( 'Styles', 'design-import' ); ?></h3>
			<?php
			$posts_styles = get_posts(
				array(
					'numberposts' => -1,
					'orderby' => 'post_type',
					'post_status' => 'publish',
					'post_type' => array( 'wp_global_styles' ),
					'tax_query' => array(
						array(
							'taxonomy' => 'wp_theme',
							'field'    => 'slug',
							'terms'    => array( $current_theme )
						)
					)
				)
			);
			if ( $posts_styles ) {
				foreach ( $posts_styles as $post_styles ) {
					?>
					<p class="is-design-option"><label for="design_import_posts">
					<input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="<?php echo esc_attr( $post_styles->ID );?>" />
					<span class="is-font-weight-600"><?php echo esc_html( $post_styles->post_title );?></span>
					</label></p>
					<?php
				}
			} else {
				?>
				<p class="is-design-option"><?php esc_html_e( 'There are no customized theme styles available.', 'design-import' ); ?></p>
				<?php
			}
			// Templates
			?>
			<h3 class="is-sub-heading"><?php esc_html_e( 'Templates', 'design-import' ); ?></h3>
			<?php
			$posts_templates = get_posts(
				array(
					'numberposts' => -1,
					'orderby' => 'post_type',
					'post_status' => 'publish',
					'post_type' => array( 'wp_template' ),
					'tax_query' => array(
						array(
							'taxonomy' => 'wp_theme',
							'field'    => 'slug',
							'terms'    => array( $current_theme )
						)
					)
				)
			);
			if ( $posts_templates ) {
				foreach ( $posts_templates as $post_templates ) {
					?>
					<p class="is-design-option"><label for="design_import_posts">
					<input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="<?php echo esc_attr( $post_templates->ID );?>" />
					<span class="is-font-weight-600"><?php echo esc_html( $post_templates->post_title );?></span>
					</label></p>
					<?php
				}
			} else {
				?>
				<p class="is-design-option"><?php esc_html_e( 'There are no customized templates available.', 'design-import' ); ?></p>
				<?php
			}
			// Parts
			?>
			<h3 class="is-sub-heading"><?php esc_html_e( 'Template Parts', 'design-import' ); ?></h3>
			<?php
			$posts_parts = get_posts(
				array(
					'numberposts' => -1,
					'orderby' => 'post_type',
					'post_status' => 'publish',
					'post_type' => array( 'wp_template_part' ),
					'tax_query' => array(
						array(
							'taxonomy' => 'wp_theme',
							'field'    => 'slug',
							'terms'    => array( $current_theme )
						)
					)
				)
			);
			if ( $posts_parts ) {
				foreach ( $posts_parts as $post_parts ) {
					?>
					<p class="is-design-option"><label for="design_import_posts">
					<input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="<?php echo esc_attr( $post_parts->ID );?>" />
					<span class="is-font-weight-600"><?php echo esc_html( $post_parts->post_title );?></span>
					</label></p>
					<?php
				}
			} else {
				?>
				<p class="is-design-option"><?php esc_html_e( 'There are no customized template parts available.', 'design-import' ); ?></p>
				<?php
			}
			// Patterns
			?>
			<h3 class="is-sub-heading"><?php esc_html_e( 'Patterns', 'design-import' ); ?></h3>
			<?php
			$posts_patterns = get_posts(
				array(
					'numberposts' => -1,
					'orderby' => 'post_type',
					'post_status' => 'publish',
					'post_type' => array( 'wp_block' ),
				)
			);
			if ( $posts_patterns ) {
				foreach ( $posts_patterns as $post_patterns ) {
					?>
					<p class="is-design-option"><label for="design_import_posts">
					<input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="<?php echo esc_attr( $post_patterns->ID );?>" />
					<span class="is-font-weight-600"><?php echo esc_html( $post_patterns->post_title );?></span>
					</label></p>
					<?php
				}
			} else {
				?>
				<p class="is-design-option"><?php esc_html_e( 'There are no custom patterns available.', 'design-import' ); ?></p>
				<?php
			}
			?>
					</fieldset>
					<?php submit_button( esc_html__( 'Download Export File', 'design-import' ) ); ?>
				</form>
			</div>

		</div>
	</div>
	<?php
}


/**
 * Wrap given string in XML CDATA tag.
 */
function design_import_wxr_cdata( $str ) {
	if ( ! seems_utf8( $str ) ) {
		$str = utf8_encode( $str );
	}
	// $str = ent2ncr(esc_html($str));
	$str = '<![CDATA[' . str_replace( ']]>', ']]]]><![CDATA[>', $str ) . ']]>';

	return $str;
}


/**
 * Return the URL of the site.
 */
function design_import_wxr_site_url() {
	if ( is_multisite() ) {
		// Multisite: the base URL.
		return network_home_url();
	} else {
		// WordPress (single site): the blog URL.
		return get_bloginfo_rss( 'url' );
	}
}

/**
 * Output list of taxonomy terms, in XML tag format, associated with a post.
 */
function design_import_wxr_post_taxonomy( $post ) {
	$output = '';
	$taxonomies = get_object_taxonomies( $post->post_type );
	if ( empty( $taxonomies ) ) {
		return;
	}
	$terms = wp_get_object_terms( $post->ID, $taxonomies );
	foreach ( (array) $terms as $term ) {
		$output .= '
		<category domain="' . $term->taxonomy . '" nicename="' . $term->slug . '">"' . design_import_wxr_cdata( $term->name ) . '"</category>';
	}

	return $output;
}

/**
 * Output postmeta, associated with a post.
 */
function design_import_wxr_postmeta( $post ) {
	$output = '';

	$postmeta = get_post_meta( $post->ID );
	$postmeta = array_combine(array_keys($postmeta), array_column($postmeta, '0'));

	foreach ( $postmeta as $meta_key => $meta_value ) {
		if ( $meta_key !== '_edit_lock' && $meta_key !== '_edit_last' ) {
			$output .= '
	<wp:postmeta>
		<wp:meta_key>' . design_import_wxr_cdata( $meta_key ) . '</wp:meta_key>
		<wp:meta_value>' . design_import_wxr_cdata( $meta_value ) . '</wp:meta_value>
	</wp:postmeta>';
		}
	}

	return $output;
}
