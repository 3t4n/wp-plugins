<?php

/*

Plugin Name: Ajax Contact Sidebar Slider

Plugin URI: http://geniusextensions.com/wpdemo/

Description: Contact Sidebar Slider

Author: geniusextensions

Version: 1.0

Author URI: http://geniusextensions.com/wpdemo/

*/

class RealContactSlider{

    

    public $options;

    

    public function __construct() {

        //you can run delete_option method to reset all data

        //delete_option('real_contact_plugin_options');

        $this->options = get_option('real_contact_plugin_options');

        $this->real_contact_register_settings_and_fields();

    }

    

    public static function add_contact_tools_options_page(){

        add_options_page('Contact Sidebar Slider', 'Contact Sidebar Slider', 'administrator', __FILE__, array('RealContactSlider','real_youtube_tools_options'));

    }

    

    public static function real_youtube_tools_options(){

?>

<div class="wrap">

    <?php screen_icon(); ?>

    <h2>Real Contact Widget Slider Configuration</h2>

    <form method="post" action="options.php" enctype="multipart/form-data">

        <?php settings_fields('real_contact_plugin_options'); ?>

        <?php do_settings_sections(__FILE__); ?>

        <p class="submit">

            <input name="submit" type="submit" class="button-primary" value="Save Changes"/>

        </p>

    </form>

</div>

<?php

    }

    public function real_contact_register_settings_and_fields(){

        register_setting('real_contact_plugin_options', 'real_contact_plugin_options',array($this,'real_contact_validate_settings'));

        add_settings_section('real_contact_main_section', 'Settings', array($this,'real_contact_main_section_cb'), __FILE__);

    

        add_settings_field('recipient', 'Recipient', array($this,'recipient_settings'), __FILE__,'real_contact_main_section');

         //name

        add_settings_field('name', 'Form Name', array($this,'name_settings'), __FILE__,'real_contact_main_section');

        //email

        //add_settings_field('email', 'Form Email', array($this,'email_settings'), __FILE__,'real_contact_main_section');

        //marginTop

        add_settings_field('marginTop', 'Margin Top', array($this,'marginTop_settings'), __FILE__,'real_contact_main_section');

        //alignment option

         add_settings_field('alignment', 'Alignment Position', array($this,'position_settings'),__FILE__,'real_contact_main_section');

        //width

        add_settings_field('width', 'Width', array($this,'width_settings'), __FILE__,'real_contact_main_section');

        //height

        add_settings_field('height', 'Height', array($this,'height_settings'), __FILE__,'real_contact_main_section');



    }

    public function real_contact_validate_settings($plugin_options){

        return($plugin_options);

    }

    public function real_contact_main_section_cb(){

        //optional

    }





    

    //recipient_settings

    public function recipient_settings() {

        if(empty($this->options['recipient'])) $this->options['recipient'] = "yourmail@gmail.com";

        echo "<input name='real_contact_plugin_options[recipient]' type='text' value='{$this->options['recipient']}' />";

    }



     //name_settings

    public function name_settings() {

        if(empty($this->options['name'])) $this->options['name'] = "Contact Us Slider";

        echo "<input name='real_contact_plugin_options[name]' type='text' value='{$this->options['name']}' />";

    }



      //email_settings

    public function email_settings() {

        if(empty($this->options['email'])) $this->options['email'] = "yourmail@gmail.com";

        echo "<input name='real_contact_plugin_options[email]' type='text' value='{$this->options['email']}' />";

    }

    

    //marginTop_settings

    public function marginTop_settings() {

        if(empty($this->options['marginTop'])) $this->options['marginTop'] = "250";

        echo "<input name='real_contact_plugin_options[marginTop]' type='text' value='{$this->options['marginTop']}' />";

    }

    //alignment_settings

    public function position_settings(){

        if(empty($this->options['alignment'])) $this->options['alignment'] = "left";

        $items = array('left','right');

        echo "<select name='real_contact_plugin_options[alignment]'>";

        foreach($items as $item){

            $selected = ($this->options['alignment'] === $item) ? 'selected = "selected"' : '';

            echo "<option value='$item' $selected>$item</option>";

        }

        echo "</select>";

    }

    //width_settings

    public function width_settings() {

        if(empty($this->options['width'])) $this->options['width'] = "350";

        echo "<input name='real_contact_plugin_options[width]' type='text' value='{$this->options['width']}' />";

    }

    //height_settings

    public function height_settings() {

        if(empty($this->options['height'])) $this->options['height'] = "400";

        echo "<input name='real_contact_plugin_options[height]' type='text' value='{$this->options['height']}' />";

    }



}

add_action('admin_menu', 'real_contact_trigger_options_function');



function real_contact_trigger_options_function(){

    RealContactSlider::add_contact_tools_options_page();

}



add_action('admin_init','real_contact_trigger_create_object');

function real_contact_trigger_create_object(){

    new RealContactSlider();

}

add_action('wp_footer','real_contact_add_content_in_footer');

function real_contact_add_content_in_footer(){
  
  $o = get_option('real_contact_plugin_options');
  extract($o);
  $total_height=$height-95;
  $max_height=$total_height+10;
  $myError='';
  $print_contact = '';
  $print_contact .= '
    <div class="contact-form">
     <form id="bs_contact_form"  method="post">
      <div class="contact-form-text ps_success_data"></div>
       <label for="email">Email:</label>
       <input type="text" name="cf_email" value="" placeholder="put your email" required/>
       <label for="Subject">Subject:</label>
       <input type="text" name="cf_subject" value="" placeholder="put the subject" required/>
       <label for="message">Message:</label>
       <textarea name="cf_message" ></textarea>
       <div class="contact-submit"><input type="submit" value="Send Email" /></div>
     </form>
    </div>';
$imgURL = plugin_dir_url(__FILE__).'assets/contact-icon.png';

?>

<style>

  div#cbox1 {

  height: <?php echo $max_height;?>px !important;

</style>

<?php if($alignment=='left'){?>

<div id="real_contact_display">

    <div id="cbox1" style="left: -<?php echo trim($width+10);?>px; top: <?php echo $marginTop;?>px; z-index: 10000; height:<?php echo trim($height+10);?>px;">

        <div id="cbox2" style="text-align: left;width:<?php echo trim($width);?>px;height:<?php echo trim($height);?>;">

            <a class="open" id="ylink" href="#"></a><img style="top: 0px;right:-50px;" src="<?php echo $imgURL;?>" alt="">

            <?php echo $print_contact; ?>

		</div>
    </div>

</div>



<script type="text/javascript">

  jQuery.noConflict();

  jQuery(function (){

  jQuery(document).ready(function()

  {

  jQuery.noConflict();

  jQuery(function (){

  jQuery("#cbox1").hover(function(){ 

  jQuery('#cbox1').css('z-index',101009);

  jQuery(this).stop(true,false).animate({left:  0}, 500); },

  function(){ 

      jQuery('#cbox1').css('z-index',10000);

      jQuery("#cbox1").stop(true,false).animate({left: -<?php echo trim($width+10); ?>}, 500); });

  });}); });

  jQuery.noConflict();

</script>

<?php } else { ?>

<div id="real_contact_display">

    <div id="cbox1" style="right: -<?php echo trim($width+10);?>px; top: <?php echo $marginTop;?>px; z-index: 10000; height:<?php echo trim($height+10);?>px;">

        <div id="cbox2" style="text-align: left;width:<?php echo trim($width);?>px;height:<?php echo trim($height);?>;">

            <a class="open" id="ylink" href="#"></a><img style="top: 0px;left:-50px;" src="<?php echo $imgURL;?>" alt="">

            <?php echo $print_contact; ?>
		</div>
    </div>

</div>



<script type="text/javascript">

  jQuery.noConflict();

  jQuery(function (){

  jQuery(document).ready(function()

  {

  jQuery.noConflict();

  jQuery(function (){

  jQuery("#cbox1").hover(function(){ 

  jQuery('#cbox1').css('z-index',101009);

  jQuery(this).stop(true,false).animate({right:  0}, 500); },

  function(){ 

      jQuery('#cbox1').css('z-index',10000);

      jQuery("#cbox1").stop(true,false).animate({right: -<?php echo trim($width+10); ?>}, 500); });

  });}); });

  jQuery.noConflict();

</script>

<?php } ?>

<?php

}
add_action('wp_ajax_bs_contact_submit', 'bs_contact_submit');
add_action('wp_ajax_nopriv_bs_contact_submit', 'bs_contact_submit');
add_action( 'wp_enqueue_scripts', 'register_real_contact_slider_styles');

function bs_contact_submit(){
  if (wp_verify_nonce($_POST['_nonce'], 'bs-contact-nonce')){
    $o = get_option('real_contact_plugin_options');
    extract($o);
    $data=$_POST['data'];
    parse_str($data, $data);
    //print_r($data);
    $mySubject = $data["cf_subject"];
    $myMessage=$data["cf_message"];
    $mailSender = wp_mail( $recipient, $mySubject, $myMessage);
    //print_r($mailSender);
    die();
  }
}

 function register_real_contact_slider_styles() {

    wp_register_style( 'register_real_contact_slider_styles', plugins_url( 'assets/style.css' , __FILE__ ) );

    wp_enqueue_style( 'register_real_contact_slider_styles' );

        wp_enqueue_script('jquery');

    wp_enqueue_script('bs_contact_ajax', plugin_dir_url(__FILE__).'assets/ajax.js',array('jquery'),true);
    $value = array(
      'ajax_url' => admin_url( 'admin-ajax.php' ),
      'bs_nonce' => wp_create_nonce( 'bs-contact-nonce') 
    );
    wp_localize_script( 'bs_contact_ajax', 'bs_ajax_object', $value);    

 }

 $real_contact_default_values = array(

     'marginTop' => 250,

     'recipient' => 'yourmail@mail.com',

     'width' => '350',

     'height' => '330',

     'alignment' => 'left'

     

 );

 add_option('real_contact_plugin_options', $real_contact_default_values);
