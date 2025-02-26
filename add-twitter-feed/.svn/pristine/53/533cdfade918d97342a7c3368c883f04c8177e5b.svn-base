<?php
add_action( 'wp_enqueue_scripts', 'tfbip_enqueue_styles', 10);
add_action( 'admin_enqueue_scripts', 'tfbip_admin_enqueue_styles', 10);

function tfbip_enqueue_styles(){

	wp_register_script( 'tfbip_jquery', plugin_dir_url( __FILE__ )  . '../js/jquery-3.1.1.js', false, '1.0.0' );
	wp_register_script( 'tfbip_script', plugin_dir_url( __FILE__ )  . '../js/script.js', array( 'jquery' ) );
	wp_register_script( 'tfbip_jquery_min', plugin_dir_url( __FILE__ )  . '../js/bower_components/jquery/dist/jquery.min.js', array( 'jquery' ) );
	wp_register_script( 'tfbip_dot_min', plugin_dir_url( __FILE__ )  . '../js/bower_components/doT/doT.min.js', array( 'jquery' ) );
	wp_register_script( 'tfbip_moment_min', plugin_dir_url( __FILE__ )  . '../js/bower_components/moment/min/moment.min.js', array( 'jquery' ) );
	wp_register_script( 'tfbip_socialfeed_jquery', plugin_dir_url( __FILE__ )  . '../js/bower_components/jquery.socialfeed.js', array( 'jquery' ) );
	wp_register_script( 'tfbip_codebird_jquery', plugin_dir_url( __FILE__ )  . '../js/bower_components/codebird-js/codebird.js', array( 'jquery' ) );




	wp_enqueue_script('tfbip_jquery');
	wp_enqueue_script('tfbip_script');
	wp_enqueue_script('tfbip_jquery_min');
	wp_enqueue_script('tfbip_dot_min');
	wp_enqueue_script('tfbip_moment_min');
	wp_enqueue_script('tfbip_socialfeed_jquery');
	wp_enqueue_script('tfbip_codebird_jquery');


	/*lang pack*/

	wp_register_script( 'tfbip_en', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/en-ca.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip_en');
        
            wp_register_script( 'tfbip_ar', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/ar.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip_ar');
            wp_register_script( 'tfbip_bn', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/bn.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip_bn');
                
            wp_register_script( 'tfbip-cs', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/cs.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-cs');
            wp_register_script( 'tfbip-da', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/da.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-da');
            wp_register_script( 'tfbip-nl', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/nl.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-nl');
            wp_register_script( 'tfbip-fr', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/fr.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-fr');
            wp_register_script( 'tfbip-de', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/de.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-de');
            wp_register_script( 'tfbip-it', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/it.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-it');
            wp_register_script( 'tfbip-ja', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/ja.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-ja');
            wp_register_script( 'tfbip-ko', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/ko.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-ko');
            wp_register_script( 'tfbip-pt', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/pt.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-pt');
            wp_register_script( 'tfbip-ru', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/ru.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-ru');
            wp_register_script( 'tfbip-es', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/es.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-es');
            wp_register_script( 'tfbip-tr', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/tr.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-tr');
            wp_register_script( 'tfbip-uk', plugin_dir_url( __FILE__ ) . '../js/bower_components/moment/locale/uk.js', array( 'jquery' ) );
               wp_enqueue_script( 'tfbip-uk');


}



function tfbip_admin_enqueue_styles() {
	
	wp_enqueue_script('jquery');
	wp_register_style( 'tfbip_tabs_style', plugin_dir_url( __FILE__ )  . '../css/style-tabs.css', false, '1.0.0' );
	wp_register_script( 'tfbip_script', plugin_dir_url( __FILE__ ) . '../js/script.js', array( 'jquery' ) );


	
	wp_enqueue_script( 'tfbip_script');
	wp_enqueue_style('tfbip_tabs_style');
		
}