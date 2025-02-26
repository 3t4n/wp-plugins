<?php
global $wpdb;

//sanitize all post values
$add_opt_submit= sanitize_text_field( $_POST['add_opt_submit'] );
if($add_opt_submit!='') { 

	//post tyes to exclude from search
	$aps_emploded_exclude_post_types='';
	if(!empty($_POST['pst_types'])){
    $aps_emploded_exclude_post_types = implode(",", $_POST['pst_types']); 
	}
	
	$saved= sanitize_text_field( $_POST['saved'] );
    if(isset($aps_emploded_exclude_post_types) ) {
		update_option('aps_exclude_post_types', $aps_emploded_exclude_post_types);
    }
	
	if($saved==true) {
		
		$message='saved';
	} 
}
  
?>
  <?php
        if ( $message == 'saved' ) {
		echo ' <div class="added-success"><p><strong>Settings Saved.</strong></p></div>';
		}
   ?>
   
    <div class="wrap netgo-facebook-post-setting">
        <form method="post" id="settingForm" action="">
		<h2><?php _e('Autocomplete Post Search Setting','');?></h2>
		<table class="form-table">
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="aps_exclude_post_types"><?php _e('Post type to exclude from search','');?></label>
			</th>
			<td>
			 <?php 
			    //get options
                $aps_exclude_post_types= get_option('aps_exclude_post_types');
			    //all post types array
				$post_type_to_exclude=array('attachment','revision' , 'nav_menu_item');
				
				$all_post_types = get_post_types( '', 'names' ); 
				
				if($aps_exclude_post_types != ''){
				$exploded_post_types = explode(",",$aps_exclude_post_types);
				}
				
				foreach ( $all_post_types as $post_type ) {
					if ( !in_array($post_type, $post_type_to_exclude)) {
					  
					  ?>
					   <input type="checkbox" name="pst_types[]" value="<?php echo $post_type;?>" <?php if(!empty($exploded_post_types)){ if (in_array($post_type, $exploded_post_types)){ echo 'checked';}  } ?>> <?php echo $post_type;?><br>
					  <?php
					}
				}

			 ?>

			</td>
		</tr>

		<tr>
		  <td>
		  <p class="submit">
		<input type="hidden" name="saved"  value="saved"/>
        <input type="submit" name="add_opt_submit" class="button-primary" value="Save Changes" />
		  <?php if(function_exists('wp_nonce_field')) wp_nonce_field('add_opt_submit', 'add_opt_submit'); ?>
        </p></td>
		</tr>
		</table>
		
        
       </form>
      
    </div>

