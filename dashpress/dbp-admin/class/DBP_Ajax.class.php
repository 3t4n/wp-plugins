<?php
class DBP_Ajax
{
	function __construct()
	{
		$action = ( isset( $_POST['dbp_action'] ) ) ? str_replace( '-', '_', $_POST['dbp_action'] ) : '';

		if ( method_exists( $this, $action ) ) call_user_func_array( array( $this, $action ), array() );

		die( -1 );
	}

	function get_content()
	{
		$i = $_POST['i'];
		$w = new DBP_Widget( $i );
		$w->get_content();
		die();
	}

	function get_control()
	{
		$i = $_POST['i'];
		$w = new DBP_Widget( $i );
		$w->get_control();
		die();
	}

	function control_submitted()
	{
		$i = $_POST['i'];
		$w = new DBP_Widget( $i );
		$w->control_submitted();
		$w->get_content();
		die();
	}

	function update_count()
	{
		DashPress::update_user_option( DashPress::option_name, $_POST['count'] );
		die();
	}

	function update_visible()
	{
		$boxes = get_user_option( DashPress::option_boxes );
		$boxes = array_flip( $boxes );

		if ( (  $_POST['checked'] &&  isset( $boxes[$_POST['box']] ) )
		||   ( !$_POST['checked'] && !isset( $boxes[$_POST['box']] ) ) ) die();

		if ( $_POST['checked'] ) $boxes[$_POST['box']] = true;
		else unset( $boxes[$_POST['box']] );

		DashPress::update_user_option( DashPress::option_boxes, array_keys( $boxes ) );
		die();
	}

	function set_global()
	{
		if ( get_option( DashPress::option_boxes ) !== false )
		{
			delete_option( DashPress::option_boxes );
			delete_option( DashPress::option_wdgts );
			die( '0' );
		}
		update_option( DashPress::option_boxes, get_user_option( DashPress::option_boxes ) );
		update_option( DashPress::option_wdgts, get_user_option( DashPress::option_wdgts  ) );
		die();
	}
}