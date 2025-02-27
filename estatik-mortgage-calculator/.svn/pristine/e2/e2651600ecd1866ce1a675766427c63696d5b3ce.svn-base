<?php

/**
 * Class EstatikCalculator.
 */
class EstatikCalculator extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		parent::__construct(
			'emc-mortgage-calculator',
			__( 'Estatik Mortgage Calculator', 'estatik-mortgage-calculator' ),
			array( 'description' => __( 'Display Estatik calculator.', 'estatik-mortgage-calculator' ) )
		);
		add_action( 'emc-mortgage-calculator_page_access_block', array( $this, 'page_access_block' ), 10, 1 );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 *
	 * @param string $hook_suffix
	 */
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}

	/**
	 * Print scripts.
	 *
	 * @since 1.0
	 */
	public function print_scripts() {
		?>
        <script type='text/javascript'>
            ( function( $ ){
                function initColorPicker( widget ) {
                    widget.find( '.emc-calculator-widget-form input[type=color]' ).wpColorPicker( {
                        change: function( e, ui ) {
                            $( e.target ).val( ui.color.toString() );
                            $( e.target ).trigger( 'change' );
                        },
                        clear: function( e, ui ) {
                            $( e.target ).trigger( 'change' );
                        }
                    } );
                }

                function onFormUpdate( event, widget ) {
                    initColorPicker( widget );
                }

                $( document ).on( 'widget-added widget-updated', onFormUpdate );

                $( document ).ready( function() {
                    $( '#widgets-right .widget:has(input[type=color])' ).each( function () {
                        initColorPicker( $( this ) );
                    } );
                } );
            }( jQuery ) );
        </script>
		<?php
	}

	/**
	 * Display calculator widget.
	 *
	 * @param array $args
	 * @param array $instance
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {

		if ( static::can_render( $instance ) ) {

		    foreach ( $instance as $key => $value ) {
		        if ( empty( $value ) ) {
		            unset( $instance[ $key ] );
                }
            }

		    $instance = wp_parse_args( $instance, emc_get_global_settings() );

			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title']: '', $this );

			if ( ! empty( $args['before_widget'] ) )
				echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo ! empty( $args['before_title'] ) ? $args['before_title'] : '';
				echo $title;
				echo ! empty( $args['after_title'] ) ? $args['after_title'] : '';
			}

			echo emc_get_calculator_markup( $instance );

			if ( ! empty( $args['after_widget'] ) )
				echo $args['after_widget'];
		}
	}

	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, emc_get_global_settings() );
		$settings = emc_get_settings_list(); ?>

        <div class="emc-calculator-widget-form">
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'estatik-mortgage-calculator' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"><?php esc_html_e( 'Color', 'estatik-mortgage-calculator' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>" type="color" value="<?php echo esc_attr( $instance['color'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'digits_color' ) ); ?>"><?php esc_html_e( 'Digits color', 'estatik-mortgage-calculator' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'digits_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'digits_color' ) ); ?>" type="color" value="<?php echo esc_attr( $instance['digits_color'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'currency' ) ); ?>"><?php esc_html_e( 'Currency', 'estatik-mortgage-calculator' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'currency' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'currency' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['currency'] ); ?>" />
            </p>

	        <?php if ( ! empty( $settings['popup_type']['values'] ) ) : ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'popup_type' ) ); ?>"><?php esc_html_e( 'Popup Type', 'estatik-mortgage-calculator' ); ?></label>
                    <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'popup_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'popup_type' ) ); ?>">
                        <?php foreach ( $settings['popup_type']['values'] as $value => $label ) : ?>
                            <option <?php selected( $value, $instance['popup_type'] ); ?> value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
	        <?php endif; ?>

		    <?php if ( ! empty( $settings['slider_icon']['values'] ) ) : ?>
                <p class="slider-icon-field">
                    <label for="<?php echo esc_attr( $this->get_field_id( 'slider_icon' ) ); ?>"><?php esc_html_e( 'Slider Icon', 'estatik-mortgage-calculator' ); ?></label>
                    <?php foreach ( $settings['slider_icon']['values'] as $value => $label ) : ?>
                        <label><input <?php checked( $value, $instance['slider_icon'] ); ?> type="radio" class="widefat" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr($this->get_field_name( 'slider_icon' ) ); ?>"/><?php echo $label; ?></label>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout', 'estatik-mortgage-calculator' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
                    <?php foreach ( emc_get_layouts() as $value => $label ) : ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, esc_attr( $instance['layout'] ) ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>

            <?php do_action( 'emc-mortgage-calculator_page_access_block', $instance ); ?>
        </div>

		<?php
	}

	/**
	 * Check is widget can render. Check widget render pages.
	 *
	 * @param $instance
	 * @return bool
	 */
	public static function can_render( $instance )
	{
		$instance = wp_parse_args( $instance, array(
			'pages' => array(),
			'display_type' => null,
		) );

		if ( $instance['display_type'] == 'all' ) {
			return true;
		} elseif ( $instance['display_type'] == 'show_checked' ) {
			$switcher = true;
		} elseif ( $instance['display_type'] == 'hide_checked' ) {
			$switcher = false;
		}

		if ( isset( $switcher ) && ! empty( $instance['pages'] ) ) {

			if ( is_singular( 'properties' ) &&
			     in_array( 'single_property_page', $instance['pages'] ) ) return $switcher;

			if ( is_post_type_archive('properties' ) &&
			     in_array( 'archive_property_page', $instance['pages'] ) ) return $switcher;

			if ( is_archive()   && in_array( 'archive_page', $instance['pages'] ) ) return $switcher;
			if ( is_single()    && in_array( 'single_page',  $instance['pages'] ) ) return $switcher;
			if ( is_search()    && in_array( 'search_page',  $instance['pages'] ) ) return $switcher;
			if ( is_category()  && in_array( 'category_page',$instance['pages'] ) ) return $switcher;

			// WPML integration.
			if ( is_array( $instance['pages'] ) ) {
				$translated_pages_ids = array();

				foreach ( $instance['pages'] as $id ) {
					$translated_pages_ids[] = apply_filters( 'wpml_object_id', $id, 'page', TRUE );
				}
			}

			foreach ( $translated_pages_ids as $page ) {
				if ( ! is_numeric( $page ) ) {
					continue;
				}

				if ( is_page( $page ) ) {
					return $switcher;
				}
			}

			return ! $switcher;
		}

		return true;
	}

	/**
	 * Return values for display type field.
	 *
	 * @return array
	 */
	public static function get_display_types()
	{
		return apply_filters( 'emc_get_search_display_types', array(
			'all' => __( 'All pages', 'estatik-mortgage-calculator' ),
			'show_checked' => __( 'Show on checked pages', 'estatik-mortgage-calculator' ),
			'hide_checked' => __( 'Hide on checked pages', 'estatik-mortgage-calculator' ),
		) );
	}

	/**
	 * Render widget access pages block.
	 *
	 * @param $instance
	 */
	public function page_access_block( $instance )
	{
		$pages_active  = ! empty( $instance['pages'] )        ? $instance['pages'] : array();
		$display_type  = ! empty( $instance['display_type'] ) ? $instance['display_type']   : null;

		if ( $display_types = static::get_display_types() ) : ?>

			<div class="js-emc-access-block">
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>">
						<?php esc_html_e( 'Show on pages', 'estatik-mortgage-calculator' ); ?>:
					</label>
					<select name="<?php echo esc_attr( $this->get_field_name( 'display_type' ) ); ?>" class="widefat js-emc-show-pages" id="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>">
						<?php foreach ( $display_types as $name => $field ) : ?>
							<option <?php selected( $name, $display_type ); ?> value="<?php echo esc_attr( $name ); ?>"><?php esc_html( $field ); ?></option>
						<?php endforeach; ?>
					</select>
				</p>

				<?php if ( $pages = get_pages() ) : ?>
					<div class="js-emc-show-pages-field <?php echo $display_type != 'all' ? 'show' : ''; ?> ?">
						<p><label><?php esc_html_e( 'Select pages', 'estatik-mortgage-calculator' ); ?>:</label></p>
						<div class="emc-checkbox-list">
							<?php foreach ( $pages as $page ) : ?>
								<p>
									<label>
										<input <?php in_array( $page->ID, $pages_active ) ? checked( true ) : null; ?>
											type="checkbox"
											name="<?php echo esc_attr( $this->get_field_name( 'pages[]' ) ); ?>"
											class="widefat" value="<?php echo esc_attr( $page->ID ); ?>"/>
										<?php if ( $title = get_the_title( $page ) ) : ?>
                                            <?php echo esc_html( $title ); ?>
                                        <?php else : ?>
                                            <?php esc_html_e( '(No title)', 'estatik-mortgage-calculator' ); ?>
                                        <?php endif; ?>
									</label>
								</p>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif;
	}
}

/**
 * Register calculator widget.
 */
function emc_register_widget() {
	register_widget( 'EstatikCalculator' );
}

add_action( 'widgets_init', 'emc_register_widget' );
