<?php 
/*
	Plugin Name:AlipayDonate
	Plugin URI:http://www.waisir.com/alipay-donate
	Description:<strong>AlipayDonate</strong>，支付宝为您提供快捷的捐赠服务.
	Version:1.8.8
	Author:歪SIR
	Author URI:http://www.waisir.com
	License: GPLv2 or later
*/
 
/* 
	Copyright (c) 2011-2012  waisir (Email : waisir@qq.com)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	License: http://www.gnu.org/licenses/gpl.txt
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



include_once 'includes/cfg.config.php';
include_once 'includes/fnc.core.php';
include_once 'includes/cls.settings.php';
include_once 'includes/cls.widget.php';
/////////////////////////////////////////////////////////////////////////////////////

add_action( 'save_post', 'ws_alido_updatePostIdsCol_callback' );
add_action( 'edit_post', 'ws_alido_updatePostIdsCol_callback' );
add_action( 'delete_post', 'ws_alido_updatePostIdsCol_callback' );


function  ws_alido_updatePostIdsCol_callback(){
	 require_once( WS_ALIDO_INC_DIR . '/cls.option.php' );
	 $options = new WS_AliDo_Option( WS_ALIDO_ID );
	 $options->set('showPostIds', ws_alido_updatePostIdsCol( $options ));
	 $options->update();	
}
/////////////////////////////////////////////////////////////////////////////////////

add_action('widgets_init', create_function('', 'return register_widget("WS_AliDo_Widget");'));	
/////////////////////////////////////////////////////////////////////////////////////	
add_action('init', 'ws_alido_redirect', 1 );

function ws_alido_redirect(){
	if( isset($_GET['alidobill']) ){
		die(wp_redirect( WS_ALIDO_URL . '/redirect.php?bill=' . $_GET['alidobill'], 301));
	}	
}	
	
	
add_filter('the_content','ws_alido_content_pack',10,1);




function ws_alido_content_pack( $content ){
	require_once( 'includes/cls.option.php' );
	$options = new WS_AliDo_Option( WS_ALIDO_ID );
	$gateway = $options->get('gateway');
	$donateurl = $options->get('donateurl');
	$email = $options->get('email');
	
	if( $gateway == 'alipay' && !empty($donateurl) )
		$donateLink = $donateurl;
	elseif( $gateway == 'api' && !empty($email) )
		$donateLink = WS_ALIDO_URL . '/redirect.php?bill';
	else
		$donateLink = "javascript:alert('还没设置收款账号呢');";	
	
	
	$showwords = $options->get('showwords');
	$tipwords  = $options->get('tipwords');
	
	
	$imgurl = WS_ALIDO_IMG_URL;
	$imgButton = $imgurl .'/' . $options->get('button');
	$donate = <<<HTML
	
<script type="text/javascript">
$(function(){
$('.ws_alido_postMainWrap').bind({
	mousedown:function(){return false;},
	click:function(){return true;}
});	
	
});


</script>	
<style>
.ws_alido_postMainWrap{display:block;height:95px;background:#ccc url('$imgurl/bg.png') repeat;margin:15px auto;pading:0;overflow:hidden;border:solid 2px #cFcFcF;cursor:pointer;font-family:微软雅黑,Microsoft YaHei}
.ws_alido_postMainWrap *{margin:0;padding:0}

.ws_alido_postMainWrap:hover{border:solid 2px #ABABAB}
.ws_alido_postMainWrap:hover .ws_alido_postInfo p{display:block}

.ws_alido_postChildWrap{margin:7px 15px;height:80px;/*background:#fc9*/overflow:hidden;}
.ws_alido_postChildWrap .ws_alido_postDesc{display:block;float:left;height:75px;width:60%;/*background:#fc9;*/text-indent:2em;overflow:hidden;color:#6C6C6C}
.ws_alido_postChildWrap .ws_alido_postPaySec{display:block;float:right;height:75px;width:35%;/*background:#fc9;*/overflow:hidden;}
.ws_alido_postPaySec .ws_alido_postPay{margin-top:7px;text-align:center}
.ws_alido_postPaySec .ws_alido_postPay:hover{margin-left:1px;margin-top:8px}
.ws_alido_postPaySec .ws_alido_tip{height:auto;line-height:1em;text-align:center;padding-top:0px;color:#C30;}
.ws_alido_postPay a{display:block;text-align:center}
.ws_alido_postPay a img{margin:auto auto;/*width:150px;height:auto;*/}
.ws_alido_postMainWrap .ws_alido_postInfo{line-height:1em;text-align:right}
.ws_alido_postMainWrap .ws_alido_postInfo p{position:relative;float:right;margin-top:-15px;padding:1px 5px 1px 10px;background:#666;border-radius:8px 0 0 0;color:#DFDFDF;display:none;font-size:12px;cursor:help}
</style>	
<div class="ws_alido_postMainWrap" title="Alipay-Donate">
	
	<div class="ws_alido_postChildWrap">
		<p class="ws_alido_postDesc" title="{$tipwords}">{$showwords}</p>
		<div class="ws_alido_postPaySec">
		
			<div class="ws_alido_tip">期待您的捐赠</div>
			<div class="ws_alido_tip">Thanks for donation</div>
			<div class="ws_alido_postPay"><a href="$donateLink" target="_blank"><img src="$imgButton" /></a></div>
		
		</div>
	</div>
	<div class="ws_alido_postInfo"><a href="http://wordpress.org/extend/plugins/alipay-donate/" target="_blank"><p>what's this?</p></a></div>
	
</div>
	
HTML;

	
	if( !ws_alido_isPostToShow( get_the_id() ) || !is_single() ) $donate = '';
	return $content . $donate;
}


?>