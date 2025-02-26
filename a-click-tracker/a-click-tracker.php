<?php
/*
  Plugin Name: a click tracker
  Plugin URI: http://accountingse.net/2012/09/582/
  Description: 全てのaタグのクリックをGoogle Analyticsのイベントに記録します。
  Version: 0.1
  Author: kazuo dobashi
  Author URI: https://twitter.com/kazunii_ac
  License: GPL2
 */

/*  Copyright 2013 kazunii_ac (email : moskov@mcn.ne.jp)

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
wp_enqueue_script('jquery');
if (is_admin()) {
    
} else {
    wp_enqueue_script('a-click-tracker_js', plugins_url() . '/a-click-tracker/a-click-tracker.js');
}
// 管理メニューのアクションフック
add_action('admin_menu', 'admin_menu_a_click_tracker');

// アクションフックのコールバッック関数
function admin_menu_a_click_tracker() {
    // 設定メニュー下にサブメニューを追加:
    add_options_page('a_click_tracker', 'a click tracker', 'manage_options', __FILE__, 'a_click_tracker_explain');
}

function a_click_tracker_explain() {
    ?>

    <div id="a_click_tracker_wrap">
        <h1>a click tracker</h1>
        <div id="a_click_tracker_ja">
            <div>
                <h2>概要</h2>
                このプラグインは、aタグのクリックを全てGoogle Analyticsの「イベント」に記録します。
            </div>
            <div>
                <h2>意図</h2>
                このプラグインは、アフィリエイターさんの利用を想定しています。
				アクセス解析にGoogle Analyticsを使っている方は多いと思いますが、Google Analyticsだと自サイトからユーザが出て行った場合、どこから出て行ったのかがわかりません。
				それを記録できるようにしたのがこのプラグインです。
            </div>
            <div>
                <h2>必要条件</h2> 
                Google Analyticsのコードが貼り付けられている必要があります。
                貼り付け方の制限は特にありません。
                プラグインやテーマの機能で設定されていてもいいですし、テーマに直書きしてもいいです。
                Google Analyticsのサイト上でアクセス状況を見ることができていればOKです。
            </div>
            <div>
                <h2>設定</h2>
                設定作業は一切不要です。プラグインをインストール・有効化すれば動作し始めます。
                つまり、これを読めているあなたのサイトでは既にこのプラグインは動作しています。
            </div>
            <div>
                <h2>解析結果の見方</h2>
				<a href="http://accountingse.net/2013/10/694/" target="_blank">
					http://accountingse.net/2013/10/694/
				</a>
				を参照して下さい。
            </div>
            <div>
                <h2>注意事項</h2>
                このプラグインでトラッキングできるのは、自ドメインのaタグのクリックによる画面遷移のみです。
                このプラグインは主にアフィリエイターさんの使用を想定していますが、アフィリエイトリンクの中にはiframeを使って別ドメインの画像をバナーとして使用している場合もあり、その場合はトラッキングできません。<br />
                日本の主なASP（アフィリエイトサービスプロバイダー）ですと、バリューコマースのバナーリンクはiframeを使用しているらしく、このプラグインではトラッキングできません。ご了承下さい。
            </div>
        </div>
	    <div style="margin:20px;padding:20px;border:#d0d0d0 dotted 5px;">
    	    <div>
				もっと複雑な条件でトラッキングしたい方へ：<br />
				個別のプラグイン開発をお仕事としてお請けします。
				<a href="https://twitter.com/kazunii_ac" target="_blank">
					twitter
				</a>
				または
				<a href="https://www.facebook.com/kazuo.dobashi" target="_blank">
					Facebook
				</a>
				でメッセージを下さい！<br />
				このプラグイン自体の機能拡張も細々と続けていきます。
				ご要望があれば
				<a href="https://twitter.com/kazunii_ac" target="_blank">
					twitter
				</a>
				か
				<a href="https://www.facebook.com/kazuo.dobashi" target="_blank">
					Facebook
				</a>
				でご連絡下さい。
        	</div>
	        <div style="width:100%;text-align:center;padding-top:12px;">
    	        created by 
        	    <a href="https://twitter.com/kazunii_ac" target="_blank">
            	    <img src="https://si0.twimg.com/profile_images/2074468470/_______mini.jpg" />
                	@kazunii_ac
	            </a>
    	  	</div>
	    </div>
    </div>
    <?php
}
?>