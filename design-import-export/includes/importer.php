<?php
/**
 * The importer.
 */
function design_import_importer() {

	$file = wp_import_handle_upload();

	if ( isset( $file['error'] ) ) {
		echo '<p><strong>' . esc_html__( 'Sorry, there has been an error.', 'design-import' ) . '</strong><br />';
		echo esc_html( $file['error'] ) . '</p>';
		return false;
	} else if ( ! file_exists( $file['file'] ) ) {
		echo '<p><strong>' . esc_html__( 'Sorry, there has been an error.', 'design-import' ) . '</strong><br />';
		printf( esc_html__( 'The export file could not be found at <code>%s</code>. It is likely that this was caused by a permissions problem.', 'design-import' ), esc_html( $file['file'] ) );
		echo '</p>';
		return false;
	}

	$file_id = (int) $file['id'];

	$xml = simplexml_load_file( $file['file'] );

	$namespaces = $xml->getDocNamespaces();
	
	if ( ! isset( $namespaces['wp'] ) ) {
		$namespaces['wp'] = 'http://wordpress.org/export/' . WXR_VERSION . '/';
	}
	if ( ! isset( $namespaces['dc'] ) ) {
		$namespaces['dc'] = 'http://purl.org/dc/elements/1.1/';
	}
	if ( ! isset( $namespaces['content'] ) ) {
		$namespaces['content'] = 'http://purl.org/rss/1.0/modules/content/';
	}
	if ( ! isset( $namespaces['excerpt'] ) ) {
		$namespaces['excerpt'] = 'http://wordpress.org/export/' . WXR_VERSION . '/excerpt/';
	}
	if ( ! isset( $namespaces['wfw'] ) ) {
		$namespaces['wfw'] = 'http://wellformedweb.org/CommentAPI/';
	}

	$base_blog_url_this = get_bloginfo_rss( 'url' );

	$base_blog_url = design_import_sanitize_data( $xml->channel->children( $namespaces['wp'] )->base_blog_url, '' );

	echo '<ul class="updated-posts">';

	foreach ( $xml->channel->item as $item ) {

		$namespace_wp = $item->children( $namespaces['wp'] );
		$namespace_content = $item->children( $namespaces['content'] );

		$post_title = design_import_sanitize_data( $item->title, 'title' );	
		$post_content = design_import_sanitize_data( $namespace_content->encoded, 'post_content', false );
		$post_name = design_import_sanitize_data( $namespace_wp->post_name, 'post_name' );
		$post_status = design_import_sanitize_data( $namespace_wp->status, 'post_status' );
		$post_type = design_import_sanitize_data( $namespace_wp->post_type, 'post_type' );

		$post_type_name = '';
		if ( $post_type === 'wp_template' ) {
			$post_type_name = __( 'template', 'design-import' );
		} elseif ( $post_type === 'wp_template_part' ) {
			$post_type_name = __( 'template part', 'design-import' );
		} elseif ( $post_type === 'wp_global_styles' ) {
			$post_type_name = __( 'custom styles', 'design-import' );
		} elseif ( $post_type === 'wp_block' ) {
			$post_type_name = __( 'pattern', 'design-import' );
		}

		if ( $post_type === 'wp_template' || $post_type === 'wp_template_part' || $post_type === 'wp_block' ) {
			if ( ! empty( $base_blog_url ) ) {
				$post_content = design_import_block_attrs_replace( $base_blog_url, $post_content );
			}
		}

		$terms = array();
		$theme_slug = '';
		foreach ( $item->category as $category ) {
			$category_domain = design_import_sanitize_data( $category['domain'], '' );
			$category_slug = design_import_sanitize_data( $category['nicename'], '' );
			$terms[$category_domain] = $category_slug;
			if ( $category_domain === 'wp_theme' ) {
				$theme_slug = $category_slug;
			}
		}

		$post_meta = array();
		if ( !empty($namespace_wp->postmeta)) {
			foreach ($namespace_wp->postmeta as $meta) {
				$meta_key = design_import_sanitize_data( $meta->meta_key, 'meta_key' );
				$meta_value = design_import_sanitize_data( $meta->meta_value, 'meta_value' );
				$meta_array = array(
					$meta_key => $meta_value
				);
				$post_meta = array_merge( $post_meta, $meta_array );
			}
		}

		$post_exist = design_import_post_exists( $post_name, $post_type, $theme_slug );
		if ( $post_exist['post_id'] && $post_exist['action'] === 'update' ) {
			$update_post_args = array(
				'ID' => $post_exist['post_id'],
				'post_content' => $post_content,
			);
			$update_post_id = wp_update_post( wp_slash( $update_post_args ), true );
			if ( $update_post_id ) {
				echo '<li class="updated"><span class="dashicons-before dashicons-saved"></span> ' . esc_html__( 'Updated: ', 'design-import' ) . ' <b>' . esc_html( $post_title ) . '</b> (' . esc_html( $post_type_name ) . ')</li>';
			}
		} elseif ( $post_exist['action'] === 'insert' ) {
			$insert_post_args = array(
				'post_title'		=> $post_title,
				'post_content'		=> $post_content,
				'comment_status'	=> 'closed',
				'ping_status'		=> 'closed',
				'post_name'			=> $post_name,
				'post_status'		=> $post_status,
				'post_type'			=> $post_type,
				'tax_input'			=> $terms,
				'meta_input'		=> $post_meta
			);
			$new_post_id = wp_insert_post( wp_slash( $insert_post_args ), true );
			if ( $new_post_id ) {
				design_import_slug_fix( $new_post_id, $post_name );
				echo '<li class="imported"><span class="dashicons-before dashicons-saved"></span> ' . esc_html__( 'Added: ', 'design-import' ) . ' <b>' . esc_html ( $post_title ) . '</b> (' . esc_html( $post_type_name ) . ')</li>';
			}
		}

	}
	echo '</ul>';

}


/**
 * Sanitize data, and return strings that can be used for conditional checks.
 */
function design_import_sanitize_data( $input, $field, $unslash = true ) {
	$input = str_replace( array( '<![CDATA[', ']]>' ), '', $input );
	if ( $unslash ) {
		$output = wp_unslash( sanitize_post_field( $field, $input, 0, 'db' ) );
	} else {
		$output = $input;
	}
	return $output;
}


/**
 * Check if this post already exists.
 */
function design_import_post_exists( $post_name = '', $post_type = '', $theme_slug = '' ) {

	global $wpdb;

	if ( $post_name === '' ) {
		$todo = array( 'post_id' => 0, 'action' => 'nowt' );
	} else {
		if ( $post_type === 'wp_template' || $post_type === 'wp_template_part' ) {

			$post_id_update = 0;

			$template_posts = $wpdb->get_results( "SELECT ID FROM $wpdb->posts WHERE post_name = '" . $post_name . "' AND post_type = '" . $post_type . "'" );

			if ( $template_posts ) {
				foreach ( $template_posts as $template_post ) {
					$post_id = $template_post->ID;
					$terms = get_the_terms( $post_id, 'wp_theme' );
					if ( $terms && $terms[0]->slug === $theme_slug ) {
						$post_id_update = $post_id;
						break;
					}
				}
				if ( $post_id_update ) {
					$todo = array( 'post_id' => $post_id_update, 'action' => 'update' );
				} else {
					$todo = array( 'post_id' => 0, 'action' => 'insert' );
				}
			} else {
				$todo = array( 'post_id' => 0, 'action' => 'insert' );
			}

		} elseif ( $post_type === 'wp_global_styles' ) {

			$post_id = $wpdb->get_row( "SELECT ID FROM $wpdb->posts WHERE post_name = '" . $post_name . "' AND post_type = '" . $post_type . "'" );
			if ( $post_id ) {
				$todo = array( 'post_id' => $post_id->ID, 'action' => 'update' );
			} else {
				$todo = array( 'post_id' => 0, 'action' => 'insert' );
			}

		} elseif ( $post_type === 'wp_block' ) {

			$post_id = $wpdb->get_row( "SELECT ID FROM $wpdb->posts WHERE post_name = '" . $post_name . "' AND post_type = '" . $post_type . "'" );
			if ( $post_id ) {
				$todo = array( 'post_id' => $post_id->ID, 'action' => 'update' );
			} else {
				$todo = array( 'post_id' => 0, 'action' => 'insert' );
			}

		} else {
			$todo = array( 'post_id' => 0, 'action' => 'nowt' );
		}	
	}

	return $todo;

}


/**
 * Fix template and template part slugs (post_name).
 * We don't want e.g. 'header' and 'header-2', 'header-3' etc.
 */
function design_import_slug_fix( $post_id, $slug ) {
	global $wpdb;
	$wpdb->update( $wpdb->prefix . 'posts', array( 'post_name' => $slug ), array( 'ID' => $post_id ), '%s', '%d' );
}


/**
 * Remove 'id' attributes from blocks such as image, nav link.
 */
function design_import_get_block_attrs_replace( $blocks ) {
	$replace_blocks = array();
	$replace_img_classes = array();
	$all_blocks = array();
	$queue      = array();
	foreach ( $blocks as $block ) {
		$queue[] = $block;
		if ( ! empty( $block['blockName'] ) && ! empty( $block['attrs'] ) && substr( $block['blockName'], 0, 5 ) === 'core/' ) {
			$block_name = str_replace( 'core/', 'wp:', $block['blockName'] );
			$block_output = $block_name.' ';
			$block_attrs = $block['attrs'];
			$block_attrs_new = $block_attrs;
			if ( $block_name === 'wp:image' && ! empty( $block_attrs_new['id'] ) ) {
				$replace_img_classes[] = array( 'old' => 'wp-image-' . $block_attrs_new['id'] , 'new' => '' );
			}
			unset( $block_attrs_new['id'] );
			$block_output_new = $block_output . wp_unslash( wp_json_encode( $block_attrs_new ) );
			$block_output .= wp_unslash( wp_json_encode( $block_attrs ) );
			if ( $block_output_new !== $block_output ) {
				$replace_blocks[] = array( 'old' => $block_output, 'new' => $block_output_new );
			}
		}
	}

	while ( count( $queue ) > 0 ) {
		$block = $queue[0];
		array_shift( $queue );
		$all_blocks[] = $block;

		if ( ! empty( $block['innerBlocks'] ) ) {
			foreach ( $block['innerBlocks'] as $inner_block ) {
				$queue[] = $inner_block;
				if ( ! empty( $inner_block['blockName'] ) && ! empty( $inner_block['attrs'] ) && substr( $inner_block['blockName'], 0, 5 ) === 'core/' ) {
					$inner_block_name = str_replace( 'core/', 'wp:', $inner_block['blockName'] );
					$inner_block_output = $inner_block_name.' ';
					$inner_block_attrs = $inner_block['attrs'];
					$inner_block_attrs_new = $inner_block_attrs;
					if ( $inner_block_name === 'wp:image' && ! empty( $inner_block_attrs_new['id'] ) ) {
						$replace_img_classes[] = array( 'old' => 'wp-image-' . $inner_block_attrs_new['id'] , 'new' => '' );
					}
					unset( $inner_block_attrs_new['id'] );
					$inner_block_output_new = $inner_block_output . wp_unslash( wp_json_encode( $inner_block_attrs_new ) );
					$inner_block_output .= wp_unslash( wp_json_encode( $inner_block_attrs ) );
					if ( $inner_block_output_new !== $inner_block_output ) {
						$replace_blocks[] = array( 'old' => $inner_block_output, 'new' => $inner_block_output_new );
					}
				}
			}
		}
	}

	return array_merge( $replace_blocks, $replace_img_classes );
}


function design_import_block_attrs_replace( $base_blog_url, $content ) {
	$blocks = parse_blocks( $content );
	$to_replace = design_import_get_block_attrs_replace( $blocks );
	foreach ( $to_replace as $block_replace ) {
		$content = str_replace( $block_replace['old'], $block_replace['new'], $content );
	}

	if ( ! empty( $base_blog_url ) ) {
		$base_blog_url_this = get_bloginfo_rss( 'url' );

		$content = str_replace( '"url":"'.$base_blog_url, '"url":"'.$base_blog_url_this, $content );
		$content = str_replace( 'href="'.$base_blog_url, 'href="'.$base_blog_url_this, $content );
	}

	return $content;
}
