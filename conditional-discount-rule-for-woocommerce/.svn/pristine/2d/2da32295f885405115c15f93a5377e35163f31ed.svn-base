<?php

class Class_Pi_Cdrw_Add_Coupon_Template{

    public $plugin_name;

    private $settings = array();

    private $active_tab;

    private $this_tab = 'pi_cdrw_add_coupon_template';

    private $tab_name = "Add Coupon template";

    private $setting_key = 'pi_cdre_add_coupon_template';
    
    

    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;

       
        $this->tab = sanitize_text_field(filter_input( INPUT_GET, 'tab'));
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        if($this->this_tab == $this->active_tab){
            add_action($this->plugin_name.'_tab_content', array($this,'tab_content'));
        }


        //add_action($this->plugin_name.'_tab', array($this,'tab'),2);

        add_action('wp_ajax_pisol_cdrw_save_template', array($this,'ajaxSave'));

    }

    
    function tab(){
        $page =  sanitize_text_field(filter_input( INPUT_GET, 'page') );
        ?>
        <a class=" px-3 text-light d-flex align-items-center  border-left border-right  <?php echo ($this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary'); ?>" href="<?php echo admin_url( 'admin.php?page='.$page.'&tab='.$this->this_tab ); ?>">
            <?php _e( $this->tab_name); ?> 
        </a>
        <?php
    }

    function tab_content(){
       $this->addEditShippingMethod();
    }

    function addEditShippingMethod(){
        $data = $this->formDate();
        if($data === false){
            echo '<div class="alert alert-danger mt-2">Discount you are trying to edit does not exist, check the existing Discount rule list</div>';
            return;
        }
        include plugin_dir_path( __FILE__ ) . 'partials/addTemplate.php';
    }

    function ajaxSave(){
        $message = array();
        $error =  $this->validate();
        if(is_wp_error($error)){
            $error_msg = $this->showError($error);
            wp_send_json( array('error'=> $error_msg) );
        }else{
            $post = $_POST;
            /** Save form and redirect to list */
            $save_form_result = $this->saveForm($post);
            if($save_form_result === false){
                wp_send_json( array('error'=>array("There was some error in saving refresh the page and try again")));
            }else{
                if($save_form_result !== true){
                    $redirect_url =  $save_form_result;
                    wp_send_json( array('success'=>"Discount saved", 'redirect' => $redirect_url));
                }
                wp_send_json( array('success'=>"Discount saved"));
            }
        }
    }

    function formDate(){
        $action_value = sanitize_text_field(filter_input( INPUT_GET, 'action'));
        $id_value     = sanitize_text_field(filter_input( INPUT_GET, 'id'));
        $data = array();
        $present_shipping_classes = WC()->shipping->get_shipping_classes();

        $data['present_shipping_classes'] = !empty($present_shipping_classes) ? $present_shipping_classes : array();
        
        if ( isset( $action_value ) && 'edit' === $action_value ) {

            if(!self::discountExist($id_value)) return false;

            $data['post_id']                 = $id_value;

            $data['name']               = get_the_title( $data['post_id'] );
            
            $data['discount_type']                 = get_post_meta( $data['post_id'], 'discount_type', true );

            $data['coupon_amount']                 = get_post_meta( $data['post_id'], 'coupon_amount', true );

            $data['free_shipping']                 = get_post_meta( $data['post_id'], 'free_shipping', true );

            $data['expiry_date']                 = get_post_meta( $data['post_id'], 'expiry_date', true );

            $data['expiry_after_days']                 = '';
            
            $data['minimum_amount']                 = get_post_meta( $data['post_id'], 'minimum_amount', true );

            $data['maximum_amount']                 = get_post_meta( $data['post_id'], 'maximum_amount', true );

            $data['individual_use']              = get_post_meta( $data['post_id'], 'individual_use', true );
            
            $data['exclude_sale_items']  =  get_post_meta( $data['post_id'], 'exclude_sale_items', true ); 

            $data['product_ids'] = get_post_meta( $data['post_id'], 'product_ids', true );

            $data['exclude_product_ids'] = get_post_meta( $data['post_id'], 'exclude_product_ids', true );

            $data['product_categories'] = get_post_meta( $data['post_id'], 'product_categories', true );

            $data['exclude_product_categories'] = get_post_meta( $data['post_id'], 'exclude_product_categories', true );

            $data['restrict_to_purchaser_email'] = get_post_meta( $data['post_id'], 'restrict_to_purchaser_email', true );

            $data['usage_limit'] = get_post_meta( $data['post_id'], 'usage_limit', true );

            $data['usage_limit_per_user'] = get_post_meta( $data['post_id'], 'usage_limit_per_user', true );
            $data['limit_usage_to_x_items'] = get_post_meta( $data['post_id'], 'limit_usage_to_x_items', true );

            $data['pi_title'] = get_post_meta( $data['post_id'], 'pi_title', true );
            $data['pi_desc'] = get_post_meta( $data['post_id'], 'pi_desc', true );
            
            
            
        } else {
            $data['post_id']          = '';

            $data['name']             = '';

            $data['discount_type']    = 'fixed_cart';

            $data['coupon_amount']       = 0 ;

            $data['free_shipping']    = '';

            $data['expiry_date']      = '';

            $data['expiry_after_days']      = '';
            
            $data['minimum_amount']                 = '';

            $data['maximum_amount']                 = '';

            $data['individual_use']              = '';
            
            $data['exclude_sale_items']  =  ''; 

            $data['product_ids'] = [];

            $data['exclude_product_ids'] = [];

            $data['product_categories'] = [];

            $data['exclude_product_categories'] = [];

            $data['usage_limit'] = '';

            $data['restrict_to_purchaser_email'] = 'yes';

            $data['usage_limit_per_user'] = '';

            $data['limit_usage_to_x_items'] = '';

            $data['pi_title'] = '';
            $data['pi_desc'] = '';
            
        }
        
        
        return apply_filters('pi_cdrw_coupon_template_form_data',$data);
    }

    static function discountExist($id){
        $post_exists = (new WP_Query(['post_type' => 'pi_coupon_template', 'p'=>$id]))->found_posts > 0;

        return $post_exists;
    }

    function validate(){
        $error = new WP_Error();
        $require_capability =  Pi_Cdrw_Menu::getCapability();
        if ( !current_user_can($require_capability) && !current_user_can('administrator') 
        ) {
            $error->add( 'access', 'You are not authorized to make this changes ' );
        } 

        if ( ! isset( $_POST['pisol_cdrw_nonce'] ) || ! wp_verify_nonce( $_POST['pisol_cdrw_nonce'], 'add_coupon_template' ) 
        ) {
            $error->add( 'invalid-nonce', 'Form has expired Reload the page and try again ' );
        } 

        if ( empty( $_POST['name'] ) ) {
            $error->add( 'empty', 'Template name cant be empty' );
        }

        if ( empty( $_POST['post_type'] ) || (!empty($_POST['post_type']) && 'pi_coupon_template' !== $_POST['post_type']) ) {
            $error->add( 'empty', 'Discount method post type missing' );
        }


        $error = apply_filters('pisol_cdrw_validate_coupon_template', $error);

        if ( !empty( $error->get_error_codes() ) ) {
            return $error;
        }

        return true;
    }

    function showError($error){
        
        return $error->get_error_messages();
    }

    function saveForm($data){

        $post_type = sanitize_text_field(filter_input( INPUT_POST, 'post_type'));
		if ( isset( $post_type ) && 'pi_coupon_template' === $post_type ) {
            if ($data['post_id'] === '' ) {
				$shipping_method_post = array(
					'post_title'  => sanitize_text_field($data['name']),
					'post_status' => 'publish',
					'post_type'   => 'pi_coupon_template',
				);
				$post_id  = wp_insert_post( $shipping_method_post );
                $redirect_url = admin_url( '/admin.php?page=pisol-cdrw&tab=pi_cdrw_add_coupon_template&action=edit&id='.$post_id);
			} else {
				$shipping_method_post = array(
					'ID'          => (int)sanitize_text_field($data['post_id']),
					'post_title'  => sanitize_text_field($data['name']),
					'post_status' => 'publish',
				);
				$post_id  = wp_update_post( $shipping_method_post );
            }
            
    

            if ( isset( $data['discount_type'] ) ) {
				update_post_meta( $post_id, 'discount_type', sanitize_text_field( $data['discount_type'] ) );
            }else{
                update_post_meta( $post_id, 'discount_type', 'fixed-discount' );
            }
            
			if ( isset( $data['coupon_amount'] ) ) {
				update_post_meta( $post_id, 'coupon_amount', sanitize_text_field( $data['coupon_amount'] ) );
            }

            if ( isset( $data['free_shipping'] ) ) {
				update_post_meta( $post_id, 'free_shipping', sanitize_text_field( $data['free_shipping'] ) );
            }else{
                update_post_meta( $post_id, 'free_shipping', '' );
            }
            
			if ( isset( $data['expiry_date'] ) ) {
				update_post_meta( $post_id, 'expiry_date', sanitize_text_field( $data['expiry_date'] ) );
            }

            /*
            if ( isset( $data['expiry_after_days'] ) ) {
				update_post_meta( $post_id, 'expiry_after_days', sanitize_text_field( $data['expiry_after_days'] ) );
            }
            */

            if ( isset( $data['minimum_amount'] ) ) {
				update_post_meta( $post_id, 'minimum_amount', sanitize_text_field( ($data['minimum_amount']) ) );
            }

			if ( isset( $data['maximum_amount'] ) ) {
				update_post_meta( $post_id, 'maximum_amount', sanitize_text_field( $data['maximum_amount'] ) );
            }
            
			if ( isset( $data['individual_use'] ) ) {
				update_post_meta( $post_id, 'individual_use',  sanitize_text_field( $data['individual_use']) );
            }else{
                update_post_meta( $post_id, 'individual_use', '' );
            }
            
            if ( isset( $data['exclude_sale_items'] ) ) {
				update_post_meta( $post_id, 'exclude_sale_items', sanitize_text_field( $data['exclude_sale_items']) );
			}else{
                update_post_meta( $post_id, 'exclude_sale_items', '' );
            }

            if ( isset( $data['restrict_to_purchaser_email'] ) ) {
				update_post_meta( $post_id, 'restrict_to_purchaser_email', sanitize_text_field( $data['restrict_to_purchaser_email']) );
			}else{
                update_post_meta( $post_id, 'restrict_to_purchaser_email', '' );
            }
            
			
            if ( isset( $data['product_ids'] ) && is_array( $data['product_ids'] ) ) {
				update_post_meta( $post_id, 'product_ids',  $data['product_ids']  );
            }else{
				update_post_meta( $post_id, 'product_ids', array()  );
            }

            if ( isset( $data['exclude_product_ids'] ) && is_array( $data['exclude_product_ids'] )  ) {
				update_post_meta( $post_id, 'exclude_product_ids',  $data['exclude_product_ids']  );
            }else{
				update_post_meta( $post_id, 'exclude_product_ids',  array()  );
            }

            
            if ( isset( $data['product_categories'] ) ) {
				update_post_meta( $post_id, 'product_categories',  $data['product_categories']  );
            }else{
				update_post_meta( $post_id, 'product_categories',  array()  );
            }

            if ( isset( $data['exclude_product_categories'] ) ) {
				update_post_meta( $post_id, 'exclude_product_categories',  $data['exclude_product_categories']  );
            }else{
				update_post_meta( $post_id, 'exclude_product_categories',  array()  );
            }

            if ( isset( $data['usage_limit'] ) ) {
				update_post_meta( $post_id, 'usage_limit', sanitize_text_field( $data['usage_limit'] ) );
            }

            if ( isset( $data['usage_limit_per_user'] ) ) {
				update_post_meta( $post_id, 'usage_limit_per_user', sanitize_text_field( $data['usage_limit_per_user'] ) );
            }

            if ( isset( $data['limit_usage_to_x_items'] ) ) {
				update_post_meta( $post_id, 'limit_usage_to_x_items', sanitize_text_field( $data['limit_usage_to_x_items'] ) );
            }

            if ( isset( $data['pi_title'] ) ) {
				update_post_meta( $post_id, 'pi_title', sanitize_text_field( $data['pi_title'] ) );
            }

            if ( isset( $data['pi_desc'] ) ) {
				update_post_meta( $post_id, 'pi_desc', sanitize_textarea_field( $data['pi_desc'] ) );
            }


            $pi_selection  = array();
           

            do_action('pisol_cdrw_save_coupon_template', $post_id);

            if(!empty($redirect_url)){
                return $redirect_url;
            }
            
           return true;

        }
    }

    static function errorMsg($msg){
        ?>
        <div class="error notice">
        <h4>Fix Error</h4>
        <p><?php echo $msg; ?></p>
        </div>
        <?php
    }
    

    static function sanitizeValues($values){
        if(is_array($values)){
            return array_map( 'sanitize_text_field', $values);
        }

        return sanitize_text_field($values);
    }

    static function validateDate($date, $format = 'Y/m/d'){
        $d = DateTime::createFromFormat($format, $date);
        if($d && $d->format($format) === $date){
            $formated = $d->format($format);
            return $d->format($format);
        }
        return "";
    }

    
    static function enableDisable(){
        $post_id = filter_input(INPUT_POST,'id');
        $status = filter_input(INPUT_POST,'status');
        $require_capability =  Pi_Cdrw_Menu::getCapability();
        if(!current_user_can($require_capability) || empty($post_id)) return;
        
        if ( !empty($status) ) {
            update_post_meta( $post_id, 'pi_status', "on" );
        } else {
            update_post_meta( $post_id, 'pi_status', "off");
        }
        
    }
    
}

new Class_Pi_Cdrw_Add_Coupon_Template($this->plugin_name);