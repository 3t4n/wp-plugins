<?php

class stp_golf_option{

    public $plugin_name;

    private $settings = array();

    private $active_tab;

    private $this_tab = 'extra_options';

    private $tab_name = "Old settings";

    private $setting_key = 'cdrw_extra_old_setting';
    
    

    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;

        $this->free_product = $this->getSavedProductArray();

        $this->settings = array(
           
            
            array('field'=>'pi_cdrw_old_way_of_discount', 'label'=>__('Add discount as '), 'desc'=>__('How discount is applied to the cart as dynamic coupon or additional charge'), 'type'=>'select', 'default'=>"coupon", 'value'=>array('coupon'=> 'Coupon (Recommended)','additional-cost'=>'Additional Charge (Old way of applying the discount)')),

        );
        
        $this->tab = sanitize_text_field(filter_input( INPUT_GET, 'tab'));
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        if($this->this_tab == $this->active_tab){
            add_action($this->plugin_name.'_tab_content', array($this,'tab_content'));
        }


        add_action($this->plugin_name.'_tab', array($this,'tab'),10);

       
        $this->register_settings();

    }

    function getSavedProductArray(){
        $free_product_id = get_option('pisol_free_product',"");
        if( empty($free_product_id )) return array();

        $product_title = get_the_title($free_product_id);
        $product = array( $free_product_id => $product_title );
        return $product;
    }

    
    function delete_settings(){
        foreach($this->settings as $setting){
            delete_option( $setting['field'] );
        }
    }

    function register_settings(){   

        foreach($this->settings as $setting){
            register_setting( $this->setting_key, $setting['field']);
        }
    
    }

    function tab(){
        $page = sanitize_text_field(filter_input( INPUT_GET, 'page'));
        ?>
        <a class=" px-3 py-2 text-light d-flex align-items-center  border-left border-right  <?php echo ($this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary'); ?>" href="<?php echo admin_url( 'admin.php?page='.$page.'&tab='.$this->this_tab ); ?>">
            <?php _e( $this->tab_name); ?> 
        </a>
        <?php
    }

    function tab_content(){
        
       ?>
        <form method="post" action="options.php"  class="pisol-setting-form">
        <?php settings_fields( $this->setting_key ); ?>
        <?php
            foreach($this->settings as $setting){
                new pisol_class_form_sn($setting, $this->setting_key);
            }
        ?>
        <input type="submit" class="mt-3 btn btn-primary btn-sm" value="Save Option" />
        </form>
       <?php
    }

    
}

new stp_golf_option($this->plugin_name);