<?php
/**
 * Plugin Name: SiteMile Social Icons Widget
 * Plugin URI: https://wordpress.org/plugins/sitemile-social-icons-widget/
 * Description: A plugin that offers you a widget, which contains social icons. SVG icons, color customisation. Drag and drop.
 * Author: SiteMile
 * Author URI: https://www.sitemile.com/
 * Version: 1.0.1
 * Text Domain: sitemile-social-icons
 * Domain Path: /languages
 *
 * License: GNU General Public License v2.0 (or later)
 * License URI: https://www.opensource.org/licenses/gpl-license.php
 *
 * @package sitemile-social-icons
 */

add_action( 'plugins_loaded', 'sitemile_widget_icons_load_textdomain' );


function sitemile_widget_icons_load_textdomain() {
	load_plugin_textdomain( 'sitemile-social-icons-widget', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

class sitemile_widget_Icons_Widget extends WP_Widget {


	protected $version = '1.0.1';
	protected $defaults;
	protected $sizes;
	protected $profiles;
	protected $active_instances;
	protected $disable_css_output;


	function __construct() {


		$this->defaults = apply_filters( 'sitemile_widget_default_styles', array(
			'title'                  => '',
			'new_window'             => 0,
			'size'                   => 36,
			'border_radius'          => 3,
			'border_width'           => 0,
			'border_color'           => '#ffffff',
			'border_color_hover'     => '#ffffff',
			'icon_color'             => '#ffffff',
			'icon_color_hover'       => '#ffffff',
			'background_color'       => '#999999',
			'background_color_hover' => '#666666',
			'alignment'              => 'alignleft',
			'behance'                => '',
			'bloglovin'              => '',
			'dribbble'               => '',
			'email'                  => '',
			'facebook'               => '',
			'flickr'                 => '',
			'github'                 => '',
			'gplus'                  => '',
			'instagram'              => '',
			'linkedin'               => '',
			'medium'                 => '',
			'periscope'              => '',
			'phone'                  => '',
			'pinterest'              => '',
			'rss'                    => '',
			'snapchat'               => '',
			'stumbleupon'            => '',
			'tumblr'                 => '',
			'twitter'                => '',
			'vimeo'                  => '',
			'xing'                   => '',
			'youtube'                => '',
		) );


		$this->profiles = apply_filters( 'sitemile_widget_default_profiles', array(

			'twitter' => array(
				'label'   => __( 'Twitter URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'twitter', __( 'Twitter', 'sitemile-social-icons-widget' ) ),
			),

			'facebook' => array(
				'label'   => __( 'Facebook URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'facebook', __( 'Facebook', 'sitemile-social-icons-widget' ) ),
			),


			'linkedin' => array(
				'label'   => __( 'Linkedin URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'linkedin', __( 'LinkedIn', 'sitemile-social-icons-widget' ) ),
			),

			'behance' => array(
				'label'   => __( 'Behance URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'behance', __( 'Behance', 'sitemile-social-icons-widget' ) ),
			),
			'bloglovin' => array(
				'label'   => __( 'Bloglovin URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'bloglovin', __( 'Bloglovin', 'sitemile-social-icons-widget' ) ),
			),
			'dribbble' => array(
				'label'   => __( 'Dribbble URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'dribbble', __( 'Dribbble', 'sitemile-social-icons-widget' ) ),
			),
			'email' => array(
				'label'   => __( 'Email URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'email', __( 'Email', 'sitemile-social-icons-widget' ) ),
			),

			'flickr' => array(
				'label'   => __( 'Flickr URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'flickr', __( 'Flickr', 'sitemile-social-icons-widget' ) ),
			),
			'github' => array(
				'label'   => __( 'GitHub URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'github', __( 'GitHub', 'sitemile-social-icons-widget' ) ),
			),
			'gplus' => array(
				'label'   => __( 'Google+ URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'gplus', __( 'Google+', 'sitemile-social-icons-widget' ) ),
			),
			'instagram' => array(
				'label'   => __( 'Instagram URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'instagram', __( 'Instagram', 'sitemile-social-icons-widget' ) ),
			),

			'medium' => array(
				'label'   => __( 'Medium URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'medium', __( 'Medium', 'sitemile-social-icons-widget' ) ),
			),
			'periscope' => array(
				'label'   => __( 'Periscope URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'periscope', __( 'Periscope', 'sitemile-social-icons-widget' ) ),
			),
			'phone' => array(
				'label'   => __( 'Phone URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'phone', __( 'Phone', 'sitemile-social-icons-widget' ) ),
			),
			'pinterest' => array(
				'label'   => __( 'Pinterest URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'pinterest', __( 'Pinterest', 'sitemile-social-icons-widget' ) ),
			),
			'rss' => array(
				'label'   => __( 'RSS URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'rss', __( 'RSS', 'sitemile-social-icons-widget' ) ),
			),
			'snapchat' => array(
				'label'   => __( 'Snapchat URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'snapchat', __( 'Snapchat', 'sitemile-social-icons-widget' ) ),
			),
			'stumbleupon' => array(
				'label'   => __( 'StumbleUpon URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'stumbleupon', __( 'StumbleUpon', 'sitemile-social-icons-widget' ) ),
			),
			'tumblr' => array(
				'label'   => __( 'Tumblr URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'tumblr', __( 'Tumblr', 'sitemile-social-icons-widget' ) ),
			),

			'vimeo' => array(
				'label'   => __( 'Vimeo URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'vimeo', __( 'Vimeo', 'sitemile-social-icons-widget' ) ),
			),
			'xing' => array(
				'label'   => __( 'Xing URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'xing', __( 'xing', 'sitemile-social-icons-widget' ) ),
			),
			'youtube' => array(
				'label'   => __( 'YouTube URI', 'sitemile-social-icons-widget' ),
				'pattern' => $this->get_icon_( 'youtube', __( 'YouTube', 'sitemile-social-icons-widget' ) ),
			),
		) );


		$this->disable_css_output = apply_filters( 'sitemile_widget_disable_custom_css', false );

		$widget_ops = array(
			'classname'   => 'sitemile-social-icons-widget',
			'description' => __( 'Displays select social icons.', 'sitemile-social-icons-widget' ),
		);

		$control_ops = array(
			'id_base' => 'sitemile-social-icons-widget',
		);

		$this->active_instances = array();

		parent::__construct( 'sitemile-social-icons-widget', __( 'Simple Social Icons', 'sitemile-social-icons-widget' ), $widget_ops, $control_ops );

		/** Enqueue scripts and styles */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );

		/** Load CSS in <head> */
		add_action( 'wp_footer', array( $this, 'css' ) );

		/** Load color picker */
		add_action( 'admin_enqueue_scripts', array( $this, 'load_color_picker' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );

	}


	function load_color_picker( $hook ) {
		if( 'widgets.php' != $hook )
			return;
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'underscore' );
	}


	function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.ssiw-color-picker' ).wpColorPicker( {
						change: function ( event ) {
							var $picker = jQuery( this );
							_.throttle(setTimeout(function () {
								$picker.trigger( 'change' );
							}, 5), 250);
						},
						width: 235,
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				jQuery( document ).on( 'widget-added widget-updated', onFormUpdate );

				jQuery( document ).ready( function() {
					jQuery( '#widgets-right .widget:has(.ssiw-color-picker)' ).each( function () {
						initColorPicker( jQuery( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}


	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p><label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'sitemile-social-icons-widget' ); ?></label> <input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

		<p><label><input id="<?php echo esc_html($this->get_field_id( 'new_window' )); ?>" type="checkbox" name="<?php echo esc_html($this->get_field_name( 'new_window' )); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'sitemile-social-icons-widget' ); ?></label></p>

		<?php if ( ! $this->disable_css_output ) { ?>

			<p><label for="<?php echo esc_html($this->get_field_id( 'size' )); ?>"><?php _e( 'Icon Size', 'sitemile-social-icons-widget' ); ?>:</label> <input id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" type="text" value="<?php echo esc_attr( $instance['size'] ); ?>" size="3" />px</p>

			<p><label for="<?php echo esc_html($this->get_field_id( 'border_radius' )); ?>"><?php _e( 'Icon Border Radius:', 'sitemile-social-icons-widget' ); ?></label> <input id="<?php echo esc_html($this->get_field_id( 'border_radius' )); ?>" name="<?php echo esc_html($this->get_field_name( 'border_radius' )); ?>" type="text" value="<?php echo esc_html(esc_attr( $instance['border_radius'] )); ?>" size="3" />px</p>

			<p><label for="<?php echo esc_html($this->get_field_id( 'border_width' )); ?>"><?php _e( 'Border Width:', 'sitemile-social-icons-widget' ); ?></label> <input id="<?php echo esc_html($this->get_field_id( 'border_width' )); ?>" name="<?php echo esc_html($this->get_field_name( 'border_width' )); ?>" type="text" value="<?php echo esc_html(esc_attr( $instance['border_width'] )); ?>" size="3" />px</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'alignment' ); ?>"><?php _e( 'Alignment', 'sitemile-social-icons-widget' ); ?>:</label>
				<select id="<?php echo $this->get_field_id( 'alignment' ); ?>" name="<?php echo $this->get_field_name( 'alignment' ); ?>">
					<option value="alignleft" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Left', 'sitemile-social-icons-widget' ); ?></option>
					<option value="aligncenter" <?php selected( 'aligncenter', $instance['alignment'] ) ?>><?php _e( 'Align Center', 'sitemile-social-icons-widget' ); ?></option>
					<option value="alignright" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Right', 'sitemile-social-icons-widget' ); ?></option>
				</select>
			</p>

			<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />

			<p><label for="<?php echo $this->get_field_id( 'background_color_hover' ); ?>"><?php _e( 'Icon Hover Color:', 'sitemile-social-icons-widget' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'icon_color_hover' ); ?>" type="text" class="ssiw-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['icon_color_hover'] ); ?>" value="<?php echo esc_attr( $instance['icon_color_hover'] ); ?>" size="6" /></p>

			<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Icon Color:', 'sitemile-social-icons-widget' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" type="text" class="ssiw-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['icon_color'] ); ?>" value="<?php echo esc_attr( $instance['icon_color'] ); ?>" size="6" /></p>


			<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:', 'sitemile-social-icons-widget' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" class="ssiw-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['background_color'] ); ?>" value="<?php echo esc_attr( $instance['background_color'] ); ?>" size="6" /></p>

			<p><label for="<?php echo $this->get_field_id( 'background_color_hover' ); ?>"><?php _e( 'Background Hover Color:', 'sitemile-social-icons-widget' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'background_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'background_color_hover' ); ?>" type="text" class="ssiw-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['background_color_hover'] ); ?>" value="<?php echo esc_attr( $instance['background_color_hover'] ); ?>" size="6" /></p>

			<p><label for="<?php echo $this->get_field_id( 'border_color' ); ?>"><?php _e( 'Border Color:', 'sitemile-social-icons-widget' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name( 'border_color' ); ?>" type="text" class="ssiw-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['border_color'] ); ?>" value="<?php echo esc_attr( $instance['border_color'] ); ?>" size="6" /></p>

			<p><label for="<?php echo $this->get_field_id( 'border_color_hover' ); ?>"><?php _e( 'Border Hover Color:', 'sitemile-social-icons-widget' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'border_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'border_color_hover' ); ?>" type="text" class="ssiw-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['border_color_hover'] ); ?>" value="<?php echo esc_attr( $instance['border_color_hover'] ); ?>" size="6" /></p>

			<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />
		<?php } ?>

		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {

			printf( '<p><label for="%s">%s:</label></p>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			printf( '<p><input type="text" id="%s" name="%s" value="%s" class="widefat" />', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $this->get_field_name( $profile ) ), $instance[ $profile ] );
			printf( '</p>' );

		}

	}


	function update( $newinstance, $oldinstance ) {

		// Fields that can be transparent if their values are unset.
		$can_be_transparent = array(
			'background_color',
			'background_color_hover',
			'border_color',
			'border_color_hover',
		);

		foreach ( $newinstance as $key => $value ) {

			/** Border radius and Icon size must not be empty, must be a digit */
			if ( ( 'border_radius' == $key || 'size' == $key ) && ( '' == $value || ! ctype_digit( $value ) ) ) {
				$newinstance[ $key ] = 0;
			}

			if ( ( 'border_width' == $key || 'size' == $key ) && ( '' == $value || ! ctype_digit( $value ) ) ) {
				$newinstance[ $key ] = 0;
			}

			/** Accept empty colors for permitted keys. */
			elseif ( in_array( $key, $can_be_transparent, true ) && '' == trim( $value ) ) {
				$newinstance[ $key ] = '';
			}

			/** Validate hex code colors */
			elseif ( strpos( $key, '_color' ) && 0 == preg_match( '/^#(([a-fA-F0-9]{3}$)|([a-fA-F0-9]{6}$))/', $value ) ) {
				$newinstance[ $key ] = $oldinstance[ $key ];
			}

			/** Sanitize Profile URIs */
			elseif ( array_key_exists( $key, (array) $this->profiles ) && ! is_email( $value ) && ! 'phone' === $key ) {
				$newinstance[ $key ] = esc_url( $newinstance[ $key ] );
			}
		}

		return $newinstance;

	}


	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			$output = '';

			$profiles = (array) $this->profiles;

			foreach ( $profiles as $profile => $data ) {

				if ( empty( $instance[ $profile ] ) )
					continue;

				$new_window = $instance['new_window'] ? 'target="_blank" rel="noopener noreferrer"' : '';

				if ( is_email( $instance[ $profile ] ) || false !== strpos( $instance[ $profile ], 'mailto:' ) )
					$new_window = '';

				if ( is_email( $instance[ $profile ] ) ) {
					$output .= sprintf( $data['pattern'], 'mailto:' . esc_attr( antispambot( $instance[ $profile ] ) ), $new_window );
				} elseif ( 'phone' === $profile ) {
					$output .= sprintf( $data['pattern'], 'tel:' . esc_attr( antispambot( $instance[ $profile ] ) ), $new_window );
				} else {
					$output .= sprintf( $data['pattern'], esc_url( $instance[ $profile ] ), $new_window );
				}

			}

			if ( $output ) {
				$output = str_replace( '{WIDGET_INSTANCE_ID}', $this->number, $output );
				printf( '<ul class="%s">%s</ul>', $instance['alignment'], $output );
			}

		echo $after_widget;

		$this->active_instances[] = $this->number;

	}

	function enqueue_own_css() {


		$cssfile = apply_filters( 'sitemile_widget_default_stylesheet', plugin_dir_url( __FILE__ ) . 'plugin.css' );

		wp_enqueue_style( 'sitemile-social-icons-font', esc_url( $cssfile ), array(), $this->version, 'all' );

		if ( ! function_exists( 'is_amp_endpoint' ) || ( function_exists( 'is_amp_endpoint' ) && ! is_amp_endpoint() ) ) {
			wp_enqueue_script('svg-x-use', plugin_dir_url(__FILE__) . 'svgxuse.js', array(), '1.1.21' );
		}
	}


	function own_css() {


		$all_instances = $this->get_settings();

		$css = '';

		foreach ( $this->active_instances as $instance_id ) {

			if ( ! isset( $all_instances[ $instance_id ] ) || $this->disable_css_output ) {
				continue;
			}

			$instance = wp_parse_args( $all_instances[ $instance_id ], $this->defaults );

			$font_size    = round( (int) $instance['size'] / 2 );
			$icon_padding = round( (int) $font_size / 2 );


			$instance['background_color']       = $instance['background_color'] ?: 'transparent';
			$instance['border_color']           = $instance['border_color'] ?: 'transparent';
			$instance['background_color_hover'] = $instance['background_color_hover'] ?: 'transparent';
			$instance['border_color_hover']     = $instance['border_color_hover'] ?: 'transparent';


			$css .= '
			#sitemile-social-icons-' . $instance_id . ' ul li a,
			#sitemile-social-icons-' . $instance_id . ' ul li a:hover,
			#sitemile-social-icons-' . $instance_id . ' ul li a:focus {
				background-color: ' . $instance['background_color'] . ' !important;
				border-radius: ' . $instance['border_radius'] . 'px;
				color: ' . $instance['icon_color'] . ' !important;
				border: ' . $instance['border_width'] . 'px ' . $instance['border_color'] . ' solid !important;
				font-size: ' . $font_size . 'px;
				padding: ' . $icon_padding . 'px;
			}

			#sitemile-social-icons-' . $instance_id . ' ul li a:hover,
			#sitemile-social-icons-' . $instance_id . ' ul li a:focus {
				background-color: ' . $instance['background_color_hover'] . ' !important;
				border-color: ' . $instance['border_color_hover'] . ' !important;
				color: ' . $instance['icon_color_hover'] . ' !important;
			}

			#sitemile-social-icons-' . $instance_id . ' ul li a:focus {
				outline: 1px dotted ' . $instance['background_color_hover'] . ' !important;
			}';

		}

		// Minify a bit.
		$css = str_replace( "\t", '', $css );
		$css = str_replace( array( "\n", "\r" ), ' ', $css );

		echo '<style type="text/css" media="screen">' . esc_html($css) . '</style>';

	}


	function get_icon_( $icon, $label ) {
		$markup = '<li class="stml-' . $icon . '"><a href="%s" %s>';
		$markup .= '<svg role="img" class="social-' . $icon . '" aria-labelledby="social-' . $icon . '-{WIDGET_INSTANCE_ID}">';
		$markup .= '<title id="social-' . $icon . '-{WIDGET_INSTANCE_ID}' . '">' . $label . '</title>';
		$markup .= '<use xlink:href="' . esc_attr( plugin_dir_url( __FILE__ ) . 'symbol-defs.svg#social-' . $icon ) . '"></use>';
		$markup .= '</svg></a></li>';


		return apply_filters( 'sitemile_widget_icon_html', $markup, $icon, $label );
	}


	public static function sitemile_plugin_uninstall() {
		delete_option( 'widget_sitemile-social-icons' );
	}


}

register_uninstall_hook( __FILE__, array( 'sitemile_widget_Icons_Widget', 'sitemile_plugin_uninstall' ) );
add_action( 'widgets_init', 'sitemile_register_widget' );

function sitemile_register_widget() {

	register_widget( 'sitemile_widget_Icons_Widget' );

}
