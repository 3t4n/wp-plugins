<?php
/**
Plugin Name: WPCopyRights网站防复制插件
Plugin URI: https://www.lezaiyun.com/wpcopyrights.html
Description: 功能强大的WordPress网站防复制插件。公众号：  <font color="red">老蒋朋友圈</font>
Version: 5.4
Author: 老蒋和他的小伙伴
Author URI: https://www.lezaiyun.com
*/
define('WP_COPY_RIGHTS_VERSION', 5.3);
define('WP_COPY_RIGHTS_BASE_FOLDER', plugin_basename(dirname(__FILE__)));

register_activation_hook(__FILE__, 'wp_copy_rights_init');
function wp_copy_rights_init () {
    $options = array(
            'version' => WP_COPY_RIGHTS_VERSION,
            'switch'  => False,
            'options' => array(
                'disable_right_click'  => False,
                'disable_select_text'  => False,
                'disable_drag_image'   => False,
                'disable_f12'          => False,
                'disable_print'        => False,
                'disable_view_source'  => False,
                'disable_save_page'    => False,
                'disable_select_all'   => False,
                'disable_copy_content' => False,
                'disable_cut_content'  => False,
                'enable_adminer'       => False,
                'enable_loginer'       => False,
				'enable_endcopyrights' => False,
                'exclude_pages'        => '',
                'exclude_posts'        => '',
            ),
        );
    $wp_copy_rights_options = get_option('wp_copy_rights_options');
    if(!$wp_copy_rights_options){
        add_option('wp_copy_rights_options', $options, '', 'yes');
    };
}


function wp_copy_rights_protect_excluded_pages($exclude_pages) {
    $excluded_ids = explode(',', $exclude_pages);
    if(is_array($excluded_ids) && is_page($excluded_ids)) {
        return True;
    }
    return False;
}
function wp_copy_rights_protect_excluded_posts($exclude_posts) {
    $excluded_id = explode(',', $exclude_posts);
    if(is_array($excluded_id) && is_single($excluded_id)) {
        return True;
    }
    return False;
}
add_action('wp_head', 'wp_copy_rights_protect');
function wp_copy_rights_protect(){
    $wp_copy_rights_options = get_option('wp_copy_rights_options');
    if ($wp_copy_rights_options['switch']) {
        $exclude_switch = True;
        if ($wp_copy_rights_options['options']['enable_adminer'] AND current_user_can('administrator')){
            $exclude_switch = False;
        }
        if ($wp_copy_rights_options['options']['enable_loginer'] AND is_user_logged_in()) {
            $exclude_switch = False;
        }
        if ( wp_copy_rights_protect_excluded_pages($wp_copy_rights_options['options']['exclude_pages']) ) {
            $exclude_switch = False;
        }
        if ( wp_copy_rights_protect_excluded_posts($wp_copy_rights_options['options']['exclude_posts']) ) {
            $exclude_switch = False;
        }

        if($exclude_switch){
            if ($wp_copy_rights_options['options']['disable_right_click']) {
                ?>
                <script language="Javascript">
                    document.oncontextmenu=new Function("event.returnValue=false");
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_select_text']) {
                ?>
                <style type="text/css">
                    body{
                        -moz-user-select:none; /*火狐*/
                        -webkit-user-select:none; /*webkit浏览器*/
                        -ms-user-select:none; /*IE10*/
                        -khtml-user-select:none; /*早期浏览器*/
                        user-select:none;
                    }
                </style>
                <script language="Javascript">
             document.ondragstart=function(){return false};
		    document.onselectstart =function(){return false};
		    document.onbeforecopy=function(){return false};
		    document.onmouseup=function(){document.selection.empty();};
			document.onselect=function(){document.selection.empty();};
			document.oncopy=function(){document.selection.empty();};
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_drag_image']) {
                ?>
                <script type='text/javascript'>
                   function imgdragstart(){return false;}
                   for(i in document.images)document.images[i].ondragstart=imgdragstart;
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_f12']) {
                ?>
                <script type='text/javascript'>
                 

    				//禁用开发者工具F12
    				document.onkeydown = function () {
       				 if (window.event && window.event.keyCode == 123) {
            			event.keyCode = 0;
           			 event.returnValue = false;
            		return false;
        			}
   					 };
    				//如果用户在工具栏调起开发者工具，那么判断浏览器的可视高度和可视宽度是否有改变，如有改变则关闭本页面  
    				window.onresize = function () {
        			if (h != window.innerHeight || w != window.innerWidth) {
           			 window.close();
            		window.location = "about:blank";
        			}
    				}
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_print']) {
                ?>
                <style>
                    @media print{
                        body{display:none}
                    }
                </style>

                <script type="text/javascript">

                    document.onkeydown = function () {
                        if ((window.event && window.event.keyCode == 80) || ((event.ctrlKey))) {
                            event.keyCode = 0;
                            event.returnValue = false;
                            return false;
                        }
                    };
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_view_source']) {
                ?>
                <style>
                    @media print{
                        body{display:none}
                    }
                </style>

                <script type="text/javascript">

                    document.onkeydown = function () {
                        if ((window.event && window.event.keyCode == 80) || ((event.ctrlKey))) {
                            event.keyCode = 0;
                            event.returnValue = false;
                            return false;
                        }
                    };
                </script>
                <?php
            }
			
			if ($wp_copy_rights_options['options']['enable_endcopyrights']) {
			    ?>
			    
			<script type='text/javascript'>
			function addLink() {
			    var body_element = document.getElementsByTagName('body')[0];
			    var selection;
			    selection = window.getSelection();
			    var pagelink = "<br /><br /> 转载请注明来源: <a href='"+document.location.href+"'>"+document.location.href+"</a>"; 
			    var copy_text = selection + pagelink;
			    var new_div = document.createElement('div');
			    new_div.style.left='-99999px';
			    new_div.style.position='absolute';
			    body_element.appendChild(new_div );
			    new_div.innerHTML = copy_text ;
			    selection.selectAllChildren(new_div );
			    window.setTimeout(function() {
			        body_element.removeChild(new_div );
			    },0);
			}
			document.oncopy = addLink;
			</script>
			    <?php
			}
			
            if ($wp_copy_rights_options['options']['disable_save_page']) {
                ?>
                <script>
                    window.onkeydown = function(e) {
                        if (e.ctrlKey && e.keyCode == 83) {
                            e.preventDefault();
                            e.returnValue = false;
                            return false;
                        }
                    }
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_select_all']) {
                ?>
                <script type="text/javascript">

                    document.onkeydown = function () {
                        if ((window.event && window.event.keyCode == 65) || ((event.ctrlKey))) {
                            event.keyCode = 0;
                            event.returnValue = false;
                            return false;
                        }
                    };
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_copy_content']) {
                ?>
                <script type="text/javascript">
                    document.onkeydown = function () {
                        if ((window.event && window.event.keyCode == 123) || ((event.ctrlKey) || (window.event.keycode == 67))) {
                            event.keyCode = 0;
                            event.returnValue = false;
                            return false;
                        }
                    };
                </script>
                <?php
            }
            if ($wp_copy_rights_options['options']['disable_cut_content']) {
                ?>
                <script type="text/javascript">
                    document.onkeydown = function () {
                        if ((window.event && window.event.keyCode == 88) || ((event.ctrlKey) || (window.event.keycode == 123))) {
                            event.keyCode = 0;
                            event.returnValue = false;
                            return false;
                        }
                    };
                </script>
                <?php
            }
        }
    }
}


add_action('admin_menu', 'wp_copy_rights_add_setting_page');
function wp_copy_rights_add_setting_page() {
    global $wp_copy_rights_settings_page_hook;
    $wp_copy_rights_settings_page_hook = add_management_page('WPCopyRights设置', 'WPCopyRights设置', 'manage_options', __FILE__, 'wp_copy_rights_setting_page');
}

add_action('admin_enqueue_scripts', 'wp_copy_rights_scripts_styles');
function wp_copy_rights_scripts_styles($hook){
    global $wp_copy_rights_settings_page_hook;
    if( $wp_copy_rights_settings_page_hook != $hook )
        return;
    wp_enqueue_style("wp_copy_rights_options_panel_stylesheet", plugin_dir_url( __FILE__ ). 'layui/css/layui.css',false,'','all');
    wp_enqueue_style("wp_copy_rights_options_self_panel_stylesheet", plugin_dir_url( __FILE__ ). 'layui/css/laobuluo.css',false,'','all');
    wp_enqueue_script("wp_copy_rights_options_panel_script", plugin_dir_url( __FILE__ ).'layui/layui.js', '', '', false);
   
}

add_filter('plugin_action_links', 'wp_copy_rights_plugin_action_links', 10, 2);
function wp_copy_rights_plugin_action_links($links, $file) {
    if ($file == plugin_basename(dirname(__FILE__) . '/index.php')) {
        $links[] = '<a href="admin.php?page=' . WP_COPY_RIGHTS_BASE_FOLDER . '/index.php">设置</a>';
    }
    return $links;
}


function wp_copy_rights_setting_page() {
    if (!current_user_can('manage_options')) {
        wp_die('Insufficient privileges!');
    }
    $wp_copy_rights_options = get_option('wp_copy_rights_options');
    if ($wp_copy_rights_options && isset($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce']) && !empty($_POST)) {
        $wp_copy_rights_options['switch'] = isset($_POST['switch']);
        $keys = ['exclude_pages', 'exclude_posts'];
        foreach ($wp_copy_rights_options['options'] as $k => $v) {
            if (in_array($k, $keys)) {
                $wp_copy_rights_options['options'][$k] = (isset($_POST[$k])) ? sanitize_text_field(trim(stripslashes($_POST[$k]))) : '';
            } else {
                $wp_copy_rights_options['options'][$k] = isset($_POST[$k]);
            }
        }
        update_option('wp_copy_rights_options', $wp_copy_rights_options);
        ?>

        <div class="notice notice-success settings-error is-dismissible"><p><strong>插件设置已保存</strong></p></div>
        <?php

    }
    ?>
    <div class="container-laobuluo-main">
    <div class="laobuluo-wbs-header" style="margin-bottom: 15px;">
              <div class="laobuluo-wbs-logo"><a><img src="<?php echo plugin_dir_url( __FILE__ );?>layui/images/logo.png"></a><span class="wbs-span">WPCopyRights 网站防复制插件</span><span class="wbs-free">Free V5.4</span></div>
             <div class="laobuluo-wbs-btn">
                  <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/?utm_source=wpcopyrights-setting&utm_media=link&utm_campaign=header" target="_blank"><i class="layui-icon layui-icon-home"></i> 插件主页</a>
                  <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/wpcopyrights.html?utm_source=wpcopyrights-setting&utm_media=link&utm_campaign=header" target="_blank"><i class="layui-icon layui-icon-release"></i> 插件教程</a>
             </div>
        </div>
    </div>
<!-- 内容 -->
        <div class="container-laobuluo-main">
            <div class="layui-container container-m">
                <div class="layui-row layui-col-space15">
                    <!-- 左边内容 -->
                   
                    <div class="layui-col-md9">
                        <div class="laobuluo-panel">
                            <div class="laobuluo-controw">
                                <fieldset class="layui-elem-field layui-field-title site-title">
                                    <legend><a name="get">设置选项</a></legend>
                                </fieldset>
                                <div class="laobuluo-text laobuluo-block">
                                    <form action="<?php echo wp_nonce_url('./admin.php?page=' . WP_COPY_RIGHTS_BASE_FOLDER . '/index.php'); ?>" name="wpcopyrightsform" method="post" class="layui-form">
                                       
                                     
                                   <div class="layui-form-item">
                                            <label class="layui-form-label">开启</label>
                                            <div class="layui-input-block">
                                                <input type="checkbox"  lay-skin="switch" lay-text="ON|OFF" lay-filter="switchTest" name="switch" <?php
                        if ($wp_copy_rights_options['switch']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
                                            </div>
                                        </div>


                                        
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">禁止右键</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" name="disable_right_click" title="禁止" <?php
                        if ($wp_copy_rights_options['options']['disable_right_click']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                          
                                            </div>  <div class="layui-form-mid layui-word-aux">禁止鼠标右键单击</div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">禁止选择</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" name="disable_select_text" title="禁止" <?php
                        if ($wp_copy_rights_options['options']['disable_select_text']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止鼠标选择文本</div>
                                        </div>

                                         <div class="layui-form-item">
                                            <label class="layui-form-label">拖动图片</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_drag_image" <?php
                        if ($wp_copy_rights_options['options']['disable_drag_image']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止鼠标拖动图片</div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">开发工具</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_f12" <?php
                        if ($wp_copy_rights_options['options']['disable_f12']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止开发者工具 F12/Ctrl+Shift+I</div>
                                        </div>

                                         <div class="layui-form-item">
                                            <label class="layui-form-label">打印页面</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_print" <?php
                        if ($wp_copy_rights_options['options']['disable_print']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止打印当前页面内容</div>
                                        </div>

                                         <div class="layui-form-item">
                                            <label class="layui-form-label">查看源码</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_view_source" <?php
                        if ($wp_copy_rights_options['options']['disable_view_source']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止Ctrl+U查看源代码</div>
                                        </div>

                                         <div class="layui-form-item">
                                            <label class="layui-form-label">保存页面</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_save_page" <?php
                        if ($wp_copy_rights_options['options']['disable_save_page']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止保存当前页面</div>
                                        </div>

                                         <div class="layui-form-item">
                                            <label class="layui-form-label">全选内容</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_select_all" <?php
                        if ($wp_copy_rights_options['options']['disable_select_all']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止CTRL+A全选内容</div>
                                        </div>

                                         <div class="layui-form-item">
                                            <label class="layui-form-label">复制内容</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_copy_content" <?php
                        if ($wp_copy_rights_options['options']['disable_copy_content']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止CTRL+C复制</div>
                                        </div>

                                           <div class="layui-form-item">
                                            <label class="layui-form-label">剪切内容</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="禁止" name="disable_cut_content" <?php
                        if ($wp_copy_rights_options['options']['disable_cut_content']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>禁止</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">禁止CTRL+X剪切内容</div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">排除管理</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="排除" name="enable_adminer" <?php
                        if ($wp_copy_rights_options['options']['enable_adminer']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>排除</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">不限制管理员</div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">排除会员</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="checkbox" title="排除" name="enable_loginer" <?php
                        if ($wp_copy_rights_options['options']['enable_loginer']) {
                            echo 'checked="TRUE"';
                        }
                        ?>/>
                                                <div class="layui-unselect layui-form-checkbox"><span>排除</span><i class="layui-icon layui-icon-ok"></i></div>                                              
                                            </div><div class="layui-form-mid layui-word-aux">不限制登录中的会员成员</div>
                                        </div>
										
										<div class="layui-form-item">
										                    <label class="layui-form-label">文末版权</label>
										                    <div class="layui-input-inline" style="width: 100px;">
										                        <input type="checkbox" title="开启" name="enable_endcopyrights" <?php
										if ($wp_copy_rights_options['options']['enable_endcopyrights']) {
										    echo 'checked="TRUE"';
										}
										?>/>
										                        <div class="layui-unselect layui-form-checkbox"><span>开启</span><i class="layui-icon layui-icon-ok"></i></div>                                              
										                    </div><div class="layui-form-mid layui-word-aux">复制后自动在文章最后添加本文版权</div>
										                </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">排除页面</label>
                                            <div class="layui-input-block">
                                                <input type="text"  placeholder="输入页面ID" autocomplete="off" class="layui-input" name="exclude_pages" value="<?php echo esc_attr($wp_copy_rights_options['options']['exclude_pages']); ?>" /><div class="layui-form-mid layui-word-aux">填写页面序号：1,2,3,4</div>
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">排除文章</label>
                                            <div class="layui-input-block">
                                                <input type="text"  placeholder="输入文章ID" autocomplete="off" class="layui-input" name="exclude_posts" value="<?php echo esc_attr($wp_copy_rights_options['options']['exclude_posts']); ?>" /><div class="layui-form-mid layui-word-aux">填写文章序号：1,2,3,4</div>
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <div class="layui-input-block">
                                                
                                               <input type="submit" name="submit" value="保存设置" class="layui-btn" lay-filter="formDemo" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     </form>
                    <!-- 左边内容 end -->
                    <!-- 右边内容 -->
                    <div class="layui-col-md3">
                        <div  id="nav">
                             <div class="laobuluo-panel">
                        <div class="laobuluo-panel-title">关注公众号</div>
                        <div class="laobuluo-code">
                            <img src="<?php echo plugin_dir_url(__FILE__); ?>layui/images/qrcode.png">
                            <p>微信扫码关注 <span class="layui-badge layui-bg-blue">老蒋朋友圈</span> 公众号</p>
                            <p><span class="layui-badge">优先</span> 获取插件更新 和 更多 <span class="layui-badge layui-bg-green">免费插件</span> </p>
                        </div>
                    </div>
                             <div class="laobuluo-panel">
                            <div class="laobuluo-panel-title">站长必备资源</div>
                            <div class="laobuluo-shangjia">
                                <a href="https://www.lezaiyun.com/webmaster-tools.html" target="_blank" title="站长必备资源">
                                    <img src="<?php echo plugin_dir_url( __FILE__ );?>layui/images/cloud.jpg"></a>
                                    <p>站长必备的商家、工具资源整理！</p>
                            </div>
                        </div>
							

						</div>
                    </div>
                    <!-- 右边内容end -->
                </div>
            </div>
        </div>
        <!-- 内容 -->
        <!-- footer -->
		<div class="container-laobuluo-main">
        <div class="layui-container container-m">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
				    <div class="laobuluo-footer-code">
						 <span class="codeshow"></span>
						 
					</div>
                   <div class="laobuluo-links">
                         <a href="https://www.laobuluo.com/?utm_source=wpcopyrights-setting&utm_media=link&utm_campaign=footer"  target="_blank">老部落</a>
                        <a href="https://www.lezaiyun.com/?utm_source=wpcopyrights-setting&utm_media=link&utm_campaign=footer"  target="_blank">乐在云</a>                       
                        <a href="https://www.lezaiyun.com/wpcopyrights.html?utm_source=wpcopyrights-setting&utm_media=link&utm_campaign=footer"  target="_blank">使用说明</a> 
                        <a href="https://www.lezaiyun.com/about/?utm_source=wpcopyrights-setting&utm_media=link&utm_campaign=footer"  target="_blank">关于我们</a>
                        </div>
                       
                </div>
            </div>
        </div>
		</div>
        <!-- footer -->
		
         <script>
        
            layui.use(['form', 'element','jquery'], function() {
                var $ =layui.jquery;
                function menuFixed(id) {
                  var obj = document.getElementById(id);
                  var _getHeight = obj.offsetTop;
                  var _Width= obj.offsetWidth
                  window.onscroll = function () {
                    changePos(id, _getHeight,_Width);
                  }
                }
                function changePos(id, height,width) {
                  var obj = document.getElementById(id);
                  obj.style.width = width+'px';
                  var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                  var _top = scrollTop-height;
                  if (_top < 150) {
                    var o = _top;
                    obj.style.position = 'relative';
                    o = o > 0 ? o : 0;
                    obj.style.top = o +'px';
                    
                  } else {
                    obj.style.position = 'fixed';
                    obj.style.top = 50+'px';
                
                  }
                }
                menuFixed('nav');
            })
        </script>

    

    <?php
}
?>