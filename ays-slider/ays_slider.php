<?php
/*
 * Plugin Name:     AYS Slider
 * Plugin URI:		http://ays-pro.com
 * Description:     Create Beautifull And Responsive Image Sliders With Effects
 * Version:         1.0.0
 * Author:          AYS Pro
 * Author URI:      http://ays-pro.com
 */



require_once( 'slider.php' );
require_once( 'ays_slider_admin.php' );
require_once( 'includes/helper.php' );
if( ! defined( 'AYS_MAIN_FILE' ) ) {
	define( 'AYS_MAIN_FILE', plugin_basename(__FILE__));

}if( ! defined( 'AYS_DIR' ) ) {
	define( 'AYS_DIR', dirname(__FILE__));

}if(! defined( 'AYS_URL' ) ){
    define ('AYS_URL',plugins_url(plugin_basename(dirname(__FILE__))));
}

add_action( 'plugins_loaded', array( 'AYS_Slider_admin', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'AYS', 'get_instance' ) );

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX )  ) {
	register_uninstall_hook( __FILE__, array( 'AYS_Slider_admin', 'uninstall' )  );
	register_deactivation_hook( __FILE__, array( 'AYS_Slider_admin', 'deactivation' )  );
	register_activation_hook( __FILE__, array( 'AYS_Slider_admin', 'activation' ) );
}


class AYS_Slider_widget extends WP_Widget {
	public $sl_name_ays;
	// constructor
	function AYS_Slider_widget() {
		parent::WP_Widget(false, $name = __('AYS Slider Widget', 'wp_widget_plugin') );
	}

	// widget form creation
	function form($instance) {

		// Check values
		if( $instance) {
			 $slider_name = esc_attr($instance['slider_name']);
			 $width = esc_attr($instance['width']);
			 $height = esc_textarea($instance['height']);
			 $sl_name_ays = esc_attr($instance['slider_name']);
		}
		else {
			 $slider_name = '';
			 $width = '';
			 $height = '';
			 $sl_name_ays='';
		}
		?>


		<label for="<?php echo $this->get_field_id('slider_name'); ?>"><?php _e('Slider name', 'wp_widget_plugin'); ?></label>
		<table cellpadding="15" align="center" style="margin-top:10px;margin-bottom:10px;">
			<tr>
				<td>Slider name</td>
				<td>
					<select name="<?php echo $this->get_field_name('slider_name'); ?>" id="<?php echo $this->get_field_id('slider_name'); ?>" style="width:173px;">
						<option>--Select AYS Slider--</option>'
					<?php
						$name_arra = array();
						global $wpdb;
						$table_name = $wpdb->prefix . 'nk_slider_table';
						$res = $wpdb->get_results("SELECT id,slider_name,slider_width,slider_height FROM ".$table_name."");
						foreach($res as $results){
							if($results->id==$slider_name)
							{
								echo "<option  value=".$results->id." selected class='ays_sl_name' mw=".$results->slider_width." mh=".$results->slider_height.">".$results->slider_name."</option>";
							}
							else
							{
								echo "<option  value=".$results->id." class='ays_sl_name' mw=".$results->slider_width." mh=".$results->slider_height.">".$results->slider_name."</option>";
							}
						}

					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'wp_widget_plugin'); ?></label>
				</td>
				<td>
					<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'wp_widget_plugin'); ?></label>
				</td>
				<td>
					<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo $height; ?>">
				</td>
			</tr>
			<input type="hidden" id="<?php echo $this->get_field_id('sl_name_ays'); ?>" name="ays_hid">
		</table>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script>
			$("#<?php echo $this->get_field_id('slider_name'); ?>").change(function(event){
				var ays_short_id = $( "#<?php echo $this->get_field_id('slider_name'); ?> option:selected").val();
				var mw = $( "#<?php echo $this->get_field_id('slider_name'); ?> option:selected").attr("mw");
				var mh = $(  "#<?php echo $this->get_field_id('slider_name'); ?> option:selected").attr("mh");
				var ays_name =  $(  "#<?php echo $this->get_field_id('slider_name'); ?> option:selected").text();
				//alert(ays_name);
				$("#<?php echo $this->get_field_id('sl_name_ays'); ?>").val(ays_name);
				$("#<?php echo $this->get_field_id('width'); ?>").val(mw);
				$("#<?php echo $this->get_field_id('height'); ?>").val(mh);
			});
		</script>
	<?php
	}

	// display widget
	function widget($args, $instance) {
	   extract( $args );
	   // these are the widget options
	   $slider_name =  $instance['slider_name'];
	   $width = $instance['width'];
	   $height = $instance['height'];
		global $wpdb;
		$table_name = $wpdb->prefix . 'nk_slider_table';
		$res = $wpdb->get_results("SELECT slider_files FROM ".$table_name." WHERE id=".$slider_name."");
		foreach($res as $results){
			$nkarner = $results->slider_files;
			$nk=explode("***",$nkarner);
            array_pop($nk);
		}
        ?>
            <div id="sliderFrame">
                <div id="slider">
                    <?php
                       foreach($nk as $ays_files){
                            echo '<img src="'.AYS_URL.'/ays_picture.php?url='.$ays_files.'&width='.$width.'&height='.$height.'">';
                        }
                    ?>
                </div>
            </div>
            <div style="clear:both;height:30px;">

            </div>
            <style>
                #sliderFrame {
                    position: relative;
                    width: <?php echo $width."px"; ?>;
                    margin: 0 auto;
                    /*center-aligned*/
                }
                #slider,#slider div.sliderInner {
                    width: <?php echo $width."px"; ?>;
                    height: <?php echo $height."px"; ?>;
                    /* Must be the same size as the slider images */
                }
                #slider div.navBulletsWrapper  {
                    top:<?php echo ($height)."px"; ?>;/* Its position is relative to the #slider */
                    text-align:center;
                    background:none;
                    position:relative;
                    z-index:5;
                }
            </style>
        <?php



	}

	// update widget
	function update($new_instance, $old_instance) {
		  $instance = $old_instance;
		  // Fields
		  $instance['slider_name'] = strip_tags($new_instance['slider_name']);
		  $instance['width'] = strip_tags($new_instance['width']);
		  $instance['height'] = strip_tags($new_instance['height']);
		 return $instance;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("AYS_Slider_widget");'));
