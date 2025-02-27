<?php
class DV_dateShortCode
{
    public function initialize()
    {

        add_shortcode( 'dv-jdate', array($this,'jdate_shortcode'));

    }


    public function jdate_shortcode($attr)
    {
		$array = shortcode_atts( array(
			'format' => sprintf('%s %s', get_option('date_format'), get_option('time_format')),
		), $attr );

		$format = $array['format'];
		
		$output = '';
		
		if ( function_exists('jdate') ) {
			$output =  jdate( $format );
		} elseif ( function_exists('parsidate') ) {
			
			if ( !empty(get_option('gmt_offset')) && is_float(get_option('gmt_offset')) ) {
				$offst = get_option('gmt_offset')*3600;
			} else {
				$offst = 0;
			}
			
			$output =  parsidate( $format, time()+ $offst);
		} else {
			$output =  date( $format);
		}

		return sprintf( '<span class="dv-dadevarzan-date">%s</span>', esc_html($output) );

    }
}
