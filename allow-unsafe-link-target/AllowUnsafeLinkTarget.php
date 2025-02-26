<?php

namespace GoSuccess;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Plugin Name:	Allow Unsafe Link Target
 * Description: Prevent WordPress from adding <code>rel="noopener noreferrer"</code> to links with <code>target="_blank"</code>.
 * Version:     2.0.0
 * Author:      GoSuccess GmbH
 * Author URI:  https://gosuccess.co
 */

if( !class_exists( 'AllowUnsafeLinkTarget' ) ) {
	
	class AllowUnsafeLinkTarget {
		
		public function __construct() {
			
			add_filter( 'the_content', [$this, 'allow_unsafe_link_target'] );
			
		}
		
		public function allow_unsafe_link_target( $content ) {
			
			return str_replace( [' rel="noopener noreferrer"', ' rel="noreferrer noopener"'], '', $content );
			
		}
		
	}
	
}

new AllowUnsafeLinkTarget;
