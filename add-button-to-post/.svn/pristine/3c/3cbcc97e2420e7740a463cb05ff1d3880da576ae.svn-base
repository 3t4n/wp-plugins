<?php
/*
Plugin Name:	Add Button To Post
Plugin URI:		http://wpcos.com/
Description:	ソーシャルボタンを記事に追加するプラグイン
Version:		1.1.6
Author:			wpcos
Author URI:		http://wpcos.com/
*/

/*  Copyright 2013 wpcos (email : )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function add_button_to_post() {
	if ( !is_admin() && is_single() ) {
		$plugin_url = plugin_dir_url( __FILE__ );
		wp_enqueue_script( 'add-button-social', $plugin_url . 'js/add_button_social.js');
		wp_enqueue_style( 'add-button-to-post-css', $plugin_url . 'css/add_button_to_post.css');
		
		add_filter( 'the_content', 'add_contentbutton');
	}
}
add_action( 'template_redirect', 'add_button_to_post' );

function add_contentbutton( $content ) {
	
	if(get_option('add_cbutton_facebook')) {
		$facebook = '<div id="fb-root"></div><div class="fb-like button_show" data-href="'. get_permalink() .'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>';	
	}
	
	if(get_option('add_cbutton_twitter')) {
		$twitter = '<a href="https://twitter.com/share"><img src="' . plugin_dir_url( __FILE__ ) . 'images/twitter.png" class="button_show" style="border: none;" /></a>';
	}
		
	if(get_option('add_cbutton_googlebk')) {
		$google = '<a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=' . get_permalink() . '&title=' . the_title("","",false) . '" target="_blank" title="Google Bookmarks に追加" rel="nofollow"><img src="http://www.google.co.jp/favicon.ico"  class="button_show" border="0" width="20" height="20" alt="Google Bookmarks に追加" style="border: none;" /></a>';
	}
	
	if(get_option('add_cbutton_hatena')) {
		$hatena = '<a href="http://b.hatena.ne.jp/entry/' . get_permalink() .'" class="hatena-bookmark-button button_a" data-hatena-bookmark-title="' . the_title("","",false) . '" data-hatena-bookmark-layout="simple" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" class="button_show" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>';
	}
	
	if(get_option('add_cbutton_feed')) {
		$rss2 = '<a href="'. get_bloginfo('rss2_url') . '" title=""><img src="' . plugin_dir_url( __FILE__ ) . 'images/rss.png" class="button_show" style="border: none;" /></a>';
	}

	if(get_option('add_cbutton_comment')) {
		$comment = '<div class="add_bt_comment">' .
				get_comments_popup_link( '<img src="' . plugin_dir_url( __FILE__ ) . 'images/comment.png" />', '<img src="' . plugin_dir_url( __FILE__ ) . 'images/comment.png" />', '<img src="' . plugin_dir_url( __FILE__ ) . 'images/comment.png" />' ) .
					'<div class="add_bt_fd">' . get_comments_number('0','1','%','') . '</div>
				</div>';
	}

	$add_buttons =	 
		$facebook .
		$twitter . 
		$google . 
		$hatena . 
		$rss2 . 
		$comment;
		
	if(get_option('add_cbutton_position') == 1) :
		return '<div class="add-button-post">' . $add_buttons . '</div>' . $content;
		
	elseif (get_option('add_cbutton_position') == 0 ) :
		return $content . '<div class="add-button-post">' . $add_buttons . '</div>';
		
	elseif (get_option('add_cbutton_position') == 2 ) :
		return '<div class="add-button-post-left">' . $add_buttons . '</div>' .$content;
		
	elseif (get_option('add_cbutton_position') == 3 ) :
		return $content . '<div class="add-button-post-left">' . $add_buttons . '</div>';
	endif;
}

// 設定ページ登録
function add_contentbutton_plugin_menu() {
  add_options_page('Add Button To Post', 'Add Button To Post', 8, __FILE__, 'add_contentbutton_plugin_options');
}
add_action('admin_menu', 'add_contentbutton_plugin_menu');

// プラグイン有効化時の設定
function add_contentbutton_setting() {
	add_option('add_cbutton_facebook', 1, '', no);
	add_option('add_cbutton_twitter', 1, '', no);
	add_option('add_cbutton_hatena', 1, '', no);
	add_option('add_cbutton_googlebk', 1, '', no);
	add_option('add_cbutton_feed', 1, '', no);
	add_option('add_cbutton_position', 1, '', no);
	add_option('add_cbutton_comment', 1, '', no);
}
register_activation_hook( __FILE__, 'add_contentbutton_setting');

// プラグイン無効化時の処理
function add_contentbutton_deactive() {
}
register_deactivation_hook( __FILE__, 'add_contentbutton_deactive');

// register設定
function admin_addbuttontopost_option() {
	register_setting('add-cbutton-group', 'add_cbutton_facebook');
	register_setting('add-cbutton-group', 'add_cbutton_twitter');
	register_setting('add-cbutton-group', 'add_cbutton_hatena');
	register_setting('add-cbutton-group', 'add_cbutton_googlebk');
	register_setting('add-cbutton-group', 'add_cbutton_feed');
	register_setting('add-cbutton-group', 'add_cbutton_position');
	register_setting('add-cbutton-group', 'add_cbutton_comment');
}
add_action( 'admin_init', 'admin_addbuttontopost_option' );

// 「設定ページ」表示設定
function add_contentbutton_plugin_options() {
	include 'add_button_to_post_setting.php';
}

// get_comments_popup_list関数
function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {     
	global $wpcommentspopupfile, $wpcommentsjavascript;       
	$id = get_the_ID();       
	
	if ( false === $zero ) $zero = __( 'No Comments' );     
	if ( false === $one ) $one = __( '1 Comment' );     
	if ( false === $more ) $more = __( '% Comments' );     
	if ( false === $none ) $none = __( 'Comments Off' );       
	
	$number = get_comments_number( $id );       
	$str = '';       
	
	if ( 0 == $number && !comments_open() && !pings_open() ) {         
		$str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';         
		return $str;     
	}       
	if ( post_password_required() ) {         
		$str = __('Enter your password to view comments.');         
		return $str;     
	} 
	      
	$str = '<a href="';     if ( $wpcommentsjavascript ) {	       
	if ( empty( $wpcommentspopupfile ) )             
		$home = home_url();         
	else            
		$home = get_option('siteurl');         
		$str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;         
		$str .= '" onclick="wpopen(this.href); 
		return false"';     
	} else { // if comments_popup_script() is not in the template, display simple comment link         
		if ( 0 == $number )             
			$str .= get_permalink() . '#respond';         
		else            
			$str .= get_comments_link();         
		$str .= '"';     
	}       
	if ( !empty( $css_class ) ) {         
		$str .= ' class="'.$css_class.'" ';     
	}     
	$title = the_title_attribute( array('echo' => 0 ) );       
	$str .= apply_filters( 'comments_popup_link_attributes', '' );       
	$str .= ' title="' . esc_attr( sprintf( __('Comment on %s'), $title ) ) . '">';
	$str .= get_comments_number_str( $zero, $one, $more );     
	$str .= '</a>';
	
	return $str; 
}

function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {     
	if ( !empty( $deprecated ) )         
		_deprecated_argument( __FUNCTION__, '1.3' );       
		$number = get_comments_number();       if ( $number > 1 )         
		$output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments') : $more);     
	elseif ( $number == 0 )         
		$output = ( false === $zero ) ? __('No Comments') : $zero;     
	else // must be one         
		$output = ( false === $one ) ? __('1 Comment') : $one;       
	return apply_filters('comments_number', $output, $number); 
} 
