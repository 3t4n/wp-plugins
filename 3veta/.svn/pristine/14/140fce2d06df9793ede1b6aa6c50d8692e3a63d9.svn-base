<?php
add_shortcode( '3veta', 'veta_shortcode' );
function veta_shortcode( $attributes ) {
	$attributes = shortcode_atts( array(
		'type'   => '',
		'width'  => '1200px',
		'height' => '800px',
	), $attributes, '3veta' );

	$domain_name = get_option( '3veta_booking_page' );

	if ( ! $domain_name ) {
		return '';
	}

	if ( $attributes['type'] === 'full' ) {
		$div    = '<div class="iframe-3veta-full-page"></div>';
		$js     = "<script>
					const iframe3veta = document.createElement('iframe');
			        iframe3veta.classList.add('veta-iframe-full');
					iframe3veta.onload = function() {
                        document.querySelector('.veta-page-loader-mask').remove();
			        };
					iframe3veta.src = '" . esc_url( $domain_name ) . "';
					document.querySelector('.iframe-3veta-full-page').appendChild(iframe3veta);
				</script>";
		$iframe = $div . $js;
		$style  = '<style>
                    .veta-iframe-full{
                       position:fixed;
                       top:0;
                       left:0;
                       bottom:0;
                       right:0;
                       width:100%;
                       height:100%;
                       border:none;
                       margin:0;
                       padding:0;
                       overflow:hidden;
                       z-index:999999;
                     }
                    </style>';
	} else {
		$iframe = '<iframe src="' . $domain_name . '" class="veta-iframe-inline"></iframe>';
		$style  = '<style>
					.veta-iframe-inline {
					  display: block;
					  width:' . $attributes['width'] . ';
					  height:' . $attributes['height'] . ';
					  margin: 0 auto;
					}
				  </style>';
	}

	return $iframe . $style;
}
