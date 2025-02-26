<?php

/*
Plugin Name: 	Arashtad Testimonials Slider
Plugin URI:  	https://arashtad.com/wordpress-plugins/introductions/arashtad-testimonials/
Description: 	Responsive testimonials slider widget for WordPress, created by Arashtad Ltd. See <a href="https://arashtad.com/" target="_blank">Arashtad.com</a> for more details and professional products and services.
Version:     	1.2
Author:      	Amin Shahrokhi
Author URI:  	https://arashtad.com/
License:     	GPL2 or later
License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
Copyright:		(c) 2011 - 2015 Arashtad Ltd. All Rights Reserved.

Arashtad Testimonials Slider is commercial software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version. BUT YOU CAN NOT SELL OR PROVIDE IT ANYWHERE.

Arashtad Testimonials Slider is distributed in the hope that it will be useful,
WITH FULL SUPPORT BY THE AUTHOR. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Arashtad Testimonials Slider. If not, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.


Include these is the head:
http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css
arashtad-testimonials/scripts/master.js

*/

// Restricting direct access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Localize for translation
load_plugin_textdomain( 'artestimonials', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// Creating the widget
class artestimonials_widget extends WP_Widget {
	function __construct() {
		if (get_locale() == 'fa_IR') {
			parent::__construct(
				// Base ID of your widget
				'artestimonials_widget',
				// Widget name will appear in UI
				__( 'گواهی ها', $text_domain),
				// Widget description
				array( 'description' => __( 'افزونه واکنشگرای نمایش گفته های مشتریان. کاری از Arashtad.com', $text_domain ), )
			);
		}
		else {
			parent::__construct(
				// Base ID of your widget
				'artestimonials_widget',
				// Widget name will appear in UI
				__('Arashtad Testimonials Slider', $text_domain),
				// Widget description
				array( 'description' => __( 'Responsive testimonials slider by Arashtad.com', $text_domain ), )
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
		$animation_duration = apply_filters( 'widget_text', $instance['animation_duration'] );
		$display_duration = apply_filters( 'widget_text', $instance['display_duration'] );
		$effect = apply_filters( 'widget_text', $instance['effect'] );
		$style = apply_filters( 'widget_text', $instance['style'] );
		$header_text = apply_filters( 'widget_text', $instance['header_text'] );
		$footer_text = apply_filters( 'widget_text', $instance['footer_text'] );
		$fixed_width = apply_filters( 'widget_text', $instance['fixed_width'] );
		$fixed_height = apply_filters( 'widget_text', $instance['fixed_height'] );
		$margin = apply_filters( 'widget_text', $instance['margin'] );
		$padding = apply_filters( 'widget_text', $instance['padding'] );
		$link_text = apply_filters( 'widget_text', $instance['link_text'] );
		$link_url = apply_filters( 'widget_text', $instance['link_url'] );
		$link_target = apply_filters( 'widget_text', $instance['link_target'] );
		if($link_target == 'true')
		{
			$target = 'target="_blank"';
		}
		else
		{
			$target = 'target="_self"';
		}

		$testimonial_1 = apply_filters( 'widget_text', $instance['testimonial_1'] );
		$name_1 = apply_filters( 'widget_text', $instance['name_1'] );
		$name_link_1 = apply_filters( 'widget_text', $instance['name_link_1'] );
		$company_1 = apply_filters( 'widget_text', $instance['company_1'] );
		$stars_1 = apply_filters( 'widget_text', $instance['stars_1'] );

		$testimonial_2 = apply_filters( 'widget_text', $instance['testimonial_2'] );
		$name_2 = apply_filters( 'widget_text', $instance['name_2'] );
		$name_link_2 = apply_filters( 'widget_text', $instance['name_link_2'] );
		$company_2 = apply_filters( 'widget_text', $instance['company_2'] );
		$stars_2 = apply_filters( 'widget_text', $instance['stars_2'] );

		$testimonial_3 = apply_filters( 'widget_text', $instance['testimonial_3'] );
		$name_3 = apply_filters( 'widget_text', $instance['name_3'] );
		$name_link_3 = apply_filters( 'widget_text', $instance['name_link_3'] );
		$company_3 = apply_filters( 'widget_text', $instance['company_3'] );
		$stars_3 = apply_filters( 'widget_text', $instance['stars_3'] );

		$testimonial_4 = apply_filters( 'widget_text', $instance['testimonial_4'] );
		$name_4 = apply_filters( 'widget_text', $instance['name_4'] );
		$name_link_4 = apply_filters( 'widget_text', $instance['name_link_4'] );
		$company_4 = apply_filters( 'widget_text', $instance['company_4'] );
		$stars_4 = apply_filters( 'widget_text', $instance['stars_4'] );

		$testimonial_5 = apply_filters( 'widget_text', $instance['testimonial_5'] );
		$name_5 = apply_filters( 'widget_text', $instance['name_5'] );
		$name_link_5 = apply_filters( 'widget_text', $instance['name_link_5'] );
		$company_5 = apply_filters( 'widget_text', $instance['company_5'] );
		$stars_5 = apply_filters( 'widget_text', $instance['stars_5'] );

		$testimonial_6 = apply_filters( 'widget_text', $instance['testimonial_6'] );
		$name_6 = apply_filters( 'widget_text', $instance['name_6'] );
		$name_link_6 = apply_filters( 'widget_text', $instance['name_link_6'] );
		$company_6 = apply_filters( 'widget_text', $instance['company_6'] );
		$stars_6 = apply_filters( 'widget_text', $instance['stars_6'] );

		$testimonial_7 = apply_filters( 'widget_text', $instance['testimonial_7'] );
		$name_7 = apply_filters( 'widget_text', $instance['name_7'] );
		$name_link_7 = apply_filters( 'widget_text', $instance['name_link_7'] );
		$company_7 = apply_filters( 'widget_text', $instance['company_7'] );
		$stars_7 = apply_filters( 'widget_text', $instance['stars_7'] );

		$testimonial_8 = apply_filters( 'widget_text', $instance['testimonial_8'] );
		$name_8 = apply_filters( 'widget_text', $instance['name_8'] );
		$name_link_8 = apply_filters( 'widget_text', $instance['name_link_8'] );
		$company_8 = apply_filters( 'widget_text', $instance['company_8'] );
		$stars_8 = apply_filters( 'widget_text', $instance['stars_8'] );

		$testimonial_9 = apply_filters( 'widget_text', $instance['testimonial_9'] );
		$name_9 = apply_filters( 'widget_text', $instance['name_9'] );
		$name_link_9 = apply_filters( 'widget_text', $instance['name_link_9'] );
		$company_9 = apply_filters( 'widget_text', $instance['company_9'] );
		$stars_9 = apply_filters( 'widget_text', $instance['stars_9'] );

		$testimonial_10 = apply_filters( 'widget_text', $instance['testimonial_10'] );
		$name_10 = apply_filters( 'widget_text', $instance['name_10'] );
		$name_link_10 = apply_filters( 'widget_text', $instance['name_link_10'] );
		$company_10 = apply_filters( 'widget_text', $instance['company_10'] );
		$stars_10 = apply_filters( 'widget_text', $instance['stars_10'] );

		$testimonial_11 = apply_filters( 'widget_text', $instance['testimonial_11'] );
		$name_11 = apply_filters( 'widget_text', $instance['name_11'] );
		$name_link_11 = apply_filters( 'widget_text', $instance['name_link_11'] );
		$company_11 = apply_filters( 'widget_text', $instance['company_11'] );
		$stars_11 = apply_filters( 'widget_text', $instance['stars_11'] );

		$testimonial_12 = apply_filters( 'widget_text', $instance['testimonial_12'] );
		$name_12 = apply_filters( 'widget_text', $instance['name_12'] );
		$name_link_12 = apply_filters( 'widget_text', $instance['name_link_12'] );
		$company_12 = apply_filters( 'widget_text', $instance['company_12'] );
		$stars_12 = apply_filters( 'widget_text', $instance['stars_12'] );

		$testimonial_13 = apply_filters( 'widget_text', $instance['testimonial_13'] );
		$name_13 = apply_filters( 'widget_text', $instance['name_13'] );
		$name_link_13 = apply_filters( 'widget_text', $instance['name_link_13'] );
		$company_13 = apply_filters( 'widget_text', $instance['company_13'] );
		$stars_13 = apply_filters( 'widget_text', $instance['stars_13'] );

		$testimonial_14 = apply_filters( 'widget_text', $instance['testimonial_14'] );
		$name_14 = apply_filters( 'widget_text', $instance['name_14'] );
		$name_link_14 = apply_filters( 'widget_text', $instance['name_link_14'] );
		$company_14 = apply_filters( 'widget_text', $instance['company_14'] );
		$stars_14 = apply_filters( 'widget_text', $instance['stars_14'] );

		$testimonial_15 = apply_filters( 'widget_text', $instance['testimonial_15'] );
		$name_15 = apply_filters( 'widget_text', $instance['name_15'] );
		$name_link_15 = apply_filters( 'widget_text', $instance['name_link_15'] );
		$company_15 = apply_filters( 'widget_text', $instance['company_15'] );
		$stars_15 = apply_filters( 'widget_text', $instance['stars_15'] );

		$testimonial_16 = apply_filters( 'widget_text', $instance['testimonial_16'] );
		$name_16 = apply_filters( 'widget_text', $instance['name_16'] );
		$name_link_16 = apply_filters( 'widget_text', $instance['name_link_16'] );
		$company_16 = apply_filters( 'widget_text', $instance['company_16'] );
		$stars_16 = apply_filters( 'widget_text', $instance['stars_16'] );

		$testimonial_17 = apply_filters( 'widget_text', $instance['testimonial_17'] );
		$name_17 = apply_filters( 'widget_text', $instance['name_17'] );
		$name_link_17 = apply_filters( 'widget_text', $instance['name_link_17'] );
		$company_17 = apply_filters( 'widget_text', $instance['company_17'] );
		$stars_17 = apply_filters( 'widget_text', $instance['stars_17'] );

		$testimonial_18 = apply_filters( 'widget_text', $instance['testimonial_18'] );
		$name_18 = apply_filters( 'widget_text', $instance['name_18'] );
		$name_link_18 = apply_filters( 'widget_text', $instance['name_link_18'] );
		$company_18 = apply_filters( 'widget_text', $instance['company_18'] );
		$stars_18 = apply_filters( 'widget_text', $instance['stars_18'] );

		$testimonial_19 = apply_filters( 'widget_text', $instance['testimonial_19'] );
		$name_19 = apply_filters( 'widget_text', $instance['name_19'] );
		$name_link_19 = apply_filters( 'widget_text', $instance['name_link_19'] );
		$company_19 = apply_filters( 'widget_text', $instance['company_19'] );
		$stars_19 = apply_filters( 'widget_text', $instance['stars_19'] );

		$testimonial_20 = apply_filters( 'widget_text', $instance['testimonial_20'] );
		$name_20 = apply_filters( 'widget_text', $instance['name_20'] );
		$name_link_20 = apply_filters( 'widget_text', $instance['name_link_20'] );
		$company_20 = apply_filters( 'widget_text', $instance['company_20'] );
		$stars_20 = apply_filters( 'widget_text', $instance['stars_20'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( 'Arashtad Testimonials Sldier', $text_domain );

		?>

		<?php /* Begin output template */ ?>
		<?php
			// Inject internal CSS if there's an option received from the widget instance base of its id
			if($fixed_height || $fixed_width || $margin || $padding)
			{
				echo '<style>';
				echo ' #testimonials' . $widget_num . ' {';
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
		<?php /* The footer text appears here is set for the widget instance */ ?>
		<?php
			if($header_text)
			{
				echo '<p class="artestimonialsheadertext">' . $header_text . '</p>';
			}
		?>

		<div class="testimonials<?php if($style){ echo ' ' . $style;} ?>" id="testimonials<?php echo $widget_num; ?>" <?php if($animation_duration){ echo 'data-speed="' . $animation_duration . '"';} ?> <?php if($display_duration){ echo 'data-delay="' . $display_duration . '"';} ?> <?php if($effect){ echo 'data-effect="' . $effect . '"';} ?>>
			<?php if($testimonial_1){ ?>
				<section id="testimonial1">
					<p>
						<?php echo $testimonial_1; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_1)
							{
								echo '<a href="' . $name_link_1 . '"' . $target . '></span>' . $name_1 . '</a>';
							}
							else
							{
								echo $name_1;
							}
							if($company_1)
							{
								echo '<div class="company_name">' . $company_1 . '</div>';
							}
							if($stars_1)
							{
								echo '<ul class="stars star_' . $stars_1 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_2){ ?>
				<section id="testimonial2">
					<p>
						<?php echo $testimonial_2; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_2)
							{
								echo '<a href="' . $name_link_2 . '"' . $target . '></span>' . $name_2 . '</a>';
							}
							else
							{
								echo $name_2;
							}
							if($company_2)
							{
								echo '<div class="company_name">' . $company_2 . '</div>';
							}
							if($stars_2)
							{
								echo '<ul class="stars star_' . $stars_2 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_3){ ?>
				<section id="testimonial3">
					<p>
						<?php echo $testimonial_3; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_3)
							{
								echo '<a href="' . $name_link_3 . '"' . $target . '></span>' . $name_3 . '</a>';
							}
							else
							{
								echo $name_3;
							}
							if($company_3)
							{
								echo '<div class="company_name">' . $company_3 . '</div>';
							}
							if($stars_3)
							{
								echo '<ul class="stars star_' . $stars_3 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_4){ ?>
				<section id="testimonial4">
					<p>
						<?php echo $testimonial_4; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_4)
							{
								echo '<a href="' . $name_link_4 . '"' . $target . '></span>' . $name_4 . '</a>';
							}
							else
							{
								echo $name_4;
							}
							if($company_4)
							{
								echo '<div class="company_name">' . $company_4 . '</div>';
							}
							if($stars_4)
							{
								echo '<ul class="stars star_' . $stars_4 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_5){ ?>
				<section id="testimonial5">
					<p>
						<?php echo $testimonial_5; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_5)
							{
								echo '<a href="' . $name_link_5 . '"' . $target . '></span>' . $name_5 . '</a>';
							}
							else
							{
								echo $name_5;
							}
							if($company_5)
							{
								echo '<div class="company_name">' . $company_5 . '</div>';
							}
							if($stars_5)
							{
								echo '<ul class="stars star_' . $stars_5 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_6){ ?>
				<section id="testimonial6">
					<p>
						<?php echo $testimonial_6; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_6)
							{
								echo '<a href="' . $name_link_6 . '"' . $target . '></span>' . $name_6 . '</a>';
							}
							else
							{
								echo $name_6;
							}
							if($company_6)
							{
								echo '<div class="company_name">' . $company_6 . '</div>';
							}
							if($stars_6)
							{
								echo '<ul class="stars star_' . $stars_6 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_7){ ?>
				<section id="testimonial7">
					<p>
						<?php echo $testimonial_7; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_7)
							{
								echo '<a href="' . $name_link_7 . '"' . $target . '></span>' . $name_7 . '</a>';
							}
							else
							{
								echo $name_7;
							}
							if($company_7)
							{
								echo '<div class="company_name">' . $company_7 . '</div>';
							}
							if($stars_7)
							{
								echo '<ul class="stars star_' . $stars_7 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_8){ ?>
				<section id="testimonial8">
					<p>
						<?php echo $testimonial_8; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_8)
							{
								echo '<a href="' . $name_link_8 . '"' . $target . '></span>' . $name_8 . '</a>';
							}
							else
							{
								echo $name_8;
							}
							if($company_8)
							{
								echo '<div class="company_name">' . $company_8 . '</div>';
							}
							if($stars_8)
							{
								echo '<ul class="stars star_' . $stars_8 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_9){ ?>
				<section id="testimonial9">
					<p>
						<?php echo $testimonial_9; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_9)
							{
								echo '<a href="' . $name_link_9 . '"' . $target . '></span>' . $name_9 . '</a>';
							}
							else
							{
								echo $name_9;
							}
							if($company_9)
							{
								echo '<div class="company_name">' . $company_9 . '</div>';
							}
							if($stars_9)
							{
								echo '<ul class="stars star_' . $stars_9 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_10){ ?>
				<section id="testimonial10">
					<p>
						<?php echo $testimonial_10; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_10)
							{
								echo '<a href="' . $name_link_10 . '"' . $target . '></span>' . $name_10 . '</a>';
							}
							else
							{
								echo $name_10;
							}
							if($company_10)
							{
								echo '<div class="company_name">' . $company_10 . '</div>';
							}
							if($stars_10)
							{
								echo '<ul class="stars star_' . $stars_10 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_11){ ?>
				<section id="testimonial11">
					<p>
						<?php echo $testimonial_11; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_11)
							{
								echo '<a href="' . $name_link_11 . '"' . $target . '></span>' . $name_11 . '</a>';
							}
							else
							{
								echo $name_11;
							}
							if($company_11)
							{
								echo '<div class="company_name">' . $company_11 . '</div>';
							}
							if($stars_11)
							{
								echo '<ul class="stars star_' . $stars_11 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_12){ ?>
				<section id="testimonial12">
					<p>
						<?php echo $testimonial_12; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_12)
							{
								echo '<a href="' . $name_link_12 . '"' . $target . '></span>' . $name_12 . '</a>';
							}
							else
							{
								echo $name_12;
							}
							if($company_12)
							{
								echo '<div class="company_name">' . $company_12 . '</div>';
							}
							if($stars_12)
							{
								echo '<ul class="stars star_' . $stars_12 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_13){ ?>
				<section id="testimonial13">
					<p>
						<?php echo $testimonial_13; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_13)
							{
								echo '<a href="' . $name_link_13 . '"' . $target . '></span>' . $name_13 . '</a>';
							}
							else
							{
								echo $name_13;
							}
							if($company_13)
							{
								echo '<div class="company_name">' . $company_13 . '</div>';
							}
							if($stars_13)
							{
								echo '<ul class="stars star_' . $stars_13 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_14){ ?>
				<section id="testimonial14">
					<p>
						<?php echo $testimonial_14; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_14)
							{
								echo '<a href="' . $name_link_14 . '"' . $target . '></span>' . $name_14 . '</a>';
							}
							else
							{
								echo $name_14;
							}
							if($company_14)
							{
								echo '<div class="company_name">' . $company_14 . '</div>';
							}
							if($stars_14)
							{
								echo '<ul class="stars star_' . $stars_14 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_15){ ?>
				<section id="testimonial15">
					<p>
						<?php echo $testimonial_15; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_15)
							{
								echo '<a href="' . $name_link_15 . '"' . $target . '></span>' . $name_15 . '</a>';
							}
							else
							{
								echo $name_15;
							}
							if($company_15)
							{
								echo '<div class="company_name">' . $company_15 . '</div>';
							}
							if($stars_15)
							{
								echo '<ul class="stars star_' . $stars_15 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_16){ ?>
				<section id="testimonial16">
					<p>
						<?php echo $testimonial_16; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_16)
							{
								echo '<a href="' . $name_link_16 . '"' . $target . '></span>' . $name_16 . '</a>';
							}
							else
							{
								echo $name_16;
							}
							if($company_16)
							{
								echo '<div class="company_name">' . $company_16 . '</div>';
							}
							if($stars_16)
							{
								echo '<ul class="stars star_' . $stars_16 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_17){ ?>
				<section id="testimonial17">
					<p>
						<?php echo $testimonial_17; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_17)
							{
								echo '<a href="' . $name_link_17 . '"' . $target . '></span>' . $name_17 . '</a>';
							}
							else
							{
								echo $name_17;
							}
							if($company_17)
							{
								echo '<div class="company_name">' . $company_17 . '</div>';
							}
							if($stars_17)
							{
								echo '<ul class="stars star_' . $stars_17 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_18){ ?>
				<section id="testimonial18">
					<p>
						<?php echo $testimonial_18; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_18)
							{
								echo '<a href="' . $name_link_18 . '"' . $target . '></span>' . $name_18 . '</a>';
							}
							else
							{
								echo $name_18;
							}
							if($company_18)
							{
								echo '<div class="company_name">' . $company_18 . '</div>';
							}
							if($stars_18)
							{
								echo '<ul class="stars star_' . $stars_18 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_19){ ?>
				<section id="testimonial19">
					<p>
						<?php echo $testimonial_19; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_19)
							{
								echo '<a href="' . $name_link_19 . '"' . $target . '></span>' . $name_19 . '</a>';
							}
							else
							{
								echo $name_19;
							}
							if($company_19)
							{
								echo '<div class="company_name">' . $company_19 . '</div>';
							}
							if($stars_19)
							{
								echo '<ul class="stars star_' . $stars_19 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

			<?php if($testimonial_20){ ?>
				<section id="testimonial20">
					<p>
						<?php echo $testimonial_20; ?>
					</p>
					<div class="clear"></div>
					<figure class="name">
						<?php
							if($name_link_20)
							{
								echo '<a href="' . $name_link_20 . '"' . $target . '></span>' . $name_20 . '</a>';
							}
							else
							{
								echo $name_20;
							}
							if($company_20)
							{
								echo '<div class="company_name">aaa' . $company_20 . '</div>';
							}
							if($stars_20)
							{
								echo '<ul class="stars star_' . $stars_20 . '"><li></li><li></li><li></li><li></li><li></li></ul>';
							}
						?>
					</figure>
				</section>
			<?php } ?>

		</div>

		<?php /* The footer text appears here is set for the widget instance */ ?>
		<?php
			if($footer_text)
			{
				echo '<p class="artestimonialsfootertext">' . $footer_text . '</p>';
			}
		?>

		<?php /* The footer link appears here is set for the widget instance */ ?>
		<?php
			if($link_url && $link_text)
			{
				echo '<p class="artestimonialsfooterlink">';
				echo '<a href="' . $link_url . '" ' . $target . '>' . $link_text . '</a>';
				echo '</p>';
			}
		?>
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
		$animation_duration = $instance['animation_duration'];
		$display_duration = $instance['display_duration'];

		$header_text = $instance['header_text'];
		$footer_text = $instance['footer_text'];
		$effect = $instance['effect'];
		$style = $instance['style'];
		$fixed_width = $instance['fixed_width'];
		$fixed_height = $instance['fixed_height'];
		$margin = $instance['margin'];
		$padding = $instance['padding'];
		$link_text = $instance['link_text'];
		$link_url = $instance['link_url'];
		$link_target = $instance['link_target'];
		$text_domain = 'artestimonials';

		$testimonial_1 = $instance['testimonial_1'];
		$name_1 = $instance['name_1'];
		$name_link_1 = $instance['name_link_1'];
		$company_1 = $instance['company_1'];
		$stars_1 = $instance['stars_1'];

		$testimonial_2 = $instance['testimonial_2'];
		$name_2 = $instance['name_2'];
		$name_link_2 = $instance['name_link_2'];
		$company_2 = $instance['company_2'];
		$stars_2 = $instance['stars_2'];

		$testimonial_3 = $instance['testimonial_3'];
		$name_3 = $instance['name_3'];
		$name_link_3 = $instance['name_link_3'];
		$company_3 = $instance['company_3'];
		$stars_3 = $instance['stars_3'];

		$testimonial_4 = $instance['testimonial_4'];
		$name_4 = $instance['name_4'];
		$name_link_4 = $instance['name_link_4'];
		$company_4 = $instance['company_4'];
		$stars_4 = $instance['stars_4'];

		$testimonial_5 = $instance['testimonial_5'];
		$name_5 = $instance['name_5'];
		$name_link_5 = $instance['name_link_5'];
		$company_5 = $instance['company_5'];
		$stars_5 = $instance['stars_5'];

		$testimonial_6 = $instance['testimonial_6'];
		$name_6 = $instance['name_6'];
		$name_link_6 = $instance['name_link_6'];
		$company_6 = $instance['company_6'];
		$stars_6 = $instance['stars_6'];

		$testimonial_7 = $instance['testimonial_7'];
		$name_7 = $instance['name_7'];
		$name_link_7 = $instance['name_link_7'];
		$company_7 = $instance['company_7'];
		$stars_7 = $instance['stars_7'];

		$testimonial_8 = $instance['testimonial_8'];
		$name_8 = $instance['name_8'];
		$name_link_8 = $instance['name_link_8'];
		$company_8 = $instance['company_8'];
		$stars_8 = $instance['stars_8'];

		$testimonial_9 = $instance['testimonial_9'];
		$name_9 = $instance['name_9'];
		$name_link_9 = $instance['name_link_9'];
		$company_9 = $instance['company_9'];
		$stars_9 = $instance['stars_9'];

		$testimonial_10 = $instance['testimonial_10'];
		$name_10 = $instance['name_10'];
		$name_link_10 = $instance['name_link_10'];
		$company_10 = $instance['company_10'];
		$stars_10 = $instance['stars_10'];

		$testimonial_11 = $instance['testimonial_11'];
		$name_11 = $instance['name_11'];
		$name_link_11 = $instance['name_link_11'];
		$company_11 = $instance['company_11'];
		$stars_11 = $instance['stars_11'];

		$testimonial_12 = $instance['testimonial_12'];
		$name_12 = $instance['name_12'];
		$name_link_12 = $instance['name_link_12'];
		$company_12 = $instance['company_12'];
		$stars_12 = $instance['stars_12'];

		$testimonial_13 = $instance['testimonial_13'];
		$name_13 = $instance['name_13'];
		$name_link_13 = $instance['name_link_13'];
		$company_13 = $instance['company_13'];
		$stars_13 = $instance['stars_13'];

		$testimonial_14 = $instance['testimonial_14'];
		$name_14 = $instance['name_14'];
		$name_link_14 = $instance['name_link_14'];
		$company_14 = $instance['company_14'];
		$stars_14 = $instance['stars_14'];

		$testimonial_15 = $instance['testimonial_15'];
		$name_15 = $instance['name_15'];
		$name_link_15 = $instance['name_link_15'];
		$company_15 = $instance['company_15'];
		$stars_15 = $instance['stars_15'];

		$testimonial_16 = $instance['testimonial_16'];
		$name_16 = $instance['name_16'];
		$name_link_16 = $instance['name_link_16'];
		$company_16 = $instance['company_16'];
		$stars_16 = $instance['stars_16'];

		$testimonial_17 = $instance['testimonial_17'];
		$name_17 = $instance['name_17'];
		$name_link_17 = $instance['name_link_17'];
		$company_17 = $instance['company_17'];
		$stars_17 = $instance['stars_17'];

		$testimonial_18 = $instance['testimonial_18'];
		$name_18 = $instance['name_18'];
		$name_link_18 = $instance['name_link_18'];
		$company_18 = $instance['company_18'];
		$stars_18 = $instance['stars_18'];

		$testimonial_19 = $instance['testimonial_19'];
		$name_19 = $instance['name_19'];
		$name_link_19 = $instance['name_link_19'];
		$company_19 = $instance['company_19'];
		$stars_19 = $instance['stars_19'];

		$testimonial_20 = $instance['testimonial_20'];
		$name_20 = $instance['name_20'];
		$name_link_20 = $instance['name_link_20'];
		$company_20 = $instance['company_20'];
		$stars_20 = $instance['stars_20'];

		// Widget admin form
		?>

<h3><?php echo _e('Appearance Settings', $text_domain) ?></h3>

<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'animation_duration' ); ?>" style="display: inline-block; width: 210px;"><?php _e( 'Animation Speed (in milliseconds):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'animation_duration' ); ?>" name="<?php echo $this->get_field_name( 'animation_duration' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $animation_duration ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'display_duration' ); ?>" style="display: inline-block; width: 210px;"><?php _e( 'Dsplay Duration (in milliseconds):', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'display_duration' ); ?>" name="<?php echo $this->get_field_name( 'display_duration' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $display_duration ); ?>" />
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
	<label for="<?php echo $this->get_field_id( 'effect' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Effect: <sub>(Type of the effect)</sub>', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'effect' ); ?>" name="<?php echo $this->get_field_name( 'effect' ); ?>">
		<option id="<?php echo $this->get_field_id( 'effect' ); ?>" name="<?php echo $this->get_field_name( 'effect' ); ?>" value="fade" <?php if($effect == 'fade') echo 'selected'; ?>>Fade in</option>
		<option id="<?php echo $this->get_field_id( 'effect' ); ?>" name="<?php echo $this->get_field_name( 'effect' ); ?>" value="slide" <?php if($effect == 'slide') echo 'selected'; ?>>Slide</option>
		<option id="<?php echo $this->get_field_id( 'effect' ); ?>" name="<?php echo $this->get_field_name( 'effect' ); ?>" value="scroll" <?php if($effect == 'scroll') echo 'selected'; ?>>Scroll</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'style' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Style: <sub>(Select a Reserved style)</sub>', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="default" <?php if($style == 'default') echo 'selected'; ?>><?php echo _e( 'Default', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="nude" <?php if($style == 'nude') echo 'selected'; ?>><?php echo _e( 'Nude', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="colorized" <?php if($style == 'colorized') echo 'selected'; ?>><?php echo _e( 'Colorized', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="yutab" <?php if($style == 'yutab') echo 'selected'; ?>><?php echo _e( 'Yutab', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'fixed_width' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Fixed Width: <sub>(e.g. 100px)</sub>', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'fixed_width' ); ?>" name="<?php echo $this->get_field_name( 'fixed_width' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $fixed_width ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'fixed_height' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Fixed Height: <sub>(e.g. 100px)</sub>', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'fixed_height' ); ?>" name="<?php echo $this->get_field_name( 'fixed_height' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $fixed_height ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'margin' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Margin: <sub>(e.g. 10px auto)</sub>', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this->get_field_name( 'margin' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $margin ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'padding' ); ?>" style="width: 170px; display: inline-block;"><?php _e( 'Padding: <sub>(e.g. 10px 0 0 10px)</sub>', $text_domain ); ?></label>
	<input id="<?php echo $this->get_field_id( 'padding' ); ?>" name="<?php echo $this->get_field_name( 'padding' ); ?>" type="text" step="1" min="1" size="10" value="<?php echo esc_attr( $padding ); ?>" />

</p>

<p>
	<label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( 'Link Text:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'link_url' ); ?>"><?php _e( 'Link URL:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'link_target' ); ?>"><?php _e( 'Link Target:', $text_domain ); ?></label>
	&nbsp;
	<input type="radio" id="<?php echo $this->get_field_id( 'link_target' ); ?>" name="<?php echo $this->get_field_name( 'link_target' ); ?>" <?php if($link_target == 'false' || $link_target != 'true') echo 'checked="checked"'; ?> value="false" /><?php echo _e( 'Self', $text_domain ); ?></option>
	<input type="radio" id="<?php echo $this->get_field_id( 'link_target' ); ?>" name="<?php echo $this->get_field_name( 'link_target' ); ?>" <?php if($link_target == 'true') echo 'checked="checked"'; ?> value="true" /><?php echo _e( 'Blank', $text_domain ); ?></option>
	<br>
</p>

<hr style="margin-top: 20px;">

<h3><?php echo _e('Testimonials Settings', $text_domain) ?></h3>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_1' ); ?>"><?php _e( 'Testimonial 1: (Type the main text here)', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_1' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_1' ) ?>" ><?php echo $testimonial_1; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_1' ); ?>"><?php _e( 'Name 1: (Person\'s name)', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_1' ); ?>" name="<?php echo $this->get_field_name( 'name_1' ); ?>" type="text" value="<?php echo esc_attr( $name_1 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_1' ); ?>"><?php _e( 'Name 1 Link: (Link to the person e.g. http://domain.com)', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_1' ); ?>" name="<?php echo $this->get_field_name( 'name_link_1' ); ?>" type="text" value="<?php echo esc_attr( $name_link_1 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_1' ); ?>"><?php _e( 'Company Name 1:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_1' ); ?>" name="<?php echo $this->get_field_name( 'company_1' ); ?>" type="text" value="<?php echo esc_attr( $company_1 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_1' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 1:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" value="0" <?php if($stars_1 != '1' && $stars_1 != '2' && $stars_1 != '3' && $stars_1 != '4' && $stars_1 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" value="1" <?php if($stars_1 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" value="2" <?php if($stars_1 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" value="3" <?php if($stars_1 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" value="4" <?php if($stars_1 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_1' ); ?>" name="<?php echo $this->get_field_name( 'stars_1' ); ?>" value="5" <?php if($stars_1 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_2' ); ?>"><?php _e( 'Testimonial 2:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_2' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_2' ) ?>" ><?php echo $testimonial_2; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_2' ); ?>"><?php _e( 'Name 2:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_2' ); ?>" name="<?php echo $this->get_field_name( 'name_2' ); ?>" type="text" value="<?php echo esc_attr( $name_2 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_2' ); ?>"><?php _e( 'Name 2 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_2' ); ?>" name="<?php echo $this->get_field_name( 'name_link_2' ); ?>" type="text" value="<?php echo esc_attr( $name_link_2 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_2' ); ?>"><?php _e( 'Company Name 2:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_2' ); ?>" name="<?php echo $this->get_field_name( 'company_2' ); ?>" type="text" value="<?php echo esc_attr( $company_2 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_2' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 2:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" value="0" <?php if($stars_2 != '1' && $stars_2 != '2' && $stars_2 != '3' && $stars_2 != '4' && $stars_2 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" value="1" <?php if($stars_2 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" value="2" <?php if($stars_2 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" value="3" <?php if($stars_2 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" value="4" <?php if($stars_2 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_2' ); ?>" name="<?php echo $this->get_field_name( 'stars_2' ); ?>" value="5" <?php if($stars_2 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_3' ); ?>"><?php _e( 'Testimonial 3:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_3' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_3' ) ?>" ><?php echo $testimonial_3; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_3' ); ?>"><?php _e( 'Name 3:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_3' ); ?>" name="<?php echo $this->get_field_name( 'name_3' ); ?>" type="text" value="<?php echo esc_attr( $name_3 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_3' ); ?>"><?php _e( 'Name 3 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_3' ); ?>" name="<?php echo $this->get_field_name( 'name_link_3' ); ?>" type="text" value="<?php echo esc_attr( $name_link_3 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_3' ); ?>"><?php _e( 'Company Name 3:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_3' ); ?>" name="<?php echo $this->get_field_name( 'company_3' ); ?>" type="text" value="<?php echo esc_attr( $company_3 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_3' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 3:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" value="0" <?php if($stars_3 != '1' && $stars_3 != '2' && $stars_3 != '3' && $stars_3 != '4' && $stars_3 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" value="1" <?php if($stars_3 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" value="2" <?php if($stars_3 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" value="3" <?php if($stars_3 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" value="4" <?php if($stars_3 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_3' ); ?>" name="<?php echo $this->get_field_name( 'stars_3' ); ?>" value="5" <?php if($stars_3 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_4' ); ?>"><?php _e( 'Testimonial 4:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_4' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_4' ) ?>" ><?php echo $testimonial_4; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_4' ); ?>"><?php _e( 'Name 4:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_4' ); ?>" name="<?php echo $this->get_field_name( 'name_4' ); ?>" type="text" value="<?php echo esc_attr( $name_4 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_4' ); ?>"><?php _e( 'Name 4 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_4' ); ?>" name="<?php echo $this->get_field_name( 'name_link_4' ); ?>" type="text" value="<?php echo esc_attr( $name_link_4 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_4' ); ?>"><?php _e( 'Company Name 4:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_4' ); ?>" name="<?php echo $this->get_field_name( 'company_4' ); ?>" type="text" value="<?php echo esc_attr( $company_4 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_4' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 4:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" value="0" <?php if($stars_4 != '1' && $stars_4 != '2' && $stars_4 != '3' && $stars_4 != '4' && $stars_4 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" value="1" <?php if($stars_4 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" value="2" <?php if($stars_4 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" value="3" <?php if($stars_4 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" value="4" <?php if($stars_4 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_4' ); ?>" name="<?php echo $this->get_field_name( 'stars_4' ); ?>" value="5" <?php if($stars_4 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_5' ); ?>"><?php _e( 'Testimonial 5:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_5' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_5' ) ?>" ><?php echo $testimonial_5; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_5' ); ?>"><?php _e( 'Name 5:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_5' ); ?>" name="<?php echo $this->get_field_name( 'name_5' ); ?>" type="text" value="<?php echo esc_attr( $name_5 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_5' ); ?>"><?php _e( 'Name 5 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_5' ); ?>" name="<?php echo $this->get_field_name( 'name_link_5' ); ?>" type="text" value="<?php echo esc_attr( $name_link_5 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_5' ); ?>"><?php _e( 'Company Name 5:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_5' ); ?>" name="<?php echo $this->get_field_name( 'company_5' ); ?>" type="text" value="<?php echo esc_attr( $company_5 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_5' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 5:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" value="0" <?php if($stars_5 != '1' && $stars_5 != '2' && $stars_5 != '3' && $stars_5 != '4' && $stars_5 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" value="1" <?php if($stars_5 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" value="2" <?php if($stars_5 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" value="3" <?php if($stars_5 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" value="4" <?php if($stars_5 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_5' ); ?>" name="<?php echo $this->get_field_name( 'stars_5' ); ?>" value="5" <?php if($stars_5 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_6' ); ?>"><?php _e( 'Testimonial 6:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_6' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_6' ) ?>" ><?php echo $testimonial_6; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_6' ); ?>"><?php _e( 'Name 6:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_6' ); ?>" name="<?php echo $this->get_field_name( 'name_6' ); ?>" type="text" value="<?php echo esc_attr( $name_6 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_6' ); ?>"><?php _e( 'Name 6 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_6' ); ?>" name="<?php echo $this->get_field_name( 'name_link_6' ); ?>" type="text" value="<?php echo esc_attr( $name_link_6 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_6' ); ?>"><?php _e( 'Company Name 6:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_6' ); ?>" name="<?php echo $this->get_field_name( 'company_6' ); ?>" type="text" value="<?php echo esc_attr( $company_6 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_6' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 6:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" value="0" <?php if($stars_6 != '1' && $stars_6 != '2' && $stars_6 != '3' && $stars_6 != '4' && $stars_6 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" value="1" <?php if($stars_6 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" value="2" <?php if($stars_6 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" value="3" <?php if($stars_6 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" value="4" <?php if($stars_6 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_6' ); ?>" name="<?php echo $this->get_field_name( 'stars_6' ); ?>" value="5" <?php if($stars_6 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_7' ); ?>"><?php _e( 'Testimonial 7:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_7' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_7' ) ?>" ><?php echo $testimonial_7; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_7' ); ?>"><?php _e( 'Name 7:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_7' ); ?>" name="<?php echo $this->get_field_name( 'name_7' ); ?>" type="text" value="<?php echo esc_attr( $name_7 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_7' ); ?>"><?php _e( 'Name 7 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_7' ); ?>" name="<?php echo $this->get_field_name( 'name_link_7' ); ?>" type="text" value="<?php echo esc_attr( $name_link_7 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_7' ); ?>"><?php _e( 'Company Name 7:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_7' ); ?>" name="<?php echo $this->get_field_name( 'company_7' ); ?>" type="text" value="<?php echo esc_attr( $company_7 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_7' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 7:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" value="0" <?php if($stars_7 != '1' && $stars_7 != '2' && $stars_7 != '3' && $stars_7 != '4' && $stars_7 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" value="1" <?php if($stars_7 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" value="2" <?php if($stars_7 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" value="3" <?php if($stars_7 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" value="4" <?php if($stars_7 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_7' ); ?>" name="<?php echo $this->get_field_name( 'stars_7' ); ?>" value="5" <?php if($stars_7 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_8' ); ?>"><?php _e( 'Testimonial 8:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_8' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_8' ) ?>" ><?php echo $testimonial_8; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_8' ); ?>"><?php _e( 'Name 8:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_8' ); ?>" name="<?php echo $this->get_field_name( 'name_8' ); ?>" type="text" value="<?php echo esc_attr( $name_8 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_8' ); ?>"><?php _e( 'Name 8 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_8' ); ?>" name="<?php echo $this->get_field_name( 'name_link_8' ); ?>" type="text" value="<?php echo esc_attr( $name_link_8 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_8' ); ?>"><?php _e( 'Company Name 8:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_8' ); ?>" name="<?php echo $this->get_field_name( 'company_8' ); ?>" type="text" value="<?php echo esc_attr( $company_8 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_8' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 8:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" value="0" <?php if($stars_8 != '1' && $stars_8 != '2' && $stars_8 != '3' && $stars_8 != '4' && $stars_8 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" value="1" <?php if($stars_8 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" value="2" <?php if($stars_8 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" value="3" <?php if($stars_8 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" value="4" <?php if($stars_8 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_8' ); ?>" name="<?php echo $this->get_field_name( 'stars_8' ); ?>" value="5" <?php if($stars_8 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_9' ); ?>"><?php _e( 'Testimonial 9:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_9' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_9' ) ?>" ><?php echo $testimonial_9; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_9' ); ?>"><?php _e( 'Name 9:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_9' ); ?>" name="<?php echo $this->get_field_name( 'name_9' ); ?>" type="text" value="<?php echo esc_attr( $name_9 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_9' ); ?>"><?php _e( 'Name 9 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_9' ); ?>" name="<?php echo $this->get_field_name( 'name_link_9' ); ?>" type="text" value="<?php echo esc_attr( $name_link_9 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_9' ); ?>"><?php _e( 'Company Name 9:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_9' ); ?>" name="<?php echo $this->get_field_name( 'company_9' ); ?>" type="text" value="<?php echo esc_attr( $company_9 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_9' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 9:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" value="0" <?php if($stars_9 != '1' && $stars_9 != '2' && $stars_9 != '3' && $stars_9 != '4' && $stars_9 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" value="1" <?php if($stars_9 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" value="2" <?php if($stars_9 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" value="3" <?php if($stars_9 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" value="4" <?php if($stars_9 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_9' ); ?>" name="<?php echo $this->get_field_name( 'stars_9' ); ?>" value="5" <?php if($stars_9 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_10' ); ?>"><?php _e( 'Testimonial 10:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_10' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_10' ) ?>" ><?php echo $testimonial_10; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_10' ); ?>"><?php _e( 'Name 10:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_10' ); ?>" name="<?php echo $this->get_field_name( 'name_10' ); ?>" type="text" value="<?php echo esc_attr( $name_10 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_10' ); ?>"><?php _e( 'Name 10 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_10' ); ?>" name="<?php echo $this->get_field_name( 'name_link_10' ); ?>" type="text" value="<?php echo esc_attr( $name_link_10 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_10' ); ?>"><?php _e( 'Company Name 10:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_10' ); ?>" name="<?php echo $this->get_field_name( 'company_10' ); ?>" type="text" value="<?php echo esc_attr( $company_10 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_10' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 10:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" value="0" <?php if($stars_10 != '1' && $stars_10 != '2' && $stars_10 != '3' && $stars_10 != '4' && $stars_10 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" value="1" <?php if($stars_10 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" value="2" <?php if($stars_10 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" value="3" <?php if($stars_10 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" value="4" <?php if($stars_10 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_10' ); ?>" name="<?php echo $this->get_field_name( 'stars_10' ); ?>" value="5" <?php if($stars_10 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_11' ); ?>"><?php _e( 'Testimonial 11:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_11' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_11' ) ?>" ><?php echo $testimonial_11; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_11' ); ?>"><?php _e( 'Name 11:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_11' ); ?>" name="<?php echo $this->get_field_name( 'name_11' ); ?>" type="text" value="<?php echo esc_attr( $name_11 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_11' ); ?>"><?php _e( 'Name 11 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_11' ); ?>" name="<?php echo $this->get_field_name( 'name_link_11' ); ?>" type="text" value="<?php echo esc_attr( $name_link_11 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_11' ); ?>"><?php _e( 'Company Name 11:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_11' ); ?>" name="<?php echo $this->get_field_name( 'company_11' ); ?>" type="text" value="<?php echo esc_attr( $company_11 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_11' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 11:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" value="0" <?php if($stars_11 != '1' && $stars_11 != '2' && $stars_11 != '3' && $stars_11 != '4' && $stars_11 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" value="1" <?php if($stars_11 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" value="2" <?php if($stars_11 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" value="3" <?php if($stars_11 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" value="4" <?php if($stars_11 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_11' ); ?>" name="<?php echo $this->get_field_name( 'stars_11' ); ?>" value="5" <?php if($stars_11 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_12' ); ?>"><?php _e( 'Testimonial 12:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_12' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_12' ) ?>" ><?php echo $testimonial_12; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_12' ); ?>"><?php _e( 'Name 12:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_12' ); ?>" name="<?php echo $this->get_field_name( 'name_12' ); ?>" type="text" value="<?php echo esc_attr( $name_12 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_12' ); ?>"><?php _e( 'Name 12 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_12' ); ?>" name="<?php echo $this->get_field_name( 'name_link_12' ); ?>" type="text" value="<?php echo esc_attr( $name_link_12 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_12' ); ?>"><?php _e( 'Company Name 12:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_12' ); ?>" name="<?php echo $this->get_field_name( 'company_12' ); ?>" type="text" value="<?php echo esc_attr( $company_12 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_12' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 12:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" value="0" <?php if($stars_12 != '1' && $stars_12 != '2' && $stars_12 != '3' && $stars_12 != '4' && $stars_12 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" value="1" <?php if($stars_12 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" value="2" <?php if($stars_12 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" value="3" <?php if($stars_12 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" value="4" <?php if($stars_12 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_12' ); ?>" name="<?php echo $this->get_field_name( 'stars_12' ); ?>" value="5" <?php if($stars_12 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_13' ); ?>"><?php _e( 'Testimonial 13:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_13' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_13' ) ?>" ><?php echo $testimonial_13; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_13' ); ?>"><?php _e( 'Name 13:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_13' ); ?>" name="<?php echo $this->get_field_name( 'name_13' ); ?>" type="text" value="<?php echo esc_attr( $name_13 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_13' ); ?>"><?php _e( 'Name 13 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_13' ); ?>" name="<?php echo $this->get_field_name( 'name_link_13' ); ?>" type="text" value="<?php echo esc_attr( $name_link_13 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_13' ); ?>"><?php _e( 'Company Name 13:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_13' ); ?>" name="<?php echo $this->get_field_name( 'company_13' ); ?>" type="text" value="<?php echo esc_attr( $company_13 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_13' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 13:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" value="0" <?php if($stars_13 != '1' && $stars_13 != '2' && $stars_13 != '3' && $stars_13 != '4' && $stars_13 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" value="1" <?php if($stars_13 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" value="2" <?php if($stars_13 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" value="3" <?php if($stars_13 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" value="4" <?php if($stars_13 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_13' ); ?>" name="<?php echo $this->get_field_name( 'stars_13' ); ?>" value="5" <?php if($stars_13 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_14' ); ?>"><?php _e( 'Testimonial 14:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_14' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_14' ) ?>" ><?php echo $testimonial_14; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_14' ); ?>"><?php _e( 'Name 14:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_14' ); ?>" name="<?php echo $this->get_field_name( 'name_14' ); ?>" type="text" value="<?php echo esc_attr( $name_14 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_14' ); ?>"><?php _e( 'Name 14 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_14' ); ?>" name="<?php echo $this->get_field_name( 'name_link_14' ); ?>" type="text" value="<?php echo esc_attr( $name_link_14 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_14' ); ?>"><?php _e( 'Company Name 14:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_14' ); ?>" name="<?php echo $this->get_field_name( 'company_14' ); ?>" type="text" value="<?php echo esc_attr( $company_14 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_14' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 14:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" value="0" <?php if($stars_14 != '1' && $stars_14 != '2' && $stars_14 != '3' && $stars_14 != '4' && $stars_14 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" value="1" <?php if($stars_14 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" value="2" <?php if($stars_14 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" value="3" <?php if($stars_14 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" value="4" <?php if($stars_14 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_14' ); ?>" name="<?php echo $this->get_field_name( 'stars_14' ); ?>" value="5" <?php if($stars_14 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_15' ); ?>"><?php _e( 'Testimonial 15:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_15' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_15' ) ?>" ><?php echo $testimonial_15; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_15' ); ?>"><?php _e( 'Name 15:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_15' ); ?>" name="<?php echo $this->get_field_name( 'name_15' ); ?>" type="text" value="<?php echo esc_attr( $name_15 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_15' ); ?>"><?php _e( 'Name 15 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_15' ); ?>" name="<?php echo $this->get_field_name( 'name_link_15' ); ?>" type="text" value="<?php echo esc_attr( $name_link_15 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_15' ); ?>"><?php _e( 'Company Name 15:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_15' ); ?>" name="<?php echo $this->get_field_name( 'company_15' ); ?>" type="text" value="<?php echo esc_attr( $company_15 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_15' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 15:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" value="0" <?php if($stars_15 != '1' && $stars_15 != '2' && $stars_15 != '3' && $stars_15 != '4' && $stars_15 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" value="1" <?php if($stars_15 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" value="2" <?php if($stars_15 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" value="3" <?php if($stars_15 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" value="4" <?php if($stars_15 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_15' ); ?>" name="<?php echo $this->get_field_name( 'stars_15' ); ?>" value="5" <?php if($stars_15 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_16' ); ?>"><?php _e( 'Testimonial 16:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_16' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_16' ) ?>" ><?php echo $testimonial_16; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_16' ); ?>"><?php _e( 'Name 16:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_16' ); ?>" name="<?php echo $this->get_field_name( 'name_16' ); ?>" type="text" value="<?php echo esc_attr( $name_16 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_16' ); ?>"><?php _e( 'Name 16 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_16' ); ?>" name="<?php echo $this->get_field_name( 'name_link_16' ); ?>" type="text" value="<?php echo esc_attr( $name_link_16 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_16' ); ?>"><?php _e( 'Company Name 16:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_16' ); ?>" name="<?php echo $this->get_field_name( 'company_16' ); ?>" type="text" value="<?php echo esc_attr( $company_16 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_16' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 16:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" value="0" <?php if($stars_16 != '1' && $stars_16 != '2' && $stars_16 != '3' && $stars_16 != '4' && $stars_16 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" value="1" <?php if($stars_16 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" value="2" <?php if($stars_16 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" value="3" <?php if($stars_16 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" value="4" <?php if($stars_16 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_16' ); ?>" name="<?php echo $this->get_field_name( 'stars_16' ); ?>" value="5" <?php if($stars_16 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_17' ); ?>"><?php _e( 'Testimonial 17:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_17' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_17' ) ?>" ><?php echo $testimonial_17; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_17' ); ?>"><?php _e( 'Name 17:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_17' ); ?>" name="<?php echo $this->get_field_name( 'name_17' ); ?>" type="text" value="<?php echo esc_attr( $name_17 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_17' ); ?>"><?php _e( 'Name 17 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_17' ); ?>" name="<?php echo $this->get_field_name( 'name_link_17' ); ?>" type="text" value="<?php echo esc_attr( $name_link_17 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_17' ); ?>"><?php _e( 'Company Name 17:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_17' ); ?>" name="<?php echo $this->get_field_name( 'company_17' ); ?>" type="text" value="<?php echo esc_attr( $company_17 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_17' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 17:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" value="0" <?php if($stars_17 != '1' && $stars_17 != '2' && $stars_17 != '3' && $stars_17 != '4' && $stars_17 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" value="1" <?php if($stars_17 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" value="2" <?php if($stars_17 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" value="3" <?php if($stars_17 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" value="4" <?php if($stars_17 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_17' ); ?>" name="<?php echo $this->get_field_name( 'stars_17' ); ?>" value="5" <?php if($stars_17 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_18' ); ?>"><?php _e( 'Testimonial 18:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_18' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_18' ) ?>" ><?php echo $testimonial_18; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_18' ); ?>"><?php _e( 'Name 18:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_18' ); ?>" name="<?php echo $this->get_field_name( 'name_18' ); ?>" type="text" value="<?php echo esc_attr( $name_18 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_18' ); ?>"><?php _e( 'Name 18 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_18' ); ?>" name="<?php echo $this->get_field_name( 'name_link_18' ); ?>" type="text" value="<?php echo esc_attr( $name_link_18 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_18' ); ?>"><?php _e( 'Company Name 18:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_18' ); ?>" name="<?php echo $this->get_field_name( 'company_18' ); ?>" type="text" value="<?php echo esc_attr( $company_18 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_18' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 18:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" value="0" <?php if($stars_18 != '1' && $stars_18 != '2' && $stars_18 != '3' && $stars_18 != '4' && $stars_18 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" value="1" <?php if($stars_18 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" value="2" <?php if($stars_18 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" value="3" <?php if($stars_18 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" value="4" <?php if($stars_18 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_18' ); ?>" name="<?php echo $this->get_field_name( 'stars_18' ); ?>" value="5" <?php if($stars_18 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_19' ); ?>"><?php _e( 'Testimonial 19:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_19' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_19' ) ?>" ><?php echo $testimonial_19; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_19' ); ?>"><?php _e( 'Name 19:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_19' ); ?>" name="<?php echo $this->get_field_name( 'name_19' ); ?>" type="text" value="<?php echo esc_attr( $name_19 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_19' ); ?>"><?php _e( 'Name 19 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_19' ); ?>" name="<?php echo $this->get_field_name( 'name_link_19' ); ?>" type="text" value="<?php echo esc_attr( $name_link_19 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_19' ); ?>"><?php _e( 'Company Name 19:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_19' ); ?>" name="<?php echo $this->get_field_name( 'company_19' ); ?>" type="text" value="<?php echo esc_attr( $company_19 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_19' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 19:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" style="margin-bottom: 30px; vertical-align: top;">
		<option id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" value="0" <?php if($stars_19 != '1' && $stars_19 != '2' && $stars_19 != '3' && $stars_19 != '4' && $stars_19 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" value="1" <?php if($stars_19 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" value="2" <?php if($stars_19 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" value="3" <?php if($stars_19 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" value="4" <?php if($stars_19 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_19' ); ?>" name="<?php echo $this->get_field_name( 'stars_19' ); ?>" value="5" <?php if($stars_19 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'testimonial_20' ); ?>"><?php _e( 'Testimonial 20:', $text_domain ); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'testimonial_20' ) ?>" name="<?php echo $this->get_field_name( 'testimonial_20' ) ?>" ><?php echo $testimonial_20; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_20' ); ?>"><?php _e( 'Name 20:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_20' ); ?>" name="<?php echo $this->get_field_name( 'name_20' ); ?>" type="text" value="<?php echo esc_attr( $name_20 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'name_link_20' ); ?>"><?php _e( 'Name 20 Link:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'name_link_20' ); ?>" name="<?php echo $this->get_field_name( 'name_link_20' ); ?>" type="text" value="<?php echo esc_attr( $name_link_20 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'company_20' ); ?>"><?php _e( 'Company Name 20:', $text_domain ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'company_20' ); ?>" name="<?php echo $this->get_field_name( 'company_20' ); ?>" type="text" value="<?php echo esc_attr( $company_20 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'stars_20' ); ?>" style="line-height: 2.3em;"><?php _e( 'Stars 20:', $text_domain ); ?></label>
	<select id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>">
		<option id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>" value="0" <?php if($stars_20 != '1' && $stars_20 != '2' && $stars_20 != '3' && $stars_20 != '4' && $stars_20 != '5') echo 'selected'; ?>><?php echo _e( 'Not Given', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>" value="1" <?php if($stars_20 == '1') echo 'selected'; ?>><?php echo _e( '1', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>" value="2" <?php if($stars_20 == '2') echo 'selected'; ?>><?php echo _e( '2', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>" value="3" <?php if($stars_20 == '3') echo 'selected'; ?>><?php echo _e( '3', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>" value="4" <?php if($stars_20 == '4') echo 'selected'; ?>><?php echo _e( '4', $text_domain ); ?></option>
		<option id="<?php echo $this->get_field_id( 'stars_20' ); ?>" name="<?php echo $this->get_field_name( 'stars_20' ); ?>" value="5" <?php if($stars_20 == '5') echo 'selected'; ?>><?php echo _e( '5', $text_domain ); ?></option>
	</select>
</p>

	<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['animation_duration'] = ( ! empty( $new_instance['animation_duration'] ) ) ? strip_tags( $new_instance['animation_duration'] ) : '';
		$instance['display_duration'] = ( ! empty( $new_instance['display_duration'] ) ) ? strip_tags( $new_instance['display_duration'] ) : '';

		$instance['header_text'] = ( ! empty( $new_instance['header_text'] ) ) ? strip_tags( $new_instance['header_text'] ) : '';
		$instance['footer_text'] = ( ! empty( $new_instance['footer_text'] ) ) ? strip_tags( $new_instance['footer_text'] ) : '';
		$instance['effect'] = ( ! empty( $new_instance['effect'] ) ) ? strip_tags( $new_instance['effect'] ) : '';
		$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
		$instance['fixed_width'] = ( ! empty( $new_instance['fixed_width'] ) ) ? strip_tags( $new_instance['fixed_width'] ) : '';
		$instance['fixed_height'] = ( ! empty( $new_instance['fixed_height'] ) ) ? strip_tags( $new_instance['fixed_height'] ) : '';
		$instance['margin'] = ( ! empty( $new_instance['margin'] ) ) ? strip_tags( $new_instance['margin'] ) : '';
		$instance['padding'] = ( ! empty( $new_instance['padding'] ) ) ? strip_tags( $new_instance['padding'] ) : '';
		$instance['link_text'] = ( ! empty( $new_instance['link_text'] ) ) ? strip_tags( $new_instance['link_text'] ) : '';
		$instance['link_url'] = ( ! empty( $new_instance['link_url'] ) ) ? strip_tags( $new_instance['link_url'] ) : '';
		$instance['link_target'] = ( ! empty( $new_instance['link_target'] ) ) ? strip_tags( $new_instance['link_target'] ) : '';

		$instance['testimonial_1'] = ( ! empty( $new_instance['testimonial_1'] ) ) ? strip_tags( $new_instance['testimonial_1'] ) : '';
		$instance['name_1'] = ( ! empty( $new_instance['name_1'] ) ) ? strip_tags( $new_instance['name_1'] ) : '';
		$instance['name_link_1'] = ( ! empty( $new_instance['name_link_1'] ) ) ? strip_tags( $new_instance['name_link_1'] ) : '';
		$instance['company_1'] = ( ! empty( $new_instance['company_1'] ) ) ? strip_tags( $new_instance['company_1'] ) : '';
		$instance['stars_1'] = ( ! empty( $new_instance['stars_1'] ) ) ? strip_tags( $new_instance['stars_1'] ) : '';

		$instance['testimonial_2'] = ( ! empty( $new_instance['testimonial_2'] ) ) ? strip_tags( $new_instance['testimonial_2'] ) : '';
		$instance['name_2'] = ( ! empty( $new_instance['name_2'] ) ) ? strip_tags( $new_instance['name_2'] ) : '';
		$instance['name_link_2'] = ( ! empty( $new_instance['name_link_2'] ) ) ? strip_tags( $new_instance['name_link_2'] ) : '';
		$instance['company_2'] = ( ! empty( $new_instance['company_2'] ) ) ? strip_tags( $new_instance['company_2'] ) : '';
		$instance['stars_2'] = ( ! empty( $new_instance['stars_2'] ) ) ? strip_tags( $new_instance['stars_2'] ) : '';

		$instance['testimonial_3'] = ( ! empty( $new_instance['testimonial_3'] ) ) ? strip_tags( $new_instance['testimonial_3'] ) : '';
		$instance['name_3'] = ( ! empty( $new_instance['name_3'] ) ) ? strip_tags( $new_instance['name_3'] ) : '';
		$instance['name_link_3'] = ( ! empty( $new_instance['name_link_3'] ) ) ? strip_tags( $new_instance['name_link_3'] ) : '';
		$instance['company_3'] = ( ! empty( $new_instance['company_3'] ) ) ? strip_tags( $new_instance['company_3'] ) : '';
		$instance['stars_3'] = ( ! empty( $new_instance['stars_3'] ) ) ? strip_tags( $new_instance['stars_3'] ) : '';

		$instance['testimonial_4'] = ( ! empty( $new_instance['testimonial_4'] ) ) ? strip_tags( $new_instance['testimonial_4'] ) : '';
		$instance['name_4'] = ( ! empty( $new_instance['name_4'] ) ) ? strip_tags( $new_instance['name_4'] ) : '';
		$instance['name_link_4'] = ( ! empty( $new_instance['name_link_4'] ) ) ? strip_tags( $new_instance['name_link_4'] ) : '';
		$instance['company_4'] = ( ! empty( $new_instance['company_4'] ) ) ? strip_tags( $new_instance['company_4'] ) : '';
		$instance['stars_4'] = ( ! empty( $new_instance['stars_4'] ) ) ? strip_tags( $new_instance['stars_4'] ) : '';

		$instance['testimonial_5'] = ( ! empty( $new_instance['testimonial_5'] ) ) ? strip_tags( $new_instance['testimonial_5'] ) : '';
		$instance['name_5'] = ( ! empty( $new_instance['name_5'] ) ) ? strip_tags( $new_instance['name_5'] ) : '';
		$instance['name_link_5'] = ( ! empty( $new_instance['name_link_5'] ) ) ? strip_tags( $new_instance['name_link_5'] ) : '';
		$instance['company_5'] = ( ! empty( $new_instance['company_5'] ) ) ? strip_tags( $new_instance['company_5'] ) : '';
		$instance['stars_5'] = ( ! empty( $new_instance['stars_5'] ) ) ? strip_tags( $new_instance['stars_5'] ) : '';

		$instance['testimonial_6'] = ( ! empty( $new_instance['testimonial_6'] ) ) ? strip_tags( $new_instance['testimonial_6'] ) : '';
		$instance['name_6'] = ( ! empty( $new_instance['name_6'] ) ) ? strip_tags( $new_instance['name_6'] ) : '';
		$instance['name_link_6'] = ( ! empty( $new_instance['name_link_6'] ) ) ? strip_tags( $new_instance['name_link_6'] ) : '';
		$instance['company_6'] = ( ! empty( $new_instance['company_6'] ) ) ? strip_tags( $new_instance['company_6'] ) : '';
		$instance['stars_6'] = ( ! empty( $new_instance['stars_6'] ) ) ? strip_tags( $new_instance['stars_6'] ) : '';

		$instance['testimonial_7'] = ( ! empty( $new_instance['testimonial_7'] ) ) ? strip_tags( $new_instance['testimonial_7'] ) : '';
		$instance['name_7'] = ( ! empty( $new_instance['name_7'] ) ) ? strip_tags( $new_instance['name_7'] ) : '';
		$instance['name_link_7'] = ( ! empty( $new_instance['name_link_7'] ) ) ? strip_tags( $new_instance['name_link_7'] ) : '';
		$instance['company_7'] = ( ! empty( $new_instance['company_7'] ) ) ? strip_tags( $new_instance['company_7'] ) : '';
		$instance['stars_7'] = ( ! empty( $new_instance['stars_7'] ) ) ? strip_tags( $new_instance['stars_7'] ) : '';

		$instance['testimonial_8'] = ( ! empty( $new_instance['testimonial_8'] ) ) ? strip_tags( $new_instance['testimonial_8'] ) : '';
		$instance['name_8'] = ( ! empty( $new_instance['name_8'] ) ) ? strip_tags( $new_instance['name_8'] ) : '';
		$instance['name_link_8'] = ( ! empty( $new_instance['name_link_8'] ) ) ? strip_tags( $new_instance['name_link_8'] ) : '';
		$instance['company_8'] = ( ! empty( $new_instance['company_8'] ) ) ? strip_tags( $new_instance['company_8'] ) : '';
		$instance['stars_8'] = ( ! empty( $new_instance['stars_8'] ) ) ? strip_tags( $new_instance['stars_8'] ) : '';

		$instance['testimonial_9'] = ( ! empty( $new_instance['testimonial_9'] ) ) ? strip_tags( $new_instance['testimonial_9'] ) : '';
		$instance['name_9'] = ( ! empty( $new_instance['name_9'] ) ) ? strip_tags( $new_instance['name_9'] ) : '';
		$instance['name_link_9'] = ( ! empty( $new_instance['name_link_9'] ) ) ? strip_tags( $new_instance['name_link_9'] ) : '';
		$instance['company_9'] = ( ! empty( $new_instance['company_9'] ) ) ? strip_tags( $new_instance['company_9'] ) : '';
		$instance['stars_9'] = ( ! empty( $new_instance['stars_9'] ) ) ? strip_tags( $new_instance['stars_9'] ) : '';

		$instance['testimonial_10'] = ( ! empty( $new_instance['testimonial_10'] ) ) ? strip_tags( $new_instance['testimonial_10'] ) : '';
		$instance['name_10'] = ( ! empty( $new_instance['name_10'] ) ) ? strip_tags( $new_instance['name_10'] ) : '';
		$instance['name_link_10'] = ( ! empty( $new_instance['name_link_10'] ) ) ? strip_tags( $new_instance['name_link_10'] ) : '';
		$instance['company_10'] = ( ! empty( $new_instance['company_10'] ) ) ? strip_tags( $new_instance['company_10'] ) : '';
		$instance['stars_10'] = ( ! empty( $new_instance['stars_10'] ) ) ? strip_tags( $new_instance['stars_10'] ) : '';

		$instance['testimonial_11'] = ( ! empty( $new_instance['testimonial_11'] ) ) ? strip_tags( $new_instance['testimonial_11'] ) : '';
		$instance['name_11'] = ( ! empty( $new_instance['name_11'] ) ) ? strip_tags( $new_instance['name_11'] ) : '';
		$instance['name_link_11'] = ( ! empty( $new_instance['name_link_11'] ) ) ? strip_tags( $new_instance['name_link_11'] ) : '';
		$instance['company_11'] = ( ! empty( $new_instance['company_11'] ) ) ? strip_tags( $new_instance['company_11'] ) : '';
		$instance['stars_11'] = ( ! empty( $new_instance['stars_11'] ) ) ? strip_tags( $new_instance['stars_11'] ) : '';

		$instance['testimonial_12'] = ( ! empty( $new_instance['testimonial_12'] ) ) ? strip_tags( $new_instance['testimonial_12'] ) : '';
		$instance['name_12'] = ( ! empty( $new_instance['name_12'] ) ) ? strip_tags( $new_instance['name_12'] ) : '';
		$instance['name_link_12'] = ( ! empty( $new_instance['name_link_12'] ) ) ? strip_tags( $new_instance['name_link_12'] ) : '';
		$instance['company_12'] = ( ! empty( $new_instance['company_12'] ) ) ? strip_tags( $new_instance['company_12'] ) : '';
		$instance['stars_12'] = ( ! empty( $new_instance['stars_12'] ) ) ? strip_tags( $new_instance['stars_12'] ) : '';

		$instance['testimonial_13'] = ( ! empty( $new_instance['testimonial_13'] ) ) ? strip_tags( $new_instance['testimonial_13'] ) : '';
		$instance['name_13'] = ( ! empty( $new_instance['name_13'] ) ) ? strip_tags( $new_instance['name_13'] ) : '';
		$instance['name_link_13'] = ( ! empty( $new_instance['name_link_13'] ) ) ? strip_tags( $new_instance['name_link_13'] ) : '';
		$instance['company_13'] = ( ! empty( $new_instance['company_13'] ) ) ? strip_tags( $new_instance['company_13'] ) : '';
		$instance['stars_13'] = ( ! empty( $new_instance['stars_13'] ) ) ? strip_tags( $new_instance['stars_13'] ) : '';

		$instance['testimonial_14'] = ( ! empty( $new_instance['testimonial_14'] ) ) ? strip_tags( $new_instance['testimonial_14'] ) : '';
		$instance['name_14'] = ( ! empty( $new_instance['name_14'] ) ) ? strip_tags( $new_instance['name_14'] ) : '';
		$instance['name_link_14'] = ( ! empty( $new_instance['name_link_14'] ) ) ? strip_tags( $new_instance['name_link_14'] ) : '';
		$instance['company_14'] = ( ! empty( $new_instance['company_14'] ) ) ? strip_tags( $new_instance['company_14'] ) : '';
		$instance['stars_14'] = ( ! empty( $new_instance['stars_14'] ) ) ? strip_tags( $new_instance['stars_14'] ) : '';

		$instance['testimonial_15'] = ( ! empty( $new_instance['testimonial_15'] ) ) ? strip_tags( $new_instance['testimonial_15'] ) : '';
		$instance['name_15'] = ( ! empty( $new_instance['name_15'] ) ) ? strip_tags( $new_instance['name_15'] ) : '';
		$instance['name_link_15'] = ( ! empty( $new_instance['name_link_15'] ) ) ? strip_tags( $new_instance['name_link_15'] ) : '';
		$instance['company_15'] = ( ! empty( $new_instance['company_15'] ) ) ? strip_tags( $new_instance['company_15'] ) : '';
		$instance['stars_15'] = ( ! empty( $new_instance['stars_15'] ) ) ? strip_tags( $new_instance['stars_15'] ) : '';

		$instance['testimonial_16'] = ( ! empty( $new_instance['testimonial_16'] ) ) ? strip_tags( $new_instance['testimonial_16'] ) : '';
		$instance['name_16'] = ( ! empty( $new_instance['name_16'] ) ) ? strip_tags( $new_instance['name_16'] ) : '';
		$instance['name_link_16'] = ( ! empty( $new_instance['name_link_16'] ) ) ? strip_tags( $new_instance['name_link_16'] ) : '';
		$instance['company_16'] = ( ! empty( $new_instance['company_16'] ) ) ? strip_tags( $new_instance['company_16'] ) : '';
		$instance['stars_16'] = ( ! empty( $new_instance['stars_16'] ) ) ? strip_tags( $new_instance['stars_16'] ) : '';

		$instance['testimonial_17'] = ( ! empty( $new_instance['testimonial_17'] ) ) ? strip_tags( $new_instance['testimonial_17'] ) : '';
		$instance['name_17'] = ( ! empty( $new_instance['name_17'] ) ) ? strip_tags( $new_instance['name_17'] ) : '';
		$instance['name_link_17'] = ( ! empty( $new_instance['name_link_17'] ) ) ? strip_tags( $new_instance['name_link_17'] ) : '';
		$instance['company_17'] = ( ! empty( $new_instance['company_17'] ) ) ? strip_tags( $new_instance['company_17'] ) : '';
		$instance['stars_17'] = ( ! empty( $new_instance['stars_17'] ) ) ? strip_tags( $new_instance['stars_17'] ) : '';

		$instance['testimonial_18'] = ( ! empty( $new_instance['testimonial_18'] ) ) ? strip_tags( $new_instance['testimonial_18'] ) : '';
		$instance['name_18'] = ( ! empty( $new_instance['name_18'] ) ) ? strip_tags( $new_instance['name_18'] ) : '';
		$instance['name_link_18'] = ( ! empty( $new_instance['name_link_18'] ) ) ? strip_tags( $new_instance['name_link_18'] ) : '';
		$instance['company_18'] = ( ! empty( $new_instance['company_18'] ) ) ? strip_tags( $new_instance['company_18'] ) : '';
		$instance['stars_18'] = ( ! empty( $new_instance['stars_18'] ) ) ? strip_tags( $new_instance['stars_18'] ) : '';

		$instance['testimonial_19'] = ( ! empty( $new_instance['testimonial_19'] ) ) ? strip_tags( $new_instance['testimonial_19'] ) : '';
		$instance['name_19'] = ( ! empty( $new_instance['name_19'] ) ) ? strip_tags( $new_instance['name_19'] ) : '';
		$instance['name_link_19'] = ( ! empty( $new_instance['name_link_19'] ) ) ? strip_tags( $new_instance['name_link_19'] ) : '';
		$instance['company_19'] = ( ! empty( $new_instance['company_19'] ) ) ? strip_tags( $new_instance['company_19'] ) : '';
		$instance['stars_19'] = ( ! empty( $new_instance['stars_19'] ) ) ? strip_tags( $new_instance['stars_19'] ) : '';

		$instance['testimonial_20'] = ( ! empty( $new_instance['testimonial_20'] ) ) ? strip_tags( $new_instance['testimonial_20'] ) : '';
		$instance['name_20'] = ( ! empty( $new_instance['name_20'] ) ) ? strip_tags( $new_instance['name_20'] ) : '';
		$instance['name_link_20'] = ( ! empty( $new_instance['name_link_20'] ) ) ? strip_tags( $new_instance['name_link_20'] ) : '';
		$instance['company_20'] = ( ! empty( $new_instance['company_20'] ) ) ? strip_tags( $new_instance['company_20'] ) : '';
		$instance['stars_20'] = ( ! empty( $new_instance['stars_20'] ) ) ? strip_tags( $new_instance['stars_20'] ) : '';

		return $instance;
	}
}

// Load the required styles and scripts
function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'fontawesome', $plugin_url . 'font-awesome-4.5.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'itesmastercss', $plugin_url . 'styles/master.css' );
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

function wpse_load_plugin_js() {
	$plugin_url = plugin_dir_url( __FILE__ );

	wp_enqueue_script( 'jquery-core' );
    wp_enqueue_script( 'itesmasterjs', $plugin_url . 'scripts/master.js' );
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_js' );

// Class artestimonials_widget ends here
// Register and load the widget
function artestimonials_load_widget() {
    register_widget( 'artestimonials_widget' );
}
add_action( 'widgets_init', 'artestimonials_load_widget' );

?>
