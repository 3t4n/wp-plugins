<?php

namespace eSimNinja;

defined( 'ABSPATH' ) || exit;

class ESimNinjaShortcode {

	/**
	 * ESimNinjaShortcode constructor.
	 */
	public function __construct() {
		// Add Shortcode
		add_shortcode( 'esimninja-widget', array( $this, 'esim_ninja_callback' ) );
	}

	/**
	 * eSIM.Ninja shortcode
	 *
	 * @return string
	 */
	public function esim_ninja_callback() {
		$esim_ninja_options = get_option( 'esim_ninja_settings' );
		$partner_id         = isset( $esim_ninja_options['esim_ninja_partner_id'] ) && ! empty( $esim_ninja_options['esim_ninja_partner_id'] ) ? $esim_ninja_options['esim_ninja_partner_id'] : '1000';
		$link_text          = __( 'Compare all eSIM travel mobile data plans on eSIM.Ninja.', 'esim-ninja-affiliates-widget' );
		$locale             = get_locale();
		if ( 'ru_RU' === $locale ) {
			$language = 'ru';
		} else {
			$language = 'en';
		}
		$link_url = 'https://esim.ninja/';
		if ( 'ru_RU' === $locale ) {
			$link_url .= 'ru/';
		}
		$link_url .= '?partnerId=' . $partner_id;

		return "
			<!-- eSIM Ninja Widget -->
			<script>
			  (function(w,d,t,r){
			    var esn = w.esn = function(){
			      esn.callMethod ? esn.callMethod.apply(esn, arguments) : esn.queue.push(arguments)
			    };
			    esn.push = esn;
			    esn.queue = [];
			    var n,i;
			    n = d.createElement(t);
			    n.src=r;
			    n.async=1;
			    n.type='text/javascript';
			    i = d.getElementsByTagName(t)[0];
			    i.parentNode.insertBefore(n,i)
			  })(window,document,\"script\",\"https://cdn.esim.ninja/e.js\");
			  //esn(command, containerId, options)
			  const options = {
				partnerId: '{$partner_id}',
			    size: 5,
			    days: 14,
			    items: 5,
			    language: '{$language}',
			    filters: true
			  }
			  esn('init', 'esn-widget', options);
			</script>
			<!-- End eSIM Ninja Widget -->
			<div id=\"esn-widget\" style=\"position: relative; z-index:1\"></div>
			<p><a href='{$link_url}' target='_blank'>{$link_text}</a></p>
		";
	}
}

new ESimNinjaShortcode();