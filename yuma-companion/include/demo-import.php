<?php 
/*
 * Demo Import
 */

class ST_Yuma_Companion_Demo {

	public function __construct()
	{
		if ( ! ST_Yuma_Companion::is_pro() ) {
			add_action( 'admin_notices', array( $this, 'admin_free_notice' ) );
	}
		add_action( 'admin_notices', array( $this, 'admin_notice' ) );
		add_filter( 'advanced_import_demo_lists', array( $this, 'demo_import_lists' ) );
		add_action( 'switch_theme', array( $this, 'flush_transient' ) );
	}

	public function admin_notice() 
	{
		global $pagenow;
	    $proceed = ( 'index.php' == $pagenow ) ? true : false;

		$notice = get_transient( 'notice' );

		if ( ! $notice ) :
			$request_demo_data = wp_remote_retrieve_body( wp_remote_get( 'https://gitlab.com/api/v4/projects/32120777/repository/files/notice%2Ehtml?ref=master' ) );

			if( is_wp_error( $request_demo_data ) ) {
			    return false;
			}

			$notice = json_decode( $request_demo_data, true );
			$notice = (array) $notice;
			$notice = $notice['content'];
			$notice = base64_decode( $notice );
			set_transient( 'notice', $notice, DAY_IN_SECONDS );
		endif;

		$output = '';
		if ( ! empty( $notice ) ) :
			$output .= '<div class="notice notice-info is-dismissible">';
			$output .= wp_kses_post( $notice );
			$output .= '</div>';
		endif;

		if ( $proceed ) {
			echo $output;
		} else {
			return;
		}
	}

	public function admin_free_notice() 
	{
		global $pagenow;
	    $proceed = ( 'index.php' == $pagenow ) ? true : false;

		$notice = get_transient( 'free_notice' );

		if ( ! $notice ) :
			$request_demo_data = wp_remote_retrieve_body( wp_remote_get( 'https://gitlab.com/api/v4/projects/32120777/repository/files/free-notice%2Ehtml?ref=master' ) );

			if( is_wp_error( $request_demo_data ) ) {
			    return false;
			}

			$notice = json_decode( $request_demo_data, true );
			$notice = (array) $notice;
			$notice = $notice['content'];
			$notice = base64_decode( $notice );
			set_transient( 'free_notice', $notice, DAY_IN_SECONDS );
		endif;

		$output = '';
		if ( ! empty( $notice ) ) :
			$output .= '<div class="notice notice-info is-dismissible">';
			$output .= wp_kses_post( $notice );
			$output .= '</div>';
		endif;

		if ( $proceed ) {
			echo $output;
		} else {
			return;
		}
	}

	public function demo_import_lists()
	{
		$demo_list = get_transient( 'yuma_companion_demo_list' );

		if ( ! ST_Yuma_Companion::is_pro() ) :
			/*
			 * Free demo data
			 */
			if ( ! $demo_list ) :
				$request_demo_data = wp_remote_retrieve_body( wp_remote_get( 'https://gitlab.com/api/v4/projects/32120777/repository/files/yuma%2Ejson?ref=master' ) );

				if( is_wp_error( $request_demo_data ) ) {
				    return false;
				}

				$demo_list 	= json_decode( $request_demo_data, true );
				$demo_list  = (array) $demo_list;
				$demo_list 	= $demo_list['content'];
				$demo_list  = base64_decode( $demo_list );
				$demo_list = json_decode($demo_list, true);
				set_transient( 'yuma_companion_demo_list', $demo_list, DAY_IN_SECONDS );
			endif;

		else :
			/*
			 * Pro demo data
			 */
			if ( ! $demo_list ) :
				$request_demo_data = wp_remote_retrieve_body( wp_remote_get( 'https://gitlab.com/api/v4/projects/32120777/repository/files/yuma-pro%2Ejson?ref=master' ) );

				if( is_wp_error( $request_demo_data ) ) {
				    return false;
				}

				$demo_list 	= json_decode( $request_demo_data, true );
				$demo_list  = (array) $demo_list;
				$demo_list 	= $demo_list['content'];
				$demo_list  = base64_decode( $demo_list );
				$demo_list = json_decode($demo_list, true);
				set_transient( 'yuma_companion_demo_list', $demo_list, DAY_IN_SECONDS );
			endif;

		endif;

		

		return $demo_list;
	}

	public function flush_transient() 
	{
		delete_transient( 'yuma_companion_demo_list' );
	}
}

new ST_Yuma_Companion_Demo();
