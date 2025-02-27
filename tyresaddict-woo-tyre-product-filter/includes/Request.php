<?php

/**
 * Processing requests
 *
 * @since      1.0.0
 * @package    TyresAddict/TyreFilter
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TyreFilter;


/**
 * Request class
 */
class Request
{
	public static function __callStatic($name, $arguments)
    {                             
    	if ( $name == 'width' || $name == 'profile' )
		    return isset( $_GET[ $name ] ) ? (int) $_GET[ $name ] : 0;

    	if ( $name == 'r' )
		    return isset( $_GET[ 'r' ] ) ? (float) $_GET['r'] : 0;

    	if ( $name == 'car_type' || $name == 'season' )	// arr | TODO
		    return ( isset( $_GET[ $name ] ) && $_GET[ $name ] !== "" ) ? esc_sql( $_GET[ $name ][0] ) : 'all';

    	if ( $name == 'brand' )	// arr | TODO                 
		    return ( isset( $_GET[ $name ] ) && $_GET[ $name ] !== "" ) ? esc_sql( $_GET[ $name ] ) : 'all';
    }

}