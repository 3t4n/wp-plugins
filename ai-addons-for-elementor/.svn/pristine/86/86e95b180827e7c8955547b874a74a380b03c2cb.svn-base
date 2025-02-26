<?php 

class AIEA_AJAX {
	
	private static $_instance = null;
	
	public function __construct() {

		add_action('wp_ajax_nopriv_aiea_mailchimp', [ $this, 'aiea_mailchimp' ] );
		add_action('wp_ajax_aiea_mailchimp', [ $this, 'aiea_mailchimp' ] );
		
		//Product short view
		add_action( 'wp_ajax_aiea_product_view', [ $this, 'aiea_product_quick_view' ] );
		add_action( 'wp_ajax_nopriv_aiea_product_view', [ $this, 'aiea_product_quick_view' ] );
		
	}
	
	public function aiea_mailchimp(){
				
		$nonce = $_POST['nonce'];
	  
		if ( ! wp_verify_nonce( $nonce, 'ai-mailchimp-security^&%^' ) )
			die ( esc_html__( 'Busted', 'ai-addons' ) );
		
		$list_id = isset( $_POST['aiea_mc_listid'] ) ? sanitize_text_field( $_POST['aiea_mc_listid'] ) : '';
		$first_name = isset( $_POST['aiea_mc_first_name'] ) ? sanitize_text_field( $_POST['aiea_mc_first_name'] ) : '';
		$last_name = isset( $_POST['aiea_mc_last_name'] ) ? sanitize_text_field( $_POST['aiea_mc_last_name'] ) : '';
		$email = isset( $_POST['aiea_mc_email'] ) ? sanitize_email( $_POST['aiea_mc_email'] ) : '';
		$success = isset( $_POST['aiea_mc_success'] ) ? sanitize_text_field( $_POST['aiea_mc_success'] ) : '';
				
		if( $email == '' || $list_id == '' ){
			wp_die ( 'failed' );
		}
		
		$memberID = md5( strtolower( $email ) );
		
		$aiea_options = get_option( 'aiea_options' );
		$api_key = isset( $aiea_options['mailchimp-api'] ) ? $aiea_options['mailchimp-api'] : '';
		
		$dc = substr( $api_key, strpos( $api_key, '-' ) + 1 );
		
		$extra_args = array(
			'email_address' => esc_attr( $email ),
			'status' => 'subscribed',
			'merge_fields'  => [
				'FNAME'     => esc_attr( $first_name ),
				'LNAME'     => esc_attr( $last_name )
			]		
		);
		
		$args = array(
			'method' => 'PUT',
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
			),
			'body' => json_encode( $extra_args )
		);
		 
		$response = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'. esc_attr( $list_id ) .'/members/'. esc_attr( $memberID ), $args );
		 
		$body = json_decode( $response['body'] );
		 
		if ( $response['response']['code'] == 200 ) {
			echo "success";
		}elseif( $response['response']['code'] == 214 ){
			echo "already";
		}else {
			echo "failure";
		}

		wp_die();
	}
	
	public function aiea_product_quick_view() {
		// Check for nonce security
		$nonce = $_POST['nonce'];  
		if ( ! wp_verify_nonce( $nonce, 'aiea-product-view-*^&%&^$W' ) ) wp_die( esc_html__( 'Busted', 'ai-addons' ) );
				
		$product_id = isset( $_POST['product_id'] ) ? esc_attr( $_POST['product_id'] ) : '';
		
		$output = '';
		
		$args = array(
			'post_type' => 'product',
			'post__in'=> array( $product_id )
		);
		$the_query = new WP_Query( $args ); 
		
		if ( $the_query->have_posts() ) : 
		
			ob_start();
		
			echo '<div class="aiea-product-short-view">';

				while ( $the_query->have_posts() ) : $the_query->the_post();
				
					global $product;
					
					$this->aiea_product_selected_fileds();
					
					$post_thumbnail_id = $product->get_image_id();
					?>
					<div class="short-product-view-inner">
						<div id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
							<?php do_action( 'aiea_woocommerce_single_product_image' ); ?>
							<div class="summary entry-summary">
								<div class="summary-content">
									<?php do_action( 'aiea_woocommerce_single_product_summary' ); ?>
								</div>
							</div>
						</div>
					</div>
					<?php			
				endwhile;  wp_reset_postdata();	
					
			echo '</div>';
			
			$output = ob_get_clean();
			
		endif;
		
		wp_send_json( [ 'status' => 'success', 'result' => $output ] );
	}
	
	public function aiea_product_selected_fileds() {
		// Image
		add_action( 'aiea_woocommerce_single_product_image', 'woocommerce_show_product_sale_flash', 10 );
		add_action( 'aiea_woocommerce_single_product_image', 'woocommerce_show_product_images', 20 );
		// Summary
		add_action( 'aiea_woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		add_action( 'aiea_woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		add_action( 'aiea_woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
		add_action( 'aiea_woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		add_action( 'aiea_woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
		add_action( 'aiea_woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30 );
		
		
	}
	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

} AIEA_AJAX::instance();