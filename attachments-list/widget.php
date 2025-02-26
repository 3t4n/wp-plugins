<?php
//---------------------------------------------------------------------
// DEFINE THE WIDGET
//---------------------------------------------------------------------
if( !class_exists("Widget_attachments_list")){
class Widget_attachments_list extends WP_Widget {

	function Widget_attachments_list() {
		
		$widget_ops = array(
			'classname' => 'widget_attachments_list', 
			'description' => __( "A list of the attachments added to a post or page by the &quot;Attachments&quot; plugin") 
			);
			
		parent::WP_Widget('attachments_list', __('Attchments List'), $widget_ops);
		$this->alt_option_name = 'widget_attachments_list';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('Widget_attachments_list', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);
			
			
		if (!function_exists('attachments_get_attachments')) {
			echo '<p>The &quot;Attachments&quot; plugin was not found or has been disabled.</p>';
		} else {
			$attachments = attachments_get_attachments();
			$total_attachments = count($attachments);
			if ($total_attachments > 0) {	
			
				echo $before_widget;
				echo $before_title.$instance['title'].$after_title; 
				show_attachments_list($instance['size']);
				echo $after_widget; 	
			}
		}

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('Widget_attachments_list', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['size'] = $new_instance['size'];
		
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['Widget_attachments_list']) )
			delete_option('Widget_attachments_list');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('Widget_attachments_list', 'widget');
	}

	function form( $instance ) {

		$defaults = array(
			'title' => $instance['title'],
			'size' 	=> $instance['size']
		); 
		?>
		<table>
        
        <tr><th align="right">
        		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label></th>
        	<td><input id="<?php echo $this->get_field_id('title'); ?>" type="text" 
			    name="<?php echo $this->get_field_name('title'); ?>"
			    value="<?php echo $instance['title']; ?>"/></td>
  		</tr>
                
		<tr><th align="right">
	        	<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Icon Size:'); ?></label></th>
        	<td><select id="<?php echo $this->get_field_id('size'); ?>" 
            	name="<?php echo $this->get_field_name('size'); ?>" size="1">
            		<option value="" <?php if (''==$instance['size']) echo 'selected="selected"'; ?>>Default (60px)</option> 
            		<option value="medium" <?php if ('medium'==$instance['size']) echo 'selected="selected"'; ?>>Medium</option> 
            		<option value="small" <?php if ('small'==$instance['size']) echo 'selected="selected"'; ?>>Small</option>  
            		<option value="none" <?php if ('none'==$instance['size']) echo 'selected="selected"'; ?>>None</option> 
            		<option value="casual" <?php if ('casual'==$instance['size']) echo 'selected="selected"'; ?>>Cute</option> 
           		</select></td></tr></table>          
		<?php
	}
}
add_action('widgets_init', create_function("","register_widget('Widget_attachments_list');"));
}
?>