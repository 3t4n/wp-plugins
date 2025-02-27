=== WP-Speech-Balloon ===
Contributors: RA's_Tips4Life
Donate link:
Tags: balloon, bubbles, chat, fukidashi, speech balloon, speech bubble,
Requires at least: 4.9.4
Tested up to: 5.1.1
Stable tag: 2.4
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


WordPress の記事内で簡単に吹き出し会話を使えるプラグインです。AMPページでも通常ページと同じように吹き出し会話を使えます。
This is a plugin that makes it easy to use balloon conversation with WordPress. It's also available for AMP page.



== Description ==
吹き出し会話を使いたい場所に「テンプレートコード」を貼り付けて、必要箇所に「画像URL」「アバターの名前」「文章」を書くだけで吹き出し会話が表示されます。
吹き出しの種類は現在「左右各5種類ずつ」あります。
吹き出しの種類を変更する方法もとても簡単で、「テンプレートコードの数字」を変えるだけで簡単に変更する事ができます。

First, paste 「Template Code」 where you want to use a speech balloon. And just write 「Image URL」「Name of Avatar」「Text」 in the required place, speech balloon will be displayed.
Currently, there are 5 types of "pattern of speech balloon" left and right.
The way to change the "pattern of speech balloon" is also very easy, just change the number of the 「Template Code」.



== Installation ==
1. プラグインファイルを `/wp-content/plugins/[ココです]` のディレクトリへアップロードするか、WordPress のプラグイン画面から直接インストールしてください。
1. Upload the plugin files to the `/wp-content/plugins/[Here]` directory, or install the plugin through the WordPress plugins screen directly.

2. WordPress の「プラグイン」画面でプラグインを有効にしてください。
2. Activate the plugin through the 'Plugins' screen in WordPress.



== Frequently Asked Questions ==
* 特にありません。 WP-Speech-Balloon はシンプルかつ簡単にお使い頂けます。
* Not in particular. WP-Speech-Balloon is simple and easy to use.


== Screenshots ==
1. /assets/screenshot-1.jpg
1. /assets/screenshot-2.jpg
1. /assets/screenshot-3.jpg



== Notice ==
* このプラグインは "ob_start()" や "ob_end_flush()" を使用しているため、このプラグインを使用するとサーバーベースのキャッシュサービスと競合する可能性があり、それらのサーバーでの使用をサポートすることはできません。。
* This plugin uses "ob_start()" and "ob_end_flush()". So use of this plugin may conflict with server based cache services, and cannot support it’s use on those servers.



== Changelog ==

= 2.4 =
* パターン1（左右）、パターン2（左右）、パターン3（左右）に「グレーモード」を追加しました。
* AMP エラー対策。
* さらに細かく AMP CSS を出し分けるよう修正しました。
* 「WP-Speech-Balloon」を使用している AMP ページでは、「ページ内で使用している吹き出しの種類の分だけ」CSS を出力するよう修正しました。
* Take measures to "AMP Errors"
* Improve to "extract  & output" AMP CSS more than finely version 2.3.
* Extract & output AMP CSS only for the pattern of "speech balloon" used in the page.

= 2.3 =
* AMP エラー対策。
* 「WP-Speech-Balloon」を使用していない AMP ページでは「WP-Speech-Balloon の CSS」を出力しないよう修正しました。
* Take measures to "AMP Errors".
* Improved to not output 「WP-Speech-Balloon's CSS」 to AMP page not using 「WP-Speech-Balloon」.

= 2.2 =
* 吹き出し内で連続改行を使っても表示崩れしないよう対応しました。
* Fixed not to broken layout by two or more consecutive "br" tags.

= 2.1 =
* 吹き出しの種類が左右それぞれ5種類に増えました。
* 5 types of "pattern of speech balloon" left and right.

= 2.0 =
* 「アバターの名前」を表示出来るようになりました。
* Added 「Name of avatar」 display place.

= 1.0 =
* リリース開始
* New release.



== Upgrade Notice ==

= 2.4 =
* Not in particular.

= 2.3 =
* Not in particular.

= 2.2 =
* Not in particular.

= 2.1 =
* Not in particular.

= 2.0 =
* Not in particular.

= 1.0 =
* Not in particular.



== WP-Speech-Balloon 2.4 の使い方 ==

【テンプレート】
------------------------------▽
・通常吹き出し(左パターン)
[L1_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・通常吹き出し(左パターン グレー)
[L1_gray_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・通常吹き出し(右パターン)
[R1_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・通常吹き出し(右パターン グレー)
[R1_gray_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・ぽわぽわ吹き出し(左パターン)
[L2_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・ぽわぽわ吹き出し(左パターン グレー)
[L2_gray_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・ぽわぽわ吹き出し(右パターン)
[R2_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・ぽわぽわ吹き出し(右パターン グレー)
[R2_gray_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・パステル&ステッチ吹き出し(左パターン)
[L3_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・パステル&ステッチ吹き出し(左パターン グレー)
[L3_gray_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・パステル&ステッチ吹き出し(右パターン)
[R3_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・パステル&ステッチ吹き出し(右パターン グレー)
[R3_gray_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・LINE風吹き出し(左パターン)
[L4_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・LINE風吹き出し(右パターン)
[R4_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]

・Twitter風吹き出し(左パターン)
[L5_wsbStart][L_wsbAvatar][L_wsbName][L_wsbText][L_wsbEnd]

・Twitter風吹き出し(右パターン)
[R5_wsbStart][R_wsbText][R_wsbAvatar][R_wsbName][R_wsbEnd]
------------------------------▲


【使い方】※「画像URL」、「アバターの名前」、「会話の内容」を書き換えて使います。
------------------------------▽
・通常吹き出し(左パターン)
[L1_wsbStart][L_wsbAvatar]画像URL[L_wsbName]表示する名前[L_wsbText]会話の内容[L_wsbEnd]

・通常吹き出し(右パターン)
[R1_wsbStart][R_wsbText]会話の内容[R_wsbAvatar]画像URL[R_wsbName]表示する名前[R_wsbEnd]

・ぽわぽわ吹き出し(左パターン)
[L2_wsbStart][L_wsbAvatar]画像URL[L_wsbName]表示する名前[L_wsbText]会話の内容[L_wsbEnd]

・ぽわぽわ吹き出し(右パターン)
[R2_wsbStart][R_wsbText]会話の内容[R_wsbAvatar]画像URL[R_wsbName]表示する名前[R_wsbEnd]

・パステル&ステッチ吹き出し(左パターン)
[L3_wsbStart][L_wsbAvatar]画像URL[L_wsbName]表示する名前[L_wsbText]会話の内容[L_wsbEnd]

・パステル&ステッチ吹き出し(右パターン)
[R3_wsbStart][R_wsbText]会話の内容[R_wsbAvatar]画像URL[R_wsbName]表示する名前[R_wsbEnd]

・LINE風吹き出し(左パターン)
[L4_wsbStart][L_wsbAvatar]画像URL[L_wsbName]表示する名前[L_wsbText]会話の内容[L_wsbEnd]

・LINE風吹き出し(右パターン)
[R4_wsbStart][R_wsbText]会話の内容[R_wsbAvatar]画像URL[R_wsbName]表示する名前[R_wsbEnd]

・Twitter風吹き出し(左パターン)
[L5_wsbStart][L_wsbAvatar]画像URL[L_wsbName]表示する名前[L_wsbText]会話の内容[L_wsbEnd]

・Twitter風吹き出し(右パターン)
[R5_wsbStart][R_wsbText]会話の内容[R_wsbAvatar]画像URL[R_wsbName]表示する名前[R_wsbEnd]

※グレーモードは[○○_wsbStart]の部分を[○○_gray_wsbStart]に変えるとグレーモードをお使い頂けます。
※「LINE風吹き出し」や「Twitter風吹き出し」にグレーモードはありません。
------------------------------▲


使い方などの詳細は以下のページをご覧ください。

------------------------------
「WP-Speech-Balloon」の使い方
https://tips4life.me/wp-speech-balloon-how-to-use

「WP-Speech-Balloon」のインストール方法
https://tips4life.me/wp-speech-balloon-install

「WP-Speech-Balloon」のアップデート方法
https://tips4life.me/wp-speech-balloon-update

▽ 更新履歴はこちら ▽
https://tips4life.me/tag/wp-speech-balloon
------------------------------
