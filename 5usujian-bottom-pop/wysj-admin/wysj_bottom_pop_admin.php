<?php
if ( ! defined( 'ABSPATH' ) ) exit;


if(is_admin()){require_once(WYSJ_POP_DIR.'/wysj-admin/wysj_bottom_pop_list.php');}
if(is_admin()){require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-core.php');}
add_action( 'admin_enqueue_scripts', 'wysj_bottom_pop_color_picker' );
function wysj_bottom_pop_color_picker( $hook ) {
 
    if( is_admin() ) { 
        // 添加拾色器的CSS文件       
        wp_enqueue_style( 'wp-color-picker' ); 
        // 引用我们自定义的jQuery文件以及加入拾色器的支持
        wp_enqueue_script( 'custom-script-handle', plugins_url( '../asset/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}
function add_btpop_menu($slug){
	add_menu_page('客户咨询列表', '客户咨询列表', 'manage_options', 'wysj_btpop_list', 'wysj_bottom_pop_list');
	add_submenu_page('wysj_btpop_list', '底部弹窗设置', '底部弹窗设置','manage_options', 'wysj_btpop_setting', 'wysj_bottom_pop_setting');
}
add_action('admin_menu', 'add_btpop_menu');

function wysj_add_pop_admin_asset(){
	//加载后台样式
	wp_enqueue_style('5usujian-pop-icon-css', WYSJ_POP_URL.'/asset/css/wysj-iconfont.css',array(),WYSJ_POP_VER);
	wp_enqueue_style('5usujian-pop-admin-css', WYSJ_POP_URL.'/asset/css/5usujian-pop-admin.css',array(),WYSJ_POP_VER);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script('5usujian-pop-admin-js', WYSJ_POP_URL.'/asset/js/5usujian-pop-admin.js',array('jquery-ui-core'),WYSJ_POP_VER, true);
}
add_action( 'admin_enqueue_scripts', 'wysj_add_pop_admin_asset' );

function wysj_pop_base_script() {
	global $wyBtpopOptions;
?>
	<script type="text/javascript">
		var wysjAdminPopBase = {};
		wysjAdminPopBase.ajaxurl = '<?php echo admin_url()."admin-ajax.php"; ?>';
		wysjAdminPopBase.pluginName = "5usujian-bottom-pop";
		wysjAdminPopBase.pluginVersion = "<?php echo WYSJ_POP_VER; ?>";
	</script>
<?php
}
add_action( 'admin_head', 'wysj_pop_base_script' );
function wysj_bottom_pop_setting(){
	require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-write-js.php');
	require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-write-css.php');
	require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-update-options.php');
	wp_enqueue_media();
	global $wyBtpopOptions;
?>
	<div class="wy-pop">
	<h1>底部弹窗设置</h1>
	<form class="wy-pop-form" id="wy-pop-form" action="" method="post" enctype="multipart/form-data" name="wysj_bottom_pop_form" onsubmit="return false;">
		<!-- 图标选择框 -->
		<div class="wy-tab-header">
			<div class="wy-tab-header-left">升级完整版解锁适配手机端等所有功能，<a href="https://www.5usj.cn/plugins/156.html" target="_blank" >了解完整版</a></div>
			<input type="submit" class="button-primary wysj-pop-save wysj-bp-btn" name="Submit" value="<?php _e('保存','5usujian-bottom-pop'); ?>" />
		</div>
		<div class="wy-tab">
			<div class="wy-tab-item">
				<a href="javascript:;" class="active" index="0">定制表单</a>
				<a href="javascript:;" index="1">常规设置</a>
				<a href="javascript:;" index="2">弹窗样式</a>
			</div>
			<div class="wy-tab-content">
				<div class="wy-con-item active">
					<h3>定制表单</h3>
					<button class="button-primary wy-pop-addForm">添加表单</button>
					<table class="form-table">
						<tbody id="wysj-btpop-form-list">
							<?php wysj_getAdminPopForm(); ?>
						</tbody>
					</table>
					<div class="wysj-btpop-introduce">
						<p style="font-size:16px;"><strong>定制表单操作指南</strong></p>
						<p><strong>表单标签</strong>：设置表单提示文字</p>
						<p><strong>表单类型</strong>：设置表单的输入类型，如日期、地址、文本框等</p>
						<p><strong>默认内容</strong>：设置表单默认值；<span style="color:red;">当表单类型为单选下拉框、多选下拉框、单选按钮时，用于设置选项，每个选项之间用英文逗号隔开，例如：选项一,选项二,选项三</span></p>
						<p><strong>表单宽度</strong>：设置表单的宽度</p>
						<p><strong>是否必填</strong>：设置表单是否必填</p>
						<p>支持拖拽式排序，<a href="https://www.5usj.cn/plugins/156.html" target="_blank" style="color:red;">升级完整版</a>可以解锁所有功能，让表单更加便捷实用</p>
					</div>
				</div>
				<div class="wy-con-item">
					<h3>常规设置</h3>
					<table class="form-table">
						<tr>
							<th>表单形式</th>
							<td>
								<select name="wysj_btpop_type" id="wysj_btpop_type">
									<option value="pop" <?php echo $wyBtpopOptions['type'] == 'pop'? 'selected': ''; ?>>弹窗形式，短代码形式将不可用</option>
									<option value="inside" disabled>嵌入页面，弹窗关闭并需添加短代码（升级完整版解锁）</option>
								</select>
								<span class="wy_tips">以弹窗形式还是嵌入页面？弹窗为悬浮在页面底部的形式，嵌入页面可在页面任意位置插入表单，需要手动向页面添加短代码实现</span>
							</td>
						</tr>
						<tr>
							<th>留言成功提示</th>
							<td>
								<input name="wysj_btpop_welcome" type="text" value="<?php echo $wyBtpopOptions['welcome']; ?>" size="80">
								<span class="wy_tips">当客户留言成功时，弹窗显示的欢迎语</span>
							</td>
						</tr>
						<tr>
							<th>邮件通知</th>
							<td>
								<select name="wysj_btpop_emailNotice">
									<option disabled value="enable">启用(需升级完整版)</option>
									<option value="disable">关闭</option>
								</select>
								<span class="wy_tips">当客户留言成功时，将客户留言同时发送到网站管理员邮箱，以便及时处理留言<a href="https://www.5usj.cn/plugins/156.html" target="_blank" >（升级完整版解锁）</a></span>
							</td>
						</tr>
						<tr>
							<th>通知邮箱</th>
							<td>
							<input name="wysj_btpop_toEmail" placeholder="example@qq.com" type="text" disabled size="80">
								<span class="wy_tips">将邮件通知发送到哪个邮箱地址？请先确保您的wordpress可以正常发送邮件，可以参考此教程：<a href="https://www.5usj.cn/a/remenjiaocheng/yuanmashiyong/2016/1201/80.html" target="_blank">SMTP配置教程</a>。<a href="https://www.5usj.cn/plugins/156.html" target="_blank" >（升级完整版解锁）</a></span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>手机端是否显示</th>
							<td>
								<select name="wysj_btpop_mobile">
									<option disabled value="enable">启用(需升级完整版)</option>
									<option value="disable">关闭</option>
								</select>
								<span class="wy_tips">选择是否在手机端显示弹窗<a href="https://www.5usj.cn/plugins/156.html" target="_blank" >（升级完整版解锁）</a></span>
							</td>
						</tr>
						<tr>
							<th>验证码开关</th>
							<td>
								<select name="wysj_btpop_captcha">
									<option <?php if($wyBtpopOptions["captcha"] == 'enable')  echo "selected"; ?> value="enable">开启</option>
									<option  <?php if($wyBtpopOptions["captcha"] == 'disable') echo "selected"; ?> value="disable">关闭</option>
								</select>
								<span class="wy_tips">是否开启验证码？强烈建议开启，以降低网站风险</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>只在首页显示还是全站显示？</th>
							<td>
								<select name="wysj_btpop_display">
									<option <?php if($wyBtpopOptions["display"] == 'all')  echo "selected"; ?> value="all">全站显示</option>
									<option  <?php if($wyBtpopOptions["display"] == 'home') echo "selected"; ?> value="home">仅首页显示</option>
								</select>
								<span class="wy_tips">选择弹窗全站显示还是只在首页显示</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>尝试修复底部遮挡问题</th>
							<td>
								<input type="number" name="wysj_btpop_repair" value="<?php echo $wyBtpopOptions['repair']; ?>">
								<span class="wy_tips">由于弹窗是固定悬浮在页面底部的，这可能会遮挡网页底部某些内容，例如版权、友链等，在输入框中填入一个不小于0的整数数值，单位为像素，可以在最底部增加对应数值高度的空白，使空白高度与弹窗遮挡高度相等即可解决遮挡问题</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>停用插件同时删除数据</th>
							<td>
								<select name="wysj_btpop_delete">
									<option <?php if($wyBtpopOptions["delete"] == 'no')  echo "selected"; ?> value="no">保留数据</option>
									<option  <?php if($wyBtpopOptions["delete"] == 'yes') echo "selected"; ?> value="yes">删除数据</option>
								</select>
								<span class="wy_tips">选择“删除数据”在停用插件时将自动删除插件配置数据，再次启用插件时会恢复到初始状态</span>
							</td>
						</tr>
					</table>
				</div>
				<div class="wy-con-item">
					<h3>全局样式</h3>
					<table class="form-table">
						<tr class="wysj-type-pop">
							<th>初始状态</th>
							<td>
								<select name="wysj_btpop_status">
									<option value="open">展开状态</option>
									<option disabled>关闭状态（需升级完整版）</option>
								</select>
								<span class="wy_tips">用户打开页面时默认展开还是关闭？</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>电脑端顶部广告图片</th>
							<td>
								<input type="text" size="50" value="<?php if($wyBtpopOptions['adimg'] =='') echo WYSJ_POP_URL.'/asset/images/top-img.png'; else echo $wyBtpopOptions["adimg"]?>" name="wysj_btpop_adimg" id="wysj-btpop-adimg-input">
								<button class="button-primary" id="wysj-btpop-adimg-btn">上传图片</button>
								<span class="wy_tips">电脑端弹窗顶部的广告图片，一张背景透明的png格式图片</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>图片预览</th>
							<td><img src="<?php if($wyBtpopOptions['adimg'] =='') echo WYSJ_POP_URL.'/asset/images/top-img.png'; else echo $wyBtpopOptions["adimg"]?>" id="wysj-btpop-adimg-img" width="200"></td>
						</tr>
						<tr class="wysj-type-pop">
							<th>手机端顶部广告图片</th>
							<td>
								<input type="text" size="50" value="" disabled name="wysj_btpop_madimg" id="wysj-btpop-madimg-input">
								<button class="button-primary" disabled id="wysj-btpop-madimg-btn">上传图片</button>
								<span class="wy_tips">手机端弹窗顶部的广告图片，一张背景透明的png格式图片<a href="https://www.5usj.cn/plugins/156.html" target="_blank" >（升级完整版解锁）</a></span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>图片突出距离</th>
							<td>
								<input type="number" size="50" value="<?php echo $wyBtpopOptions['adimgOut']; ?>" name="wysj_btpop_adimgOut">
								<span class="wy_tips">填入一个不小于0的整数，单位为像素，可以实现顶部广告图片向上突出的效果，使广告更加立体醒目</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>关闭按钮图片</th>
							<td>
								<input type="text" size="50" value="<?php if($wyBtpopOptions['closeimg'] =='') echo WYSJ_POP_URL.'/asset/images/close.png'; else echo $wyBtpopOptions["closeimg"]?>" name="wysj_btpop_closeimg" id="wysj-btpop-closeimg-input">
								<button class="button-primary" id="wysj-btpop-closeimg-btn">上传图片</button>
								<span class="wy_tips">关闭弹窗按钮图片，一张背景透明的png格式图片，建议尺寸50*50</span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>图片预览</th>
							<td><img src="<?php if($wyBtpopOptions['closeimg'] =='') echo WYSJ_POP_URL.'/asset/images/close.png'; else echo $wyBtpopOptions["closeimg"]?>" id="wysj-btpop-closeimg-img" width="50"></td>
						</tr>
						<tr class="wysj-type-pop">
							<th>背景图片</th>
							<td>
								<input type="text" size="50" value="" disabled name="wysj_btpop_modelimg" id="wysj-btpop-modelimg-input">
								<button class="button-primary" disabled id="wysj-btpop-modelimg-btn">上传图片</button>
								<span class="wy_tips">一张半透明的png格式图片，用作底部弹窗的背景纹理，留空则使用默认背景<a href="https://www.5usj.cn/plugins/156.html" target="_blank" >（升级完整版解锁）</a></span>
							</td>
						</tr>
						<tr class="wysj-type-pop">
							<th>内容区域宽度</th>
							<td>
								<input type="number" size="50" value="<?php echo $wyBtpopOptions['contentWidth']; ?>" name="wysj_btpop_contentWidth">
								<span class="wy_tips">填入一个不小于0的整数，单位为像素，设置弹窗内容区域的宽度</span>
							</td>
						</tr>
						<tr class="wysj-type-inside">
							<th>表单区域背景色</th>
							<td>
								<input type="text" class="color-field" value="<?php echo $wyBtpopOptions['contentBg']; ?>" name="wysj_btpop_contentBg">
								<span class="wy_tips">选择嵌入式表单背景色</span>
							</td>
						</tr>
						<tr>
							<th>提交按钮背景色</th>
							<td>
								<input type="text" class="color-field" value="<?php echo $wyBtpopOptions['submitBgColor']; ?>" name="wysj_btpop_submitBgColor">
								<span class="wy_tips">设置提交按钮背景色</span>
							</td>
						</tr>
						<tr>
							<th>提交按钮字体色</th>
							<td>
								<input type="text" class="color-field" value="<?php echo $wyBtpopOptions['submitFontColor']; ?>" name="wysj_btpop_submitFontColor">
								<span class="wy_tips">设置提交按钮字体色</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="wy-tab-header">
			<a class="wysj-logo" target="_blank" href="http://5usujian.com">
				<img src="<?php echo WYSJ_POP_URL.'/asset/images/wysj-logo.png'; ?>" title="无忧速建网-轻轻松松自己建网站" alt="无忧速建网-轻轻松松自己建网站">
			</a>
			<input type="hidden" name="wysj_btpop_cssVer" value="<?php echo time(); ?>" />
			<input type="submit" class="button-primary wysj-pop-save wysj-bp-btn" name="Submit" value="<?php _e('保存','5usujian-super-pop'); ?>" />
		</div>
		
	</form>
	<div class="wysj-dialog" id="wysj-dialog">
		<div class="wysj-dialog-title"></div>
		<div class="wysj-dialog-content"></div>
	</div>
</div>
<?php
}

//if(is_admin()){require_once(WYSJ_POP_DIR.'/wysj-admin/wysj_bottom_pop_list.php');}
?>