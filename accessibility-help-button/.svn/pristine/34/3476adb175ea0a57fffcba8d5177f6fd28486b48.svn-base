<?php

class Aa508_Call_Menu{

    public $plugin_name;
    
    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;
        add_action( 'admin_menu', array($this,'plugin_menu') );
    }

    function plugin_menu(){
        
        add_options_page(
            __( 'Accessiblity Button', 'accessibility-help-button' ),
            'Accessiblity Button',
            'manage_options',
            'aa-call',
            array($this, 'menu_option_page'),
            'dashicons-phone',
            6
        );
 
    }

    function menu_option_page(){
        ?>
        <div class="wrap acc-call-container">
            <h1><?php echo __('Accessibility Help Button','accessibility-help-button'); ?></h1>
            <h2 class="nav-tab-wrapper">
                <?php do_action($this->plugin_name.'_tab'); ?>
            </h2>
            <div id="main-wrap-area" class="pisol-main-wrap-area">
                <div class="pisol-form-container">
                    <?php do_action($this->plugin_name.'_tab_content'); ?>
                </div>
            </div>
        </div>
        <?php
    }

  
}