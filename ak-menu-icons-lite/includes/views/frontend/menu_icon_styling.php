<?php defined('ABSPATH') or die('No script kiddies please!!');
if(!empty($micon_settings)){
$icon_msettings = (isset($micon_settings['wpmi_icon_settings']['icon_settings']) && !empty($micon_settings['wpmi_icon_settings']['icon_settings']))?$micon_settings['wpmi_icon_settings']['icon_settings']:array();
 $font_size = (isset($icon_msettings['font_size']) && $icon_msettings['font_size'] != '')?esc_attr(intval($icon_msettings['font_size'])):'';
 $font_color = (isset($icon_msettings['font_color']) && $icon_msettings['font_color'] != '')?esc_attr($icon_msettings['font_color']):'';
 $font_hcolor = (isset($icon_msettings['font_hcolor']) && $icon_msettings['font_hcolor'] != '')?esc_attr($icon_msettings['font_hcolor']):'';

$label_font_size = (isset($icon_msettings['label_font_size']) && $icon_msettings['label_font_size'] != '')?intval($icon_msettings['label_font_size']):'';
 $label_fcolor = (isset($icon_msettings['label_fcolor']) && $icon_msettings['label_fcolor'] != '')?esc_attr($icon_msettings['label_fcolor']):'';
 $label_fhcolor = (isset($icon_msettings['label_fhcolor']) && $icon_msettings['label_fhcolor'] != '')?esc_attr($icon_msettings['label_fhcolor']):'';
?>
<?php if( $font_size != '' ){ ?> 
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> .wpmicons-set i,
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> .wpmicons-set img{
font-size: <?php echo $font_size;?>px;
}
<?php } ?>
<?php if( $font_color != '' ){ ?> 
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> .wpmicons-set.wpmicons-avicon i{
color: <?php echo $font_color;?>;
}
<?php } ?>
<?php if( $font_hcolor != '' ){ ?> 
li.wpmi-custom-style-<?php echo esc_attr($menuID);?>:hover .wpmicons-set i{
color: <?php echo $font_hcolor;?>;
}
<?php } ?>
<?php if( $label_fcolor != '' ){ ?> 
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> > a span.wpmi-mlabel,
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> > a span.wpmi-mlabel span{
color: <?php echo $label_fcolor;?>;
}
<?php } ?>
<?php if( $label_fhcolor != '' ){ ?> 
li.wpmi-custom-style-<?php echo esc_attr($menuID);?>:hover > a span.wpmi-mlabel,
li.wpmi-custom-style-<?php echo esc_attr($menuID);?>:hover > a span.wpmi-mlabel span{
color: <?php echo $label_fhcolor;?>;
}
<?php } ?>
<?php if( $label_font_size != '' ){ ?> 
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> > a span.wpmi-mlabel,
li.wpmi-custom-style-<?php echo esc_attr($menuID);?> > a span.wpmi-mlabel span{
font-size: <?php echo $label_font_size;?>px;
}
<?php } ?>
<?php
}