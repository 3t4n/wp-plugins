<div class="wrap">
<div id="icon-options-general" class="icon32"></div>
<h2>Apache Password Protect</h2>
<?php if($_GET['settings-updated'] == true) { ?>
<div class="updated below-h2"><p><?php _e('Сохранено', 'app-plugin'); ?></p></div> 
<?php } ?>

<form method="post" action="options.php" class="mainform">
<?php wp_nonce_field('update-options'); ?>

<fieldset class="app">
<legend><?php _e('Блокировка папки wp-admin', 'app-plugin'); ?></legend>
<h4><?php _e('Включить / выключить:', 'app-plugin'); ?></h4>
<p><input name="app_wpadmin_enable" type="checkbox" value="true" <?php if(get_option('app_wpadmin_enable') == "true") { echo "checked"; } ?> /></p>
<h4><?php _e('Пользователь для папки wp-admin:', 'app-plugin'); ?></h4>
<p><input name="app_wpadminuser" class="app_wpadminuser" type="text" value="<?php echo get_option('app_wpadminuser'); ?>"<?php if(get_option('app_wpadmin_enable') == "true") { echo " readonly"; } ?> maxlength="18" required autocomplete="off" /></p>
<h4><?php _e('Пароль для папки wp-admin', 'app-plugin'); ?></h4>
<p><input name="app_wpadminpasswd" class="app_wpadminpasswd" type="text" value="<?php echo get_option('app_wpadminpasswd'); ?>"<?php if(get_option('app_wpadmin_enable') == "true") { echo " readonly"; } ?> maxlength="18" required autocomplete="off" /><a href="javascript:void(0)" class="app_wpadminpasswd_generate<?php if(get_option('app_wpadmin_enable') != "true") { echo " app_wpadminpasswd_generate_do"; } ?>" title="<?php _e('Сгенерировать пароль', 'app-plugin'); ?>"><?php _e('Сгенерировать пароль', 'app-plugin'); ?></a></p>
</fieldset>

<fieldset class="app">
<legend><?php _e('Блокировка файла wp-login.php', 'app-plugin'); ?></legend>
<h4><?php _e('Включить / выключить:', 'app-plugin'); ?></h4>
<p><input name="app_wplogin_enable" type="checkbox" value="true" <?php if(get_option('app_wplogin_enable') == "true") { echo "checked"; } ?> /></p>
<h4><?php _e('Пользователь для файла wp-login.php', 'app-plugin'); ?></h4>
<p><input name="app_wploginuser" class="app_wploginuser" type="text" value="<?php echo get_option('app_wploginuser'); ?>"<?php if(get_option('app_wplogin_enable') == "true") { echo " readonly"; } ?> maxlength="18" required autocomplete="off" /></p>
<h4><?php _e('Пароль для файла wp-login.php', 'app-plugin'); ?></h4>
<p><input name="app_wploginpasswd" class="app_wploginpasswd" type="text" value="<?php echo get_option('app_wploginpasswd'); ?>"<?php if(get_option('app_wplogin_enable') == "true") { echo " readonly"; } ?> maxlength="18" required autocomplete="off" /><a href="javascript:void(0)" class="app_wploginpasswd_generate<?php if(get_option('app_wplogin_enable') != "true") { echo " app_wploginpasswd_generate_do"; } ?>" title="<?php _e('Сгенерировать пароль', 'app-plugin'); ?>"><?php _e('Сгенерировать пароль', 'app-plugin'); ?></a></p>
</fieldset>

<fieldset class="app">
<legend>Внимание!</legend>
<p style="color: red;"><?php _e('1) Не устанавливайте одинаковые логины и пароли на папку wp-admin и файл wp-login.php;', 'app-plugin'); ?></p>
<p style="color: red;"><?php _e('2) Минимальная длина логина и пароля должна соответствовать 3 символам;', 'app-plugin'); ?></p>
<p style="color: red;"><?php _e('3) Крайне нежелательно использование кириллических символов, пробелов и т.п.', 'app-plugin'); ?></p>
<p align="right" style="color: green;"><?php _e('Благодарю за использование моего плагина!', 'app-plugin'); ?></p>
<p align="right"><a href="http://www.dasayt.com/" target="_blank"><?php _e('Виталий Капля', 'app-plugin'); ?></a></p>
</fieldset>

<p class="submit"><input type="submit" name="Submit" value="<?php _e('Сохранить', 'app-plugin'); ?>" class="button-primary" /></p>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="
app_wpadmin_enable,
app_wplogin_enable,
app_wpadminuser,
app_wpadminpasswd,
app_wploginuser,
app_wploginpasswd
"/>
</form>

</div>