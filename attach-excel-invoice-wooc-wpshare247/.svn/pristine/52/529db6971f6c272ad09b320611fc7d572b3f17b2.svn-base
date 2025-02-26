<table id="tab_pro_setting" class="form-table aeiwooc-tab aeiwooc-pro">
    <tr class="group-row" valign="top">
        <td>
            <h2 class="tt"><?php _e("Pro setting", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
        </td>
    </tr>
    
    
    <?php 
	$arr_templates = Aeiwooc_helper::get_arr_templates();
	if($arr_templates){
	?>
    <tr valign="top">
        <th scope="row"><?php _e("Excel templates", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td>
            <?php 
            $field_name = 'excel_template';
            $field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
            $val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
            ?>
            <select id="<?php echo $field; ?>" name="<?php echo $field; ?>" class="aeiwooc_excel_template">
            	<?php 
				foreach($arr_templates as $kk => $tpl){
					$tpl_img = $tpl. '.png';
					$template_url = WPSHARE247_AEIWOOC_PLUGIN_DEMO_TEMPLATES_URL;
					$data_url =  $template_url . '/' .$tpl_img;
					
					$selected = '';
					if($val==$tpl){ 
						$selected = 'selected';
						$img_src = $template_url . '/' .$tpl_img; 
					}else{
						if($kk==0){
							$img_src = $template_url . '/' .$tpl_img; 
						}
					}
					
					
				?>
                	<option data-url="<?php echo $data_url;?>" <?php echo $selected;?> value="<?php echo $tpl;?>"><?php echo $tpl;?></option>
                <?php 
				}
				?>
            </select> <?php $WPSHARE247_CLASS_Aeiwooc::show_pro_message(); ?>
            <div id="excel_template_img">
            	<img class="<?php echo $field; ?>" src="<?php echo $img_src;?>" />
            </div>
        </td>
    </tr>
    <?php 
	}
	?>

    <tr valign="top">
    	<?php 
		$field_name = 'logo';
		$field = $WPSHARE247_CLASS_Aeiwooc::create_option_prefix($field_name);
		$val = $WPSHARE247_CLASS_Aeiwooc::class_get_option($field_name);
		$container_id = 'container-'.$field;
		?>
        <th scope="row"><?php _e("Logo", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></th>
        <td id="<?php echo $container_id; ?>">
            <?php $WPSHARE247_CLASS_Aeiwooc::show_pro_message(); ?> <br/>
            <input class="hdn" value="<?php echo $val;?>" type="hidden" id="<?php echo $field; ?>" name="<?php echo $field; ?>" />
            <div class="aeiwoo-media">
            	<ul class="attachments ui-sortable ui-sortable-disabled images">
                <?php Aeiwooc_helper::template_img_html($val, $container_id);?>
                </ul>
            </div>
            <button rel="#<?php echo $container_id; ?>" data-title="<?php _e("Select or Upload Media Of Your Chosen Persuasion", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" data-btntext="<?php _e("Use this media", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?>" type="button" class="button wpshare247-aeiwooc-media" data-number="1"><?php _e("Choose invoice logo", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></button>
        </td>
    </tr>
    
</table>