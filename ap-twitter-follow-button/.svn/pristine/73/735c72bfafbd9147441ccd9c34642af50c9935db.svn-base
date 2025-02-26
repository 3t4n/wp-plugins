<?php
/*
Plugin Name: AP Twitter Follow Button
Plugin URI: http://armelpingault.com/wordpress-plugin-ap-twitter-follow-button/
Description: AP Twitter Follow Button add a widget which allows you to add a highly cutomizable Twitter Follow Button.
Author: Armel Pingault
Version: 0.9.3
Author URI: http://armelpingault.com/
*/

/**
 * AP Twitter Follow Button widget class
 */
class AP_Twitter_Follow_Button extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	public function AP_Twitter_Follow_Button() {
		$widget_ops = array(
			'classname'   => 'ap_twitter_follow_button',
			'description' => __( "AP Twitter Follow Button add a widget which allows you to add a highly cutomizable Twitter Follow Button.")
		);
		parent::__construct( 'ap-twitter-follow-button', __('AP Twitter Follow Button'), $widget_ops );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$title         = apply_filters('widget_title', $instance['title']);
		$screen_name      = $instance['screen_name'];
		$lang      = $instance['lang'];
		$show_count    = (boolean) $instance['show_count'];
		$show_screen_name = (boolean) $instance['show_screen_name'];
		$size  = isset($instance['size']) ? $instance['size'] : 'medium';
		$dtn           = (boolean) $instance['dtn'];
		$no_javascript = isset($instance['no_javascript']) ? (boolean) $instance['no_javascript'] : false;
		$use_iframe    = isset($instance['use_iframe']) ? (boolean) $instance['use_iframe'] : false;
		$text_align    = isset($instance['text_align']) ? $instance['text_align'] : false;
		$width_limit   = (boolean) $instance['width_limit'];
		$width_value   = isset($instance['width_value']) ? (int) $instance['width_value'] : false;
		$width_unit    = $instance['width_unit'];
		
		echo $before_widget;
		
		if ( $title ) echo $before_title . $title . $after_title;
		
		if ( $text_align ) echo '<div style="text-align:' . $text_align . '">';
		?>
                
		<?php if ( $use_iframe ) : ?>

			<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=<?php echo $screen_name; ?>&show_count=<?php echo ( $show_count ) ? 'true' : 'false'; ?>&lang=<?php echo $lang; ?>&show_screen_name=<?php echo ( $show_screen_name ) ? 'true' : 'false'; ?>&dtn=<?php echo ( $dtn ) ? 'true' : 'false'; ?>" style="height:20px;<?php if ( $width_limit ) echo 'width:' . $width_value . $width_unit; ?>"></iframe>
			
		<?php else : ?>
			
			<a href="https://twitter.com/<?php echo $screen_name; ?>" class="twitter-follow-button"<?php if ( $width_limit ) echo ' data-width="' . $width_value . $width_unit . '"'; ?> data-show-count="<?php echo ( $show_count ) ? 'true' : 'false'; ?>" data-show-screen-name="<?php echo ( $show_screen_name ) ? 'true' : 'false'; ?>" data-dnt="<?php echo ( $dtn ) ? 'true' : 'false'; ?>" data-size="<?php echo $size; ?>" data-lang="<?php echo $lang; ?>">Follow @<?php echo $screen_name; ?></a>
			<?php if ( ! $no_javascript ) : ?>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<?php endif; ?>
				
		<?php endif; ?>
                
		<?php
		if ( $text_align ) echo '</div>';
                
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']            = strip_tags($new_instance['title']);
		$instance['screen_name']      = strip_tags($new_instance['screen_name']);
		$instance['lang']             = strip_tags($new_instance['lang']);
		$instance['show_count']       = (boolean) $new_instance['show_count'];
		$instance['show_screen_name'] = (boolean) $new_instance['show_screen_name'];
		$instance['size']             = strip_tags($new_instance['size']);
		$instance['dtn']              = (boolean) $new_instance['dtn'];
		$instance['no_javascript']    = (boolean) $new_instance['no_javascript'];
		$instance['use_iframe']       = (boolean) $new_instance['use_iframe'];
		$instance['text_align']       = strip_tags($new_instance['text_align']);
		$instance['width_limit']      = (boolean) $new_instance['width_limit'];
		$instance['width_value']      = strip_tags($new_instance['width_value']);
		$instance['width_unit']       = strip_tags($new_instance['width_unit']);

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {
		$title         = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$screen_name      = isset($instance['screen_name']) ? esc_attr($instance['screen_name']) : '';
		$lang      = isset($instance['lang']) ? esc_attr($instance['lang']) : 'en';
		$show_count    = isset($instance['show_count']) ? (boolean) $instance['show_count'] : false;
		$show_screen_name = isset($instance['show_screen_name']) ? (boolean) $instance['show_screen_name'] : false;
		$size  = isset($instance['size']) ? esc_attr($instance['size']) : 'medium';
		$dtn           = isset($instance['dtn']) ? (boolean) $instance['dtn'] : false;
		$no_javascript = isset($instance['no_javascript']) ? (boolean) $instance['no_javascript'] : false;
		$use_iframe    = isset($instance['use_iframe']) ? (boolean) $instance['use_iframe'] : false;
		$text_align    = isset($instance['text_align']) ? esc_attr($instance['text_align']) : '';
		$width_limit   = isset($instance['width_limit']) ? (boolean) $instance['width_limit'] : false;
		$width_value   = isset($instance['width_value']) ? esc_attr($instance['width_value']) : '';
		$width_unit    = isset($instance['width_unit']) ? esc_attr($instance['width_unit']) : 'px';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('screen_name'); ?>"><?php _e('Twitter screen name:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('screen_name'); ?>" name="<?php echo $this->get_field_name('screen_name'); ?>" type="text" value="<?php echo $screen_name; ?>" />
		</p>
		<?php
		$arr_lang = array(
			'th'	=> 'Thai - ภาษาไทย',
			'he'	=> 'Hebrew - עִבְרִית',
			'hu'	=> 'Hungarian - Magyar',
			'fil'	=> 'Filipino - Filipino',
			'nl'	=> 'Dutch - Nederlands',
			'fr'	=> 'French - français',
			'es'	=> 'Spanish - Español',
			'fi'	=> 'Finnish - Suomi',
			'de'	=> 'German - Deutsch',
			'zh-tw'	=> 'Traditional Chinese - 繁體中文',
			'pt'	=> 'Portuguese - Português',
			'pl'	=> 'Polish - Polski',
			'no'	=> 'Norwegian - Norsk',
			'zh-cn'	=> 'Simplified Chinese - 简体中文',
			'msa'	=> 'Malay - Bahasa Melayu',
			'fa'	=> 'Farsi - فارسی',
			'sv'	=> 'Swedish - Svenska',
			'da'	=> 'Danish - Dansk',
			'ur'	=> 'Urdu - اردو',
			'hi'	=> 'Hindi - हिन्दी',
			'ru'	=> 'Russian - Русский',
			'id'	=> 'Indonesian - Bahasa Indonesia',
			'it'	=> 'Italian - Italiano',
			'tr'	=> 'Turkish - Türkçe',
			'en'	=> 'English',
			'ko'	=> 'Korean - 한국어',
			'ja'	=> 'Japanese - 日本語',
			'ar'	=> 'Arabic - العربية'
		);
		?>		
		<p>
			<label for="<?php echo $this->get_field_id('lang'); ?>"><?php _e('Language:'); ?></label>
			<select id="<?php echo $this->get_field_id('lang'); ?>" name="<?php echo $this->get_field_name('lang'); ?>" class="widefat">
				<?php foreach ($arr_lang as $lang_id => $lang_name ) : ?>
					<option value="<?php echo $lang_id; ?>"<?php if ( $lang_id === $lang ) echo ' selected="selected"'; ?>><?php echo $lang_name; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text_align'); ?>"><?php _e('Alignment:'); ?></label>
			<?php
			$arr_align = array(
				''       => 'None',
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right'
			);
			?>		
			<select id="<?php echo $this->get_field_id('text_align'); ?>" name="<?php echo $this->get_field_name('text_align'); ?>" class="widefat">
				<?php foreach ($arr_align as $align_id => $align_value ) : ?>
					<option value="<?php echo $align_id; ?>"<?php if ( $align_id == $text_align ) echo ' selected="selected"'; ?>><?php echo $align_value; ?></option>
				<?php endforeach; ?>
			</select>
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Size: <small>(Not supported with iframe)</small>'); ?></label>
			<?php
			$values = array(
				'medium' => 'Medium',
				'large'  => 'Large'
			);
			?>		
			<select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" class="widefat">
				<?php foreach ($values as $id => $value ) : ?>
					<option value="<?php echo $id; ?>"<?php if ( $id == $size ) echo ' selected="selected"'; ?>><?php echo $value; ?></option>
				<?php endforeach; ?>
			</select>
		</p>		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>"<?php if ( $show_count ) echo ' checked="checked"'; ?> />
			<label for="<?php echo $this->get_field_id('show_count'); ?>"><?php _e('Show count'); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_screen_name'); ?>" name="<?php echo $this->get_field_name('show_screen_name'); ?>"<?php if ( $show_screen_name ) echo ' checked="checked"'; ?> />
			<label for="<?php echo $this->get_field_id('show_screen_name'); ?>"><?php _e('Show screen name'); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dtn'); ?>" name="<?php echo $this->get_field_name('dtn'); ?>"<?php if ( $dtn ) echo ' checked="checked"'; ?> />
			<label for="<?php echo $this->get_field_id('dtn'); ?>"><?php _e('Opt-out of tailoring Twitter'); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('no_javascript'); ?>" name="<?php echo $this->get_field_name('no_javascript'); ?>"<?php if ( $no_javascript ) echo ' checked="checked"'; ?> />
			<label for="<?php echo $this->get_field_id('no_javascript'); ?>"><?php _e('Do NOT load widgets.js file'); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('use_iframe'); ?>" name="<?php echo $this->get_field_name('use_iframe'); ?>"<?php if ( $use_iframe ) echo ' checked="checked"'; ?> />
			<label for="<?php echo $this->get_field_id('use_iframe'); ?>"><?php _e('Use Iframe instead of Javascript'); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('width_limit'); ?>" name="<?php echo $this->get_field_name('width_limit'); ?>"<?php if ( $width_limit ) echo ' checked="checked"'; ?> />
			<label for="<?php echo $this->get_field_id('width_limit'); ?>"><?php _e('Width limit'); ?></label>
			<input id="<?php echo $this->get_field_id('width_value'); ?>" name="<?php echo $this->get_field_name('width_value'); ?>" type="text" value="<?php echo $width_value; ?>" size="4" />
			<?php
			$arr_units = array(
				'px' => 'px',
				'pc' => '%',
				'em' => 'em'
			);
			?>		
			<select id="<?php echo $this->get_field_id('width_unit'); ?>" name="<?php echo $this->get_field_name('width_unit'); ?>">
				<?php foreach ($arr_units as $unit_id => $unit_value ) : ?>
					<option value="<?php echo $unit_id; ?>"<?php if ( $unit_id === $width_unit ) echo ' selected="selected"'; ?>><?php echo $unit_value; ?></option>
				<?php endforeach; ?>
			</select>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					var $width_limit = $('#<?php echo $this->get_field_id('width_limit'); ?>'),
					    $width_value = $('#<?php echo $this->get_field_id('width_value'); ?>'),
					    $width_unit = $('#<?php echo $this->get_field_id('width_unit'); ?>');
					
					var toggleWidth = function() {
						if ($width_limit.is(':checked')) {
							$width_value.removeAttr('disabled');
							$width_unit.removeAttr('disabled');
						} else {
							$width_value.attr('disabled', 'disabled');
							$width_unit.attr('disabled', 'disabled');
						}
					}
					
					$width_limit.on('click', toggleWidth);
					toggleWidth();
				});
			</script>
		</p>
		<?php
	}
} // class AP_Twitter_Follow_Button

add_action( 'widgets_init', create_function('', 'return register_widget("AP_Twitter_Follow_Button");') );