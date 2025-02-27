<?php
/**
 * GDPR related functions.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!function_exists('cre_is_gdpr_enabled')) {
	/**
	 * Check if GDPR is enabled
	 *
	 * @return bool
	 */
	function cre_is_gdpr_enabled()
	{

		if (intval(get_option('cre_gdpr', '0'))) {
			return true;
		}

		return false;
	}
}

if (!function_exists('cre_gdpr_agreement')) {
	/**
	 * Render GDPR Agreement markup
	 *
	 * @param array $args
	 */
	function cre_gdpr_agreement($args = array())
	{

		if (cre_is_gdpr_enabled()) {

			$defaults = array(
				'id'              => 'cre-gdpr-checkbox',
				'container'       => 'div',
				'container_class' => 'cre-gdpr-agreement',
				'title_class'     => 'cre-gdpr-label'
			);

			$args       = wp_parse_args($args, $defaults);
			$html       = '';
			$gdpr_label = esc_html__('GDPR Agreement', 'crucial-real-estate');
			$validation = esc_html__('* Please accept GDPR agreement', 'crucial-real-estate');
			$gdpr_text  = esc_html__('I consent to having this website store my submitted information so they can respond to my inquiry.', 'crucial-real-estate');

			if (!empty($gdpr_label)) {
				$html .= '<span class="' . esc_attr($args['title_class']) . '">' . esc_html($gdpr_label) . ' <span class="required-label">*</span></span>';
			}

			if (!empty($gdpr_text)) {
				$html .= '<input type="checkbox" name="gdpr" id="' . esc_attr($args['id']) . '" class="required" value="' . esc_attr($gdpr_text) . '" title="' . esc_attr($validation) . '">';
				$html .= '<label for="' . esc_attr($args['id']) . '">' . wp_kses($gdpr_text, array(
					'a'      => array(
						'class'  => array(),
						'href'   => array(),
						'target' => array(),
						'title'  => array()
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
				)) . '</label>';
			}

			printf('<%1$s class="%2$s clearfix">%3$s</%1$s>', esc_html($args['container']), esc_attr($args['container_class']), $html);
		}
	}
}
