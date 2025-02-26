<?php
/*
Plugin Name: Attributes for Links
Plugin URI: http://nebster.net
Description: Allow specify rel="nofollow", "title", "class" and "id" attributes for links in visual editor.
Version: 1.2.1
Author: Игорь Тронь
Author URI: http://nebster.net
*/	
	$wpcatles_url = plugin_dir_url( __FILE__ ) ;
	$wpcatles_path = __DIR__ ;
	$wpcatles_url = substr( $wpcatles_url, 0, -1 );
	
	#	Enqueue plugin scripts
	add_action( 'admin_enqueue_scripts', 'wpcatles_admin_scripts', 999 );
	function wpcatles_admin_scripts() {
		global $wpcatles_url ;
		wp_deregister_script('wplink');
		
		wp_enqueue_style( 'wpcatles-editor', $wpcatles_url . '/inc/css/editor.css', array( 'editor-buttons' ), false );
		wp_enqueue_script( 'wplink', $wpcatles_url . '/inc/js/wpcatles.js', '', '', true );
		wp_localize_script('wplink', 'wpLinkL10n', array(
			'title' => __('Insert/edit link'),
			'update' => __('Update'),
			'save' => __('Add Link'),
			'noTitle' => __('(no title)'),
			'linktitle' => __('Link-Title'),
			'linktitle_desc' => __('The html title attribute (optional)'),
			'noMatchesFound' =>__('No matches found.')
		));
	}