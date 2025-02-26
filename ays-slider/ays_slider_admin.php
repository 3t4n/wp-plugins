<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class AYS_Slider_admin{
    protected $version = '1.0.0';
    protected $plugin_name = 'AYSSlider';
    protected $prefix = 'ays';
    protected static $instance = null;
	  protected $ays_db_version = '1.0';

    private function __construct() {
      $this->setup_constants();
      add_action('admin_menu', array($this, 'my_plugin_menu'));
      add_shortcode( 'ays_slider', array($this,'ays_sl_shortcode_func'));
      add_action('wp_ajax_gen_ays_sl_shortcode', array($this,'gen_ays_sl_shortcode_callback'));
      add_action('admin_enqueue_scripts',array($this,'ays_admin_enq_nk_script'));
      add_action('wp_enqueue_scripts',array($this,'user_enq_script'));
      add_filter("mce_external_plugins", array($this,"ays_sl_register_tinymce_plugin"));
      add_filter('mce_buttons', array($this,'ays_sl_add_tinymce_button'));
    }

    public function setup_constants() {
        if (!defined('AYS_DIR')) {
            define('AYS_DIR', dirname(__FILE__));
        }

        if (!defined('AYS_PREFIX')) {
            define('AYS_PREFIX', $this->prefix);
        }
        if (!defined('AYS_NAME')) {
            define('AYS_NAME', $this->plugin_name);
        }
        if (!defined('AYS_URL')) {
            define('AYS_URL', plugins_url(plugin_basename(dirname(__FILE__))));
        }
        if (!defined('AYS_VERSION')) {
            define('AYS_VERSION', plugins_url($this->version));
        }
		if(!defined('AYS_FILE')){
			define( 'AYS_FILE', AYS_DIR . 'ays_slider.php' );
		}
    }
	public function my_plugin_menu(){
		$slider_page = add_menu_page('Welcome to AYS Slider', 'AYS Slider', 'manage_options', 'ayssettings', array($this, "ays_page"));
		$slider_page = add_submenu_page('ayssettings', 'AYS Slider', 'AYS Slider Settings', 'manage_options', 'ayssettings',array($this, "ays_page"));
		//add_action('admin_print_styles-' . $slider_page, array($this,'enqueue_styles' ));
		//add_action('admin_print_scripts-' . $slider_page, array($this,'enqueue_scripts' ));
		//$plugin_page = add_submenu_page('ayssettings', 'About AYS', 'About plugin', 'manage_options', 'aysabout',array($this, "plugin_page"));
		//add_action('admin_print_styles-' . $plugin_page, array($this,'enqueue_styles' ));
		//add_action('admin_print_scripts-' . $plugin_page, array($this,'enqueue_scripts' ));

	}

    public  function ays_page(){
    		include_once( AYS_DIR . '/views/admin/ays_sliders.php' );
    		if (isset($_GET["task"]) && $_GET["task"] == "add"){
    			AYSSlides::add();
    		}
    		else if(isset($_GET["task"]) && $_GET["task"] == "edit" ){
    			AYSSlides::edit();
    		}
    		else if(isset($_GET["task"]) && $_GET["task"] == "delete" ){
    			AYSSlides::delete();
    		}
    		else{
    			AYSSlides::display_list();
    		}
	  }
	public function plugin_page()
	{
		include_once( AYS_DIR . '/views/admin/ays_plug.php' );
	}
	public static function get_instance() {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

	public function get_name() {
        return $this->plugin_name;
    }
    /**
     * Return the plugin prefix.
     */
    public function get_prefix() {
        return $this->prefix;
    }
    /**
     * Return the plugin version.
     */
    public function get_version() {
        return $this->version;
    }

	public static function activation(){
		global $wpdb;
		$table = $wpdb->prefix . 'nk_slider_table';
		$sql="CREATE TABLE IF NOT EXISTS `".$table."` (
			  `id` 					INT(11)	NOT NULL AUTO_INCREMENT,
			  `slider_name` 		VARCHAR(30) DEFAULT NULL,
        `slider_caption` 		TEXT DEFAULT NULL,
			  `slider_date` 		VARCHAR(30) DEFAULT NULL,
			  `slider_width` 		INT(20) DEFAULT NULL,
			  `slider_height` 		INT(20) DEFAULT NULL,
			  `slider_files` 		TEXT DEFAULT NULL,
			  `slider_urls` 		TEXT DEFAULT NULL,
			  `slider_text` 		TEXT DEFAULT NULL,
			  `slider_effects` 		TEXT DEFAULT NULL,
			  `element_effects` 	TEXT DEFAULT NULL,
			  `slide_duration` 		INT(20) DEFAULT NULL,
			  `element_duration` 	INT(20) DEFAULT NULL,
			  `element_delay`	 	INT(20) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		add_option( 'ays_db_version', $ays_db_version);
	}
	public static function deactivation(){
		delete_option("ays_db_version");
	}
	public static function uninstall(){
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}nk_slider_table");
		delete_option("ays_db_version");
	}
	public function user_enq_script(){
    wp_enqueue_script('jquery');
    wp_register_style( 'my-plugin', AYS_URL.'/generic.css');
    wp_register_style( 'my-plugin1', AYS_URL.'/themes/1/js-image-slider.css');
    wp_register_script( 'my-script1', AYS_URL.'/themes/1/js-image-slider.js');
    wp_enqueue_style( 'my-plugin' );
    wp_enqueue_style( 'my-plugin1' );
    wp_enqueue_script( 'my-script1' );
    //registering slider plugin css
    wp_register_style('ays_plugin1',AYS_URL.'/CSS/main.css');
    //wp_register_style('ays_plugin2',AYS_URL.'/css/normalize.css');
    wp_register_style('ays_plugin3',AYS_URL.'/CSS/pogo-slider.css');
    wp_enqueue_style( 'ays_plugin1' );
    //wp_enqueue_style( 'ays_plugin2' );
    wp_enqueue_style( 'ays_plugin3' );
    //registering slider plugin js
    wp_register_script( 'ays_script2', AYS_URL.'/JS/jquery.pogo-slider.js');
    wp_register_script( 'ays_script3', AYS_URL.'/JS/main.js');
    wp_enqueue_script( 'ays_script2' );
    wp_enqueue_script( 'ays_script3' );
    //my new AYS SLIDER js And css
    wp_register_style('ays_slider_style',AYS_URL.'/CSS/style.css');
    wp_register_style('ays_slider_ef_style',AYS_URL.'/ays-plugin/css/settings.css');
    wp_enqueue_style( 'ays_slider_style' );
    wp_enqueue_style( 'ays_slider_ef_style' );

    wp_register_script( 'ays_slider_js', AYS_URL.'/ays-plugin/js/jquery.ays.min.js');
    wp_register_script( 'ays_slider_ef_js', AYS_URL.'/ays-plugin/js/jquery.ays.tools.min.js');
    wp_enqueue_script( 'ays_slider_js' );
    wp_enqueue_script( 'ays_slider_ef_js' );

    }
    public function ays_admin_enq_nk_script(){
      wp_enqueue_script('jquery');
      wp_register_style('ays_admin_style',AYS_URL.'/includes/admin_style.css');
      wp_enqueue_style( 'ays_admin_style');
      wp_enqueue_script( 'jquery-ui-sortable');
      wp_register_style('ays_slider_ef_style_admin',AYS_URL.'/ays-plugin/css/settings.css');
      wp_enqueue_style( 'ays_slider_ef_style_admin' );
      wp_enqueue_media();
    }
	function ays_sl_shortcode_func( $attributes ) {
		if( !array_key_exists( 'id', $attributes ) ) {
			$text_to_display = "No text provided in shortcode.";
		}
		else {
      $text_to_display = $attributes['id'];
      $ays_w = $attributes['w'];
      $ays_h = $attributes['h'];
		}
		global $wpdb;
		$table_name = $wpdb->prefix . 'nk_slider_table';
		$res = $wpdb->get_results("SELECT slider_files,slider_urls,slide_duration,element_duration,element_delay,slider_effects,element_effects,slider_text,slider_caption FROM ".$table_name." WHERE id=".$text_to_display."");
		foreach($res as $results){
			$nkarner = $results->slider_files;
			$nk=explode("***",$nkarner);
            array_pop($nk);
            $slider_caption = $results->slider_caption;
      			$s_dur = $results->slide_duration;
      			$e_dur = $results->element_duration;
      			$e_del = $results->element_delay;
            $element_effects = $results->element_effects;


            $slider_effects = $results->slider_effects;
            $slider_effects_arr = explode("***",$slider_effects);

            $slider_texts = $results->slider_urls;
            $slider_texts_array = explode("***",$slider_texts);
            array_pop($slider_texts_array);

            $slider_image_text = $results->slider_text;
            $slider_image_text_array = explode("***",$slider_image_text);
            array_pop($slider_image_text_array);
            $size = array();
		}
        ?>
        <div class="ays_nk_handler">
            <div class="ays_handler">
				<div class="nk-banner-container">
					<div class="nk-banner">
						<ul>
                        <?php
	                        foreach($nk as $index => $nk_slides){
	                            if($slider_texts_array[$index] == "ays_noUrl"){
	                                $slider_urls = "";
	                            }else{
	                                $slider_urls = $slider_texts_array[$index];
	                            }
	                            if($slider_image_text_array[$index] == "ays_noText"){
	                                $slider_text = "";
	                            }
	                            else{
	                                $slider_text=$slider_image_text_array[$index];
	                            }
                              if($slider_text != "" && $slider_urls != ""){
                                  $slider_layer = '<div class="tp-caption '.$slider_caption.' skewfromrightshort fadeout"
                              												data-x="left"
                              												data-y="80"
                              												data-speed="'.$e_dur.'"
                              												data-start="'.$e_del.'"
                              												data-easing="'.$element_effects.'"><a href="'.$slider_urls.'">'.$slider_text.'</a>
                            											 </div>';
                              }
                              else{
                                  $slider_layer = "";
                              }
	                            if(count($slider_effects_arr) == 70){
			                        echo '
            										<li data-transition="random" data-slotamount="7" data-masterspeed="1500"  class="defaultimg">
            											<!-- MAIN IMAGE -->
            											<img src="'.$nk_slides.'" alt="slidebg1"  data-bgfit="100% 100%" data-bgposition="left top" data-bgrepeat="no-repeat">
                                  '.$slider_layer.'
            										</li>
		                            ';
	                            }
	                            else{

	                            	if($slider_effects_arr[0] == ""){
	                            		array_shift($slider_effects_arr);
	                            	}
			                        echo '
										<li data-transition="'.$slider_effects_arr[array_rand($slider_effects_arr)].'" data-slotamount="7" data-masterspeed="1500"  class="defaultimg">
											<!-- MAIN IMAGE -->
											<img src="'.$nk_slides.'" alt="slidebg1"  data-bgfit="100% 100%" data-bgposition="left top" data-bgrepeat="no-repeat">
                      '.$slider_layer.'
										</li>
		                            ';
	                            }
	                        }
                        ?>
					</div>
					<div class="nk-bannershadow nk-shadow3" style="width: 100%;"></div>
				</div>
            </div>
        </div>
            <div style="clear:both;height:130px;">

            </div>
            <script type="text/javascript">
            	jQuery(document).ready(function(){
            		var ays_nk_handler_chap = jQuery(".ays_nk_handler").width();
            		var ays_user_set_chap = "<?php echo $ays_w; ?>";
            		if(ays_nk_handler_chap>ays_user_set_chap){
            			jQuery(".ays_handler").css("width",ays_user_set_chap);
            		}
            	});
            </script>
            <style>
				.boxedcontainer	{
					max-width: 1170px;
					margin:auto;
					/*padding:0px 30px;*/
				}
				.ays_handler{
					position: relative;
				    height: <?php echo $ays_h."px"; ?>;
					margin-top: 25px;
				}
				.nk-banner-container{
					width:100%;
					position:absolute;
					padding:0;

				}
				.nk-banner{
					width:100%;
					position:relative;
				}
				.nk-banner-fullscreen-container {
					width:100%;
					position:relative;
					padding:0;
				}
				.nk-bannershadow  {
					position:absolute;
					margin-left:auto;
					margin-right:auto;
					-moz-user-select: none;
			    -khtml-user-select: none;
			    -webkit-user-select: none;
			    -o-user-select: none;
				}

				.nk-bannershadow.nk-shadow1 {
					background:url(../assets/shadow1.png) no-repeat;
					background-size:100%;
					width:890px;
					height:30px;
					bottom:-30px;
				}
				.nk-bannershadow.nk-shadow2 {
					background:url(../assets/shadow2.png) no-repeat;
					background-size:100%;
					width:890px;
					height:60px;
					bottom:-60px;
				}
				.nk-bannershadow.nk-shadow3 {
					background:url(<?php echo AYS_URL.'/ays-plugin/assets/shadow3.png'; ?>) no-repeat;
					background-size:100%;
					width:890px;
					height:60px;
					bottom:-60px;
				}
            </style>
       		<script type="text/javascript">
				var revapi;
				jQuery(document).ready(function() {
				   ays_api = jQuery('.nk-banner').ays_slider(
					{
						delay:<?php echo $s_dur; ?>,
						startwidth:<?php echo $ays_w; ?>,
						startheight:<?php echo $ays_h; ?>,

						hideThumbs:200,
						navigationType:"bullet",     // use none, bullet or thumb
						navigationArrows:"solo",     // nexttobullets, solo (old name verticalcentered), none

						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:4,
						touchenabled:"on",
						onHoverStop:"on"
					});
				});	//ready
			</script>
        <?php
	}
  public static function ays_get_slider_options(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'nk_slider_table';
    $res = $wpdb->get_results("SELECT id,slider_name,slider_width,slider_height FROM ".$table_name."");
    $aysGlobal_array = array();
    $aysStatic_array = array();
    foreach($res as $ays_res_options){
        $aysStatic_array[] = $ays_res_options->id;
        $aysStatic_array[] = $ays_res_options->slider_name;
        $aysStatic_array[] = $ays_res_options->slider_width;
        $aysStatic_array[] = $ays_res_options->slider_height;
        $aysGlobal_array[] = $aysStatic_array;
    }
    return $aysGlobal_array;
  }

  /*function ays_sb_shortcode_button_init() {
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
          return;
  }*/

  function ays_sl_register_tinymce_plugin($plugin_array) {
      $plugin_array['ays_sl_button_mce'] = AYS_URL .'/JS/ays_sl_shortcode.js';
      return $plugin_array;
  }

  function ays_sl_add_tinymce_button($buttons) {
      $buttons[] = "ays_sl_button_mce";
      return $buttons;
  }

  function gen_ays_sl_shortcode_callback() {
  	$shortcode_data = $this->ays_get_slider_options();
  	?>
  	<html xmlns="http://www.w3.org/1999/xhtml">
  		<head>
  			<title>AYS Slider</title>
  			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  			<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
  			<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
  			<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>

  			<?php
  				wp_print_scripts('jquery');
  			?>
  			<base target="_self">
  		</head>
  		<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" dir="ltr" class="forceColors">
  			<div class="select-sb">

          <table align="center">
              <tr>
                <td><label for="ays_slider">AYS Slider</label></td>
                <td>
                  <span>
          					<select id="ays_slider" style="padding: 2px; height: 25px; font-size: 16px;width:100%;">
                        <option>--Select Slider--</option>
          					<?php foreach($shortcode_data as $data)
          						echo '<option id="'.$data[0].'" value="'.$data[0].'" mw="'.$data[2].'" mh="'.$data[3].'" class="ays_sl_options">'.$data[1].'</option>';
          					?>
          					</select>
          				</span>
                </td>
              </tr>
              <tr>
                <td><label for="ays_sl_nk_width_get">Slider width</label></td>
                <td><input type="number" name="ays_sl_nk_width_get" id="ays_sl_nk_width_get" style="padding: 2px; height: 25px; font-size: 16px;"></td>
              </tr>
              <tr>
                <td><label for="ays_sl_nk_height_get">Slider height</label></td>
                <td><input type="number" name="ays_sl_nk_height_get" id="ays_sl_nk_height_get" style="padding: 2px; height: 25px; font-size: 16px;"></td>
              </tr>
          </table>
  			</div>
  			<div class="mceActionPanel">
  				<input type="submit" id="insert" name="insert" value="Insert" onClick="sl_insert_shortcode();"/>
  			</div>
        <script>
            jQuery("#ays_slider").change(function(event){
      				var ays_nk_mw = jQuery( "#ays_slider option:selected").attr("mw");
      				var ays_nk_mh = jQuery( "#ays_slider option:selected").attr("mh");
      				jQuery("#ays_sl_nk_width_get").val(ays_nk_mw);
      				jQuery("#ays_sl_nk_height_get").val(ays_nk_mh);
      			});
        </script>
        <script type="text/javascript">
  			function sl_insert_shortcode() {
          var mw = document.getElementById('ays_sl_nk_width_get').value;
  				var mh = document.getElementById('ays_sl_nk_height_get').value;
  				var tagtext = '[ays_slider id="' + document.getElementById('ays_slider')[document.getElementById('ays_slider').selectedIndex].id + '" w="'+ mw +'" h="'+ mh +'"]';
  				window.tinyMCE.execCommand('mceInsertContent', false, tagtext);
  				tinyMCEPopup.close();
  			}
          </script>

        </body>
      </html>
      <?php
      die();
  }

	}
