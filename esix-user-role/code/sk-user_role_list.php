 
 <div style="width:450px; display:inline-block; float:left; ">
 <?php
		  if(isset($_POST['ffrole']))
		  {  
	        $new_url = sanitize_title($_POST['ffrole']);
			$role_name = sanitize_text_field($_POST['ffrole']);
		    $result = add_role( $new_url, __($role_name ),array( ) );
		  }
		    
		 ?>
 <h2>All Existing User Role</h2>
			 <?php
			 $roleff = eurm_roles_array(); 
			  if($roleff)
			  {
				  echo '<ol>';
					foreach($roleff as $roleffname)
					{
						echo '<li class="editinline"><h4>'.esc_html($roleffname['name']).'</h4></li>';
					}
				  echo '</ol>';
			  }
		         ?>
</div>

<div style="width:450px; display:inline-block; margin-top:20px;">
 <h2>Add New USer Role </h2>
          <form method="POST" action="<?php echo get_site_url()?>/wp-admin/admin.php?page=eurm_access&action=e6web">
			<input name="ffrole" type="text" value=""  />
			<input type="submit" value="Add Role" >
		</form>
		

</div>