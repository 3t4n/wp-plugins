<?php defined('ABSPATH' ) || wp_die; ?>
<?php
// [DEBUG]
$xxxxxxx	=
	array(
		array('id',					__('ID', TEXT_DOMAIN ),							'' ),
		array('url',				__('URL', TEXT_DOMAIN ),							'' ),
		array('title',				__('Title', TEXT_DOMAIN ),						'' ),
		array('excerpt',			__('Excerpt', TEXT_DOMAIN ),						'' ),
		array('charset',			__('Charset', TEXT_DOMAIN ),						' pz-debug-only' ),
		array('domain',				__('Domain', TEXT_DOMAIN ),						'' ),
		array(
			array('sns_twitter',	__('Tw', TEXT_DOMAIN ),							'' ),
			array('sns_facebook',	__('fb', TEXT_DOMAIN ),							'' ),
			array('sns_hatena',		__('B!', TEXT_DOMAIN ),							'' ),
			array('sns_pocket',		__('Po', TEXT_DOMAIN ),							'' ),
		),
		array('regist_time',		__('Regist<br/>Date', TEXT_DOMAIN ),				' pz-debug-only' ),
		array('update_time',		__('Update<br/>Date', TEXT_DOMAIN ),				'' ),
		array('sns_time',			__('SNS<br/>Check<br/>Date', TEXT_DOMAIN ),		' pz-debug-only' ),
		array('alive_time',			__('Alive<br/>Check<br/>Date', TEXT_DOMAIN ),	' pz-debug-only' ),
		array('use_post_id1',		__('Post ID', TEXT_DOMAIN ),						'' ),
		array(
			array('update_result',	__('Result<br/>Code', TEXT_DOMAIN ),				'' ),
			array('alive_result',	__('(Last)', TEXT_DOMAIN ),						'' ),
		),
	);
// [DEBUG]

	// ドメイン一覧
	$mydomain			=	null;
	if	(preg_match('{https?://(.*)/}i', $this->home_url.'/',$m ) ) {
		$mydomain_url	=	$m[0];
		$mydomain		=	$m[1];
	}

	// ドメイン一覧作成
	$domain_list		=	$wpdb->get_results("SELECT domain, count(*) AS count FROM $this->db_name GROUP BY domain ORDER BY domain ASC", ARRAY_A );

	// ドメイン存在チェック
	$refine		=	null;
	if	($param_refine ) {
		foreach	($domain_list as $item ) {
			if	($param_refine	===	$item['domain'] ) {
				$refine			=	$item['domain'];
				break;
			}
		}
	}

	// ソート項目パラメータ
	$column_rec			=	$wpdb->get_results("SELECT * FROM $this->db_name LIMIT 1", ARRAY_A );	// 項目名を取得
	if	(isset($column_rec[0] ) && array_key_exists($orderby, $column_rec[0] ) ) {					// 項目名に存在するかチェック
		$orderby		=	$orderby;																// 存在したら項目名にセットする
	} else {
		$orderby		=	'id';																	// 存在しない項目名の場合 'id' をセットする
	}

	// ソート順パラメータ
	if	($order			===	'asc' ) {
		$order			=	'asc';		// 昇順
	} else {
		$order			=	'desc';		// 降順
	}

	// 抽出条件
	$where				=	null;

	switch	($filter ) {
	case	'all':
		$where			=	"";
		break;
	case	'internal':
		$where			=	"domain = '".$this->domain."'";
		break;
	case	'external':
		$where			=	"domain <> '".$this->domain."'";
		break;
	case	'modify':
		$where			=	"alive_result <> update_result";
		break;
	case	'unlink':
		$where			=	"( alive_result < 100 OR alive_result >= 400 )";
		break;
	default:
		if	($this->options['flg-alive'] && $this->options['flg-alive-count']) {
			$filter		=	'unlink';
			$where		=	"( alive_result < 100 OR alive_result >= 400 )";
		} else {
			$filter		=	'all';
			$where		=	"";
		}
	}	

	// キーワード指定
	$param				=	array();
	if	($keyword ) {
		$like			=	'%' . $wpdb->esc_like($keyword ) . '%';
		$param[]		=	$like;
		$param[]		=	$like;
		if	($where ) {
			$where		.=	" AND ";
		}
		$where			.=	"( title LIKE '%s' OR excerpt LIKE '%s' )";
	}

	// ドメイン指定
	if	($refine ) {
		$param[]		=	$refine;
		if	($where ) {
			$where		.=	" AND ";
		}
		$where			.=	"domain = %s";
	}

	// 検索SQL作成
	$sql				=	"SELECT * FROM $this->db_name";
	if	($where ) {
		$sql			.=	" WHERE $where";
	}
	if	($orderby ) {
		$sql			.=	" ORDER BY $orderby $order";
	}
	if	(strpos($sql, 'UPDATE' ) || strpos($sql, 'UNION' ) ) { // 気持ち程度のインジェクション対策
		$sql			=	null;
	}

	// データ抽出（パラメータ個数による）
	switch	(count($param ) ) {
	case	1:
		$data_now	=	$wpdb->get_results($wpdb->prepare($sql, $param[0] ) );
		break;
	case	2:
		$data_now	=	$wpdb->get_results($wpdb->prepare($sql, $param[0], $param[1] ) );
		break;
	case	3:
		$data_now	=	$wpdb->get_results($wpdb->prepare($sql, $param[0], $param[1], $param[2] ) );
		break;
	default:
		$data_now	=	$wpdb->get_results($sql );
		break;
	}
	$count_now		=	count($data_now );

	// ページ数
	$page_limit		=	10;																						// ページ内の行数
	$page_min		=	($count_now > 0 ? 1 : 0 );																// 最初のページ
	$page_max		=	ceil($count_now /	$page_limit );														// 最後のページ
	$page_now		=	$page_now		<	$page_min	?	$page_min		:	
						($page_now		>	$page_max	?	$page_max		:	$page_now );					// 現在のページ
	$page_prev		=	$page_now		>	$page_min	?	$page_now - 1	:	null;							// 前のページ
	$page_next		=	$page_now		<	$page_max	?	$page_now + 1	:	null;							// 次のページ
	$page_top		=	$page_now		<	1			?	0				:	($page_now - 1 ) * $page_limit;	// 表示中のページの最初に表示するのが何件目か

	// 件数確認
	$sql			=	"SELECT COUNT( * ) AS count_all, ";
	$sql			.=	"COUNT( CASE WHEN domain = '" .$this->domain."' THEN 1 END ) AS count_internal, ";
	$sql			.=	"COUNT( CASE WHEN domain <> '".$this->domain."' THEN 1 END ) AS count_external, ";
	$sql			.=	"COUNT( CASE WHEN alive_result <> update_result THEN 1 END ) AS count_modify, ";
	$sql			.=	"COUNT( CASE WHEN ( alive_result < 100 OR alive_result >= 400 ) THEN 1 END ) AS count_unlink ";
	$sql			.=	"FROM $this->db_name";
	$result			=	$wpdb->get_row($sql );
	if	(isset($result ) ) {
		$count_list['all'	  ]	=	isset($result->count_all )		?	$result->count_all		:	0;
		$count_list['internal']	=	isset($result->count_internal )	?	$result->count_internal	:	0;
		$count_list['external']	=	isset($result->count_external )	?	$result->count_external	:	0;
		$count_list['modify'  ]	=	isset($result->count_modify )	?	$result->count_modify	:	0;
		$count_list['unlink'  ]	=	isset($result->count_unlink )	?	$result->count_unlink	:	0;
	}

	// ページネーション
	$temp_button	=	'&nbsp;<button type="submit" name="page_button" value="%d" class="button tablenav-pages-navspan" %s>%s</button>';
	$temp_text		=	'<span class="paging-input"><input type="text" name="page_trans" value="%d" id="current-page-selector" class="pz-sync-text current-page" size="2" aria-describedby="table-paging" /><span class="total-pages">&nbsp;/&nbsp;%d</span></span>';
	$paging			=
		'<div class="pz-man-pages tablenav-pages"><span class="displaying-num">'.sprintf(($count_now === 1 ? __('%s item', TEXT_DOMAIN ) : __('%s items', TEXT_DOMAIN ) ), number_format($count_now ) ).'</span><span class="pagination-links">'.
		sprintf($temp_button,	($page_min ),		(($page_now > $page_min ) ? '' : 'disabled="disabled"' ),	__('&laquo;',	TEXT_DOMAIN ) ).		// 最初のページ
		sprintf($temp_button,	($page_now - 1 ),	(($page_now > $page_min ) ? '' : 'disabled="disabled"' ),	__('&lsaquo;',	TEXT_DOMAIN ) ).		// 前のページ
		'&nbsp;'.
		sprintf($temp_text,		$page_now,			$page_max ).																						// 今のページ
		sprintf($temp_button,	($page_now + 1 ),	(($page_now < $page_max ) ? '' : 'disabled="disabled"' ),	__('&rsaquo;',	TEXT_DOMAIN ) ).		// 次のページ
		sprintf($temp_button,	($page_max ),		(($page_now < $page_max ) ? '' : 'disabled="disabled"' ),	__('&raquo;',	TEXT_DOMAIN ) ).		// 最後のページ
		'</span></div>';
?>
	<div class="pz-man-count-list">
		<?php
			$items	=
				array(
					'all'		=>	__('All',      TEXT_DOMAIN ),
					'internal'	=>	__('Internal', TEXT_DOMAIN ),
					'external'	=>	__('External', TEXT_DOMAIN ),
					'modify'	=>	__('Modify',   TEXT_DOMAIN ),
					'unlink'	=>	__('Unlink',   TEXT_DOMAIN ),
				);
			$sep		=	'';
			foreach	($items as $i_code => $i_name ) {
				echo	$sep;
				echo	'<button type="submit" name="filter" value="'.$i_code.'" class="pz-filter-item"><span class="pz-filter-label'.($filter === $i_code ? ' pz-current' : '').'">'.$i_name.'</span><span class="pz-filter-count">'.esc_attr('('.number_format($count_list[$i_code] ).')' ).'</span></button>';
				$sep	=	' | ';
			}
		?>
	</div>
	
	<div class="pz-man-search">
		<p class="search-box" title="<?php _e('Text search by title and excerpt', TEXT_DOMAIN ); ?>">
			<label>
				<span><?php echo __('&#x1f50d;&#xfe0f;', TEXT_DOMAIN ); ?></span>
				<input  type="search"  id="post-search-input" name="keyword" value="<?php echo $keyword ; ?>" />
				<button type="submit"  id="search-submit"     name="action"  value="search" class="button action"><?php _e('Search', TEXT_DOMAIN ); ?></button>
			</label>
		</p>
	</div>
	
	<div class="pz-man-navi tablenav top">
		<div class="pz-man-batch-list alignleft actions bulkactions">
			<select name="bulk_action" id="bulk-action-selector-top">
				<option value="" selected="selected"><?php _e('Bulk Actions', TEXT_DOMAIN ); ?></option>
				<option value="renew"><?php _e('Renew Cache', TEXT_DOMAIN ); ?></option>
				<option value="renew_thumbnail"><?php _e('Renew Thumbnail Image', TEXT_DOMAIN ); ?></option>
				<option value="renew_sns"><?php _e('Renew SNS Count', TEXT_DOMAIN ); ?></option>
				<option value="renew_postid"><?php _e('Renew Post ID', TEXT_DOMAIN ); ?></option>
				<option value="alive"><?php _e('Check Status', TEXT_DOMAIN ); ?></option>
				<option value="delete"><?php _e('Delete from Cache', TEXT_DOMAIN ); ?></option>
			</select>
			<button type="submit" name="action" value="exec-batch" class="button action" onclick="return confirm(\''.__('Are you sure?', TEXT_DOMAIN ).'\' );"><?php _e('Apply', TEXT_DOMAIN ); ?></button>
			&nbsp;
		</div>
		
		<div class="pz-man-domain-list alignleft actions bulkactions">
			<select name="refine" id="bulk-action-selector-top">
				<option value="" selected="selected"><?php _e('All Domain', TEXT_DOMAIN ); ?></option>
					<?php
						foreach	($domain_list as $rec ) {
							if (isset($rec['domain'] ) === true && isset($rec['count'] ) === true) {
								$disp_domain	=	(function_exists('idn_to_utf8' ) && mb_substr($rec['domain'], 0, 4) === 'xn--') ? idn_to_utf8($rec['domain'], 0, INTL_IDNA_VARIANT_UTS46 ) : $rec['domain'] ;
								$selected		=	($rec['domain'] === $refine) ? ' selected="selected"' : null ;
								echo	'<option value="'.htmlspecialchars($rec['domain'] ).'"'.$selected.'>'.htmlspecialchars($disp_domain ).' ('.$rec['count'].')</option>';
							}
						}
					?>
				</select>
			<button type="submit" name="action" value="select-domain" class="button action"><?php _e('Refine Search', TEXT_DOMAIN ); ?></button>
		</div>
		<?php /* ページネーション */ echo $paging; ?>
		<br class="clear">
	</div>

	<table class="pz-man-cache-list widefat striped">
		<thead>
			<tr>
				<td id="cb" class="pz-man-head-check manage-column column-cb check-column"><input id="cb-select-all-1" type="checkbox" /></td>
<?php
	$asc_chr	=	'<span class="pz-man-head-orderby">'.__('&#x1f53c;&#xfe0f;', TEXT_DOMAIN ).'</span>';
	$desc_chr	=	'<span class="pz-man-head-orderby">'.__('&#x1f53d;&#xfe0f;', TEXT_DOMAIN ).'</span>';

	$item		=	'id';
	$item_name	=	__('ID', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'url';
	$item_name	=	__('URL', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'title';
	$item_name	=	__('Title', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'excerpt';
	$item_name	=	__('Excerpt', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'charset';
	$item_name	=	__('Charset', TEXT_DOMAIN );
	$add_class	=	' pz-debug-only';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'domain';
	$item_name	=	__('Domain', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'sns_twitter';
	$item_name	=	__('Tw', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'">';
	echo	'<button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button>';
	// echo	'</th>';
	echo	'<br/>';
	$item		=	'sns_facebook';
	$item_name	=	__('fb', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	// echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'">';
	echo	'<button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button>';
	// echo	'</th>';
	echo	'<br/>';
	$item		=	'sns_hatena';
	$item_name	=	__('B!', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	// echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'">';
	echo	'<button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button>';
	// echo	'</th>';
	echo	'<br/>';
	$item		=	'sns_pocket';
	$item_name	=	__('Po', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	// echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'">';
	echo	'<button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button>';
	echo	'</th>';

	$item		=	'regist_time';
	$item_name	=	__('Regist<br/>Date', TEXT_DOMAIN );
	$add_class	=	' pz-debug-only';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'update_time';
	$item_name	=	__('Update<br/>Date', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'sns_time';
	$item_name	=	__('SNS<br/>Check<br/>Date', TEXT_DOMAIN );
	$add_class	=	' pz-debug-only';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'alive_time';
	$item_name	=	__('Alive<br/>Check<br/>Date', TEXT_DOMAIN );
	$add_class	=	' pz-debug-only';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'use_post_id1';
	$item_name	=	__('Post ID', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'"><button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button></th>';

	$item		=	'update_result';
	$item_name	=	__('Result<br>code', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'">';
	echo	'<button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button>';
	// echo	'</th>';
	echo	'<br/>';
	$item		=	'alive_result';
	$item_name	=	__('(Last)', TEXT_DOMAIN );
	$add_class	=	'';
	$sort		=	($orderby === $item ? ($order === 'desc' ? $desc_chr : $asc_chr ) : '' );
	// echo	'<th scope="col" class="pz-man-head-'.$item.$add_class.'">';
	echo	'<button type="submit" name="header" value="'.$item.'">'.$item_name.$sort.'</button>';
	echo	'</th>';
?>
			</tr> 
		</thead>
		<tbody>
			<?php
				for ($i = $page_top; $i <= ($page_top + $page_limit - 1 ); $i++ ) {
					if	($i >= count($data_now ) ) {
						break;
					}
					$data		=	$data_now[$i];

					// データID
					$data_id	=	$data->id;

					// URL
					$url		=	$data->url;

					// URL解析（自サイトチェック）
					$url_info		=	$this->Pz_GetURLInfo($url );
					$scheme			=	$url_info['scheme'];		// スキーム
					$domain			=	$url_info['domain'];		// ドメイン名
					$domain_url		=	$url_info['domain_url'];	// ドメインURL
					$is_external	=	$url_info['is_external'];	// 外部リンク
					$is_internal	=	$url_info['is_internal'];	// 内部リンク
					$is_samepage	=	$url_info['is_samepage'];	// 同一ページ

					// URLの警告マーク
					$html_url_error		=	'';
					if	($data->alive_result < 100 || $data->alive_result >= 400 ) {
						if	($data->no_failure ) {		// エラー無視が有効か
							$temp_icon	=	__('&#x26a0;&#xfe0f;', TEXT_DOMAIN );		// ⚠️
							$temp_class	=	'pz-man-body-url-error-ignore';			// エラー無視
							$temp_title	=	__('The latest HTTP code is in error, but ignore it.', TEXT_DOMAIN );
						} else {
							$temp_icon	=	__('&#x26d4;&#xfe0f;', TEXT_DOMAIN );		// ⛔️エラー
							$temp_class	=	'pz-man-body-url-error';				// エラー
							$temp_title	=	__('The latest HTTP code is in error. You can change it to ignore the error from the edit screen.', TEXT_DOMAIN );
						}
						$html_url_error	=	'<span class="'.$temp_class.'" title="'.$temp_title.'">'.$temp_icon.'</span>&nbsp;';
					}

					// 表示用のURL
					if	($is_internal ) {
						$temp_href		=	esc_url($url );
						$temp_rel		=	'internal';
						$temp_target	=	'_self';
					} else {
						$temp_href		=	esc_url($url );
						$temp_rel		=	'external noopenner noreferrer';
						$temp_target	=	'_blank';
					}
					$html_url			=	'<a href="'.$temp_href.'" title="'.$temp_href.'" rel="'.$temp_rel.'" target="'.$temp_target.'">'.esc_url($this->pz_DecodeURL($url ) ).'</a>';
//					$html_url			=	'<span title="'.$temp_href.'">'.esc_url($this->pz_DecodeURL($url ) ).'</span>';

					// タイトル
					$title			=	esc_attr(stripslashes($data->title ) );		// 代入しながら判定
					$html_title		=	mb_strimwidth($title, 0, 200 , '...' );		// 200文字にする
					if	($data->title	<>	$data->regist_title ) {
						$html_title		=	'<b>'.$html_title.'</b>';
					}

					// 抜粋文
					if			($str	=	$data->excerpt ) {						// 代入しながら判定
						if		($str	=	strip_tags($str ) ) {					// HTMLタグ除去
							if	($str	=	esc_html($str ) ) {						// HTMLエスケープ
								$str	=	mb_strimwidth($str, 0, 500 , '...' );	// 500文字にする
							}
						}
					}
					$excerpt			=	$str;
					$html_excerpt		=	$str;
					if	($data->excerpt	<>	$data->regist_excerpt ) {
						$html_excerpt	=	'<b>'.$html_excerpt.'</b>';
					}

					// SNSカウント
					$html_sns	=	sns_counter($data->sns_twitter  ).'<br/>';
					$html_sns	.=	sns_counter($data->sns_facebook ).'<br/>';
					$html_sns	.=	sns_counter($data->sns_hatena   ).'<br/>';
					$html_sns	.=	sns_counter($data->sns_pocket   ).'<br/>';

					// サムネイル
					$thumbnail_url				=	null;
					$html_thumbnail				=	null;
					if	($domain === $this->domain ) {
						$post_id				=	url_to_postid($data->url );											// 記事IDを取得
						$thumbnail_id			=	get_post_thumbnail_id($post_id );									// サムネイルIDを取得
						if	($thumbnail_id ) {
							$thumbnail_size		=	$this->options['in-thumbnail-size'] ? $this->options['in-thumbnail-size'] : 'thumbnail' ;
							$attach				=	wp_get_attachment_image_src($thumbnail_id, $thumbnail_size, true );	// サムネイルを取得
							if	(isset($attach ) && count($attach ) > 3 && isset($attach[0]) ) {
								$thumbnail_url		=	$attach[0];
								if	(preg_match('/.*(\/\/.*)/', $thumbnail_url, $m ) ) {		// スキームを外す
									$thumbnail_url	=	$m[1];
								}
							}
						}
					} else {
						if	($data->thumbnail ) {
							$thumbnail_url		=	$this->pz_GetThumbnail($data->thumbnail );
						}
					}
					if	($thumbnail_url ) {
						$html_thumbnail			=	'<a href="'.esc_url($thumbnail_url ).'" target="_blank" class="pz-man-thumbnail"><div><img src="'.esc_url($thumbnail_url ).'" alt="" class="pz-man-thumbnail-img"></div></a>';
					}

					// 記事ID
					$html_post_id		=	null;
					for	($j = 1; $j < 5; $j++ ) {
						$use_post_id	=	'use_post_id'.$j;
						$post_id		=	$data->$use_post_id;
						if	($post_id > 0 ) {
							$html_post_id	.=	'<a href="'.esc_url(get_permalink($post_id ) ).'" target="_blank" title="'.get_the_title($post_id ).'">'.$post_id.'</a><br/>';
						}
					}

					// HTTPレスポンス
					$html_result		=	'<span class="pz-man-body-result-update">'.strHTTPCode($data->update_result, $this->pz_HTTPMessage($data->update_result ) ).'</span>';
					if	($data->update_result <> $data->alive_result ) {
						$html_result	.=	'<br/><span class="pz-man-body-result-alive">('.strHTTPCode($data->alive_result, $this->pz_HTTPMessage($data->alive_result ) ).')</span>';
					}
					if	($data->no_failure ) {
						$html_result	=	'<span class="pz-man-body-result-ignore">'.__('Ignore', TEXT_DOMAIN ).'</span><br/>'.$html_result;
					}

					// HTML 明細行
			?>
			<tr>
				<th scope="row" class="pz-man-body-check check-column"><input id="cb-select-<?php echo $data_id; ?>" type="checkbox" name="select_id[]" value="<?php echo $data_id; ?>" /><div class="locked-indicator"></div></th>
				<td class="pz-man-body-id"><?php echo $data_id.$html_thumbnail; ?></td>
				<td colspan="2">
					<div class="pz-man-body-url"><?php echo $html_url; ?></div>
					<div class="pz-man-body-title"><span title="<?php echo esc_attr($title ); ?>"><?php echo $html_title; ?></span></div>
					<div id="inline_<?php echo $data_id; ?>" class="pz-man-body-menu row-actions">
						<button type="submit" name="single-edit"   value="<?php echo intval($data_id ); ?>" class="pz-man-inline-menu"><?php _e('Edit',TEXT_DOMAIN ); ?></button> | 
						<button type="submit" name="single-renew"  value="<?php echo intval($data_id ); ?>" class="pz-man-inline-menu" onclick="return confirm(<?php echo "'".__('Are you sure?', TEXT_DOMAIN )."'"; ?> );"><?php _e('Renew',TEXT_DOMAIN ); ?></button> | 
						<button type="submit" name="single-delete" value="<?php echo intval($data_id ); ?>" class="pz-man-inline-menu" onclick="return confirm(<?php echo "'".__('Are you sure?', TEXT_DOMAIN )."'"; ?> );"><?php _e('Delete',TEXT_DOMAIN ); ?></button>
					</div>
				</td>
				<td><div class="pz-man-body-excerpt" title="<?php echo esc_attr($excerpt); ?>"><?php echo $html_excerpt; ?></div></td>
				<td class="pz-man-body-charset pz-debug-only"><?php echo htmlspecialchars($data->charset ); ?></td>
				<td>
					<div class="pz-man-body-domain">
						<?php
							$disp_domain	=	(function_exists('idn_to_utf8' ) && mb_substr($domain, 0, 4) === 'xn--') ? idn_to_utf8($domain, 0, INTL_IDNA_VARIANT_UTS46 ) : $domain ;
							$disp_sitename	=	esc_html($data->site_name );
						?>
						<span class="pz-man-body-domain"   title="<?php echo $disp_domain;   ?>"><?php echo $disp_domain;   ?></span><br/>
						<span class="pz-man-body-sitename" title="<?php echo $disp_sitename; ?>"><?php echo $disp_sitename; ?></span>
					</div>
				</td>
				<td class="pz-man-body-sns"><?php echo $html_sns; ?></td>
				<td class="pz-man-body-resist-time pz-debug-only"><?php $dt=$data->regist_time; ?><span title="<?php echo date(DATETIME_FORMAT, $dt ); ?>"><?php echo $this->pz_Date($this->options['date-format-man'], $dt ); ?></span></td></td>
				<td class="pz-man-body-update-time"><?php $dt=$data->update_time; ?><span title="<?php echo date(DATETIME_FORMAT, $dt ); ?>"><?php echo $this->pz_Date($this->options['date-format-man'], $dt ); ?></span></td></td>
				<td class="pz-man-body-sns-time pz-debug-only"><?php $dt=$data->sns_time; ?><span title="<?php echo date(DATETIME_FORMAT, $dt ); ?>"><?php echo $this->pz_Date($this->options['date-format-man'], $dt ); ?></span></td></td>
				<td class="pz-man-body-alive-time pz-debug-only"><?php $dt=$data->alive_time; ?><span title="<?php echo date(DATETIME_FORMAT, $dt ); ?>"><?php echo $this->pz_Date($this->options['date-format-man'], $dt ); ?></span></td></td>
				<td class="pz-man-body-post-id"><?php echo $html_post_id; ?></td>
				<td class="pz-man-body-result"><?php echo $html_result; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="pz-man-navi tablenav"><?php /* ページネーション */ echo $paging; ?></div>
<?php
	// ファイルメニュー（インポート・エクスポート）
	if	($this->options['flg-filemenu'] ) {
		echo	'<div  class="pz-man-filemenu"><span class="pz-man-filemenu-icon">'.__('&#x1f4c4;&#xfe0f;', TEXT_DOMAIN ).'</span><span class="pz-man-filemenu-text">'.__('File Menu', TEXT_DOMAIN ).'</span><button type="submit" name="action" value="show-import" class="pz-man-filemenu-button button">'.__('Import From Local File', TEXT_DOMAIN ).'</button><button type="submit" name="action" value="show-export" class="pz-man-filemenu-button button">'.__('Export To Local File', TEXT_DOMAIN ).' ('.sprintf(($count_list['all'] == 1 ? __('%s item', TEXT_DOMAIN ) : __('%s items', TEXT_DOMAIN ) ), number_format($count_list['all'] ) ).')'.'</button></div>';
	}

// 関数

// HTTP結果コード
function strHTTPCode($result, $message ) {
	if	($message ) {
		$message	=	' title="'.$message.'"';
	}
	if	(($result === 0 ) || ($result >= 100 && $result <= 399 ) ) {
		return	'<span class="pz-http-ok"'.$message.'>'.$result.'</span>';
	}
	return		'<span class="pz-http-error"'.$message.'">'.$result.'</span>';
}

// SNSカウントの表示（kilo → k , million → m）
function sns_counter($count ) {
	$count		=	intval($count );
	if	($count < 0) {
		return	'-';
	}
	if			($count >= 10000000 ) {
		return	number_format($count / 1000000 ).'&nbsp;m';
	} elseif	($count >= 1000 ) {
		return	number_format($count / 1000 ).'&nbsp;k';
	} else {
		return	number_format($count );
	}
}
