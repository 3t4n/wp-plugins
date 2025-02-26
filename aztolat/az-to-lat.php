<?php
/*
Plugin Name: AzToLat
Plugin URI: http://web-book.az/files/aztolat.zip
Description: This plugin converts Azeri characters "ə,ğ,ö,ü,i,ı,ç,ş" in post slugs to Latin characters. Very useful for Azeri-speaking users of WordPress.
Author: Aydin Cavadli <aydincavadli@gmail.com>
Contributor: Aydin Cavadli <aydincavadli@gmail.com>
Author URI: http://web-book.az/about
Version: 0.1
*/ 
  
$gost = array(
   "ə"=>"e","ü"=>"u","і"=>"i","№"=>"#","ğ"=>"g",
   "ö"=>"o","ı"=>"i","ç"=>"c","ş"=>"s","Ə"=>"E",
   "Ü"=>"U","İ"=>"I","Ğ"=>"G",
   "Ö"=>"O","I"=>"I","Ç"=>"C","Ş"=>"S",
   "—"=>"-","«"=>"","»"=>"","…"=>""
  );
 
function sanitize_title_with_translit($title) {
	global $gost;
	$atl_standard = get_option('atl_standard');
	switch ($atl_standard) {
		case 'off':
		    return $title;		
		case 'gost':
		    return strtr($title, $gost);
		default: 
		    return strtr($title, $gost);
	}
}

function atl_options_page() {
?>
<div class="wrap">
	<h2>AzToLat Ayarlar</h2>
	<p>Başlığın tərcüməsi ayarları</p>
	<?php
	if($_POST['atl_standard']) {
		// set the post formatting options
		update_option('atl_standard', $_POST['atl_standard']);
		echo '<div class="updated"><p>Ayarlar Yadda Saxlanıldı.</p></div>';
	}
	?>

	<form method="post">
	<fieldset class="options">
		<legend>Tərcümə ayarı:</legend>
		<?php
		$atl_standard = get_option('atl_standard');
		?>
			<select name="atl_standard">
				<option value="off"<?php if($atl_standard == 'off'){ echo(' selected="selected"');}?>>Qapalı</option>
				<option value="gost"<?php if($atl_standard == 'gost'){ echo(' selected="selected"');}?>>Açıq</option> 								
			</select>

			<input type="submit" value="Yadda Saxla" />

	</fieldset>
	</form>
</div>
<?php
}

function atl_add_menu() {
		add_options_page('AzToLat', 'AzToLat', 8, __FILE__, 'atl_options_page');
}

add_action('admin_menu', 'atl_add_menu');
add_action('sanitize_title', 'sanitize_title_with_translit', 0);
?>