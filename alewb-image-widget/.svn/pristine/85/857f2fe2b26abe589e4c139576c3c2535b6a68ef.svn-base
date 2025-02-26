<?php
/*
Plugin Name: Alewb Image
Description: Aggiungi un'immagine nella sidebar
Author: Alessia Missiaglia
Version: 1.0
Author URI: http://aleweb.eu
*/


/*
 * Determine the location
 */
 
$AlewbImage_plugin_path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';

// Add css Style

function AlewbImage_css() {
	global $AlewbImage_plugin_path;
	wp_enqueue_style('AlewbImage-css',$AlewbImage_plugin_path.'/css/AlewbImage.css');
}


add_action('wp_print_styles', 'AlewbImage_css');
 
 
class AlewbImage extends WP_Widget {

  public function AlewbImage() {

    //Creazione del Widget, titolo e descrizione

    $widget_ops = array('classname' => 'AlewbImage', 'description' => 'Add Image on the Sidebar' );
    $this->WP_Widget('AlewbImage', 'ALEWB Image', $widget_ops);
  }
  
  public function widget($args, $instance) {

  // Visualizzazione del Widget

    extract($args, EXTR_SKIP);

	// Struttura del Widget Frontend	

  	echo $before_widget; ?>
    
    <h4> <?php echo $instance['title']; ?></h4>
  	<div class="view1 view-tenth1">
        <img src="<?php echo $instance['image']; ?>" alt="<?php echo $instance['alt']; ?>" />
  		<div class="mask1">
           <p> <?php echo $instance['graph']; ?></p>
           <a target="_blank" href="<?php echo $instance['link']; ?>" />Read More...</a>
        </div> <!-- End mask1 -->
  	</div> <!-- End view tenth1 -->
     <div>&nbsp;</div>
     <?php echo $after_widget; 

  }

  
  public function update($new_instance, $old_instance) {

  // Salva modifiche
  
	$instance = $old_instance;
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['alt'] = strip_tags($new_instance['alt']);
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['title'] = $new_instance['title'];
		$instance['graph'] = $new_instance['graph'];
		return $instance;
  }
 
  public function form($instance) {

  // Backend
  
	$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'graph' => '', 'image' => '', 'alt' => '', 'link' => '') );

	$title = $instance['title'];
	$graph = $instance['graph'];


?>

   <p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</label>
		</p>

<p>
			<label for="<?php echo $this->get_field_id('graph'); ?>">
				<?php _e( 'Text' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id("graph"); ?>" name="<?php echo $this->get_field_name("graph"); ?>" type="text" value="<?php echo esc_attr($instance["graph"]); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>">
				<?php _e('Image URL (required):'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $instance['image']; ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('alt'); ?>">
				<?php _e('Alternate Text:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" name="<?php echo $this->get_field_name('alt'); ?>" type="text" value="<?php echo $instance['alt']; ?>" />
				<br />
				<small><?php _e( 'Shown if the image cannot be displayed' ); ?></small>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>">
				<?php _e('Link URL:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $instance['link']; ?>" />
			</label>
		</p>
        
<?php
  }
  
  }

add_action( 'widgets_init', create_function('', 'return register_widget("AlewbImage");') );?>