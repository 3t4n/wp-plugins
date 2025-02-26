<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="wrap">
   <div class="dig-main-form-wrapper add">
   
   
   <?php
  
    $descriptionMessage =  $titleMessage =  $title = $description= ''; 
   if( isset($_POST['submit']) ){

	     global $wpdb;  
	       $table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		   
		   if(empty($_POST['title'])){
			    $titleMessage = __('Title is required','dashboard-instruction-guide');
			  
		   }else{
			   $title = sanitize_text_field($_POST['title']);
			   $titleMessage='';
		   }
		   
		  if( empty($_POST['dig_description'])){
			   $descriptionMessage = __('Description is required','dashboard-instruction-guide');
			   
		   }else{
			  $description = wp_kses_stripslashes($_POST['dig_description']);
			   $descriptionMessage='';
		   }
		   
		
	 
			  
  	  } 
		  
 
	
  
   if(isset($_GET['edit_id'])){

	   global $wpdb; 
	   $id= absint($_GET['edit_id']);

			
		
		   
		 if(!empty($title) && !empty($description)){
		   $query =  $wpdb->update($table_name, array(
			   'title' => $title,
			   'description' =>  $description, 
			   'assigned_into' =>   sanitize_title($_POST['post_type']), 
			   'status' =>  isset($_POST['dig_status']) ? filter_input(INPUT_POST, 'dig_status', FILTER_SANITIZE_NUMBER_INT) : '0', 
			),array('id' =>  $id)); 
			
			
		 }
		
		
			   if(isset($query)){ 
				$title = $description= '';?>
 			    <div class="notice notice-success is-dismissible">
					<p><?php _e( 'Updated Successfully!', 'dashboard-instruction-guide' ); ?></p>
				</div>
			   
	<?php	}
		
		
		
	 $table_name =  $wpdb->prefix . 'dashboard_instruction_guide';
	 $editResults =  $wpdb->get_results("SELECT * FROM $table_name WHERE id=$id");
	   foreach( $editResults as  $editResult){ ?>
 		   
		    <form class="main-form" action="#" method="POST">
		<table class="form-table" role="presentation">
				<tbody>
					<tr>
 						<th scope="row"><label for="title" class="form-label"><?php _e('Title','dashboard-instruction-guide') ?></label></th>
						<td>
							<input type="text" class="regular-text" name="title"    value="<?php echo esc_attr($editResult->title); ?>"><br>
							<span class="error" style="display: block;color: red;"><?php echo esc_html($titleMessage); ?></span>
						</td>
 					</tr>
						<tr>
 						<th scope="row"><label for="title" class="form-label"><?php _e('Select Post Type','dashboard-instruction-guide') ?></label></th>
						<td>
					
 			 
					<?php
							// Get post types
							$args       = array(
								'public' => true,
							);
							$post_types = get_post_types( $args, 'objects' );
							unset($post_types['attachment']);
							unset($post_types['e-landing-page']);
							unset($post_types['elementor_library']);

						?>
						
						<select class="regular-text" name="post_type">
							<?php foreach ( $post_types as $post_type_obj ):
	 
								$labels = get_post_type_labels( $post_type_obj );
								?>
								<option value="<?php echo esc_attr( $post_type_obj->name ); ?>" <?php selected($post_type_obj->name,$editResult->assigned_into); ?>><?php echo esc_html( $labels->name ); ?></option>
								
							<?php endforeach; ?>
						</select>
						</td>
						</tr>
					<tr>
 							<th scope="row"><label for="description" class="form-label"><?php _e('Description','dashboard-instruction-guide') ?></label></th>
							<td>
							<?php
							$args = array(
								'tinymce'       => array(
									'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,unlink,undo,redo',
								),
							);
							$settings = array(
								'editor_height' => 300, // In pixels, takes precedence and has no default value
							   
							);
							$content   = $editResult->description;
							$editor_id = 'dig_description';
							 
							wp_editor( $content, $editor_id,$settings, $args );
							?><br>
							<span class="error" style="display: block;color: red;"><?php echo $descriptionMessage; ?></span>

 						</td>
 					</tr>
					<tr>
 						<th scope="row"><label for="description" class="form-label"><?php _e( 'Status', 'dashboard-instruction-guide' ); ?></label></th>
						<td>
							<select name="dig_status" id="dig_status" class="regular-text">
									<option selected="selected" value="<?php echo  esc_attr('1') ?>" <?php if ( $editResult->status == 1 ) echo 'selected="selected"'; ?>><?php _e('Published','dashboard-instruction-guide') ?></option>
									<option  value="<?php echo  esc_attr('0') ?>" <?php if ( $editResult->status == 0 ) echo 'selected="selected"'; ?>><?php _e('Draft','dashboard-instruction-guide') ?></option>
							</select>
						</td>
 					</tr>
 
					<tr> 
					<td></td>
					<td>
					<?php submit_button( 'Update' ); ?>
 					</td>
					</tr>
					
					</tbody>
					</table>
		</form>
	<?php   }
 
   }else{
		$descriptionMessage =  $titleMessage =  $title = $description= ''; 
		if( isset($_POST['submit']) ){
	       global $wpdb;  
	       $table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		   
		   if(empty($_POST['title'])){
			   $titleMessage = __('Title is required','dashboard-instruction-guide');
		   }else{
			   $title = sanitize_text_field($_POST['title']);
			   $titleMessage='';
		   }
		   if( empty($_POST['dig_description'])){
			   $descriptionMessage = __('Description is required','dashboard-instruction-guide');
		   }else{
			   $description = wp_kses_stripslashes($_POST['dig_description']);
			   $descriptionMessage='';
		   }
		}
   
   
    
   
		if(!empty($title) && !empty($description)){
		   $query =  $wpdb->insert($table_name, array(
			   'title' => $title,
			   'description' =>  $description, 
			   'assigned_into' =>   sanitize_title($_POST['post_type']), 
			   'status' =>  absint($_POST['dig_status']) ? filter_input(INPUT_POST, 'dig_status', FILTER_SANITIZE_NUMBER_INT) : '0', 
			));
		 }
		if(isset($query)){ 
		$title = $description= '';
		
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php _e( 'Instruction Added Successfully', 'dashboard-instruction-guide' ); ?></p>
		</div>
			   
<?php	} ?>
   <form class="main-form" action="#" method="POST">
		<table class="form-table" role="presentation">
				<tbody>
					<tr>
 						<th scope="row"><label for="title" class="form-label"><?php _e('Title','dashboard-instruction-guide') ?></label></th>
						<td>
							<input type="text" class="regular-text" name="title" value="<?php  echo esc_attr($title) ?>"><br>
							<span class="error" style="display: block;color: red;"><?php echo esc_html($titleMessage); ?></span>
						</td>
 					</tr>
						<tr>
 						<th scope="row"><label for="title" class="form-label"><?php _e('Select Post Type','dashboard-instruction-guide') ?></label></th>
						<td>
							<?php
							// Get post types
							$args       = array(
								'public' => true,
							);
							$post_types = get_post_types( $args, 'objects' );
							unset($post_types['attachment']);
							unset($post_types['e-landing-page']);
							unset($post_types['elementor_library']);
							?>
							 
							<select class="regular-text" name="post_type">
								<?php foreach ( $post_types as $post_type_obj ):
									$labels = get_post_type_labels( $post_type_obj );
									?>
									<option value="<?php echo esc_attr( $post_type_obj->name ); ?>"><?php echo esc_html( $labels->name ); ?></option>
								<?php endforeach; ?>
							</select>
						</td>
 					</tr>
					<tr>
 						<th scope="row"><label for="description" class="form-label"><?php _e('Description','dashboard-instruction-guide') ?></label>
						</th>
							<td>
							<?php
							$args = array(
								'tinymce'       => array(
									'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,unlink,undo,redo',
								),
							);
							$settings = array(
								'editor_height' => 300, // In pixels, takes precedence and has no default value
							);
							$content   = $description;
							$editor_id = 'dig_description';
							 
							wp_editor( $content, $editor_id,$settings, $args );
							?><br>
							<span class="error" style="display: block;color: red;"><?php echo esc_html($descriptionMessage); ?></span>
 						</td>
 					</tr>
					<tr>
 						<th scope="row"><label for="description" class="form-label"><?php _e( 'Status', 'dashboard-instruction-guide' ); ?></label>
						</th>
						<td>
							<select name="dig_status" id="dig_status" class="regular-text">
								<option selected="selected" value="<?php echo  esc_attr('1') ?>"><?php _e('Published','dashboard-instruction-guide') ?></option>
								<option  value="<?php echo  esc_attr('0') ?>"><?php _e('Draft','dashboard-instruction-guide') ?></option>
							</select>
						</td>
 					</tr>
					<tr> 
					<td></td> 
					<td>
					<?php submit_button( 'Submit' ); ?>
 					</td>
					</tr>
					</tbody>
					</table>
		</form>
   <?php } ?>
   </div>
   </div>