<?php
class Socials_Ignited_Widget extends WP_Widget {

	protected $defaults = array(
		'title'            => '',
		'color'            => '',
		'background_color' => '',
		'border_radius'    => 50,
		'border_color'     => '',
		'border_width'     => 0,
		'size'             => 17,
		'background_size'  => 30,
		'opacity'          => 1,
		'new_win'          => '',
		'nofollow'         => '',
		'icons'            => array(),
		'customizer_icons' => '',
	);


	public function __construct() {
		parent::__construct( 'socials-ignited', esc_html__( 'Socials Ignited', 'socials-ignited' ), array(
			'description' => esc_html__( 'Social Icons widget, FontAwesome edition', 'socials-ignited' ),
			'classname'   => 'widget_socials_ignited',
		) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );

		$cisiw = get_option( 'cisiw_settings' );
		$cisiw = false !== $cisiw ? $cisiw : array();

		$arr_keys = array(
			'f_color'            => 'color',
			'f_background_color' => 'background_color',
			'f_size'             => 'size',
			'f_background_size'  => 'background_size',
			'f_border_radius'    => 'border_radius',
			'f_border_color'     => 'border_color',
			'f_border_width'     => 'border_width',
			'f_opacity'          => 'opacity',
		);

		foreach ( $arr_keys as $key => $value ) {
			if ( ! isset( $cisiw[ $key ] ) ) {
				continue;
			}

			$this->defaults[ $value ] = $cisiw[ $key ];
		}
	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$before_widget = $args['before_widget'];
		$after_widget  = $args['after_widget'];
		$before_title  = $args['before_title'];
		$after_title   = $args['after_title'];

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$nofollow = '';
		if ( isset( $instance['nofollow'] ) && 'on' === $instance['nofollow'] ) {
			$nofollow = 'rel="nofollow"';
		}

		$icons            = $instance['icons'];
		$customizer_icons = $instance['customizer_icons'];
		$new_win          = 'on' === $instance['new_win'] ? 'target="_blank"' : '';

		echo wp_kses( $before_widget, cisiw_get_allowed_tags() );

		if ( $title ) {
			echo wp_kses( $before_title . $title . $after_title, cisiw_get_allowed_tags() );
		}

		?><div class="ci-socials-ignited ci-socials-ignited-fa"><?php

		do_action( 'socials_ignited_before_the_social_icons' );

		if ( $customizer_icons ) {
			$this->the_social_icons( $new_win, $nofollow );
		} else {
			if ( ! empty( $icons ) ) {
				foreach ( $icons as $field ) {
					echo sprintf( '<a href="%s" %s %s %s><i class="%s"></i></a>',
						esc_url( $field['url'] ),
						$new_win,
						$nofollow,
						! empty( $field['title'] ) ? sprintf( 'title="%s"', esc_attr( $field['title'] ) ) : '',
						esc_attr( Socials_Ignited_Fontawesome_Convert_4_to_5::convert( $field['icon'] ) )
					);
				}
			}
		}

		do_action( 'socials_ignited_after_the_social_icons' );

		?></div><?php

		echo $after_widget;

	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']            = sanitize_text_field( $new_instance['title'] );
		$instance['color']            = cisiw_sanitize_hex_color( $new_instance['color'] );
		$instance['background_color'] = cisiw_sanitize_hex_color( $new_instance['background_color'] );
		$instance['size']             = cisiw_absint_or_empty( $new_instance['size'] );
		$instance['background_size']  = cisiw_absint_or_empty( $new_instance['background_size'] );
		$instance['border_radius']    = cisiw_absint_or_empty( $new_instance['border_radius'] );
		$instance['border_color']     = cisiw_sanitize_hex_color( $new_instance['border_color'] );
		$instance['border_width']     = absint( $new_instance['border_width'] );
		$instance['opacity']          = round( floatval( $new_instance['opacity'] ), 1 );
		$instance['new_win']          = cisiw_sanitize_checkbox( $new_instance['new_win'] );
		$instance['nofollow']         = cisiw_sanitize_checkbox( $new_instance['nofollow'] );
		$instance['icons']            = $this->sanitize_repeating_icons( $new_instance );
		$instance['customizer_icons'] = cisiw_sanitize_checkbox( $new_instance['customizer_icons'] );

		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title            = $instance['title'];
		$color            = $instance['color'];
		$background_color = $instance['background_color'];
		$border_radius    = $instance['border_radius'];
		$border_color     = $instance['border_color'];
		$border_width     = $instance['border_width'];
		$size             = $instance['size'];
		$background_size  = $instance['background_size'];
		$opacity          = $instance['opacity'];
		$new_win          = $instance['new_win'];
		$nofollow         = $instance['nofollow'];
		$icons            = $instance['icons'];
		$customizer_icons = $instance['customizer_icons'];

		?>
		<p class="cisiw-icon-instructions">
			<small>
				<?php
				/* translators: %s is a URL. */
				$guide = __( 'To add icons click on "Add Icon" at the bottom of the widget and then insert the <em>Icon code</em> and its <em>Link URL</em>. Icon codes can be found <a target="_blank" href="%s">here</a>, type them exactly as they are shown (with fa* fa- in front), e.g. <strong>fab fa-facebook</strong>. You can also drag and drop the boxes to rearrange the icons.', 'socials-ignited' );

				echo wp_kses( sprintf( $guide, 'https://fontawesome.com/icons?d=gallery&p=2&m=free' ), array(
					'em'     => array(),
					'strong' => array(),
					'a'      => array(
						'href'   => array(),
						'target' => array(),
					),
				) );
				?>
			</small>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"><?php esc_html_e( 'Icon Color:', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>" type="text" value="<?php echo esc_attr( $color ); ?>" class="cisiw-colorpckr widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>"><?php esc_html_e( 'Icon Background Color:', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_color' ) ); ?>" type="text" value="<?php echo esc_attr( $background_color ); ?>" class="cisiw-colorpckr widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Icon Size (px):', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" type="number" value="<?php echo esc_attr( $size ); ?>" class="widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'background_size' ) ); ?>"><?php esc_html_e( 'Background Size (px):', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'background_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_size' ) ); ?>" type="number" value="<?php echo esc_attr( $background_size ); ?>" class="widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>"><?php esc_html_e( 'Border Radius (px):', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_radius' ) ); ?>" type="number" value="<?php echo esc_attr( $border_radius ); ?>" class="widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'border_color' ) ); ?>"><?php esc_html_e( 'Border Color:', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'border_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_color' ) ); ?>" type="text" value="<?php echo esc_attr( $border_color ); ?>" class="cisiw-colorpckr widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'border_width' ) ); ?>"><?php esc_html_e( 'Border Width (px):', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'border_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_width' ) ); ?>" type="number" min="0" value="<?php echo esc_attr( $border_width ); ?>" class="widefat"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'opacity' ) ); ?>"><?php esc_html_e( 'Opacity (0.1 - 1):', 'socials-ignited' ); ?></label><input id="<?php echo esc_attr( $this->get_field_id( 'opacity' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'opacity' ) ); ?>" type="number" min="0.1" max="1" step="0.1" value="<?php echo esc_attr( $opacity ); ?>" class="widefat"/></p>
		<p><label><input id="<?php echo esc_attr( $this->get_field_id( 'new_win' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'new_win' ) ); ?>" type="checkbox" value="on" <?php checked( 'on', $new_win ); ?> /> <?php esc_html_e( 'Open in new window.', 'socials-ignited' ); ?></label></p>
		<p><label><input id="<?php echo esc_attr( $this->get_field_id( 'nofollow' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nofollow' ) ); ?>" type="checkbox" value="on" <?php checked( 'on', $nofollow ); ?> /> <?php echo wp_kses( __( 'Add <code>rel="nofollow"</code> to links.', 'socials-ignited' ), array( 'code' => array() ) ); ?></label></p>
		<p><label><input id="<?php echo esc_attr( $this->get_field_id( 'customizer_icons' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'customizer_icons' ) ); ?>" type="checkbox" value="on" <?php checked( 'on', $customizer_icons ); ?> /> <?php esc_html_e( 'Display the Socials set in the Customizer.', 'socials-ignited' ); ?></label></p>

		<span class="hid_id" data-hidden-name="<?php echo esc_attr( $this->get_field_name( 'icons' ) ); ?>"></span>

		<fieldset class="ci-repeating-fields">
			<div class="inner">
				<?php
					if ( ! empty( $icons ) ) {
						foreach ( $icons as $field ) {
							?>
							<div class="post-field">
								<label><?php esc_html_e( 'Icon Code:', 'socials-ignited' ); ?> <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'icon_code' ) ); ?>[]" value="<?php echo esc_attr( Socials_Ignited_Fontawesome_Convert_4_to_5::convert( $field['icon'] ) ); ?>" class="widefat"/></label>
								<label><?php esc_html_e( 'Link URL:', 'socials-ignited' ); ?> <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'icon_url' ) ); ?>[]" value="<?php echo esc_url( $field['url'] ); ?>" class="widefat"/></label>
								<label><?php esc_html_e( 'Title text (optional):', 'socials-ignited' ); ?> <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'icon_title' ) ); ?>[]" value="<?php echo esc_attr( $field['title'] ); ?>" class="widefat"/></label>
								<p class="ci-repeating-remove-action"><a href="#" class="button ci-repeating-remove-field"><i class="dashicons dashicons-dismiss"></i><?php esc_html_e( 'Remove me', 'ci_theme' ); ?></a></p>
							</div>
							<?php
						}
					}
				?>
				<div class="post-field field-prototype" style="display: none;">
					<label><?php esc_html_e( 'Icon Code:', 'socials-ignited' ); ?> <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'icon_code' ) ); ?>[]" value="" class="widefat"/></label>
					<label><?php esc_html_e( 'Link URL:', 'socials-ignited' ); ?> <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'icon_url' ) ); ?>[]" value="" class="widefat"/></label>
					<label><?php esc_html_e( 'Title text (optional):', 'socials-ignited' ); ?> <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'icon_title' ) ); ?>[]" value="" class="widefat"/></label>
					<p class="ci-repeating-remove-action"><a href="#" class="button ci-repeating-remove-field"><i class="dashicons dashicons-dismiss"></i><?php esc_html_e( 'Remove me', 'ci_theme' ); ?></a></p>
				</div>
			</div>
			<a href="#" class="ci-repeating-add-field button"><i class="dashicons dashicons-plus-alt"></i><?php esc_html_e( 'Add Field', 'ci_theme' ); ?></a>
		</fieldset>
		<?php
	}

	public function enqueue_css() {
		$settings = $this->get_settings();

		if ( empty( $settings ) ) {
			return;
		}

		foreach ( $settings as $instance_id => $instance ) {
			$id = $this->id_base . '-' . $instance_id;

			if ( ! is_active_widget( false, $id, $this->id_base ) ) {
				continue;
			}

			$color            = $instance['color'];
			$background_color = $instance['background_color'];
			$size             = $instance['size'];
			$background_size  = $instance['background_size'];
			$border_radius    = $instance['border_radius'];
			$border_color     = ! empty( $instance['border_color'] ) ? $instance['border_color'] : '';
			$border_width     = ! empty( $instance['border_width'] ) ? $instance['border_width'] : '';
			$opacity          = $instance['opacity'];

			$css          = '';
			$css_hover    = '';
			$widget_style = '';

			if ( ! empty( $color ) ) {
				$css .= 'color: ' . $color . '; ';
			}
			if ( ! empty( $background_color ) ) {
				$css .= 'background: ' . $background_color . '; ';
			}
			if ( ! empty( $size ) ) {
				$css .= 'font-size: ' . $size . 'px; ';
			}
			if ( ! empty( $background_size ) ) {
				$css .= 'width: ' . $background_size . 'px; ';
				$css .= 'height: ' . $background_size . 'px; ';
				$css .= 'line-height: ' . $background_size . 'px; ';
			}
			if ( ! empty( $border_radius ) ) {
				$css .= 'border-radius: ' . $border_radius . 'px; ';
			}
			if ( ! empty( $border_color ) ) {
				$css .= 'border-color: ' . $border_color . '; ';
			}
			if ( ! empty( $border_width ) ) {
				$css .= 'border-style: solid; ';
				$css .= 'border-width: ' . $border_width . 'px; ';
			}
			if ( ! empty( $opacity ) ) {
				$css .= 'opacity: ' . $opacity . '; ';
				if ( $opacity < 1 ) {
					$css_hover = '#' . $id . ' a:hover i { opacity: 1; }' . PHP_EOL;
				}
			}

			if ( ! empty( $css ) ) {
				$css          = '#' . $id . ' i { ' . $css . ' } ' . PHP_EOL;
				$widget_style = $css . $css_hover;
				wp_add_inline_style( 'socials-ignited', $widget_style );
			}
		}

	}

	private function sanitize_repeating_icons( $POST_array ) {
		if ( empty( $POST_array ) || ! is_array( $POST_array ) ) {
			return array();
		}

		$codes  = $POST_array['icon_code'];
		$urls   = $POST_array['icon_url'];
		$titles = $POST_array['icon_title'];

		$count = max(
			count( $codes ),
			count( $urls ),
			count( $titles )
		);

		$new_fields = array();

		$records_count = 0;

		for ( $i = 0; $i < $count; $i ++ ) {
			if ( empty( $codes[ $i ] ) && empty( $urls[ $i ] ) ) {
				continue;
			}

			$new_fields[ $records_count ]['icon']  = Socials_Ignited_Fontawesome_Convert_4_to_5::convert( sanitize_text_field( $codes[ $i ] ) );
			$new_fields[ $records_count ]['url']   = esc_url_raw( $urls[ $i ] );
			$new_fields[ $records_count ]['title'] = sanitize_text_field( $titles[ $i ] );

			$records_count++;
		}
		return $new_fields;
	}

	public function the_social_icons( $new_win, $nofollow ) {
		$networks = cisiw_get_social_networks();

		$used_urls = array();
		$used_rss  = get_theme_mod( 'socials_ignited_networks_rss_feed', get_bloginfo( 'rss2_url' ) );

		foreach ( $networks as $network ) {
			if ( get_theme_mod( 'socials_ignited_networks_' . $network['name'] ) ) {
				$used_urls[ $network['name'] ] = get_theme_mod( 'socials_ignited_networks_' . $network['name'] );
			}
		}

		$used_urls = apply_filters( 'socials_ignited_social_icons_used_urls', $used_urls );
		$used_rss  = apply_filters( 'socials_ignited_social_icons_used_rss', $used_rss );

		$has_rss = $used_rss ? true : false;

		if ( count( $used_urls ) > 0 || $has_rss ) {
			$template = '<a href="%1$s" %2$s %3$s class="social-icon"><i class="%4$s"></i></a>';

			foreach ( $networks as $network ) {
				if ( ! empty( $used_urls[ $network['name'] ] ) ) {
					$html = sprintf(
						$template,
						esc_url( $used_urls[ $network['name'] ] ),
						$new_win,
						$nofollow,
						esc_attr( $network['icon'] )
					);

					echo wp_kses_post( $html );
				}
			}

			if ( $has_rss ) {
				$html = sprintf(
					$template,
					$used_rss,
					$new_win,
					$nofollow,
					esc_attr( 'fas fa-rss' )
				);

				echo wp_kses_post( $html );
			}
		}
	}

}
