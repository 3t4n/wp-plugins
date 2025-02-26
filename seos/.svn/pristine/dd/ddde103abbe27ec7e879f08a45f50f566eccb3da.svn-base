<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function seos_sticky_shortcode_function_1 () { ?>
	<?php if(get_option('seos_sticky_1')) { ?>
		<div class="front-sticky front-sticky1">
			<?php if( get_option('seos_sticky_url_1')) { ?><a href="<?php echo esc_url(get_option('seos_sticky_url_1')); ?>"><?php } ?>
				<div class="front-con">
					<pre><?php echo esc_html(get_option('seos_sticky_1'));?></pre>
				</div>
			<?php if( get_option('seos_sticky_url_1')) { ?></a><?php } ?>
		</div>
	<?php
	}
}



function seos_sticky_shortcode_1() {
	ob_start();
	seos_sticky_shortcode_function_1();
	return ob_get_clean();
}

add_shortcode( 'seos_sticky_1', 'seos_sticky_shortcode_1' );

