<?php
/*
Plugin Name:Avenir-soft Direct Download
Plugin URI:http://www.avenirsoft.org
Description: User can directly add a download button at the woocommerce shop page to every free downloadable products.
Version:1.0
Author:Avenir-soft
Author URI:http://www.avenirsoft.org
License:GPL2
*/

//defined('ABSPATH') or die("No script kiddies please!");
define(PLUGIN_CSS_FILE, plugins_url('/admin/css/style.css',__file__));
define(LOGO_IMAGE,  plugins_url('/admin/images/avenirlogonew.png',__file__));
add_action( 'init', 'avenir_woocommerce_hooks');
 add_action( 'admin_menu', 'avenir_backend_page');
 function avenir_woocommerce_hooks(){
  add_action('woocommerce_single_product_summary','avenir_downlink',5);
    add_action('woocommerce_after_shop_loop_item','avenir_downlink',14);
 }

 /************************* enquing CSS******************/
 function theme_name_scripts() {
wp_enqueue_style('plugin_style',PLUGIN_CSS_FILE);
}
add_action( 'init', 'theme_name_scripts' );
/***************************/
 function avenir_backend_page()
 {

 $logo = plugins_url('/admin/images/menu.png',__file__);
 add_menu_page('Avenir','Direct Download','manage_options','avenir_plugin','avenir_admin_function',$logo);
 }function avenir_admin_function()
{
$cssurl = plugin_dir_path(__file__) . 'admin\css\style.css';
?>

<div class="plugin_wrapper" style="width:80%;margin:0 auto;text-align:center;">
<div style="background:white;margin-top:2%;">
<a href="http://www.avenirsoft.org"><img src="<?php echo LOGO_IMAGE;  ?>"></a>
</div>
<h2>Avenir-Soft Direct Download</h2>
<p>Add The Custom Css For Download Button</p>
<form method="post" action="">
<textarea name="style1" class="style" rows="10" cols="20"><?php echo file_get_contents($cssurl); ?>
</textarea>
<p>
<input type="submit" value="Save Changes" name="submitbutton">
</p>
</form>
</div>
<?php
$key = $_POST["style1"];

//$cssurl = plugins_url() . '/Avenir-soft_Directdownload/admin/css/style.css';
if ($key != '' && isset($_POST["submitbutton"])) {
    $f = fopen($cssurl, 'w') or die("can't open file");
    fwrite($f,$key);
		    fclose($f);
	?>
	<script>
	window.location='<?php echo get_home_url()."/wp-admin/admin.php?page=avenir_plugin"; ?>'	;
	</script>
	<?php 
} else { // write default values or show an error message
 }
}
function avenir_downlink(){
$sale_price = get_post_meta( get_the_ID(), '_price', true);
if($sale_price==0)
{
$download_link = get_post_meta(get_the_ID(),_downloadable_files);
foreach($download_link  as $link => $val){
   foreach( $val as $value => $mainval){
     foreach($mainval as $mainvalue => $filename)
	 {
	 $urlf=$filename;
	  }
	 echo "<a href='".$urlf."' class='downloadbutton'>Download</a>";
   }
}
}
}
?>