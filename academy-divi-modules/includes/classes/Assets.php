<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

class ACDM_AcademyDiviAssets {

    public $version = ACDM_VERSION;

    public function __construct() {
        // Allow Academy LMS Frontend Scripts
        add_filter( 'academy/load_frontend_scritps', [ $this, 'allow_academy_frontend_scripts' ]);
		add_filter( 'academy/is_load_common_scripts', [ $this, 'allow_academy_frontend_scripts' ]);
        
        // Allow Force Show Login & Registration Form
        add_filter( 'academy/shortcode/login_form_is_user_logged_in', [$this, 'force_show_login_form']);
        add_filter( 'academy/shortcode/instructor_registration_form_is_user_logged_in', [$this, 'force_show_registration_form' ]);
		add_filter( 'academy/shortcode/student_registration_form_is_user_logged_in', [$this, 'force_show_registration_form']);

        add_action( 'wp_enqueue_scripts', array( $this, 'acdm_divi_scripts' ), 10 );
	}

    public static function allow_academy_frontend_scripts( $allow ) {
        if (!is_admin() && function_exists( 'et_pb_is_pagebuilder_used' )) {
            return true;
        }
		return $allow;
	}

    public static function force_show_login_form($default) {
        if (is_admin() && function_exists( 'et_pb_is_pagebuilder_used' )) {
            return false;
        }
        return $default;
    }

    public function force_show_registration_form( $default ) {
        if (is_admin() && function_exists( 'et_pb_is_pagebuilder_used' )) {
            return false;
        }
        return $default;
	}

    public static function acdm_divi_scripts() {		
		$version      = ACDM_VERSION;
		
		wp_enqueue_script(
			'acdm-swiperjs',
			ACDM_ASSETS . 'lib/swiper/js/swiper-bundle.min.js',
			array(),
			$version,
			true
		);
		wp_enqueue_script(
			'acdm-swiperjs-config',
			ACDM_ASSETS . 'js/swiper-carousel.js',
			array('jquery'),
			$version,
			true
		);

		wp_enqueue_style(
			'acdm-swipercss',
			ACDM_ASSETS . 'lib/swiper/css/swiper-bundle.min.css',
			array(),
			$version
		);

		wp_enqueue_style(
			'acdm-swipercss-custom',
			ACDM_ASSETS . 'lib/swiper/css/swiper-custom-style.css',
			array(),
			$version
		);

		wp_enqueue_style(
			'acdm-admin',
			ACDM_ASSETS . 'css/acdm-admin.css',
			array(),
			$version
		);
	}
}

new ACDM_AcademyDiviAssets();