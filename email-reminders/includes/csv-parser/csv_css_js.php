<?php  

class OPER_CSV_JS_CSS {

 	/**
	 * Constructor
	 */
	public function __construct() {

		// JS & CSS
		add_action( 'oper_enqueue_js_files', array( $this, 'enqueue_js' ), 50 );
		add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css' ), 50 );
	}


	/** JSS */
	public function enqueue_js( $where_to_load ) {

		$in_footer = true;

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_script( 'oper-csv'
				, trailingslashit( plugins_url( '', __FILE__ ) ) . 'csv.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
				, array( 'oper-global-vars' ), '1.1', $in_footer );
		}
	}


	/** CSS */
	public function enqueue_css( $where_to_load ) {

		/*
		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_style( 'wp-codemirror' );

			wp_enqueue_style( 'oper-codemirror'
							, trailingslashit( plugins_url( '', __FILE__ ) ) . 'codemirror.css'
							, array(), OPER_VERSION_NUM );
		}
		*/
	}

	// </editor-fold>
}

new OPER_CSV_JS_CSS();		// Load JS and CSS