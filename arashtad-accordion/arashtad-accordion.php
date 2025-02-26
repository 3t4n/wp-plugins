<?php

/*
Plugin Name: 	Arashtad Accordion
Plugin URI:  	https://arashtad.com
Description: 	Responsive accordion widget for WordPress, created by <a href="https://arashtad.com" target="_blank">Arashtad.com</a>
Version:     	1.2
Author:      	Amin Shahrokhi
Author URI:  	https://arashtad.com
License:     	GPL2
License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
Copyright:		(c) 2011 - 2016 Arashtad Ltd. All Rights Reserved.

Arashtad Accordion is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Arashtad Accordion is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Arashtad Accordion. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Restricting direct access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Localize for translation
//load_plugin_textdomain( 'araccordion', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
function arashtad_accordion_init() {
  load_plugin_textdomain( 'araccordion', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('init', 'arashtad_accordion_init');

// Creating the widget
class araccordion_widget extends WP_Widget {
	function __construct() {
		if (get_locale() == 'fa_IR') {
			parent::__construct(
				// Base ID of your widget
				'araccordion_widget',
				// Widget name will appear in UI
				__('ارشتاد آکاردیون', $text_domain),
				// Widget description
				array( 'description' => __( 'آکاردیون واکنشگرا برای وردپرس. کاری از Arashtad.com', $text_domain ), )
			);
		}
		else {
			parent::__construct(
				// Base ID of your widget
				'araccordion_widget',
				// Widget name will appear in UI
				__('Arashtad Accordion', $text_domain),
				// Widget description
				array( 'description' => __( 'Responsive accordion widget by Arashtad.com.', $text_domain ), )
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

		$heading1 = apply_filters( 'widget_text', $instance['heading1'] );
		$content1 = apply_filters( 'widget_text', $instance['content1'] );

		$heading2 = apply_filters( 'widget_text', $instance['heading2'] );
		$content2 = apply_filters( 'widget_text', $instance['content2'] );

		$heading3 = apply_filters( 'widget_text', $instance['heading3'] );
		$content3 = apply_filters( 'widget_text', $instance['content3'] );

		$heading4 = apply_filters( 'widget_text', $instance['heading4'] );
		$content4 = apply_filters( 'widget_text', $instance['content4'] );

		$heading5 = apply_filters( 'widget_text', $instance['heading5'] );
		$content5 = apply_filters( 'widget_text', $instance['content5'] );

		$heading6 = apply_filters( 'widget_text', $instance['heading6'] );
		$content6 = apply_filters( 'widget_text', $instance['content6'] );

		$heading7 = apply_filters( 'widget_text', $instance['heading7'] );
		$content7 = apply_filters( 'widget_text', $instance['content7'] );

		$heading8 = apply_filters( 'widget_text', $instance['heading8'] );
		$content8 = apply_filters( 'widget_text', $instance['content8'] );

		$heading9 = apply_filters( 'widget_text', $instance['heading9'] );
		$content9 = apply_filters( 'widget_text', $instance['content9'] );

		$heading10 = apply_filters( 'widget_text', $instance['heading10'] );
		$content10 = apply_filters( 'widget_text', $instance['content10'] );

		$heading11 = apply_filters( 'widget_text', $instance['heading11'] );
		$content11 = apply_filters( 'widget_text', $instance['content11'] );

		$heading12 = apply_filters( 'widget_text', $instance['heading12'] );
		$content12 = apply_filters( 'widget_text', $instance['content12'] );

		$heading13 = apply_filters( 'widget_text', $instance['heading13'] );
		$content13 = apply_filters( 'widget_text', $instance['content13'] );

		$heading14 = apply_filters( 'widget_text', $instance['heading14'] );
		$content14 = apply_filters( 'widget_text', $instance['content14'] );

		$heading15 = apply_filters( 'widget_text', $instance['heading15'] );
		$content15 = apply_filters( 'widget_text', $instance['content15'] );

		$heading16 = apply_filters( 'widget_text', $instance['heading16'] );
		$content16 = apply_filters( 'widget_text', $instance['content16'] );

		$heading17 = apply_filters( 'widget_text', $instance['heading17'] );
		$content17 = apply_filters( 'widget_text', $instance['content17'] );

		$heading18 = apply_filters( 'widget_text', $instance['heading18'] );
		$content18 = apply_filters( 'widget_text', $instance['content18'] );

		$heading19 = apply_filters( 'widget_text', $instance['heading19'] );
		$content19 = apply_filters( 'widget_text', $instance['content19'] );

		$heading20 = apply_filters( 'widget_text', $instance['heading20'] );
		$content20 = apply_filters( 'widget_text', $instance['content20'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo _e( 'Arashtad Accordion', $text_domain );

		?>

		<?php /* Begin output template */ ?>
		<?php
			// Inject internal CSS if there's an option received from the widget instance base of its id
			if($fixed_height || $fixed_width || $margin || $padding)
			{
				echo '<style>';
				echo ' #itoggle' . $widget_num . ' {';
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
		<?php echo $header_text; ?>
		<div class="clear"></div>

		<div class="iccordion_style_<?php echo $style; ?>">
			<div class="iccordion" id="iccordion<?php echo $module->id; ?>">

				<?php if($heading1){ ?>
					<section class="iccordion_tab" id="iccordion_tab1">
						<div class="iccordion_heading">
							<h3><?php echo $heading1; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content1; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading2){ ?>
					<section class="iccordion_tab" id="iccordion_tab2">
						<div class="iccordion_heading">
							<h3><?php echo $heading2; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content2; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading3){ ?>
					<section class="iccordion_tab" id="iccordion_tab3">
						<div class="iccordion_heading">
							<h3><?php echo $heading3; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content3; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading4){ ?>
					<section class="iccordion_tab" id="iccordion_tab4">
						<div class="iccordion_heading">
							<h3><?php echo $heading4; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content4; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading5){ ?>
					<section class="iccordion_tab" id="iccordion_tab5">
						<div class="iccordion_heading">
							<h3><?php echo $heading5; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content5; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading6){ ?>
					<section class="iccordion_tab" id="iccordion_tab6">
						<div class="iccordion_heading">
							<h3><?php echo $heading6; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content6; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading7){ ?>
					<section class="iccordion_tab" id="iccordion_tab7">
						<div class="iccordion_heading">
							<h3><?php echo $heading7; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content7; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading8){ ?>
					<section class="iccordion_tab" id="iccordion_tab8">
						<div class="iccordion_heading">
							<h3><?php echo $heading8; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content8; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading9){ ?>
					<section class="iccordion_tab" id="iccordion_tab9">
						<div class="iccordion_heading">
							<h3><?php echo $heading9; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content9; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading10){ ?>
					<section class="iccordion_tab" id="iccordion_tab10">
						<div class="iccordion_heading">
							<h3><?php echo $heading10; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content10; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading11){ ?>
					<section class="iccordion_tab" id="iccordion_tab11">
						<div class="iccordion_heading">
							<h3><?php echo $heading11; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content11; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading12){ ?>
					<section class="iccordion_tab" id="iccordion_tab12">
						<div class="iccordion_heading">
							<h3><?php echo $heading12; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content12; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading13){ ?>
					<section class="iccordion_tab" id="iccordion_tab13">
						<div class="iccordion_heading">
							<h3><?php echo $heading13; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content13; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading14){ ?>
					<section class="iccordion_tab" id="iccordion_tab14">
						<div class="iccordion_heading">
							<h3><?php echo $heading14; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content14; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading15){ ?>
					<section class="iccordion_tab" id="iccordion_tab15">
						<div class="iccordion_heading">
							<h3><?php echo $heading15; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content15; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading16){ ?>
					<section class="iccordion_tab" id="iccordion_tab16">
						<div class="iccordion_heading">
							<h3><?php echo $heading16; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content16; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading17){ ?>
					<section class="iccordion_tab" id="iccordion_tab17">
						<div class="iccordion_heading">
							<h3><?php echo $heading17; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content17; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading18){ ?>
					<section class="iccordion_tab" id="iccordion_tab18">
						<div class="iccordion_heading">
							<h3><?php echo $heading18; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content18; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading19){ ?>
					<section class="iccordion_tab" id="iccordion_tab19">
						<div class="iccordion_heading">
							<h3><?php echo $heading19; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content19; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

				<?php if($heading20){ ?>
					<section class="iccordion_tab" id="iccordion_tab20">
						<div class="iccordion_heading">
							<h3><?php echo $heading20; ?></h3>
						</div>
						<article class="iccordion_content">
							<?php echo $content20; ?>
						</article>
						<div class="clear"></div>
					</section>
				<?php } ?>

			</div>
		</div>
		<div class="clear"></div>
		<?php echo $footer_text; ?>
		<div class="clear"></div>
		<?php /* End output template */ ?>
		<?php

		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		$text_domain = 'araccordion';
		if ( isset( $instance[ 'title' ] ) )
		{
			$title = $instance[ 'title' ];
		}
		else
		{
			$title = _e( 'New title', $text_domain );
		}
		$style = $instance['style'];
		$header_text = $instance['header_text'];
		$footer_text = $instance['footer_text'];
		$fixed_width = $instance['fixed_width'];
		$fixed_height = $instance['fixed_height'];
		$margin = $instance['margin'];
		$padding = $instance['padding'];


		$heading1 = $instance['heading1'];
		$content1 = $instance['content1'];

		$heading2 = $instance['heading2'];
		$content2 = $instance['content2'];

		$heading3 = $instance['heading3'];
		$content3 = $instance['content3'];

		$heading4 = $instance['heading4'];
		$content4 = $instance['content4'];

		$heading5 = $instance['heading5'];
		$content5 = $instance['content5'];

		$heading6 = $instance['heading6'];
		$content6 = $instance['content6'];

		$heading7 = $instance['heading7'];
		$content7 = $instance['content7'];

		$heading8 = $instance['heading8'];
		$content8 = $instance['content8'];

		$heading9 = $instance['heading9'];
		$content9 = $instance['content9'];

		$heading10 = $instance['heading10'];
		$content10 = $instance['content10'];

		$heading11 = $instance['heading11'];
		$content11 = $instance['content11'];

		$heading12 = $instance['heading12'];
		$content12 = $instance['content12'];

		$heading13 = $instance['heading13'];
		$content13 = $instance['content13'];

		$heading14 = $instance['heading14'];
		$content14 = $instance['content14'];

		$heading15 = $instance['heading15'];
		$content15 = $instance['content15'];

		$heading16 = $instance['heading16'];
		$content16 = $instance['content16'];

		$heading17 = $instance['heading17'];
		$content17 = $instance['content17'];

		$heading18 = $instance['heading18'];
		$content18 = $instance['content18'];

		$heading19 = $instance['heading19'];
		$content19 = $instance['content19'];

		$heading20 = $instance['heading20'];
		$content20 = $instance['content20'];

		// Widget admin form
		?>

<h3><?php _e( 'Appearance Settings', $text_domain ); ?></h3>

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
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="2" <?php if($style == '2') echo 'selected'; ?>>Flat</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="3" <?php if($style == '3') echo 'selected'; ?>>Nude</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="4" <?php if($style == '4') echo 'selected'; ?>>BootStrap</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="5" <?php if($style == '5') echo 'selected'; ?>>Fancy</option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="6" <?php if($style == '6') echo 'selected'; ?>>Custom</option>
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
	<label for="<?php echo $this->get_field_id( 'margin' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Margin (e.g. 10px auto):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this->get_field_name( 'margin' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $margin ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'padding' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Padding (e.g. 10px 0 0 10px):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'padding' ); ?>" name="<?php echo $this->get_field_name( 'padding' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $padding ); ?>" />

</p>

<hr style="margin-top: 20px;">

<h3><?php _e( 'Tabs Settings', $text_domain ); ?></h3>

<p>
	<label for="<?php echo $this->get_field_id( 'heading1' ); ?>"><?php _e( 'Heading 1:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading1' ) ?>" name="<?php echo $this->get_field_name( 'heading1' ) ?>" type="text" value="<?php echo esc_attr( $heading1 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content1' ); ?>"><?php _e( 'Tab Content 1:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content1' ) ?>" name="<?php echo $this->get_field_name( 'content1' ) ?>" ><?php echo $content1; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading2' ); ?>"><?php _e( 'Heading 2:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading2' ) ?>" name="<?php echo $this->get_field_name( 'heading2' ) ?>" type="text" value="<?php echo esc_attr( $heading2 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content2' ); ?>"><?php _e( 'Tab Content 2:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content2' ) ?>" name="<?php echo $this->get_field_name( 'content2' ) ?>" ><?php echo $content2; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading3' ); ?>"><?php _e( 'Heading 3:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading3' ) ?>" name="<?php echo $this->get_field_name( 'heading3' ) ?>" type="text" value="<?php echo esc_attr( $heading3 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content3' ); ?>"><?php _e( 'Tab Content 3:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content3' ) ?>" name="<?php echo $this->get_field_name( 'content3' ) ?>" ><?php echo $content3; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading4' ); ?>"><?php _e( 'Heading 4:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading4' ) ?>" name="<?php echo $this->get_field_name( 'heading4' ) ?>" type="text" value="<?php echo esc_attr( $heading4 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content4' ); ?>"><?php _e( 'Tab Content 4:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content4' ) ?>" name="<?php echo $this->get_field_name( 'content4' ) ?>" ><?php echo $content4; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading5' ); ?>"><?php _e( 'Heading 5:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading5' ) ?>" name="<?php echo $this->get_field_name( 'heading5' ) ?>" type="text" value="<?php echo esc_attr( $heading5 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content5' ); ?>"><?php _e( 'Tab Content 5:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content5' ) ?>" name="<?php echo $this->get_field_name( 'content5' ) ?>" ><?php echo $content5; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading6' ); ?>"><?php _e( 'Heading 6:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading6' ) ?>" name="<?php echo $this->get_field_name( 'heading6' ) ?>" type="text" value="<?php echo esc_attr( $heading6 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content6' ); ?>"><?php _e( 'Tab Content 6:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content6' ) ?>" name="<?php echo $this->get_field_name( 'content6' ) ?>" ><?php echo $content6; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading7' ); ?>"><?php _e( 'Heading 7:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading7' ) ?>" name="<?php echo $this->get_field_name( 'heading7' ) ?>" type="text" value="<?php echo esc_attr( $heading7 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content7' ); ?>"><?php _e( 'Tab Content 7:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content7' ) ?>" name="<?php echo $this->get_field_name( 'content7' ) ?>" ><?php echo $content7; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading8' ); ?>"><?php _e( 'Heading 8:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading8' ) ?>" name="<?php echo $this->get_field_name( 'heading8' ) ?>" type="text" value="<?php echo esc_attr( $heading8 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content8' ); ?>"><?php _e( 'Tab Content 8:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content8' ) ?>" name="<?php echo $this->get_field_name( 'content8' ) ?>" ><?php echo $content8; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading9' ); ?>"><?php _e( 'Heading 9:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading9' ) ?>" name="<?php echo $this->get_field_name( 'heading9' ) ?>" type="text" value="<?php echo esc_attr( $heading9 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content9' ); ?>"><?php _e( 'Tab Content 9:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content9' ) ?>" name="<?php echo $this->get_field_name( 'content9' ) ?>" ><?php echo $content10; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading10' ); ?>"><?php _e( 'Heading 10:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading10' ) ?>" name="<?php echo $this->get_field_name( 'heading10' ) ?>" type="text" value="<?php echo esc_attr( $heading10 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content10' ); ?>"><?php _e( 'Tab Content 10:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content10' ) ?>" name="<?php echo $this->get_field_name( 'content10' ) ?>" ><?php echo $content10; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading11' ); ?>"><?php _e( 'Heading 11:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading11' ) ?>" name="<?php echo $this->get_field_name( 'heading11' ) ?>" type="text" value="<?php echo esc_attr( $heading11 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content11' ); ?>"><?php _e( 'Tab Content 11:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content11' ) ?>" name="<?php echo $this->get_field_name( 'content11' ) ?>" ><?php echo $content11; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading12' ); ?>"><?php _e( 'Heading 12:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading12' ) ?>" name="<?php echo $this->get_field_name( 'heading12' ) ?>" type="text" value="<?php echo esc_attr( $heading12 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content12' ); ?>"><?php _e( 'Tab Content 12:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content12' ) ?>" name="<?php echo $this->get_field_name( 'content12' ) ?>" ><?php echo $content12; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading13' ); ?>"><?php _e( 'Heading 13:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading13' ) ?>" name="<?php echo $this->get_field_name( 'heading13' ) ?>" type="text" value="<?php echo esc_attr( $heading13 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content13' ); ?>"><?php _e( 'Tab Content 13:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content13' ) ?>" name="<?php echo $this->get_field_name( 'content13' ) ?>" ><?php echo $content13; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading14' ); ?>"><?php _e( 'Heading 14:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading14' ) ?>" name="<?php echo $this->get_field_name( 'heading14' ) ?>" type="text" value="<?php echo esc_attr( $heading14 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content14' ); ?>"><?php _e( 'Tab Content 14:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content14' ) ?>" name="<?php echo $this->get_field_name( 'content14' ) ?>" ><?php echo $content14; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading15' ); ?>"><?php _e( 'Heading 15:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading15' ) ?>" name="<?php echo $this->get_field_name( 'heading15' ) ?>" type="text" value="<?php echo esc_attr( $heading15 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content15' ); ?>"><?php _e( 'Tab Content 15:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content15' ) ?>" name="<?php echo $this->get_field_name( 'content15' ) ?>" ><?php echo $content15; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading16' ); ?>"><?php _e( 'Heading 16:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading16' ) ?>" name="<?php echo $this->get_field_name( 'heading16' ) ?>" type="text" value="<?php echo esc_attr( $heading16 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content16' ); ?>"><?php _e( 'Tab Content 16:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content16' ) ?>" name="<?php echo $this->get_field_name( 'content16' ) ?>" ><?php echo $content16; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading17' ); ?>"><?php _e( 'Heading 17:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading17' ) ?>" name="<?php echo $this->get_field_name( 'heading17' ) ?>" type="text" value="<?php echo esc_attr( $heading17 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content17' ); ?>"><?php _e( 'Tab Content 17:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content17' ) ?>" name="<?php echo $this->get_field_name( 'content17' ) ?>" ><?php echo $content17; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading18' ); ?>"><?php _e( 'Heading 18:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading18' ) ?>" name="<?php echo $this->get_field_name( 'heading18' ) ?>" type="text" value="<?php echo esc_attr( $heading18 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content18' ); ?>"><?php _e( 'Tab Content 18:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content18' ) ?>" name="<?php echo $this->get_field_name( 'content18' ) ?>" ><?php echo $content18; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading19' ); ?>"><?php _e( 'Heading 19:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading19' ) ?>" name="<?php echo $this->get_field_name( 'heading19' ) ?>" type="text" value="<?php echo esc_attr( $heading19 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content19' ); ?>"><?php _e( 'Tab Content 19:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content19' ) ?>" name="<?php echo $this->get_field_name( 'content19' ) ?>" ><?php echo $content19; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'heading20' ); ?>"><?php _e( 'Heading 20:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'heading20' ) ?>" name="<?php echo $this->get_field_name( 'heading20' ) ?>" type="text" value="<?php echo esc_attr( $heading20 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'content20' ); ?>"><?php _e( 'Tab Content 20:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'content20' ) ?>" name="<?php echo $this->get_field_name( 'content20' ) ?>" ><?php echo $content20; ?></textarea>
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

		$instance['heading1'] = ( ! empty( $new_instance['heading1'] ) ) ? strip_tags( $new_instance['heading1'] ) : '';
		$instance['content1'] = ( ! empty( $new_instance['content1'] ) ) ? $new_instance['content1'] : '';

		$instance['heading2'] = ( ! empty( $new_instance['heading2'] ) ) ? strip_tags( $new_instance['heading2'] ) : '';
		$instance['content2'] = ( ! empty( $new_instance['content2'] ) ) ? $new_instance['content2'] : '';

		$instance['heading3'] = ( ! empty( $new_instance['heading3'] ) ) ? strip_tags( $new_instance['heading3'] ) : '';
		$instance['content3'] = ( ! empty( $new_instance['content3'] ) ) ? $new_instance['content3'] : '';

		$instance['heading4'] = ( ! empty( $new_instance['heading4'] ) ) ? strip_tags( $new_instance['heading4'] ) : '';
		$instance['content4'] = ( ! empty( $new_instance['content4'] ) ) ? $new_instance['content4'] : '';

		$instance['heading5'] = ( ! empty( $new_instance['heading5'] ) ) ? strip_tags( $new_instance['heading5'] ) : '';
		$instance['content5'] = ( ! empty( $new_instance['content5'] ) ) ? $new_instance['content5'] : '';

		$instance['heading6'] = ( ! empty( $new_instance['heading6'] ) ) ? strip_tags( $new_instance['heading6'] ) : '';
		$instance['content6'] = ( ! empty( $new_instance['content6'] ) ) ? $new_instance['content6'] : '';

		$instance['heading7'] = ( ! empty( $new_instance['heading7'] ) ) ? strip_tags( $new_instance['heading7'] ) : '';
		$instance['content7'] = ( ! empty( $new_instance['content7'] ) ) ? $new_instance['content7'] : '';

		$instance['heading8'] = ( ! empty( $new_instance['heading8'] ) ) ? strip_tags( $new_instance['heading8'] ) : '';
		$instance['content8'] = ( ! empty( $new_instance['content8'] ) ) ? $new_instance['content8'] : '';

		$instance['heading9'] = ( ! empty( $new_instance['heading9'] ) ) ? strip_tags( $new_instance['heading9'] ) : '';
		$instance['content9'] = ( ! empty( $new_instance['content9'] ) ) ? $new_instance['content9'] : '';

		$instance['heading10'] = ( ! empty( $new_instance['heading10'] ) ) ? strip_tags( $new_instance['heading10'] ) : '';
		$instance['content10'] = ( ! empty( $new_instance['content10'] ) ) ? $new_instance['content10'] : '';

		$instance['heading11'] = ( ! empty( $new_instance['heading11'] ) ) ? strip_tags( $new_instance['heading11'] ) : '';
		$instance['content11'] = ( ! empty( $new_instance['content11'] ) ) ? $new_instance['content11'] : '';

		$instance['heading12'] = ( ! empty( $new_instance['heading12'] ) ) ? strip_tags( $new_instance['heading12'] ) : '';
		$instance['content12'] = ( ! empty( $new_instance['content12'] ) ) ? $new_instance['content12'] : '';

		$instance['heading13'] = ( ! empty( $new_instance['heading13'] ) ) ? strip_tags( $new_instance['heading13'] ) : '';
		$instance['content13'] = ( ! empty( $new_instance['content13'] ) ) ? $new_instance['content13'] : '';

		$instance['heading14'] = ( ! empty( $new_instance['heading14'] ) ) ? strip_tags( $new_instance['heading14'] ) : '';
		$instance['content14'] = ( ! empty( $new_instance['content14'] ) ) ? $new_instance['content14'] : '';

		$instance['heading15'] = ( ! empty( $new_instance['heading15'] ) ) ? strip_tags( $new_instance['heading15'] ) : '';
		$instance['content15'] = ( ! empty( $new_instance['content15'] ) ) ? $new_instance['content15'] : '';

		$instance['heading16'] = ( ! empty( $new_instance['heading16'] ) ) ? strip_tags( $new_instance['heading16'] ) : '';
		$instance['content16'] = ( ! empty( $new_instance['content16'] ) ) ? $new_instance['content16'] : '';

		$instance['heading17'] = ( ! empty( $new_instance['heading17'] ) ) ? strip_tags( $new_instance['heading17'] ) : '';
		$instance['content17'] = ( ! empty( $new_instance['content17'] ) ) ? $new_instance['content17'] : '';

		$instance['heading18'] = ( ! empty( $new_instance['heading18'] ) ) ? strip_tags( $new_instance['heading18'] ) : '';
		$instance['content18'] = ( ! empty( $new_instance['content18'] ) ) ? $new_instance['content18'] : '';

		$instance['heading19'] = ( ! empty( $new_instance['heading19'] ) ) ? strip_tags( $new_instance['heading19'] ) : '';
		$instance['content19'] = ( ! empty( $new_instance['content19'] ) ) ? $new_instance['content19'] : '';

		$instance['heading20'] = ( ! empty( $new_instance['heading20'] ) ) ? strip_tags( $new_instance['heading20'] ) : '';
		$instance['content20'] = ( ! empty( $new_instance['content20'] ) ) ? $new_instance['content20'] : '';

		return $instance;
	}
}

// Load the required styles and scripts
function wpaccrd_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'mastercss_accrdn', $plugin_url . 'styles/master.css' );
}
add_action( 'wp_enqueue_scripts', 'wpaccrd_load_plugin_css' );

function wpaccrd_load_plugin_js() {
	$plugin_url = plugin_dir_url( __FILE__ );

	wp_enqueue_script( 'jquery-core' );
    wp_enqueue_script( 'masterjs_accrdn', $plugin_url . 'scripts/master.js' );
}
add_action( 'wp_enqueue_scripts', 'wpaccrd_load_plugin_js' );

// Class araccordion_widget ends here
// Register and load the widget
function araccordion_load_widget() {
    register_widget( 'araccordion_widget' );
}
add_action( 'widgets_init', 'araccordion_load_widget' );

?>
