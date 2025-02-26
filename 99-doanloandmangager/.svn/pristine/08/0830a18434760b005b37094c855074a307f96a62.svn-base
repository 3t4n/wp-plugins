<?php

/*

Plugin Name: 99dl DoanloandMangager

Plugin URI: http://www.iesay.com/99dl-Lightbox-doanloandmanager

Description: wordpress 弹窗下载器.根据Lightbox for image修改.使用方法: <code>[idl id="自定义值" t="要显示的链接文字"] 下载链接列表 [/idl]</code>. 或是图片弹窗<code>[idl img="file.jpg"]图片地址[/idl]</code>. Development by <a href="http://www.iesay.com">99dl DoanloandMangager</a> and based on http://famspam.com/facebox

Author: 99839.

Version: 1.0

Author URI: http://www.iesay.com

*/

add_action('wp_head', 'idl_head');

function idl_head() {

	echo '<script src="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/jquery-1.2.2.pack.js" type="text/javascript"></script>

	<link href="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/facebox.css" media="screen" rel="stylesheet" type="text/css" />

	<script src="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/facebox.js" type="text/javascript"></script>

	<script type="text/javascript">

	    jQuery(document).ready(function($) {

	      $("a[rel*=facebox]").facebox() 

	    })

	</script>';

}

function lightbox_99dl($atts, $content = null) {

	extract(shortcode_atts(array(

		'id' => '',

		'img' => '',

		't' => '',

	), $atts));

	if ($id) {

		return '<div id="download">

			<div id="down_link">

				<a rel="facebox" href="#'.$id.'">['.$t.']演示下载地址列表</a>&nbsp;|&nbsp;如无特殊说明，本文件解压密码为：<span style="color:#f00">iesay.com</span>!

				<noscript>&amp;amp;amp;amp;lt;br/&amp;amp;amp;amp;gt;&amp;amp;amp;amp;lt;font color="red"&amp;amp;amp;amp;gt;提取下载地址失败，请尝试按CTRL+F5刷新，或者更换浏览器。&amp;amp;amp;amp;lt;/font&amp;amp;amp;amp;gt;</noscript>

			</div>

		</div>

		

		

		<span id="'.$id.'" style="display:none">

		

	<div class="part">

				<div class="part_content">

						<iframe id="ADSpFrame" border="0" vspace="0" hspace="0" marginWidth="0" marginHeight="0" frameSpacing="0" frameBorder="0" scrolling="no" width="468" height="60" src="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/adlinks.php"></iframe>

				</div>

				<div style="clear:both"></div>

			</div>

	<div class="part">下载及演示地址：'.$content.'</div>

	<div class="part">

	<strong>温馨提示：</strong>

	<p>1.本站所有软件和资料均为软件作者提供或网友推荐发布而来，仅供学习和研究使用，不得用于任何商业用途。如本站不慎侵犯你的版权请联系我，我将及时处理，并撤下相关内容！</p>

	</div>

	1.Our Iesay.com is looking for the best free wordpress win7&8 templates here..</br>

    2.We only index and link to content provided by other sites

	

	</span>';

	} elseif ($img) {

		return '<a rel="facebox" href="'.$img.'">'.$content.'</a>';

	}

}

add_shortcode('idl', 'lightbox_99dl');

?>