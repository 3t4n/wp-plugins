<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCGW_menu')) {

 	class OCGW_menu {

  	protected static $instance;

  	function OCGW_create_menu() {
				add_menu_page('Woocommerce Gift Wrapper', 'Woo Gift Wrapper', 'manage_options', 'free_gift_wrapper', array($this, 'OCGW_free_contain'));
		}
			

		function OCGW_free_contain() {
			global $ocgw_comman;
     	?>
     	<div class="ocgw_container">
     		<form method="post">
     			<?php wp_nonce_field( 'OCGW_meta_save', 'OCGW_meta_save_nounce' ); ?>
        	<ul class="tabs">
         		<li class="tab-link current" data-tab="tab-default">
            		<?php echo __( 'Gift Wrapper Settings', 'add-gift-wrapper-for-woocommerce' ); ?>
         		</li>
         		
        	</ul>
        	<div id="tab-default" class="tab-content current">
         		<div class="ocgw_attribute_div">
        			<h2 class="ocgw_des_head"><?php echo __( 'General Settings', 'add-gift-wrapper-for-woocommerce' ); ?></h2>
          		<table class="ocgw_table">
          			<tbody>
          				<tr>
          					<th>
          						<label><?php echo __( 'Enable Plugin', 'add-gift-wrapper-for-woocommerce' ); ?></label>
          					</th>
          					<td>
          						<input type="checkbox" name="ocgw_comman[gw_gift_wrapper_enable]" value="enable" <?php if($ocgw_comman['gw_gift_wrapper_enable'] == 'enable' ) { echo 'checked'; } ?>>
          					</td>
          				</tr>
                  <tr>
                    <th>
                      <label><?php echo __( 'Enable Gift Wrapper Message', 'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <input type="checkbox" name="ocgw_comman[gw_gift_wrapper_msg_enable]" value="enable" <?php if($ocgw_comman['gw_gift_wrapper_msg_enable'] == 'enable' ) { echo 'checked'; } ?>>
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label><?php echo __( 'Enable Gift Wrapper block in Single productpage', 'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <input type="checkbox" name="ocgw_comman[gw_gift_wrapper_single_product_page]" value="enable" <?php if($ocgw_comman['gw_gift_wrapper_single_product_page'] == 'enable' ) { echo 'checked'; } ?>>
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label><?php echo __( 'Enable Gift Wrapper block bydefult open in Single product page', 'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <input type="checkbox" name="ocgw_comman[gw_gift_wrapper_open_single_product_page]" value="enable" <?php if($ocgw_comman['gw_gift_wrapper_open_single_product_page'] == 'enable' ) { echo 'checked'; } ?>>
                    </td>
                  </tr>
          				<tr>
          					<th>
          						<label><?php echo __( 'Display Type Cart Page', 'add-gift-wrapper-for-woocommerce' ); ?></label>
          					</th>
          					<td>
          						<select name="ocgw_comman[gw_gift_wrapper_display]" class="regular-text">
          							<option value="slider"<?php if($ocgw_comman['gw_gift_wrapper_display'] == 'slider' ) { echo 'selected'; } ?>><?php echo __( 'Slider', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          							<option value="popup"<?php if($ocgw_comman['gw_gift_wrapper_display'] == 'popup' ) { echo 'selected'; } ?>><?php echo __( 'Popup', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          						</select>
          					</td>
          				</tr>
          				<tr>
       							<th>
       								<label><?php echo __( 'Where to Show Gift Wrapping',  'add-gift-wrapper-for-woocommerce' ); ?></label>
       							</th>
       							<td>
       								<select name="ocgw_comman[gw_gift_show_wrapping]" class="regular-text">
          							<option value="beforecart"<?php if($ocgw_comman['gw_gift_show_wrapping'] == 'beforecart' ) { echo 'selected'; } ?>><?php echo __( 'Before Cart', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          							<option value="aftercart"<?php if($ocgw_comman['gw_gift_show_wrapping'] == 'aftercart' ) { echo 'selected'; } ?>><?php echo __( 'After cart', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          							<option value="aftercart"<?php if($ocgw_comman['gw_gift_show_wrapping'] == 'beforecartcollateral' ) { echo 'selected'; } ?>><?php echo __( 'Before cart Collaterals', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          						</select>
       							</td>
       						</tr>
          				<tr>
          					<th>
          						<label><?php echo __('Gift Wrapper Block Title', 'add-gift-wrapper-for-woocommerce' ); ?></label>
          					</th>
          					<td>
          						<input type="text" class="regular-text" name="ocgw_comman[gw_gift_wrapper_title]" value="<?php echo esc_attr($ocgw_comman['gw_gift_wrapper_title']); ?>">
          					</td>
          				</tr>
                  <tr>
                    <th>
                      <label><?php echo __('Gift Wrapper Message Text', 'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <input type="text" class="regular-text" name="ocgw_comman[gw_gift_wrapper_msg_text]" value="<?php echo esc_attr($ocgw_comman['gw_gift_wrapper_msg_text']); ?>">
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label><?php echo __('Gift Wrapper Block Title Color', 'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($ocgw_comman['gw_gift_wrapper_title_color']); ?>" name="ocgw_comman[gw_gift_wrapper_title_color]" value="<?php echo esc_attr($ocgw_comman['gw_gift_wrapper_title_color']); ?>"/>
                    </td>
                  </tr>
          				<tr>
          					<th>
          						<label><?php echo __('Gift Wrapper Text for Gift Wrapper in Cart', 'add-gift-wrapper-for-woocommerce' ); ?></label>
          					</th>
          					<td>
          						<input type="text" class="regular-text" name="ocgw_comman[gw_gift_wrapper_txt_in_cart]" value="<?php echo esc_attr($ocgw_comman['gw_gift_wrapper_txt_in_cart']); ?>">
          					</td>
          				</tr>
          			</tbody>
          		</table>
         		</div>
            <div class="ocgw_attribute_div">
              <h2 class="ocgw_des_head"><?php echo __( 'Gift Wrappers',  'add-gift-wrapper-for-woocommerce' ); ?></h2>
              <table class="ocgw_table">
                <tbody>
                  
                  <tr>
                    <th><?php echo __( 'Select Gift Rule', 'gift-products-for-woocommerce-pro' ); ?> </th>
                    <div class="ocwg_grp_main">
    
                      <div class="ocwg_input_div">
                        <?php $gw_gift_rule = $ocgw_comman['gw_gift_rule'];  ?>
                        <td>
                          <select name="ocgw_comman[gw_gift_rule]" class="gw_gift_rule">
                              <option value="">Select Rules</option>
                              <option value="productbase" <?php if($gw_gift_rule == "productbase") { echo "selected"; } ?>>Products Rule</option>
                              <option value="category" <?php if($gw_gift_rule == "category") { echo "selected"; } ?>>Category Rule</option>
                             
                          </select>
                        </td>
                      </div>
                    </div>
                  </tr>
                  <tr class="gw_category_rule">
                    <th>
                      <label><?php echo __( 'Add Your Gift Wrapper Categories',  'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <select id="gw_select_gift_wrapper" name="gw_gift_wrapper_select2[]" multiple="multiple" style="width:60%;">
                        <?php 
                        $appended_terms = get_option('gw_gift_wrapper_combo');
                          if(!empty($appended_terms)) {
                            foreach ($appended_terms as $term_id) {
                              $term_name = get_term( $term_id )->name;
                              $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
                              ?>
                                <option value="<?php echo esc_attr($term_id); ?>" selected="selected"><?php echo esc_attr($term_name); ?></option>
                              <?php
                            }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr class="gw_custom_rule">
                    <th>
                      <label><?php echo __( 'Add Your Gift Wrapper Categories',  'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <select id="wg_select_product" name="gw_select2[]" multiple="multiple" style="width:60%;">
                            <?php 
                              $productsa = get_option('gw_combo');

                              if(!empty($productsa)) {

                                  foreach ($productsa as $value) {

                                      $productc = wc_get_product($value);

                                      if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                          $title = $productc->get_name();?>

                                          <option value="<?php echo __($value, 'add-gift-wrapper-for-woocommerce'); ?>" selected="selected"><?php echo  __($title,'add-gift-wrapper-for-woocommerce'); ?></option>

                                        <?php
                                      }
                                  }
                              }

                            ?>

                         </select> 
                    </td>
                  </tr>    
                 
                  <tr>
                    <th>
                      <label><?php echo __( 'Gift wrapper add to cart button text',  'add-gift-wrapper-for-woocommerce' ); ?></label>
                    </th>
                    <td>
                      <input type="text" class="regular-text" name="ocgw_comman[gw_add_to_cart_text]" value="<?php echo esc_attr($ocgw_comman['gw_add_to_cart_text']); ?>">
                    </td>
                  </tr>
                  <tr>
                      <th><?php echo __( 'Gift wrapper add to cart button color',  'add-gift-wrapper-for-woocommerce' ); ?> </th>
                      <td>
                          <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_clr']); ?>" name="ocgw_comman[ocgw_product_add_to_cart_clr]" value="<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_clr']); ?>"/>
                      </td>
                  </tr>
                  <tr>
                      <th><?php echo __( 'Gift wrapper add to cart button text color',  'add-gift-wrapper-for-woocommerce' ); ?> </th>
                      <td>
                          <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_text_clr']); ?>" name="ocgw_comman[ocgw_product_add_to_cart_text_clr]" value="<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_text_clr']); ?>"/>
                      </td>
                  </tr>
                </tbody>
              </table>
            </div>
         		<div class="ocgw_attribute_div">
							<h2 class="ocgw_des_head"><?php echo __( 'Checkout Setting',  'add-gift-wrapper-for-woocommerce' ); ?></h2>
							<table class="ocgw_table">
       					<tbody>
          				<tr>
          					<th>
          						<label><?php echo __( 'Enable Gift Wrapper on Checkout Page', 'add-gift-wrapper-for-woocommerce' ); ?></label>
          					</th>
          					<td>
          						<input type="checkbox" name="ocgw_comman[gw_ckout_enable]" value="enable" <?php if($ocgw_comman['gw_ckout_enable'] == 'enable' ) { echo 'checked'; } ?>>
          					</td>
          				</tr>
          				<tr>
          					<th>
          						<label><?php echo __( 'Display Type Checkout Page', 'add-gift-wrapper-for-woocommerce' ); ?></label>
          					</th>
          					<td>
          						<select name="ocgw_comman[gw_gift_wrapper_display_ckout]" class="regular-text">
          							<option value="slider" <?php if($ocgw_comman['gw_gift_wrapper_display_ckout'] == 'slider' ) { echo 'selected'; } ?>><?php echo __( 'Slider', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          							<option value="popup" <?php if($ocgw_comman['gw_gift_wrapper_display_ckout'] == 'popup' ) { echo 'selected'; } ?>><?php echo __( 'Popup', 'add-gift-wrapper-for-woocommerce' ); ?></option>
          						</select>
          					</td>
          				</tr>
       					</tbody>
       				</table>
       			</div>
        	</div>
        	<input type="hidden" name="action" value="gw_save_option">
      		<input type="submit" value="Save changes" name="submit" class="button-primary" id="ocgw_btn_space">
				</form>
 			</div>  	
 			<?php
		}


		function OCGW_cat_ajax() {
      $return = array();
      $product_categories = get_terms( 'product_cat', $cat_args );

      if( !empty($product_categories) ){
        foreach ($product_categories as $key => $category) {
          $category->term_id;
          $title = ( mb_strlen( $category->name ) > 50 ) ? mb_substr( $category->name, 0, 49 ) . '...' : $category->name;
          $return[] = array( $category->term_id, $title );
        }
      }
      echo json_encode( $return );
      die;
  	}


  	function recursive_sanitize_text_field($array) {
  		
  		if(!empty($array)) {
       	foreach ( $array as $key => $value ) {
        	if ( is_array( $value ) ) {
         		$value = $this->recursive_sanitize_text_field($value);
        	}else{
        		$value = sanitize_text_field( $value );
        	}
       	}
      }
     	return $array;
  	}


  	function OCGW_save_options(){
    	if( current_user_can('administrator') ) {
    		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'gw_save_option') {
      		if(!isset( $_POST['OCGW_meta_save_nounce'] ) || !wp_verify_nonce( $_POST['OCGW_meta_save_nounce'], 'OCGW_meta_save' ) ) {
        		print 'Sorry, your nonce did not verify.';
        		exit;

      		} else {


      			$isecheckbox = array(
              'gw_gift_wrapper_enable',
              'gw_gift_wrapper_msg_enable',
              'gw_ckout_enable',
              'gw_gift_wrapper_single_product_page',
              'gw_gift_wrapper_remove_gift_items',
              'gw_allow_only_logged_in',
              'gw_mtvtion_msg_enable',
              'showslider_autoplay_or_not',
              'gw_gift_wrapper_open_single_product_page',
            );

            foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {

                if(!isset($_REQUEST['ocgw_comman'][$value_isecheckbox])){

                  $_REQUEST['ocgw_comman'][$value_isecheckbox] ='no';

                }

            }  

            /*---custom rules---*/
            if(!empty($_REQUEST['gw_select2'])) {
            	$gw_combo = $this->recursive_sanitize_text_field( $_REQUEST['gw_select2'] );
            	update_option('gw_combo', $gw_combo, 'yes');
            } else {
            	update_option('gw_combo', '', 'yes');
            }


            if(!empty($_REQUEST['gw_gift_wrapper_select2'])) {
            	$gw_gift_wrapper_combo = $this->recursive_sanitize_text_field( $_REQUEST['gw_gift_wrapper_select2'] );
            	update_option('gw_gift_wrapper_combo', $gw_gift_wrapper_combo, 'yes');
            } else {
            	update_option('gw_gift_wrapper_combo', '', 'yes');
            }

           
            foreach ($_REQUEST['ocgw_comman'] as $key_ocgw_comman => $value_ocgw_comman) {
             
              update_option($key_ocgw_comman, sanitize_text_field($value_ocgw_comman), 'yes');
            }

      		}
      		wp_redirect( admin_url( '/admin.php?page=free_gift_wrapper' ) );
          exit;
    		}
    	}	
  	}


  	function OCGW_cats_ajax() {

      $return = array();
      
      $product_categories = get_terms( 'product_cat', $cat_args );

      if( !empty($product_categories) ){

        foreach ($product_categories as $key => $category) {

          $category->term_id;
          $title = ( mb_strlen( $category->name ) > 50 ) ? mb_substr( $category->name, 0, 49 ) . '...' : $category->name;
          $return[] = array( $category->term_id, $title );

        }

      }

      echo json_encode( $return );
      die;

    }

    function OCWG_product_ajax(){
      $date = ($_REQUEST);
    }
    function OCGW_product_ajax() {

        $return = array();
        $post_types = array( 'product','product_variation');

        $search_results = new WP_Query( array( 
          's'=> sanitize_text_field($_GET['q']),
          'post_status' => 'publish',
          'post_type' => $post_types,
          'posts_per_page' => -1,
          'meta_query' => array(
            	array(
                'key' => '_stock_status',
                'value' => 'instock',
                'compare' => '=',
              )
          	)
        ) );

        if( $search_results->have_posts() ) {
         	while( $search_results->have_posts() ) { $search_results->the_post();   
            $productc = wc_get_product( $search_results->post->ID );
            if( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
             	$title = $search_results->post->post_title;
             	$price = $productc->get_price_html();
             	$return[] = array( $search_results->post->ID, $title, $price);   
            }
         	}
        }

        echo json_encode( $return );
        die;
  	}

  	function init() {
  		add_action('admin_menu', array($this, 'OCGW_create_menu'));
  		add_action( 'wp_ajax_nopriv_gw_product_ajax',array($this, 'OCGW_product_ajax') );
     	add_action( 'wp_ajax_gw_product_ajax', array($this, 'OCGW_product_ajax') );
     	add_action( 'wp_ajax_nopriv_gw_cat_ajax',array($this, 'OCGW_cat_ajax') );
     	add_action( 'wp_ajax_gw_cat_ajax', array($this, 'OCGW_cat_ajax') );
     	add_action( 'wp_ajax_nopriv_gw_cats_ajax',array($this, 'OCGW_cats_ajax') );
     	add_action( 'wp_ajax_gw_cats_ajax', array($this, 'OCGW_cats_ajax') );
     	add_action( 'init',  array($this, 'OCGW_save_options'));
  	}

		public static function instance() {
	   	if (!isset(self::$instance)) {
	      	self::$instance = new self();
	      	self::$instance->init();
	   	}
	   	return self::$instance;
		}

 	}
 	OCGW_menu::instance();
}