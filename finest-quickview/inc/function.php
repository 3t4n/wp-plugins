<?php

// Button Icon
function finest_quickview_render_infooter() {
    $showhide = get_theme_mod( 'modal_close_button',true);
    ?>

	<div class="woocommerce" id="fdquick-viewmodal">
        <div class="fdqv-modal-dialog product">
            <div class="fdqv-modal-content">
                <?php if ( $showhide ): ?>
                <button type="button" class="fdqvcloseqv"><span class="dashicons dashicons-no-alt"></span></button>
                <?php endif; ?>
                <div class="fdqv-modal-body">
                </div>
            </div>
        </div>
    </div>';
<?php
}
add_action( 'wp_footer', 'finest_quickview_render_infooter' );



// Button
if ( !function_exists( 'finest_quickview_button' ) ) {
	function finest_quickview_button($cart_button) {

        $option = get_theme_mod( 'quickview_option','after_add_to_cart' );

        $icon = '<span class="dashicons dashicons-visibility"></span>';

        $showhide = get_theme_mod( 'on_quick_view', true);
        $btntext = get_theme_mod( 'change_button_text','Quick View');
        $btnstyle = get_theme_mod( 'qucik_view_style' , 'only_text' );

        $mobile_option = get_theme_mod( 'show_quick_buton_mobile', 'mobile_show' );
        $tablate_option = get_theme_mod( 'show_quick_buton_tablet',true);
        
        $tb = '';
        if ( true == $tablate_option ) {
            $tb .= 'tablate_show';
        }
        else {
            $tb .= 'tablate_hide';
        }
        if ( true == $mobile_option ) {
            $tb .= ' mobile_show';
        }
        else {
            $tb .= ' mobile_hide';
        }

        if('only_text' == $btnstyle){
            $f_content = $btntext;
        }elseif('only_icon' == $btnstyle){
            $f_content = $icon;
        }elseif('icon_text' == $btnstyle){
            $f_content = $icon.$btntext;
        }else{
            $f_content = $btntext;
        };

        $ajaxurl = admin_url('admin-ajax.php');
        $nonce = wp_create_nonce('stor_product_load');
            ob_start();
            ?>
            <?php if ( true == $showhide ) { ?>
                <div class="finest-quickview-button <?php echo esc_attr(  $option.' '.$tb); ?>">
                    <a href="#" class="storquickview" data-id="<?php echo get_the_ID() ?>" data-url="<?php echo esc_url($ajaxurl) ?>" data-referrar="<?php echo esc_attr( $nonce ) ?>">
                    <?php echo $f_content; ?>
                    </a>
                </div>
                <?php } ?>
            <?php
            $button = ob_get_clean();
            if ( $option == 'before_add_to_cart' ) {
                return $button . $cart_button;
            }
            else if ( $option == 'after_add_to_cart' ) {
                return $cart_button . $button;
            }
            else if ( $option == 'above_add_to_cart' ) {
               return $button . $cart_button;
            }
            else {
                return $cart_button . $button;
            }
        
	}
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'finest_quickview_button', 15 );


// Lode Ajax Content Data
function finest_quickview_ajax_data() {
    if ( isset( $_POST['id'] ) && (int) $_POST['id'] ) {
        global $post, $product, $woocommerce;
        $id      = ( int ) $_POST['id'];
        $post    = get_post( $id );
        $product = get_product( $id );
        if ( $product ) {
			include __DIR__.'/../inc/quickview-content.php';
        }
    }
    wp_die();
}
add_action( 'wp_ajax_finest_quickview', 'finest_quickview_ajax_data' );
add_action( 'wp_ajax_nopriv_finest_quickview', 'finest_quickview_ajax_data');

/**
 * Get minified css and removed space
 */
function fqv_css_strip_whitespace( $css ) {
	$replace = array(
		'#/\*.*?\*/#s' => '',  // Strip C style comments.
		'#\s\s+#'      => ' ', // Strip excess whitespace.
	);
	$search  = array_keys( $replace );
	$css     = preg_replace( $search, $replace, $css );

	$replace = array(
		': '  => ':',
		'; '  => ';',
		' {'  => '{',
		' }'  => '}',
		', '  => ',',
		'{ '  => '{',
		';}'  => '}', // Strip optional semicolons.
		",\n" => ',', // Don't wrap multiple selectors.
		"\n}" => '}', // Don't wrap closing braces.
		'} '  => "}\n", // Put each rule on it's own line.
	);
	$search  = array_keys( $replace );
	$css     = str_replace( $search, $replace, $css );

	return trim( $css );
}