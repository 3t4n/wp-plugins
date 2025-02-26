<?php

global $wc_atcbm_button_dates_from, $wc_atcbm_button_dates_to;

if ($wc_atcbm_button_dates_from) : ?>

	<div class="atcbm-time" id="countdown"><?php echo apply_filters('atcbm_time_text', __( 'Available in:', 'wc-atcbm' )); ?>
		<div class="atcbm-time-countdown" data-time="<?php echo strtotime($wc_atcbm_button_dates_from)  -  (get_option( 'gmt_offset' )*3600) ?>" data-format="<?php echo get_option( 'wc-atcbm_countdown_format' , 'yowdHMS' ) ?>"></div>
	</div>

<?php elseif ($wc_atcbm_button_dates_to) : ?>

	<div class="atcbm-time" id="countdown"><?php echo apply_filters('atcbm_time_text', __( 'Available till:', 'wc-atcbm' )); ?>
		<div class="atcbm-time-countdown" data-time="<?php echo strtotime($wc_atcbm_button_dates_to)  -  (get_option( 'gmt_offset' )*3600) ?>" data-format="<?php echo get_option( 'wc-atcbm_countdown_format' , 'yowdHMS' ) ?>"></div>
	</div>

<?php endif;
