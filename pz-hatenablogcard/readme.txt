=== Pz-HatenaBlogCard ===
Contributors: poporon
Tags: post, external link, blogcard
Requires at least: 3.0
Tested up to: 4.8.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plug-in to display a link in the article by using the "Hatena blog card".

== Description ==

This plug-in to display a link in the article by using the "Hatena blog card".

In the case of internal links to view the card that is similar to "Hatena blog card".

Displays using the "Hatena :: Favicon" (http://favicon.hatena.ne.jp) to get the favicon.

Displays using the "bookmark number of Hatena blog API" (http://b.hatena.ne.jp/entry/image/) to get the bookmark number of hatena.

CSS file are stored in a custom folder under `/wp-content/Uploads`.

* Released a plugin " Pz-LinkCard " that can external-links and internal-links also  change the appearance.
  https://wordpress.org/plugins/pz-linkcard/


このプラグインは、ショートコード [blogcard] で指定したURLをカード形式で表示させるものです。

外部リンクの場合には「はてなブログカード」に置き換えて表示します。

内部リンクもしくはtitleパラメータを指定した場合、オリジナルのリンクカード形式で表示します。
このとき、「Hatena::Favicon」を利用してファビコンを表示します。使用するWebAPIは設定画面にて変更できます。サムネイル画像を取得するWebAPIに設定することができます。「はてなブックマーク件数取得API」を利用してはてなブックマーク数を表示します。

また、書式を保持するために、/wp-content/Uploads フォルダ配下にスタイルシートを保存します。


後継として、「はてブカード」の置き換えでは無く、外部リンクも内部リンクもオリジナル形式で表示できる「Pz-LinkCard」を公開しました。

興味のある方は、そちらもお試しいただけると幸いです。

https://wordpress.org/plugins/pz-linkcard/


== Installation ==

= From your WordPress dashboard =

1. `Plugins` menu > `Add New`
2. Search for `Pz-HatenaBlogCard`
3. Install and Activate

= From WordPress.org =

1. Download `pz-hatenablogcard.zip`
2. Upload `pz-hatenablogcard` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

= From Popozure site =

1. Download ZIP file from `http://poporon.poponet.jp/pz-hatenablogcard`
2. Upload `pz-hatenablogcard` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently asked questions ==

= A question that someone might have =

An answer to that question.

== Screenshots ==

1. "Use shortcode [blogcard]"
2. "Display blogcard"
3. "Display blogcard with settings"
4. "Basic settings"
5. "Style settings"
6. "Letters settings"
7. "External link settings"
8. "Internal link settings"
9. "Use WebAPI settings"
10. "For debug settings"
11. "Initializing settings"
12. "Special format 'Celophane tape'"

== Changelog ==

= 1.3.0 =
* WordPress 4.8.2で動作確認を行いました。
* はてなブログカードAPIをSSL対応のURLに修正しました。
* Twitterのツイート数取得をdigitminimi社のcount.jsoonに対応させました。

= 1.2.9 =
* check WordPress 4.7.1.

= 1.2.8 =

* Modefied: Fine adjustment of the CSS.(Thanks yunosuke)

= 1.2.7 =

* Fixed: Fixed a style sheet of the URL that was not able to save
* Added: Guidance message display on the Pz-LinkCard.
* Modefied: Modefied Readme.txt , Added Screenshots

* スタイルシートのURLが保存できていなかったのを修正。
* Pz-LinkCardの案内メッセージ表示を追加。
* Readme.txt の修正、スクリーンショットの追加。

= 1.2.6 =

* Added: Open new window/tab to internal link
* Fixed: Fixed specified error `wp_enqueue_style`
* Fixed: Fixed `Notice`

* 内部リンクでも「新しいウィンドウで開く」の設定を追加。（Thanks 井野本）
* wp_enqueue_style()の実装が誤っていたので修正。
* Noticeを修正。

= 1.2.5 =

* Modified: Set a time-out when take a social-count
* Added: Able to Enclose the entire card at anchor

* カード全体をアンカーで囲って、どこをクリックしてもリンク先へ飛べる設定を追加。（はてブカードには無効）
* ソーシャルカウントのタイムアウトを5秒から1秒に変更。これにより表示されないこともあります。

= 1.2.4 =

* Fixed: Site-informaion missing
* Added: Able to set Site-icon on internal-link
* Added: Able to set letter size

* ver1.2.3で発生した「内部リンク」の「サイト情報」のテキストが消失される不具合を修正。
* 内部リンクのサイトアイコンを直接取得する設定を追加。（WordPress4.3.0以降）（Thanks @misoji_13）
* 「タイトル」「URL」「抜粋文」「サイト情報」の文字サイズを変更できる設定を追加。

= 1.2.3 =

* Modified: Setting item optimize
* Added: add font-color
* Added: add card-height
* Added: add sns-icon-position

* 「ドメイン名」にかかっていたリンクを「サイト情報」の文字まで含めるように変更。
* 「設定画面」の項目を整理。
* 「カードの高さ」の設定を追加。（実際は「記事の情報」の高さになります）
* ソーシャルカウントの表示位置を指定できるように設定を追加。

= 1.2.2 =

* Changed: `get_file_contents` to `wp_remote_get`
* Modified: Favicon vallign `middle` to `top`

* ソーシャルカウントの取得方法を get_file_contents から wp_remote_get へ変更。（Thanks @misoji_13）
* ファビコンの位置を微調整。（Thanks @misoji_13）

= 1.2.1 =

* Added: Able to set the color of letter
* Added: Able to set the background-image
* Added: facebook count, twitter count
* Modified: Able to add `nofollow` to external link
* WordPress 4.3.1

* 「タイトル」「URL」「抜粋文」「サイト情報」の文字色を変更できる設定を追加。
* 背景画像を指定できる設定を追加。
* 外部リンクにnofollow指定が出来るように修正。（Thanks ぽにか）
* 定型書式に新しい効果を追加。
* 「はてなブックマーク」のブックマーク数をAPIで取得してテキストで表示するように修正。
* 「facebook」のシェア数をAPIで取得してテキストで表示するように修正。（Thanks 弁保社長）
* 「Twitter」のツイート数をAPIで取得してテキストで表示するように修正。（Thanks @misoji_13）
* WordPress 4.3.1 で動作確認。

= 1.2.0 =

* アンインストール時にオプション設定とスタイルシートを削除するように修正。
* titleを指定したときに正しく表示されていなかったのを修正。
+ 設定画面を大幅に修正。
* 「上下左右の余白」を追加。右余白の初期値を「16px」に設定。
* 「枠なし」を追加。
* 「内側に影を付ける」を追加。
* カード幅の単位を「px」と「%」のみに制限。
* 「リンク先URL」「抜粋文」「サイト情報」の表示・非表示を選択できる設定を追加。
* 「ショートコードに囲まれた文字列を使用」を追加。
* 「サイト情報」を上側もしくは下側へ配置できる設定を追加。
* 「サイト名称を使用」を追加。（内部リンクのみ有効）
* サムネイルの取得方法を追加。
* 「定型書式」（おまけエフェクト）を追加。実用性は不明。
	* 「セロハンテープ1点」…上に一か所、セロハンテープを貼ったような効果。
	* 「セロハンテープ2点」…左上と右上にセロハンテープを貼ったような効果。上下の文字も巻き込んでシールするのでおもしろいかも。
	* 「斜め」…カードが斜めになった感じの効果。目新しいけど、ちょっとうるさい感じになってしまうかも？
	* 「めくれた紙」…影が記事部の背景の後ろに回り込んでしまうため、ほとんどのテーマで正しく表示できません。はてブカード時の位置、未調整。
* 「リセットCSS」に項目追加。いくつかのテーマとの相性による表示不具合を吸収。（Thanks @okaerinasainet）

= 1.1.8 =
* 設定画面の項目が反映されなかったのを修正。

= 1.1.7c =
* 設定画面のHTMLタグの不備を修正。（h3がタグ全部閉じていませんでした。）

= 1.1.7b =
* スタイルシートが用意されていない場合、自動で生成し直します。（以前のバージョンから移行した場合に対応。）

= 1.1.7 =
* プラグインを更新する度にスタイルシートが削除される不具合の対応。スタイルシートを「/wp-content/uploads」配下に保存します。
* CSS file missed at update always. Therefore, it has to be stored in a folder `/wp-content/uploads`.

= 1.1.6 =
* 特定のWordPressテーマもしくはjQueryを使用している場合、要素のクラス名に「site」等の文字が入っている場合、強制的にスタイルを適用されてしまうことがあったため、一部クラス名を変更しました。

= 1.1.5 =
* WordPress4.3.0での動作確認。
* 「作成にかかった時間を表示する」機能を、「作成にかかった時間をコメントとしてHTMLへ出力する」機能へ変更しました。

= 1.1.4 =
* プラグイン画面の「設定」へのリンクについて、 1.1.2 での実装を誤りましたので修正しました。

= 1.1.2 =
* プラグイン画面に「設定」へのリンクを追加しました
* add "Settings" in Plugins menu page

= 1.1.1 =
* Bug fix
* 「（このサイト内）」と「（このページ）」の初期設定がうまくいっていなかったので元に戻しました。

= 1.1.0 =
* バージョンアップ時のオプションの設定方法を修正。
* 「（このサイト内）」→「(This Site)」、「（このページ）」→「(This Page)」に直した上で日本語化しました。
* 公式プラグインディレクトリでの最初の公開版。
* The first public version (plugin directory)

= 1.0.3 =
* 上下の余白を指定できるように修正。
* 「未定義の配列」の警告（Notice）が出ないように全体を見直し。
* Fixed "Undegined index"
* Add option "Top margin (default:none)" "Margin under (default:16px)"

= 1.0.2 =
* 画像に枠があるテーマで表示がずれてしまうのを修正。（画像のCSSリセット）（Thanks @okaerinasainet）
* Fixed image display (add option "reset CSS for img")

= 1.0.1 =
* サムネイルの右下が欠けてしまう場合があるのを修正。（Thanks 弁保社長）
* Fixed thumbnail display

= 1.0.0 =
* 最初の公開版
* The first public version (my site only)


== Upgrade notice ==
