<?php

class Class_Pi_Cdrw_Add_Edit{

    public $plugin_name;

    private $settings = array();

    private $active_tab;

    private $this_tab = 'pi_cdrw_add_rule';

    private $tab_name = "Add discount rule";

    private $setting_key = 'pi_cdre_add_rule';
    
    

    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;

       
        $this->tab = sanitize_text_field(filter_input( INPUT_GET, 'tab'));
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        if($this->this_tab == $this->active_tab){
            add_action($this->plugin_name.'_tab_content', array($this,'tab_content'));
        }


        //add_action($this->plugin_name.'_tab', array($this,'tab'),2);
        add_action('wp_ajax_pisol_cdrw_change_status', array(__CLASS__,'enableDisable'));

        add_action('wp_ajax_pisol_cdrw_save_method', array($this,'ajaxSave'));
    }

    
    function tab(){
        $page =  sanitize_text_field(filter_input( INPUT_GET, 'page'));
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
            echo '<div class="alert alert-danger mt-2">Discount you are trying to edit does not exist, check the existing Discount rules list</div>';
            return;
        }

        include plugin_dir_path( __FILE__ ) . 'partials/addDiscountRule.php';
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
            $data['pi_status']               = get_post_meta( $data['post_id'], 'pi_status', true );
            $data['pi_title']               = __( get_the_title( $data['post_id'] ), 'conditional-discount-rule-woocommerce' );
            $data['pi_discount_type']                 = get_post_meta( $data['post_id'], 'pi_discount_type', true );
            $data['pi_discount']                 = get_post_meta( $data['post_id'], 'pi_discount', true );
            $data['pi_discount_start_time']                 = get_post_meta( $data['post_id'], 'pi_discount_start_time', true );
            $data['pi_discount_end_time']                 = get_post_meta( $data['post_id'], 'pi_discount_end_time', true );
            $data['pi_metabox']              = get_post_meta( $data['post_id'], 'pi_metabox', true );

            $data['pi_condition_logic'] = empty(get_post_meta( $data['post_id'], 'pi_condition_logic', true )) ? 'and' : get_post_meta( $data['post_id'], 'pi_condition_logic', true ); 

            $data['pi_coupon_template'] = get_post_meta( $data['post_id'], 'pi_coupon_template', true );
            
        } else {
            $data['post_id']                = '';
            $data['pi_status']               = '';
            $data['pi_title']                = '';
            $data['pi_discount_type']                 = '';
            $data['pi_discount']         = 0;
            $data['pi_discount_start_time']           = '';
            $data['pi_discount_end_time'] = "";
            $data['pi_metabox']              = array();

            $data['pi_condition_logic']           = 'and';
            $data['pi_coupon_template'] = '';
        }
        
        $data['pi_status']       = ( ( ! empty( $data['pi_status'] ) && 'on' === $data['pi_status'] ) || empty( $data['pi_status'] ) ) ? 'checked' : '';
        $data['pi_title']        = ! empty( $data['pi_title'] ) ? esc_attr( stripslashes( $data['pi_title'] ) ) : '';
        $data['pi_discount']         = ( '' !== $data['pi_discount'] ) ? esc_attr( stripslashes( $data['pi_discount'] ) ) : 0;
        
        return $data;
    }

    static function discountExist($id){

        if(!filter_var($id, FILTER_VALIDATE_INT)) return false;
        
        $post_exists = (new WP_Query(['post_type' => 'pi_discount_rule', 'p'=>$id]))->found_posts > 0;

        return $post_exists;
    }

    function validate(){
        $error = new WP_Error();

        if ( !current_user_can('editor') && !current_user_can('administrator') 
        ) {
            $error->add( 'access', 'You are not authorized to make this changes ' );
        } 

        if ( ! isset( $_POST['pisol_cdrw_nonce'] ) || ! wp_verify_nonce( $_POST['pisol_cdrw_nonce'], 'add_discount_rule' ) 
        ) {
            $error->add( 'invalid-nonce', 'Form has expired Reload the page and try again ' );
        } 

        if ( empty( $_POST['pi_title'] ) ) {
            $error->add( 'empty', 'Discount Name cant be empty' );
        }

        if ( empty( $_POST['post_type'] ) || (!empty($_POST['post_type']) && 'pi_discount_rule' !== $_POST['post_type']) ) {
            $error->add( 'empty', 'Discount method post type missing' );
        }

        if ( empty( $_POST['pi_selection'] ) ) {
            $error->add( 'empty', 'You have not added any Selection Rules' );
        }

        if ( 
            (!empty( $_POST['pi_discount_start_time'] ) &&  !empty( $_POST['pi_discount_end_time'] ) ) 
            && 
            strtotime( $_POST['pi_discount_start_time'] ) > strtotime($_POST['pi_discount_end_time']) ) {
            $error->add( 'empty', 'Discount start date cant be after the Discount end date' );
        }

        $error = apply_filters('pisol_cdrw_validate_shipping_method', $error);

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
		if ( isset( $post_type ) && 'pi_discount_rule' === $post_type ) {
            if ($data['post_id'] === '' ) {
				$shipping_method_post = array(
					'post_title'  => sanitize_text_field($data['pi_title']),
					'post_status' => 'publish',
					'post_type'   => 'pi_discount_rule',
				);
				$post_id  = wp_insert_post( $shipping_method_post );
                $redirect_url = admin_url( '/admin.php?page=pisol-cdrw&tab=pi_cdrw_add_rule&action=edit&id='.$post_id);
			} else {
				$shipping_method_post = array(
					'ID'          => (int)sanitize_text_field($data['post_id']),
					'post_title'  => sanitize_text_field($data['pi_title']),
					'post_status' => 'publish',
				);
				$post_id  = wp_update_post( $shipping_method_post );
            }
            
            if ( isset( $data['pi_status'] ) ) {
				update_post_meta( $post_id, 'pi_status', "on" );
			} else {
				update_post_meta( $post_id, 'pi_status', "off");
			}
			if ( isset( $data['pi_discount_type'] ) ) {
				update_post_meta( $post_id, 'pi_discount_type', sanitize_text_field( $data['pi_discount_type'] ) );
			}
			if ( isset( $data['pi_discount'] ) ) {
				update_post_meta( $post_id, 'pi_discount', sanitize_textarea_field( $data['pi_discount'] ) );
			}
			if ( isset( $data['pi_discount_start_time'] ) ) {
				update_post_meta( $post_id, 'pi_discount_start_time', sanitize_text_field( self::validateDate($data['pi_discount_start_time']) ) );
			}
			if ( isset( $data['pi_discount_end_time'] ) ) {
				update_post_meta( $post_id, 'pi_discount_end_time',  sanitize_text_field( self::validateDate($data['pi_discount_end_time'])) );
			}
			
            if ( isset( $data['pi_condition_logic'] ) ) {
				update_post_meta( $post_id, 'pi_condition_logic', sanitize_text_field( $data['pi_condition_logic'] ) );
            }else{
                update_post_meta( $post_id, 'pi_condition_logic', 'and' );
            }

            $pi_selection  = array();
           
            if(isset($data['pi_selection']) && is_array($data['pi_selection'])){
            foreach($data['pi_selection'] as $key => $condition){
                $pi_selection[] = array(
                    'pi_condition'=>sanitize_text_field($condition['pi_cdrw_condition']),
                    'pi_logic'=>isset($condition['pi_cdrw_logic']) ? sanitize_text_field($condition['pi_cdrw_logic']) : "",
                    'pi_value'=>isset($condition['pi_cdrw_condition_value']) ? self::sanitizeValues($condition['pi_cdrw_condition_value']) : ""
                );
            }
            }

            if(is_array($pi_selection)){
                update_post_meta( $post_id, 'pi_metabox', $pi_selection );
            }

            if ( isset( $data['pi_coupon_template'] ) ) {
				update_post_meta( $post_id, 'pi_coupon_template',  sanitize_text_field( $data['pi_coupon_template']) );
            }

            
            if(!empty($redirect_url)){
                return $redirect_url;
            }
            
           return true;

        }
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
        check_ajax_referer( 'cdrw-actions' );
        
        $post_id = filter_input(INPUT_POST,'id');
        $status = filter_input(INPUT_POST,'status');

        if(!current_user_can('administrator') || empty($post_id)) return;
        
        if ( !empty($status) ) {
            update_post_meta( $post_id, 'pi_status', "on" );
        } else {
            update_post_meta( $post_id, 'pi_status', "off");
        }
        
    }
    
}

new Class_Pi_Cdrw_Add_Edit($this->plugin_name);