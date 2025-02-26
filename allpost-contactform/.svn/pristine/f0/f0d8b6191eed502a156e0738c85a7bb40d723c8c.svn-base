=== All Post Contact Form ===
Contributors: rainbowlinkinc
Donate link: https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RLF16ja&link_id=wp
Tags: contact form, form mail, mail form, form, contact 
Requires at least: 4.7.3
Tested up to:  6.7.1
Stable tag:  1.7.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

サイト訪問者は、あなたが設定したhtmlフォームにデータを入力します。このプラグインは、そのデータを受けるための確認画面と、送信完了画面とを生成し、表示します。そして、最終的に、入力されたデータを、メールとして、任意のメールアドレスに届けます。初期設定の件名は、「You got a mail.[via All Post Contact Form] IPアドレス」ですが、フォームに応じて、完全に御社独自の件名に置き換えることができます。
また、本プラグインは、メールボックスに1分間に600通といったレベルで同一のお問い合わせを送りつける「爆撃」からあなたのメールボックスを守ります。

== Description ==

サイト訪問者は、あなたが設定したhtmlフォームにデータを入力します。このプラグインは、そのデータを受けるための確認画面と、送信完了画面とを生成し、表示します。そして、最終的に、入力されたデータを、メールとして、任意のメールアドレスに届けます。

- 実物デモをご覧ください。
https://www.secure-formmail.net/?tag=all-post-contact-form%e3%81%ae%e3%83%87%e3%83%a2

このプラグインは、「POSTで渡されるすべてのデータを、あなたが指定したメールアドレスに送信するコンタクトフォーム」です。あなたは、「固定ページ」や「投稿」で、htmlフォームを自由に、いくつでも、作ることができます。「お問い合わせフォーム」はもちろん、「資料請求フォーム」、「苦情処理フォーム」など、あらゆるお問い合わせフォームをこのプラグイン１つで動かすことができます。初期設定の件名は、「You got a mail.[via All Post Contact Form] IPアドレス」ですが、フォームに応じて、完全に御社独自の件名に置き換えることができます。

input　textarea　checkboxなどhtmlフォームのフォーム要素には、「name=」と「value=」とがあります。「name=」の右辺には、あなたがあらかじめ設定した項目が出力され、「value=」の右辺には、あなたのサイト訪問者が入力する内容が出力されます。このプラグインは、あなたのサイト訪問者が入力した項目だけを選んで、「name=」と「value=」とをワンセットにして１行に出力します。「確認画面」と「送信完了画面」においては、それを表として表示します。name=の右辺は、日本語で指定できます。

- あなたが設定する項目
<input type="text" name="お名前">
<input type="text" name="電話番号">

- 訪問者があなたが設定した項目に入力すれば、このプラグインは、あなたが設定した項目と、訪問者が入力した内容とを、次のように１行で表示します。
お名前：　和明戸　布麗子
電話番号：　123-4567-8910


【使い方】
(0)「固定ページ」や「投稿」で、htmlフォームをご作成ください。（　htmlを知らないかたでも、ボタンクリックでhtmlフォームを作成することができるサイトがあります。FAQでご紹介しております。ぜひご覧ください。　）
(1) このプラグインを有効にしてください。
(2)管理画面の「設定　＞　コンタクトフォーム」で、このプラグインをご設定ください。/assets/screenshot-7.pngをご参照ください。お使いのブラウザー設定を日本語にすることで、screenshot-7.pngのように管理画面を日本語で表示することができます。（　ブラウザーの言語設定で、English<=>Japanese を切り替えることができます。ワードプレス本体の言語設定を変更する必要はありません　）。
(3) (2)で、ショートコードをコピーし、そのショートコードを「投稿」や「固定ページ」の新しいページに貼り付けてください。
ショートコードは、[rlallpostcontactform]です。設定例は、/allpost-contactform/assets/screenshot-8.pngです。「投稿」に貼り付ける場合はコメントを受け付けないようにしてください（コメントを受け付けないようにする方法：「ディスカッション」の欄にて、 「コメントの投稿を許可する。」のチェックを外してください）。
(4) (3)のパーマリンクを使って、(0)のhtmlフォームを完成させてください。具体的には、
<pre><code> 
<form action="(3)のパーマリンク" method="POST" name="rl_apcf" onsubmit="return checkForm()" enctype="multipart/form-data">
</code></pre>
を、(0)のhtmlフォームの上部に書き込んでください。設定例は、/allpost-contactform/assets/screenshot-9.pngです。


【利点】
- ひとつの同じショートコード ( [rlallpostcontactform] ) で、あらゆるhtmlフォームを動かすことができます。

- 「確認画面」と「送信完了画面」のデザインはご変更になれます。デザインのご変更には、
「allpost-contactform.css」をご利用ください。

- 添付ファイルを受け取ることができます。アップロードファイルのname=には必ず"attachment_file"をご設定ください。
<input id="" name="attachment_file" class="" type="file"/> 

- v.1.6.2から、添付ファイルをサーバー内に保存しておくこともできるようになりました。管理画面でご設定ください。
添付ファイルが格納される場所は、/wp-content/apcf_att の中です。
アクセス制限のためにご用意したものは、apache2.2とapache2.4用の.htaccessファイルだけです。apache2.2とapache2.4以外のウェブサーバーをお使いのかたは、ご自分で適宜アクセス制限をなさってください。apache2.2とapache2.4をお使いのかたも、念のため、アップロードファイルに直接アクセスしてみて、アクセスできないことをご確認ください。

- フォームに応じて独自の件名をつけることができます。
https://jp.Rainbow-Link.com/FAQ.htm?&faq_id=318
* 完全に件名を独自なものに置き換えたい場合
<input type="hidden" name="custom_apcf_subject" value="独自の件名">
* 初期設定の件名（「You got a mail.[via All Post Contact Form] IPアドレス」）に独自の件名を付け加えたい場合
<input type="hidden" name="custom_apcf_subject_sub" value="独自の件名">

- 一つのフォームに、複数の件名を設定することもできます。プルダウンやチェックボックスなどで選択肢として表示することができます。（v.1.5.4以降）
https://jp.Rainbow-Link.com/FAQ.htm?&faq_id=411
* 設定例) プルダウン: screenshot-16.png
<input type="hidden" name="custom_apcf_subject_show" value="件名">
<select name="custom_apcf_subject" id="form_subject">
	<option class="selectoption" value="通常の連絡">通常の連絡</option>
	<option class="selectoption" value="協業の打診">協業の打診</option>
	<option class="selectoption" value="営業">営業</option>
	<option class="selectoption" value="企画の売り込み">企画の売り込み</option>
	<option class="selectoption" value="ログインできない">ログインできない</option>
</select>


【言語】
-　このプラグインの設定画面において、メールアドレス入力欄から上の欄（５つあります）を入力することで、特定の言語でお問い合わせフォームシステムを表示することができます。

-　初期設定の４つの言語をすべて利用することをご希望の場合は、このプラグインの設定画面において、メールアドレス入力欄から上の欄（５つあります）を空白にしてください。本プラグインがユーザーのブラウザーの言語設定を自動で読み込み、適切な言語を表示します。初期設定では、日本語とアラビア語と英語と中国語から自動選択されます。ブラウザーに日本語とアラビア語と中国語以外の言語が設定されている場合は、英語が表示されます。

-　初期設定の４つの言語をすべて利用されているときに、初期設定の文言を変更なさりたい場合は、rl-apcf-admin.php と rl-apcf-public.php、rl-apcf-admin-ja.php と rl-apcf-public-ja.php、rl-apcf-admin-ar.php と rl-apcf-public-ar.php、rl-apcf-admin-zh.php と rl-apcf-public-zh.php とを直接ご変更ください。

- 初期設定の言語以外を追加する方法
https://github.com/RainbowLinkInc/All-Post-Contact-Form---for-usage-of-multilingual--



【カスタマイズに利用するファイル一覧】
- allpost-contactform.css
- allpost-contactform-str_replace.php：　"All Post Contact Form"'s Filter File - String Replace - （ 使い方：　https://jp.Rainbow-Link.com/FAQ.htm?&faq_id=247 ）
- rl-apcf-redirect-conf.php：　 ( "All Post Contact Form"'s Redirect Conf File ) ( 使い方: https://www.Rainbow-Link.com/FAQ.htm?&faq_id=296 )
- 言語関連ファイル
 * rl-apcf-admin.php と rl-apcf-public.php、
 rl-apcf-admin-ja.php と rl-apcf-public-ja.php、
 rl-apcf-admin-ar.php と rl-apcf-public-ar.php、
 rl-apcf-admin-zh.php と rl-apcf-public-zh.php
 * allpost-contactform-language.php
- allpost-contactform-upload_mime.php
- allpost-contactform-sub12_uploadAttachment.php

【FAQ一覧】
https://jp.rainbow-link.com/catalogue.htm?&item_no=RLF16ja#faq



【疑問解決はどこですればよろしいでしょうか？】
はい、WordPress.orgではなく、私ども（開発者）の公式サイト上でお願いいたします。
https://jp.rainbow-link.com/catalogue.htm?&item_no=RLF16ja#inquiry



【有料アドオンのご紹介】
"All Post Contact Form"の自動返信アドオン
https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RL30ja&link_id=wp

"All Post Contact Form"のカーボンコピーアドオン
https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RL31ja&link_id=wp

 "All Post Contact Form"の受信通知アドオン
https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RL32ja&link_id=wp

"All Post Contact Form"の自動返信＆カーボンコピーアドオン
https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RL33ja&link_id=wp

"All Post Contact Form"のCSVアドオン
https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RL34ja&link_id=wp




== Installation ==
1. 管理画面の「プラグイン」で、このプラグインをインストールしてください
2. 管理画面の「プラグイン」で、このプラグインを有効にしてください。
3. 管理画面の「設定　＞　コンタクトフォーム」で、プラグインをご設定ください。
続きは「Description」セクションの「使い方」をご覧ください。



== Frequently Asked Questions ==
= FAQ LIST URL =
https://jp.Rainbow-Link.com/catalogue.htm?&item_no=RLF16ja#faq


== Screenshots ==
= Release =
1. screenshot-1.png: "Settings" > "Contact Form"
2. screenshot-2.png: Pasting this plugin's ShortCode on the "Page" 
3. screenshot-3.png: Completing your html form
4. screenshot-4.png: Contact Form Window
5. screenshot-5.png: Confirmation Window 
6. screenshot-6.png: Submission Window
7. screenshot-7.png: 「設定　＞　コンタクトフォーム」
8. screenshot-8.png: 「固定ページ」のあるページにショートコードを貼り付けた場面
9. screenshot-9.png: htmlフォームを完成させた場面
10. screenshot-10.png: コンタクトフォーム画面
11. screenshot-11.png: 確認画面 
12. screenshot-12.png: 送信完了画面

= Since v1.0.4 =
13. screenshot-13.png: Added a function of receiving an attachment file to screenshot-3.png
14. screenshot-14.png: screenshot-8.pngに添付ファイル受信機能を追加したところ

= Since v1.5.4 =
15. screenshot-15.png: Added the function to add multiple subjects to one form. 
16. screenshot-16.png: 「一つのフォームに複数の件名を付けた」ところ

= Since v1.6.2 =
17. screenshot-17.png: About design of Confirmation-Window & Submission-Window | 確認画面と送信画面のデザインのこと
18. screenshot-18.png: About design of Confirmation-Window & Submission-Window | 確認画面と送信画面のデザインのこと

= Since v1.5.0 =
Added some screenshots
settings_ar.png
settings_en.png
settings_ja.png
settings_zh.png
plugins_list_ar.png
plugins_list_en.png
plugins_list_ja.png
plugins_list_zh.png


== Changelog ==
=1.7.9=
Jan 21, 2025: Header Parts (Requires at least,Requires PHP,Update URI) を追加しました。

=1.7.8=
Nov 12, 2024: zipのアップロード要件をゆるくしました。PDFをデフォルトで許可しました。

=1.7.7=
Nov 07, 2024: テキストファイルの別名保存についての処理を書き加えました。


=1.7.6=
Nov 07, 2024: allpost-contactform-upload_mime.phpを変更しました。

=1.7.5=
Nov 07, 2024: v1.7.4 が保存エラーになったため、やりなおしました。 

=1.7.4=
Oct 31, 2024: allpost-contactform.jsの利用方法を変更しました。いままでは本プラグインが自動で読み込んでおりましたが、完全にユーザー樣の裁量に置かせていただくことにいたしました。
- 「確認画面」への遷移時に、未入力の項目について、ポップアップアラートを表示することができます。
ポップアップアラートを表示するには、「assets/allpost-contactform.js」を、お使いのテーマに読み込んでください。

=1.7.3=
Oct 30, 2024: v1.7.2のバグを修正しました。

=1.7.2=
Oct 28, 2024: FAQを追加しました：　Mime Typeの管理方法

=1.7.1=
Oct 28, 2024: ショートコードページのセキュリティを強化しました。coreページを分割し、コメントを入れました。

=1.7.0=
Oct 25, 2024: ショートコードページのセキュリティを強化しました。 ( v1.6.9のバグを修正しました )

=1.6.9=
Oct 24, 2024: ショートコードページのセキュリティを強化しました。

=1.6.8=
Oct 22, 2024: .htaccessを変更しました。添付ファイルの名称を一律自動で小文字に変更する仕様に変更しました。

=1.6.7=
Oct 21, 2024: .htaccessの処理を変更しました。attディレクトリを削除しました。

=1.6.6=
Oct 19, 2024: アップロード部分の処理を変更しました。

=1.6.5=
Oct 15, 2024: 1.6.2で、v1.6.2で、「$rl_apcf_admin_sa1_eg」とすべきところを「$rl_apcf_admin_sathahteh1_eg」としていました。寝ぼけてへんな文字を打ち込んだようです。v.1.6.2をWordPress.orgのサーバーにアップロードした時点で外部サイト（ https://plugintests.com/plugins/wporg/allpost-contactform/latest ）に指摘されていましたが、きょうまで気づきませんでした。申し訳ございません。 

=1.6.4=
Oct 11, 2024: アップロード部分のバグを修正しました。「allpost-contactform-upload_mime.php」を追加しました。

=1.6.3=
Oct 11, 2024: WordPress公式チームから注意された部分を修正しました:　text-domain 
Oct 10, 2024: WordPress公式チームから注意された部分を修正しました:　tags (limited: tags to 5 & Shortened: the 'Short Description')  

=1.6.2=
Sep 21, 2024:　仕様を大きく変更いたしました:
(1)添付ファイルをサーバー内に残すかどうかを管理画面で決めることができるようにしました。
(2)確認画面と送信画面のデザインをCSSで簡単にご変更いただけるよう、初期設定のCSS(allpost-contactform.css)に記述を追加しました。
(3)uninstall.phpを変更しました。「完全なアンインストール」に変更いたしました。

=1.6.1=
Sep 10, 2024: アイコンを変更しました。

=1.6.0=
Sep 09, 2024: 差出人のバグを修正しました。エンドユーザーが管理画面で設定した内容で差出人を上書きできないバグを修正しました。

=1.5.9=
Jun 22, 2024: html出力タグのバグを修正しました。一ヶ所、apcf-content-keyとすべきところが、apcf-content-valueになっていました。 

=1.5.8=
May 10, 2024: URL用のフィルタを改造しました( WordPressの専用snitizingを利用することにしました)。 Modified: tableレイアウトからflexに変更したことに伴い、CSSを改造しました。「確認画面」で、最後に表示されていた空行を削除しました。 

=1.5.7=
May 02, 2024: URL用のフィルタを追加しました。 CSSの"apcf_disp_gototop"にもうひとつセンタリング用のタグをデフォルトで追加することにしました。

=1.5.6=
Mar 06, 2024: ２箇所の次の警告に対処しました: 'Undefined array key'. 

=1.5.5=
Nov 14, 2023: 2つの小さなバグを修正いたしました。 

=1.5.4=
Nov 14, 2023:「一つのフォームに複数の件名を付ける」機能を追加いたしました。

=1.5.3=
Nov 13, 2023:v1.5.0から、件名の変更機能が無効になっておりました。いままで一年も気付かず、申し訳ありませんでした。

=1.5.2=
Nov 4, 2022:「爆弾攻撃」を避けるためのクッキーについて、管理者が管理画面で有効にするかどうかを選択することができるようにしました。デフォルトの設定は「無効」です。本バージョンまでは「有効」をデフォルトにしておりました。

=1.5.1=
Oct 30, 2022: 本プラグインが自動でメールに挿入する項目を、デフォルトで非表示にしました。管理画面で表示/非表示を選択することができます。

=1.5.0=
Oct 18, 2022: 今までconfファイルで設定していたオプション設定を、管理画面で設定できるように変更しました。

=1.4.2=
Mar 12, 2022: PHP8に対応しました #2。

=1.4.1=
Dec 6, 2021:  </form> タグを間違って削除していたことに気づいて入れました。 PHP8に対応しました #1。

=1.4.0=
Sep 9, 2019: フォームに応じて独自の件名をつける機能を追加しました。

=1.3.7=
May 12, 2019: allpost-contactform.css の形を整形しました。

=1.3.6=
Mar 29, 2019: allpost-contactform.css を更新しました。 

=1.3.5=
Jan 7, 2019: allpost-contactform-str_replace.php を更新しました。

=1.3.4=
Jan 7, 2019: allpost-contactform-language.php を更新しました。２０１８年１２月１５日に更新していたつもりでいましたが、アップグレードできていませんでした。

=1.3.3=
Jan 3, 2019: クッキー削除処理をプラグイン内で実行する仕様に変更しました。

=1.3.2=
Jan 2, 2019: 確認画面と送信完了画面のデザインを変更しました。偶数行と奇数行にそれぞれクラスを当て、背景色をつけることができるようにしました。

=1.3.1=
Jan 1, 2019: 送信完了画面上に二重認証のチェック部分を表示しないようにしました。

=1.3.0=
Dec 31, 2018: 間違えて作成途中のファイルをアップロードしてしまったので、やり直しました。

=1.2.9=
Dec 31, 2018: 
*二重送信を防止する機能を追加しました。Jqueryで実装されているかたが多いかとは存じますが、プラグイン本体の初期設定として、クッキーで処理することにいたしました。独自設定を維持することを希望されるかたや、クッキー処理を希望されないかたは、v1.2.8をご利用ください。
*assetsフォルダに、header_apcf.phpを追加しました。

=1.2.8=
Dec 15, 2018: 初期設定の言語を追加: 中国語

=1.2.7=
Dec 5, 2018: 送信完了後、フロントページにリダイレクトする機能を付け加えました。

=1.2.6=
Nov 21, 2018: 当社カタログのURLを変更しました。

=1.2.5=
Nov 21, 2018: サニタイズエラーを発見したので修正しました。

=1.2.4=
Nov 21, 2018: リロード抑制のため、ジャバスクリプトを追加しました。

=1.2.3=
Nov 19, 2018: 「送信確認ボタン」のクラスを新設いたしました。「.btn_confirm」です。

=1.2.2=
Oct 05, 2018: ワードプレスのバージョンを、いままで間違えて一つ多くしていたことに気づきました。失礼いたしました。
Aug 21, 2018: 初期設定の言語を追加: アラビア語

=1.2.1=
Jul 23, 2018: Updated: allpost-contactform.css
初期設定でフォームテーブルの罫線（ボーダー）を消すようにする設定の追加処置

=1.2.0=
Jul 23, 2018: Updated: allpost-contactform.css
'apcf_table'クラスにしていたものを 'apcf_table'IDになおしました。
うっかりしていて失礼いたしました。 

=1.1.9=
Jul 15, 2018: Updated: allpost-contactform.css
初期設定でフォームテーブルの罫線（ボーダー）を消すようにしました。

=1.1.8=
Jun 08, 2018: for the add-on 'csv'

=1.1.7=
Feb 13, 2018 Added: 3 files below:
*allpost-contactform-str_replace.php （ 使い方：　https://jp.Rainbow-Link.com/FAQ.htm?&faq_id=247 ）
*/assets/apcf_template.php
*/assets/apcf_template_ja.php

=1.1.6=
Sep 23, 2017 Fixed: 1.1.5 Update Error

=1.1.5=
Sep 23, 2017 Added: 4 new functions: for Add-Ons. We are going to sell 4 add-ons for this plugin soon.

=1.1.4=
Sep 11, 2017 Fixed a bug: html5 validation error of the Confirmation Window.

=1.1.3=
May 17, 2017 Fixed a bug: on v 1.1.2, by mistake, we deleted creating-a-new-line-function of emailing. we revived it on this version.

=1.1.2=
May 15, 2017 Fixed: SVN upload error of v1.1.1.

=1.1.1=
May 14, 2017 Fixed: SVN upload error of v1.1.1.
May 15, 2017: Update: readme.txt & readme_ja.txt of v1.1.1.

=1.1.0=
May 14, 2017 Fixed: SVN upload error of v1.0.9.

=1.0.9=
May 14, 2017 Fixed Activation Error and version code error.

=1.0.8=
May 07, 2017: Update: readme.txt & readme_ja.txt
Apr 26, 2017: Update [ATTENTION] of readme.txt （ readme_ja.txtの「ご注意ください」をアップデートしました。）
Apr 26, 2017: Fixed: Activation Error

=1.0.7=
Apr 20, 2017: Fixed: commit-error of v1.0.6

=1.0.6=
Apr20, 2017: Modified: screenshot-1.png, screenshot-7.png | Added: screenshot-13.png, screenshot-14.png |  Fixed: a bug ( deleting-error of uploaded file )

=1.0.5=
Apr 19, 2017: Update: readme.txt & readme_ja.txt: Added: about 1.0.4 |  Fixed: a bug ( displaying-error of "submit: CONFIRM" )

=1.0.4=
Apr 19, 2017: Added: a function to upload a file ( an attachment file ).
If you use this new function, please update your <form tag. 

=1.0.3=
Apr 18, 2017: Modified: readme.txt & readme_ja.txt | Added: Language-Parts on GitHub
Apr 17, 2017: Modified: readme.txt & readme_ja.txt: DEMO URL
Apr 17, 2017: readme_ja.txtに「ご注意ください」を付け加えました。
Apr 17, 2017: Fixed: a bug. now all ok! 

=1.0.2=
Apr 17, 2017: Fixed: a bug 

=1.0.1=
Apr 17, 2017: Update: readme.txt & readme_ja.txt: Added: LIVE DEMO URL
Apr 17, 2017: Update: readme.txt & readme_ja.txt: How To Activate

=1.0.0=
Apr 16, 2017: Update: readme.txt, Fixed: some bugs 
Apr 15, 2017: Release



== Upgrade Notice ==

=1.0.3=
Apr 17, 2017: Fixed: a bug. now all ok! 

=1.0.2=
Apr 17, 2017: Fixed: a bug 

=1.0.0=
Release
