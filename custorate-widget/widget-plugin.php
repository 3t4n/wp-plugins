<?php
/*
Plugin Name: Custorate Beoordelingen
Plugin URI: http://www.custorate.nl/wordpress-plugin/
Description: Makelijke methode om een custorate widget toe te voegen.
Version: 1.12
Author: Custorate.nl
Author URI: http://www.custorate.nl
License: Free
*/

class WP_Custorate_Widget extends WP_Widget {
	
	public $widgetPlugin = "WP_Custorate_Widget";
	
	
	// constructor
	
	function WP_Custorate_Widget() {
		parent::WP_Widget(false, $name = __('Custorate Beoordelingen', $this->widgetPlugin) );
	}
	
	function __construct(){
		$this->WP_Custorate_Widget();
	}

	//$this->widgetPlugin
	function form($instance) {	
		// hier de widget code.
		$title = '';
		$api_key = '';
		$Cache_Days = 3;
		$aantal_beoordelingen = '';
		$bgcolor = '';
		
		if( $instance) {
			$title = esc_attr($instance['title']);
			$api_key= esc_attr($instance['api_key']);
			$Cache_Days= esc_attr($instance['Cache_Days']);
			$aantal_beoordelingen= esc_attr($instance['aantal_beoordelingen']); 
			$bgcolor = esc_attr($instance['bgcolor']);
			$style= esc_attr($instance['style']);
			$textcolor= esc_attr($instance['textcolor']);
			$width = esc_attr($instance['width']);
			
		} 
		if($Cache_Days*1 == 0){
			$Cache_Days = 3;
		}
		if($width*1 == 0){
			$width = 200;
		}
		if($aantal_beoordelingen == ""){
			$aantal_beoordelingen= 5;
		}
		if($bgcolor  == ""){
			$bgcolor  = "FFFFFF";
		}
		if($textcolor  == ""){
			$textcolor  = "000000";
		}		
		

	?>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Titel', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

		<p>
		<label for="<?php echo $this->get_field_id('api_key'); ?>"><?php _e('API Key', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('api_key'); ?>" name="<?php echo $this->get_field_name('api_key'); ?>" type="text" value="<?php echo $api_key; ?>" />
		<br>
		<a href="https://www.custorate.nl/" target="_blank">Meldt u aan voor een API key</a>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('Cache_Days'); ?>"><?php _e('Aantal dagen in cache', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('Cache_Days'); ?>" name="<?php echo $this->get_field_name('Cache_Days'); ?>" type="text" value="<?php echo $Cache_Days; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('Aantal beoordelingen'); ?>"><?php _e('Aantal beoordelingen', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('aantal_beoordelingen'); ?>" name="<?php echo $this->get_field_name('aantal_beoordelingen'); ?>" type="text" value="<?php echo $aantal_beoordelingen; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('bgcolor'); ?>"><?php _e('Achtergrond kleur', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('bgcolor'); ?>" name="<?php echo $this->get_field_name('bgcolor'); ?>" type="text" value="<?php echo $bgcolor; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('textcolor'); ?>"><?php _e('Tekst kleur', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('textcolor'); ?>" name="<?php echo $this->get_field_name('textcolor'); ?>" type="text" value="<?php echo $textcolor; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Widget Style', $this->widgetPlugin); ?></label>
		<select name="<?php echo $this->get_field_name('style'); ?>" class="widefat" id="<?php echo $this->get_field_id('style'); ?>">
		<?php for($i=1; $i <= 14; $i++){
		echo "<option value='".$i."' ".($style*1==$i*1?'selected':'').">".$i."</option>";
		} ?>
		</select>
		<a href="https://www.custorate.nl/widgets/" target="_blank">Bekijk alle widget stijlen</a>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Breedte (in pixels)', $this->widgetPlugin); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
		</p>
		
		


	<?php 
		
	
	
	}

	// widget update
	function update($new_instance, $old_instance) {
		/* ... */
		      
      // Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['api_key'] = strip_tags($new_instance['api_key']);
		$instance['Cache_Days'] = strip_tags($new_instance['Cache_Days']);
		$instance['aantal_beoordelingen'] = strip_tags($new_instance['aantal_beoordelingen']);
		$instance['bgcolor'] = strip_tags($new_instance['bgcolor']);
		$instance['style'] = strip_tags($new_instance['style']);
		$instance['textcolor'] = strip_tags($new_instance['textcolor']);
		$instance['width'] = strip_tags($new_instance['width']);
		

		if(function_exists("wp_upload_dir")){
			$dir = wp_upload_dir();
			$dir = $dir['basedir'];
		} else {
			// older versions that don't have wp_upload_dir 
			$dir = dirname(__FILE__)."/../../uploads";
		}
		if(file_exists($dir)){
			$widgetFilePath = $dir.'/widget.html';
			if(file_exists($widgetFilePath)){
				unlink($widgetFilePath);
			}
		}
			
		return $instance;
	 
	}

	// widget display
	function widget($args, $instance) {
		extract( $args );
   // these are the widget options
   /*
		   $title = apply_filters('widget_title', $instance['title']);
		   $text = $instance['text'];
		   $textarea = $instance['textarea'];
		   echo $before_widget;
		   // Display the widget
		   echo '<div class="widget-text wp_widget_plugin_box">';

		   // Check if title is set
		   if ( $title ) {
			  echo $before_title . $title . $after_title;
		   }

		   // Check if text is set
		   if( $text ) {
			  echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
		   }
		   // Check if textarea is set
		   if( $textarea ) {
			 echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
		   }
		   echo '</div>';
		   echo $after_widget;
		   */
		   
				   
		$url = 'https://www.custorate.nl/widget/'.$instance['style'].'/'.$instance['api_key'].'?options='.$instance['bgcolor'].';'.$instance['textcolor'].';'.$instance['aantal_beoordelingen'].';'.$instance['width'].'';

	
		if($instance['api_key']){
			$cache_days = $instance['Cache_Days']; 
			$bgcolor= $instance['bgcolor']; 


			$t = 0;
			$w = '';
			
			if(function_exists("wp_upload_dir")){
				$dir = wp_upload_dir();
				$dir = $dir['basedir'];
			} else {
				// older versions that don't have wp_upload_dir 
				$dir = dirname(__FILE__)."/../../uploads";
			}
		
			$widgetFilePath = $dir.'/widget.html';

			if(file_exists($widgetFilePath)){ 
				$t = filemtime($widgetFilePath); 
				$w = file_get_contents($widgetFilePath);
			}
			if($cache_days < 1) { $cache_days = 1; }
			if($t < time() - (3600 * 24 * $cache_days) || $w == ''){
				
				$response = wp_remote_get( $url );
				$w2 = wp_remote_retrieve_body( $response );

				if($w2){
					$fp = fopen($widgetFilePath,'w+');
					fputs($fp, $w2);
					fclose($fp);
					$w = $w2;
				}
			}
			echo $w;
		}


		   
   
	}
}

// register widget
function widgetInitCustorate(){
	return register_widget("WP_Custorate_Widget");
}
add_action('widgets_init', 'widgetInitCustorate');

?>