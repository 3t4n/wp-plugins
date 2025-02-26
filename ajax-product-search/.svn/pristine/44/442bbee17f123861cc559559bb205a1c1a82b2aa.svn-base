<?php

/**
 * Plugin Name:       Ajax Product Search
 * Plugin URI:        https://themebing.com/ajax-product-search
 * Description:       Ajax Product Search is a simple instant product search plugin for WooCommerce.
 * Version:           1.0.1
 * Author:            themebing
 * Author URI:        https://themebing.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ajax-product-search
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class ajax_product_search {

	function __construct() {
		$this->load_plugin_textdomain();
		$this->load_dependencies();
		$this->ajax_product_search_setup();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_footer', array( $this, 'ajax_fetch' ) );
		add_action( 'wp_ajax_data_fetch', array( $this, 'data_fetch' ) );
		add_action( 'wp_ajax_nopriv_data_fetch', array( $this, 'data_fetch' ) );

	}

	public function ajax_product_search_setup() {
		add_image_size( 'ajax-product-search-32x32', 32,32, true );
	}

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'ajax-product-search', false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
	}

	public function enqueue_scripts() {
		wp_register_style( 'ajax_product_search-plugin-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
		wp_register_script( 'ajax_product_search-plugin-main-js', plugin_dir_url( __FILE__ ) . 'assets/js/ajax-product-search-main.js', array('jquery'),wp_get_theme()->get( 'Version' ), true );

		wp_enqueue_style( 'ajax_product_search-plugin-style' );
		wp_enqueue_script( 'ajax_product_search-plugin-main-js' );
	}

	private function load_dependencies() {
		require_once plugin_dir_path( __FILE__ ) . 'functions.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/elementor/elementor.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/wpbakery/vc_shortcodes.php';
	}

	public function ajax_fetch() { ?>

		<script type="text/javascript">
		function fetch(){
		    jQuery.ajax({
		        url: '<?php echo admin_url('admin-ajax.php'); ?>',
		        type: 'post',
		        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
		        success: function(data) {
		        	if (jQuery('#keyword').val().length !== 0) {
		        		jQuery('#productDataFetch').html( data );
		        	} else {
		        		jQuery('#productDataFetch').html( '' );
		        	}
		            
		        }
		    });

		    jQuery("#productDataFetch").show();

		}
		</script>

		<?php
	}

	public function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => 10 , 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'product' ) );
	    if( $the_query->have_posts() ) { ?>
	    	<ul class="ajax-product-search-results">
	    	<?php
	        while( $the_query->have_posts() ){ $the_query->the_post(); ?>

	            <li>
	            	<a href="<?php echo esc_url( post_permalink() ); ?>">
						<?php the_post_thumbnail( 'ajax-product-search-32x32') ?>
		            	<?php the_title();?>
	            	</a>
	            </li>

	        <?php }; ?>
	        </ul>
	        <?php
	        wp_reset_postdata();  
	    }

	    die();
	}


}
new ajax_product_search();