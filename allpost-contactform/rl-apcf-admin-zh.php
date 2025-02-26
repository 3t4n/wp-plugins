<?php
/*****************************************************
        "All Post Contact Form"'s Core File 
            Created by RainbowLink Inc. 
*****************************************************/
$rl_apcf_admin_Menu_Title = "联系表格";
$rl_apcf_admin_Menu_Desc = "设置你的 All Post Contact Form!";
$rl_apcf_admin_Save_btn = "保存.";
$rl_apcf_admin_eg = "(例子) ";
$rl_apcf_admin_saved = '保存.';
$rl_apcf_admin_H1 = '(1) 设置您的确认窗口和提交窗口和接收电子邮件系统.';
$rl_apcf_admin_confirmation_window = '设置确认窗口.';
$rl_apcf_admin_submission_window = '设置提交窗口.';
$rl_apcf_admin_mail = '设置系统接收电子邮件通过此插件.';
$rl_apcf_admin_H2 = '(2) 反射 (1) 在您的 wordpress 网站上的2页.';
$rl_apcf_admin_ShortCode = '复制下面的 "短代码", 并将其粘贴到您的新页面或帖子页面, 以便显示您的确认窗口 & 提交窗口, 并运行您的接收电子邮件系统. 看到: /wp-content/plugin/allpost-contactform/assets/screenshot-2.png.';
$rl_apcf_admin_UsethisPlugin_Desc = '设置 (1) 的 permalink ( 你粘 "短代码" ). 看到: /wp-content/plugin/allpost-contactform/assets/screenshot-3.png.';
$rl_apcf_admin_UsethisPlugin = '粘贴快捷代码的页面的"permalink"';
$rl_apcf_admin_UsethisPlugin_js = 'About name="rl_apcf" & onsubmit="return checkForm()": 使用allpost-contactform.js创建用于检查输入数据的系统.';
$rl_apcf_admin_m1 = '通过此插件接收电子邮件的电子邮件地址 ( 如果为空, 此插件将使用您的管理电子邮件地址 )';
$rl_apcf_admin_m2 = "接收电子邮件系统名称";
$rl_apcf_admin_m3 = '电子邮件的主题';
$rl_apcf_admin_c1 = '确认屏幕的名称';
$rl_apcf_admin_c2 = '出现在标题确认屏幕下的消息';
$rl_apcf_admin_c3 = '提交按钮的名称';
$rl_apcf_admin_s1 = '提交窗口的标题';
$rl_apcf_admin_s2 = '出现在标题提交窗口下的消息';
$rl_apcf_admin_m1_eg = " ( ← 管理员的电子邮件地址 ) or 做出武断的选择 ( info@your-domain.com ) ";
$rl_apcf_admin_m2_eg = 'WordPress Form Mail System';
$rl_apcf_admin_m3_eg = '你收到邮件了 [於 All Post Contact Form]';
$rl_apcf_admin_c1_eg = '确认';
$rl_apcf_admin_c2_eg = '请在下面确认, 并发送它.';
$rl_apcf_admin_c3_eg = '提交';
$rl_apcf_admin_s1_eg = '您的消息已发送!';
$rl_apcf_admin_s2_eg = '谢谢！';


/* since v1.5.0 */
$rl_apcf_plugin_list_settings = "设置";
$rl_apcf_admin_sec1_name = '设置';
$rl_apcf_admin_sec2_name = '选项';
$rl_apcf_admin_options_H2_1 = '重定向';
$rl_apcf_admin_options_H2_2 = '返回首页的按钮';
$rl_apcf_admin_r1 = '重定向页面URL（如果为空，此插件将使用您的首页URL）';
$rl_apcf_admin_r2 = '重定向时间（秒）（如果为空，此插件将设置3600秒） ';
$rl_apcf_admin_r2_eg = '3600';
$rl_apcf_admin_g1 = '想要在“发帖画面”收到消息后显示“请返回首页”按钮吗？ （如果为空，此插件将不显示按钮） ';
$rl_apcf_admin_g1_eg = '请返回首页';

/* Cookie */
$rl_apcf_admin_options_H2_3 = 'Cookie 和错误设置';
$rl_apcf_admin_co1 = '是否启用 cookie 以避免“炸弹攻击”（如果启用：1 | 如果不启用：0）';
$rl_apcf_admin_co1_eg = "0";
$rl_apcf_admin_e0 = '【开启cookie时会开启此项以避免“炸弹攻击”】 ';
$rl_apcf_admin_e1 = '如果访问者尝试立即再次发送相同的消息，或者如果他们尝试连续发送另一条消息，您可以显示错误消息（如果为空，此插件会显示“您的浏览器将等待一个小时您有有效的 cookie，如果您想发送另一条消息，请按下面的按钮从您的浏览器中删除有效期为 1 小时的 cookie"'.$rl_apcf_admin_e0;
$rl_apcf_admin_e1_eg = '您的浏览器有一个有效期为 1 小时的 cookie. 如果您想发送另一条消息，请按下面的按钮从您的浏览器中删除一小时 cookie';
$rl_apcf_admin_e2 = '“删除 1 小时 cookie”按钮'.$rl_apcf_admin_e0;
$rl_apcf_admin_e2_eg = '删除 1 小时 cookie';

/* Items of Mail */
$rl_apcf_admin_options_H2_4 =  "设置接收邮件的项目";
$rl_apcf_admin_sr1 = '是否<a href="https://www.Rainbow-Link.com/FAQ.htm?&faq_id=211" target="_blank"> 在邮件中包含此插件自动插入的项目</a> （包含：1 | 不包含：0） ';
$rl_apcf_admin_sr1_eg = "0";

/* since v1.6.2 */
$rl_apcf_admin_options_H2_5 =  "设置在 WordPress 服务器中保存上传的文件（附件文件）";
$rl_apcf_admin_sa1 = '设置在 WordPress 服务器中保存上传的文件（附件文件）   ( 保存: 1 | 不保存: 0 ) ';
$rl_apcf_admin_sa1_eg = "0";
$rl_apcf_admin_sa2_Nginx0 = "致所有 Nginx 用户 ";
$rl_apcf_admin_sa2_Nginx1 = "进行此设置时，我们建议适当配置 Nginx. 具体来说，将以下设置添加到 Nginx 配置文件中： ";
$rl_apcf_admin_sa2_Nginx2 = "# 防止直接访问 PHP 文件";
$rl_apcf_admin_sa2_Nginx3 = "# 禁用目录索引 ";
$rl_apcf_admin_sa2_Nginx4 = "# 如果需要，仅允许某些文件类型";
$rl_apcf_admin_sa2_Nginx5 = "# 限制其他文件类型 ";
$rl_apcf_admin_sa2_Nginx6 = "更改 Nginx 配置文件后重新加载服务器";
$rl_apcf_admin_sa3_MalwareScannerPlugins = '如果您想打开此功能，请从 https://WordPress.org/plugins/ 安装任何“恶意软件扫描插件”. Eg)"<a href="https://wordpress.org/plugins/patchstack/" target="_blank">Patchstack</a>""<a href="https://wordpress.org/plugins/malcare-security/" target="_blank">MalCare</a>""<a href="https://wordpress.org/plugins/wordfence/" target="_blank">Wordfence</a>""<a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack Scan</a>""<a href="https://wordpress.org/plugins/sucuri-scanner/" target="_blank">Sucuri Security</a>""<a href="https://wordpress.org/plugins/miniorange-malware-protection/" target="_blank">miniOrange Malware Protection</a>".'; 

/* since v1.7.4 */
$rl_apcf_admin_options_H2_6 = '"allpost-contactform.js"设置';
$rl_apcf_admin_js1 = '是否加载<a href="https://www.Rainbow-Link.com/FAQ.htm?&faq_id=177" target="_blank">Whether to load "allpost-contactform.js"</a> ( 如果加载: 1 | 如果不加载: 0 )';
$rl_apcf_admin_js1_eg = '0';

