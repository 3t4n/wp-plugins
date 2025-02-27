<?php
/**
 * @package  Internal plugin hooks & action system
 * @category Core
 *
 * Author: wpdevelop, oplugins
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @version 1.0
 * @modified 2019-03-11
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


global $oper_action, $oper_filter;

////////////////////////////////////////////////////////////////////////////////
//  Filters
////////////////////////////////////////////////////////////////////////////////

function add_oper_filter( $filter_type, $filter ) {
	global $oper_filter;

	$args = array();
	if ( is_array( $filter ) && 1 == count( $filter ) && is_object( $filter[0] ) ) // array(&$this)
	{
		$args[] =& $filter[0];
	} else {
		$args[] = $filter;
	}
	for ( $a = 2; $a < func_num_args(); $a ++ ) {
		$args[] = func_get_arg( $a );
	}

	if ( is_array( $oper_filter ) ) {
		if ( isset( $oper_filter[ $filter_type ] ) ) {
			if ( is_array( $oper_filter[ $filter_type ] ) ) {
				$oper_filter[ $filter_type ][] = $args;
			} else {
				$oper_filter[ $filter_type ] = array( $args );
			}
		} else {
			$oper_filter[ $filter_type ] = array( $args );
		}
	} else {
		$oper_filter = array( $filter_type => array( $args ) );
	}
}

function remove_oper_filter( $filter_type, $filter ) {
	global $oper_filter;

	if ( isset( $oper_filter[ $filter_type ] ) ) {
		for ( $i = 0; $i < count( $oper_filter[ $filter_type ] ); $i ++ ) {
			if ( $oper_filter[ $filter_type ][ $i ][0] == $filter ) {
				$oper_filter[ $filter_type ][ $i ] = null;

				return;
			}
		}
	}
}

function apply_oper_filter( $filter_type ) {
	global $oper_filter;


	$args = array();
	for ( $a = 1; $a < func_num_args(); $a ++ ) {
		$args[] = func_get_arg( $a );
	}

	if ( count( $args ) > 0 ) {
		$value = $args[0];
	} else {
		$value = false;
	}

	if ( is_array( $oper_filter ) ) {
		if ( isset( $oper_filter[ $filter_type ] ) ) {
			foreach ( $oper_filter[ $filter_type ] as $filter ) {
				$filter_func = array_shift( $filter );
				$parameter   = $args;
				$value       = call_user_func_array( $filter_func, $parameter );
			}
		}
	}

	return $value;
}


////////////////////////////////////////////////////////////////////////////////
//  Actions
////////////////////////////////////////////////////////////////////////////////

function make_oper_action( $action_type ) {
	global $oper_action;


	$args = array();
	for ( $a = 1; $a < func_num_args(); $a ++ ) {
		$args[] = func_get_arg( $a );
	}

	if ( is_array( $oper_action ) ) {
		if ( isset( $oper_action[ $action_type ] ) ) {
			foreach ( $oper_action[ $action_type ] as $action ) {
				$action_func = array_shift( $action );
				$parameter   = $action;
				call_user_func_array( $action_func, $args );
			}
		}
	}
}

function add_oper_action( $action_type, $action ) {
	global $oper_action;

	$args = array();
	if ( is_array( $action ) && 1 == count( $action ) && is_object( $action[0] ) ) // array(&$this)
	{
		$args[] =& $action[0];
	} else {
		$args[] = $action;
	}
	for ( $a = 2; $a < func_num_args(); $a ++ ) {
		$args[] = func_get_arg( $a );
	}

	if ( is_array( $oper_action ) ) {
		if ( isset( $oper_action[ $action_type ] ) ) {
			if ( is_array( $oper_action[ $action_type ] ) ) {
				$oper_action[ $action_type ][] = $args;
			} else {
				$oper_action[ $action_type ] = array( $args );
			}
		} else {
			$oper_action[ $action_type ] = array( $args );
		}
	} else {
		$oper_action = array( $action_type => array( $args ) );
	}
}

function remove_oper_action( $action_type, $action ) {
	global $oper_action;

	if ( isset( $oper_action[ $action_type ] ) ) {
		for ( $i = 0; $i < count( $oper_action[ $action_type ] ); $i ++ ) {
			if ( $oper_action[ $action_type ][ $i ][0] == $action ) {
				$oper_action[ $action_type ][ $i ] = null;

				return;
			}
		}
	}
}


////////////////////////////////////////////////////////////////////////////////
//  Options
////////////////////////////////////////////////////////////////////////////////

function get_oper_option( $option, $default = false ) {

	$u_value = apply_oper_filter( 'oper_get_option', 'no-values', $option, $default );
	if ( $u_value !== 'no-values' ) {
		return $u_value;
	}

	return get_option( $option, $default );
}

function update_oper_option( $option, $newvalue ) {

	$u_value = apply_oper_filter( 'oper_update_option', 'no-values', $option, $newvalue );
	if ( $u_value !== 'no-values' ) {
		return $u_value;
	}

	return update_option( $option, $newvalue );
}

function delete_oper_option( $option ) {

	$u_value = apply_oper_filter( 'oper_delete_option', 'no-values', $option );
	if ( $u_value !== 'no-values' ) {
		return $u_value;
	}

	return delete_option( $option );
}

function add_oper_option( $option, $value = '', $deprecated = '', $autoload = 'yes' ) {

	$u_value = apply_oper_filter( 'oper_add_option', 'no-values', $option, $value, $deprecated, $autoload );
	if ( $u_value !== 'no-values' ) {
		return $u_value;
	}

	return add_option( $option, $value, $deprecated, $autoload );
}