<?php
/*
------------------------------------------------------------
Copyright (C) 2010 Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
*/
function get_links_for_paypal_sidebar_view_widget(){

	srand((double)microtime()*1000000);
	$number=round(rand(0,100));

switch ($number % 10){
		case 0:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">ソフトウェアＭ＆Ａ</a>'.
					'</p>';
					break;
		case 1:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">知的財産権Ｍ＆Ａ</a>'.
					'</p>';
					break;
		case 2:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">著作権Ｍ＆Ａ</a>'.
					'</p>';
					break;
		case 3:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">ソフトＭ＆Ａ</a>'.
					'</p>';
					break;
		case 4:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">アプリＭ＆Ａ</a>'.
					'</p>';
					break;
		case 5:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">ゲームＭ＆Ａ</a>'.
					'</p>';
					break;
		case 6:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">著作権買収</a>'.
					'</p>';
					break;
		case 7:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">著作権売却</a>'.
					'</p>';
					break;
		case 8:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">著作権譲渡</a>'.
					'</p>';
					break;
		case 9:
			return 	'<p>[PR]'.
					'<a href="http://software-ma.jp/" title="ソフト・アプリ・ゲームの著作権Ｍ＆Ａ（買収・売却・譲渡）仲介サービス" target="_blank">著作権売買</a>'.
					'</p>';
					break;
	}
}
?>