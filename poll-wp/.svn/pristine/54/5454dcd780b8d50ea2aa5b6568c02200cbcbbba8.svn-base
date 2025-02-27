<?php
/**
 *
 * This file include result section of poll(Only Standart Poll Version).
 *
 * @link       TS Poll
 * @since      1.7.0
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/public/partials
 */
?>
<style type="text/css">
	/* Header Result CSS */
	:root{
		/* Root for result header */
		--tsp_r_header_bgc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_q_bgc ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_r_header_c_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_q_c ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_r_header_fs_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_q_fs ), FILTER_VALIDATE_INT ); ?>px;
		--tsp_r_header_ff_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_q_ff ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_r_header_ta_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_q_ta ), FILTER_SANITIZE_STRING ); ?>;
		/* Root for result header line*/
		--tsp_r_header_l_w_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laq_w ), FILTER_VALIDATE_INT ); ?>%;
		--tsp_r_header_l_bh_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laq_h ), FILTER_VALIDATE_INT ); ?>px;
		--tsp_r_header_l_bs_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laq_s ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_r_header_l_bc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laq_c ), FILTER_SANITIZE_STRING ); ?>;
	}
	header.ts_poll_r_header_<?php echo esc_attr( $total_soft_poll ); ?>{
		width:100%;
		display: -ms-flexbox;display: -webkit-flex;display: flex;
		-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
		-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
		-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
		-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
		-webkit-align-items: center;-ms-flex-align: center;align-items: center;
		-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
		background-color:var(--tsp_r_header_bgc_<?php echo esc_html( $total_soft_poll ); ?>); 
		color:var(--tsp_r_header_c_<?php echo esc_html( $total_soft_poll ); ?>); 
		font-size:var(--tsp_r_header_fs_<?php echo esc_html( $total_soft_poll ); ?>);
		font-family:var(--tsp_r_header_ff_<?php echo esc_html( $total_soft_poll ); ?>);
		text-align:var(--tsp_r_header_ta_<?php echo esc_html( $total_soft_poll ); ?>);
		padding: 15px 10px 5px;
	}
	header.ts_poll_r_header_<?php echo esc_attr( $total_soft_poll ); ?> > span.ts_poll_title_<?php echo esc_attr( $total_soft_poll ); ?>{
		margin-bottom: 7px;
	}
	header.ts_poll_r_header_<?php echo esc_attr( $total_soft_poll ); ?>[data-tsp-pos="left"] > span.ts_poll_title_<?php echo esc_attr( $total_soft_poll ); ?>{
		margin-right: auto;
	}
	header.ts_poll_r_header_<?php echo esc_attr( $total_soft_poll ); ?>[data-tsp-pos="right"] > span.ts_poll_title_<?php echo esc_attr( $total_soft_poll ); ?>{
		margin-left: auto;
	}
	header.ts_poll_r_header_<?php echo esc_attr( $total_soft_poll ); ?> > div.ts_poll_line_<?php echo esc_attr( $total_soft_poll ); ?>{
		width:var(--tsp_r_header_l_w_<?php echo esc_html( $total_soft_poll ); ?>);
		border-top-width:var(--tsp_r_header_l_bh_<?php echo esc_html( $total_soft_poll ); ?>);
		border-top-style:var(--tsp_r_header_l_bs_<?php echo esc_html( $total_soft_poll ); ?>);
		border-top-color:var(--tsp_r_header_l_bc_<?php echo esc_html( $total_soft_poll ); ?>);
	}
	/* Footer Result CSS */
	:root{
		--tsp_r_footer_bgc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bb_mbgc ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_back_bgc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bb_bgc ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_back_bc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bb_bc ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_back_c_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bb_c ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_back_h_bgc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bb_hbgc ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_back_h_c_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bb_hc ), FILTER_SANITIZE_STRING ); ?>;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?> button:focus{
		outline: none !important;
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> {
		padding: 0px;
		background-color: var(--tsp_r_footer_bgc_<?php echo esc_html( $total_soft_poll ); ?>);
		position: relative;
		width: 100%;
		height: inherit !important;
		display: -ms-flexbox;display: -webkit-flex;display: flex;
		-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
		-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-pos="right"]{
		-webkit-align-items: flex-end;-ms-flex-align: end;align-items: flex-end;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-pos="left"]{
		-webkit-align-items: flex-start;-ms-flex-align: start;align-items: flex-start;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-pos="full"]{
		-webkit-align-items: center;-ms-flex-align: center;align-items: center;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-pos="right"] > .ts_poll_back_button{
		margin: 10px 10px;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-pos="left"] > .ts_poll_back_button{
		margin: 10px 10px;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-pos="full"] > .ts_poll_back_button{
		width: 98% !important;
		margin: 5px 1% !important;
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button {
		background-color: var(--tsp_back_bgc_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		border: var(--tsp_result_bw_<?php echo $total_soft_poll; ?>) solid var(--tsp_back_bc_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		border-radius: var(--tsp_result_br_<?php echo $total_soft_poll; ?>) !important;
		color: var(--tsp_back_c_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		padding: 3px 10px !important;
		text-transform: none !important;
		line-height: 1 !important;
		cursor: pointer;
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button span {
		font-size: var(--tsp_result_fs_<?php echo $total_soft_poll; ?>) !important;
		font-family: var(--tsp_result_ff_<?php echo $total_soft_poll; ?>);
		color: var(--tsp_back_c_<?php echo esc_html( $total_soft_poll ); ?>) !important;
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button span:before {
	  content:attr(data-tsp-text);
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button:hover {
		background-color: var(--tsp_back_h_bgc_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		opacity: 1 !important;
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button:hover > .ts_poll_back_icon:before,
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button:hover > .ts_poll_back_icon > span{
	  color: var(--tsp_back_h_c_<?php echo esc_html( $total_soft_poll ); ?>) !important;

	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button > .ts_poll_back_icon {
		font-size: var(--tsp_result_icon_fs_<?php echo $total_soft_poll; ?>) !important;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?> button > i {
		display: -ms-inline-flexbox;
		display: -webkit-inline-flex;
		display: inline-flex;
		-webkit-flex-direction: row;
		-ms-flex-direction: row;
		flex-direction: row;
		-webkit-flex-wrap: nowrap;
		-ms-flex-wrap: nowrap;
		flex-wrap: nowrap;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-align-content: center;
		-ms-flex-line-pack: center;
		align-content: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?> button:not([data-tsp-text=""]) > i[data-tsp="before"]:before {
		margin-right: 10px;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?> button:not([data-tsp-text=""]) > i[data-tsp="after"]{
		-webkit-flex-direction: row-reverse;
		-ms-flex-direction: row-reverse;
		flex-direction: row-reverse;
	}
	footer.ts_poll_r_footer_<?php echo esc_html( $total_soft_poll ); ?> button:not([data-tsp-text=""]) > i[data-tsp="after"]:before {
		margin-left: 10px;
	}
	footer.ts_poll_r_footer_<?php echo $total_soft_poll; ?> > .ts_poll_back_button > .ts_poll_back_icon:before{
		color: var(--tsp_back_c_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		font-family: FontAwesome;
	}
	:root{
		--tsp_r_main_bgc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_a_mbgc ), FILTER_SANITIZE_STRING ); ?>;
		/* 100% span bgc */
		--tsp_r_answer_bgc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_a_bgc ), FILTER_SANITIZE_STRING ); ?>;
		/* label color */
		--tsp_r_answer_vc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_a_vc ), FILTER_SANITIZE_STRING ); ?>;
		/* percent line color */
		--tsp_r_answer_pc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_a_c ), FILTER_SANITIZE_STRING ); ?>;
		/* Root for main result line*/
		--tsp_r_main_l_w_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laa_w ), FILTER_VALIDATE_INT ); ?>%;
		--tsp_r_main_l_h_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laa_h ), FILTER_VALIDATE_INT ); ?>px;
		--tsp_r_main_l_bc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laa_c ), FILTER_SANITIZE_STRING ); ?>;
		--tsp_r_main_l_bs_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_laa_s ), FILTER_SANITIZE_STRING ); ?>;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>{
		display: -ms-flexbox;display: -webkit-flex;display: flex;
		-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
		-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
		-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
		-webkit-align-items: center;-ms-flex-align: center;align-items: center;
		position: relative;
		background-color: var(--tsp_r_main_bgc_<?php echo $total_soft_poll; ?>);
		width:100%;
		/* padding: 0px 10px; */
		overflow-x: auto;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?> > .ts_poll_answer_result {
		position: relative;
		display: inline-block;
		width: 100%;
		padding: 0px;
		background-color: var(--tsp_r_answer_bgc_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		margin-top: 3px;
		line-height: 1 !important
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?> > .ts_poll_answer_result > .ts_poll_answer_result_label {
		display: inline-block;
		float: none;
		width: 100%;
		font-size: var(--tsp_answer_fs_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		color: var(--tsp_r_answer_vc_<?php echo esc_html( $total_soft_poll ); ?>) !important;
		position: relative;
		padding: 0px;
		line-height: 1.41 !important;
		margin-bottom: 0px !important;
		font-family:var(--tsp_answer_ff_<?php echo esc_html( $total_soft_poll ); ?>);
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-bool="true"] > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-color: var(--tsp_r_answer_pc_<?php echo esc_html( $total_soft_poll ); ?>) !important;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?> > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		position: absolute !important;
		min-width: 10px;
		height: 100%;
		left: 0;
		top: 0%;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="2"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogress 2s linear infinite;-moz-animation: TSprogress 2s linear infinite;-webkit-animation: TSprogress 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="3"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogress 2s linear infinite;-moz-animation: TSprogress 2s linear infinite;-webkit-animation: TSprogress 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="4"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogressa 2s linear infinite;-moz-animation: TSprogressa 2s linear infinite;-webkit-animation: TSprogressa 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="5"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogressa 2s linear infinite;-moz-animation: TSprogressa 2s linear infinite;-webkit-animation: TSprogressa 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="6"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogressb 2s linear infinite;-moz-animation: TSprogressb 2s linear infinite;-webkit-animation: TSprogressb 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="7"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogressb 2s linear infinite;-moz-animation: TSprogressb 2s linear infinite;-webkit-animation: TSprogressb 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="8"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogressc 2s linear infinite;-moz-animation: TSprogressc 2s linear infinite;-webkit-animation: TSprogressc 2s linear infinite;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-veff="9"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
		background-size: 30px 30px;-moz-background-size: 30px 30px;-webkit-background-size: 30px 30px;-o-background-size: 30px 30px;background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0.2)), color-stop(25%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0.2)), color-stop(75%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 0)));background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.15) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr='#33ffffff', endColorstr='#33000000', GradientType=0);animation: TSprogressc 2s linear infinite;-moz-animation: TSprogressc 2s linear infinite;-webkit-animation: TSprogressc 2s linear infinite;
	}
	@-webkit-keyframes TSprogress {0% {background-position: 0 0;}100% {background-position: -60px -60px;}}@-moz-keyframes TSprogress {0% {background-position: 0 0;}100% {background-position: -60px -60px;}}@keyframes TSprogress {0% {background-position: 0 0;}100% {background-position: -60px -60px;}}@-webkit-keyframes TSprogressa {0% {background-position: 0 0;}100% {background-position: -60px 60px;}}@-moz-keyframes TSprogressa {0% {background-position: 0 0;}100% {background-position: -60px 60px;}}@keyframes TSprogressa {0% {background-position: 0 0;}100% {background-position: -60px 60px;}}@-webkit-keyframes TSprogressb {0% {background-position: 0 0;}100% {background-position: 60px -60px;}}@-moz-keyframes TSprogressb {0% {background-position: 0 0;}100% {background-position: 60px -60px;}}@keyframes TSprogressb {0% {background-position: 0 0;}100% {background-position: 60px -60px;}}@-webkit-keyframes TSprogressc {0% {background-position: 0 0;}100% {background-position: 60px 60px;}}@-moz-keyframes TSprogressc {0% {background-position: 0 0;}100% {background-position: 60px 60px;}}@keyframes TSprogressc {0% {background-position: 0 0;}100% {background-position: 60px 60px;}}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?> > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_info_line {
		float: right;margin-right: 3px;position: inherit;z-index: 99999999999;
	}
	main.ts_poll_r_main_<?php esc_attr_e( $total_soft_poll ); ?> > div.ts_poll_after_line_<?php esc_attr_e( $total_soft_poll ); ?> {
		width: var(--tsp_r_main_l_w_<?php echo esc_html( $total_soft_poll ); ?> );
		margin-top: 15px ;
		border-top: var(--tsp_r_main_l_h_<?php echo esc_html( $total_soft_poll ); ?> ) var(--tsp_r_main_l_bs_<?php echo esc_html( $total_soft_poll ); ?>) var(--tsp_r_main_l_bc_<?php echo esc_html( $total_soft_poll ); ?>);
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?>[data-tsp-after="none"] > .ts_poll_after_line_<?php esc_attr_e( $total_soft_poll ); ?> {
		display: none;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?> > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_r_answer_title{
		margin-left: 3px; 
		position: inherit; 
		z-index: 99999999999; 
		font-size: var(--tsp_answer_fs_<?php echo esc_html( $total_soft_poll ); ?>);
		word-break: break-word;
	}
	main.ts_poll_r_main_<?php echo esc_html( $total_soft_poll ); ?> > .ts_poll_answer_result:hover > .ts_poll_answer_result_label {
		cursor:pointer;
		color: var(--tsp_answer_h_c_<?php echo esc_html( $total_soft_poll ); ?>) !important;
	}
	:root{
		/* root for result section */
		--tsp_r_section_bw_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bw ), FILTER_VALIDATE_INT ); ?>px;
		--tsp_r_section_bc_<?php echo esc_html( $total_soft_poll ); ?>:<?php echo filter_var( esc_html( $tspoll_question_styles->ts_poll_p_bc ), FILTER_SANITIZE_STRING ); ?>;
	}
	
	.ts_poll_result_popup_section_<?php echo $total_soft_poll; ?>,.ts_poll_result_popup_result_<?php echo $total_soft_poll; ?> {position: fixed;max-width: 5000px !important;left: 0;}
	.ts_poll_result_popup_section_<?php echo $total_soft_poll; ?> {width: 100% !important;height: 0%;background-color: rgba(0, 0, 0, 0.3);top: 0;z-index: 99999999999;}
	.ts_poll_result_popup_result_<?php echo $total_soft_poll; ?> {z-index: 9999999999999;width: 0%;top: 83px;}
	.ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?> {
		width: 100%;
		left: 0%;
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>:not([data-tsp-effect="FCTA"]) {
		left: 0;
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>:not([data-tsp-effect="FCTA"])[data-tsp-pos="left"] {
		left: 0;
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>:not([data-tsp-effect="FCTA"])[data-tsp-pos="right"] {
		right: 0;
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FCTA"]{
		left: 50%;
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FCTA"][data-tsp-pos="left"]{
		left: calc(50% - calc(calc(100% - var(--tsp_section_w_<?php echo $total_soft_poll; ?>)) / 2));
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FCTA"][data-tsp-pos="right"]{
		right: calc(50% - calc(calc(100% - var(--tsp_section_w_<?php echo $total_soft_poll; ?>)) / 2));
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTTB"] {
		opacity: 0;
		-webkit-transform: translateY(-12000px);
		-moz-transform: translateY(-12000px);
		-o-transform: translateY(-12000px);
		-ms-transform: translateY(-12000px);
		transform: translateY(-12000px);
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FLTR"]{
		-webkit-transform: translateX(-12000px);
		-moz-transform: translateX(-12000px);
		-o-transform: translateX(-12000px);
		-ms-transform: translateX(-12000px);
		transform: translateX(-12000px);
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FRTL"] {
		-webkit-transform: translateX(12000px);
		-moz-transform: translateX(12000px);
		-o-transform: translateX(12000px);
		-ms-transform: translateX(12000px);
		transform: translateX(12000px);
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FCTA"] {
		position: absolute;
		width: 0%;
		height: 0%;
		top: 50%;
		overflow: hidden;
		border: 0px;
		border-style: solid;
		border-color: var(--tsp_r_section_bc_<?php echo $total_soft_poll; ?>);
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTL"] {
		-ms-transform: rotateY(-90deg); /* IE 9 */
		-moz-transform: rotateY(-90deg);
		-o-transform: rotateY(-90deg);
		-webkit-transform: rotateY(-90deg); /* Safari */
		transform: rotateY(-90deg); /* Standard syntax */
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTR"] {
		-ms-transform: rotateX(-90deg); /* IE 9 */
		-moz-transform: rotateX(-90deg);
		-o-transform: rotateX(-90deg);
		-webkit-transform: rotateX(-90deg); /* Safari */
		transform: rotateX(-90deg); /* Standard syntax */
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBL"] {
		z-index: -1;
		-ms-transform: rotate(-180deg); /* IE 9 */
		-moz-transform: rotate(-180deg);
		-o-transform: rotate(-180deg);
		-webkit-transform: rotate(-180deg); /* Safari */
		transform: rotate(-180deg); /* Standard syntax */
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBR"] {
		-ms-transform: skewX(90deg); /* IE 9 */
		-moz-transform: skewX(90deg);
		-o-transform: skewX(90deg);
		-webkit-transform: skewX(90deg); /* Safari */
		transform: skewX(90deg); /* Standard syntax */
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBTT"] {
		-ms-transform: skewY(90deg);
		-moz-transform: skewY(90deg);
		-o-transform: skewY(90deg);
		-webkit-transform: skewY(90deg);
		transform: skewY(90deg);
	}
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTTB"],section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FLTR"],section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FRTL"],
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTL"],section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTR"],
	section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBL"],section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBR"],section.ts_poll_section_<?php esc_attr_e( $total_soft_poll ); ?> > .ts_poll_r_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBTT"]{
		position: absolute !important;
		width: 100%;
		height: 100%;
		top: 0%;
		overflow: hidden;
		border: var(--tsp_r_section_bw_<?php echo $total_soft_poll; ?>) solid var(--tsp_r_section_bc_<?php echo $total_soft_poll; ?>);
		border-radius: var(--tsp_section_br_<?php echo esc_html( $total_soft_poll ); ?>);
		-webkit-transition: all 0.5s ease-in-out 0.5s;
		-moz-transition: all 0.5s ease-in-out 0.5s;
		-o-transition: all 0.5s ease-in-out 0.5s;
		-ms-transition: all 0.5s ease-in-out 0.5s;
		transition: all 0.5s ease-in-out 0.5s;
		-webkit-transition-delay: 0s;
		-moz-transition-delay: 0s;
		-o-transition-delay: 0s;
		-ms-transition-delay: 0s;
		transition-delay: 0s;
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>{
		position: relative;
		margin: 4% auto 0;
		box-sizing: border-box;
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTTB"] {
		-webkit-transform: translateY(-12000px);
		-moz-transform: translateY(-12000px);
		-o-transform: translateY(-12000px);
		-ms-transform: translateY(-12000px);
		transform: translateY(-12000px);
		opacity: 0;
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FLTR"]{
		-webkit-transform: translateX(-12000px);
		-moz-transform: translateX(-12000px);
		-o-transform: translateX(-12000px);
		-ms-transform: translateX(-12000px);
		transform: translateX(-12000px);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FRTL"] {
		-webkit-transform: translateX(12000px);
		-moz-transform: translateX(12000px);
		-o-transform: translateX(12000px);
		-ms-transform: translateX(12000px);
		transform: translateX(12000px);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FCTA"] {
		/* position: absolute !important; */
		width: 0%;
		height: 0%;
		overflow: hidden;
		border: var(--tsp_r_section_bw_<?php echo $total_soft_poll; ?>) solid var(--tsp_r_section_bc_<?php echo $total_soft_poll; ?>);
		border-radius: var(--tsp_section_br_<?php echo $total_soft_poll; ?>);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTL"] {
		-ms-transform: rotateY(-90deg);
		-moz-transform: rotateY(-90deg);
		-o-transform: rotateY(-90deg);
		-webkit-transform: rotateY(-90deg);
		transform: rotateY(-90deg);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTR"] {
		-ms-transform: rotateX(-90deg);
		-moz-transform: rotateX(-90deg);
		-o-transform: rotateX(-90deg);
		-webkit-transform: rotateX(-90deg);
		transform: rotateX(-90deg);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBL"] {
		opacity: 0;
		-ms-transform: rotate(-180deg);
		-moz-transform: rotate(-180deg);
		-o-transform: rotate(-180deg);
		-webkit-transform: rotate(-180deg);
		transform: rotate(-180deg);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBR"] {
		-ms-transform: skewX(90deg);
		-moz-transform: skewX(90deg);
		-o-transform: skewX(90deg);
		-webkit-transform: skewX(90deg);
		transform: skewX(90deg);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBTT"] {
		-ms-transform: skewY(90deg);
		-moz-transform: skewY(90deg);
		-o-transform: skewY(90deg);
		-webkit-transform: skewY(90deg);
		transform: skewY(90deg);
	}
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTTB"],#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FLTR"],#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FRTL"],
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTL"],#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FTR"],
	#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBL"],#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBR"],#ts_poll_modal_result_section_<?php esc_attr_e( $total_soft_poll ); ?>[data-tsp-effect="FBTT"]{
		width: 100%;
		max-width: 750px;
		height: inherit;
		overflow: hidden;
		border: var(--tsp_r_section_bw_<?php echo $total_soft_poll; ?>) solid var(--tsp_r_section_bc_<?php echo $total_soft_poll; ?>);
		border-radius: var(--tsp_section_br_<?php echo esc_html( $total_soft_poll ); ?>);
		-webkit-transition: all 0.5s ease-in-out 0.5s;
		-moz-transition: all 0.5s ease-in-out 0.5s;
		-o-transition: all 0.5s ease-in-out 0.5s;
		-ms-transition: all 0.5s ease-in-out 0.5s;
		transition: all 0.5s ease-in-out 0.5s;
		-webkit-transition-delay: 0s;
		-moz-transition-delay: 0s;
		-o-transition-delay: 0s;
		-ms-transition-delay: 0s;
		transition-delay: 0s;
	}   
</style>
<?php
ob_start();
$TS_R_Main_Content    = '';
$TS_Poll_Colors_Array = array();
// Result Section Main
for ( $i = 0;$i < $TS_Poll_Answers_Count;$i ++ ) {
	$TS_Poll_Question_Answer_Param                              = json_decode( $t_s_poll_answers_values[ $i ]->Answer_Param );
	$TS_Poll_Colors_Array[ $t_s_poll_answers_values[ $i ]->id ] = $TS_Poll_Question_Answer_Param->TotalSoftPoll_Ans_Cl;

	$TS_R_Main_Content .= sprintf(
		"
        <div class='ts_poll_answer_result' data-tsp-id='%s' >
            <label class='ts_poll_answer_result_label'>
                <span class='ts_poll_r_answer_title'>
                    %s
                </span>
                <span class='%s'
                    data-tsp-w='%s'
                    style=''>
                </span>
                <span data-tsp-vt='%s' class='%s'>
                    %s
                </span>
            </label>
        </div>
        ",
		esc_attr( $t_s_poll_answers_values[ $i ]->id ),
		esc_html( html_entity_decode( $t_s_poll_answers_values[ $i ]->Answer_Title ) ),
		'ts_poll_answer_percent_line Total_Soft_Poll_1_Ans_Lab_Sp2_' . esc_attr( $total_soft_poll ) . '_' . esc_attr( $t_s_poll_answers_values[ $i ]->id ),
		$t_s_poll_question_settings->TotalSoft_Poll_Set_01 == 'true' ? esc_html( round( $t_s_poll_answers_values[ $i ]->Answer_Votes * 100 / $total_soft_poll_res_count, 2 ) . '%' ) : esc_attr( '100%' ),
		esc_attr( $tspoll_question_styles->ts_poll_p_a_vt ),
		'ts_poll_answer_info_line Total_Soft_Poll_1_Ans_Lab_Sp3_' . esc_attr( $total_soft_poll ) . '_' . esc_attr( $t_s_poll_answers_values[ $i ]->id ),
		$this->ts_poll_show_type(
			array(
				'tsp_show_results'   => $t_s_poll_question_settings->TotalSoft_Poll_Set_01,
				'tsp_no_result_text' => $t_s_poll_question_settings->TotalSoft_Poll_Set_05,
				'tsp_show_by'        => $tspoll_question_styles->ts_poll_p_a_vt,
				'tsp_total_votes'    => $total_soft_poll_res_count,
				'tsp_answer_votes'   => $t_s_poll_answers_values[ $i ]->Answer_Votes,
			)
		)
	);
}

// Result Section Header
echo sprintf(
	"
    <div class='%s'
         data-tsp-effect='%s' 
         data-tsp-pos='%s'
         data-tsp-bool='%s'>
        <header class='%s' data-tsp-pos='%s'>
            <span class='%s'>
                %s
            </span>
            <div class='%s'></div>
        </header>
        <main class='%s' 
              data-tsp-after='%s' 
              data-tsp-bool='%s'
              data-tsp-veff='%s'>
            %s
            <div class='%s'></div>
        </main>
    ",
	'ts_poll_r_section_' . esc_attr( $total_soft_poll ),
	esc_attr( $tspoll_question_styles->ts_poll_p_sheff ),
	esc_attr( $tspoll_question_styles->ts_poll_pos ),
	esc_attr( $tspoll_question_styles->ts_poll_a_ctf ),
	'ts_poll_r_header_' . esc_attr( $total_soft_poll ),
	esc_attr( $tspoll_question_styles->ts_poll_q_ta ),
	'ts_poll_title_' . esc_attr( $total_soft_poll ),
	html_entity_decode( esc_html( $ts_poll_question_query['Question_Title'] ) ),
	'ts_poll_line_' . esc_attr( $total_soft_poll ),
	'ts_poll_r_main_' . esc_attr( $total_soft_poll ),
	$tspoll_question_styles->ts_poll_p_laa_h == 0 ? 'none' : '',
	esc_attr( $tspoll_question_styles->ts_poll_a_ctf ),
	esc_attr( $tspoll_question_styles->ts_poll_p_a_veff ),
	$TS_R_Main_Content,
	'ts_poll_after_line_' . esc_attr( $total_soft_poll )
);

// Result Section Footer
if ( $ts_poll_endpoll_bool !== true ) {
	if ( $tspoll_question_styles->ts_poll_rb_show == 'true' || $ts_poll_edit == 'true' ) {
		echo sprintf(
			"<footer class='%s'
                 style='%s'
                 data-tsp-pos='%s'>
            <button class='%s' 
                    id='%s' 
                    name='%s' type='button' 
                    data-tsp-text='%s' 
                    >
                <i class='ts-poll ts_poll_back_icon %s Total_Soft_Poll_1_Back_But_Icon' data-tsp='%s'><span data-tsp-text='%s'></span></i>
            </button>
        </footer>",
			'ts_poll_r_footer_' . esc_attr( $total_soft_poll ),
			$tspoll_question_styles->ts_poll_rb_show != 'true' ? esc_attr( 'display:none;' ) : '',
			esc_attr( $tspoll_question_styles->ts_poll_p_bb_pos ),
			'ts_poll_back_button Total_Soft_Poll_1_But_Back_' . esc_attr( $total_soft_poll ),
			'ts_poll_back_button_' . esc_attr( $total_soft_poll ),
			'ts_poll_back_button_' . esc_attr( $total_soft_poll ),
			esc_html( html_entity_decode( $tspoll_question_styles->ts_poll_p_bb_text ) ),
			esc_attr( $tspoll_question_styles->ts_poll_p_bb_it ),
			esc_attr( $tspoll_question_styles->ts_poll_p_bb_ia ),
			esc_html( html_entity_decode( $tspoll_question_styles->ts_poll_p_bb_text ) )
		);
	}
}


echo '</div>';
$tsp_result_section_inner = ob_get_clean();
echo $tsp_result_section_inner;

if ( $ts_poll_edit == 'true' ) {
	echo sprintf(
		'
    <script>
        jQuery(document).on("click", "button#ts_poll_result_button_%1$s", function() {
          if (jQuery("input#ts_poll_p_shpop").is(":checked")) {
            jQuery(".ts_poll_result_popup_result_%1$s").css("display","");
            switch (jQuery("select#ts_poll_p_sheff").val()) {
              case "FTTB":
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "translateY(0px)",
                  "-ms-transform": "translateY(0px)",
                  "-o-transform": "translateY(0px)",
                  "-moz-transform": "translateY(0px)",
                  "-webkit-transform": "translateY(0px)",
                  "opacity": "1",
                  "max-height": "440px"
                });
                break;
              case "FLTR":
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "translateX(0px)",
                  "-ms-transform": "translateX(0px)",
                  "-o-transform": "translateX(0px)",
                  "-moz-transform": "translateX(0px)",
                  "-webkit-transform": "translateX(0px)"
                });
                break;
              case "FRTL":
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "translateX(0px)",
                  "-ms-transform": "translateX(0px)",
                  "-o-transform": "translateX(0px)",
                  "-moz-transform": "translateX(0px)",
                  "-webkit-transform": "translateX(0px)"
                });
                break;
              case "FCTA":
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                jQuery("#ts_poll_modal_result_section_%1$s").animate({
                  "maxWidth": "750px",
                  "width": "100%%",
                  "height": "100%%",
                }, 500);
                jQuery("#ts_poll_modal_result_section_%1$s").css("position", "relative");
                break;
              case "FTL":
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "rotateY(0deg)",
                  "-ms-transform": "rotateY(0deg)",
                  "-o-transform": "rotateY(0deg)",
                  "-moz-transform": "rotateY(0deg)",
                  "-webkit-transform": "rotateY(0deg)"
                }); 
                break;
              case "FTR":
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "rotateX(0deg)",
                  "-ms-transform": "rotateX(0deg)",
                  "-o-transform": "rotateX(0deg)",
                  "-moz-transform": "rotateX(0deg)",
                  "-webkit-transform": "rotateX(0deg)"
                });
                break; 
              case "FBL":
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                    "transform": "rotate(0deg)",
                    "-ms-transform": "rotate(0deg)",
                    "-o-transform": "rotate(0deg)",
                    "-moz-transform": "rotate(0deg)",
                    "-webkit-transform": "rotate(0deg)",
                    "opacity": "1"
                  });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                break;
              case "FBR":
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                    "transform": "skewX(0deg)",
                    "-ms-transform": "skewX(0deg)",
                    "-o-transform": "skewX(0deg)",
                    "-moz-transform": "skewX(0deg)",
                    "-webkit-transform": "skewX(0deg)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                break;
              case "FBTT":
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "skewY(0deg)",
                  "-ms-transform": "skewY(0deg)",
                  "-o-transform": "skewY(0deg)",
                  "-moz-transform": "skewY(0deg)",
                  "-webkit-transform": "skewY(0deg)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                break; 
            }
          }else {
            switch (jQuery("select#ts_poll_p_sheff").val()) {
              case "FTTB":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "translateY(0px)",
                          "-ms-transform": "translateY(0px)",
                          "-o-transform": "translateY(0px)",
                          "-moz-transform": "translateY(0px)",
                          "-webkit-transform": "translateY(0px)",
                          "opacity": "1"
                      });
                  break;
              case "FLTR":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "translateX(0px)",
                          "-ms-transform": "translateX(0px)",
                          "-o-transform": "translateX(0px)",
                          "-moz-transform": "translateX(0px)",
                          "-webkit-transform": "translateX(0px)"
                      });
                  break;
              case "FRTL":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "translateX(0px)",
                          "-ms-transform": "translateX(0px)",
                          "-o-transform": "translateX(0px)",
                          "-moz-transform": "translateX(0px)",
                          "-webkit-transform": "translateX(0px)"
                      });
                  break;
              case "FCTA":
                  if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="left") {
                          jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                              "width": "100%%",
                              "left": "0%%",
                              "height": "100%%",
                              "top": "0%%",
                          }, 500);
                    }
                    else if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="right") {
                          jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                              "width": "100%%",
                              "right": "0%%",
                              "height": "100%%",
                              "top": "0%%",
                          }, 500);
                    }
                    else {
                          jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                              "width": "100%%",
                              "left": parseInt(100 - parseInt("100%%")) / 2 + "%%",
                              "height": "100%%",
                              "top": "0%%",
                          }, 500);
                      }
                  break;
              case "FTL":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "rotateY(0deg)",
                          "-ms-transform": "rotateY(0deg)",
                          "-o-transform": "rotateY(0deg)",
                          "-moz-transform": "rotateY(0deg)",
                          "-webkit-transform": "rotateY(0deg)"
                      });
                  break;
              case "FTR":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "rotateX(0deg)",
                          "-ms-transform": "rotateX(0deg)",
                          "-o-transform": "rotateX(0deg)",
                          "-moz-transform": "rotateX(0deg)",
                          "-webkit-transform": "rotateX(0deg)"
                      });
                  break; 
              case "FBL":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "rotate(0deg)",
                          "-ms-transform": "rotate(0deg)",
                          "-o-transform": "rotate(0deg)",
                          "-moz-transform": "rotate(0deg)",
                          "-webkit-transform": "rotate(0deg)",
                          "z-index": "9999"
                      });
                  break;
              case "FBR":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "skewX(0deg)",
                          "-ms-transform": "skewX(0deg)",
                          "-o-transform": "skewX(0deg)",
                          "-moz-transform": "skewX(0deg)",
                          "-webkit-transform": "skewX(0deg)"
                      });
                  break;
              case "FBTT":
                      jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                          "transform": "skewY(0deg)",
                          "-ms-transform": "skewY(0deg)",
                          "-o-transform": "skewY(0deg)",
                          "-moz-transform": "skewY(0deg)",
                          "-webkit-transform": "skewY(0deg)"
                      });
                  break; 
            }
            jQuery(".ts_poll_r_main_%1$s >  .ts_poll_answer_result > .ts_poll_answer_result_label > span.ts_poll_answer_percent_line").each(function () {
              jQuery(this).animate({"width": jQuery(this).attr("data-tsp-w")}, 1500);
            });
          }
        });   
        jQuery(document).on("click", "button#ts_poll_back_button_%1$s", function() {
          if(!jQuery("input#ts_poll_p_shpop").is(":checked")) {
            if(jQuery("select#ts_poll_p_sheff").val()=="FTTB") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "translateY(-12000px)",
                "-ms-transform": "translateY(-12000px)",
                "-o-transform": "translateY(-12000px)",
                "-moz-transform": "translateY(-12000px)",
                "-webkit-transform": "translateY(-12000px)",
                "opacity": "0"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FLTR") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "translateX(-12000px)",
                "-ms-transform": "translateX(-12000px)",
                "-o-transform": "translateX(-12000px)",
                "-moz-transform": "translateX(-12000px)",
                "-webkit-transform": "translateX(-12000px)"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FRTL") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "translateX(12000px)",
                "-ms-transform": "translateX(12000px)",
                "-o-transform": "translateX(12000px)",
                "-moz-transform": "translateX(12000px)",
                "-webkit-transform": "translateX(12000px)"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FCTA") {
              if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="left") {
                jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                  width: "0",
                  height: "0",
                  left: "0%%",
                  top: "50%%",
                }, 100);
              }
              else if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="right") {
                jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                  width: "0",
                  height: "0",
                  right: parseInt(50 - parseInt(100 - parseInt(TotalSoft_Poll_1_MW)) / 2) + "%%",
                  top: "50%%",
                }, 100);
              }
              else {
                jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                  width: "0", height: "0", left: "50%%", top: "50%%"
                }, 100);
              }
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FTL") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "rotateY(-90deg)",
                "-ms-transform": "rotateY(-90deg)",
                "-o-transform": "rotateY(-90deg)",
                "-moz-transform": "rotateY(-90deg)",
                "-webkit-transform": "rotateY(-90deg)"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FTR") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "rotateX(-90deg)",
                "-ms-transform": "rotateX(-90deg)",
                "-o-transform": "rotateX(-90deg)",
                "-moz-transform": "rotateX(-90deg)",
                "-webkit-transform": "rotateX(-90deg)"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FBL") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "rotate(-180deg)",
                "-ms-transform": "rotate(-180deg)",
                "-o-transform": "rotate(-180deg)",
                "-moz-transform": "rotate(-180deg)",
                "-webkit-transform": "rotate(-180deg)",
                "z-index": "-1"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FBR") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "skewX(90deg)",
                "-ms-transform": "skewX(90deg)",
                "-o-transform": "skewX(90deg)",
                "-moz-transform": "skewX(90deg)",
                "-webkit-transform": "skewX(90deg)"
              });
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FBTT") {
              jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                "transform": "skewY(90deg)",
                "-ms-transform": "skewY(90deg)",
                "-o-transform": "skewY(90deg)",
                "-moz-transform": "skewY(90deg)",
                "-webkit-transform": "skewY(90deg)"
              });
            }
          }else {
            if(jQuery("select#ts_poll_p_sheff").val()=="FTTB") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "translateY(-12000px)",
                "-ms-transform": "translateY(-12000px)",
                "-o-transform": "translateY(-12000px)",
                "-moz-transform": "translateY(-12000px)",
                "-webkit-transform": "translateY(-12000px)",
                "opacity": "1"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 200)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FLTR") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "translateX(-12000px)",
                "-ms-transform": "translateX(-12000px)",
                "-o-transform": "translateX(-12000px)",
                "-moz-transform": "translateX(-12000px)",
                "-webkit-transform": "translateX(-12000px)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 200)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FRTL") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "translateX(12000px)",
                "-ms-transform": "translateX(12000px)",
                "-o-transform": "translateX(12000px)",
                "-moz-transform": "translateX(12000px)",
                "-webkit-transform": "translateX(12000px)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 200)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FCTA") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                width: "0%%", height: "0%%"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery("#ts_poll_modal_result_section_%1$s").css("position", "absolute");
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 200)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FTL") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "rotateY(-90deg)",
                "-ms-transform": "rotateY(-90deg)",
                "-o-transform": "rotateY(-90deg)",
                "-moz-transform": "rotateY(-90deg)",
                "-webkit-transform": "rotateY(-90deg)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 400)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FTR") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "rotateX(-90deg)",
                "-ms-transform": "rotateX(-90deg)",
                "-o-transform": "rotateX(-90deg)",
                "-moz-transform": "rotateX(-90deg)",
                "-webkit-transform": "rotateX(-90deg)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 600)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FBL") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "rotate(-180deg)",
                "-ms-transform": "rotate(-180deg)",
                "-o-transform": "rotate(-180deg)",
                "-moz-transform": "rotate(-180deg)",
                "-webkit-transform": "rotate(-180deg)",
                "opacity": "0"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 600)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FBR") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "skewX(90deg)",
                "-ms-transform": "skewX(90deg)",
                "-o-transform": "skewX(90deg)",
                "-moz-transform": "skewX(90deg)",
                "-webkit-transform": "skewX(90deg)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 600)
            }
            else if(jQuery("select#ts_poll_p_sheff").val()=="FBTT") {
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "skewY(90deg)",
                "-ms-transform": "skewY(90deg)",
                "-o-transform": "skewY(90deg)",
                "-moz-transform": "skewY(90deg)",
                "-webkit-transform": "skewY(90deg)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
              setTimeout(function() {
                jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
              }, 600)
            }
          }
        });
    </script>
  ',
		esc_js( $total_soft_poll )
	);
} elseif ( $tspoll_question_styles->ts_poll_rb_show == 'true' && $ts_poll_endpoll_bool !== true || $ts_poll_can_vote === true ) {
	$tsp_effect_data_jquery = $tsp_effect_data_back_jquery = '';
	if ( $tspoll_question_styles->ts_poll_p_shpop == 'true' ) {
		switch ( $tspoll_question_styles->ts_poll_p_sheff ) {
			case 'FTTB':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "translateY(0px)",
                "-ms-transform": "translateY(0px)",
                "-o-transform": "translateY(0px)",
                "-moz-transform": "translateY(0px)",
                "-webkit-transform": "translateY(0px)",
                "opacity": "1",
                "max-height": "440px"
              });
              ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "translateY(-12000px)",
                  "-ms-transform": "translateY(-12000px)",
                  "-o-transform": "translateY(-12000px)",
                  "-moz-transform": "translateY(-12000px)",
                  "-webkit-transform": "translateY(-12000px)",
                  "opacity": "1"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 200);
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FLTR':
				$tsp_effect_data_jquery = sprintf(
					'
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "translateX(0px)",
                "-ms-transform": "translateX(0px)",
                "-o-transform": "translateX(0px)",
                "-moz-transform": "translateX(0px)",
                "-webkit-transform": "translateX(0px)"
              });
          ',
					esc_js( $total_soft_poll )
				);

				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "translateX(-12000px)",
                  "-ms-transform": "translateX(-12000px)",
                  "-o-transform": "translateX(-12000px)",
                  "-moz-transform": "translateX(-12000px)",
                  "-webkit-transform": "translateX(-12000px)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 200);
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FRTL':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "translateX(0px)",
                "-ms-transform": "translateX(0px)",
                "-o-transform": "translateX(0px)",
                "-moz-transform": "translateX(0px)",
                "-webkit-transform": "translateX(0px)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "translateX(12000px)",
                  "-ms-transform": "translateX(12000px)",
                  "-o-transform": "translateX(12000px)",
                  "-moz-transform": "translateX(12000px)",
                  "-webkit-transform": "translateX(12000px)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 200)
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FCTA':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
              jQuery("#ts_poll_modal_result_section_%1$s").animate({
                "maxWidth": "750px",
                "width": "100%%",
                "height": "100%%",
              }, 500);
              jQuery("#ts_poll_modal_result_section_%1$s").css("position", "relative");
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  width: "0%%", height: "0%%"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                setTimeout(function() {
                  jQuery("#ts_poll_modal_result_section_%1$s").css("position", "absolute");
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 200)
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FTL':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "rotateY(0deg)",
                "-ms-transform": "rotateY(0deg)",
                "-o-transform": "rotateY(0deg)",
                "-moz-transform": "rotateY(0deg)",
                "-webkit-transform": "rotateY(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "rotateY(-90deg)",
                  "-ms-transform": "rotateY(-90deg)",
                  "-o-transform": "rotateY(-90deg)",
                  "-moz-transform": "rotateY(-90deg)",
                  "-webkit-transform": "rotateY(-90deg)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 400)
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FTR':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "rotateX(0deg)",
                "-ms-transform": "rotateX(0deg)",
                "-o-transform": "rotateX(0deg)",
                "-moz-transform": "rotateX(0deg)",
                "-webkit-transform": "rotateX(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "rotateX(-90deg)",
                  "-ms-transform": "rotateX(-90deg)",
                  "-o-transform": "rotateX(-90deg)",
                  "-moz-transform": "rotateX(-90deg)",
                  "-webkit-transform": "rotateX(-90deg)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 600)
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBL':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "rotate(0deg)",
                  "-ms-transform": "rotate(0deg)",
                  "-o-transform": "rotate(0deg)",
                  "-moz-transform": "rotate(0deg)",
                  "-webkit-transform": "rotate(0deg)",
                  "opacity": "1"
                });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                  jQuery("#ts_poll_modal_result_section_%1$s").css({
                    "transform": "rotate(-180deg)",
                    "-ms-transform": "rotate(-180deg)",
                    "-o-transform": "rotate(-180deg)",
                    "-moz-transform": "rotate(-180deg)",
                    "-webkit-transform": "rotate(-180deg)",
                    "opacity": "0"
                  });
                  jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                  setTimeout(function() {
                    jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                  }, 600)
                ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBR':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "skewX(0deg)",
                  "-ms-transform": "skewX(0deg)",
                  "-o-transform": "skewX(0deg)",
                  "-moz-transform": "skewX(0deg)",
                  "-webkit-transform": "skewX(0deg)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "skewX(90deg)",
                  "-ms-transform": "skewX(90deg)",
                  "-o-transform": "skewX(90deg)",
                  "-moz-transform": "skewX(90deg)",
                  "-webkit-transform": "skewX(90deg)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 600)
              ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBTT':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery("#ts_poll_modal_result_section_%1$s").css({
                "transform": "skewY(0deg)",
                "-ms-transform": "skewY(0deg)",
                "-o-transform": "skewY(0deg)",
                "-moz-transform": "skewY(0deg)",
                "-webkit-transform": "skewY(0deg)"
              });
              jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "100%%"}, 300);
              jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
                jQuery("#ts_poll_modal_result_section_%1$s").css({
                  "transform": "skewY(90deg)",
                  "-ms-transform": "skewY(90deg)",
                  "-o-transform": "skewY(90deg)",
                  "-moz-transform": "skewY(90deg)",
                  "-webkit-transform": "skewY(90deg)"
                });
                jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                setTimeout(function() {
                  jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                }, 600)
              ',
					esc_js( $total_soft_poll )
				);
				break;
		}
	} else {
		switch ( $tspoll_question_styles->ts_poll_p_sheff ) {
			case 'FTTB':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "translateY(0px)",
                  "-ms-transform": "translateY(0px)",
                  "-o-transform": "translateY(0px)",
                  "-moz-transform": "translateY(0px)",
                  "-webkit-transform": "translateY(0px)",
                  "opacity": "1"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "translateY(-12000px)",
              "-ms-transform": "translateY(-12000px)",
              "-o-transform": "translateY(-12000px)",
              "-moz-transform": "translateY(-12000px)",
              "-webkit-transform": "translateY(-12000px)",
              "opacity": "0"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FLTR':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "translateX(0px)",
                  "-ms-transform": "translateX(0px)",
                  "-o-transform": "translateX(0px)",
                  "-moz-transform": "translateX(0px)",
                  "-webkit-transform": "translateX(0px)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "translateX(-12000px)",
              "-ms-transform": "translateX(-12000px)",
              "-o-transform": "translateX(-12000px)",
              "-moz-transform": "translateX(-12000px)",
              "-webkit-transform": "translateX(-12000px)"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FRTL':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "translateX(0px)",
                  "-ms-transform": "translateX(0px)",
                  "-o-transform": "translateX(0px)",
                  "-moz-transform": "translateX(0px)",
                  "-webkit-transform": "translateX(0px)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "translateX(12000px)",
              "-ms-transform": "translateX(12000px)",
              "-o-transform": "translateX(12000px)",
              "-moz-transform": "translateX(12000px)",
              "-webkit-transform": "translateX(12000px)"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FCTA':
				if ( $tspoll_question_styles->ts_poll_pos == 'left' ) {
					$tsp_effect_data_jquery      = sprintf(
						'
                  jQuery(".ts_poll_r_section_%1$s").animate({
                      "width": 100%%,
                      "left": "0%%",
                      "height": "100%%",
                      "top": "0%%",
                  }, 500);
              ',
						esc_js( $total_soft_poll )
					);
					$tsp_effect_data_back_jquery = sprintf(
						'
                jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                  width: "0",
                  height: "0",
                  left: "0%%",
                  top: "50%%",
                }, 100);
              ',
						esc_js( $total_soft_poll )
					);
				} elseif ( $tspoll_question_styles->ts_poll_pos == 'right' ) {
					$tsp_effect_data_jquery      = sprintf(
						'
                  jQuery(".ts_poll_r_section_%1$s").animate({
                      "width": 100%%,
                      "right": "0%%",
                      "height": "100%%",
                      "top": "0%%",
                  }, 500);
              ',
						esc_js( $total_soft_poll )
					);
					$tsp_effect_data_back_jquery = sprintf(
						'
                jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                  width: "0",
                  height: "0",
                  right: parseInt(50 - parseInt(100 - parseInt(TotalSoft_Poll_1_MW)) / 2) + "%%",
                  top: "50%%",
                }, 100);
              ',
						esc_js( $total_soft_poll )
					);
				} else {
					$tsp_effect_data_jquery      = sprintf(
						'
                  jQuery(".ts_poll_r_section_%1$s").animate({
                      "width": "100%%",
                      "left": "0%%",
                      "height": "100%%",
                      "top": "0%%",
                  }, 500);
              ',
						esc_js( $total_soft_poll )
					);
					$tsp_effect_data_back_jquery = sprintf(
						'
                jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                  width: "0", height: "0", left: "50%%", top: "50%%"
                }, 100);
              ',
						esc_js( $total_soft_poll )
					);
				}
				break;
			case 'FTL':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "rotateY(0deg)",
                  "-ms-transform": "rotateY(0deg)",
                  "-o-transform": "rotateY(0deg)",
                  "-moz-transform": "rotateY(0deg)",
                  "-webkit-transform": "rotateY(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "rotateY(-90deg)",
              "-ms-transform": "rotateY(-90deg)",
              "-o-transform": "rotateY(-90deg)",
              "-moz-transform": "rotateY(-90deg)",
              "-webkit-transform": "rotateY(-90deg)"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FTR':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "rotateX(0deg)",
                  "-ms-transform": "rotateX(0deg)",
                  "-o-transform": "rotateX(0deg)",
                  "-moz-transform": "rotateX(0deg)",
                  "-webkit-transform": "rotateX(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "rotateX(-90deg)",
              "-ms-transform": "rotateX(-90deg)",
              "-o-transform": "rotateX(-90deg)",
              "-moz-transform": "rotateX(-90deg)",
              "-webkit-transform": "rotateX(-90deg)"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBL':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "rotate(0deg)",
                  "-ms-transform": "rotate(0deg)",
                  "-o-transform": "rotate(0deg)",
                  "-moz-transform": "rotate(0deg)",
                  "-webkit-transform": "rotate(0deg)",
                  "z-index": "9999"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "rotate(-180deg)",
              "-ms-transform": "rotate(-180deg)",
              "-o-transform": "rotate(-180deg)",
              "-moz-transform": "rotate(-180deg)",
              "-webkit-transform": "rotate(-180deg)",
              "z-index": "-1"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBR':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "skewX(0deg)",
                  "-ms-transform": "skewX(0deg)",
                  "-o-transform": "skewX(0deg)",
                  "-moz-transform": "skewX(0deg)",
                  "-webkit-transform": "skewX(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "skewX(90deg)",
              "-ms-transform": "skewX(90deg)",
              "-o-transform": "skewX(90deg)",
              "-moz-transform": "skewX(90deg)",
              "-webkit-transform": "skewX(90deg)"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBTT':
				$tsp_effect_data_jquery      = sprintf(
					'
              jQuery(".ts_poll_r_section_%1$s").css({
                  "transform": "skewY(0deg)",
                  "-ms-transform": "skewY(0deg)",
                  "-o-transform": "skewY(0deg)",
                  "-moz-transform": "skewY(0deg)",
                  "-webkit-transform": "skewY(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				$tsp_effect_data_back_jquery = sprintf(
					'
            jQuery("section.ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
              "transform": "skewY(90deg)",
              "-ms-transform": "skewY(90deg)",
              "-o-transform": "skewY(90deg)",
              "-moz-transform": "skewY(90deg)",
              "-webkit-transform": "skewY(90deg)"
            });
          ',
					esc_js( $total_soft_poll )
				);
				break;
		}
	}
	echo sprintf(
		'
      <script>
          function tsp_show_results_%1$s(){
            %2$s
            %3$s
            %4$s
          }
          jQuery(document).on("click", "button#ts_poll_result_button_%1$s", tsp_show_results_%1$s);
          jQuery(document).on("click", "button#ts_poll_back_button_%1$s", function() {
            %5$s
          });
          %6$s
      </script>
    ',
		esc_js( $total_soft_poll ),
		$tspoll_question_styles->ts_poll_p_shpop == 'true' ? sprintf( 'jQuery(".ts_poll_result_popup_section_%s").css("display","")', esc_js( $total_soft_poll ) ) : '',
		$tsp_effect_data_jquery,
		$tspoll_question_styles->ts_poll_p_shpop == 'false' ? sprintf(
			'
        jQuery(".ts_poll_r_main_%s >  .ts_poll_answer_result > .ts_poll_answer_result_label > span.ts_poll_answer_percent_line").each(function () {
            jQuery(this).animate({"width": jQuery(this).attr("data-tsp-w")}, 1500);
        });
    ',
			esc_js( $total_soft_poll )
		) : '',
		$tsp_effect_data_back_jquery,
		$ts_poll_can_vote === true && $t_s_poll_question_settings->TotalSoft_Poll_Set_01 == 'true' ?
		sprintf(
			'  
      function tsp_change_results_%1$s(tsp_results_arr){
        jQuery("main.ts_poll_r_main_%1$s > div.ts_poll_answer_result").each(function () {
          jQuery(this).find("span.ts_poll_answer_percent_line").attr("data-tsp-w",tsp_results_arr[`${jQuery(this).attr("data-tsp-id")}`]["tsp_result_percent"] + "%%");
          jQuery(this).find("span.ts_poll_answer_info_line").html(tsp_results_arr[`${jQuery(this).attr("data-tsp-id")}`]["tsp_result_show"]);
        });
      }',
			esc_attr( $total_soft_poll )
		)
		: ''
	);
}
