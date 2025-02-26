<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Base;


class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $dropdowns = array();

	public function __construct()
	{
		$this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
		$this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
		$this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/cf7-submit-animations.php';
		$this->dropdowns = array(
			'enable' => array(
				'title' => __('Enable Effects?', 'cf7-submit-animations'),
				'callback_function' => 'checkboxField'
			),
			'type' => array(
				'title' => __('Choose the Type', 'cf7-submit-animations'),
				'callback_function' => 'dropdownField',

				'options' => array(
					'circle' => __('Circle', 'cf7-submit-animations'),
					'rectangle' => __('Rectangle', 'cf7-submit-animations'),
					'triangle' => __('Triangle', 'cf7-submit-animations')
				)
			),
			'style' => array(
				'title' => __('Choose the Style', 'cf7-submit-animations'),
				'callback_function' => 'dropdownField',

				'options' => array(
					'fill' => __('Fill', 'cf7-submit-animations'),
					'stroke' => __('Stroke', 'cf7-submit-animations')

				)
			),
			'direction' => array(
				'title' => __('Choose the Direction', 'cf7-submit-animations'),
				'callback_function' => 'dropdownField',

				'options' => array(
					'left' => __('Left', 'cf7-submit-animations'),
					'right' => __('Right', 'cf7-submit-animations'),
					'top' => __('Top', 'cf7-submit-animations'),
					'bottom' => __('Bottom', 'cf7-submit-animations')

				)
			),
			'oscillationCoefficient' => array(
				'title' => __('Enter the Velocity of Particles', 'cf7-submit-animations'),
				'callback_function' => 'inputField',
				'placeholder' => __('10-100', 'cf7-submit-animations')
			),
			'duration' => array(
				'title' => __('Enter the Duration', 'cf7-submit-animations'),
				'callback_function' => 'inputField',
				'placeholder' => __('Duration in ms', 'cf7-submit-animations')
			),
			'size' => array(
				'title' => __('Enter the Size', 'cf7-submit-animations'),
				'callback_function' => 'inputField',
				'placeholder' => __('Between 1 - 20', 'cf7-submit-animations')
			),
			'color' => array(
				'title' => __('Choose a Color', 'cf7-submit-animations'),
				'callback_function' => 'colorField'
			)
		);
	}
}
