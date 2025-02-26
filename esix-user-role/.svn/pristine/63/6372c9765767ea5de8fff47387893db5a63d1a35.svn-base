<div  style="width:50%; float left;">
			 <h2>Apply on Selected Post Type</h2>
			       <form method="POST" action="<?php echo get_site_url()?>/wp-admin/options-general.php?page=settings-api-page">
			 <?php $args = array(
					   'public'   => true,
					  
					);
					
					if(isset($_POST['postselect']))
					{
						//$page_postoption = array_map( 'esc_attr',$_POST['postselect'] );
						
						$page_postoption = eurm_sanitize_array($_POST['postselect']);
						
						update_option('kk_postoption_ff',$page_postoption);
						 
					}
				
					$output = 'objects'; 
					$operator = 'and'; 
					$post_types = get_post_types( $args, $output, $operator ); 
					  
					$kk_alowd_post = get_option('kk_postoption_ff');
					
					foreach ( $post_types  as $post_type ) {
						
						 
						 if(in_array($post_type->name,$kk_alowd_post))
						 {
							  echo '<p><input checked type="checkbox" name="postselect[]" value="'.esc_html($post_type->name).'">'.esc_html($post_type->label).'</p>';
						 }else
						 {
						 echo '<p><input type="checkbox" name="postselect[]" value="'.esc_html($post_type->name).'">'.esc_html($post_type->label).'</p>';
						 }
					} 
					 echo '<p><input type="submit" value="Submit" name="saveffptype"></p>';
					
					?>
				   <form>
			 </div>