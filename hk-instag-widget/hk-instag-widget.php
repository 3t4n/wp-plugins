<?php
/*
Plugin Name: HK Instagram Widget
Plugin URI: https://wordpress.org/support/profile/herrubkristin
Description: HK Instagram Widget - Display your InstaGram updates on website sidebar using HK Instagram Widget.
Version: 1.0
Author: Herrub Kristin
Author URI: https://wordpress.org/support/profile/herrubkristin
*/
class hkinstawgti_wid_section{
    
    public $options;
    
    public function __construct() {
        //you can run delete_option method to reset all data
        //delete_option('insGram_widget_options');
        $this->options = get_option('hkinstawgti_wid_option_form');
        $this->hkinstawgti_widget_register_fields_and_setting();
    }
    
    public static function add_hkinstawgti_widgets_tools_options_page(){
        add_options_page('HK Instagram Widget', 'HK Instagram Widget ', 'administrator', __FILE__, array('hkinstawgti_wid_section','sw_hkinstawgti_widget_tools_options'));
    }
    
    public static function sw_hkinstawgti_widget_tools_options(){
?>

<div class="bg">
  <h2 class="top-style">HK Instagram Widget Setting</h2>
  <form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields('hkinstawgti_wid_option_form'); ?>
    <?php do_settings_sections(__FILE__); ?>
    <p class="submit">
      <input name="submit" type="submit" class="button-success" value="Save Changes"/>
    </p>
  </form>
</div>
<?php
    }
    public function hkinstawgti_widget_register_fields_and_setting(){
        register_setting('hkinstawgti_wid_option_form', 'hkinstawgti_wid_option_form',array($this,'hkinstawgti_widget_validate_form_set'));
        add_settings_section('hkinstawgti_widget_main_section', 'Settings', array($this,'hkinstawgti_widget_main_cb_page_section'), __FILE__);
        //Start Creating Fields and Options
        //marginTop
        add_settings_field('marginTop', 'Margin Top', array($this,'marTop_section'), __FILE__,'hkinstawgti_widget_main_section');
        //pageURL
        add_settings_field('pageURL', 'Instagram Widget ID', array($this,'page_url_section'), __FILE__,'hkinstawgti_widget_main_section');
        //width
        add_settings_field('width', 'Width', array($this,'page_width_setion'), __FILE__,'hkinstawgti_widget_main_section');
        //height
        add_settings_field('height', 'Height', array($this,'page_height_setion'), __FILE__,'hkinstawgti_widget_main_section');
       
        //alignment option
         add_settings_field('alignment', 'Position', array($this,'page_position_section'),__FILE__,'hkinstawgti_widget_main_section');
    }
    public function hkinstawgti_widget_validate_form_set($plugin_options){
        return($plugin_options);
    }
    public function hkinstawgti_widget_main_cb_page_section(){
        //optional
    }

   
    //marginTop_settings
    public function marTop_section() {
        if(empty($this->options['marginTop'])) $this->options['marginTop'] = "110";
        echo "<input name='hkinstawgti_wid_option_form[marginTop]' type='text' value='{$this->options['marginTop']}' />";
    }
    //pageURL_settings
    public function page_url_section() {
        if(empty($this->options['pageURL'])) $this->options['pageURL'] = "";
        echo "<input name='hkinstawgti_wid_option_form[pageURL]' type='text' value='{$this->options['pageURL']}' />";
    }

    //width_settings
    public function page_width_setion() {
        if(empty($this->options['width'])) $this->options['width'] = "400";
        echo "<input name='hkinstawgti_wid_option_form[width]' type='text' value='{$this->options['width']}' />";
    }
    //page_height_setion
    public function page_height_setion() {
        if(empty($this->options['height'])) $this->options['height'] = "400";
        echo "<input name='hkinstawgti_wid_option_form[height]' type='text' value='{$this->options['height']}' />";
    }
   
  
   
    //alignment_settings
    public function page_position_section(){
        if(empty($this->options['alignment'])) $this->options['alignment'] = "left";
        $items = array('left','right');
        echo "<select name='hkinstawgti_wid_option_form[alignment]'>";
        foreach($items as $item){
            $selected = ($this->options['alignment'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    
}
add_action('admin_menu', 'hkinstawgti_widget_form_options');

function hkinstawgti_widget_form_options(){
    hkinstawgti_wid_section::add_hkinstawgti_widgets_tools_options_page();
}

add_action('admin_init','hkinstawgti_widget_form_object');
function hkinstawgti_widget_form_object(){
    new hkinstawgti_wid_section();
}
add_action('wp_footer','hkinstawgti_widget_add_content_in_page_footer');
function hkinstawgti_widget_add_content_in_page_footer(){
    
    $o = get_option('hkinstawgti_wid_option_form');
    extract($o);

$print_instagram = '';
$print_instagram .= '<iframe src="http://widgets-code.websta.me/w/'.$pageURL.'?ck=MjAxNi0wNi0yMFQwODo0MjoxNy4wMDBa" allowtransparency="true" frameborder="0"
 scrolling="no" style="border:none;overflow:hidden; width:'.$width.'px; height:'.$height.'px" ></iframe>';

$imgURL = plugins_url('assets/instagram-icon.png', __FILE__ );


?>
<?php if($alignment=='left'){?>
<div id="insGram_widget_display">
  <div id="insGram1" class="ilnk_area_left">
  <a class="open" id="ilink" href="javascript:;"><img style="top: 0px;right:-36px;" src="<?php echo $imgURL;?>" alt=""></a>
    <div id="insGram2" class="ilink_inner_area_left" >
    <?php echo $print_instagram; ?>
     
    </div>
     
    
  </div>
 
</div>

<style type="text/css">
        
        div.ilnk_area_left{        
            left: -<?php echo trim($width+10);?>px;         
            top: <?php echo $marginTop;?>px;         
            z-index: 10000; height:<?php echo trim($height+30);?>px;        
            -webkit-transition: all .5s ease-in-out;        
            -moz-transition: all .5s ease-in-out;        
            -o-transition: all .5s ease-in-out;        
            transition: all .5s ease-in-out;        
            }
        
        div.ilnk_area_left.showdiv{        
            left:0;
        
            }	
        
        div.ilink_inner_area_left{        
            text-align: left;        
            width:<?php echo trim($width);?>px;        
            height:<?php echo trim($height);?>px;        
            }
        
        
        </style>

<?php } else { ?>
<div id="insGram_widget_display">
  <div id="insGram1" class="ilnk_area_right">
  <a class="open" id="ilink" href="javascript:;"><img style="top: 0px;left:-36px;" src="<?php echo $imgURL;?>" alt=""></a>
    <div id="insGram2" class="link_inner_area_right">
      <?php echo $print_instagram; ?>
      
    </div>

  </div>
</div>
<style type="text/css">
        
        div.ilnk_area_right{ right: -<?php echo trim($width+10);?>px;top: <?php echo $marginTop;?>px; z-index: 10000;height:<?php echo trim($height+30);?>px; -webkit-transition: all .5s ease-in-out;  -moz-transition: all .5s ease-in-out; -o-transition: all .5s ease-in-out; transition: all .5s ease-in-out; }
        
        div.ilnk_area_right.showdiv{ right:0; }	
        
        div.link_inner_area_right{ text-align: left;        
            width:<?php echo trim($width);?>px;
            height:<?php echo trim($height);?>px;
        
            }
        
        div.ilnk_area_right .contacticonlink {	        
            left: -32px;        
            text-align: left;        
        }		
        
        </style>
<?php } ?>
 <script type="text/javascript">
        
        jQuery(document).ready(function() {
            jQuery('#ilink').click(function(){
                jQuery(this).parent().toggleClass('showdiv');
        
        });});
        </script>
<?php
}
add_action( 'wp_enqueue_scripts', 'register_hkinstawgti_widget_form_styles' );
add_action( 'admin_enqueue_scripts', 'register_hkinstawgti_widget_form_styles' );
 function register_hkinstawgti_widget_form_styles() {
    wp_register_style( 'hkinstawgti_widget_styles', plugins_url( 'assets/instagram_main.css' , __FILE__ ) );
    wp_enqueue_style( 'hkinstawgti_widget_styles' );
        wp_enqueue_script('jquery');
 }