<?php
function akbootstrapfaq_wp_head() {
    echo '<style>';
	echo 'div.faqHeader { color: '.esc_attr( get_option('cat_h_color') ).'; }';
	echo 'div.faqPanel>div.panel-heading { background-color: '.esc_attr( get_option('ques_bg_color') ).'; border: 1px solid'.esc_attr( get_option('ques_bdr_color') ).'; }';
	echo 'div.faqPanel>div.panel-heading>h4.panel-title>a, div.faqPanel>div.panel-heading>h4.panel-title>a:hover { color: '.esc_attr( get_option('ques_txt_color') ).'; }';
	echo 'div.faqPanel>div>div.panel-body { background-color: '.esc_attr( get_option('ans_bg_color') ).'; border: 1px solid'.esc_attr( get_option('ans_bdr_color') ).';     border-top: none; }';
	echo 'div.faqPanel>div>div.panel-body p { color: '.esc_attr( get_option('ans_txt_color') ).'; }';
	echo 'div.panel-heading [data-toggle="collapse"].collapsed:after { color: #454444; content: "\2b"; float: right; }';
	echo 'div.panel-heading [data-toggle="collapse"]:after { content: "\2212"; color:  '.esc_attr( get_option('act_icon_color') ).'; float: right; }';
	echo '</style>';
}
add_action( 'wp_head', 'akbootstrapfaq_wp_head' );
?>