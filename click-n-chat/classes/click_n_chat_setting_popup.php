<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_setting_popup')) {
	class click_n_chat_setting_popup {
		public $show_header = '1';
		public $title = 'How can we help you today?';
		public $header_padding = '10';
    	public $bg_color = '#6699ff';
		public $txt_color = '#FFFFFF';
		public $border_style = '0px 0px 0px 0px';
		public $pop_type = 'socialwidgets';
		public $popup_width = '350px';
		public $popup_position = 'right';
		public $pop_up_icon = CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png';
		public $mypopup_icon = '';
		public $pop_up_style = 'wgs1';
		public $widget_style = 'wgs1';
		public $widget_icon_size = '55';
		public $chat_name_start = '0';
		public $chat_bg_color = '#FFFFFF';
		public $socialwidgets_no_availability = '1';
	}
}