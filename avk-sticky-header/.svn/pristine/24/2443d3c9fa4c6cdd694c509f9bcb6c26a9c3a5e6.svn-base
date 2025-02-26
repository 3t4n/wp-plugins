<?php
function avk_stickystyle(){
	wp_enqueue_style('avk_styles',plugin_dir_url(__FILE__).'css/adminmain.css');
	//wp_enqueue_script('avk_jsmin1',plugin_dir_url(__FILE__).'js/avk_color.min.js');
	wp_enqueue_script('avk_jsmin4',plugin_dir_url(__FILE__).'js/avk_sticky.js');

 wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    
     wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
    wp_enqueue_media();
	
}
function avk_stickystylep(){
	wp_enqueue_style('avk_styles',plugin_dir_url(__FILE__).'css/main.css');
	//wp_enqueue_script('avk_jsmin5',plugin_dir_url(__FILE__).'js/avk_sticky.js');
}
?>
<?php 
function avk_stickystylecust(){
 global $avk_options_url;	
?>
<style>
<?php if ($avk_options_url['avk_color']){?>
.logo_header {
	background:<?php echo $avk_options_url ['avk_color']; ?>!important; 
	<?php }?>
}

<?php if ($avk_options_url['avk_tfont']){?>
.logo_menu ul li a {
	color:<?php echo $avk_options_url ['avk_tcolor']; ?>!important; 
	<?php }?>
 <?php if ($avk_options_url['avk_tfont']){?>
  font-size:<?php echo $avk_options_url ['avk_tfont']; ?>px !important; 
<?php }?> 
}
  <?php if ($avk_options_url['avk_hcolor']){?>

  .logo_menu ul li a:hover {
   background:<?php echo $avk_options_url ['avk_hcolor']; ?>!important; 
}
  <?php }?> 
@media only screen and (max-width :600px){
      
    .logo_header {
      display:none !important;
    }
}
  
</style>

<?php 	
}
?>
<?php
add_action('wp_enqueue_scripts','avk_stickystylep');
add_action('wp_head','avk_stickystylecust');
add_action( 'admin_enqueue_scripts', 'avk_stickystyle' );
?>