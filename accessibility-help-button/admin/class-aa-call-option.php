<?php

class Aa508_Call_General_Option{

    public $plugin_name;

    private $setting = array();

    private $active_tab;

    private $this_tab = 'default';

    private $tab_name = "Home";

    private $setting_key = 'quick-start';


    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;
        
        $this->active_tab = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'default';

        $this->settings = array(
                array('field'=>'phone_number','type'=>'text', 'label'=>__('Enter your phone number and click the â€œQuick Startâ€? button','accessibility-help-button'))
            );
        

        if($this->this_tab == $this->active_tab){
            add_action($this->plugin_name.'_tab_content', array($this,'tab_content'));
        }

        add_action($this->plugin_name.'_tab', array($this,'tab'),1);

       
        $this->register_settings();
    }


    function register_settings(){   

        foreach($this->settings as $setting){
                register_setting( $this->setting_key, $setting['field']);
        }
    
    }

    function tab(){
        ?>
        <a class="nav-tab <?php echo $this->active_tab == $this->this_tab || '' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page='.$_GET['page'].'&tab='.$this->this_tab ); ?>">
            <?php _e( $this->tab_name, 'accessibility-help-button' ); ?> 
        </a>
        <?php
    }

    function tab_content(){
       ?>
        <form method="post" action="options.php"  class="pisol-setting-form">
        <?php settings_fields( $this->setting_key ); ?>
        <div class="pisol_grid">
        <?php
    
            foreach($this->settings as $setting){
                   
                new pisol_class_form($setting, $this->setting_key);
            }
        ?>
        <?php submit_button("Quick Start"); ?>
        </div>
        
        </form>
        <div class="px-10">
        <p>By entering your phone number and clicking â€œQuick Startâ€? we will automatically add a clickable button on every page of your website in the lower right-hand corner. This allows a person with a disability to contact your company and ask for help if they are having a problem navigating or using a certain part of your website. This plugin helps you stay compliant and at the same time help the 100's of millions of disabled people use the internet.
</p>

<p>We created this plugin to help companies stay in compliance with the latest WCAG ADA Section 508 guidelines. The majority of lawsuits that are happening with web accessibility have to do with Tittle III act of the American Disability Act. Title III says basically that all people, including people with disabilities must have the same access to everything your company offers and this includes your website.
</p>

<p>So by adding this button to the front of your website. You are allowing a person with a disability to get help navigating your website. This means that everybody has full access to your website or software and this one of the main components to being compliant.
</p>

<div class="text-center">
<a  target="_blank" href="https://www.stpetedesign.com/ada-section-508-compliant/"><img class="button1" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/img6.jpg" /></a>
<br>
<a  target="_blank" class="contact-btn" href="https://www.stpetedesign.com/ada-section-508-compliant/">CONTACT US</a>
        </div>
        </div>
       <?php
    }
}

add_action($this->plugin_name.'_general_option', new Aa508_Call_General_Option($this->plugin_name));