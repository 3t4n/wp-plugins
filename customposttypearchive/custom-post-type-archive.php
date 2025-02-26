<?php
	/**
	 * Plugin Name: CustomPostTypeArchive
	 * Plugin URI: http://cloverkuroi.php.xdomain.jp/clover/custom-posttype-archive/
	 * Description: WordPressのデフォルトのカテゴリーウィジェット、アーカイブウィジェット、RSSにカスタム投稿タイプで作成された記事も含めて表示させるプラグインです。 It is a plugin that displays WordPress default category widget, archive widget, RSS including articles created with custom posting type.
	 * Version: 1.1
	 * Author: Naho Osada
	 * Author URI: http://cloverkuroi.php.xdomain.jp/clover/
	 * License: GPL2
	 */

	/**
	 * カテゴリアーカイブ表示のときに、存在するposttypeを追加する
	 */
	function customArcCatCPTA($query) {
		if ( !is_admin() && $query->is_main_query() ) {
			// カテゴリアーカイブ、又はアーカイブが表示されているとき
			if($query->is_archive || $query->is_category) {
				// 存在するポストタイプを取得してクエリに追加
				$postTypes = getPostTypesCPTA();
				$query->set('post_type', $postTypes);
			}
		}
	}

	/**
	 * アーカイブ表示のときに存在するposttypeを追加する
	 */
	function customArcCPTA( $where ){
		// 存在するポストタイプを取得して条件文に追加
		$postTypes = getPostTypesCPTA();
		$typeStrAry = array();
		foreach($postTypes as $type) {
			$typeStrAry[] = "'" . $type . "'";
		}
		$typeStr = implode(',', $typeStrAry);
		$where .= " OR (post_type IN (" . $typeStr . ") AND post_status = 'publish')";
		return $where;
	}

	/**
	 * 存在する投稿タイプを取得
	 * return 取得した投稿タイプ 通常の投稿タイプを含む
	 */
	function getPostTypesCPTA() {
		// カスタム投稿タイプを取得
		$args = array(
				'public' => true,
				'_builtin' => false
		);
		$postTypes = get_post_types($args);
		// 通常投稿タイプを追加
		$postTypes['post'] = 'post';
		return $postTypes;
	}

	/**
	 * RSS投稿タイプにカスタム投稿タイプを反映させる
	 */
	function feedRequestCPTA($vars) {
		if ( isset($vars['feed']) && !isset($vars['post_type']) ){
			$vars['post_type'] = getPostTypesCPTA();
		} else if($vars['name'] == 'feed') {
			$vars['feed'] = 'feed';
			$postType = $vars['post_type'];
			$vars['post_type'] = array();
			$vars['post_type'][] = $postType;
			unset($vars['name']);
			unset($vars[$postType]);
		} else if($vars['attachment'] == 'feed') {
			$vars['feed'] = 'feed';
			$uri = $_SERVER['REQUEST_URI'];
			$uriAry = explode('/', $uri);
			// 一番後ろは不要なので削除
			array_pop($uriAry);
			array_pop($uriAry);
			// 後ろから三つめが投稿名になる
			$vars['name'] = array_pop($uriAry);
			// 後ろから四つ目がカテゴリ名
			$vars['post_type'] = array_pop($uriAry);
		}
		return $vars;
	}

	// RSSにカスタム投稿タイプを反映させる
	add_filter('request', 'feedRequestCPTA');

	// カテゴリーアーカイブ、アーカイブ表示
	add_action( 'pre_get_posts','customArcCatCPTA' );

	// アーカイブウィジェット
	add_filter( 'getarchives_where','customArcCPTA');

