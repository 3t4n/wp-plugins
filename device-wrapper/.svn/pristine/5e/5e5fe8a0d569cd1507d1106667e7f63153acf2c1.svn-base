<?php

/**
 * Funtions Initializer
 *
 * @since   1.0.0
 * @package Device Wrapper
 */
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
add_action( 'init', 'device_wrapper_block_assets' );
/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function device_wrapper_block_assets() {
    // phpcs:ignore
    if ( !is_admin() ) {
        // include SimpleBar styles
        wp_enqueue_style(
            'device_wrapper-simplebar',
            plugins_url( 'src/css/simplebar.css', dirname( __FILE__ ) ),
            null,
            '6.2.1'
        );
        // include SimpleBar script
        wp_enqueue_script(
            'device_wrapper-simplebar',
            plugins_url( 'src/js/simplebar.min.js', dirname( __FILE__ ) ),
            '',
            '6.2.1',
            true
        );
        // include dragscroll script
        wp_enqueue_script(
            'device_wrapper-dragscroll',
            plugins_url( 'src/js/dragscroll.js', dirname( __FILE__ ) ),
            '',
            '0.0.8',
            true
        );
    }
    // Register block styles for both frontend + backend.
    wp_enqueue_style(
        'device_wrapper-style-css',
        // Handle.
        plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
        // Block style CSS.
        ( is_admin() ? array('wp-block-editor') : null ),
        // Dependency to include the CSS after it.
        null
    );
    // Register block editor script for backend.
    wp_register_script(
        'device_wrapper-block-js',
        // Handle.
        plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
        // Block.build.js: We register the block here. Built with Webpack.
        array(
            'wp-blocks',
            'wp-i18n',
            'wp-element',
            'wp-block-editor'
        ),
        // Dependencies, defined above.
        null,
        // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
        true
    );
    // Register block editor script for frontend.
    if ( !is_admin() ) {
        wp_enqueue_script(
            'device_wrapper-front-js',
            // Handle.
            plugins_url( '/dist/front.build.js', dirname( __FILE__ ) ),
            // Block.build.js: We register the block here. Built with Webpack.
            array('jquery'),
            // Dependencies, defined above.
            null,
            // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
            true
        );
    }
    // Register block editor styles for backend.
    wp_register_style(
        'device_wrapper-block-editor-css',
        // Handle.
        plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
        // Block editor CSS.
        array('wp-edit-blocks'),
        // Dependency to include the CSS after it.
        null
    );
    // WP Localized globals. Use dynamic PHP stuff in JavaScript via `device_wrapper` object.
    wp_localize_script( 
        'device_wrapper-block-js',
        'device_wrapper',
        // Array containing dynamic data for a JS Global.
        [
            'pluginDeviceUrl'      => DEVICE_WRAPPER_PLUGIN_DEVICE_URL,
            'pluginIconUrl'        => DEVICE_WRAPPER_PLUGIN_ICON_URL,
            'pluginUrl'            => DEVICE_WRAPPER_PLUGIN_URL,
            'can_use_premium_code' => device_wrapper_freemius()->can_use_premium_code(),
        ]
     );
    wp_set_script_translations( 'device_wrapper-block-js', 'device-wrapper', plugin_dir_path( __DIR__ ) . 'languages' );
    /**
     * Register Gutenberg block on server-side.
     *
     * Register the block on server-side to ensure that the block
     * scripts and styles for both frontend and backend are
     * enqueued when the editor loads.
     *
     * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
     * @since 1.0.0
     */
    $attributes = array(
        'method'           => array(
            'type'    => 'string',
            'default' => 'src',
        ),
        'device'           => array(
            'type'    => 'string',
            'default' => 'iphone_14_pro_v2',
        ),
        'fit'              => array(
            'type'    => 'string',
            'default' => 'cover',
        ),
        'link'             => array(
            'type'    => 'string',
            'default' => '',
        ),
        'new_tab'          => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'width'            => array(
            'type'    => 'string',
            'default' => '',
        ),
        'units'            => array(
            'type'    => 'string',
            'default' => 'px',
        ),
        'rotate'           => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'autoplay'         => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'play_button'      => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'controls'         => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'loop'             => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'mute'             => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'video_preview'    => array(
            'type'    => 'string',
            'default' => '',
        ),
        'autoplay_on_view' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'align'            => array(
            'type'    => 'string',
            'default' => '',
        ),
        'anchor'           => array(
            'type'    => 'string',
            'default' => '',
        ),
        'class'            => array(
            'type'    => 'string',
            'default' => '',
        ),
        'media_type'       => array(
            'type'    => 'string',
            'default' => 'image',
        ),
        'mediaURL'         => array(
            'type'    => 'string',
            'default' => '',
        ),
        'mediaID'          => array(
            'type'    => 'number',
            'default' => 0,
        ),
        'previewMediaID'   => array(
            'type'    => 'number',
            'default' => 0,
        ),
    );
    register_block_type( 'device-wrapper/block-device-wrapper', array(
        'style'           => 'device_wrapper-style-css',
        'editor_script'   => 'device_wrapper-block-js',
        'editor_style'    => 'device_wrapper-block-editor-css',
        'render_callback' => 'device_wrapper_render',
        'attributes'      => $attributes,
    ) );
}

/**
 * Encode SVG into URL
 * https://www.genieblog.ch/blog/en/2018/how-to-encode-an-svg-for-the-src-attribute-using-php/
 */
function device_wrapper_encode_svg(  $svgPath, $color  ) {
    $data = file_get_contents( $svgPath );
    $data = str_replace( '<svg', '<svg style="--device-wrapper--device-color:' . esc_attr( $color ) . '" ', $data );
    $data = preg_replace( '/\\v(?:[\\v\\h]+)/', ' ', $data );
    $data = str_replace( '"', "'", $data );
    $data = rawurlencode( $data );
    // re-decode a few characters understood by browsers to improve compression
    $data = str_replace( '%20', ' ', $data );
    $data = str_replace( '%3D', '=', $data );
    $data = str_replace( '%3A', ':', $data );
    $data = str_replace( '%2F', '/', $data );
    return $data;
}

add_shortcode( 'device-wrapper', 'device_wrapper_shortcode' );
/**
 * Shortcode for mockups
 */
function device_wrapper_shortcode(  $atts, $content = null  ) {
    ob_start();
    $atts = shortcode_atts( [
        'src'              => '',
        'method'           => 'src',
        'device'           => 'iphone_14_pro_v2',
        'fit'              => 'cover',
        'link'             => '',
        'new_tab'          => '1',
        'width'            => '',
        'units'            => 'px',
        'rotate'           => '0',
        'autoplay'         => '0',
        'play_button'      => '0',
        'controls'         => '0',
        'loop'             => '1',
        'mute'             => '1',
        'video_preview'    => '',
        'autoplay_on_view' => '',
        'bg_color'         => '',
        'device_color'     => '',
        'media_type'       => 'image',
        'align'            => '',
        'anchor'           => '',
        'class'            => '',
    ], $atts );
    $video_formats = array('mp4', 'ogg', 'webm');
    $is_rotated = !empty( $atts['rotate'] ) && boolval( $atts['rotate'] ) === true;
    $device_url = esc_url( DEVICE_WRAPPER_PLUGIN_DEVICE_URL . $atts['device'] . (( $is_rotated ? "-ls" : "" )) . ".svg" );
    // Check if device file exists
    // https://stackoverflow.com/a/25356177/2573521
    $svg_file_headers = get_headers( $device_url );
    if ( strpos( $svg_file_headers[0], '404' ) !== false ) {
        return ob_get_clean();
    } else {
        // Get SVG code from file
        // https://stackoverflow.com/a/30000684/2573521
        $svg_file = file_get_contents( $device_url );
        $find_string = '<svg';
        $position = strpos( $svg_file, $find_string );
        $svg_file_code = substr( $svg_file, $position );
        //print_r($svg_file_code);
        // Convert SVG code to URL
        // https://stackoverflow.com/a/65900719/2573521
        $encoded_svg = rawurlencode( str_replace( ["\r", "\n"], ' ', $svg_file_code ) );
        // Another method to convert SVG to URL, just in case.
        //$encoded_svg = device_wrapper_encode_svg($device_url, $atts['device_color']);
    }
    $src = '';
    if ( $atts['method'] === 'src' || $atts['method'] === 'url' ) {
        $src = esc_url( $atts['src'] );
    } else {
    }
    $block_id = esc_attr( uniqid( 'device-wrapper_' ) );
    $device_width = (float) $atts['width'];
    $has_autoplay = boolval( $atts['autoplay'] );
    $has_autoplay_on_view = boolval( $atts['autoplay_on_view'] );
    $has_play_button = boolval( $atts['play_button'] );
    $has_new_tab = boolval( $atts['new_tab'] );
    $has_controls = boolval( $atts['controls'] );
    $has_loop = boolval( $atts['loop'] );
    $has_mute = boolval( $atts['mute'] );
    $file_extension = strtolower( pathinfo( $src, PATHINFO_EXTENSION ) );
    $link_target = ( $has_new_tab ? '_blank' : '' );
    $is_video = ( in_array( $file_extension, $video_formats ) || $atts['media_type'] === 'video' && $atts['method'] === 'url' ? true : false );
    $is_iframe = ( $atts['media_type'] === 'iframe' ? true : false );
    $has_link = ( !empty( $atts['link'] ) && !$is_iframe && !$is_video ? true : false );
    $inline_styles = "." . $block_id . " {";
    if ( !empty( $atts['width'] ) ) {
        $inline_width = esc_attr( $device_width . $atts['units'] );
        $inline_styles .= "width: " . $inline_width . ";";
    }
    $inline_styles .= "}";
    $block_classes = ['device-wrapper', $block_id];
    if ( !empty( $atts['align'] ) ) {
        $block_classes[] = sanitize_html_class( "align" . $atts['align'] );
    }
    if ( !empty( $atts['class'] ) ) {
        $block_classes[] = sanitize_html_class( $atts['class'] );
    }
    if ( $is_rotated ) {
        $block_classes[] = sanitize_html_class( "rotate-90" );
    }
    $block_classes_str = implode( " ", $block_classes );
    ?>

	<div <?php 
    echo ( !empty( $atts['anchor'] ) ? "id=" . esc_attr( $atts['anchor'] ) : '' );
    ?> class="<?php 
    echo esc_attr( $block_classes_str );
    ?>">

		<figure class="device-wrapper__inner device-wrapper__inner_<?php 
    echo esc_attr( $atts['device'] . (( $is_rotated ? "-ls" : "" )) );
    ?> device-wrapper__inner_<?php 
    echo esc_attr( $atts['fit'] );
    ?> device-wrapper__inner_<?php 
    echo esc_attr( $atts['media_type'] );
    ?>">
			<?php 
    if ( !empty( $src ) ) {
        ?>
				<?php 
        if ( strpos( $atts['fit'], 'overflow' ) !== false ) {
            echo '<div class="device-wrapper__inner__scroll">';
        }
        ?>
				<?php 
        if ( $has_link ) {
            echo '<a href="' . esc_url( $atts['link'] ) . '" target="' . esc_attr( $link_target ) . '">';
        }
        ?>
				
				<?php 
        if ( $is_iframe ) {
            ?>
					<iframe src="<?php 
            echo esc_url( $src );
            ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				<?php 
        } elseif ( $is_video ) {
            ?>
					<?php 
            $video_class = '';
            $video_class .= ( $has_autoplay_on_view && $has_autoplay ? 'is-autoplay-on-view ' : '' );
            $video_class .= ( $has_play_button ? 'has-play-button ' : '' );
            $video_class .= ( $has_link ? 'has-link ' : '' );
            $video_attrs = 'playsinline ';
            $video_attrs .= ( !$has_autoplay_on_view && $has_autoplay ? 'autoplay muted ' : '' );
            // if video autoplays - muted required
            $video_attrs .= ( $has_controls === true ? 'controls ' : '' );
            $video_attrs .= ( $has_loop ? 'loop ' : '' );
            $video_attrs .= ( $has_mute === true ? 'muted ' : '' );
            $video_attrs .= ( !empty( $atts['video_preview'] ) ? 'poster=' . esc_url( $atts["video_preview"] ) . ' ' : '' );
            ?>
					<video 
						src="<?php 
            echo esc_url( $src );
            ?>" 
						class="<?php 
            echo esc_attr( $video_class );
            ?>" 
						<?php 
            echo esc_attr( $video_attrs );
            ?>>
					</video>
					<?php 
            if ( boolval( $atts['play_button'] ) === true ) {
                echo '<button class="device-wrapper__play-button"></button>';
            }
            ?>
				<?php 
        } else {
            ?>
					<img src="<?php 
            echo esc_url( $src );
            ?>" alt="<?php 
            echo esc_attr( $atts['device'] );
            ?>" />
				<?php 
        }
        ?>
				
				<?php 
        if ( $has_link ) {
            echo '</a>';
        }
        ?>
				<?php 
        if ( strpos( $atts['fit'], 'overflow' ) !== false ) {
            echo '</div>';
        }
        ?>
			<?php 
    }
    ?>
		</figure>

		<div class="device-wrapper__device device-wrapper__device_<?php 
    echo esc_attr( $atts['device'] );
    ?>">
			<img 
				<?php 
    //echo esc_url(DEVICE_WRAPPER_PLUGIN_DEVICE_URL . $atts['device'].".svg");
    ?>
				src="data:image/svg+xml;utf8,<?php 
    echo $encoded_svg;
    ?>" 
				alt="<?php 
    echo esc_attr( $atts['device'] );
    ?>"
				width="<?php 
    echo esc_attr( $atts['width'] );
    ?>"  height="auto" />
		</div>

		<?php 
    if ( !empty( $inline_styles ) ) {
        //wp_register_style( 'device_wrapper-inline-css', false, array( 'device_wrapper-style-css' )  );
        //wp_enqueue_style( 'device_wrapper-inline-css' );
        //wp_add_inline_style('device_wrapper-inline-css', $inline_styles);
        ?>
			<style type="text/css">
				<?php 
        echo $inline_styles;
        ?>
			</style>
			<?php 
    }
    ?>

	</div>

	<?php 
    return ob_get_clean();
}

/**
 * Renders Gutenberg/Elementor block on back-end
 */
function device_wrapper_render(  $atts, $content = null  ) {
    ob_start();
    $atts['src'] = apply_filters( 'device_wrapper_default_src', '' );
    //default src
    if ( isset( $atts['mediaID'] ) && $atts['mediaID'] > 0 && wp_get_attachment_url( $atts['mediaID'] ) ) {
        $atts['src'] = wp_get_attachment_url( $atts['mediaID'] );
    } elseif ( isset( $atts['mediaURL'] ) && !empty( $atts['mediaURL'] ) ) {
        $atts['src'] = esc_url( $atts['mediaURL'] );
    }
    if ( isset( $atts['previewMediaID'] ) && $atts['previewMediaID'] > 0 && wp_get_attachment_url( $atts['previewMediaID'] ) ) {
        $atts['video_preview'] = wp_get_attachment_url( $atts['previewMediaID'] );
    }
    if ( isset( $atts['className'] ) ) {
        $atts['class'] = sanitize_html_class( $atts['className'] );
    }
    $atts = apply_filters( 'device_wrapper_render_atts', $atts );
    //echo print_r($atts, true);
    echo device_wrapper_shortcode( $atts, $content );
    return ob_get_clean();
}

add_action( 'wp_head', 'device_wrapper_noscript', 10 );
/**
 * Add a noscript styles to <head>
 */
function device_wrapper_noscript() {
    ?>
<noscript>
  <style>
    /**
    * Reinstate scrolling for non-JS clients
    */
    .simplebar-content-wrapper {
      scrollbar-width: auto;
      -ms-overflow-style: auto;
    }

    .simplebar-content-wrapper::-webkit-scrollbar,
    .simplebar-hide-scrollbar::-webkit-scrollbar {
      display: initial;
      width: initial;
      height: initial;
    }
  </style>
</noscript>
<?php 
}

function device_wrapper_add_licensing_helper() {
    ?>
  	<script type="javascript/text">
      	(function(){
			window.device_wrapper.can_use_premium_code = <?php 
    echo device_wrapper_freemius()->can_use_premium_code();
    ?>;
      	})();
  	</script>
<?php 
}

add_action( 'wp_head', 'device_wrapper_add_licensing_helper' );