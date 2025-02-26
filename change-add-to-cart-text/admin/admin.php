<?php
/*
** adding necessarey files
*/

function BNBT_buy_new_button_text_Style_script() {

    wp_enqueue_style('BNBT_buy_new_button_text_main_style_file', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_script('BNBT_buy_new_button_text_logic_file', plugins_url('/js/logic.js',__FILE__ ));
}
add_action('admin_enqueue_scripts', 'BNBT_buy_new_button_text_Style_script');

/**
 * Adds a new settings page under Setting menu
*/
add_action( 'admin_menu', 'BNBT_buy_now_button_text_admin_page' );
function BNBT_buy_now_button_text_admin_page() {
    //only editor and administrator can add a polling
    if( current_user_can('editor') || current_user_can('administrator') ) {
    add_options_page( __( 'Change Add To Cart Text' ), __( 'Change Add To Cart Text' ), 'manage_options', 'BuyNowButtonText', 'BNBT_buy_now_button_text_admin_homepage' );
}
}

/**
* Tabs Method
*/
function BNBT_buy_now_button_text_show_tabs_list( $current = 'first' ) {
    $tabs = array(
        'first'   => __( 'Update Add To Cart Text', 'plugin-textdomain' ),

        );
    $html = '<h2 class="wooLiveSalenav-tabnav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? 'nav-tab-active' : '';
        $html .= '<a class="nav-tab ' . esc_html($class) . '" href="?page=BuyNowButtonText&tab=' . esc_html($tab) . '">' . esc_html($name) . '</a>';
    }
    $html .= '</h2>';
    echo $html ;
}

function BNBT_buy_now_button_text_admin_homepage(){
    ?>
    <div class="cont-p-dashboard">
        <div class="post_like_dislike_header wrap">
			<h3>Dashboard for changing woocommerce 'Add to Cart' button text.</h3>
			<p>Click the following link to contact Arrow Design for <span>
            <a href="https://arrowdesign.ie">Web Design</a>, Support or WordPress Plugin Development.
        </span></p>
    </div>
    <?php

    // ================== Tabs ========================//
     $tab = ( ! empty( $_GET['tab'] ) ) ? esc_attr( $_GET['tab'] ) : 'first';
     BNBT_buy_now_button_text_show_tabs_list( $tab );


   // =========================== Tab 1 ========================//
    if ( $tab == 'first' ) {
        ?>
        <div class="woo-live-saleTabs woo-live-sale-firstTab">
        	<!--First tab -->
        	<div class="setting-left-sp">
        		<div class="list-sp list-sp-left">
					<h2>Instructions </h2>
					<h4>Enter text in the textbox</h4>
					<h4>Click update to save</h4>
					<h4>The textbox will display your saved text</h4>
					<h4>'Add to cart' will be replaced with your entry</h4>
        		</div>
        		<div class="list-sp list-polling-right">

        			<?php
        			$terms = "";

        			if (isset($_POST['buy-now-btn'])) {
        				$name = sanitize_text_field ( $_POST['buy-new-btn-text'] );
        				$terms = get_term_meta('2020', '_buy_now_btn_text', true);
        				if ($terms == "") {
        					add_term_meta('2020', "_buy_now_btn_text" ,$name);
        				}
        				else{
        					update_term_meta( '2020', "_buy_now_btn_text", $name);
        				}
        			}
        			$terms = get_term_meta('2020', '_buy_now_btn_text', true);
        			?>
        			<!-- uploading polling names -->

					<h2>Enter Your Text Here</h2>
        			<form method="POST" action="">
        			<input type="text" name="buy-new-btn-text" class="names-list first-name" value="<?php echo esc_attr ( $terms ); ?>">
        			<h2>Click 'Update' to save</h2>
						<button class="button-primary update-names-and-titles" name="buy-now-btn" type="submit">Update</button>
        		</form>
					<br>
        		</div>

        		</div>

        	</div>
        	<div class="display-right-sp">


        	</div>
        </div>

        <?php
    }
}