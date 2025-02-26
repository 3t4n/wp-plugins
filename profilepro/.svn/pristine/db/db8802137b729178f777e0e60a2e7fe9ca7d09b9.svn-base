<div class="profilepro-form-builder-main">
<div class="profilepro-form-builder-wrapper">
	
<?php
	$fields = get_post_meta( $object->ID, 'fields', true );
	$profilepro_field_order = get_post_meta( $object->ID, 'profilepro_field_order',true );
	if( $profilepro_field_order ){
	$fields_count = count( $profilepro_field_order );
	 for( $i=0;$i<$fields_count;$i++ ){
	 $key = $profilepro_field_order[$i];
	 $array = $fields[$key];
?>	
		<div class="profilepro-admin-drag-drop-field profilepro-field-type-<?php echo $array['type']?>">
					<div class="profilepro-admin-field-name"><?php _e( $array['title'], PROFILEPRO_PLUGIN_SLUG );?> <span class="fieldtype"><?php _e($array['type'],PROFILEPRO_PLUGIN_SLUG)?><span></div>
					<div class="profilepro-admin-field-operations">
					 <span class="profilepro-admin-delete-field"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></span>
					 <span class="profilepro-admin-edit-field">
						<a href="#" data-arg1="<?php echo $key;?>" data-arg2="<?php echo $object->ID;?>" data-arg3="<?php echo $array['type']?>" data-action="profilepro_admin_popup_edit_field" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<input type="hidden" name="profilepro_field_order[]" value="<?php echo $key;?>">
					</span>
					</div>
		</div>			
<?php
	 }
}
?>	
<a href="#" class = "profilepro-admin-add-field btn btn-primary" data-popup = "profilepro_fields" data-content = "profilepro_admin_show_fields" data-arg1 ="" data-arg2="<?php echo $object->ID;?>" data-arg3="" >				
	<?php _e('Add Field', PROFILEPRO_PLUGIN_SLUG);?>
	</a>
</div></div>
