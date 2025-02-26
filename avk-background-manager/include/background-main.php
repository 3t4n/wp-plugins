<?php 
function avk_main_background(){
	ob_start();
	global $avk_background;
	?>

 <?php //global $data;
$bgm = $avk_background['avk_abackground'];
 if(isset($bgm) && $bgm=="1"){
 ?>
<style>
<?php if ($avk_background['avk_bgcolor']){?>
body{
	background:url(<?php echo $avk_background['avk_bgimage'] ?>) repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0);
  width:80%;
  margin:auto;
  background-color:<?php echo $avk_background['avk_bgcolor'] ?>;
 
	<?php }?>
}
header{
  <?php if ($avk_background['avk_hcolor']){?>
  background:<?php echo $avk_background['avk_hcolor'] ?> !important;
  
 
}
.entry-header{
  background:inherit !important;
}
 <?php }?>
footer{
  <?php if ($avk_background['avk_fcolor']){?>
  background-color:<?php echo $avk_background['avk_fcolor'] ?> !important;
  
  
}
.entry-meta{
  background:inherit !important;
}
 <?php }?> 
</style>
<?php }?>

<?php echo ob_get_clean();
}
add_action('wp_head', 'avk_main_background',100);
 
//add_action('wp_head', 'myadd', 10, 3);
 ?>
 

