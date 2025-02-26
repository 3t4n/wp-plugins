<?php

/*
Plugin Name: 	Arashtad Tabs
Plugin URI:  	https://arashtad.com
Description: 	Responsive tabs widget for WordPress, created by <a href="https://arashtad.com" target="_blank">Arashtad.com</a>
Version:     	1.2
Author:      	Amin Shahrokhi
Author URI:  	https://arashtad.com
License:     	GPL2
License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
Copyright:		(c) 2011 - 2016 Arashtad Ltd. All Rights Reserved.

Arashtad Tabs is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Arashtad Tabs is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Arashtad Tabs. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Restricting direct access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Localize for translation
load_plugin_textdomain( 'artabs', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// Creating the widget
class artabs_widget extends WP_Widget {
	function __construct() {
		if (get_locale() == 'fa_IR') {
			parent::__construct(
				// Base ID of your widget
				'artabs_widget',
				// Widget name will appear in UI
				__('ارشتاد تبز', $text_domain),
				// Widget description
				array( 'description' => __( 'افزونه واکنشگرای تب برای وردپرس. کاری از Arashtad.com', $text_domain ), )
			);
		}
		else {
			parent::__construct(
				// Base ID of your widget
				'artabs_widget',
				// Widget name will appear in UI
				__('Arashtad Tabs', $text_domain),
				// Widget description
				array( 'description' => __( 'Responsive tabs widget by Arashtad.com', $text_domain ), )
			);
		}
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {

		//$widget_id = $widget_class[ count($widget_class) - 1];
		$widget_id = $args['widget_id'];
		$widget_exploded = explode('-', $widget_id);
		$widget_id_num = array_slice($widget_exploded, -1);
		$widget_num = implode($widget_id_num);

		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = apply_filters( 'widget_text', $instance['style'] );
		$header_text = apply_filters( 'widget_text', $instance['header_text'] );
		$footer_text = apply_filters( 'widget_text', $instance['footer_text'] );
		$fixed_width = apply_filters( 'widget_text', $instance['fixed_width'] );
		$fixed_height = apply_filters( 'widget_text', $instance['fixed_height'] );
		$margin = apply_filters( 'widget_text', $instance['margin'] );
		$padding = apply_filters( 'widget_text', $instance['padding'] );

		$tab_1 = apply_filters( 'widget_text', $instance['tab_1'] );
		$content_1 = apply_filters( 'widget_text', $instance['content_1'] );

		$tab_2 = apply_filters( 'widget_text', $instance['tab_2'] );
		$content_2 = apply_filters( 'widget_text', $instance['content_2'] );

		$tab_3 = apply_filters( 'widget_text', $instance['tab_3'] );
		$content_3 = apply_filters( 'widget_text', $instance['content_3'] );

		$tab_4 = apply_filters( 'widget_text', $instance['tab_4'] );
		$content_4 = apply_filters( 'widget_text', $instance['content_4'] );

		$tab_5 = apply_filters( 'widget_text', $instance['tab_5'] );
		$content_5 = apply_filters( 'widget_text', $instance['content_5'] );

		$tab_6 = apply_filters( 'widget_text', $instance['tab_6'] );
		$content_6 = apply_filters( 'widget_text', $instance['content_6'] );

		$tab_7 = apply_filters( 'widget_text', $instance['tab_7'] );
		$content_7 = apply_filters( 'widget_text', $instance['content_7'] );

		$tab_8 = apply_filters( 'widget_text', $instance['tab_8'] );
		$content_8 = apply_filters( 'widget_text', $instance['content_8'] );

		$tab_9 = apply_filters( 'widget_text', $instance['tab_9'] );
		$content_9 = apply_filters( 'widget_text', $instance['content_9'] );

		$tab_10 = apply_filters( 'widget_text', $instance['tab_10'] );
		$content_10 = apply_filters( 'widget_text', $instance['content_10'] );

		$tab_11 = apply_filters( 'widget_text', $instance['tab_11'] );
		$content_11 = apply_filters( 'widget_text', $instance['content_11'] );

		$tab_12 = apply_filters( 'widget_text', $instance['tab_12'] );
		$content_12 = apply_filters( 'widget_text', $instance['content_12'] );

		$tab_13 = apply_filters( 'widget_text', $instance['tab_13'] );
		$content_13 = apply_filters( 'widget_text', $instance['content_13'] );

		$tab_14 = apply_filters( 'widget_text', $instance['tab_14'] );
		$content_14 = apply_filters( 'widget_text', $instance['content_14'] );

		$tab_15 = apply_filters( 'widget_text', $instance['tab_15'] );
		$content_15 = apply_filters( 'widget_text', $instance['content_15'] );

		$tab_16 = apply_filters( 'widget_text', $instance['tab_16'] );
		$content_16 = apply_filters( 'widget_text', $instance['content_16'] );

		$tab_17 = apply_filters( 'widget_text', $instance['tab_17'] );
		$content_17 = apply_filters( 'widget_text', $instance['content_17'] );

		$tab_18 = apply_filters( 'widget_text', $instance['tab_18'] );
		$content_18 = apply_filters( 'widget_text', $instance['content_18'] );

		$tab_19 = apply_filters( 'widget_text', $instance['tab_19'] );
		$content_19 = apply_filters( 'widget_text', $instance['content_19'] );

		$tab_20 = apply_filters( 'widget_text', $instance['tab_20'] );
		$content_20 = apply_filters( 'widget_text', $instance['content_20'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( 'Arasgtad Tabs', $text_domain );

		?>

		<?php /* Begin output template */ ?>
		<?php
			// Inject internal CSS if there's an option received from the widget instance base of its id
			if($fixed_height || $fixed_width || $margin || $padding)
			{
				echo '<style>';
				echo ' #artabs_' . $widget_num . ' {';
				if($fixed_height)
				{
					echo 'height: ' . $fixed_height . '; ';
				}
				if($fixed_width)
				{
					echo 'width: ' . $fixed_width . '; ';
				}
				if($margin)
				{
					echo 'margin: ' . $margin . '; ';
				}
				if($padding)
				{
					echo 'padding: ' . $padding . '; ';
				}
				echo '}';
				echo ' </style>';
			}
		?>
		<div class="artabs-style-<?php echo $style; ?>">
			<div class="artabs" id="artabs_<?php echo $widget_num; ?>">
				<!-- Display header text -->
				<?php
				if($header_text)
				{
					echo '<div class="header-text">';
					echo $header_text;
					echo '</div>';
					echo '<div class="clear"></div>';
				}
				?>
				<ul class="tab-buttons">
					<?php if($tab_1): ?>
						<li class="tab-button" id="tab_button_1"><?php echo $tab_1; ?></li>
					<?php endif; ?>
					<?php if($tab_2): ?>
						<li class="tab-button" id="tab_button_2"><?php echo $tab_2; ?></li>
					<?php endif; ?>
					<?php if($tab_3): ?>
						<li class="tab-button" id="tab_button_3"><?php echo $tab_3; ?></li>
					<?php endif; ?>
					<?php if($tab_4): ?>
						<li class="tab-button" id="tab_button_4"><?php echo $tab_4; ?></li>
					<?php endif; ?>
					<?php if($tab_5): ?>
						<li class="tab-button" id="tab_button_5"><?php echo $tab_5; ?></li>
					<?php endif; ?>
					<?php if($tab_6): ?>
						<li class="tab-button" id="tab_button_6"><?php echo $tab_6; ?></li>
					<?php endif; ?>
					<?php if($tab_7): ?>
						<li class="tab-button" id="tab_button_7"><?php echo $tab_7; ?></li>
					<?php endif; ?>
					<?php if($tab_8): ?>
						<li class="tab-button" id="tab_button_8"><?php echo $tab_8; ?></li>
					<?php endif; ?>
					<?php if($tab_9): ?>
						<li class="tab-button" id="tab_button_9"><?php echo $tab_9; ?></li>
					<?php endif; ?>
					<?php if($tab_10): ?>
						<li class="tab-button" id="tab_button_10"><?php echo $tab_10; ?></li>
					<?php endif; ?>
					<?php if($tab_11): ?>
						<li class="tab-button" id="tab_button_11"><?php echo $tab_11; ?></li>
					<?php endif; ?>
					<?php if($tab_12): ?>
						<li class="tab-button" id="tab_button_12"><?php echo $tab_12; ?></li>
					<?php endif; ?>
					<?php if($tab_13): ?>
						<li class="tab-button" id="tab_button_13"><?php echo $tab_13; ?></li>
					<?php endif; ?>
					<?php if($tab_14): ?>
						<li class="tab-button" id="tab_button_14"><?php echo $tab_14; ?></li>
					<?php endif; ?>
					<?php if($tab_15): ?>
						<li class="tab-button" id="tab_button_15"><?php echo $tab_15; ?></li>
					<?php endif; ?>
					<?php if($tab_16): ?>
						<li class="tab-button" id="tab_button_16"><?php echo $tab_16; ?></li>
					<?php endif; ?>
					<?php if($tab_17): ?>
						<li class="tab-button" id="tab_button_17"><?php echo $tab_17; ?></li>
					<?php endif; ?>
					<?php if($tab_18): ?>
						<li class="tab-button" id="tab_button_18"><?php echo $tab_18; ?></li>
					<?php endif; ?>
					<?php if($tab_19): ?>
						<li class="tab-button" id="tab_button_19"><?php echo $tab_19; ?></li>
					<?php endif; ?>
					<?php if($tab_20): ?>
						<li class="tab-button" id="tab_button_20"><?php echo $tab_20; ?></li>
					<?php endif; ?>
				</ul>
				<div class="clear"></div>
				<section class="tab-contents">
					<?php if($content_1): ?>
						<article class="tab-content" id="tab_content_1">
							<?php echo $content_1; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_2): ?>
						<article class="tab-content" id="tab_content_2">
							<?php echo $content_2; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_3): ?>
						<article class="tab-content" id="tab_content_3">
							<?php echo $content_3; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_4): ?>
						<article class="tab-content" id="tab_content_4">
							<?php echo $content_4; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_5): ?>
						<article class="tab-content" id="tab_content_5">
							<?php echo $content_5; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_6): ?>
						<article class="tab-content" id="tab_content_6">
							<?php echo $content_6; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_7): ?>
						<article class="tab-content" id="tab_content_7">
							<?php echo $content_7; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_8): ?>
						<article class="tab-content" id="tab_content_8">
							<?php echo $content_8; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_9): ?>
						<article class="tab-content" id="tab_content_9">
							<?php echo $content_9; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_10): ?>
						<article class="tab-content" id="tab_content_10">
							<?php echo $content_10; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_11): ?>
						<article class="tab-content" id="tab_content_11">
							<?php echo $content_11; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_12): ?>
						<article class="tab-content" id="tab_content_12">
							<?php echo $content_12; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_13): ?>
						<article class="tab-content" id="tab_content_13">
							<?php echo $content_13; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_14): ?>
						<article class="tab-content" id="tab_content_14">
							<?php echo $content_14; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_15): ?>
						<article class="tab-content" id="tab_content_15">
							<?php echo $content_15; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_16): ?>
						<article class="tab-content" id="tab_content_16">
							<?php echo $content_16; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_17): ?>
						<article class="tab-content" id="tab_content_17">
							<?php echo $content_17; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_18): ?>
						<article class="tab-content" id="tab_content_18">
							<?php echo $content_18; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_19): ?>
						<article class="tab-content" id="tab_content_19">
							<?php echo $content_19; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
					<?php if($content_20): ?>
						<article class="tab-content" id="tab_content_20">
							<?php echo $content_20; ?>
							<div class="clear"></div>
						</article>
					<?php endif; ?>
				</section>
				<div class="clear"></div>
				<!-- Display footer text -->
				<?php
				if($footer_text)
				{
					echo '<div class="footer-text">';
					echo $footer_text;
					echo '</div>';
					echo '<div class="clear"></div>';
				}
				?>
			</div>
		</div>
		<?php /* End output template */ ?>
		<?php

		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
		{
			$title = $instance[ 'title' ];
		}
		else
		{
			$title = __( 'New title', $text_domain );
		}

		$style = $instance['style'];
		$header_text = $instance['header_text'];
		$footer_text = $instance['footer_text'];
		$fixed_width = $instance['fixed_width'];
		$fixed_height = $instance['fixed_height'];
		$margin = $instance['margin'];
		$padding = $instance['padding'];
		$text_domain = 'artabs';

		$tab_1 = $instance['tab_1'];
		$content_1 = $instance['content_1'];

		$tab_2 = $instance['tab_2'];
		$content_2 = $instance['content_2'];

		$tab_3 = $instance['tab_3'];
		$content_3 = $instance['content_3'];

		$tab_4 = $instance['tab_4'];
		$content_4 = $instance['content_4'];

		$tab_5 = $instance['tab_5'];
		$content_5 = $instance['content_5'];

		$tab_6 = $instance['tab_6'];
		$content_6 = $instance['content_6'];

		$tab_7 = $instance['tab_7'];
		$content_7 = $instance['content_7'];

		$tab_8 = $instance['tab_8'];
		$content_8 = $instance['content_8'];

		$tab_9 = $instance['tab_9'];
		$content_9 = $instance['content_9'];

		$tab_10 = $instance['tab_10'];
		$content_10 = $instance['content_10'];

		$tab_11 = $instance['tab_11'];
		$content_11 = $instance['content_11'];

		$tab_12 = $instance['tab_12'];
		$content_12 = $instance['content_12'];

		$tab_13 = $instance['tab_13'];
		$content_13 = $instance['content_13'];

		$tab_14 = $instance['tab_14'];
		$content_14 = $instance['content_14'];

		$tab_15 = $instance['tab_15'];
		$content_15 = $instance['content_15'];

		$tab_16 = $instance['tab_16'];
		$content_16 = $instance['content_16'];

		$tab_17 = $instance['tab_17'];
		$content_17 = $instance['content_17'];

		$tab_18 = $instance['tab_18'];
		$content_18 = $instance['content_18'];

		$tab_19 = $instance['tab_19'];
		$content_19 = $instance['content_19'];

		$tab_20 = $instance['tab_20'];
		$content_20 = $instance['content_20'];

		// Widget admin form
		?>

<h3><?php _e( 'Appearance Settings:', $text_domain ); ?></h3>

<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'header_text' ); ?>"><?php _e( 'Header Text:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'header_text' ) ?>" name="<?php echo $this->get_field_name( 'header_text' ) ?>" ><?php echo $header_text; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'footer_text' ); ?>"><?php _e( 'Footer Text:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'footer_text' ) ?>" name="<?php echo $this->get_field_name( 'footer_text' ) ?>" ><?php echo $footer_text; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'style' ); ?>" style="width: 80px; display: inline-block;"><?php _e( 'Style:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="1" <?php if($style == '1') echo 'selected'; ?>>Default</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="2" <?php if($style == '2') echo 'selected'; ?>>Rounded</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="3" <?php if($style == '3') echo 'selected'; ?>>Easy</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="4" <?php if($style == '4') echo 'selected'; ?>>Nude</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="5" <?php if($style == '5') echo 'selected'; ?>>Colored</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="6" <?php if($style == '6') echo 'selected'; ?>>Dark Inverse</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="7" <?php if($style == '7') echo 'selected'; ?>>Dark</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="8" <?php if($style == '8') echo 'selected'; ?>>Dip</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="9" <?php if($style == '9') echo 'selected'; ?>>BootStrap</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="10" <?php if($style == '10') echo 'selected'; ?>>BootStrap Disjunct</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="11" <?php if($style == '11') echo 'selected'; ?>>Square</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="12" <?php if($style == '12') echo 'selected'; ?>>Square Disjunct</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="13" <?php if($style == '13') echo 'selected'; ?>>Square BootStrap</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="14" <?php if($style == '14') echo 'selected'; ?>>Square BootStrap Disjunct</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="15" <?php if($style == '15') echo 'selected'; ?>>Custom</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'fixed_width' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Fixed Width (e.g. 100px):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'fixed_width' ); ?>" name="<?php echo $this->get_field_name( 'fixed_width' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $fixed_width ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'fixed_height' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Fixed Height (e.g. 100px):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'fixed_height' ); ?>" name="<?php echo $this->get_field_name( 'fixed_height' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $fixed_height ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'margin' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Margin(e.g. 10px auto):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this->get_field_name( 'margin' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $margin ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'padding' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Padding (e.g. 10px 0 0 10px):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'padding' ); ?>" name="<?php echo $this->get_field_name( 'padding' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $padding ); ?>" />

</p>

<hr style="margin-top: 20px;">

<h3><?php _e( 'Tabs Settings', $text_domain ); ?></h3>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_1' ); ?>"><?php _e( 'Button Label 1', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_1' ) ?>" name="<?php echo $this->get_field_name( 'tab_1' ) ?>" type="text" value="<?php echo esc_attr( $tab_1 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_1' ); ?>"><?php _e( 'Tab Content 1:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_1' ) ?>" name="<?php echo $this->get_field_name( 'content_1' ) ?>" ><?php echo $content_1; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_2' ); ?>"><?php _e( 'Button Label 2:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_2' ) ?>" name="<?php echo $this->get_field_name( 'tab_2' ) ?>" type="text" value="<?php echo esc_attr( $tab_2 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_2' ); ?>"><?php _e( 'Tab Content 2:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_2' ) ?>" name="<?php echo $this->get_field_name( 'content_2' ) ?>" ><?php echo $content_2; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_3' ); ?>"><?php _e( 'Button Label 3:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_3' ) ?>" name="<?php echo $this->get_field_name( 'tab_3' ) ?>" type="text" value="<?php echo esc_attr( $tab_3 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_3' ); ?>"><?php _e( 'Tab Content 3:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_3' ) ?>" name="<?php echo $this->get_field_name( 'content_3' ) ?>" ><?php echo $content_3; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_4' ); ?>"><?php _e( 'Button Label 4:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_4' ) ?>" name="<?php echo $this->get_field_name( 'tab_4' ) ?>" type="text" value="<?php echo esc_attr( $tab_4 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_4' ); ?>"><?php _e( 'Tab Content 4:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_4' ) ?>" name="<?php echo $this->get_field_name( 'content_4' ) ?>" ><?php echo $content_4; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_5' ); ?>"><?php _e( 'Button Label 5:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_5' ) ?>" name="<?php echo $this->get_field_name( 'tab_5' ) ?>" type="text" value="<?php echo esc_attr( $tab_5 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_5' ); ?>"><?php _e( 'Tab Content 5:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_5' ) ?>" name="<?php echo $this->get_field_name( 'content_5' ) ?>" ><?php echo $content_5; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_6' ); ?>"><?php _e( 'Button Label 6:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_6' ) ?>" name="<?php echo $this->get_field_name( 'tab_6' ) ?>" type="text" value="<?php echo esc_attr( $tab_6 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_6' ); ?>"><?php _e( 'Tab Content 6:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_6' ) ?>" name="<?php echo $this->get_field_name( 'content_6' ) ?>" ><?php echo $content_6; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_7' ); ?>"><?php _e( 'Button Label 7:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_7' ) ?>" name="<?php echo $this->get_field_name( 'tab_7' ) ?>" type="text" value="<?php echo esc_attr( $tab_7 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_7' ); ?>"><?php _e( 'Tab Content 7:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_7' ) ?>" name="<?php echo $this->get_field_name( 'content_7' ) ?>" ><?php echo $content_7; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_8' ); ?>"><?php _e( 'Button Label 8:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_8' ) ?>" name="<?php echo $this->get_field_name( 'tab_8' ) ?>" type="text" value="<?php echo esc_attr( $tab_8 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_8' ); ?>"><?php _e( 'Tab Content 8:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_8' ) ?>" name="<?php echo $this->get_field_name( 'content_8' ) ?>" ><?php echo $content_8; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_9' ); ?>"><?php _e( 'Button Label 9:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_9' ) ?>" name="<?php echo $this->get_field_name( 'tab_9' ) ?>" type="text" value="<?php echo esc_attr( $tab_9 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_9' ); ?>"><?php _e( 'Tab Content 9:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_9' ) ?>" name="<?php echo $this->get_field_name( 'content_9' ) ?>" ><?php echo $content_10; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_10' ); ?>"><?php _e( 'Button Label 10:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_10' ) ?>" name="<?php echo $this->get_field_name( 'tab_10' ) ?>" type="text" value="<?php echo esc_attr( $tab_10 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_10' ); ?>"><?php _e( 'Tab Content 10:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_10' ) ?>" name="<?php echo $this->get_field_name( 'content_10' ) ?>" ><?php echo $content_10; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_11' ); ?>"><?php _e( 'Button Label 11:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_11' ) ?>" name="<?php echo $this->get_field_name( 'tab_11' ) ?>" type="text" value="<?php echo esc_attr( $tab_11 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_11' ); ?>"><?php _e( 'Tab Content 11:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_11' ) ?>" name="<?php echo $this->get_field_name( 'content_11' ) ?>" ><?php echo $content_11; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_12' ); ?>"><?php _e( 'Button Label 12:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_12' ) ?>" name="<?php echo $this->get_field_name( 'tab_12' ) ?>" type="text" value="<?php echo esc_attr( $tab_12 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_12' ); ?>"><?php _e( 'Tab Content 12:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_12' ) ?>" name="<?php echo $this->get_field_name( 'content_12' ) ?>" ><?php echo $content_12; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_13' ); ?>"><?php _e( 'Button Label 13:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_13' ) ?>" name="<?php echo $this->get_field_name( 'tab_13' ) ?>" type="text" value="<?php echo esc_attr( $tab_13 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_13' ); ?>"><?php _e( 'Tab Content 13:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_13' ) ?>" name="<?php echo $this->get_field_name( 'content_13' ) ?>" ><?php echo $content_13; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_14' ); ?>"><?php _e( 'Button Label 14:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_14' ) ?>" name="<?php echo $this->get_field_name( 'tab_14' ) ?>" type="text" value="<?php echo esc_attr( $tab_14 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_14' ); ?>"><?php _e( 'Tab Content 14:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_14' ) ?>" name="<?php echo $this->get_field_name( 'content_14' ) ?>" ><?php echo $content_14; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_15' ); ?>"><?php _e( 'Button Label 15:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_15' ) ?>" name="<?php echo $this->get_field_name( 'tab_15' ) ?>" type="text" value="<?php echo esc_attr( $tab_15 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_15' ); ?>"><?php _e( 'Tab Content 15:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_15' ) ?>" name="<?php echo $this->get_field_name( 'content_15' ) ?>" ><?php echo $content_15; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_16' ); ?>"><?php _e( 'Button Label 16:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_16' ) ?>" name="<?php echo $this->get_field_name( 'tab_16' ) ?>" type="text" value="<?php echo esc_attr( $tab_16 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_16' ); ?>"><?php _e( 'Tab Content 16:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_16' ) ?>" name="<?php echo $this->get_field_name( 'content_16' ) ?>" ><?php echo $content_16; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_17' ); ?>"><?php _e( 'Button Label 17:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_17' ) ?>" name="<?php echo $this->get_field_name( 'tab_17' ) ?>" type="text" value="<?php echo esc_attr( $tab_17 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_17' ); ?>"><?php _e( 'Tab Content 17:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_17' ) ?>" name="<?php echo $this->get_field_name( 'content_17' ) ?>" ><?php echo $content_17; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_18' ); ?>"><?php _e( 'Button Label 18:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_18' ) ?>" name="<?php echo $this->get_field_name( 'tab_18' ) ?>" type="text" value="<?php echo esc_attr( $tab_18 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_18' ); ?>"><?php _e( 'Tab Content 18:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_18' ) ?>" name="<?php echo $this->get_field_name( 'content_18' ) ?>" ><?php echo $content_18; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_19' ); ?>"><?php _e( 'Button Label 19:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_19' ) ?>" name="<?php echo $this->get_field_name( 'tab_19' ) ?>" type="text" value="<?php echo esc_attr( $tab_19 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_19' ); ?>"><?php _e( 'Tab Content 19:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_19' ) ?>" name="<?php echo $this->get_field_name( 'content_19' ) ?>" ><?php echo $content_19; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'tab_20' ); ?>"><?php _e( 'Button Label 20:', $text_domain); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'tab_20' ) ?>" name="<?php echo $this->get_field_name( 'tab_20' ) ?>" type="text" value="<?php echo esc_attr( $tab_20 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content_20' ); ?>"><?php _e( 'Tab Content 20:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content_20' ) ?>" name="<?php echo $this->get_field_name( 'content_20' ) ?>" ><?php echo $content_20; ?></textarea>
</p>

	<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
		$instance['header_text'] = ( ! empty( $new_instance['header_text'] ) ) ? $new_instance['header_text'] : '';
		$instance['footer_text'] = ( ! empty( $new_instance['footer_text'] ) ) ? $new_instance['footer_text'] : '';
		$instance['fixed_width'] = ( ! empty( $new_instance['fixed_width'] ) ) ? strip_tags( $new_instance['fixed_width'] ) : '';
		$instance['fixed_height'] = ( ! empty( $new_instance['fixed_height'] ) ) ? strip_tags( $new_instance['fixed_height'] ) : '';
		$instance['margin'] = ( ! empty( $new_instance['margin'] ) ) ? strip_tags( $new_instance['margin'] ) : '';
		$instance['padding'] = ( ! empty( $new_instance['padding'] ) ) ? strip_tags( $new_instance['padding'] ) : '';

		$instance['tab_1'] = ( ! empty( $new_instance['tab_1'] ) ) ? strip_tags( $new_instance['tab_1'] ) : '';
		$instance['content_1'] = ( ! empty( $new_instance['content_1'] ) ) ? $new_instance['content_1'] : '';

		$instance['tab_2'] = ( ! empty( $new_instance['tab_2'] ) ) ? strip_tags( $new_instance['tab_2'] ) : '';
		$instance['content_2'] = ( ! empty( $new_instance['content_2'] ) ) ? $new_instance['content_2'] : '';

		$instance['tab_3'] = ( ! empty( $new_instance['tab_3'] ) ) ? strip_tags( $new_instance['tab_3'] ) : '';
		$instance['content_3'] = ( ! empty( $new_instance['content_3'] ) ) ? $new_instance['content_3'] : '';

		$instance['tab_4'] = ( ! empty( $new_instance['tab_4'] ) ) ? strip_tags( $new_instance['tab_4'] ) : '';
		$instance['content_4'] = ( ! empty( $new_instance['content_4'] ) ) ? $new_instance['content_4'] : '';

		$instance['tab_5'] = ( ! empty( $new_instance['tab_5'] ) ) ? strip_tags( $new_instance['tab_5'] ) : '';
		$instance['content_5'] = ( ! empty( $new_instance['content_5'] ) ) ? $new_instance['content_5'] : '';

		$instance['tab_6'] = ( ! empty( $new_instance['tab_6'] ) ) ? strip_tags( $new_instance['tab_6'] ) : '';
		$instance['content_6'] = ( ! empty( $new_instance['content_6'] ) ) ? $new_instance['content_6'] : '';

		$instance['tab_7'] = ( ! empty( $new_instance['tab_7'] ) ) ? strip_tags( $new_instance['tab_7'] ) : '';
		$instance['content_7'] = ( ! empty( $new_instance['content_7'] ) ) ? $new_instance['content_7'] : '';

		$instance['tab_8'] = ( ! empty( $new_instance['tab_8'] ) ) ? strip_tags( $new_instance['tab_8'] ) : '';
		$instance['content_8'] = ( ! empty( $new_instance['content_8'] ) ) ? $new_instance['content_8'] : '';

		$instance['tab_9'] = ( ! empty( $new_instance['tab_9'] ) ) ? strip_tags( $new_instance['tab_9'] ) : '';
		$instance['content_9'] = ( ! empty( $new_instance['content_9'] ) ) ? $new_instance['content_9'] : '';

		$instance['tab_10'] = ( ! empty( $new_instance['tab_10'] ) ) ? strip_tags( $new_instance['tab_10'] ) : '';
		$instance['content_10'] = ( ! empty( $new_instance['content_10'] ) ) ? $new_instance['content_10'] : '';

		$instance['tab_11'] = ( ! empty( $new_instance['tab_11'] ) ) ? strip_tags( $new_instance['tab_11'] ) : '';
		$instance['content_11'] = ( ! empty( $new_instance['content_11'] ) ) ? $new_instance['content_11'] : '';

		$instance['tab_12'] = ( ! empty( $new_instance['tab_12'] ) ) ? strip_tags( $new_instance['tab_12'] ) : '';
		$instance['content_12'] = ( ! empty( $new_instance['content_12'] ) ) ? $new_instance['content_12'] : '';

		$instance['tab_13'] = ( ! empty( $new_instance['tab_13'] ) ) ? strip_tags( $new_instance['tab_13'] ) : '';
		$instance['content_13'] = ( ! empty( $new_instance['content_13'] ) ) ? $new_instance['content_13'] : '';

		$instance['tab_14'] = ( ! empty( $new_instance['tab_14'] ) ) ? strip_tags( $new_instance['tab_14'] ) : '';
		$instance['content_14'] = ( ! empty( $new_instance['content_14'] ) ) ? $new_instance['content_14'] : '';

		$instance['tab_15'] = ( ! empty( $new_instance['tab_15'] ) ) ? strip_tags( $new_instance['tab_15'] ) : '';
		$instance['content_15'] = ( ! empty( $new_instance['content_15'] ) ) ? $new_instance['content_15'] : '';

		$instance['tab_16'] = ( ! empty( $new_instance['tab_16'] ) ) ? strip_tags( $new_instance['tab_16'] ) : '';
		$instance['content_16'] = ( ! empty( $new_instance['content_16'] ) ) ? $new_instance['content_16'] : '';

		$instance['tab_17'] = ( ! empty( $new_instance['tab_17'] ) ) ? strip_tags( $new_instance['tab_17'] ) : '';
		$instance['content_17'] = ( ! empty( $new_instance['content_17'] ) ) ? $new_instance['content_17'] : '';

		$instance['tab_18'] = ( ! empty( $new_instance['tab_18'] ) ) ? strip_tags( $new_instance['tab_18'] ) : '';
		$instance['content_18'] = ( ! empty( $new_instance['content_18'] ) ) ? $new_instance['content_18'] : '';

		$instance['tab_19'] = ( ! empty( $new_instance['tab_19'] ) ) ? strip_tags( $new_instance['tab_19'] ) : '';
		$instance['content_19'] = ( ! empty( $new_instance['content_19'] ) ) ? $new_instance['content_19'] : '';

		$instance['tab_20'] = ( ! empty( $new_instance['tab_20'] ) ) ? strip_tags( $new_instance['tab_20'] ) : '';
		$instance['content_20'] = ( ! empty( $new_instance['content_20'] ) ) ? $new_instance['content_20'] : '';

		return $instance;
	}
}

// Load the required styles and scripts
function artabs_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'mastercss', $plugin_url . 'styles/master.css' );
}
add_action( 'wp_enqueue_scripts', 'artabs_load_plugin_css' );

function artabs_load_plugin_js() {
	$plugin_url = plugin_dir_url( __FILE__ );

		wp_enqueue_script( 'jquery-core' );
    wp_enqueue_script( 'masterjs', $plugin_url . 'scripts/master.js' );
}
add_action( 'wp_enqueue_scripts', 'artabs_load_plugin_js' );

// Class artabs_widget ends here
// Register and load the widget
function artabs_load_widget() {
    register_widget( 'artabs_widget' );
}
add_action( 'widgets_init', 'artabs_load_widget' );

?>
