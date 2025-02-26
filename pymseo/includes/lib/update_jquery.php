<?php
//###############################
//--> Actualizar la version del Jquery
//###############################
	if ( ! is_admin() ) {
		function fun_pymseo_replace_core_jquery_version() {
			wp_deregister_script('jquery-core');
			
			if (get_option('pymseoSeguridadUpdateJqueryVersion')>3 && get_option('pymseoSeguridadUpdateJqueryVersionSlim') ) {
				wp_register_script('jquery-core',"https://cdnjs.cloudflare.com/ajax/libs/jquery/".get_option('pymseoSeguridadUpdateJqueryVersion')."/jquery.slim.min.js", array(), get_option('pymseoSeguridadUpdateJqueryVersion') );
			}else{
				wp_register_script('jquery-core',"https://cdnjs.cloudflare.com/ajax/libs/jquery/".get_option('pymseoSeguridadUpdateJqueryVersion')."/jquery.min.js", array(), get_option('pymseoSeguridadUpdateJqueryVersion') );
			}
			//wp_deregister_script( 'jquery-migrate' );
			//wp_register_script( 'jquery-migrate', "https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js", array(), '3.1.0' );
		}
		add_action( 'wp_enqueue_scripts', 'fun_pymseo_replace_core_jquery_version' );
	}
?>