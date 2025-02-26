<?php defined('ABSPATH' ) || wp_die; ?>
<?php
	$title_list	=	array(
		array( 'name' => 'ex',	'type' => 'external',	'title' => __('External Link Settings',		TEXT_DOMAIN )	),
		array( 'name' => 'in',	'type' => 'internal',	'title' => __('Internal Link Settings',		TEXT_DOMAIN )	),
		array( 'name' => 'th',	'type' => 'samepage',	'title' => __('Same Page Link Settings',	TEXT_DOMAIN )	),
	);
	foreach ($title_list as $t) {
		echo	'<div class="pz-page" id="pz-'.$t['type'].'">';
		echo	'<div class="pz-submit-float">';
		submit_button();
		echo	'</div>';

		echo	'<h2>'.$t['title'].$help_open.$t['type'].'-link'.$help_close.'</h2>';

		// テンプレート
		$temp_color			=	'<tr><th scope="row">%s</th><td><input name="properties[%s]" type="color" value="%s" class="pz-sync-text pz-letter-color-code" /><input name="properties[%s]" type="text"  value="%s" class="pz-sync-text" /></td></tr>';
		$temp_text			=	'<tr><th scope="row">%s</th><td><input name="properties[%s]" type="text" value="%s" size="%s" class="%s" %s />%s</td></tr>';
		$temp_checkbox		=	'<tr><th scope="row">%s</th><td><label><input type="hidden" name="properties[%s]" value="" /><input type="checkbox" %s value="1" %s />%s</label></td></tr>';
		$temp_select		=	'<tr><th scope="row">%s</th><td><select %s class="%s" %s >%s</select></td>%s</tr>';

		// 小見出し
		echo	'<h3>'.__('Basic', TEXT_DOMAIN ).'</h3>';
		echo	'<table class="form-table">';

		// 新しいタブで開く
		$item_name			=	$t['name'].'-target';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$item_value		=	esc_attr($prop[$item_name] );
			$item_list		=	LIST_NEWTAB;
			$item_title		=	__('Open New Window/Tab', TEXT_DOMAIN );
			$item_notice	=	'';
			$item_enabled	=	true;
			echo_list($item_name, $item_value, $item_list, $item_title, $item_notice,  $item_enabled );
		} else {
			$item_value		=	'';
			$item_list		=	LIST_INTERNAL;
			$item_enabled	=	false;
			echo_list($item_name, $item_value, $item_list, $item_title, $item_notice,  $item_enabled );
		}

		// 枠線の書式
//		$item_title_c	=	__('Border Style', TEXT_DOMAIN );
//		$item_name_c	=	$t['name'].'-border-color';
//		$item_value_c	=	$prop[$item_name_c];
//		$item_name_s	=	$t['name'].'-border-style';
//		$item_value_s	=	$prop[$item_name_s];
//		$item_list_s	=	LIST_BORDER;
//		$item_name_w	=	$t['name'].'-border-width';
//		$item_value_w	=	$prop[$item_name_w];
//		echo				'<tr><th scope="row">'.$item_title_c.'</th><td>';
//		echo				'<input name="properties['.$item_name_c.']" type="text" value="'.$item_value_c.'" class="pz-wp-color-picker" />';
//		echo				'&ensp;<select name="properties['.$item_name_s.']">';
//		foreach				($item_list_s		as	$item_value	=>	$item_desc ) {
//			echo			'<option value="'.$item_value.'"'.($item_value == $item_value_s ? ' selected="selected"' : '' ).'">'.$item_desc.'</option>';
//		}
//		echo				'</select>&ensp;';
//		$s_list_w		=	LIST_PX;
//		echo				'<select name="properties['.$item_name_w.']">';
//		foreach				($s_list_w		as	$item_value	=>	$item_desc ) {
//			echo			'<option value="'.$item_value.'"'.($item_value == $item_value_w ? ' selected="selected"' : '' ).'">'.$item_desc.'</option>';
//		}
//		echo				'</select>';
//		echo				'</tr>';

		// 枠色
		echo				'<tr><th>'.__('Border Color', TEXT_DOMAIN ).'</th><td>';
		$item_name		=	$t['name'].'-border-color';
		$item_value		=	$prop[$item_name];
		echo				'<label><input type="text"     name="properties['.$item_name.']" value="'.$item_value.'" class="pz-wp-color-picker" />';
		echo				'</td></tr>';

		// 背景色
		echo				'<tr><th>'.__('Background Color', TEXT_DOMAIN ).'</th><td>';
		$item_name		=	$t['name'].'-bg-color';
		$item_value		=	$prop[$item_name];
		echo				'<label><input type="text"     name="properties['.$item_name.']" value="'.$item_value.'" class="pz-wp-color-picker" />';
		echo				'</td></tr>';

		// 背景画像
		$item_name			=	$t['name'].'-image';
		$item_title			=	__('Background Image', TEXT_DOMAIN );
		$item_notice		=	'';
		$item_value			=	'';
		$item_class			=	'large-text';
		$item_maxlength		=	80;
		$item_disabled		=	'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$item_value		=	esc_attr($prop[$item_name] );
		} else {
			if	($t['name']	==	'th' ) {
				$item_value	=	__('It is common with setting Internal-link', TEXT_DOMAIN );
			}
			$item_disabled	=	'disabled="disabled"';
		}
		echo_text($item_name, $item_value, $item_title, $item_notice, $item_class, $item_maxlength, $item_disabled );

//		// 影
//		echo	'<tr><th>'.__('Shadow', TEXT_DOMAIN).'</th><td>';
//		pz_Checkbox($prop, $t['name'].'-shadow', __('Show Card Shadow', TEXT_DOMAIN ) );
//		echo	'</td></tr>';
//
//		// 内側の影
//		echo	'<tr><th>'.__('Inner Shadow', TEXT_DOMAIN ).'</th><td>';
//		pz_Checkbox($prop, $t['name'].'-shadow-inset', __('Show Card Inside-Shadow', TEXT_DOMAIN ) );
//		echo	'</td></tr>';
//
//		// 角丸め
//		echo	'<tr><th>'.__('Rounding of Corners', TEXT_DOMAIN).'</th><td>';
//		pz_Option($prop, $t['name'].'-radius', __('Rounding size', TEXT_DOMAIN ), LIST_RADIUS );
//		echo	'</td></tr>';

		echo			'</table>';

		// 「記事内容」の設定始め
		$item_title		=	__('Article Content',	TEXT_DOMAIN );
		echo			'<h3>'.$item_title.'</h3>';
		echo			'<table class="form-table">';

		// 記事の取得方法
		$item_title	=		__('Get Contents', TEXT_DOMAIN );
		$item_name		=		$t['name'].'-get';
		$item_notice		=		'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$s_name			=	'name="properties['.$item_name.']"';
			$item_class		=	'pz-sync-check';
			$s_switch		=	'';
			$item_value		=	esc_attr($prop[$item_name] );
			$item_value_list	=
				array(
					''			=>	__('Always extract from the latest articles', 								TEXT_DOMAIN ),
					'1'			=>	__('Always use the most recent article content. Prioritize "Excerpt"', 		TEXT_DOMAIN ),
					'3'			=>	__('Always use the most recent article content. Prioritize "Custom-Field"', TEXT_DOMAIN ),
					'2'			=>	__('Always display the contents registered in card management', 			TEXT_DOMAIN ),
				);
			$s_option		=	'';
		} else {
			$s_name			=	'';
			$item_class		=	'';
			$s_switch		=	'disabled="disabled"';
			$item_value		=	'';
			if	($t['name'] == 'th' ) {
				$item_value_list	=	LIST_INTERNAL;
			} else {
				$item_value_list	=	array();
			}
		}
		foreach		($item_value_list		as	$value	=>	$description ) {
			
			if	(($t['name'] == 'ex' ) && ($value == '' || $value == '1' || $value == '3' ) ) {
				$dis		=	'disabled="disabled"';
			} else {
				$dis		=	'';
			}

			$s_option	.=	'<option value="'.$value.'" '.($item_value == $value ? 'selected="selected"' : '' ).' '.$dis.'>'.$description.'</option>';
		}
		echo	sprintf($temp_select,   $item_title, $s_name, $item_class, $s_switch, $s_option, $item_notice );

		// タイトルのカスタムフィールド
		$item_name			=	$t['name'].'-field-title';
		$item_value			=	'';
		$item_list			=	$meta_list;
		$item_title			=	__('Custom Field (Title)',		TEXT_DOMAIN );
		$item_notice		=	'';
		$item_class			=	'';
		$item_disabled		=	null;
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$item_value		=	$prop[$item_name];
		} else {
			if	($t['name'] == 'th' ) {
				$item_value	=	__('It is common with setting Internal-link', TEXT_DOMAIN );
			}
			$item_disabled		=	'disabled="disabled"';
		}
		echo_combo($item_name, $item_value, $item_list, $item_title, $item_notice, $item_class, 99, $item_disabled );

		// 抜粋文のカスタムフィールド
		$item_name			=	$t['name'].'-field-excerpt';
		$item_value			=	'';
		$item_list			=	$meta_list;
		$item_title			=	__('Custom Field (Excerpt)',	TEXT_DOMAIN );
		$item_notice		=	'';
		$item_class			=	'';
		$item_disabled		=	null;
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$item_value		=	$prop[$item_name];
		} else {
			if	($t['name'] == 'th' ) {
				$item_value	=	__('It is common with setting Internal-link', TEXT_DOMAIN );
			}
			$item_disabled		=	'disabled="disabled"';
		}
		echo_combo($item_name, $item_value, $item_list, $item_title, $item_notice, $item_class, 99, $item_disabled );

		// 
		switch	($t['name'] ) {
		case	'ex':
			$item_name		=	null;
			$item_value		=	null;
			$item_title		=	__('Reserved', TEXT_DOMAIN );
			$item_notice	=	__('Reserved', TEXT_DOMAIN );
			$item_enabled	=	false;
			echo	'<tr><th>'.$item_title.'</th><td>';
			echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled );
			echo	'</td></tr>';
			echo	'<tr><th>'.$item_title.'</th><td>';
			echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled );
			echo	'</td></tr>';
			break;

		case	'in':
			$item_name		=	'in-get-url';
			$item_value		=	$prop[$item_name];
			$item_list		=	null;
			$item_title		=	__('Get Redirect', TEXT_DOMAIN );
			$item_notice	=	__('When the `Post ID` can not be acquired, it is acquired again.', TEXT_DOMAIN );
			$item_enabled	=	true;
			echo	'<tr><th>'.$item_title.'</th><td>';
			echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled );
			echo	'</td></tr>';

			$item_name		=	null;
			$item_value		=	null;
			$item_list		=	null;
			$item_title		=	__('Reserved', TEXT_DOMAIN );
			$item_notice	=	__('Reserved', TEXT_DOMAIN );
			$item_enabled	=	false;
			echo	'<tr><th>'.$item_title.'</th><td>';
			echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled );
			echo	'</td></tr>';
			break;

		default:
			$item_name		=	null;
			$item_value		=	null;
			$item_title		=	__('Reserved', TEXT_DOMAIN );
			$item_notice	=	__('It is common with setting Internal-link', TEXT_DOMAIN );
			$item_enabled	=	false;
			echo	'<tr><th>'.$item_title.'</th><td>';
			echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled );
			echo	'</td></tr>';
			echo	'<tr><th>'.$item_title.'</th><td>';
			echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled );
			echo	'</td></tr>';
		}
		echo	'</table>';

		// 「ヘッダー」の設定始め
		$item_title		=	__('Heading',	TEXT_DOMAIN );
		echo			'<h3>'.$item_title.'</h3>';
		echo			'<table class="form-table">';

		// 「ヘッダー」のテキスト
		$item_title			=	__('Text',	TEXT_DOMAIN );
		$item_notice		=	__('When a string is entered, it is overlaid on the top border.', TEXT_DOMAIN );
		$item_class			=	'regular-text';
		$item_name			=	$t['name'].'-heading-text';
		$item_value			=	esc_attr($prop[$item_name] );
		$item_list		=	array(
			__('External site',			TEXT_DOMAIN ),
			__('This site',				TEXT_DOMAIN ),
			__('This page',				TEXT_DOMAIN ),
			__('Reference',				TEXT_DOMAIN ),
		);
		echo			'<tr><th scope="row">'.$item_title.'</th><td>';
		echo			'<label><input type="text" name="properties['.esc_attr($item_name ).']" value="'.esc_attr($item_value ).'" class="'.esc_attr($item_class ).'" list="datalist-'.esc_attr($item_name ).'" /></label>';
		echo			'<datalist id="datalist-'.esc_attr($item_name ).'">';
		foreach			($item_list			as	$value ) {
			echo		'<option value="'.esc_attr($value ).'">'.esc_attr($value ).'</option>';
		}
		echo			'</datalist>';
		if				($item_notice ) {
			echo		'<p>'.$item_notice.'</p>';
		}
		echo			'</td></tr>';
		echo			'</table>';

		// 「ヘッダー」の設定終わり
		echo		'</table>';


		// 「続きを読むボタン」の設定始め
		$item_header		=	__('More',	TEXT_DOMAIN );
		echo			'<h3>'.$item_header.'</h3>';
		echo			'<table class="form-table">';

		// 「続きを読むボタン」のテキスト
		$item_title			=	__('Text',	TEXT_DOMAIN );
		$item_notice		=	__('When a string is entered, it is overlaid on the lower right corner of the article content.', TEXT_DOMAIN );
		$item_class			=	'regular-text';
		$item_name			=	$t['name'].'-more-text';
		$item_value			=	esc_attr($prop[$item_name] );
		$item_list		=	array(
			__('More...',				TEXT_DOMAIN ),
			__('Read more',				TEXT_DOMAIN ),
			__('Go read the article',	TEXT_DOMAIN ),
		);
		echo			'<tr><th scope="row">'.$item_title.'</th><td>';
		echo			'<label><input type="text" name="properties['.esc_attr($item_name ).']" value="'.esc_attr($item_value ).'" class="'.esc_attr($item_class ).'" list="datalist-'.esc_attr($item_name ).'" /></label>';
		echo			'<datalist id="datalist-'.esc_attr($item_name ).'">';
		foreach			($item_list			as	$value ) {
			echo		'<option value="'.esc_attr($value ).'">'.esc_attr($value ).'</option>';
		}
		echo			'</datalist>';
		if				($item_notice ) {
			echo		'<p>'.$item_notice.'</p>';
		}
		echo			'</td></tr>';
		echo			'</table>';

		// 「サイト情報の追加テキスト」の設定始め
		$item_header		=	__('Site Information',	TEXT_DOMAIN );
		echo			'<h3>'.$item_header.'</h3>';
		echo			'<table class="form-table">';

		// 「サイト情報の追加」の枠線
		$item_title			=	__('Text',	TEXT_DOMAIN );
		$item_notice		=	__('Enter a string to display after the site name.', TEXT_DOMAIN );
		$item_class			=	'regular-text';
		$item_name			=	$t['name'].'-added-text';
		$item_value			=	esc_attr($prop[$item_name] );
		$item_list		=	array(
			__('External site',			TEXT_DOMAIN ),
			__('This site',				TEXT_DOMAIN ),
			__('This page',				TEXT_DOMAIN ),
		);
		echo			'<tr><th scope="row">'.$item_title.'</th><td>';
		echo			'<label><input type="text" name="properties['.esc_attr($item_name ).']" value="'.esc_attr($item_value ).'" class="'.esc_attr($item_class ).'" list="datalist-'.esc_attr($item_name ).'" /></label>';
		echo			'<datalist id="datalist-'.esc_attr($item_name ).'">';
		foreach			($item_list			as	$value ) {
			echo		'<option value="'.esc_attr($value ).'">'.esc_attr($value ).'</option>';
		}
		echo			'</datalist>';
		if				($item_notice ) {
			echo		'<p>'.$item_notice.'</p>';
		}
		echo			'</td></tr>';

		// サイトアイコンの取得方法
		$item_title	=			__('How to get Site-Icon', TEXT_DOMAIN );
		$item_name			=	$t['name'].'-favicon';
		$item_notice		=	'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$s_name			=	'name="properties['.$item_name.']"';
			$item_class		=	'';
			$s_switch		=	'';
			$item_value		=	esc_attr($prop[$item_name] );
			$item_value_list	=
				array(
					''		=>	__('None',					TEXT_DOMAIN ),
					'1'		=>	__('Direct',				TEXT_DOMAIN ),
					'13'	=>	__('Direct > Use WebAPI',	TEXT_DOMAIN ),
					'3'		=>	__('Use WebAPI',			TEXT_DOMAIN ),
				);
			$s_option		=	'';
		} else {
			$s_name			=	'';
			$item_class		=	'';
			$s_switch		=	'disabled="disabled"';
			$item_value		=	'';
			$item_value_list	=	LIST_INTERNAL;
		}
		foreach		($item_value_list		as	$value	=>	$description ) {
			
			if	(($t['name'] == 'ex' ) && ($value == '1' || $value =='13' ) ) {
				$dis		=	'disabled="disabled"';
			} else {
				$dis		=	'';
			}

			$s_option	.=	'<option value="'.$value.'" '.($item_value == $value ? 'selected="selected"' : '' ).' '.$dis.'>'.$description.'</option>';
		}
		echo	sprintf($temp_select,   $item_title, $s_name, $item_class, $s_switch, $s_option, $item_notice );

		// サイトアイコンの代替テキスト
		$item_title	=		__('Alternative text', TEXT_DOMAIN );
		$item_name		=		$t['name'].'-favicon-alt';
		$s_len		=		'';
		$item_class	=		'regular-text';
		$item_notice		=		'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$s_name		=	'name="properties['.$item_name.']"';
			$item_value	=	esc_attr($prop[$item_name] );
			$s_switch	=	'';
		} else {
			$s_name		=	'';
			$item_value	=	__('It is common with setting Internal-link', TEXT_DOMAIN );;
			$s_switch	=	'disabled="disabled"';
		}
		echo	sprintf($temp_text, $item_title, $s_name, $item_value, $s_len, $item_class, $s_switch, $item_notice );

		echo	'</table>';

		// 小見出し
		echo	'<h3>'.__('Thumbnail', TEXT_DOMAIN ).'</h3>';
		echo	'<table class="form-table">';

		// サムネイルの取得方法
		$item_title	=		__('Thumbnail', TEXT_DOMAIN );
		$item_name		=		$t['name'].'-thumbnail';
		$item_notice		=		'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$s_name			=	'name="properties['.$item_name.']"';
			$item_class		=	'pz-sync-check';
			$s_switch		=	'';
			$item_value		=	esc_attr($prop[$item_name] );
			$item_value_list	=
				array(
					''			=>	__('None',					TEXT_DOMAIN ),
					'1'			=>	__('Direct',				TEXT_DOMAIN ),
					'13'		=>	__('Direct > Use WebAPI',	TEXT_DOMAIN ),
					'3'			=>	__('Use WebAPI',			TEXT_DOMAIN ),
				);
			$s_option		=	'';
		} else {
			$s_name			=	'';
			$item_class		=	'';
			$s_switch		=	'disabled="disabled"';
			$item_value		=	'';
			$item_value_list	=	LIST_INTERNAL;
		}
		foreach		($item_value_list		as	$value	=>	$description ) {
			$s_option	.=	'<option value="'.$value.'" '.($item_value == $value ? 'selected="selected"' : '' ).'>'.$description.'</option>';
		}
		echo	sprintf($temp_select,   $item_title, $s_name, $item_class, $s_switch, $s_option, $item_notice );

		// サムネイルのサイズ
		$item_title	=		__('Thumbnail Size', TEXT_DOMAIN );
		$item_name		=		$t['name'].'-thumbnail-size';
		$item_notice		=		'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$s_name			=	'name="properties['.$item_name.']"';
			$item_class		=	'pz-sync-check';
			$s_switch		=	'';
			$item_value		=	esc_attr($prop[$item_name] );
			$item_value_list	=
				array(
					'thumbnail'	=>	__('Thumbnail (150px)', TEXT_DOMAIN ),
					'midium'	=>	__('Medium (300px)', TEXT_DOMAIN ),
					'large'		=>	__('Large (1024px)', TEXT_DOMAIN ),
					'full'		=>	__('Original Size', TEXT_DOMAIN ),
				);
			$s_option		=	'';
		} else {
			$s_name			=	'';
			$item_class		=	'';
			$s_switch		=	'disabled="disabled"';
			$item_value		=	'';
			$item_value_list	=	LIST_INTERNAL;
		}
		foreach		($item_value_list		as	$value	=>	$description ) {
			$s_option	.=	'<option value="'.$value.'" '.($item_value == $value ? 'selected="selected"' : '' ).'>'.$description.'</option>';
		}
		echo	sprintf($temp_select,   $item_title, $s_name, $item_class, $s_switch, $s_option, $item_notice );

		// サムネイルの代替テキスト
		$item_title	=		__('Thubnail Alt Text', TEXT_DOMAIN );
		$item_name		=		$t['name'].'-thumbnail-alt';
		$s_len		=		'';
		$item_class	=		'regular-text';
		$item_notice		=		'';
		if	(array_key_exists($item_name, Self::DEFAULTS ) ) {
			$s_name		=	'name="properties['.$item_name.']"';
			$item_value	=	esc_attr($prop[$item_name] );
			$s_switch	=	'';
		} else {
			$s_name		=	'';
			$item_value	=	__('It is common with setting Internal-link', TEXT_DOMAIN );;
			$s_switch	=	'disabled="disabled"';
		}
		echo	sprintf($temp_text, $item_title, $s_name, $item_value, $s_len, $item_class, $s_switch, $item_notice );

		echo	'</table>';

		submit_button();
		echo	'</div>';
	}
