<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * 表示制御用条件分岐
 *
 * @param string $showtype
 * @param string $postid
 * @param string $pageid
 * @param string $displaytype
 * @param string $logintype
 * @param string $customtype
 * @return boolean
 */
function srbw_is_show( $showtype = '', $postid = '', $pageid = '', $customtype = '' ) {
	if ( empty( $showtype ) && empty( $postid ) && empty( $pageid ) && empty( $customtype ) ) {
		return true;
	}
	/**
	 * 表示条件
	 */
	if ( ! empty( $postid ) && is_single( explode( ',', $postid ) ) ) { // 投稿ページ!
		return true;
	}
	if ( ! empty( $pageid ) && is_page( explode( ',', $pageid ) ) ) { // 固定ページ!
		return true;
	}
	if ( strpos( $showtype, 'post' ) !== false && is_singular( 'post' ) ) {
		return true;
	}
	if ( strpos( $showtype, 'page' ) !== false && ! is_front_page() && ! is_home() && is_page() ) {
		return true;
	}
	if ( ! empty( $customtype ) && is_singular( $customtype ) ) { // カスタム投稿タイプ!
		return true;
	}
	if ( strpos( $showtype, 'front' ) !== false && is_front_page() ) { // トップページ!
		return true;
	}
	if ( strpos( $showtype, 'home' ) !== false && is_home() ) { // インデックス!
		return true;
	}
	if ( strpos( $showtype, 'cat' ) !== false && is_category() ) { // アーカイブ!
		return true;
	}
	if ( strpos( $showtype, 'tag' ) !== false && is_tag() ) {
		return true;
	}
	if ( strpos( $showtype, 'author' ) !== false && is_autor() ) {
		return true;
	}
	if ( strpos( $showtype, 'date' ) !== false && is_date() ) {
		return true;
	}
	if ( strpos( $showtype, 'archive' ) !== false && is_archive() ) {
		return true;
	}

	if ( strpos( $showtype, 'search' ) !== false && is_search() ) { // その他!
		return true;
	}
	if ( strpos( $showtype, '404' ) !== false && is_404() ) {
		return true;
	}
	return false;
}
