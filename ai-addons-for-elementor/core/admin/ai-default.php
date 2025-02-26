<?php 

class AIEA_Default {
	
	private static $_instance = null;
	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	
	public function __construct() {
		
		$this->save_default();
		
	}
		
	public function save_default() {
		
		$aiea_shortcodes = get_option( 'aiea_shortcodes' );
		if( empty( $aiea_shortcodes ) ) {
			$default_widgets = '{"ai-default":"default","fancy_text":"on","tooltip":"on","contact_info":"on","google_map":"on","button":"on","icon_list":"on","icon":"on","icon_box":"on","image_box":"on","feature_box":"on","flip_box":"on","section_title":"on","chart":"on","circle_progress":"on","counter":"on","day_counter":"on","pricing_table":"on","timeline":"on","timeline_slide":"on","offcanvas":"on","image_grid":"on","social_icons":"on","modal_popup":"on","mailchimp":"on","image_before_after":"on","accordion":"on","tab":"on","video_popup":"on","content_carousel":"on","content_switcher":"on","toggle_content":"on","data_table":"on","contact_form_7":"on","posts":"on","ai_content":"on","ai_title":"on"}';
			update_option( 'aiea_shortcodes', json_decode( $default_widgets, true ) );
		}

		$aiea_modules = get_option( 'aiea_modules' );
		if( empty( $aiea_modules ) ) {
			$default_modules = '{"ai-default":"default","smoke":"on","rain-drops":"on","parallax":"on","float-image":"on"}';		
			update_option( 'aiea_modules', json_decode( $default_modules, true ) );
		}
		
	}
} AIEA_Default::instance();