<?php

class Aa508_Call_Pro{

    public $plugin_name;

    private $setting = array();

    private $active_tab;

    private $this_tab = 'go-pro';

    private $tab_name = "Go PRO";

    private $setting_key = 'go-pro';


    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;
        
        $this->active_tab = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'default';

        $this->settings = array(
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
        
        <div  class="px-10">
            <div class="text-center">
            <img class="button1" style="width:60%; " src="<?php echo plugin_dir_url( __FILE__ ); ?>img/img5.jpg" />
    </div>
            <p>
            Do you want to go PRO? To find out if going PRO is the best option for you and your company, just follow this link <a href="https://www.stpetedesign.com/pro-accessibility-button/" target="_blank">St Pete Design PRO</a> and let our trained professionals handle it.
            </p>

<p>If you are unable to have one of your company representatives available to help an individual access your website whenever needed.<strong>We have you covered!</strong> We offer a service that provides a live customer representative that will walk a disabled user through your website. This elimanates the need for you to have to deal with web accessibility issues typically seen on the internet without diverting any man power or added payroll.
</p>

<p>
Check Us Out - Follow this link <a href="https://www.stpetedesign.com/pro-accessibility-button/" target="_blank">St Pete Design</a> to check out our page that explains all of the great reasons why you should go PRO and at the same time, get lots of other great ideas to help you stay WCAG compliant.
</p>

<div class="text-center">
<a  target="_blank" class="contact-btn" href="https://www.stpetedesign.com/ada-section-508-compliant/">CONTACT US</a>
        </div>
        </div>
        
       <?php
    }
}

add_action($this->plugin_name.'_general_option', new  Aa508_Call_Pro($this->plugin_name));