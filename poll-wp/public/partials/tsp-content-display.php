<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * This file include main and footer section of poll.
 *
 * @link       TS Poll
 * @since      1.7.0
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/public/partials
 */


if ( isset( $tspoll_question_styles->ts_poll_ch_s ) ) {
	if ( ! is_numeric( $tspoll_question_styles->ts_poll_ch_s ) ) {
		if ( $tspoll_question_styles->ts_poll_ch_s == 'big' ) {
			$tspoll_question_styles->ts_poll_ch_s = '32';
		} elseif ( $tspoll_question_styles->ts_poll_ch_s == 'medium 2' ) {
			$tspoll_question_styles->ts_poll_ch_s = '26';
		} elseif ( $tspoll_question_styles->ts_poll_ch_s == 'medium 1' ) {
			$tspoll_question_styles->ts_poll_ch_s = '22';
		} elseif ( $tspoll_question_styles->ts_poll_ch_s == 'small' ) {
			$tspoll_question_styles->ts_poll_ch_s = '18';
		} else {
			$tspoll_question_styles->ts_poll_ch_s == '22';
		}
	}
}


if ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standart Poll' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standard Poll' ) {
	if ( isset( $tspoll_question_styles->ts_poll_p_shpop ) ) {
		$ts_poll_old_standard = 'true';
		include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-standard.php';
	} else {
		include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-standard-wb.php';
	}
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image Poll' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video Poll' ) {
	include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-image-video.php';
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standart Without Button' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standard Without Button' ) {
	include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-standard-wb.php';
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image Without Button' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video Without Button' ) {
	include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-image-video-wb.php';
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image in Question' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video in Question' ) {
	include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-image-video-in.php';
}

