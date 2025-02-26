<?php
/*
Plugin Name: BannerAdExchange Widget
Plugin URI: http://www.dasolutions.org/
Description: Display banner code from BannerAdExchange.
Author: BannerAdExchange
Version: 1.0.1
Author URI: http://banneradexchange.net/
*/
class BannerAdExchange extends WP_Widget
{
	function BannerAdExchange() {
        parent::WP_Widget(false, $name = 'BannerAdExchange');
    }
	
	function widget($args, $instance) {
		extract($args);

		echo $before_widget;

		echo '<!-- BannerAdExchange.net Start -->
		<script type="text/javascript" src="http://www.banneradexchange.net/adserver.js"></script>
		<script type="text/javascript">
		var publisher="'.$instance['text_field'].'";
		var adtype="1";
		var adsize="'.$instance['select'].'";
		var colbackground="FFFFFF";
		var colborder="808080";
		var coltext="000000";
		var coltitle="0511FF";
		setupad(publisher,adtype,adsize,colbackground,colborder,coltext,coltitle);
		</script>
		<!-- BannerAdExchange.net End --><div style="clear:both"></div>';

        echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['text_field'] = strip_tags($new_instance['text_field']);
		$instance['select'] = strip_tags($new_instance['select']);
		return $instance;
    }
	
	function form($instance) {	
		$text_field = esc_attr($instance['text_field']);
		$select = esc_attr($instance['select']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('text_field'); ?>"><?php _e('Publisher Id:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text_field'); ?>" name="<?php echo $this->get_field_name('text_field'); ?>" type="text" value="<?php echo $text_field; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('select'); ?>"><?php _e('Banner size'); ?></label>
			<select name="<?php echo $this->get_field_name('select'); ?>" id="<?php echo $this->get_field_id('select'); ?>" class="widefat">
				<?php
					$options = array(1=>'468 x 60 Banner', 2=>'728 x 90 Banner', 3=>'300 x 250 Banner', 4=>'120 x 600 Banner');
					foreach ($options as $key=>$option) {
						echo '<option value="' . $key . '" id="' . $option . '"', $select == $key ? ' selected="selected"' : '', '>', $option, '</option>';
					}
				?>
			</select>
		</p>
		<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("BannerAdExchange");'));