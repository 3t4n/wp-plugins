<?php

/*
	Plugin Name: wp-csb-title
	Plugin URI: http://www.cristiansantana.cl/2009/08/wp-plugin-csb-title/
	Description: Generador de titulos. Pequeña ayuda para SEO
	Version: 1.0
	Author: Cristian Santana <codigogpl@gmail.com>
	Author URI: http://www.cristiansantana.cl

	Copyright 2009  Cristian Santana Benavides  (email : codigogpl@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function wp_csb_title( $params ){
	echo wp_csb_gettitle( $params );
}

function wp_csb_gettitle( $params ){

	parse_str( $params , $option );

	if( empty( $option['splitter'] ) )
		$option['splitter'] =  '|' ;

	if( empty( $option['searchtitle'] ) )
		$option['searchtitle'] =  'Search Result' ;

	if( empty( $option['404title'] ) )
		$option['404title'] =  '404' ;

	if( is_home() )
		$titulo = get_bloginfo('name') . $option['splitter'] . get_bloginfo('description');

	elseif( is_single() )
		$titulo = single_post_title( '' , false ) . $option['splitter'] . get_bloginfo('name');

	elseif( is_category() )
		$titulo = single_cat_title( '' , false ) . $option['splitter'] . get_bloginfo('name');

	elseif( is_tag() )
		$titulo = single_tag_title( '' , false ) . $option['splitter'] . get_bloginfo('name');

	elseif( is_search() )
		$titulo = $option['searchtitle'] . $option['splitter'] . get_bloginfo('name');

	elseif( is_404() )
		$titulo = $option['404'] . $option['splitter'] . get_bloginfo('name');

	return $titulo;

}

?>