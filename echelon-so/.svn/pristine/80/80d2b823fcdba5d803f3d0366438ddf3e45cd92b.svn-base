<?php

/*
Widget Name: E: Twitter Feed
Description: Display your recent tweets.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/twitter-feed/
*/

class EchelonSOEsoTwitterFeed extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-twitter-feed',
			__('E: Twitter Feed', 'echelon-so'),
			array(
				'description' => __('Display your recent tweets.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/twitter-feed/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Name
	*/

	function get_template_name($instance) {
		$allowed_templates = array('default', 'slider');
		if ( in_array($instance['twitter_feed']['template'], $allowed_templates) ) {
			return $instance['twitter_feed']['template'];
		} else {
			return 'default';
		}
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		$return['int_id'] = 'tf_' . uniqid(rand(1,9999));
		$return['username'] = !empty( $instance['twitter_feed']['username'] ) ? $instance['twitter_feed']['username'] : '';
		$return['max_tweets'] = absint($instance['twitter_feed']['max_tweets']);
		$return['logo'] = empty($instance['appearance']['logo']) ? 'uk-hidden' : '';
		$return['posted'] = empty($instance['appearance']['posted']) ? 'uk-hidden' : '';

		if ( isset($instance['appearance']) ) {
			$return['wrap_class'][] = 'eso';
			(empty($instance['appearance']['inner_padding'])) ?: $return['wrap_class'][] = $instance['appearance']['inner_padding'];
			(empty($instance['appearance']['font_size'])) ?: $return['wrap_class'][] = $instance['appearance']['font_size'];
			$return['username_class'][] = 'eso';
			(empty($instance['appearance']['font_size'])) ?: $return['username_class'][] = $instance['appearance']['font_size'];
		}

		if ( isset($instance['slider_settings']) ) {
			$return['slider_autoplay'] = $instance['slider_settings']['slider_autoplay'];
			$return['slider_autoplay_interval'] = $instance['slider_settings']['slider_autoplay_interval'];
		}

		if ( isset($instance['dotnav_appearance']) ) {
			$return['dotnav_class'][] = 'eso';
			(empty($instance['dotnav_appearance']['margin_top'])) ?: $return['dotnav_class'][] = $instance['dotnav_appearance']['margin_top'];
		}

		if ( !empty( $instance['twitter_feed']['image'] ) ) {
			$attachment = wp_get_attachment_image_src( $instance['twitter_feed']['image'], 'thumbnail' );
			if ( !empty( $attachment ) ) {
				$return['image_url'] = sow_esc_url($attachment[0]);
			}
		}

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		if ( isset($instance['appearance']) ) {
			$return['inner_border'] = !empty( $instance['appearance']['inner_border'] ) ? $instance['appearance']['inner_border'] : false;
			$return['text_color'] = !empty( $instance['appearance']['text_color'] ) ? $instance['appearance']['text_color'] : false;
			$return['link_color'] = !empty( $instance['appearance']['link_color'] ) ? $instance['appearance']['link_color'] : false;
			$return['posted_color'] = !empty( $instance['appearance']['posted_color'] ) ? $instance['appearance']['posted_color'] : false;
		}

		if ( isset($instance['slidenav_appearance']) ) {
			$return['arrow_color'] = !empty( $instance['slidenav_appearance']['arrow_color'] ) ? $instance['slidenav_appearance']['arrow_color'] : false;
			$return['arrow_hover_color'] = !empty( $instance['slidenav_appearance']['arrow_hover_color'] ) ? $instance['slidenav_appearance']['arrow_hover_color'] : false;
			$return['arrow_active_color'] = !empty( $instance['slidenav_appearance']['arrow_active_color'] ) ? $instance['slidenav_appearance']['arrow_active_color'] : false;

		}

		if ( isset($instance['dotnav_appearance']) ) {
			$return['dotnav_border'] = !empty( $instance['dotnav_appearance']['border'] ) ? $instance['dotnav_appearance']['border'] : false;
			$return['dotnav_active_background'] = !empty( $instance['dotnav_appearance']['active_background'] ) ? $instance['dotnav_appearance']['active_background'] : false;
			$return['dotnav_hover_background'] = !empty( $instance['dotnav_appearance']['hover_background'] ) ? $instance['dotnav_appearance']['hover_background'] : false;
			$return['dotnav_background'] = !empty( $instance['dotnav_appearance']['background'] ) ? $instance['dotnav_appearance']['background'] : false;
			$return['dotnav_onclick_background'] = !empty( $instance['dotnav_appearance']['onclick_background'] ) ? $instance['dotnav_appearance']['onclick_background'] : false;
			$return['dotnav_size'] = !empty( $instance['dotnav_appearance']['size'] ) ? $instance['dotnav_appearance']['size'] : false;

		}

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['twitter_feed'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', '', 'default', array(
				'default' 			=> __('List', 'echelon-so'),
				'slider' 			=> __('Slider', 'echelon-so'),
				'slider_vertical' 	=> __('Slider Vertical' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
			), array(

			), array(
				'callback' => 'select',
				'args' => array('template')
			)),
			'username' 		=> EsoWidgetFormCorePart::text('Username', 'The Twiiter username without the @.', 'wptavern'),
			'max_tweets' 	=> EsoWidgetFormCorePart::number('Max Tweets', 'The number of tweets to use.', 3),
			'image' 		=> EsoWidgetFormCorePart::media('Profile Image', 'Choose a image to show as the profile picture.', 'Choose Image', 'Update Image', 'image', false, array(
				'template[slider]' => array('show'),
				'template[slider_vertical]' => array('show'),
				'_else[template]' => array('hide')
			)),
		));

		$return['appearance'] = EsoWidgetFormCorePart::section('Appearance', array(
			'posted' 		=> EsoWidgetFormPart::binary('Posted Date Visibility', 'Show or hide the tweet date.', '1', 'Show', 'Hide'),
			'text_color'	=> EsoWidgetFormCorePart::color('Text Color', 'The color to use for the tweet text.'),
			'link_color' 	=> EsoWidgetFormCorePart::color('Link Color', 'The color to use for the tweet links.'),
			'posted_color' 	=> EsoWidgetFormCorePart::color('Posted Color', 'The color to use for the tweet posted date.'),
			'inner_border' 	=> EsoWidgetFormCorePart::color('Inner Border Color', 'The color to use for the inner border.', '', array(
				'template[default]' => array('show'),
				'_else[template]' => array('hide')
			)),
			'inner_padding' => EsoWidgetFormPart::uikit('padding', 'Inner Padding'),
			'font_size' 	=> EsoWidgetFormPart::uikit('font_size')
		));

		$return['slider_settings'] = EsoWidgetFormCorePart::section('Slider Settings', array(
			'slider_autoplay'			=> EsoWidgetFormPart::true_false('Autoplay', 'Autoplay the slider.', 'false', 'Yes', 'No', array(), array(
				'callback' => 'select',
				'args' => array('slider_autoplay')
			)),
			'slider_autoplay_interval'		=> EsoWidgetFormCorePart::slider('Autoplay Interval', 'Time between slide changes in seconds.', 3, 1, 5, true, array(
				'slider_autoplay[true]' => array('show'),
				'_else[slider_autoplay]' => array('hide')
			))
		), array(
			'template[slider]' => array('show'),
			'template[slider_vertical]' => array('show'),
			'_else[template]' => array('hide')
		));

		$return['slidenav_appearance'] = EsoWidgetFormCorePart::section('Slider Nav Appearance', array(
			'arrow_color'			=> EsoWidgetFormCorePart::color('Arrow Color', 'The default arrow color.'),
			'arrow_hover_color'		=> EsoWidgetFormCorePart::color('Arrow Hover Color', 'The color to use when arrows are hovered.'),
			'arrow_active_color'	=> EsoWidgetFormCorePart::color('Arrow Active Color', 'The color to use when arrwos are clicked.'),
		), array(
			'template[slider]' => array('show'),
			'_else[template]' => array('hide')
		));

		$return['dotnav_appearance'] = EsoWidgetFormCorePart::section('Slider Dot Nav Appearance', array(
			'border' 				=> EsoWidgetFormPart::rgba('Border', 'The color for the dot borders.', '#a1a1a1'),
			'active_background' 	=> EsoWidgetFormPart::rgba('Active Background', 'The background for the active dot.', '#a1a1a1'),
			'hover_background' 		=> EsoWidgetFormPart::rgba('Hover Background', 'The background for hover and focus.', '#a1a1a1'),
			'background' 			=> EsoWidgetFormPart::rgba('Background', 'The default background color.', 'rgba(255,255,255,0)'),
			'onclick_background'	=> EsoWidgetFormPart::rgba('Onclick Background', 'The background when clicked.', '#e0e0e0'),
			'size'					=> EsoWidgetFormCorePart::measurement('Size', 'The size of the dots.', '10px'),
			'margin_top'			=> EsoWidgetFormPart::uikit('margin_top', '', '', 'uk-margin-small-top'),
		), array(
			'template[slider_vertical]' => array('show'),
			'_else[template]' => array('hide')
		));

		return $return;
	}

	/*
	* Scripts
	*/

	function initialize(){
		add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
	}

	function enqueue_widget_scripts($instance) {
		$js = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-fetcher/18.0.2/js/twitterFetcher_min.js';
		wp_enqueue_script('echelonso_twitter_feed_cdn_js', $js, array('jquery'), '18.0.2', false);
	}

}

siteorigin_widget_register('echelonso-eso-twitter-feed', __FILE__, 'EchelonSOEsoTwitterFeed');
