<script type="text/javascript">
	var $l_base = '<?php echo WS_ALIDO_URL . '/redirect.php?bill';?>';
	var $s_base = '<?php echo get_option('siteurl') . '/?alidobill';?>';
	var $imgurl = '<?php echo WS_ALIDO_IMG_URL;?>';
</script>


<?php 


//-----------------------------------------------------------------------
//Get the post data and manipulate them.
//-----------------------------------------------------------------------

require_once( 'cls.option.php' );
$options = new WS_AliDo_Option( WS_ALIDO_ID );

if( !empty($_POST) ){
	check_admin_referer('ws_alido_setttings_page');
	
	
	//-----------------------------------------------------------------------
	//Here post-ids should be saved for not judging them every time;In ['showPostIds']
	//-----------------------------------------------------------------------
	if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		$_POST['email'] = '';	
	if( !filter_var($_POST['donateurl'], FILTER_VALIDATE_URL))
		$_POST['donateurl'] = '';	
	
	
	$_POST['showPostIds'] = ws_alido_updatePostIdsCol( $options );
	$options->update( $_POST );
	
	//print_r($_POST);
	/*Part End*/
}


	

?>

<div id="ws_alido_mainWrap">
    <div id="ws_alido_childWrap">
    	<h1>Alipay Donate 控制面板</h1>
        <div id="ws_alido_content_wrap">
            <div id="ws_alido_content">
              <form action="" method="post">
          	  <p><label>收款支付宝Email账号:</label>
              <input type="text" name="email" value="<?php echo $options->get('email');?>" />
              <span>请输入您的收款Email账号(Just for the third-party API)</span></p>
              <p><label>支付宝个人收款页面:</label>
              <input type="text" name="donateurl" value="<?php echo $options->get('donateurl');?>" />
              <span><a href="https://me.alipay.com/" terget="_blank">申请</a>&nbsp;&nbsp;&nbsp;&nbsp;请输入支付宝个人收款页面地址</span></p>
              <p><label>付款通道:</label>
              <select name="gateway">
              	<option value="api"<?php $options->es('gateway','api');?>>使用第三方API收款</option>
                <option value="alipay"<?php $options->es('gateway','alipay');?>>使用支付宝收款页面</option>
              </select>
              <span>请选择付款通道</span></p>
              
              <p><label>捐赠面板显示全局控制:</label>
              <select name="show_all">
              	<option value="all"<?php $options->es('show_all','all');?>>所有文章</option>
                <option value="rand"<?php $options->es('show_all','rand');?>>按访问随机显示(开启缓存本次功能将失效)</option>
                <option value="close"<?php $options->es('show_all','close');?>>关闭全局控制</option>
              </select>
              <span>打开后下面的4项将无效</span></p>
              
              <p><label>在置顶文章中显示:</label>
              <select name="show_sticky">
              	<option value="all"<?php $options->es('show_sticky','all');?>>所有</option>
                <option value="close"<?php $options->es('show_sticky','close');?>>不显示</option>
              </select>
              <span></span></p>
              
              <p><label>在热门浏览文章中显示:</label>
              <select name="show_view">
                <option value="num"<?php $options->es('show_view','num');?>>前N篇</option>
                <option value="close"<?php $options->es('show_view','close');?>>不显示</option>
              </select>
              <span>显示数量:</span>
              <input type="text" name="show_view_num" value="<?php echo $options->get('show_view_num',5,1);?>"  class="short_input" />
              <span><?php if(!function_exists('the_views')) {echo '请安装<a href="http://wordpress.org/extend/plugins/wp-postviews/" target="_blank">WP-PostViews</a>插件';}?></span></p>
              
              <p><label>在热门评论文章中显示:</label>
              <select name="show_comment">
                <option value="num"<?php $options->es('show_comment','num');?>>前N篇</option>
                <option value="close"<?php $options->es('show_comment','close');?>>不显示</option>
              </select>
              <span>显示数量:</span>
              <input type="text" name="show_comment_num" value="<?php echo $options->get('show_comment_num',5,1);?>"  class="short_input" />
              <span></span></p>
              
              <p><label>在最新发表文章中显示:</label>
              <select name="show_latest">
                <option value="num"<?php $options->es('show_latest','num');?>>前N篇</option>
                <option value="close"<?php $options->es('show_latest','close');?>>不显示</option>
              </select>
              <span>显示数量:</span>
              <input type="text" name="show_latest_num" value="<?php echo $options->get('show_latest_num',5,1);?>"  class="short_input" />
              <span></span></p>
              
              <p><label>捐赠面板显示文字:</label>
              <textarea name="showwords" ><?php echo $options->get('showwords',"To make a donation for a blogger? uhm...is what will not happen here...I'm just a plug-in, welcome to nurse me! :D");?></textarea>
              <span></span></p>
              
              <p><label>捐赠面板Hover提示文字:</label>
              <textarea name="tipwords"><?php echo $options->get('tipwords',"I spent most of my free time creating, updating, maintaining and supporting these articles, if you really love my articles or some else and could spare me a couple of bucks, I will really appericiate it. If not feel free to use it without any obligations.");?></textarea>
              <span></span></p>
              
              <p><label>捐赠按钮:</label>
              <select name="button" id="ws_alido_buttonS">
    <option value="donate_12.png"<?php $options->es('button','donate_12.png');?>>Default</option>
    <option value="donate_01.jpg"<?php $options->es('button','donate_01.jpg');?>>样式1</option>
    <option value="donate_02.jpg"<?php $options->es('button','donate_02.jpg');?>>样式2</option>
    <option value="donate_03.jpg"<?php $options->es('button','donate_03.jpg');?>>样式3</option>
    <option value="donate_04.png"<?php $options->es('button','donate_04.png');?>>样式4</option>
    <option value="donate_05.png"<?php $options->es('button','donate_05.png');?>>样式5</option>
    <option value="donate_06.png"<?php $options->es('button','donate_06.png');?>>样式6</option>
    <option value="donate_07.gif"<?php $options->es('button','donate_07.gif');?>>样式7</option>
    <option value="donate_08.gif"<?php $options->es('button','donate_08.gif');?>>样式8</option>
    <option value="donate_09.png"<?php $options->es('button','donate_09.png');?>>样式9</option>
    <option value="donate_10.png"<?php $options->es('button','donate_10.png');?>>样式10</option>
    <!--<option value="donate_11.png"<?php $options->es('button','donate_11.png');?>>样式11</option>-->
              </select>
              <span>
         <img id="ws_alido_button" src="<?php echo WS_ALIDO_IMG_URL . '/' .$options->get('button','donate_12.png');?>" />
         	  </span></p>
              
              
              <p class="clear"></p>
              
              <?php wp_nonce_field('ws_alido_setttings_page') ?> 
              <?php wp_referer_field() ?> 
              <p><input type="submit" value="<?php _e('Save Changes');?>" class="button-primary btn_update"/></p>
              
              </form>
              <hr />
              <div class="updated">According to Alipay's provision, you can get 98.8% of per donation!<br />As a test Checkout, you'd better pay less than 0.40CNY for a zero fee! Otherwise, 2% of per donation will be cut down!<br />Final Authority To Interpret All Belong To This Plugin Author.</div>
              <p></p>

              <p><label>输入收款金额(数字):</label>
              <input type="text" name="bill" value="0.00" class="short_input" id="ws_alido_in"/>
              <span>您可以设置捐赠金额(输入0.00表示让捐赠者自由选择捐赠金额)</span></p>
              
              <p><label>捐赠链接:</label>
              <input type="text" name="donate_link" class="donate_link"  id="ws_alido_out_l" value="" readonly="readonly"/>
              <span><a href="javascript:void(0);" target="_blank" id="ws_alido_out_la">预览</a>&nbsp;&nbsp;&nbsp;该链接可以跳转到捐赠页面</span></p>
              <p><label>捐赠短链接:</label>
              <input type="text" name="donate_link_short" class="donate_link"  id="ws_alido_out_s" value="" readonly="readonly" />
              <span><a href="javascript:void(0);" target="_blank" id="ws_alido_out_sa">预览</a>&nbsp;&nbsp;&nbsp;该链接可以跳转到捐赠页面</span></p>
              <p><input type="button" value="<?php _e('Generate');?>" class="button-primary btn_update" onclick="ws_alido_generateLink()"/></p>
              <hr />
              <p class="auto">The rule of the donate API(for developoers):<br /> http://www.waisir.com/addons/alipay/inc.alipay_donate.php?email={$your-alipay-account}&url={$your-site-url}&bill={$donation-bill}</p>
            </div>
        </div>
    </div>
</div>