<?php

class Class_Pi_Cdrw_Future_coupon_lists{

    public $plugin_name;

    private $settings = array();

    private $active_tab;

    private $this_tab = 'coupons-list';

    private $tab_name = "Coupon templates";

    private $setting_key = 'pi_cdrw_future_coupons_list';
    
    

    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;

       
        $this->tab = sanitize_text_field(filter_input( INPUT_GET, 'tab'));
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        if($this->this_tab == $this->active_tab){
            add_action($this->plugin_name.'_tab_content', array($this,'tab_content'));
        }


        add_action($this->plugin_name.'_tab', array($this,'tab'),1);

        $action = sanitize_text_field(filter_input(INPUT_GET, 'action'));
        if($action == 'cdrw_delete_template'){
            $this->post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            add_action('init',array($this,'deletePost' ));
        }

    }

    
    function tab(){
        ?>
        <a class=" px-3 text-light d-flex align-items-center  border-left border-right  <?php echo ($this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary'); ?>" href="<?php echo admin_url( 'admin.php?page='.sanitize_text_field($_GET['page']).'&tab='.$this->this_tab ); ?>">
            <?php _e( $this->tab_name); ?> 
        </a>
        <?php
    }

    function tab_content(){
       $this->listShippingMethod();
    }

    function listShippingMethod(){
        
        include plugin_dir_path( __FILE__ ) . 'partials/listCouponsTemplate.php';
    }

    function deletePost(){
        $submitted_value = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
        if(!wp_verify_nonce($submitted_value, 'cdrw-delete-'.$this->post_id)){
            wp_safe_redirect(  admin_url( '/admin.php?page=pisol-cdrw&tab=coupons-list' )  );
            wp_die( 'Your page has expired, refresh and try again' );
        }

        $require_capability =  Pi_Cdrw_Menu::getCapability();
        if(!current_user_can( $require_capability )) {
            wp_safe_redirect(  admin_url( '/admin.php?page=pisol-cdrw&tab=coupons-list'  ) );
            exit();
        }
        wp_delete_post($this->post_id);
        wp_safe_redirect(  admin_url( '/admin.php?page=pisol-cdrw&tab=coupons-list'  ) );
        exit();
    }
    
}

new Class_Pi_Cdrw_Future_coupon_lists($this->plugin_name);