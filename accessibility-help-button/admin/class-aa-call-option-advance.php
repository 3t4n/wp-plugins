<?php

class Aa508_Call_Advanced_Option{

    public $plugin_name;

    private $setting = array();

    private $active_tab;

    private $this_tab = 'aa-advance-setting';

    private $tab_name = "Options";

    private $setting_key = 'aa-advance-setting';


    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;
        
        $this->active_tab = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'default';

        $this->settings = array(
                array('field'=>'aa-bg-color','type'=>'color', 'label'=>__('Button Background Color','aa-call'), 'default'=>'#13a503'),
                array('field'=>'aa-bg-hover-color','type'=>'color', 'label'=>__('Button Background Hover Color','aa-call'), 'default'=>'#13a503'),
                array('field'=>'aa-text-color','type'=>'color', 'label'=>__('Button Text Color','aa-call'), 'default'=>'#fff'),
                array('field'=>'aa-text-hover-color','type'=>'color', 'label'=>__('Button Text Hover Color','aa-call'), 'default'=>'#fff'),
                array('field'=>'button-text','type'=>'text', 'label'=>__('Button Text','aa-call'), 'default'=>'For Disability Assistance Call'),
                array('field'=>'ass-label','type'=>'text', 'label'=>__('Screen Reader Text','aa-call'), 'default'=>'If you are using a screen reader and need help please use this button for assistance'),
                array('field'=>'border-radius','type'=>'number', 'min'=>0, 'max'=>20, 'label'=>__('Button Edges','aa-call'), 'default'=>20),
                array('field'=>'y-padding','type'=>'number', 'min'=>0, 'max'=>20, 'label'=>__('Top and Bottom padding','aa-call'), 'default'=>10),
                array('field'=>'x-padding','type'=>'number', 'min'=>0, 'max'=>40, 'label'=>__('Left and Right padding','aa-call'), 'default'=>15),
                array('field'=>'font-size','type'=>'number', 'min'=>0, 'max'=>30, 'label'=>__('Font Size','aa-call'), 'default'=>20),
                array('field'=>'font-weight','type'=>'select', 'label'=>__('Font Weight','aa-call'),'value'=> array(200=>"Thin",400 => "Regular",700 => "Bold"), 'default'=>700),
                array('field'=>'hide-button','type'=>'select', 'label'=>__('Show button only for screen readers','aa-call'),'value'=> array("show-all" => "Show for all user", 'show-reader-only'=>"Show for screen readers only"), 'default'=> 'show-all' ),
                array('field'=>'button-position','type'=>'select', 'label'=>__('Button position on front end','aa-call'),'value'=> array("tl" => "Top - Left", 'tr'=>"Top - Right", 'br'=>"Bottom - Right", 'bl'=>'Bottom - Left'), 'default'=> 'br' ),
                array('field'=>'button-type', 'type'=>'hidden', 'label'=>__('Button Shadow','aa-call'), 'default'=>'button0')
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
            <?php _e( $this->tab_name, 'aa-call' ); ?> 
        </a>
        <?php
    }

    function tab_content(){
        $text = get_option('button-text', 'For Disability Assistance Call');
         $href = get_option('phone_number', "");
       ?>
        <form method="post" action="options.php"  class="pisol-setting-form">
        <?php settings_fields( $this->setting_key ); ?>
        
        <?php
            foreach($this->settings as $setting){
                echo '<div class="pisol_grid">';
                new pisol_class_form($setting, $this->setting_key);
                echo '</div>';
            }
        ?>
        
        <div id="shadow-option">
        <a class="button0 aa-button" data-target="button0"><?php echo $text; ?><br><?php echo $href; ?></a>
        <a class="button1 aa-button" data-target="button1"><?php echo $text; ?><br><?php echo $href; ?></a>
        <a class="button2 aa-button" data-target="button2"><?php echo $text; ?><br><?php echo $href; ?></a>
        <a class="button3 aa-button" data-target="button3"><?php echo $text; ?><br><?php echo $href; ?></a>
        <a class="button4 aa-button" data-target="button4"><?php echo $text; ?><br><?php echo $href; ?></a>
        <a class="button5 aa-button" data-target="button5"><?php echo $text; ?><br><?php echo $href; ?></a>
        </div>
        <div class="px-10" id="pi-advance-submit">
        <?php submit_button("Save"); ?>
        </div>
        
        </form>
       <?php
    }
}

add_action($this->plugin_name.'_general_option', new Aa508_Call_Advanced_Option($this->plugin_name));