<?php

include_once dirname(__FILE__) . '/aimatch_apcCore.php';

// Register widget
function aimatch_apcLoadWidgets() {
	register_widget( 'aimatch_apcCustomWidget' );
}

/**
 * aiMatch Platform Connectin Custom Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */

class aimatch_apcCustomWidget extends WP_Widget {

	// Widget setup
	function aimatch_apcCustomWidget() {

		// Widget settings. 
		$widget_ops = array( 'classname' => 'aimatch_ad_call', 'description' => __('An aiMatch custom ad call widget that displays an ad.') );

		// Widget control settings.
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'aimatch-apc-custom-widget' );

		// Create the widget. 
		$this->WP_Widget( 'aimatch-apc-custom-widget', __('aiMatch Custom Ad Call', 'AdCall'), $widget_ops, $control_ops );
	}

	// How to display widget on screen
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings. 
		$title = apply_filters('widget_title', $instance['title'] );
		$adServer = $instance['adServer'];
		$shortName = $instance['shortName'];
		$adCallType = $instance['adCallType'];
		$adSize = $instance['adSize'];
		$targeting = $instance['targeting'];

		// Before widget (defined by themes).
		echo $before_widget;

		// Display the widget title if one was input (before and after defined by themes).
		if ( $title )
			echo $before_title . $title . $after_title;

			// aiMatch function call
			aimatch_apc($adServer, $shortName, $adCallType, $targeting, $adSize);

		// After widget (defined by themes).
		echo $after_widget;
	}

	// Update widget settings
	function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;

		// Strip tags for title and name to remove HTML (important for text inputs).
		$instance['title'] = trim( trim( strip_tags( $new_instance['title'] ), "/") );
		$instance['adServer'] = trim( trim( strip_tags( $new_instance['adServer'] ), "/") );
		$instance['shortName'] = trim( trim( strip_tags( $new_instance['shortName'] ), "/") );
		$instance['adCallType'] = $new_instance['adCallType'];
		$instance['adSize'] = $new_instance['adSize'];
		$instance['targeting'] = trim( trim( strip_tags( $new_instance['targeting'] ), "/") );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */

	function form( $instance ) {

		// Set up some default widget settings.
		$defaults = array( 'title' => __('', ''), 'adCallType' => 'jserver', 'adSize' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title: (leave blank to hide on page)'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" />
		</p>

		<!-- adServer: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'adServer' ); ?>"><?php _e('adServer:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'adServer' ); ?>" name="<?php echo $this->get_field_name( 'adServer' ); ?>" value="<?php echo $instance['adServer']; ?>" style="width:95%;" />
		</p>

		<!-- shortName: Text Input -->
                <p>
                        <label for="<?php echo $this->get_field_id( 'shortName' ); ?>"><?php _e('shortName:'); ?></label>
                        <input id="<?php echo $this->get_field_id( 'shortName' ); ?>" name="<?php echo $this->get_field_name( 'shortName' ); ?>" value="<?php echo $instance['shortName']; ?>" style="width:95%;" />
                </p>

		<!-- Adcall type: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'adCallType' ); ?>"><?php _e('aiMatch Ad Call Type:'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'adCallType' ); ?>" name="<?php echo $this->get_field_name( 'adCallType' ); ?>" class="widefat" style="width:99%;">
				<option <?php if ( 'jserver' == $instance['adCallType'] ) echo 'selected="selected"'; ?>>jserver</option>
				<option <?php if ( 'hserver' == $instance['adCallType'] ) echo 'selected="selected"'; ?>>hserver</option>
			</select>
		</p>
                
		<!-- Adcall Size: Select Box -->
                <p>
                        <label for="<?php echo $this->get_field_id( 'adSize' ); ?>"><?php _e('aiMatch Ad Call Size:'); ?></label>
                        <select id="<?php echo $this->get_field_id( 'adSize' ); ?>" name="<?php echo $this->get_field_name( 'adSize' ); ?>" class="widefat" style="width:99%;">
                                <option <?php if ( '' == $instance['adSize'] ) echo 'selected="selected"'; ?>>none specified</option>
                                <option <?php if ( '300x250' == $instance['adSize'] ) echo 'selected="selected"'; ?>>300x250</option>
                                <option <?php if ( '728x90' == $instance['adSize'] ) echo 'selected="selected"'; ?>>728x90</option>
                                <option <?php if ( '160x600' == $instance['adSize'] ) echo 'selected="selected"'; ?>>160x600</option>
                        </select>
                </p>
	
		<!-- targeting: Text Input -->
                <p>
                        <label for="<?php echo $this->get_field_id( 'targeting' ); ?>"><?php _e('targeting:'); ?></label>
                        <input id="<?php echo $this->get_field_id( 'targeting' ); ?>" name="<?php echo $this->get_field_name( 'targeting' ); ?>" value="<?php echo $instance['targeting']; ?>" style="width:95%;" />
                </p>

	<?php
	}
}

?>
