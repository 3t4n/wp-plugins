<?php 
defined('ABSPATH') or die('No script kiddies please!');
if ( !empty($_POST) && check_admin_referer('manage_opt404tboc','manage_opt404tboc_field') )
     {
if(isset( $_POST['activSkin'] )){ //обновляем стартовый текст
		update_option('skin-404tboc',sanitize_text_field($_POST['activSkin']));
	}
}
$skinsDir = scandir(__DIR__ . "/skins/");
foreach($skinsDir as $key => $dir){
	if(!file_exists(__DIR__ . "/skins/".$dir."/0.png") ){
		unset($skinsDir[$key]);
	}
}
?>
<p><?php _e('<span style="font-weight: bold;font-size: 16px;"> In the directory wp-content/plugins/wp-404-page/skins where different plugin`s skins are.</span>  <br>
<span style="font-size: 11px;">If you want to create your style, then you need::<br>
0. Examples can be seen in the same directory.<br>
1.  In the directory wp-content/plugins/wp-404-page/skins to create a folder with any name;<br>
2. Add the created image folder with 100x100 resolution and with titles: "0.png", "1.png", "ask.png", "none.png";<br>
3. Activate skin on this page.</span>','wp-404tboc-page'); ?> </p>
<form action="" method=post enctype=multipart/form-data>
<?php wp_nonce_field('manage_opt404tboc','manage_opt404tboc_field'); ?>
<table class="wp-list-table widefat plugins skinsTable404" ><tbody>
<?php 
foreach($skinsDir as $dir){
	if($dir ==  get_option('skin-404tboc')){
	echo "<tr class='active'>
	<td style='width: 70%; border-left: 4px solid #00a0d2;'> $dir ". __("Active",'wp-404tboc-page')." </td>
	<td style='width: 30%'> <img src='".plugins_url('/skins/'.$dir.'/0.png', __FILE__)."'>  
	<img src='".plugins_url('/skins/'.$dir.'/1.png', __FILE__)."'>
	<img src='".plugins_url('/skins/'.$dir.'/ask.png', __FILE__)."'>
	<img src='".plugins_url('/skins/'.$dir.'/none.png', __FILE__)."'>
	</td>
	</tr>";
	}
	else{
		echo "<tr>
	<td style='width: 70%'> $dir <br> <button type='submit' class='link' name='activSkin' value='$dir'><span>".__('Activation','wp-404tboc-page')."</span></button></td>
	<td style='width: 30%'> <img src='".plugins_url('/skins/'.$dir.'/0.png', __FILE__)."'>  
	<img src='".plugins_url('/skins/'.$dir.'/1.png', __FILE__)."'>
	<img src='".plugins_url('/skins/'.$dir.'/ask.png', __FILE__)."'>
	<img src='".plugins_url('/skins/'.$dir.'/none.png', __FILE__)."'>
	</td>
	</tr>";
		
	}
}
?>
<tr>
</tr>
</tbody></table>
</form>