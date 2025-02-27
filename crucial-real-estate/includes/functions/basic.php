<?php
/**
 * Plugin Basic required functions.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'cre_display_property_label' ) ) {
	/**
	 * Display property label
	 */
	function cre_display_property_label() {

		$label_text = get_post_meta( get_the_ID(), 'cre_property_label', true );
		if ( ! empty( $label_text ) ) {
			?>
<span class='property-label'><?php echo esc_html( $label_text ); ?></span>
<?php

		}
	}
}

if ( ! function_exists( 'cre_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @return void
	 */
	function cre_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		printf( '<div class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></div>', esc_url( get_permalink() ), $time_string ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'cre_post_excerpt' ) ) {
	/**
	 * Post Excerpt
	 *
	 * @return void
	 */
	function cre_post_excerpt() {

		$limit = get_theme_mod(
			cre_get_active_theme_prefix() .'_blog_post_excerpt_limit',
			array( 'desktop' => '20' )
		);
		// If the post excerpt limit is less than 1 shouldn't be output.
		if ( $limit && $limit['desktop'] > 0 ) {

			$end_text    = get_theme_mod(
				cre_get_active_theme_prefix().'_blog_post_excerpt_suffix',
				'...'
			);
			$enable_link = get_theme_mod(
				cre_get_active_theme_prefix().'_blog_post_excerpt_suffix_linked',
				''
			);

			if ( $enable_link && array_key_exists( 'desktop', $enable_link ) ) {
				$end_text = '<a class="excerpt-suffix" href="' . esc_url( get_permalink( get_the_ID() ) ) . '"> ' . esc_html( $end_text ) . '</a>';
			}

			$excerpt = '<p>' . wp_trim_words( get_the_excerpt( get_the_ID() ), $limit['desktop'], $end_text ) . '</p>';

			echo wp_kses_post( $excerpt ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'cre_social_share' ) ) {
	/**
	 * Social Share links
	 *
	 * @access public
	 * @return void
	 */
	function cre_social_share() {
		$social_share = get_theme_mod(
			cre_get_active_theme_prefix().'_social_share',
			array( 'facebook', 'twitter' )
		);

		if ( ! empty( $social_share ) ) :

			$social_urls = array(
				'facebook' => 'https://www.facebook.com/sharer/sharer.php?u={url}',
				'twitter'  => 'https://twitter.com/share?url={url}&text={text}',
			);

			ob_start();

			echo '<ul>';

			foreach ( $social_share as $social ) :

				if ( isset( $social_urls[ $social ] ) ) :
					$url = str_replace( '{url}', esc_url( get_the_permalink() ), str_replace( '{text}', esc_html( get_the_title() ), $social_urls[ $social ] ) );
					echo '<li><a href="' . esc_url( $url ) . '" title="' . esc_attr( $social ) . '" target=_blank"><label class="screen-reader-text">' . esc_html( $social ) . '</label></a></li>';
				endif;

			endforeach;

			echo '</ul>';

			$output = ob_get_clean();

			echo apply_filters( 'cre_social_share', $output ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		endif;
	}
}

if ( ! function_exists( 'cre_contact_form' ) ) {
	/**
	 * Default contact form
	 *
	 * @param null $email
	 * @param null $fields
	 */
	function cre_contact_form( $email = null, $fields = null ) {

		$to_email = $email ? $email : is_email( sanitize_email( get_option( 'admin_email' ) ) );

		if ( $to_email ) {
			$form_id     = 'cre-contact-' . get_the_ID();
			$form_fields = $fields ? $fields : array(
				'name'    => array(
					'type'  => 'text',
					'label' => esc_html__( 'Your Name', 'crucial-real-estate' ),
					'class' => 'required',
					'title' => esc_html__( '* Please provide your name', 'crucial-real-estate' ),
				),
				'email'   => array(
					'type'  => 'text',
					'label' => esc_html__( 'Your Email', 'crucial-real-estate' ),
					'class' => 'email required',
					'title' => esc_html__( '* Please provide a valid email address', 'crucial-real-estate' ),
				),
				'message' => array(
					'type'  => 'textarea',
					'label' => esc_html__( 'Your Message', 'crucial-real-estate' ),
					'class' => 'required',
					'title' => esc_html__( '* Please provide your message', 'crucial-real-estate' ),
				),
				'gdpr'    => array(
					'type' => 'gdpr',
				),
			);
			$form_fields = apply_filters( 'cre_contact_form_fields', $form_fields, $form_id );
			?>
<div id="<?php echo esc_attr( $form_id ); ?>" class="cre-contact-form-container cre_contact_form wpcf7-form">
    <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
        <?php
					if ( ! empty( $form_fields ) && is_array( $form_fields ) ) {

						foreach ( $form_fields as $field_name => $field ) {

							$id         = $field_name . '_' . $form_id;
							$field_item = '';

							$label = '';
							if ( isset( $field['label'] ) && ! empty( $field['label'] ) ) {
								$label = sprintf( '<label for="%s">%s</label>', esc_attr( $id ), esc_html( $field['label'] ) );
							}

							$field_type = '';
							if ( isset( $field['type'] ) && ! empty( $field['type'] ) ) {
								$field_type = $field['type'];
							}

							$class_html = '';
							if ( isset( $field['class'] ) && ! empty( $field['class'] ) ) {
								$class_html = sprintf( 'class="%s"', esc_attr( $field['class'] ) );
							}

							$title_html = '';
							if ( isset( $field['title'] ) && ! empty( $field['title'] ) ) {
								$title_html = sprintf( 'title="%s"', esc_attr( $field['title'] ) );
							}

							if ( 'gdpr' === $field_type ) {
								cre_gdpr_agreement(
									array(
										'id'              => 'aarambha-gdpr',
										'container'       => 'p',
										'container_class' => 'rh_cre_gdpr',
										'title_class'     => 'gdpr-checkbox-label',
									)
								);
							} elseif ( 'textarea' === $field_type ) {
								$field_item = sprintf( '<textarea name="%s" id="%s" %s %s cols="40" rows="5"></textarea>', esc_attr( $field_name ), esc_attr( $id ), $class_html, $title_html );
							} elseif ( 'text' === $field_type ) {
								$field_item = sprintf( '<input type="%s" name="%s" id="%s" %s %s>', esc_attr( $field_type ), esc_attr( $field_name ), esc_attr( $id ), $class_html, $title_html );
							}

							if ( ! empty( $field_item ) ) {
								printf( '<p>%s%s</p>', $label, $field_item );
							}
						}
					}

					$submit_button = ! empty( $instance['submit'] ) ? $instance['submit'] : esc_html__( 'Send Message', 'crucial-real-estate' )
					?>
        <div class="cre-submit-button-container">
            <input type="submit" name="submit" value="<?php echo esc_attr( $submit_button ); ?>"
                class="wpcf7-submit submit-button">
            <input type="hidden" name="action" value="send_message">
            <input type="hidden" name="nonce"
                value="<?php echo esc_attr( wp_create_nonce( 'send_message_nonce' ) ); ?>">
            <input type="hidden" name="cre_contact_form_target_email" value="<?php echo antispambot( $to_email ); ?>">
            <?php if ( is_singular( 'property' ) ) : ?>
            <input type="hidden" name="property_title"
                value="<?php echo esc_attr( get_the_title( get_the_ID() ) ); ?>" />
            <input type="hidden" name="property_permalink"
                value="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" />
            <?php endif; ?>
            <div class="cre_widget_contact_form_loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="error-container"></div>
        <div class="message-container"></div>
    </form>
</div>
<?php
		} else {
			printf( '<div class="cre-contact-form-container">%s</div>', esc_html__( 'Please provide the \'Target Email\' address in the widget settings to show the contact form.', 'crucial-real-estate' ) );
		}
	}
}

if ( ! function_exists( 'cre_get_core_supported_themes' ) ) {
	/**
	 * Get core supported themes.
	 *
	 * @return array
	 */
	function cre_get_core_supported_themes() {
		$core_themes = array( 'real-home', 'aarambha-real-estate' );
		// Check for official core themes pro version.
		$pro_themes = array_diff( $core_themes, array( 'real-home-pro', 'aarambha-real-estate-pro' ) );
		if ( ! empty( $pro_themes ) ) {
			$pro_themes = preg_replace( '/$/', '-pro', $pro_themes );
		}
		return array_merge( $core_themes, $pro_themes );
	}
}

if ( ! function_exists( 'cre_get_raw_placeholder_url' ) ) {
	/**
	 * Returns the URL of placeholder image.
	 *
	 * @param string $image_size - Image size.
	 *
	 * @return string|boolean - URL of the placeholder OR `false` on failure.
	 * @since 1.0.0
	 */
	function cre_get_raw_placeholder_url( $image_size ) {

		global $_wp_additional_image_sizes;

		$holder_width  = 0;
		$holder_height = 0;
		$holder_text   = get_bloginfo( 'name' );

		if ( in_array( $image_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

			$holder_width  = get_option( $image_size . '_size_w' );
			$holder_height = get_option( $image_size . '_size_h' );

		} elseif ( isset( $_wp_additional_image_sizes[ $image_size ] ) ) {

			$holder_width  = $_wp_additional_image_sizes[ $image_size ]['width'];
			$holder_height = $_wp_additional_image_sizes[ $image_size ]['height'];

		}

		if ( intval( $holder_width ) > 0 && intval( $holder_height ) > 0 ) {
			return 'https://via.placeholder.com/' . esc_attr( $holder_width ) . 'x' . esc_attr( $holder_height ) . '&text=' . urlencode( $holder_text );
		}

		return false;
	}
}

if ( ! function_exists( 'cre_get_agents_array' ) ) {
	/**
	 * Returns an array of Agent ID => Agent Name
	 *
	 * @return array
	 */
	function cre_get_agents_array() {

		$agents_array = array(
			-1 => esc_html__( 'None', 'crucial-real-estate' ),
		);

		$agents_posts = get_posts(
			array(
				'post_type'        => 'agent',
				'posts_per_page'   => -1,
				'suppress_filters' => 0,
			)
		);

		if ( count( $agents_posts ) > 0 ) {
			foreach ( $agents_posts as $agent_post ) {
				$agents_array[ $agent_post->ID ] = esc_html( $agent_post->post_title );
			}
		}

		return $agents_array;
	}
}

if ( ! function_exists( 'cre_page_navigation' ) ) {
	/**
	 * Pagination layout.
	 *
	 * source https://github.com/0dp/understrap/blob/pagination/inc/pagination.php
	 *
	 * @param $totalpages
	 * @param $paged
	 * @param $end_size
	 * @param $mid_size
	 *
	 * @return void
	 */
	function cre_page_navigation( $totalpages, $paged, $end_size, $mid_size ) {
		$bignum = 999999999;

		if ( $totalpages <= 1 || $paged > $totalpages ) {
			return;
		}

		$args  = array(
			'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, $paged ),
			'total'     => absint( $totalpages ),
			'prev_text' => esc_html__( 'Prev', 'crucial-real-estate' ),
			'next_text' => esc_html__( 'Next', 'crucial-real-estate' ),
			'show_all'  => false,
			'end_size'  => absint( $end_size ),
			'mid_size'  => absint( $mid_size ),
			'type'      => 'array',
		);
		$links = paginate_links( $args );
		?>
<div class="pagination-wrap pagination-numeric">
    <nav class="navigation pagination" role="navigation" aria-label="posts">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'crucial-real-estate' ); ?></h2>
        <div class="nav-links">
            <?php
					$i = 1;
					foreach ( $links as $link ) {
						?>
            <?php echo wp_kses_post( str_replace( 'page-numbers', 'page-link', $link ) ); ?>
            <?php $i++;} ?>
        </div>
    </nav>
</div>
<?php
	}
}

if ( ! function_exists( 'cre_singular_post_thumbnail' ) ) {
	/**
	 * Displays singular an optional post thumbnail.
	 *
	 * @param string $size
	 *
	 * @return void
	 */
	function cre_singular_post_thumbnail( $size = 'full' ) {

		if ( post_password_required() || is_attachment() ) {
			return;
		}
		if ( has_post_thumbnail() ) :
			?>
<figure class="featured-image" data-ratio="auto">
    <?php
				the_post_thumbnail(
					$size,
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
</figure>
<?php
		endif;
	}
}

if ( ! function_exists( 'cre_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * @param string $size
	 *
	 * @return void
	 */
	function cre_post_thumbnail( $size = 'full' ) {

		// Default Placeholder
		$placeholder_image = get_theme_mod(
			cre_get_active_theme_prefix().'_placeholder_image',
			''
		);

		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( has_post_thumbnail() ) :
			?>
<figure class="featured-image" data-ratio="auto">
    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php
					the_post_thumbnail(
						$size,
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>
    </a>
</figure>
<?php else : ?>
<figure class="featured-image" data-ratio="auto>
				<a class=" post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
    <?php if ( $placeholder_image && $placeholder_image != '' ) : ?>
    <img src="<?php echo esc_url( $placeholder_image ); ?>"
        alt="<?php esc_attr_e( 'Placeholder Image', 'crucial-real-estate' ); ?>" />
    <?php else : ?>
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
        alt="<?php esc_attr_e( 'Placeholder Image', 'crucial-real-estate' ); ?>" />
    <?php endif; ?>
    </a>
</figure>
<?php
		endif;
	}
}

if ( ! function_exists( 'cre_template_path' ) ) {
	/**
	 * Set the path to be used in the theme folder.
	 * Templates in this folder will override the plugins frontend templates.
	 *
	 * @return void
	 */
	function cre_template_path() {
		return apply_filters( 'cre_template_path', 'crucial-real-estate/' );
	}
}

if ( ! function_exists( 'cre_get_template_part' ) ) {
	/**
	 * Load template parts.
	 *
	 * @param $part
	 * @param null $id
	 * @return void
	 */
	function cre_get_template_part( $part, $id = null ) {
		if ( $part ) {

			// Look within passed path within the theme - this is priority.
			$template = locate_template(
				array(
					trailingslashit( cre_template_path() ) . $part,
					$part,
				)
			);

			// Get template from plugin directory
			if ( ! $template ) {

				$check_dirs = apply_filters(
					'cre_template_directory',
					array(
						CRE_PLUGIN_DIR . 'templates/',
					)
				);
				foreach ( $check_dirs as $dir ) {
					if ( file_exists( trailingslashit( $dir ) . $part ) ) {
						$template = $dir . $part;
					}
				}
			}

			include $template;
		}
	}
}

if ( ! function_exists( 'cre_property_basic_default_fields' ) ) {
	/**
	 * Return basic builder default fields.
	 */
	function cre_property_basic_default_fields() {

		$default = array(
			array(
				'name'	=> esc_html__( 'Bedroom', 'real-home' ),
				'icon'  => 'fa-bed',
				'image'	=> ''
			),
			array(
				'name'  => esc_html__( 'Bathroom', 'real-home' ),
				'icon'  => 'fa-bath',
				'image'	=> ''
			),
			array(
				'name'  => esc_html__( 'Garage', 'real-home' ),
				'icon'  => 'fa-home',
				'image'	=> ''
			),
			array(
				'name'  => esc_html__( 'Area Size', 'real-home' ),
				'icon'  => 'fa-area-chart',
				'image'	=> ''
			),
			array(
				'name'  => esc_html__( 'Build Year', 'real-home' ),
				'icon'  => 'fa-calendar',
				'image'	=> ''
			),
		);

		return apply_filters(
			'cre_property_basic_default_fields',
			map_deep( wp_unslash( $default ), 'sanitize_text_field' )
		);
	}
}

if ( ! function_exists( 'cre_property_basic_options_migrate' ) ) {
	/**
	 * Return basic options migrated values
	 */
	function cre_property_basic_options_migrate() {

		if ( get_option( 'cre_property_basic_builder_migrate' ) ) {
			return;
		}
		$values = [];
		$args 	= array(
            'numberposts' => -1,
            'post_type'   => 'property'
        );
        $properties = get_posts( $args );
        if ( $properties ) {
            foreach ( $properties as $property ) {
		        $options = cre_property_basic_default_fields();
                foreach ($options as $key => $value) {
					$val 	= '';
					$suffix = sanitize_text_field( strtoupper($value['name']) );
					// bedrooms
					if( $key == 0 ) {
						$val = sanitize_text_field( get_post_meta( $property->ID, 'cre_property_bedrooms', true ) );
					}
					// bathrooms
					elseif( $key == 1 ) {
						$val = sanitize_text_field( get_post_meta( $property->ID, 'cre_property_bathrooms', true ) );
					}
					// Garage
					elseif( $key == 2 ) {
						$val = sanitize_text_field( get_post_meta( $property->ID, 'cre_property_garage', true ) );
					}
					// Area
					elseif( $key == 3 ) {
						$val 	= sanitize_text_field( get_post_meta( $property->ID, 'cre_property_size', true ) );
						$suffix = esc_html__( 'SQ.FT', 'real-home' );
					}
					// Year
					elseif( $key == 4 ) {
						$val = sanitize_text_field( get_post_meta( $property->ID, 'cre_property_year_built', true ) );
					}
					$values[$property->ID][$key][]	= sanitize_text_field( $val );
					$values[$property->ID][$key][] 	= sanitize_text_field( $suffix );
                }
            }
            wp_reset_postdata();
        }
		// Set transfer as complete
		update_option( 'cre_property_basic_builder_migrate', map_deep( wp_unslash( $values ), 'sanitize_text_field' ) );
	}
}
add_action( 'init', 'cre_property_basic_options_migrate' );




if ( ! function_exists( 'cre_get_active_theme_prefix' ) ) {
	/**
	 * Return active theme prefix for the customizer settings.
	 */
	function cre_get_active_theme_prefix() {

		$cre_active_theme = is_child_theme() ? wp_get_theme()->get( 'Template' ) : wp_get_theme()->get( 'TextDomain' );
		$cre_active_theme = esc_html(str_replace('-', '_', $cre_active_theme));
		return apply_filters(
			'cre_active_theme_prefix',
			$cre_active_theme
		);
	}
}