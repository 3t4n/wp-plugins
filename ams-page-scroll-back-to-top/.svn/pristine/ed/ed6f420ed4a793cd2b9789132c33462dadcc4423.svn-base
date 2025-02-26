<?php

class AMS_PSBTT_HELP {

function __construct() {

	$this->msv_page_scroll_help_tab();
}

function msv_page_scroll_help_tab() {
	
		$screen = get_current_screen();

    $tabs = array(
		array(
			'title'    => 'Overview',
			'id'       => 'ams-psbtt-help-overview',
			'callback' => array($this, 'ams_page_scroll_overview'),
		),
		array(
			'title'    => 'Select Button Type Preset Image',
			'id'       => 'ams-psbtt-help-image-preset',
			'callback' => array($this, 'ams_page_scroll_choose_image_preset'),
		),
		array(
			'title'    => 'Select Button Type Preset Icon',
			'id'       => 'ams-psbtt-help-icon-preset',
			'callback' => array($this, 'ams_page_scroll_choose_icon_preset'),
		)
		
	);
	foreach($tabs as $tab) {
		$screen->add_help_tab($tab);
	}
  $screen->set_help_sidebar('<a href="#">More info!</a>');
}
	
	function ams_page_scroll_overview() { 
	
		$file = dirname( MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) . '/help/overview.php';
		if ( !file_exists( $file ) )
				return false;
		include_once $file;
	}
	
	function ams_page_scroll_choose_image_preset() { 
	
		$file = dirname( MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) . '/help/choose-img-preset.php';
		if ( !file_exists( $file ) )
				return false;
		include_once $file;
	}
	
	function ams_page_scroll_choose_icon_preset() { 
	
		$file = dirname( MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) . '/help/choose-icon.php';
		if ( !file_exists( $file ) )
				return false;
		include_once $file;
	}

}

new AMS_PSBTT_HELP();