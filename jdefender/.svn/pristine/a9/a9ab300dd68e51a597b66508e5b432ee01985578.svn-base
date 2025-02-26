<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Chat_class extends WClasses {
	public function displayChatButton() {
		$js = "";
		$js .= "(function(w, d, s, u) {
w.RocketChat = function(c) { w.RocketChat._.push(c) }; w.RocketChat._ = []; w.RocketChat.url = u;
var h = d.getElementsByTagName(s)[0], j = d.createElement(s);
j.async = true; j.src = 'https://chat.joobi.co/packages/rocketchat_livechat/assets/rocketchat-livechat.min.js?_=201702160944';
h.parentNode.insertBefore(j, h);
})(window, document, 'script', 'https://chat.joobi.co/livechat');";
		WPage::addJS( $js );
	}	
}