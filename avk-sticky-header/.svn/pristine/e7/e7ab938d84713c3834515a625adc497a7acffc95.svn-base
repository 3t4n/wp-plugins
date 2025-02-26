<?php 
function avk_main_sticky_header(){
	ob_start();
	global $avk_options_url;
	?>
<div class="header_outer">
 <?php //global $data;
$sticky = $avk_options_url ['avk_random'];
 if(isset($sticky) && $sticky=="1"){
 ?>
<div class="logo_header">
<div class="logo_header_iner">
<div class="logo_left"> <a href="<?php bloginfo('url'); ?>"><img src="<?php  echo $avk_options_url ['avk_image_url']; ?>"/></a> </div>
<div class="logo_menu">
<ul>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
<div class="clear"></div>
</ul>

</div>
<div class="clear"></div>
</div>
<?php }?>
</div>
</div>
<?php echo ob_get_clean();
}
add_action('wp_footer', 'avk_main_sticky_header',100);
 
//add_action('wp_head', 'myadd', 10, 3);
 ?>