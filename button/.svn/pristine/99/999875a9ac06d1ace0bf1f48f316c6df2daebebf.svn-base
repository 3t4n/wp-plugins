<?php
if ( ! defined( 'ABSPATH' ) ) exit;

require(BUTTON_PATH.'inc/dynamic-css.php'); ?>

<style type="text/css">
<?php echo esc_attr($custom_data->custom_css); ?>
</style>
<?php
if(!empty($custom_data->button_target)&& $custom_data->button_target==1){$button_target="_blank";}else{$button_target="_self";}

$attribute = '';
if(!empty($custom_data->attribute_id) && !empty($custom_data->attribute_value)){	
	$attribute = $custom_data->attribute_id."=".$custom_data->attribute_value;
}

if(!empty($custom_data->selector)){
	$myselector =$custom_data->selector;
}else{
	$myselector = '';
}
?>
<div class="button_wrapper_id_<?php echo esc_attr( $id); ?>">
	<div class="button_container button_container_id_<?php echo esc_attr($id); ?>">	
		<a href="<?php echo esc_url($custom_data->button_link); ?>" target="<?php echo esc_attr($button_target); ?>" id="wd_button" class="wd-hvr-simple wd_button_<?php echo esc_attr($id);?> <?php echo esc_html($myselector); ?>" <?php echo esc_attr($attribute); ?> ><?php echo esc_attr($custom_data->button_text); ?></a>	
		<div class="clear_fix"></div>
	</div>
</div>