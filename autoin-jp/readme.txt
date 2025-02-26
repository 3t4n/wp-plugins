=== autoin-jp ===
Contributors: ta_terunuma
Donate link: https://autoin.jp/wordpress/
Tags: autoin, efo, zip, address, cross-domain
Requires at least: 5.3
Tested up to: 5.8
Stable tag: 1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==
In this plug-in, Wordpress and autoin.jp are linked in the application.
When it starts,
&lt;script src="https://autoin.jp/js/autoin.js" charset="UTF-8"&gt;&lt;/script&gt;
and
&lt;script src="https://zipaddr.com/js/zipaddrx.js" charset="UTF-8"&gt;&lt;/script&gt;
Is called.

[important]
Any damage that occurs while using autoin-jp will be at your own risk.


= In Japanese: =
次のように動作します。
1.フォーム起動時に「Autoin入力」ボタンを生成する。
2.ボタンのクリックで個人情報ファイルの指示画面が出力される。
（もう一度「Autoin入力」ボタンをクリックすると指示画面が消えます）
3.ファイルを指示すると入力及びファイル情報がautoin.jp側に送られる。
4.入力欄とデータが合成されてフォーム側に返送される。
5.受信内容をフォームに描画して終了する。

= In English: =
It works as follows:
1.Generate "Autoin input" button when form starts.
2.Clicking the button outputs the personal information file instruction screen.
3.When a file is specified, input and file information are sent to autoin.jp.
4.The input field and data are combined and sent back to the form.
5.Draw the received content on the form and exit.


== Installation ==
1. Upload `autoin-jp` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.


== Frequently asked questions ==

== Screenshots ==
1. https://autoin.jp/img/autoin_choice.png


== Changelog ==
= 1.4 =
[2021/9/1]
We checked according to the version of WordPress.

= 1.3 =
[2020/1/24]
Bug fixes for welcart.

= 1.2 =
[2020/1/12]
Added the target form.
Welcart.

= 1.1 =
[2020/1/6]
Added the target form.
TrustForm,NinjaForms.

= 1.0 =
[2019/12/12]
Released as an initial version.


== Upgrade notice ==
