<?php
	 $roleff = eurm_roles_array(); 
		  if($roleff)
		  {
			  $post_id = get_the_ID();
			 
		 $data_ff_rolek =  get_post_meta( $post_id , 'ff_rolekadmin' );

	     $ff_role_alowk = get_post_meta( $post_id , 'ff_role_alowk' );
		
			  echo '<ul>';
			  if($data_ff_rolek)
			  {
				   ?>
				   <li><input <?php if(esc_html($data_ff_rolek[0]) == 'all_publish'){ echo 'checked'; } ?> type="radio" value="all_publish" name="ff_rolekadmin" > Publish to all user</li>
				   <li><input <?php if(esc_html($data_ff_rolek[0]) == 'not_publish'){ echo 'checked'; } ?> type="radio" value="not_publish" name="ff_rolekadmin" > Control with Selected Role</li>
			     <?php  
			  }else
			  {
				   echo '<li><input checked type="radio" value="all_publish" name="ff_rolekadmin" > Publish to all user</li>
						  <li><input  type="radio" value="not_publish" name="ff_rolekadmin" > Control with Selected Role</li>';
			   
			  }	
			  echo '</ul>';
			  echo '<ul><hr>';
			 // print_r($ff_role_alowk);
				foreach($roleff as $roleffname)
				{
					if($roleffname['role'] == 'administrator')
					{
					}else{
						if($ff_role_alowk[0])
						{
							if (in_array($roleffname['role'], $ff_role_alowk[0]))
								{
									echo  '<li  class="editinline">
								<input checked type="checkbox" name="ff_role_alowk[]" value="'.esc_html($roleffname['role']).'" >'.esc_html($roleffname['name']).'</li>';
								
								}
								else
								{
									echo '<li class="editinline">
									<input type="checkbox" name="ff_role_alowk[]" value="'.esc_html($roleffname['role']).'" >'.esc_html($roleffname['name']).'</li>';
								}
						}else
						{
							echo '<li class="editinline">
									<input type="checkbox" name="ff_role_alowk[]" value="'.esc_html($roleffname['role']).'" >'.esc_html($roleffname['name']).'</li>';
						}
					}
				}
			  echo '</ul>';
		  }
		  
		  ?>